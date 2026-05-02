import Parser from 'rss-parser';
import fs from 'fs';
import path from 'path';
import { GoogleGenerativeAI } from '@google/generative-ai';

export interface BlogPost {
  id: string;
  slug: string;
  originalTitle: string;
  rephrasedTitle: string;
  originalContent: string;
  rephrasedContent: string;
  imageUrl: string;
  publishedAt: string;
  sourceUrl: string;
}

const BLOG_DATA_FILE = path.join(process.cwd(), 'data', 'blog.json');

// Gemini AI Rephraser
async function rephraseWithAI(title: string, content: string): Promise<{ title: string, content: string }> {
  const apiKey = process.env.GEMINI_API_KEY;
  if (!apiKey) {
    // Fallback if no API key is provided
    return { title, content };
  }

  try {
    const genAI = new GoogleGenerativeAI(apiKey);
    const model = genAI.getGenerativeModel({ model: "gemini-2.5-flash" });

    const prompt = `You are an expert educational blogger writing for an overseas education consultancy website. 
    I will provide a breaking news title and a short snippet from the BBC. 
    Your task is to write a comprehensive, full-length blog post (at least 3 to 4 paragraphs) expanding on this news. Make it highly engaging, informative, and relevant for students interested in studying abroad or global education trends.
    
    Format your response EXACTLY like this with no markdown code blocks:
    TITLE: [Your new, catchy blog title here]
    CONTENT: [Your full multi-paragraph article here]

    Original News Title: ${title}
    Original News Snippet: ${content}`;

    const result = await model.generateContent(prompt);
    let responseText = result.response.text();
    
    // Clean up possible markdown bolding from Gemini
    responseText = responseText.replace(/\*\*/g, '');

    const titleMatch = responseText.match(/TITLE:\s*([^\n]+)/i);
    const contentMatch = responseText.match(/CONTENT:\s*([\s\S]*)/i);

    if (titleMatch && contentMatch) {
      return {
        title: titleMatch[1].trim(),
        content: contentMatch[1].trim()
      };
    }
    
    // If Gemini ignored the formatting rules, just use the entire response as the content!
    return { title, content: responseText.trim() };
  } catch (error) {
    console.error("Gemini API Error:", error);
    return { title, content };
  }
}

function generateSlug(title: string): string {
  return title
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/(^-|-$)+/g, '');
}

export function getBlogPosts(): BlogPost[] {
  if (!fs.existsSync(BLOG_DATA_FILE)) {
    return [];
  }
  const data = fs.readFileSync(BLOG_DATA_FILE, 'utf-8');
  try {
    return JSON.parse(data) as BlogPost[];
  } catch {
    return [];
  }
}

export async function syncBBCNews() {
  const parser = new Parser({
    customFields: {
      item: [
        ['media:thumbnail', 'mediaThumbnail'],
      ]
    }
  });

  // BBC Education RSS Feed
  const FEED_URL = 'http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/education/rss.xml';
  
  try {
    const feed = await parser.parseURL(FEED_URL);
    const existingPosts = getBlogPosts();
    const existingUrls = new Set(existingPosts.map(p => p.sourceUrl));
    
    // Get up to 15 items and filter to find the next 5 unseen ones
    const topArticles = feed.items.slice(0, 15).filter(item => item.link && !existingUrls.has(item.link)).slice(0, 5);
    const newPosts: BlogPost[] = [];

    for (const item of topArticles) {
      if (!item.link || existingUrls.has(item.link)) continue;

      const title = item.title || 'Untitled';
      const snippet = item.contentSnippet || item.content || 'No content available.';
      
      // Extract image and upgrade resolution from 240px to 976px for crisp quality
      let imageUrl = '/images/background/image-1.jpg'; // fallback
      if (item.mediaThumbnail && item.mediaThumbnail['$'] && item.mediaThumbnail['$'].url) {
        imageUrl = item.mediaThumbnail['$'].url;
        imageUrl = imageUrl.replace('/240/', '/976/'); // Force HD resolution
      }

      // Rephrase with AI
      const rephrased = await rephraseWithAI(title, snippet);
      const slug = generateSlug(rephrased.title);
      const uniqueId = item.guid || item.link || slug;

      const post: BlogPost = {
        id: Buffer.from(uniqueId).toString('base64').replace(/[^a-zA-Z0-9]/g, ''),
        slug,
        originalTitle: title,
        rephrasedTitle: rephrased.title,
        originalContent: snippet,
        rephrasedContent: rephrased.content,
        imageUrl,
        publishedAt: item.isoDate || new Date().toISOString(),
        sourceUrl: item.link
      };

      newPosts.push(post);
    }

    if (newPosts.length > 0) {
      const updatedPosts = [...newPosts, ...existingPosts];
      fs.writeFileSync(BLOG_DATA_FILE, JSON.stringify(updatedPosts, null, 2));
      return { success: true, added: newPosts.length, message: `Added ${newPosts.length} new blog posts.` };
    } else {
      return { success: true, added: 0, message: "No new articles to sync." };
    }

  } catch (error) {
    console.error("Error syncing BBC News:", error);
    return { success: false, added: 0, message: "Error syncing from BBC." };
  }
}
