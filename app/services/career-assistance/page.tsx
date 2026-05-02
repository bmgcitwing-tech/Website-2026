"use client";

import Image from "next/image";
import Link from "next/link";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

const OFFERINGS = [
  { icon: "📄", title: "CV & Resume Building", desc: "From scratch — we craft a compelling CV that stands out to UK and international employers." },
  { icon: "💼", title: "Job Application Support", desc: "We guide you through the entire application process, from finding roles to submitting applications." },
  { icon: "🎤", title: "Mock Interview Sessions", desc: "Practice interviews with our experts to build confidence and prepare for real-world scenarios." },
  { icon: "🌐", title: "IELTS & OET Preparation", desc: "Tailored preparation plans for English language tests required by UK employers and universities." },
  { icon: "🤝", title: "Networking & Connections", desc: "Access our community of UK professionals, alumni, and employers to fast-track your career." },
  { icon: "⏰", title: "Part-time During Studies", desc: "Find flexible part-time opportunities that complement your studies and build local experience." },
];

export default function CareerAssistancePage() {
  return (
    <>
      <PageBanner title="Career Assistance" subtitle="Your career abroad starts here — let's turn your dream into a plan." breadcrumbs={[{ label: "Services", href: "/services" }, { label: "Career Assistance" }]} />

      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))", gap: 64, alignItems: "center" }}>
            <FadeUp>
              <div style={{ borderRadius: 24, overflow: "hidden", aspectRatio: "4/5", border: "1px solid rgba(255,255,255,0.08)", position: "relative" }}>
                <Image src="/images/resource/featured-image-14.jpg" alt="Career Assistance" fill style={{ objectFit: "cover" }} />
                <div style={{ position: "absolute", inset: 0, background: "linear-gradient(to top, rgba(8,9,16,0.6), transparent 50%)" }} />
              </div>
            </FadeUp>

            <FadeUp delay={0.15}>
              <div className="tag" style={{ marginBottom: 18 }}>Career Assistance</div>
              <h2 style={{ fontSize: "clamp(26px, 4vw, 46px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 14, lineHeight: 1.12 }}>
                Turning Dreams Into <span className="gold-text">Actionable Plans</span>
              </h2>
              <div className="gold-line" style={{ marginBottom: 24 }} />
              <p style={{ fontSize: 18, fontWeight: 700, color: "#f1c852", fontStyle: "italic", marginBottom: 20 }}>&ldquo;Let&rsquo;s not just call it a dream, let&rsquo;s call it a plan&rdquo;</p>
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 16 }}>
                What next? Is a question that always startles us. We help you find the answer too. Once our dreams have taken a shape we need a proper plan to pursue it to the fullest.
              </p>
              <p style={{ fontSize: 16, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 32 }}>
                Through this we back your plan of finding a career abroad — after and even during your course of study. We connect you to the best part-time and full-time jobs, and will be your map guide in every turn of direction.
              </p>
              <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw" target="_blank" rel="noopener noreferrer" className="btn-gold" style={{ display: "inline-flex" }}>
                Start Your Career Plan — Free →
              </a>
            </FadeUp>
          </div>
        </div>
      </section>

      <section style={{ padding: "80px 0", background: "var(--bg-1)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>What We Offer</div>
            <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0" }}>Your Complete <span className="gold-text">Career Toolkit</span></h2>
          </FadeUp>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fill, minmax(280px, 1fr))", gap: 20 }}>
            {OFFERINGS.map((item, i) => (
              <FadeUp key={item.title} delay={i * 0.08}>
                <div className="glass service-card" style={{ padding: 28, borderRadius: 20, height: "100%" }}>
                  <div style={{ fontSize: 36, marginBottom: 16 }}>{item.icon}</div>
                  <h3 style={{ fontSize: 17, fontWeight: 700, color: "#f0f0f0", marginBottom: 10 }}>{item.title}</h3>
                  <p style={{ fontSize: 13, color: "rgba(240,240,240,0.55)", lineHeight: 1.7 }}>{item.desc}</p>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      <section style={{ padding: "80px 0", background: "var(--bg-0)" }}>
        <FadeUp style={{ maxWidth: 600, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <h2 style={{ fontSize: "clamp(24px, 4vw, 40px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>Build Your <span className="gold-text">Career Abroad</span></h2>
          <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 15, lineHeight: 1.7, marginBottom: 28 }}>Let&rsquo;s map your dream into reality — completely free to start.</p>
          <div style={{ display: "flex", flexWrap: "wrap", gap: 12, justifyContent: "center" }}>
            <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw" target="_blank" rel="noopener noreferrer" className="btn-gold">Enquire Now — Free</a>
            <Link href="/process" className="btn-outline">How It Works</Link>
          </div>
        </FadeUp>
      </section>
    </>
  );
}
