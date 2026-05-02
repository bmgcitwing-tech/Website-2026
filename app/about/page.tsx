"use client";

import Image from "next/image";
import Link from "next/link";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

const FIRSTS = [
  "First to provide scholarships to deserving Indian students in our community",
  "First to run a student support service from the UK for over 12 years",
  "First to offer one-on-one counselling by professionals",
  "First to care for your well-being in the UK through small gatherings and activities",
  "First to organise networking events for students to learn from professionals, professors, and alumni",
];

const VALUES = [
  { letter: "T", word: "Truthful", desc: "We tell you the truth, even when it's hard to hear. Your success depends on honest guidance." },
  { letter: "T", word: "Transparent", desc: "No hidden fees, no surprises. Everything we do is open and clear from day one." },
  { letter: "T", word: "Trustworthy", desc: "Built on 12+ years of trust with students across India. Our community is our proof." },
  { letter: "A", word: "Affable", desc: "We are warm, approachable, and always here for you — like brothers and sisters." },
];

export default function AboutPage() {
  return (
    <>
      <PageBanner
        title="About Us"
        subtitle="Truthful, Transparent, Trustworthy and Affable — more than a consultancy, we are a community."
        breadcrumbs={[{ label: "About" }]}
      />

      {/* ── WHO WE ARE ── */}
      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(320px, 1fr))", gap: 72, alignItems: "center" }}>

            {/* Image */}
            <FadeUp>
              <div style={{ position: "relative" }}>
                <div style={{ position: "relative", borderRadius: 28, overflow: "hidden", aspectRatio: "4/5", border: "1px solid rgba(255,255,255,0.08)" }}>
                  <Image src="/images/gallery/vijay1.jpg" alt="Vijay - Founder" fill style={{ objectFit: "cover" }} />
                  <div style={{ position: "absolute", inset: 0, background: "linear-gradient(to top, rgba(8,9,16,0.65) 0%, transparent 50%)" }} />
                  <div className="glass" style={{ position: "absolute", bottom: 20, left: 20, right: 20, borderRadius: 16, padding: "14px 18px" }}>
                    <div style={{ color: "#f1c852", fontWeight: 700, fontSize: 14 }}>Vijay — &ldquo;Britainil Maduraikaran&rdquo;</div>
                    <div style={{ color: "rgba(240,240,240,0.55)", fontSize: 12, marginTop: 3 }}>Founder & MD · Manchester Business School Alumnus</div>
                  </div>
                </div>
                {/* Badge */}
                <div className="glass-gold" style={{ position: "absolute", top: -16, right: -16, borderRadius: 16, padding: "12px 18px", textAlign: "center" }}>
                  <div style={{ fontSize: 22, fontWeight: 800, color: "#f1c852" }}>12+</div>
                  <div style={{ fontSize: 11, color: "rgba(240,240,240,0.5)" }}>Years UK</div>
                </div>
              </div>
            </FadeUp>

            {/* Text */}
            <FadeUp delay={0.15}>
              <div className="tag" style={{ marginBottom: 20 }}>Who We Are</div>
              <h2 style={{ fontSize: "clamp(28px, 4vw, 48px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 20, lineHeight: 1.12 }}>
                We are not an &lsquo;agency&rsquo; <span className="gold-text">We are a community</span>
              </h2>
              <div className="gold-line" style={{ marginBottom: 24 }} />

              <p style={{ color: "rgba(240,240,240,0.55)", lineHeight: 1.8, marginBottom: 16, fontSize: 16, fontStyle: "italic" }}>
                &ldquo;Never let it be said that to dream is a waste of one&rsquo;s time, for dreams are our realities in waiting.&rdquo;
              </p>
              <p style={{ color: "rgba(240,240,240,0.55)", lineHeight: 1.8, marginBottom: 16, fontSize: 16 }}>
                BM Global Careers is an overseas education consultancy headquartered in Manchester, United Kingdom — the dream of yet another student from rural Tamil Nadu who came to the UK to fulfil his aspirations.
              </p>
              <p style={{ color: "rgba(240,240,240,0.55)", lineHeight: 1.8, marginBottom: 16, fontSize: 16 }}>
                Our Founder Vijay, affectionately known as <strong style={{ color: "#f1c852" }}>&ldquo;Britainil Maduraikaran&rdquo;</strong>, a proud alumnus of The Prestigious Manchester Business School, strongly believes that a powerful education at the right place and the right university will change one&rsquo;s life.
              </p>
              <p style={{ color: "rgba(240,240,240,0.55)", lineHeight: 1.8, fontSize: 16, marginBottom: 32 }}>
                We don&rsquo;t just connect — instead we try to build and shape your dream of studying abroad with tailored free counselling on how, what, where and why, along with practical 360° guidance.
              </p>

              <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw"
                target="_blank" rel="noopener noreferrer" className="btn-gold" style={{ display: "inline-flex" }}>
                Get Free Counselling
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" strokeWidth="2.5">
                  <path d="M3 8h10M9 4l4 4-4 4"/>
                </svg>
              </a>
            </FadeUp>
          </div>
        </div>
      </section>

      {/* ── QUOTE ── */}
      <section style={{ padding: "80px 0", background: "var(--bg-2)", position: "relative", overflow: "hidden" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 80% 80% at 50% 50%, rgba(241,200,82,0.06), transparent)" }} />
        <FadeUp style={{ position: "relative", zIndex: 1, maxWidth: 860, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <div style={{ fontSize: 64, color: "rgba(241,200,82,0.15)", lineHeight: 1, marginBottom: 12, fontFamily: "serif" }}>&ldquo;</div>
          <blockquote style={{ fontSize: "clamp(20px, 3vw, 34px)", fontWeight: 700, color: "#f1c852", lineHeight: 1.4, marginBottom: 20 }}>
            If you can dream it, you can do it. Let&rsquo;s chase the dreams together with affable truthfulness, transparency, and trustworthiness.
          </blockquote>
          <p style={{ color: "rgba(240,240,240,0.4)", fontSize: 14 }}>— Vijay, Founder, BM Global Careers</p>
        </FadeUp>
      </section>

      {/* ── FIRSTS ── */}
      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 64 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Pioneers</div>
            <h2 style={{ fontSize: "clamp(28px, 4vw, 48px)", fontWeight: 800, color: "#f0f0f0" }}>
              Industry Firsts We&rsquo;re <span className="gold-text">Proud Of</span>
            </h2>
          </FadeUp>

          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(280px, 1fr))", gap: 20 }}>
            {FIRSTS.map((item, i) => (
              <FadeUp key={i} delay={i * 0.08}>
                <div className="glass" style={{ padding: "24px 28px", borderRadius: 20, height: "100%", display: "flex", gap: 16, alignItems: "flex-start" }}>
                  <div style={{ minWidth: 32, height: 32, borderRadius: "50%", background: "rgba(241,200,82,0.1)", border: "1px solid rgba(241,200,82,0.25)", display: "flex", alignItems: "center", justifyContent: "center", flexShrink: 0 }}>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="#f1c852" strokeWidth="2.5">
                      <path d="M2 7l3.5 3.5L12 3"/>
                    </svg>
                  </div>
                  <p style={{ fontSize: 15, color: "rgba(240,240,240,0.7)", lineHeight: 1.6 }}>{item}</p>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* ── CORE VALUES ── */}
      <section style={{ padding: "100px 0", background: "var(--bg-1)", position: "relative" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 60% 50% at 50% 100%, rgba(241,200,82,0.04), transparent)" }} />
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px", position: "relative", zIndex: 1 }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 64 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Core Values</div>
            <h2 style={{ fontSize: "clamp(28px, 4vw, 48px)", fontWeight: 800, color: "#f0f0f0" }}>
              What We Stand For
            </h2>
          </FadeUp>

          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(240px, 1fr))", gap: 20 }}>
            {VALUES.map((v, i) => (
              <FadeUp key={v.word} delay={i * 0.1}>
                <div className="glass service-card" style={{ padding: 32, borderRadius: 24, height: "100%" }}>
                  <div style={{ width: 52, height: 52, borderRadius: 14, background: "rgba(241,200,82,0.1)", border: "1px solid rgba(241,200,82,0.2)", display: "flex", alignItems: "center", justifyContent: "center", fontSize: 22, fontWeight: 900, color: "#f1c852", marginBottom: 20 }}>
                    {v.letter}
                  </div>
                  <h3 style={{ fontSize: 20, fontWeight: 700, color: "#f0f0f0", marginBottom: 10 }}>{v.word}</h3>
                  <p style={{ fontSize: 14, color: "rgba(240,240,240,0.55)", lineHeight: 1.7 }}>{v.desc}</p>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* ── CTA ── */}
      <section style={{ padding: "80px 0", background: "var(--bg-0)" }}>
        <FadeUp style={{ maxWidth: 640, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <h2 style={{ fontSize: "clamp(26px, 4vw, 44px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>
            Ready to Start Your <span className="gold-text">Journey?</span>
          </h2>
          <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 16, lineHeight: 1.7, marginBottom: 32 }}>
            Book your free 30-minute counselling session today. No obligation — just honest, expert guidance from our UK-based community.
          </p>
          <div style={{ display: "flex", flexWrap: "wrap", gap: 14, justifyContent: "center" }}>
            <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw"
              target="_blank" rel="noopener noreferrer" className="btn-gold">Enquire Now — Free</a>
            <Link href="/contact" className="btn-outline">Contact Us</Link>
          </div>
        </FadeUp>
      </section>
    </>
  );
}
