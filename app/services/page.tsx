"use client";

import Image from "next/image";
import Link from "next/link";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

const SERVICES = [
  { emoji: "🎓", title: "Free Counselling", tagline: "Dream it, Believe it, Build it", img: "/images/resource/featured-image-17.jpg", href: "/services/free-counselling", body: "100% free, personalised one-on-one counselling. We provide complete step-by-step guidance on which course suits your passion, which university is best, how to apply, and when to start. We travel with you until you settle comfortably." },
  { emoji: "💰", title: "Financial Assistance", tagline: "Dream it and Make it happen", img: "/images/resource/featured-image-3.jpg", href: "/services/financial-assistance", body: "Let us know your situation and we will tailor the best financial solution that fits your background. We guide you on the most affordable financial assistance that suits you and your family comfortably with zero burden." },
  { emoji: "🚀", title: "Career Assistance", tagline: "Let's call it a plan", img: "/images/resource/featured-image-14.jpg", href: "/services/career-assistance", body: "CV building, job application support, mock interview sessions, and tailored IELTS/OET preparation. We connect you to the best part-time and full-time jobs abroad — your map guide in every turn." },
  { emoji: "📚", title: "Education Loan", tagline: "Unlock Your Aspirations", img: "/images/el-logo.jpg", href: "/services/education-loan", contain: true, body: "Through our partner UniCreds — rates from 8.99%, approvals in 48 hours, savings up to ₹15 lacs, and access to 20+ lenders. One application, multiple competitive offers." },
  { emoji: "🛡️", title: "Insurance (Marshmallow)", tagline: "Driving Forward Together", img: "/images/marshmallow-logo.png", href: "/services/insurance", contain: true, body: "Car insurance designed for UK newcomers. Use your existing India licence, save an average of £220, and get £75 off your first policy with code BMGC_MM75." },
  { emoji: "🏠", title: "Accommodation", tagline: "Home away from home", img: "/images/background/image-1.jpg", href: "https://bmglobal.studentacco.com/", external: true, body: "Find safe, affordable, verified student housing in the UK through our dedicated accommodation partner — so you can focus entirely on your studies from day one." },
];

export default function ServicesPage() {
  return (
    <>
      <PageBanner title="Our Services" subtitle="A 360° guide to shape, plan and live your study abroad dream." breadcrumbs={[{ label: "Services" }]} />

      <section style={{ padding: "100px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1200, margin: "0 auto", padding: "0 24px" }}>
          {SERVICES.map((s, i) => (
            <div key={s.title}>
              <FadeUp>
                <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))", gap: 56, alignItems: "center" }}>
                  <div style={{ order: i % 2 !== 0 ? 1 : 0 }}>
                    <div style={{ borderRadius: 24, overflow: "hidden", aspectRatio: s.contain ? "4/3" : "16/10", border: "1px solid rgba(255,255,255,0.08)", background: "var(--bg-2)", position: "relative" }}>
                      <Image src={s.img} alt={s.title} fill style={{ objectFit: s.contain ? "contain" : "cover", padding: s.contain ? 32 : 0 }} />
                    </div>
                  </div>
                  <div style={{ order: i % 2 !== 0 ? 0 : 1 }}>
                    <div style={{ fontSize: 40, marginBottom: 14, lineHeight: 1 }}>{s.emoji}</div>
                    <div className="tag" style={{ marginBottom: 14 }}>{s.title}</div>
                    <h2 style={{ fontSize: "clamp(24px, 3.5vw, 40px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 8, lineHeight: 1.15 }}>{s.title}</h2>
                    <p style={{ fontSize: 15, color: "#f1c852", fontStyle: "italic", marginBottom: 18, fontWeight: 500 }}>&ldquo;{s.tagline}&rdquo;</p>
                    <p style={{ fontSize: 15, color: "rgba(240,240,240,0.6)", lineHeight: 1.8, marginBottom: 28 }}>{s.body}</p>
                    {s.external
                      ? <a href={s.href} target="_blank" rel="noopener noreferrer" className="btn-gold" style={{ display: "inline-flex" }}>Learn More →</a>
                      : <Link href={s.href} className="btn-gold" style={{ display: "inline-flex" }}>Learn More →</Link>}
                  </div>
                </div>
              </FadeUp>
              {i < SERVICES.length - 1 && <div style={{ height: 1, background: "linear-gradient(90deg,transparent,rgba(255,255,255,0.06),transparent)", margin: "72px 0" }} />}
            </div>
          ))}
        </div>
      </section>

      <section style={{ padding: "80px 0", background: "var(--bg-1)", position: "relative", overflow: "hidden" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 70% 70% at 50% 50%, rgba(241,200,82,0.06), transparent)" }} />
        <FadeUp style={{ position: "relative", zIndex: 1, maxWidth: 600, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <h2 style={{ fontSize: "clamp(24px, 4vw, 42px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>All Services Are <span className="gold-text">Free to Start</span></h2>
          <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 16, lineHeight: 1.7, marginBottom: 28 }}>No registration fee. No hidden charges. Just honest guidance from our UK-based community.</p>
          <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw" target="_blank" rel="noopener noreferrer" className="btn-gold">Enquire Now — It&rsquo;s Free</a>
        </FadeUp>
      </section>
    </>
  );
}
