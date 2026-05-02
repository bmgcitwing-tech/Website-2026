"use client";

import Link from "next/link";
import { motion, useInView } from "framer-motion";
import { useRef } from "react";
import PageBanner from "@/components/PageBanner";
import FadeUp from "@/components/FadeUp";

const STEPS = [
  {
    n: "01", title: "We Ask",
    short: "30-minute free online conversation",
    desc: "Firstly we and yourself should be clear on what your plan, idea and end goal is via a 30 minute free online conversation. So we ask.",
    detail: "A clear goal is the foundation of every successful journey. Before we can map your path, we need to understand your aspirations, background, and what drives you. This initial free conversation sets the stage for everything that follows.",
  },
  {
    n: "02", title: "We Listen",
    short: "Draft your full profile",
    desc: "We write a map that will help you succeed — drafting your educational and financial backdrop, experiences and career ideas. So we listen.",
    detail: "True guidance starts with genuine listening. We carefully document your academic history, financial situation, work experience, and career aspirations to build a comprehensive picture that forms the foundation of your personalized roadmap.",
  },
  {
    n: "03", title: "We Analyse",
    short: "Find the perfect country, course & university",
    desc: "There are set rules and guidelines in every country. We analyse your idea, plan and goal based on all your factors to find the best country, course, finance and university. So we analyse.",
    detail: "Every country has unique entry requirements, visa regulations, and educational standards. Our expert team analyses every aspect of your profile against global criteria to identify the most suitable matches — maximising your chances of success.",
  },
  {
    n: "04", title: "We Suggest",
    short: "Personalised route map tailored for you",
    desc: "We personally tailor the route map to success based on a personalised analysis of each and every aspect of you — university, country, course, scholarships, intake policies. So we suggest.",
    detail: "Our suggestions are never generic. We consider scholarships, bursaries, part-time work opportunities, accommodation, and lifestyle factors alongside academic fit. You receive a fully personalised recommendation aligned with both your dreams and realities.",
  },
  {
    n: "05", title: "We Process",
    short: "SOP, visa, boarding — we guide every step",
    desc: "Finally, we guide you throughout the detailed application and requisite procedures — SOP, visa, ticketing, boarding, landing, and finding the best affordable accommodation. And we process.",
    detail: "From your Statement of Purpose to your landing card — we are with you every single step. Document preparation, visa applications, pre-departure briefings, and settling-in support. We don't just open the door; we walk you through it.",
  },
];

function StepCard({ step, index }: { step: typeof STEPS[0]; index: number }) {
  const ref = useRef<HTMLDivElement>(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });
  const isLeft = index % 2 === 0;

  return (
    <motion.div
      ref={ref}
      initial={{ opacity: 0, x: isLeft ? -50 : 50 }}
      animate={inView ? { opacity: 1, x: 0 } : {}}
      transition={{ duration: 0.7, delay: 0.1, ease: [0.22, 1, 0.36, 1] }}
      style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(280px, 1fr))", gap: 48, alignItems: "center" }}
    >
      {/* Text side */}
      <div style={{ order: isLeft ? 0 : 1 }}>
        <div className="tag" style={{ marginBottom: 16 }}>Step {step.n}</div>
        <h3 style={{ fontSize: "clamp(28px, 4vw, 44px)", fontWeight: 800, color: "#f1c852", marginBottom: 12 }}>{step.title}</h3>
        <p style={{ fontSize: 16, color: "rgba(240,240,240,0.75)", lineHeight: 1.7, marginBottom: 12, fontWeight: 500 }}>{step.desc}</p>
        <p style={{ fontSize: 14, color: "rgba(240,240,240,0.45)", lineHeight: 1.8 }}>{step.detail}</p>
      </div>

      {/* Visual card side */}
      <div style={{ order: isLeft ? 1 : 0 }}>
        <div className="glass" style={{ padding: 48, borderRadius: 28, textAlign: "center", position: "relative", overflow: "hidden" }}>
          <div style={{ position: "absolute", inset: 0, background: "radial-gradient(circle at 50% 50%, rgba(241,200,82,0.06), transparent 70%)" }} />
          <div style={{ fontSize: 96, fontWeight: 900, color: "rgba(241,200,82,0.07)", position: "absolute", top: -10, right: 10, lineHeight: 1, fontFamily: "var(--font-playfair)" }}>{step.n}</div>
          <div style={{ fontSize: 56, marginBottom: 16, position: "relative", zIndex: 1 }}>
            {["❓", "👂", "🔍", "💡", "🚀"][index]}
          </div>
          <h4 style={{ fontSize: 24, fontWeight: 700, color: "#f0f0f0", position: "relative", zIndex: 1 }}>{step.title}</h4>
          <p style={{ fontSize: 13, color: "rgba(240,240,240,0.4)", marginTop: 8, position: "relative", zIndex: 1 }}>{step.short}</p>
        </div>
      </div>
    </motion.div>
  );
}

export default function ProcessPage() {
  return (
    <>
      <PageBanner
        title="Our Process"
        subtitle="A transparent, step-by-step journey from first conversation to landing at your destination."
        breadcrumbs={[{ label: "Process" }]}
      />

      {/* Intro */}
      <section style={{ padding: "72px 0 0", background: "var(--bg-0)" }}>
        <FadeUp style={{ maxWidth: 720, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <p style={{ fontSize: 17, color: "rgba(240,240,240,0.55)", lineHeight: 1.8 }}>
            At BM Global Careers, a transparent process is the cornerstone of trust. Here is exactly how we work with you — step by step — to turn your dreams into reality.
          </p>
        </FadeUp>
      </section>

      {/* Steps */}
      <section style={{ padding: "80px 0 100px", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1100, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "flex", flexDirection: "column", gap: 80 }}>
            {STEPS.map((step, i) => (
              <div key={step.n}>
                <StepCard step={step} index={i} />
                {i < STEPS.length - 1 && (
                  <div style={{ display: "flex", justifyContent: "center", marginTop: 64 }}>
                    <div style={{ display: "flex", flexDirection: "column", alignItems: "center", gap: 6 }}>
                      <div style={{ width: 1, height: 48, background: "linear-gradient(to bottom, rgba(241,200,82,0.4), transparent)" }} />
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="rgba(241,200,82,0.4)" strokeWidth="2">
                        <path d="M8 3v10M4 9l4 4 4-4"/>
                      </svg>
                    </div>
                  </div>
                )}
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section style={{ padding: "80px 0", background: "var(--bg-1)", position: "relative", overflow: "hidden" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 80% 80% at 50% 50%, rgba(241,200,82,0.06), transparent)" }} />
        <FadeUp style={{ position: "relative", zIndex: 1, maxWidth: 640, margin: "0 auto", padding: "0 24px", textAlign: "center" }}>
          <h2 style={{ fontSize: "clamp(26px, 4vw, 44px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>
            Ready to Start <span className="gold-text">Your Journey?</span>
          </h2>
          <p style={{ color: "rgba(240,240,240,0.5)", fontSize: 16, lineHeight: 1.7, marginBottom: 32 }}>
            Begin with a free 30-minute conversation. No commitment, no fees — just honest, expert guidance.
          </p>
          <div style={{ display: "flex", flexWrap: "wrap", gap: 14, justifyContent: "center" }}>
            <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw"
              target="_blank" rel="noopener noreferrer" className="btn-gold">Book Free Consultation</a>
            <Link href="/contact" className="btn-outline">Contact Us</Link>
          </div>
        </FadeUp>
      </section>
    </>
  );
}
