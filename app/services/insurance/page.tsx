"use client";

import Image from "next/image";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

const WHY = [
  "Designed for international drivers — no UK credit history needed",
  "Fully digital, fast and easy to get a quote in minutes",
  "Competitive premiums with no hidden fees",
  "Exclusive £75 off for BM Global Careers community members",
];

const GUIDES = [
  { title: "How to Get Car Insurance as an International Student in the UK", desc: "A step-by-step guide for students new to driving in the UK." },
  { title: "Understanding No Claims Discount (NCD) as a New Driver", desc: "What you need to know about building your NCD from scratch." },
  { title: "Driving Licence Conversion: Indian Licence to UK Licence", desc: "Everything you need to know about converting your driving licence." },
];

export default function InsurancePage() {
  return (
    <>
      <PageBanner title="Insurance" subtitle="BM Global Careers × Marshmallow — Driving Forward Together." breadcrumbs={[{ label: "Services", href: "/services" }, { label: "Insurance" }]} />

      {/* Hero */}
      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))", gap: 64, alignItems: "center" }}>
            <FadeUp>
              <div className="glass" style={{ borderRadius: 24, padding: 48, display: "flex", flexDirection: "column", alignItems: "center", gap: 28, border: "1px solid rgba(255,255,255,0.08)" }}>
                <div style={{ position: "relative", width: "100%", maxWidth: 220, height: 80 }}>
                  <Image src="/images/marshmallow-logo.png" alt="Marshmallow Insurance" fill style={{ objectFit: "contain" }} />
                </div>
                <div className="glass-gold" style={{ width: "100%", borderRadius: 16, padding: "20px 24px", textAlign: "center" }}>
                  <p style={{ fontSize: 12, color: "rgba(240,240,240,0.5)", marginBottom: 6 }}>Exclusive Community Code</p>
                  <p style={{ fontSize: 26, fontWeight: 900, color: "#f1c852", letterSpacing: "0.12em" }}>BMGC_MM75</p>
                  <p style={{ fontSize: 13, color: "rgba(240,240,240,0.45)", marginTop: 4 }}>Save £75 on your first policy</p>
                </div>
              </div>
            </FadeUp>

            <FadeUp delay={0.15}>
              <div className="tag" style={{ marginBottom: 18 }}>Insurance Partner</div>
              <h2 style={{ fontSize: "clamp(26px, 4vw, 46px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 14, lineHeight: 1.12 }}>
                BM Global Careers <span className="gold-text">× Marshmallow</span>
              </h2>
              <div className="gold-line" style={{ marginBottom: 24 }} />
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 16 }}>
                We are proud to partner with <strong style={{ color: "#f0f0f0" }}>Marshmallow</strong> — one of the UK&rsquo;s fastest-growing and most innovative car insurance providers. Marshmallow was built specifically with international drivers in mind, making them the perfect partner for our community.
              </p>
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 32 }}>
                As a BM Global Careers community member, you get exclusive access to our partnership deal — use code <strong style={{ color: "#f1c852" }}>BMGC_MM75</strong> and save £75 on your first Marshmallow policy.
              </p>
              <div style={{ display: "flex", flexDirection: "column", gap: 8 }}>
                <a href="https://www.marshmallow.com" target="_blank" rel="noopener noreferrer" className="btn-gold" style={{ display: "inline-flex" }}>
                  Get Your Quote →
                </a>
                <p style={{ fontSize: 12, color: "rgba(240,240,240,0.35)", marginTop: 2 }}>
                  Use code <strong style={{ color: "#f1c852" }}>BMGC_MM75</strong> at checkout for £75 off
                </p>
              </div>
            </FadeUp>
          </div>
        </div>
      </section>

      {/* Why Marshmallow */}
      <section style={{ padding: "80px 0", background: "var(--bg-1)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Why Marshmallow</div>
            <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0" }}>Built for <span className="gold-text">International Drivers</span></h2>
          </FadeUp>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(280px, 1fr))", gap: 16, maxWidth: 900, margin: "0 auto" }}>
            {WHY.map((point, i) => (
              <FadeUp key={i} delay={i * 0.1}>
                <div className="glass service-card" style={{ padding: "20px 24px", borderRadius: 16, display: "flex", gap: 14, alignItems: "flex-start" }}>
                  <div style={{ width: 22, height: 22, borderRadius: "50%", background: "rgba(241,200,82,0.15)", border: "1.5px solid rgba(241,200,82,0.4)", display: "flex", alignItems: "center", justifyContent: "center", flexShrink: 0, marginTop: 1 }}>
                    <svg width="11" height="9" viewBox="0 0 11 9" fill="none"><path d="M1 4.5L4 7.5L10 1.5" stroke="#f1c852" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round"/></svg>
                  </div>
                  <p style={{ fontSize: 14, color: "rgba(240,240,240,0.7)", lineHeight: 1.65 }}>{point}</p>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* Guides */}
      <section style={{ padding: "80px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Helpful Resources</div>
            <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0" }}>Guides for <span className="gold-text">New Arrivals</span></h2>
          </FadeUp>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fill, minmax(280px, 1fr))", gap: 20 }}>
            {GUIDES.map((g, i) => (
              <FadeUp key={i} delay={i * 0.1}>
                <div className="glass service-card" style={{ padding: 28, borderRadius: 20, height: "100%" }}>
                  <div style={{ fontSize: 28, marginBottom: 16 }}>📖</div>
                  <h3 style={{ fontSize: 16, fontWeight: 700, color: "#f0f0f0", marginBottom: 10, lineHeight: 1.4 }}>{g.title}</h3>
                  <p style={{ fontSize: 13, color: "rgba(240,240,240,0.5)", lineHeight: 1.65, marginBottom: 18 }}>{g.desc}</p>
                  <div style={{ fontSize: 13, fontWeight: 600, color: "#f1c852" }}>Read Guide →</div>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section style={{ padding: "80px 0", background: "var(--bg-1)", position: "relative", overflow: "hidden" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 70% 70% at 50% 50%, rgba(241,200,82,0.06), transparent)" }} />
        <FadeUp style={{ position: "relative", zIndex: 1, maxWidth: 640, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>Ready to <span className="gold-text">Get Insured?</span></h2>
          <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 15, lineHeight: 1.7, marginBottom: 12 }}>Join the BM Global Careers community and get exclusive car insurance savings.</p>
          <div className="glass-gold" style={{ display: "inline-block", borderRadius: 12, padding: "10px 20px", marginBottom: 24 }}>
            <span style={{ fontSize: 13, color: "rgba(240,240,240,0.6)" }}>Your exclusive code: </span>
            <span style={{ fontSize: 16, fontWeight: 900, color: "#f1c852", letterSpacing: "0.08em" }}>BMGC_MM75</span>
          </div>
          <br />
          <a href="https://www.marshmallow.com" target="_blank" rel="noopener noreferrer" className="btn-gold">Get Quote via Marshmallow</a>
          <p style={{ fontSize: 12, color: "rgba(240,240,240,0.3)", marginTop: 14 }}>*£75 discount applied at checkout. Subject to eligibility and Marshmallow terms.</p>
        </FadeUp>
      </section>
    </>
  );
}
