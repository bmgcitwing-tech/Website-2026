"use client";

import Image from "next/image";
import Link from "next/link";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

const STEPS = [
  { n: "01", title: "Book Your Free Session", desc: "Fill the enquiry form — no fee, no commitment required." },
  { n: "02", title: "30-Min Online Call", desc: "Connect with our expert counsellor via WhatsApp or video call." },
  { n: "03", title: "Get Your Roadmap", desc: "Receive a personalised plan — courses, universities, timelines." },
  { n: "04", title: "We Stay With You", desc: "We guide you at every step until you land at your destination." },
];

export default function FreeCounsellingPage() {
  return (
    <>
      <PageBanner title="Free Counselling" subtitle="Your study abroad journey starts here — completely free, always." breadcrumbs={[{ label: "Services", href: "/services" }, { label: "Free Counselling" }]} />

      {/* Hero section */}
      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))", gap: 64, alignItems: "center" }}>
            <FadeUp>
              <div style={{ borderRadius: 24, overflow: "hidden", aspectRatio: "4/5", border: "1px solid rgba(255,255,255,0.08)", position: "relative" }}>
                <Image src="/images/resource/featured-image-17.jpg" alt="Free Counselling" fill style={{ objectFit: "cover" }} />
                <div style={{ position: "absolute", inset: 0, background: "linear-gradient(to top, rgba(8,9,16,0.6), transparent 50%)" }} />
                <div className="glass-gold" style={{ position: "absolute", bottom: 20, left: 20, right: 20, borderRadius: 16, padding: "14px 18px", textAlign: "center" }}>
                  <div style={{ fontSize: 20, fontWeight: 800, color: "#f1c852" }}>100% Free</div>
                  <div style={{ fontSize: 12, color: "rgba(240,240,240,0.6)", marginTop: 3 }}>Always. No hidden charges.</div>
                </div>
              </div>
            </FadeUp>

            <FadeUp delay={0.15}>
              <div className="tag" style={{ marginBottom: 18 }}>Free Counselling</div>
              <h2 style={{ fontSize: "clamp(26px, 4vw, 46px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 14, lineHeight: 1.12 }}>
                <span className="gold-text">&ldquo;Dream it, Believe it, Build it&rdquo;</span>
              </h2>
              <div className="gold-line" style={{ marginBottom: 24 }} />
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 16 }}>
                We all have a passion, but what we might not have is the courage to pursue it. Through this 100% free counselling we help you build your study abroad dream.
              </p>
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 16 }}>
                We provide you complete step-by-step guidance on which course suits your passion, which university is best for you, how to apply, where to approach and when to start.
              </p>
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 32 }}>
                We don&rsquo;t just leave you with the boarding pass — we travel with you throughout until you settle comfortably. We also counsel your parents and families with zero doubts (so don&rsquo;t worry, we have your back, brother and sister 😉).
              </p>
              <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw" target="_blank" rel="noopener noreferrer" className="btn-gold" style={{ display: "inline-flex" }}>
                Book Free Session Now →
              </a>
            </FadeUp>
          </div>
        </div>
      </section>

      {/* Steps */}
      <section style={{ padding: "80px 0", background: "var(--bg-1)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>How It Works</div>
            <h2 style={{ fontSize: "clamp(26px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0" }}>Simple. Free. Effective.</h2>
          </FadeUp>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(220px, 1fr))", gap: 20 }}>
            {STEPS.map((s, i) => (
              <FadeUp key={s.n} delay={i * 0.1}>
                <div className="glass service-card" style={{ padding: 28, borderRadius: 20, height: "100%" }}>
                  <div style={{ fontSize: 11, fontWeight: 700, color: "#f1c852", letterSpacing: "0.1em", marginBottom: 14, opacity: 0.7 }}>STEP {s.n}</div>
                  <div style={{ width: 48, height: 48, borderRadius: 12, background: "rgba(241,200,82,0.1)", border: "1px solid rgba(241,200,82,0.2)", display: "flex", alignItems: "center", justifyContent: "center", fontSize: 20, fontWeight: 900, color: "#f1c852", marginBottom: 18 }}>{i + 1}</div>
                  <h3 style={{ fontSize: 17, fontWeight: 700, color: "#f0f0f0", marginBottom: 8 }}>{s.title}</h3>
                  <p style={{ fontSize: 13, color: "rgba(240,240,240,0.55)", lineHeight: 1.7 }}>{s.desc}</p>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section style={{ padding: "80px 0", background: "var(--bg-0)" }}>
        <FadeUp style={{ maxWidth: 600, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <h2 style={{ fontSize: "clamp(24px, 4vw, 40px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>Start Your Journey <span className="gold-text">Today</span></h2>
          <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 15, lineHeight: 1.7, marginBottom: 28 }}>Your first conversation is free. No commitment, no hidden charges.</p>
          <div style={{ display: "flex", flexWrap: "wrap", gap: 12, justifyContent: "center" }}>
            <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw" target="_blank" rel="noopener noreferrer" className="btn-gold">Enquire Now — Free</a>
            <Link href="/process" className="btn-outline">See Our Process</Link>
          </div>
        </FadeUp>
      </section>
    </>
  );
}
