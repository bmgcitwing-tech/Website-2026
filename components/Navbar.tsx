"use client";

import { useState, useEffect } from "react";
import Link from "next/link";
import Image from "next/image";
import { usePathname } from "next/navigation";
import { motion, AnimatePresence } from "framer-motion";

const services = [
  { href: "/services/education-loan", label: "Education Loan" },
  { href: "https://bmglobal.studentacco.com/", label: "Accommodation", external: true },
  { href: "/services/insurance", label: "Insurance" },
  { href: "/services/career-assistance", label: "Career Assistance" },
  { href: "/services/free-counselling", label: "Free Counselling" },
  { href: "/services/financial-assistance", label: "Financial Assistance" },
];

const navLinks = [
  { href: "/", label: "Home" },
  { href: "/about", label: "About" },
  { href: "/process", label: "Process" },
  { label: "Services", dropdown: true },
  { href: "/videos", label: "Videos" },
  { href: "/blog", label: "Blog" },
  { href: "/contact", label: "Contact" },
];

export default function Navbar() {
  const [scrolled, setScrolled] = useState(false);
  const [mobileOpen, setMobileOpen] = useState(false);
  const [dropOpen, setDropOpen] = useState(false);
  const [mobileServOpen, setMobileServOpen] = useState(false);
  const pathname = usePathname();

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 50);
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  useEffect(() => { setMobileOpen(false); }, [pathname]);

  const isActive = (href?: string) => href && pathname === href;

  return (
    <>
      <header
        style={{
          position: "fixed", top: 0, left: 0, right: 0, zIndex: 999,
          transition: "all 0.4s ease",
          background: scrolled ? "rgba(8,9,16,0.92)" : "transparent",
          backdropFilter: scrolled ? "blur(24px)" : "none",
          borderBottom: scrolled ? "1px solid rgba(255,255,255,0.06)" : "1px solid transparent",
          boxShadow: scrolled ? "0 4px 40px rgba(0,0,0,0.4)" : "none",
        }}
      >
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "flex", alignItems: "center", justifyContent: "space-between", height: 76 }}>

            {/* ── Logo ── */}
            <Link href="/" style={{ textDecoration: "none", display: "flex", alignItems: "center" }}>
              <Image src="/images/new_logo.PNG" alt="BM Global Careers" width={200} height={66} style={{ objectFit: 'contain' }} priority />
            </Link>

            {/* ── Desktop Nav ── */}
            <nav style={{ display: "flex", alignItems: "center", gap: 4 }} className="hidden lg:flex">
              {navLinks.map((link) =>
                link.dropdown ? (
                  <div
                    key="services"
                    style={{ position: "relative" }}
                    onMouseEnter={() => setDropOpen(true)}
                    onMouseLeave={() => setDropOpen(false)}
                  >
                    <button
                      style={{
                        display: "flex", alignItems: "center", gap: 5,
                        padding: "8px 16px", borderRadius: 10,
                        background: "none", border: "none", cursor: "pointer",
                        fontSize: 14, fontWeight: 500,
                        color: dropOpen ? "#f1c852" : "rgba(240,240,240,0.8)",
                        transition: "color 0.2s",
                      }}
                    >
                      Services
                      <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor"
                        style={{ transition: "transform 0.2s", transform: dropOpen ? "rotate(180deg)" : "none" }}>
                        <path d="M2 4l4 4 4-4"/>
                      </svg>
                    </button>

                    <AnimatePresence>
                      {dropOpen && (
                        <motion.div
                          initial={{ opacity: 0, y: 10, scale: 0.96 }}
                          animate={{ opacity: 1, y: 0, scale: 1 }}
                          exit={{ opacity: 0, y: 10, scale: 0.96 }}
                          transition={{ duration: 0.15, ease: "easeOut" }}
                          style={{
                            position: "absolute", top: "calc(100% + 8px)", left: "50%",
                            transform: "translateX(-50%)",
                            width: 220, background: "rgba(13,15,22,0.97)",
                            border: "1px solid rgba(255,255,255,0.09)",
                            borderRadius: 14, padding: 6,
                            boxShadow: "0 24px 60px rgba(0,0,0,0.6), 0 0 0 1px rgba(241,200,82,0.05)",
                          }}
                        >
                          {services.map((s) =>
                            s.external ? (
                              <a key={s.href} href={s.href} target="_blank" rel="noopener noreferrer"
                                style={dropItemStyle}>
                                {s.label}
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor" style={{ opacity: 0.5 }}>
                                  <path d="M3 1h6v6M9 1L1 9"/>
                                </svg>
                              </a>
                            ) : (
                              <Link key={s.href} href={s.href} style={dropItemStyle}>{s.label}</Link>
                            )
                          )}
                        </motion.div>
                      )}
                    </AnimatePresence>
                  </div>
                ) : (
                  <Link
                    key={link.href}
                    href={link.href!}
                    style={{
                      padding: "8px 16px", borderRadius: 10,
                      fontSize: 14, fontWeight: 500, textDecoration: "none",
                      color: isActive(link.href) ? "#f1c852" : "rgba(240,240,240,0.8)",
                      transition: "color 0.2s",
                    }}
                    onMouseEnter={e => (e.currentTarget.style.color = "#f1c852")}
                    onMouseLeave={e => (e.currentTarget.style.color = isActive(link.href) ? "#f1c852" : "rgba(240,240,240,0.8)")}
                  >
                    {link.label}
                  </Link>
                )
              )}
            </nav>

            {/* ── Right CTA ── */}
            <div className="hidden lg:flex" style={{ alignItems: "center", gap: 16 }}>
              <div style={{ textAlign: "right" }}>
                <div style={{ fontSize: 11, color: "rgba(240,240,240,0.4)", marginBottom: 2 }}>WhatsApp Only</div>
                <div style={{ fontSize: 13, color: "rgba(240,240,240,0.8)", fontWeight: 500 }}>+44 7448 168104</div>
              </div>
              <a
                href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw"
                target="_blank" rel="noopener noreferrer"
                className="btn-gold"
                style={{ padding: "10px 22px", fontSize: 13, borderRadius: 10 }}
              >
                Enquiry Now
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" strokeWidth="2">
                  <path d="M2 7h10M8 3l4 4-4 4"/>
                </svg>
              </a>
            </div>

            {/* ── Hamburger ── */}
            <button
              className="lg:hidden"
              onClick={() => setMobileOpen(!mobileOpen)}
              style={{
                width: 42, height: 42, borderRadius: 10,
                background: "rgba(255,255,255,0.05)",
                border: "1px solid rgba(255,255,255,0.09)",
                display: "flex", flexDirection: "column",
                alignItems: "center", justifyContent: "center",
                gap: 5, cursor: "pointer",
              }}
            >
              <span style={{ width: 20, height: 2, background: "#f0f0f0", borderRadius: 1, transition: "all 0.3s",
                transform: mobileOpen ? "rotate(45deg) translate(5px, 5px)" : "none" }} />
              <span style={{ width: 20, height: 2, background: "#f0f0f0", borderRadius: 1, transition: "all 0.3s",
                opacity: mobileOpen ? 0 : 1 }} />
              <span style={{ width: 20, height: 2, background: "#f0f0f0", borderRadius: 1, transition: "all 0.3s",
                transform: mobileOpen ? "rotate(-45deg) translate(5px, -5px)" : "none" }} />
            </button>
          </div>
        </div>
      </header>

      {/* ── Mobile Overlay ── */}
      <AnimatePresence>
        {mobileOpen && (
          <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }}
            onClick={() => setMobileOpen(false)}
            style={{ position: "fixed", inset: 0, zIndex: 998, background: "rgba(0,0,0,0.7)", backdropFilter: "blur(4px)" }}
          />
        )}
      </AnimatePresence>

      {/* ── Mobile Drawer ── */}
      <AnimatePresence>
        {mobileOpen && (
          <motion.div
            initial={{ x: "100%" }} animate={{ x: 0 }} exit={{ x: "100%" }}
            transition={{ type: "spring", damping: 28, stiffness: 220 }}
            style={{
              position: "fixed", top: 0, right: 0, bottom: 0, zIndex: 999,
              width: 300, background: "rgba(10,11,16,0.98)",
              borderLeft: "1px solid rgba(255,255,255,0.08)",
              backdropFilter: "blur(30px)", display: "flex", flexDirection: "column",
            }}
          >
            <div style={{ padding: "24px 24px 16px", borderBottom: "1px solid rgba(255,255,255,0.06)",
              display: "flex", alignItems: "center", justifyContent: "space-between" }}>
              <div style={{ display: "flex", alignItems: "center" }}>
                <Image src="/images/new_logo.PNG" alt="BM Global Careers" width={140} height={46} style={{ objectFit: 'contain' }} />
              </div>
              <button onClick={() => setMobileOpen(false)} style={{ background: "none", border: "none", cursor: "pointer", color: "rgba(240,240,240,0.6)", padding: 4 }}>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" strokeWidth="2">
                  <path d="M3 3l14 14M17 3L3 17"/>
                </svg>
              </button>
            </div>

            <nav style={{ flex: 1, overflowY: "auto", padding: "16px 12px" }}>
              {navLinks.map((link) =>
                link.dropdown ? (
                  <div key="services-mobile">
                    <button onClick={() => setMobileServOpen(!mobileServOpen)}
                      style={{ width: "100%", display: "flex", alignItems: "center", justifyContent: "space-between",
                        padding: "12px 16px", borderRadius: 10, background: "none", border: "none", cursor: "pointer",
                        fontSize: 15, fontWeight: 500, color: "rgba(240,240,240,0.8)" }}>
                      Services
                      <svg width="14" height="14" viewBox="0 0 12 12" fill="currentColor"
                        style={{ transition: "transform 0.2s", transform: mobileServOpen ? "rotate(180deg)" : "none" }}>
                        <path d="M2 4l4 4 4-4"/>
                      </svg>
                    </button>
                    <AnimatePresence>
                      {mobileServOpen && (
                        <motion.div initial={{ height: 0, opacity: 0 }} animate={{ height: "auto", opacity: 1 }}
                          exit={{ height: 0, opacity: 0 }} style={{ overflow: "hidden", paddingLeft: 16 }}>
                          {services.map((s) =>
                            s.external ? (
                              <a key={s.href} href={s.href} target="_blank" rel="noopener noreferrer"
                                style={mobileItemStyle}>{s.label}</a>
                            ) : (
                              <Link key={s.href} href={s.href} style={mobileItemStyle}>{s.label}</Link>
                            )
                          )}
                        </motion.div>
                      )}
                    </AnimatePresence>
                  </div>
                ) : (
                  <Link key={link.href} href={link.href!}
                    style={{ display: "block", padding: "12px 16px", borderRadius: 10,
                      fontSize: 15, fontWeight: 500, color: isActive(link.href) ? "#f1c852" : "rgba(240,240,240,0.8)",
                      textDecoration: "none", transition: "all 0.2s" }}>
                    {link.label}
                  </Link>
                )
              )}
            </nav>

            <div style={{ padding: "16px 24px 32px", borderTop: "1px solid rgba(255,255,255,0.06)", display: "flex", flexDirection: "column", gap: 12 }}>
              <div style={{ fontSize: 13, color: "rgba(240,240,240,0.5)", textAlign: "center" }}>WhatsApp: +44 7448 168104</div>
              <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw"
                target="_blank" rel="noopener noreferrer" className="btn-gold"
                style={{ justifyContent: "center", borderRadius: 12 }}>
                Enquiry Now →
              </a>
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </>
  );
}

const dropItemStyle: React.CSSProperties = {
  display: "flex", alignItems: "center", justifyContent: "space-between",
  padding: "10px 14px", borderRadius: 9, fontSize: 13, fontWeight: 500,
  color: "rgba(240,240,240,0.75)", textDecoration: "none",
  transition: "all 0.15s",
};

const mobileItemStyle: React.CSSProperties = {
  display: "block", padding: "10px 16px", borderRadius: 8,
  fontSize: 14, color: "rgba(240,240,240,0.65)", textDecoration: "none",
};
