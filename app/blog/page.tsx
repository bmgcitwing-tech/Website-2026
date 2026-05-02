import { getBlogPosts } from "@/lib/blog";
import Link from "next/link";
import Image from "next/image";

// Revalidate every 1 hour in production
export const revalidate = 3600;

export default function BlogPage() {
  const posts = getBlogPosts();

  return (
    <>
      {/* Header Banner */}
      <section style={{ padding: "160px 0 80px", background: "var(--bg-0)", position: "relative", overflow: "hidden", textAlign: "center" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 80% 50% at 50% 0%, rgba(241,200,82,0.06), transparent 70%)" }} />
        <div style={{ position: "relative", zIndex: 1, maxWidth: 800, margin: "0 auto", padding: "0 24px" }}>
          <div className="tag" style={{ marginBottom: 16 }}>International Education</div>
          <h1 style={{ fontSize: "clamp(36px, 5vw, 64px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 20 }}>
            Our <span className="gold-text">Blog</span>
          </h1>
          <p style={{ fontSize: 18, color: "var(--muted)", lineHeight: 1.7 }}>
            Stay updated with the latest news on global education, university updates, and study abroad guides — powered by BBC News.
          </p>
        </div>
      </section>

      {/* Blog Grid */}
      <section style={{ padding: "80px 0 120px", background: "var(--bg-1)" }}>
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px" }}>
          
          {posts.length === 0 ? (
            <div style={{ textAlign: "center", padding: "80px 0", color: "var(--muted)" }}>
              <p>No blog posts found yet.</p>
              <p style={{ fontSize: 14, marginTop: 12 }}>Developer note: Hit <code style={{ background: "rgba(255,255,255,0.1)", padding: "2px 6px", borderRadius: 4 }}>/api/cron/sync-blog</code> to fetch the latest news.</p>
            </div>
          ) : (
            <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fill, minmax(320px, 1fr))", gap: 32 }}>
              {posts.map((post) => (
                <Link key={post.id} href={`/blog/${post.slug}`} style={{ textDecoration: "none", display: "flex" }}>
                  <div className="glass service-card" style={{ display: "flex", flexDirection: "column", borderRadius: 24, overflow: "hidden", width: "100%", background: "var(--bg-2)", border: "1px solid var(--border)" }}>
                    <div style={{ position: "relative", width: "100%", aspectRatio: "16/9", background: "#1a1d27" }}>
                      <Image 
                        src={post.imageUrl} 
                        alt={post.rephrasedTitle} 
                        fill 
                        style={{ objectFit: "cover" }} 
                      />
                    </div>
                    <div style={{ padding: 24, display: "flex", flexDirection: "column", flex: 1 }}>
                      <div style={{ fontSize: 12, color: "#f1c852", fontWeight: 600, marginBottom: 12, textTransform: "uppercase", letterSpacing: "0.05em" }}>
                        {new Date(post.publishedAt).toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' })}
                      </div>
                      <h2 style={{ fontSize: 20, fontWeight: 700, color: "#f0f0f0", marginBottom: 12, lineHeight: 1.3 }}>
                        {post.rephrasedTitle}
                      </h2>
                      <p style={{ fontSize: 14, color: "var(--muted)", lineHeight: 1.6, flex: 1, display: "-webkit-box", WebkitLineClamp: 3, WebkitBoxOrient: "vertical", overflow: "hidden" }}>
                        {post.rephrasedContent}
                      </p>
                      <div style={{ marginTop: 24, fontSize: 14, fontWeight: 600, color: "#f1c852", display: "flex", alignItems: "center", gap: 6 }}>
                        Read Article
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" strokeWidth="2">
                          <path d="M2 7h10M8 3l4 4-4 4"/>
                        </svg>
                      </div>
                    </div>
                  </div>
                </Link>
              ))}
            </div>
          )}
          
        </div>
      </section>
    </>
  );
}
