"use client";

import Image from "next/image";
import Link from "next/link";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

export default function FinancialAssistancePage() {
  return (
    <>
      <PageBanner title="Financial Assistance" subtitle="Dream it and Make it happen — we make education affordable for everyone." breadcrumbs={[{ label: "Services", href: "/services" }, { label: "Financial Assistance" }]} />

      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))", gap: 64, alignItems: "center" }}>
            <FadeUp>
              <div style={{ borderRadius: 24, overflow: "hidden", aspectRatio: "4/5", border: "1px solid rgba(255,255,255,0.08)", position: "relative" }}>
                <Image src="/images/resource/featured-image-3.jpg" alt="Financial Assistance" fill style={{ objectFit: "cover" }} />
                <div style={{ position: "absolute", inset: 0, background: "linear-gradient(to top, rgba(8,9,16,0.6), transparent 50%)" }} />
              </div>
            </FadeUp>

            <FadeUp delay={0.15}>
              <div className="tag" style={{ marginBottom: 18 }}>Financial Assistance</div>
              <h2 style={{ fontSize: "clamp(26px, 4vw, 46px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 14, lineHeight: 1.12 }}>
                Turning Dreams Into <span className="gold-text">Reality</span>
              </h2>
              <div className="gold-line" style={{ marginBottom: 24 }} />
              <p style={{ fontSize: 18, fontWeight: 700, color: "#f1c852", fontStyle: "italic", marginBottom: 20 }}>&ldquo;Dream it and Make it happen&rdquo;</p>
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 16 }}>
                We all dream, but most of us let go of it due to the situation we are in — not anymore. Let&rsquo;s never let money be a hindrance to anyone&rsquo;s educational dream.
              </p>
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 32 }}>
                Let us know your situation, and we will tailor the best financial solution that fits your background. We guide you on the most possible and affordable financial assistance that suits you and your family comfortably, with zero burden.
              </p>
              <div style={{ display: "flex", flexWrap: "wrap", gap: 12 }}>
                <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw" target="_blank" rel="noopener noreferrer" className="btn-gold">Enquire Now — Free</a>
                <Link href="/services/education-loan" className="btn-outline">Education Loan →</Link>
              </div>
            </FadeUp>
          </div>
        </div>
      </section>

      {/* Options */}
      <section style={{ padding: "80px 0", background: "var(--bg-1)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>What We Offer</div>
            <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0" }}>Financial Options <span className="gold-text">Tailored for You</span></h2>
          </FadeUp>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(240px, 1fr))", gap: 20 }}>
            {[
              { icon: "🎓", title: "BMGC Scholarships", desc: "Exclusive scholarships available for deserving students through the BM Global community." },
              { icon: "🏦", title: "Education Loans", desc: "Through UniCreds — rates from 8.99%, quick approvals, 20+ lenders, no collateral options." },
              { icon: "💼", title: "Part-time Work", desc: "We guide you on legal part-time work opportunities during your studies to support yourself." },
              { icon: "📋", title: "Financial Planning", desc: "Personalised budgeting advice and financial planning so you know exactly what to expect." },
            ].map((item, i) => (
              <FadeUp key={item.title} delay={i * 0.1}>
                <div className="glass service-card" style={{ padding: 28, borderRadius: 20, height: "100%" }}>
                  <div style={{ fontSize: 36, marginBottom: 16, lineHeight: 1 }}>{item.icon}</div>
                  <h3 style={{ fontSize: 18, fontWeight: 700, color: "#f0f0f0", marginBottom: 10 }}>{item.title}</h3>
                  <p style={{ fontSize: 14, color: "rgba(240,240,240,0.55)", lineHeight: 1.7 }}>{item.desc}</p>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      <section style={{ padding: "80px 0", background: "var(--bg-0)" }}>
        <FadeUp style={{ maxWidth: 600, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <h2 style={{ fontSize: "clamp(24px, 4vw, 40px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>Money Shouldn&rsquo;t Stop <span className="gold-text">Your Dream</span></h2>
          <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 15, lineHeight: 1.7, marginBottom: 28 }}>Talk to us today. We&rsquo;ll find the best financial plan for your specific situation.</p>
          <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw" target="_blank" rel="noopener noreferrer" className="btn-gold">Get Free Financial Guidance</a>
        </FadeUp>
      </section>
    </>
  );
}
