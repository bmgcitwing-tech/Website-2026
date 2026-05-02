"use client";

import Link from "next/link";
import Image from "next/image";

export default function Footer() {
  return (
    <footer style={{ background: "#050608", borderTop: "1px solid rgba(255,255,255,0.06)", position: "relative", overflow: "hidden" }}>
      {/* Subtle top glow */}
      <div style={{ position: "absolute", top: 0, left: 0, right: 0, height: 1, background: "linear-gradient(90deg, transparent, rgba(241,200,82,0.15), transparent)" }} />
      <div style={{ position: "absolute", top: 0, left: "50%", transform: "translateX(-50%)", width: 600, height: 200, background: "radial-gradient(ellipse, rgba(241,200,82,0.03), transparent 70%)", pointerEvents: "none" }} />

      <div style={{ maxWidth: 1280, margin: "0 auto", padding: "72px 24px 40px" }}>
        <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(200px, 1fr))", gap: 48, marginBottom: 64 }}>

          {/* Brand col */}
          <div style={{ gridColumn: "span 1" }}>
            <div style={{ marginBottom: 20 }}>
              <Image src="/images/new_logo.PNG" alt="BM Global Careers" width={220} height={70} style={{ objectFit: 'contain' }} />
            </div>
            <p style={{ fontSize: 13, color: "rgba(240,240,240,0.45)", lineHeight: 1.8, marginBottom: 24 }}>
              A community of brothers and sisters to motivate and help you chase your dreams and live your passion. We listen, advise and guide your aspirations to study abroad.
            </p>
            {/* Social */}
            <div style={{ display: "flex", gap: 10 }}>
              {[
                { href: "https://www.facebook.com/britainmaduraikaran/", label: "Facebook", path: "M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" },
                { href: "https://www.instagram.com/britainilmaduraikaran/", label: "Instagram", svg: true },
                { href: "https://www.youtube.com/c/BritainilMaduraikaran", label: "YouTube", ytube: true },
              ].map((s) => (
                <a key={s.label} href={s.href} target="_blank" rel="noopener noreferrer" aria-label={s.label}
                  style={{ width: 36, height: 36, borderRadius: 10, background: "rgba(255,255,255,0.04)", border: "1px solid rgba(255,255,255,0.08)",
                    display: "flex", alignItems: "center", justifyContent: "center", color: "rgba(240,240,240,0.55)", textDecoration: "none", transition: "all 0.2s" }}
                  onMouseEnter={e => { (e.currentTarget as HTMLAnchorElement).style.background = "rgba(241,200,82,0.1)"; (e.currentTarget as HTMLAnchorElement).style.color = "#f1c852"; (e.currentTarget as HTMLAnchorElement).style.borderColor = "rgba(241,200,82,0.25)"; }}
                  onMouseLeave={e => { (e.currentTarget as HTMLAnchorElement).style.background = "rgba(255,255,255,0.04)"; (e.currentTarget as HTMLAnchorElement).style.color = "rgba(240,240,240,0.55)"; (e.currentTarget as HTMLAnchorElement).style.borderColor = "rgba(255,255,255,0.08)"; }}
                >
                  {s.ytube ? (
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.97C5.12 20 12 20 12 20s6.88 0 8.59-.45a2.78 2.78 0 0 0 1.95-1.97A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/>
                      <polygon points="9.75,15.02 15.5,12 9.75,8.98" fill="white"/>
                    </svg>
                  ) : s.svg ? (
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <rect x="2" y="2" width="20" height="20" rx="5"/>
                      <circle cx="12" cy="12" r="4"/>
                      <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                    </svg>
                  ) : (
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                      <path d={s.path}/>
                    </svg>
                  )}
                </a>
              ))}
            </div>
          </div>

          {/* Explore */}
          <div>
            <h4 style={{ fontSize: 13, fontWeight: 700, color: "#f0f0f0", letterSpacing: "0.08em", textTransform: "uppercase", marginBottom: 20 }}>Explore</h4>
            <div style={{ display: "flex", flexDirection: "column", gap: 10 }}>
              {[
                { href: "/", label: "Home" },
                { href: "/about", label: "About Us" },
                { href: "/process", label: "The Process" },
                { href: "/services", label: "Services" },
                { href: "/videos", label: "Videos" },
                { href: "/contact", label: "Contact" },
              ].map((l) => (
                <Link key={l.href} href={l.href}
                  style={{ fontSize: 14, color: "rgba(240,240,240,0.45)", textDecoration: "none", transition: "color 0.2s" }}
                  onMouseEnter={e => (e.currentTarget.style.color = "#f1c852")}
                  onMouseLeave={e => (e.currentTarget.style.color = "rgba(240,240,240,0.45)")}
                >{l.label}</Link>
              ))}
            </div>
          </div>

          {/* Services */}
          <div>
            <h4 style={{ fontSize: 13, fontWeight: 700, color: "#f0f0f0", letterSpacing: "0.08em", textTransform: "uppercase", marginBottom: 20 }}>Services</h4>
            <div style={{ display: "flex", flexDirection: "column", gap: 10 }}>
              {[
                { href: "/services/education-loan", label: "Education Loan" },
                { href: "https://bmglobal.studentacco.com/", label: "Accommodation" },
                { href: "/services/insurance", label: "Insurance" },
                { href: "/services/career-assistance", label: "Career Assistance" },
                { href: "/services/free-counselling", label: "Free Counselling" },
                { href: "/services/financial-assistance", label: "Financial Assistance" },
              ].map((l) => (
                l.href.startsWith("http") ? (
                  <a key={l.href} href={l.href} target="_blank" rel="noopener noreferrer"
                    style={{ fontSize: 14, color: "rgba(240,240,240,0.45)", textDecoration: "none", transition: "color 0.2s" }}
                    onMouseEnter={e => (e.currentTarget.style.color = "#f1c852")}
                    onMouseLeave={e => (e.currentTarget.style.color = "rgba(240,240,240,0.45)")}
                  >{l.label}</a>
                ) : (
                  <Link key={l.href} href={l.href}
                    style={{ fontSize: 14, color: "rgba(240,240,240,0.45)", textDecoration: "none", transition: "color 0.2s" }}
                    onMouseEnter={e => (e.currentTarget.style.color = "#f1c852")}
                    onMouseLeave={e => (e.currentTarget.style.color = "rgba(240,240,240,0.45)")}
                  >{l.label}</Link>
                )
              ))}
            </div>
          </div>

          {/* Contact */}
          <div>
            <h4 style={{ fontSize: 13, fontWeight: 700, color: "#f0f0f0", letterSpacing: "0.08em", textTransform: "uppercase", marginBottom: 20 }}>Contact</h4>
            <div style={{ display: "flex", flexDirection: "column", gap: 14 }}>
              <div style={{ display: "flex", gap: 10 }}>
                <div style={{ minWidth: 32, height: 32, borderRadius: 8, background: "rgba(241,200,82,0.08)", display: "flex", alignItems: "center", justifyContent: "center" }}>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f1c852" strokeWidth="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                  </svg>
                </div>
                <div>
                  <div style={{ fontSize: 13, color: "#f0f0f0", fontWeight: 500 }}>Head Office</div>
                  <div style={{ fontSize: 12, color: "rgba(240,240,240,0.45)", lineHeight: 1.5 }}>Manchester, United Kingdom</div>
                </div>
              </div>
              <div style={{ display: "flex", gap: 10 }}>
                <div style={{ minWidth: 32, height: 32, borderRadius: 8, background: "rgba(241,200,82,0.08)", display: "flex", alignItems: "center", justifyContent: "center" }}>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f1c852" strokeWidth="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                  </svg>
                </div>
                <div>
                  <a href="mailto:admissions@bmglobalcareers.com" style={{ fontSize: 12, color: "rgba(240,240,240,0.55)", textDecoration: "none", display: "block", lineHeight: 1.5 }}>admissions@bmglobalcareers.com</a>
                  <a href="mailto:info@bmglobalcareers.com" style={{ fontSize: 12, color: "rgba(240,240,240,0.45)", textDecoration: "none", display: "block", lineHeight: 1.5 }}>info@bmglobalcareers.com</a>
                </div>
              </div>
              <div style={{ display: "flex", gap: 10 }}>
                <div style={{ minWidth: 32, height: 32, borderRadius: 8, background: "rgba(241,200,82,0.08)", display: "flex", alignItems: "center", justifyContent: "center" }}>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f1c852" strokeWidth="2">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.62 3.4 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.5a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 21.5 16z"/>
                  </svg>
                </div>
                <div>
                  <div style={{ fontSize: 11, color: "rgba(240,240,240,0.35)", marginBottom: 2 }}>WhatsApp Only</div>
                  <div style={{ fontSize: 12, color: "rgba(240,240,240,0.55)" }}>+44 7448 168104</div>
                  <div style={{ fontSize: 12, color: "rgba(240,240,240,0.55)" }}>+44 7823 542140</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* Bottom bar */}
        <div style={{ borderTop: "1px solid rgba(255,255,255,0.05)", paddingTop: 24, display: "flex", flexWrap: "wrap", justifyContent: "space-between", alignItems: "center", gap: 12 }}>
          <p style={{ fontSize: 13, color: "rgba(240,240,240,0.3)" }}>
            © 2024 BM Global Careers. All rights reserved.
          </p>
          <p style={{ fontSize: 13, color: "rgba(240,240,240,0.25)" }}>
            Designed with ♥ by <a href="https://www.knocktheglobe.com/" target="_blank" rel="noopener noreferrer" style={{ color: "#f1c852", textDecoration: "none" }}>KTG</a>
          </p>
        </div>
      </div>
    </footer>
  );
}
