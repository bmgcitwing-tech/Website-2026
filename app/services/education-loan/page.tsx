"use client";

import Image from "next/image";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

const BENEFITS = [
  { icon: "🎯", title: "Expert Guidance, Personalised", desc: "Bespoke advice tailored to your educational and financial needs." },
  { icon: "💸", title: "Competitive Rates from 8.99%*", desc: "Affordable interest rates making your loan manageable from day one." },
  { icon: "⚡", title: "Fast Approvals — 48 Hours*", desc: "Quick online loan approvals, sanctions possible in as fast as 48 hours." },
  { icon: "💰", title: "Save up to ₹15 Lacs", desc: "Substantial savings on interest and fees, reducing your financial burden." },
  { icon: "🔧", title: "Flexible Loan Options", desc: "Choose from both secured and unsecured loan options to suit your circumstances." },
  { icon: "🤝", title: "Comprehensive Support", desc: "From visa assistance to post-disbursement aid — end-to-end support." },
  { icon: "📋", title: "Simplified Documentation", desc: "Dedicated help with documentation and eligibility, ensuring a smooth process." },
  { icon: "🏦", title: "One Application, 20+ Lenders", desc: "Apply once and receive the best loan offers from over 20 lenders." },
];

const HOW_STEPS = [
  { n: "01", title: "Check Eligibility — Free", desc: "Use UniCreds online tools or consult advisors to explore your best options." },
  { n: "02", title: "Expert Consultation", desc: "Gain insights and guidance tailored to your financial needs and study destination." },
  { n: "03", title: "Prepare Documentation", desc: "Follow a simple checklist with expert support to avoid any delays." },
  { n: "04", title: "Error-Free Application", desc: "UniCreds meticulously reviews your application to ensure smooth approval." },
  { n: "05", title: "Timely Updates", desc: "Stay informed as UniCreds manages all communications with lenders on your behalf." },
  { n: "06", title: "Fast Approval & Disbursement", desc: "Get your loan sanctioned swiftly and funds disbursed on time for your studies." },
];

export default function EducationLoanPage() {
  return (
    <>
      <PageBanner title="Education Loan" subtitle="Unlock your educational aspirations with UniCreds — our trusted education loan partner." breadcrumbs={[{ label: "Services", href: "/services" }, { label: "Education Loan" }]} />

      {/* Intro */}
      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))", gap: 64, alignItems: "center" }}>
            <FadeUp>
              <div style={{ borderRadius: 24, overflow: "hidden", border: "1px solid rgba(255,255,255,0.08)", background: "var(--bg-2)", padding: 48, display: "flex", alignItems: "center", justifyContent: "center", minHeight: 280 }}>
                <div style={{ position: "relative", width: "100%", height: 200 }}>
                  <Image src="/images/el-logo.jpg" alt="UniCreds" fill style={{ objectFit: "contain" }} />
                </div>
              </div>
            </FadeUp>
            <FadeUp delay={0.15}>
              <div className="tag" style={{ marginBottom: 18 }}>Partnership</div>
              <h2 style={{ fontSize: "clamp(24px, 3.5vw, 44px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 14, lineHeight: 1.12 }}>
                BM Global Careers <span className="gold-text">× UniCreds</span>
              </h2>
              <div className="gold-line" style={{ marginBottom: 24 }} />
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 16 }}>
                At BM Global Careers, we are dedicated to ensuring that financing your education abroad is as easy and accessible as possible. That&rsquo;s why we proudly partner with <strong style={{ color: "#f0f0f0" }}>UniCreds</strong>, a leading provider of education loans.
              </p>
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 32 }}>
                UniCreds combines expert guidance with personalised solutions to ensure a seamless loan experience — from helping you select the right university to providing tailored financing options.
              </p>
              <a href="https://unicreds.com/check-your-loan-eligibility?utm_source=affiliate&utm_medium=bmglobal&utm_campaign=bmglobal-landing-page-promotion&utm_content=apply-now-button"
                target="_blank" rel="noopener noreferrer" className="btn-gold" style={{ display: "inline-flex" }}>
                Check Eligibility — Free →
              </a>
            </FadeUp>
          </div>
        </div>
      </section>

      {/* Benefits */}
      <section style={{ padding: "80px 0", background: "var(--bg-1)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Why UniCreds</div>
            <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0" }}>8 Reasons to <span className="gold-text">Choose UniCreds</span></h2>
          </FadeUp>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fill, minmax(260px, 1fr))", gap: 16 }}>
            {BENEFITS.map((b, i) => (
              <FadeUp key={b.title} delay={i * 0.06}>
                <div className="glass service-card" style={{ padding: 24, borderRadius: 18, height: "100%", display: "flex", gap: 16, alignItems: "flex-start" }}>
                  <div style={{ fontSize: 28, flexShrink: 0, lineHeight: 1 }}>{b.icon}</div>
                  <div>
                    <h3 style={{ fontSize: 15, fontWeight: 700, color: "#f0f0f0", marginBottom: 6 }}>{b.title}</h3>
                    <p style={{ fontSize: 13, color: "rgba(240,240,240,0.5)", lineHeight: 1.6 }}>{b.desc}</p>
                  </div>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* How to Apply */}
      <section style={{ padding: "80px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Application Process</div>
            <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0" }}>How to Apply in <span className="gold-text">6 Simple Steps</span></h2>
          </FadeUp>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fill, minmax(280px, 1fr))", gap: 16 }}>
            {HOW_STEPS.map((s, i) => (
              <FadeUp key={s.n} delay={i * 0.08}>
                <div className="glass" style={{ padding: 24, borderRadius: 18, position: "relative", overflow: "hidden" }}>
                  <div style={{ position: "absolute", top: 12, right: 16, fontSize: 48, fontWeight: 900, color: "rgba(241,200,82,0.06)", lineHeight: 1 }}>{s.n}</div>
                  <div style={{ fontSize: 11, fontWeight: 700, color: "#f1c852", letterSpacing: "0.1em", marginBottom: 10, opacity: 0.7 }}>STEP {s.n}</div>
                  <h3 style={{ fontSize: 16, fontWeight: 700, color: "#f0f0f0", marginBottom: 8 }}>{s.title}</h3>
                  <p style={{ fontSize: 13, color: "rgba(240,240,240,0.5)", lineHeight: 1.6 }}>{s.desc}</p>
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
          <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>Ready to <span className="gold-text">Finance Your Studies?</span></h2>
          <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 15, lineHeight: 1.7, marginBottom: 28 }}>Begin your journey to a brighter future. Together, let&rsquo;s embark on your global educational journey with financial ease and confidence.</p>
          <a href="https://unicreds.com/check-your-loan-eligibility?utm_source=affiliate&utm_medium=bmglobal&utm_campaign=bmglobal-landing-page-promotion&utm_content=apply-now-button"
            target="_blank" rel="noopener noreferrer" className="btn-gold">Apply Now via UniCreds</a>
          <p style={{ fontSize: 12, color: "rgba(240,240,240,0.3)", marginTop: 14 }}>*Subject to eligibility. Terms and conditions apply.</p>
        </FadeUp>
      </section>
    </>
  );
}
