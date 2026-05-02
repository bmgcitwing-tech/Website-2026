"use client";

import Link from "next/link";
import { motion } from "framer-motion";

interface Props {
  title: string;
  subtitle?: string;
  breadcrumbs?: { label: string; href?: string }[];
}

export default function PageBanner({ title, subtitle, breadcrumbs = [] }: Props) {
  return (
    <section style={{
      position: "relative", paddingTop: 140, paddingBottom: 72,
      overflow: "hidden", background: "var(--bg-1)",
    }}>
      {/* Glow */}
      <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 70% 60% at 50% 0%, rgba(241,200,82,0.07) 0%, transparent 70%)" }} />
      {/* Grid */}
      <div className="grid-bg" style={{ position: "absolute", inset: 0, opacity: 0.4 }} />
      {/* Bottom line */}
      <div style={{ position: "absolute", bottom: 0, left: 0, right: 0, height: 1, background: "linear-gradient(90deg, transparent, rgba(241,200,82,0.2), transparent)" }} />

      <div style={{ position: "relative", zIndex: 10, maxWidth: 860, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
        {/* Breadcrumb */}
        {breadcrumbs.length > 0 && (
          <motion.div
            initial={{ opacity: 0, y: 8 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.4 }}
            style={{ display: "flex", alignItems: "center", justifyContent: "center", gap: 8, marginBottom: 20, fontSize: 13, color: "rgba(240,240,240,0.4)" }}
          >
            <Link href="/" style={{ color: "rgba(240,240,240,0.4)", textDecoration: "none", transition: "color 0.2s" }}
              onMouseEnter={e => (e.currentTarget.style.color = "#f1c852")}
              onMouseLeave={e => (e.currentTarget.style.color = "rgba(240,240,240,0.4)")}>
              Home
            </Link>
            {breadcrumbs.map((crumb, i) => (
              <span key={i} style={{ display: "flex", alignItems: "center", gap: 8 }}>
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" strokeWidth="1.5">
                  <path d="M4 2l4 4-4 4"/>
                </svg>
                {crumb.href ? (
                  <Link href={crumb.href} style={{ color: "rgba(240,240,240,0.5)", textDecoration: "none" }}>{crumb.label}</Link>
                ) : (
                  <span style={{ color: "rgba(240,240,240,0.7)" }}>{crumb.label}</span>
                )}
              </span>
            ))}
          </motion.div>
        )}

        {/* Title */}
        <motion.h1
          initial={{ opacity: 0, y: 28 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.65, delay: 0.1, ease: [0.22, 1, 0.36, 1] }}
          style={{ fontSize: "clamp(36px, 6vw, 72px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16, letterSpacing: "-0.03em" }}
        >
          {title}
        </motion.h1>

        {/* Subtitle */}
        {subtitle && (
          <motion.p
            initial={{ opacity: 0, y: 16 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.6, delay: 0.2 }}
            style={{ fontSize: "clamp(15px, 2vw, 18px)", color: "rgba(240,240,240,0.5)", lineHeight: 1.7, maxWidth: 600, margin: "0 auto" }}
          >
            {subtitle}
          </motion.p>
        )}

        {/* Gold accent line */}
        <motion.div
          initial={{ scaleX: 0 }} animate={{ scaleX: 1 }} transition={{ duration: 0.8, delay: 0.35 }}
          style={{ width: 80, height: 3, background: "linear-gradient(90deg, transparent, #f1c852, transparent)", margin: "24px auto 0", borderRadius: 2 }}
        />
      </div>
    </section>
  );
}
