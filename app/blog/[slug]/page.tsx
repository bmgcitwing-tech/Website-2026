import { getBlogPosts } from "@/lib/blog";
import { notFound } from "next/navigation";
import Image from "next/image";
import Link from "next/link";

export async function generateStaticParams() {
  const posts = getBlogPosts();
  return posts.map((post) => ({
    slug: post.slug,
  }));
}

export default async function BlogPostPage({ params }: { params: Promise<{ slug: string }> }) {
  const resolvedParams = await params;
  const posts = getBlogPosts();
  const post = posts.find((p) => p.slug === resolvedParams.slug);

  if (!post) {
    notFound();
  }

  return (
    <article style={{ background: "var(--bg-0)", minHeight: "100vh", paddingBottom: 120 }}>
      {/* Header */}
      <section style={{ padding: "160px 0 60px", background: "var(--bg-1)", position: "relative", overflow: "hidden" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 60% 80% at 50% 0%, rgba(241,200,82,0.06), transparent 70%)" }} />
        <div style={{ maxWidth: 800, margin: "0 auto", padding: "0 24px", position: "relative", zIndex: 1 }}>
          <Link href="/blog" style={{ display: "inline-flex", alignItems: "center", gap: 8, color: "var(--muted)", textDecoration: "none", fontSize: 14, marginBottom: 32, fontWeight: 500 }}>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" strokeWidth="2">
              <path d="M14 8H2M8 14L2 8l6-6"/>
            </svg>
            Back to Blog
          </Link>
          
          <div style={{ display: "flex", alignItems: "center", gap: 12, marginBottom: 20 }}>
            <div className="tag">Education News</div>
            <div style={{ fontSize: 14, color: "var(--muted)" }}>
              {new Date(post.publishedAt).toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' })}
            </div>
          </div>
          
          <h1 style={{ fontSize: "clamp(32px, 5vw, 56px)", fontWeight: 800, color: "#f0f0f0", lineHeight: 1.2, marginBottom: 32 }}>
            {post.rephrasedTitle}
          </h1>
        </div>
      </section>

      {/* Featured Image */}
      <div style={{ maxWidth: 1000, margin: "0 auto", padding: "0 24px", transform: "translateY(-40px)", position: "relative", zIndex: 2 }}>
        <div style={{ position: "relative", width: "100%", aspectRatio: "16/9", borderRadius: 24, overflow: "hidden", boxShadow: "0 20px 40px rgba(0,0,0,0.3)" }}>
          <Image 
            src={post.imageUrl} 
            alt={post.rephrasedTitle} 
            fill 
            style={{ objectFit: "cover" }} 
            priority
          />
        </div>
      </div>

      {/* Content */}
      <div style={{ maxWidth: 720, margin: "0 auto", padding: "0 24px" }}>
        <div style={{ fontSize: 18, color: "var(--text)", lineHeight: 1.8, whiteSpace: "pre-wrap" }}>
          {post.rephrasedContent}
        </div>
        
        <div style={{ marginTop: 60, paddingTop: 40, borderTop: "1px solid var(--border)", display: "flex", justifyContent: "space-between", alignItems: "center", flexWrap: "wrap", gap: 20 }}>
          <div style={{ color: "var(--muted)", fontSize: 14 }}>
            Original source: <a href={post.sourceUrl} target="_blank" rel="noopener noreferrer" style={{ color: "#f1c852", textDecoration: "underline" }}>BBC News</a>
          </div>
          <Link href="/blog" className="btn-outline">Read More Articles</Link>
        </div>
      </div>
    </article>
  );
}
