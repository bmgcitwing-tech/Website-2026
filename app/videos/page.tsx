"use client";

import Image from "next/image";
import { motion } from "framer-motion";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

import { VIDEOS } from "@/lib/videos";
import { useState } from "react";

export default function VideosPage() {
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 20;

  const totalPages = Math.ceil(VIDEOS.length / itemsPerPage);
  const displayedVideos = VIDEOS.slice((currentPage - 1) * itemsPerPage, currentPage * itemsPerPage);

  return (
    <>
      <PageBanner
        title="Videos"
        subtitle="Student stories, success journeys, and study abroad guides from the BM Global community."
        breadcrumbs={[{ label: "Videos" }]}
      />

      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Student Stories</div>
            <h2 style={{ fontSize: "clamp(28px, 4vw, 48px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 12 }}>
              Hear From Our <span className="gold-text">Community</span>
            </h2>
            <p style={{ fontSize: 16, color: "rgba(240,240,240,0.5)", maxWidth: 480, margin: "0 auto", lineHeight: 1.7 }}>
              Real stories from students who trusted us to guide their study abroad journey.
            </p>
          </FadeUp>

          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fill, minmax(280px, 1fr))", gap: 20 }}>
            {displayedVideos.map((video, i) => (
              <FadeUp key={`${video.id}-${i}`} delay={(i % itemsPerPage) * 0.06}>
                <motion.a
                  href={`https://www.youtube.com/watch?v=${video.id}`}
                  target="_blank" rel="noopener noreferrer"
                  whileHover={{ y: -8 }}
                  transition={{ type: "spring", stiffness: 300, damping: 20 }}
                  style={{ display: "block", borderRadius: 20, overflow: "hidden", border: "1px solid rgba(255,255,255,0.07)", textDecoration: "none", transition: "border-color 0.3s" }}
                  onMouseEnter={e => (e.currentTarget.style.borderColor = "rgba(241,200,82,0.25)")}
                  onMouseLeave={e => (e.currentTarget.style.borderColor = "rgba(255,255,255,0.07)")}
                >
                  {/* Thumbnail */}
                  <div style={{ position: "relative", aspectRatio: "16/9" }}>
                    <Image
                      src={`https://img.youtube.com/vi/${video.id}/hqdefault.jpg`}
                      alt={video.title} fill style={{ objectFit: "cover" }}
                    />
                    <div style={{ position: "absolute", inset: 0, background: "rgba(0,0,0,0.35)" }} />
                    <div style={{ position: "absolute", inset: 0, display: "flex", alignItems: "center", justifyContent: "center" }}>
                      <div className="play-btn">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="#080910">
                          <path d="M8 5.5l9 5.5-9 5.5V5.5z"/>
                        </svg>
                      </div>
                    </div>
                  </div>
                  {/* Info */}
                  <div style={{ padding: "16px 20px", background: "var(--bg-2)" }}>
                    <div style={{ fontSize: 14, fontWeight: 700, color: "#f0f0f0", marginBottom: 4, lineHeight: 1.4 }}>{video.title}</div>
                    <div style={{ fontSize: 12, color: "rgba(240,240,240,0.45)", lineHeight: 1.5 }}>{video.desc}</div>
                    <div style={{ fontSize: 11, color: "rgba(241,200,82,0.6)", marginTop: 8, fontWeight: 600 }}>BM Global Careers · YouTube</div>
                  </div>
                </motion.a>
              </FadeUp>
            ))}
          </div>

          {totalPages > 1 && (
            <FadeUp style={{ display: "flex", justifyContent: "center", alignItems: "center", gap: 16, marginTop: 48 }}>
              <button
                onClick={() => setCurrentPage(p => Math.max(1, p - 1))}
                disabled={currentPage === 1}
                className="btn-outline"
                style={{ padding: "8px 16px", opacity: currentPage === 1 ? 0.5 : 1, cursor: currentPage === 1 ? "not-allowed" : "pointer" }}
              >
                Previous
              </button>
              <div style={{ color: "rgba(240,240,240,0.6)", fontSize: 14 }}>
                Page <span style={{ color: "#f1c852", fontWeight: 700 }}>{currentPage}</span> of {totalPages}
              </div>
              <button
                onClick={() => setCurrentPage(p => Math.min(totalPages, p + 1))}
                disabled={currentPage === totalPages}
                className="btn-outline"
                style={{ padding: "8px 16px", opacity: currentPage === totalPages ? 0.5 : 1, cursor: currentPage === totalPages ? "not-allowed" : "pointer" }}
              >
                Next
              </button>
            </FadeUp>
          )}

          <FadeUp style={{ textAlign: "center", marginTop: 56 }}>
            <p style={{ color: "rgba(240,240,240,0.4)", fontSize: 15, marginBottom: 20 }}>
              Subscribe to our YouTube channel for more student stories, guides, and community updates.
            </p>
            <a href="https://www.youtube.com/c/BritainilMaduraikaran" target="_blank" rel="noopener noreferrer" className="btn-gold">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style={{ marginRight: 4 }}>
                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.97C5.12 20 12 20 12 20s6.88 0 8.59-.45a2.78 2.78 0 0 0 1.95-1.97A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/>
                <polygon points="9.75,15.02 15.5,12 9.75,8.98" fill="white"/>
              </svg>
              Subscribe on YouTube
            </a>
          </FadeUp>
        </div>
      </section>
    </>
  );
}
