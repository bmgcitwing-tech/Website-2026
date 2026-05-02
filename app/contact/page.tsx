"use client";

import Link from "next/link";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

const INFO = [
  {
    icon: (
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f1c852" strokeWidth="2">
        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
      </svg>
    ),
    title: "Head Office",
    lines: ["Manchester, United Kingdom"],
  },
  {
    icon: (
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f1c852" strokeWidth="2">
        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.62 3.4 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.5a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 21.5 16z"/>
      </svg>
    ),
    title: "Phone (WhatsApp Only)",
    lines: ["+44 7448 168104", "+44 7823 542140"],
    links: ["https://wa.me/447448168104", "https://wa.me/447823542140"],
  },
  {
    icon: (
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f1c852" strokeWidth="2">
        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
      </svg>
    ),
    title: "Email",
    lines: ["admissions@bmglobalcareers.com", "info@bmglobalcareers.com"],
    links: ["mailto:admissions@bmglobalcareers.com", "mailto:info@bmglobalcareers.com"],
  },
  {
    icon: (
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f1c852" strokeWidth="2">
        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
      </svg>
    ),
    title: "Office Hours (IST)",
    lines: ["Mon – Fri: 10:00 AM – 7:00 PM", "Sat – Sun: 10:00 AM – 4:00 PM"],
  },
];

const SOCIALS = [
  { href: "https://www.facebook.com/britainmaduraikaran/", label: "Facebook", path: "M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" },
  { href: "https://www.instagram.com/britainilmaduraikaran/", label: "Instagram" },
  { href: "https://www.youtube.com/c/BritainilMaduraikaran", label: "YouTube" },
];

export default function ContactPage() {
  return (
    <>
      <PageBanner
        title="Contact Us"
        subtitle="We are here for you — get in touch today. Free counselling, no obligations."
        breadcrumbs={[{ label: "Contact" }]}
      />

      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(320px, 1fr))", gap: 56 }}>

            {/* Left — Info */}
            <FadeUp>
              <h2 style={{ fontSize: "clamp(26px, 3vw, 40px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 10 }}>
                Get In Touch
              </h2>
              <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 15, lineHeight: 1.7, marginBottom: 36 }}>
                Whether you have a question, want to book a free session, or just want to say hello — we are always happy to hear from you.
              </p>

              <div style={{ display: "flex", flexDirection: "column", gap: 16 }}>
                {INFO.map((item) => (
                  <div key={item.title} className="glass" style={{ padding: "20px 24px", borderRadius: 18, display: "flex", gap: 18, alignItems: "flex-start" }}>
                    <div style={{ minWidth: 44, height: 44, borderRadius: 12, background: "rgba(241,200,82,0.08)", border: "1px solid rgba(241,200,82,0.15)", display: "flex", alignItems: "center", justifyContent: "center", flexShrink: 0 }}>
                      {item.icon}
                    </div>
                    <div>
                      <div style={{ fontSize: 14, fontWeight: 600, color: "#f0f0f0", marginBottom: 4 }}>{item.title}</div>
                      {item.lines.map((line, i) => (
                        item.links?.[i] ? (
                          <a key={i} href={item.links[i]} target="_blank" rel="noopener noreferrer"
                            style={{ display: "block", fontSize: 13, color: "rgba(240,240,240,0.55)", textDecoration: "none", lineHeight: 1.6, transition: "color 0.2s" }}
                            onMouseEnter={e => (e.currentTarget.style.color = "#f1c852")}
                            onMouseLeave={e => (e.currentTarget.style.color = "rgba(240,240,240,0.55)")}>
                            {line}
                          </a>
                        ) : (
                          <div key={i} style={{ fontSize: 13, color: "rgba(240,240,240,0.55)", lineHeight: 1.6 }}>{line}</div>
                        )
                      ))}
                    </div>
                  </div>
                ))}

                {/* Social */}
                <div className="glass" style={{ padding: "20px 24px", borderRadius: 18 }}>
                  <div style={{ fontSize: 14, fontWeight: 600, color: "#f0f0f0", marginBottom: 14 }}>Follow Us</div>
                  <div style={{ display: "flex", flexWrap: "wrap", gap: 10 }}>
                    {SOCIALS.map((s) => (
                      <a key={s.label} href={s.href} target="_blank" rel="noopener noreferrer"
                        style={{ display: "flex", alignItems: "center", gap: 8, padding: "8px 16px", borderRadius: 10, background: "rgba(255,255,255,0.04)", border: "1px solid rgba(255,255,255,0.08)", color: "rgba(240,240,240,0.6)", fontSize: 13, textDecoration: "none", transition: "all 0.2s" }}
                        onMouseEnter={e => { (e.currentTarget as HTMLElement).style.color = "#f1c852"; (e.currentTarget as HTMLElement).style.borderColor = "rgba(241,200,82,0.25)"; }}
                        onMouseLeave={e => { (e.currentTarget as HTMLElement).style.color = "rgba(240,240,240,0.6)"; (e.currentTarget as HTMLElement).style.borderColor = "rgba(255,255,255,0.08)"; }}>
                        {s.label === "Facebook" && (
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        )}
                        {s.label === "Instagram" && (
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                        )}
                        {s.label === "YouTube" && (
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.97C5.12 20 12 20 12 20s6.88 0 8.59-.45a2.78 2.78 0 0 0 1.95-1.97A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75,15.02 15.5,12 9.75,8.98" fill="white"/></svg>
                        )}
                        {s.label}
                      </a>
                    ))}
                  </div>
                </div>
              </div>
            </FadeUp>

            {/* Right — Map + CTA */}
            <FadeUp delay={0.15}>
              <div style={{ borderRadius: 20, overflow: "hidden", border: "1px solid rgba(255,255,255,0.08)", marginBottom: 20, height: 320 }}>
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d75870.27890975!2d-2.2901228!3d53.4807593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487a4d4c5226f16b%3A0xd87f9f5f2fe65b61!2sManchester%2C%20UK!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
                  width="100%" height="100%" style={{ border: 0, display: "block" }}
                  allowFullScreen loading="lazy" referrerPolicy="no-referrer-when-downgrade"
                />
              </div>

              <div className="glass-gold" style={{ padding: 36, borderRadius: 24, textAlign: "center" }}>
                <h3 style={{ fontSize: "clamp(20px, 3vw, 28px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 10 }}>Ready to Start?</h3>
                <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 14, lineHeight: 1.7, marginBottom: 24 }}>
                  Book your free 30-minute counselling session now. No obligation, completely free.
                </p>
                <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw"
                  target="_blank" rel="noopener noreferrer" className="btn-gold"
                  style={{ display: "flex", justifyContent: "center", width: "100%" }}>
                  Enquire Now — It&rsquo;s Free
                </a>
                <p style={{ fontSize: 12, color: "rgba(240,240,240,0.3)", marginTop: 14 }}>
                  Or WhatsApp: +44 7448 168104
                </p>
              </div>
            </FadeUp>
          </div>
        </div>
      </section>
    </>
  );
}
