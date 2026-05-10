"use client";

import { useEffect, useRef, useState } from "react";
import Image from "next/image";
import Link from "next/link";
import { motion, useScroll, useTransform, useInView } from "framer-motion";
import { VIDEOS } from "@/lib/videos";
import GlobalPresenceSection from "@/components/GlobalPresenceSection";

/* ─── Animated number counter ─── */
function Counter({ to, suffix = "" }: { to: number; suffix?: string }) {
  const [val, setVal] = useState(0);
  const ref = useRef<HTMLDivElement>(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });
  useEffect(() => {
    if (!inView) return;
    let raf: number;
    const start = performance.now();
    const dur = 2000;
    const tick = (now: number) => {
      const p = Math.min((now - start) / dur, 1);
      const ease = 1 - Math.pow(1 - p, 3);
      setVal(Math.round(ease * to));
      if (p < 1) raf = requestAnimationFrame(tick);
    };
    raf = requestAnimationFrame(tick);
    return () => cancelAnimationFrame(raf);
  }, [inView, to]);
  return <div ref={ref}>{val}{suffix}</div>;
}

/* ─── Fade-up wrapper ─── */
function FadeUp({ children, delay = 0, className = "", style }: { children: React.ReactNode; delay?: number; className?: string; style?: React.CSSProperties }) {
  const ref = useRef<HTMLDivElement>(null);
  const inView = useInView(ref, { once: true, margin: "-60px" });
  return (
    <motion.div
      ref={ref}
      className={className}
      style={style}
      initial={{ opacity: 0, y: 40 }}
      animate={inView ? { opacity: 1, y: 0 } : {}}
      transition={{ duration: 0.7, delay, ease: [0.22, 1, 0.36, 1] }}
    >
      {children}
    </motion.div>
  );
}

const STEPS = [
  { n: "01", title: "We Ask", text: "A 30-minute free online conversation to clearly understand your plan, idea and end goal." },
  { n: "02", title: "We Listen", text: "We draft your educational and financial backdrop, experiences and career aspirations." },
  { n: "03", title: "We Analyse", text: "We analyse every factor — country, course, finances and university — to find the perfect fit." },
  { n: "04", title: "We Suggest", text: "We personally tailor the route map — university, scholarships, intake policies — for you." },
  { n: "05", title: "We Process", text: "SOP, visa, ticketing, accommodation — we guide you every step until you land." },
];

const SERVICES = [
  {
    icon: "🎓",
    title: "Free Counselling",
    tagline: "Dream it, Believe it, Build it",
    body: "100% free, personalised one-on-one counselling sessions. From course selection to university application — we guide you completely.",
    href: "/services/free-counselling",
  },
  {
    icon: "💰",
    title: "Financial Assistance",
    tagline: "Dream it and Make it happen",
    body: "Education loans through UniCreds, scholarships, and tailored financial planning so money is never a barrier to your dream.",
    href: "/services/financial-assistance",
  },
  {
    icon: "🚀",
    title: "Career Assistance",
    tagline: "Let's call it a plan",
    body: "CV building, mock interviews, IELTS/OET prep, and job connections — your complete career roadmap for life abroad.",
    href: "/services/career-assistance",
  },
  {
    icon: "🏠",
    title: "Accommodation",
    tagline: "Home away from home",
    body: "Find safe, affordable student housing in the UK through our dedicated accommodation partner.",
    href: "https://bmglobal.studentacco.com/",
    external: true,
  },
  {
    icon: "🛡️",
    title: "Insurance",
    tagline: "Driving Forward Together",
    body: "Exclusive car insurance for UK newcomers via Marshmallow. Get £75 off your first policy with code BMGC_MM75.",
    href: "/services/insurance",
  },
  {
    icon: "📚",
    title: "Education Loan",
    tagline: "Unlock Your Aspirations",
    body: "Partner UniCreds offers rates from 8.99%, 48-hour approvals, and personalised support from 20+ lenders.",
    href: "/services/education-loan",
  },
];

const COMMUNITY_IMAGES = Array.from({ length: 15 }, (_, i) => `/images/community/${i + 1}.jpg`);
const HERO_IMAGES = Array.from({ length: 7 }, (_, i) => `/images/hero/${i + 1}.jpg`);

export default function HomePage() {
  const heroRef = useRef<HTMLElement>(null);
  const { scrollYProgress } = useScroll({ target: heroRef, offset: ["start start", "end start"] });
  const heroY = useTransform(scrollYProgress, [0, 1], ["0%", "30%"]);
  const heroOpacity = useTransform(scrollYProgress, [0, 0.6], [1, 0]);

  const [currentHeroIdx, setCurrentHeroIdx] = useState(0);

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentHeroIdx((prev) => (prev + 1) % HERO_IMAGES.length);
    }, 5000);
    return () => clearInterval(interval);
  }, []);

  return (
    <>
      {/* ═══════════════════════════════════════ HERO ═══════════════════════════════════════ */}
      <section ref={heroRef} style={{ position: "relative", minHeight: "100vh", display: "flex", alignItems: "center", overflow: "hidden" }}>

        {/* Background image with parallax */}
        <motion.div style={{ y: heroY, position: "absolute", inset: 0, backgroundColor: "#080910" }}>
          {HERO_IMAGES.map((src, idx) => (
            <div
              key={src}
              style={{
                position: "absolute",
                inset: 0,
                opacity: idx === currentHeroIdx ? 1 : 0,
                transition: "opacity 1.5s ease-in-out",
              }}
            >
              <Image
                src={src}
                alt={`Hero background ${idx + 1}`}
                fill
                priority={idx === 0}
                style={{ objectFit: "cover", objectPosition: "center", filter: "grayscale(100%)" }}
              />
            </div>
          ))}
        </motion.div>

        {/* Gradient overlays */}
        <div style={{ position: "absolute", inset: 0, background: "linear-gradient(135deg, rgba(8,9,16,0.95) 0%, rgba(8,9,16,0.75) 50%, rgba(8,9,16,0.9) 100%)" }} />
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 80% 60% at 20% 50%, rgba(241,200,82,0.07) 0%, transparent 70%)" }} />
        <div className="grid-bg" style={{ position: "absolute", inset: 0, opacity: 0.4 }} />

        {/* Floating orbs */}
        <div className="orb-a" style={{ position: "absolute", top: "15%", left: "8%", width: 500, height: 500, borderRadius: "50%", background: "radial-gradient(circle, rgba(241,200,82,0.06) 0%, transparent 70%)", pointerEvents: "none" }} />
        <div className="orb-b" style={{ position: "absolute", bottom: "10%", right: "5%", width: 400, height: 400, borderRadius: "50%", background: "radial-gradient(circle, rgba(106,148,193,0.07) 0%, transparent 70%)", pointerEvents: "none" }} />
        <div className="orb-c" style={{ position: "absolute", top: "60%", left: "40%", width: 600, height: 600, borderRadius: "50%", background: "radial-gradient(circle, rgba(241,200,82,0.04) 0%, transparent 70%)", pointerEvents: "none" }} />

        {/* Particles */}
        {[...Array(18)].map((_, i) => (
          <motion.div
            key={i}
            style={{
              position: "absolute",
              width: i % 3 === 0 ? 3 : 2,
              height: i % 3 === 0 ? 3 : 2,
              borderRadius: "50%",
              background: "#f1c852",
              left: `${(i * 19 + 7) % 95}%`,
              top: `${(i * 13 + 15) % 85}%`,
            }}
            animate={{ y: [0, -(30 + i * 4), 0], opacity: [0, 0.7, 0] }}
            transition={{ duration: 3 + (i % 5) * 0.7, repeat: Infinity, delay: i * 0.4, ease: "easeInOut" }}
          />
        ))}

        {/* Hero content */}
        <motion.div style={{ opacity: heroOpacity, position: "relative", zIndex: 10, width: "100%", maxWidth: 1280, margin: "0 auto", padding: "0 24px", paddingTop: 80 }}>
          {/* Badge */}
          <motion.div
            initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.6, delay: 0.1 }}
          >
            <div className="tag" style={{ marginBottom: 28 }}>
              <span style={{ width: 6, height: 6, borderRadius: "50%", background: "#f1c852", display: "inline-block", animation: "pulse 2s ease-in-out infinite" }} />
              Manchester, United Kingdom · Est. 2012
            </div>
          </motion.div>

          {/* Headline */}
          <motion.h1
            initial={{ opacity: 0, y: 30 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.8, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
            style={{ fontSize: "clamp(40px, 7vw, 88px)", fontWeight: 800, color: "#f0f0f0", lineHeight: 1.08, letterSpacing: "-0.03em", marginBottom: 24, maxWidth: 800 }}
          >
            We are not an{" "}
            <span style={{ color: "#f1c852", fontStyle: "italic" }}>&lsquo;agency&rsquo;</span>
            <br />
            We are a{" "}
            <span style={{ position: "relative", display: "inline-block" }}>
              <span className="gold-text">community.</span>
              <svg style={{ position: "absolute", bottom: -8, left: 0, width: "100%" }} height="6" viewBox="0 0 200 6" preserveAspectRatio="none">
                <path d="M0 3 Q50 0 100 3 Q150 6 200 3" stroke="#f1c852" strokeWidth="2.5" fill="none" strokeLinecap="round" opacity="0.6"/>
              </svg>
            </span>
          </motion.h1>

          {/* Subtext */}
          <motion.p
            initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.7, delay: 0.45 }}
            style={{ fontSize: "clamp(16px, 2vw, 20px)", color: "rgba(240,240,240,0.62)", lineHeight: 1.7, marginBottom: 40, maxWidth: 560 }}
          >
            A community of brothers and sisters to motivate and help you chase your dreams and live your passion. We listen, we advise, and we guide your aspirations to study abroad.
          </motion.p>

          {/* CTAs */}
          <motion.div
            initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.7, delay: 0.6 }}
            style={{ display: "flex", flexWrap: "wrap", gap: 14, marginBottom: 72 }}
          >
            <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw"
              target="_blank" rel="noopener noreferrer" className="btn-gold">
              Enquire Now — It&apos;s Free
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" strokeWidth="2.5">
                <path d="M3 8h10M9 4l4 4-4 4"/>
              </svg>
            </a>
            <Link href="/about" className="btn-outline">
              Discover More
            </Link>
          </motion.div>

          {/* Social proof row */}
          <motion.div
            initial={{ opacity: 0 }} animate={{ opacity: 1 }} transition={{ duration: 0.8, delay: 0.85 }}
            style={{ display: "flex", flexWrap: "wrap", gap: 32 }}
          >
            {[
              { n: "12+", l: "Years of experience" },
              { n: "100%", l: "Free counselling, always" },
              { n: "360°", l: "End-to-end guidance" },
            ].map((s) => (
              <div key={s.l} style={{ display: "flex", alignItems: "center", gap: 12 }}>
                <div style={{ width: 1, height: 36, background: "rgba(241,200,82,0.3)" }} />
                <div>
                  <div style={{ fontSize: 22, fontWeight: 800, color: "#f1c852", lineHeight: 1 }}>{s.n}</div>
                  <div style={{ fontSize: 12, color: "rgba(240,240,240,0.45)", marginTop: 2 }}>{s.l}</div>
                </div>
              </div>
            ))}
          </motion.div>
        </motion.div>

        {/* Scroll cue */}
        <motion.div
          initial={{ opacity: 0 }} animate={{ opacity: 1 }} transition={{ delay: 1.5 }}
          style={{ position: "absolute", bottom: 32, left: "50%", transform: "translateX(-50%)", zIndex: 10, display: "flex", flexDirection: "column", alignItems: "center", gap: 8 }}
        >
          <span style={{ fontSize: 11, letterSpacing: "0.15em", color: "rgba(240,240,240,0.35)", textTransform: "uppercase" }}>Scroll</span>
          <motion.div animate={{ y: [0, 8, 0] }} transition={{ duration: 1.4, repeat: Infinity }}
            style={{ width: 24, height: 38, border: "1.5px solid rgba(255,255,255,0.2)", borderRadius: 12, display: "flex", alignItems: "flex-start", justifyContent: "center", padding: 5 }}>
            <div style={{ width: 4, height: 10, background: "#f1c852", borderRadius: 2 }} />
          </motion.div>
        </motion.div>
      </section>

      {/* ═══════════════════════════════════════ GLOBAL PRESENCE ═══════════════════════════════════════ */}
      <GlobalPresenceSection />

      {/* ═══════════════════════════════════════ ABOUT ═══════════════════════════════════════ */}
      <section style={{ padding: "120px 0", background: "var(--bg-1)", position: "relative", overflow: "hidden" }}>
        <div style={{ position: "absolute", top: 0, left: 0, right: 0, height: 1, background: "linear-gradient(90deg, transparent, rgba(241,200,82,0.2), transparent)" }} />

        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px" }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(340px, 1fr))", gap: 80, alignItems: "center" }}>

            {/* Image */}
            <FadeUp>
              <div style={{ position: "relative" }}>
                {/* Decorative ring */}
                <div style={{
                  position: "absolute", inset: -20, borderRadius: 40,
                  border: "1px solid rgba(241,200,82,0.08)",
                  background: "radial-gradient(ellipse at 30% 30%, rgba(241,200,82,0.04), transparent)",
                }} />
                <div style={{ position: "relative", borderRadius: 28, overflow: "hidden", aspectRatio: "4/5", border: "1px solid rgba(255,255,255,0.08)" }}>
                  <Image
                    src="/images/gallery/vijay1.jpg"
                    alt="Vijay - Founder"
                    fill style={{ objectFit: "cover" }}
                    onError={(e) => { (e.currentTarget.parentElement!).style.background = "#1a1d27"; }}
                  />
                  <div style={{ position: "absolute", inset: 0, background: "linear-gradient(to top, rgba(8,9,16,0.7) 0%, transparent 50%)" }} />
                  {/* Founder card */}
                  <div className="glass" style={{ position: "absolute", bottom: 20, left: 20, right: 20, borderRadius: 16, padding: "14px 18px" }}>
                    <div style={{ color: "#f1c852", fontWeight: 700, fontSize: 14 }}>Vijay — Founder & MD</div>
                    <div style={{ color: "rgba(240,240,240,0.55)", fontSize: 12, marginTop: 2 }}>Manchester Business School · Alumnus</div>
                  </div>
                </div>
                {/* Stats badge */}
                <motion.div
                  animate={{ y: [0, -8, 0] }} transition={{ duration: 3, repeat: Infinity, ease: "easeInOut" }}
                  className="glass-gold"
                  style={{ position: "absolute", top: -16, right: -16, borderRadius: 16, padding: "12px 18px", textAlign: "center" }}
                >
                  <div style={{ fontSize: 22, fontWeight: 800, color: "#f1c852" }}>12+</div>
                  <div style={{ fontSize: 11, color: "rgba(240,240,240,0.5)", marginTop: 1 }}>Years UK</div>
                </motion.div>
              </div>
            </FadeUp>

            {/* Text */}
            <FadeUp delay={0.15}>
              <div className="tag" style={{ marginBottom: 20 }}>About Us</div>
              <h2 style={{ fontSize: "clamp(28px, 4vw, 50px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 20, lineHeight: 1.1 }}>
                We are not an &lsquo;agency&rsquo;{" "}
                <span className="gold-text">We are a community</span>
              </h2>
              <div className="gold-line" style={{ marginBottom: 24 }} />
              <p style={{ color: "var(--muted)", lineHeight: 1.8, marginBottom: 16, fontSize: 16 }}>
                <strong style={{ color: "#f0f0f0" }}>Truthful, Transparent, Trustworthy</strong> and <strong style={{ color: "#f0f0f0" }}>Affable</strong> are our community consciences.
                Our brotherly community intends to break the myth that overseas education is only for the privileged.
              </p>
              <p style={{ color: "var(--muted)", lineHeight: 1.8, marginBottom: 24, fontSize: 16 }}>
                Our Founder Vijay, known as <strong style={{ color: "#f1c852" }}>&ldquo;Britainil Maduraikaran&rdquo;</strong>, a Manchester Business School alumnus, believes a powerful education at the right university will change one&rsquo;s life. We don&rsquo;t just help you start — we travel with you until you achieve it.
              </p>

              {/* Firsts list */}
              <div style={{ display: "flex", flexDirection: "column", gap: 10, marginBottom: 32 }}>
                {[
                  "First to provide scholarships to deserving Indian students",
                  "First to run a student support service from the UK for 12+ years",
                  "First to offer one-on-one counselling by professionals",
                  "First to organise networking events for students with UK professionals",
                ].map((item) => (
                  <div key={item} style={{ display: "flex", alignItems: "flex-start", gap: 10 }}>
                    <div style={{ minWidth: 20, height: 20, borderRadius: "50%", background: "rgba(241,200,82,0.1)", border: "1px solid rgba(241,200,82,0.3)", display: "flex", alignItems: "center", justifyContent: "center", marginTop: 1 }}>
                      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="#f1c852" strokeWidth="2">
                        <path d="M2 5l2.5 2.5L8 2.5"/>
                      </svg>
                    </div>
                    <span style={{ fontSize: 14, color: "rgba(240,240,240,0.65)", lineHeight: 1.5 }}>{item}</span>
                  </div>
                ))}
              </div>

              <Link href="/about" className="btn-gold" style={{ display: "inline-flex" }}>
                Our Full Story
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" strokeWidth="2.5">
                  <path d="M3 8h10M9 4l4 4-4 4"/>
                </svg>
              </Link>
            </FadeUp>
          </div>
        </div>
      </section>

      {/* ═══════════════════════════════════════ SERVICES ═══════════════════════════════════════ */}
      <section style={{ padding: "120px 0", background: "var(--bg-0)", position: "relative" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 60% 50% at 50% 0%, rgba(241,200,82,0.04) 0%, transparent 60%)" }} />

        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px", position: "relative", zIndex: 1 }}>
          <FadeUp className="text-center" style={{ textAlign: "center", marginBottom: 64 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>What We Offer</div>
            <h2 style={{ fontSize: "clamp(30px, 4.5vw, 56px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>
              A 360° Guide to Your{" "}
              <span className="gold-text">Study Abroad Dream</span>
            </h2>
            <p style={{ fontSize: 17, color: "var(--muted)", maxWidth: 540, margin: "0 auto", lineHeight: 1.7 }}>
              From first conversation to landing at your destination — every service you need, completely tailored for you.
            </p>
          </FadeUp>

          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))", gap: 20 }}>
            {SERVICES.map((s, i) => (
              <FadeUp key={s.title} delay={i * 0.08}>
                <motion.div
                  whileHover={{ y: -8 }}
                  transition={{ type: "spring", stiffness: 300, damping: 20 }}
                  className="service-card glass"
                  style={{ padding: 32, borderRadius: 24, height: "100%", display: "flex", flexDirection: "column", position: "relative", overflow: "hidden" }}
                >
                  {/* Hover glow */}
                  <div style={{ position: "absolute", inset: 0, opacity: 0, background: "radial-gradient(circle at 50% 0%, rgba(241,200,82,0.07), transparent 60%)", transition: "opacity 0.3s", pointerEvents: "none" }} className="card-glow" />

                  {/* Icon */}
                  <div style={{ fontSize: 36, marginBottom: 18, lineHeight: 1 }}>{s.icon}</div>
                  <h3 style={{ fontSize: 21, fontWeight: 700, color: "#f0f0f0", marginBottom: 6 }}>{s.title}</h3>
                  <p style={{ fontSize: 13, color: "#f1c852", fontStyle: "italic", marginBottom: 14, fontWeight: 500 }}>&ldquo;{s.tagline}&rdquo;</p>
                  <p style={{ fontSize: 14, color: "var(--muted)", lineHeight: 1.7, marginBottom: 24, flex: 1 }}>{s.body}</p>

                  {s.external ? (
                    <a href={s.href} target="_blank" rel="noopener noreferrer"
                      style={{ display: "inline-flex", alignItems: "center", gap: 6, fontSize: 13, fontWeight: 600, color: "#f1c852", textDecoration: "none" }}>
                      Learn More
                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" strokeWidth="2">
                        <path d="M2 7h10M8 3l4 4-4 4"/>
                      </svg>
                    </a>
                  ) : (
                    <Link href={s.href}
                      style={{ display: "inline-flex", alignItems: "center", gap: 6, fontSize: 13, fontWeight: 600, color: "#f1c852", textDecoration: "none" }}>
                      Learn More
                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" strokeWidth="2">
                        <path d="M2 7h10M8 3l4 4-4 4"/>
                      </svg>
                    </Link>
                  )}
                </motion.div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* ═══════════════════════════════════════ STATS ═══════════════════════════════════════ */}
      <section style={{ padding: "80px 0", background: "var(--bg-2)", borderTop: "1px solid var(--border)", borderBottom: "1px solid var(--border)", position: "relative", overflow: "hidden" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 100% 100% at 50% 50%, rgba(241,200,82,0.03), transparent)" }} />
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px", position: "relative", zIndex: 1 }}>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(180px, 1fr))", gap: 40 }}>
            {[
              { to: 12, suffix: "+", label: "Years of Trusted Experience", sub: "Since 2012" },
              { to: 100, suffix: "%", label: "Free Counselling", sub: "No charges, ever" },
              { to: 360, suffix: "°", label: "Complete Guidance", sub: "End to end support" },
              { to: 500, suffix: "+", label: "Students Guided", sub: "Across India" },
            ].map((s, i) => (
              <FadeUp key={s.label} delay={i * 0.1}>
                <div style={{ textAlign: "center" }}>
                  <div style={{ fontSize: "clamp(40px, 5vw, 64px)", fontWeight: 900, color: "#f1c852", lineHeight: 1, fontFamily: "var(--font-playfair)" }}>
                    <Counter to={s.to} suffix={s.suffix} />
                  </div>
                  <div style={{ fontSize: 15, fontWeight: 600, color: "#f0f0f0", marginTop: 8 }}>{s.label}</div>
                  <div style={{ fontSize: 12, color: "rgba(240,240,240,0.4)", marginTop: 4 }}>{s.sub}</div>
                </div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* ═══════════════════════════════════════ PROCESS ═══════════════════════════════════════ */}
      <section style={{ padding: "120px 0", background: "var(--bg-1)", position: "relative" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 80% 60% at 80% 50%, rgba(106,148,193,0.04) 0%, transparent 70%)" }} />

        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px", position: "relative", zIndex: 1 }}>
          <FadeUp style={{ marginBottom: 72 }}>
            <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))", gap: 40, alignItems: "center" }}>
              <div>
                <div className="tag" style={{ marginBottom: 16 }}>How It Works</div>
                <h2 style={{ fontSize: "clamp(30px, 4.5vw, 56px)", fontWeight: 800, color: "#f0f0f0", lineHeight: 1.1 }}>
                  The Process<span style={{ color: "#f1c852" }}>.</span>
                </h2>
              </div>
              <div>
                <p style={{ fontSize: 16, color: "var(--muted)", lineHeight: 1.8 }}>
                  Being a community we try to immunise your dreams and passion. We have a committed process to guide your rough plan into a reality abroad.
                </p>
                <Link href="/process" className="btn-outline" style={{ marginTop: 24, display: "inline-flex" }}>
                  See Full Process
                </Link>
              </div>
            </div>
          </FadeUp>

          {/* Steps */}
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(200px, 1fr))", gap: 16 }}>
            {STEPS.map((step, i) => (
              <FadeUp key={step.title} delay={i * 0.1}>
                <motion.div
                  whileHover={{ y: -6, borderColor: "rgba(241,200,82,0.25)" }}
                  transition={{ duration: 0.25 }}
                  className="glass"
                  style={{ padding: 28, borderRadius: 20, height: "100%", position: "relative" }}
                >
                  {/* Step number */}
                  <div style={{ fontSize: 11, fontWeight: 700, color: "#f1c852", letterSpacing: "0.1em", marginBottom: 16, opacity: 0.7 }}>STEP {step.n}</div>
                  {/* Circle */}
                  <div style={{
                    width: 52, height: 52, borderRadius: 14,
                    background: "rgba(241,200,82,0.08)", border: "1px solid rgba(241,200,82,0.2)",
                    display: "flex", alignItems: "center", justifyContent: "center",
                    fontSize: 18, fontWeight: 900, color: "#f1c852", marginBottom: 18,
                    fontFamily: "var(--font-playfair)",
                  }}>{i + 1}</div>
                  <h3 style={{ fontSize: 20, fontWeight: 700, color: "#f0f0f0", marginBottom: 10 }}>{step.title}</h3>
                  <p style={{ fontSize: 13, color: "var(--muted)", lineHeight: 1.7 }}>{step.text}</p>
                  {/* Connector arrow */}
                  {i < STEPS.length - 1 && (
                    <div style={{ position: "absolute", top: 52, right: -10, zIndex: 2, display: "none" }} className="lg:block">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="rgba(241,200,82,0.3)" strokeWidth="2">
                        <path d="M4 10h12M12 6l4 4-4 4"/>
                      </svg>
                    </div>
                  )}
                </motion.div>
              </FadeUp>
            ))}
          </div>
        </div>
      </section>

      {/* ═══════════════════════════════════════ COMMUNITY CAROUSEL ═══════════════════════════════════════ */}
      <section style={{ padding: "100px 0", background: "var(--bg-1)", position: "relative" }}>
        <div style={{ textAlign: "center", marginBottom: 60, padding: "0 24px" }}>
          <FadeUp>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Our Family</div>
            <h2 style={{ fontSize: "clamp(30px, 4.5vw, 56px)", fontWeight: 800, color: "#f0f0f0", lineHeight: 1.1 }}>
              Join Our <span className="gold-text">Community</span>
            </h2>
            <p style={{ fontSize: 16, color: "var(--muted)", maxWidth: 500, margin: "16px auto 0" }}>
              A glimpse into the vibrant network of students who have made their dream a reality.
            </p>
          </FadeUp>
        </div>
        
        {/* Seamless Marquee */}
        <FadeUp delay={0.2}>
          <div style={{ display: "flex", overflow: "hidden", position: "relative", width: "100vw", left: "50%", transform: "translateX(-50%)" }} className="marquee-wrapper">
            {/* Linear gradient fade edges for smooth entry/exit */}
            <div style={{ position: "absolute", top: 0, bottom: 0, left: 0, width: "15vw", background: "linear-gradient(to right, var(--bg-1) 0%, transparent 100%)", zIndex: 2, pointerEvents: "none" }} />
            <div style={{ position: "absolute", top: 0, bottom: 0, right: 0, width: "15vw", background: "linear-gradient(to left, var(--bg-1) 0%, transparent 100%)", zIndex: 2, pointerEvents: "none" }} />

            <div style={{ display: "flex", animation: "marquee 45s linear infinite", width: "max-content", padding: "10px 0" }} className="community-marquee">
              {[...COMMUNITY_IMAGES, ...COMMUNITY_IMAGES, ...COMMUNITY_IMAGES, ...COMMUNITY_IMAGES].map((src, i) => (
                <div key={i} style={{ width: 280, height: 380, flexShrink: 0, margin: "0 12px", position: "relative", borderRadius: 24, overflow: "hidden", cursor: "pointer", boxShadow: "0 10px 30px rgba(0,0,0,0.2)" }}>
                  <Image 
                    src={src} 
                    alt="Community" 
                    fill 
                    style={{ objectFit: "cover", filter: "grayscale(100%)", transition: "all 0.5s cubic-bezier(0.25, 1, 0.5, 1)" }} 
                    onMouseEnter={(e) => { 
                      e.currentTarget.style.filter = "grayscale(0%)"; 
                      e.currentTarget.style.transform = "scale(1.08)"; 
                    }}
                    onMouseLeave={(e) => { 
                      e.currentTarget.style.filter = "grayscale(100%)"; 
                      e.currentTarget.style.transform = "scale(1)"; 
                    }}
                  />
                </div>
              ))}
            </div>
          </div>
        </FadeUp>
        
        <style dangerouslySetInnerHTML={{__html: `
          @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-304px * 15)); } /* 280px width + 24px margin = 304px * 15 items */
          }
          .marquee-wrapper:hover .community-marquee {
            animation-play-state: paused;
          }
        `}} />
      </section>

      {/* ═══════════════════════════════════════ VIDEOS ═══════════════════════════════════════ */}
      <section style={{ padding: "120px 0", background: "var(--bg-0)" }}>
        <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px" }}>
          <FadeUp style={{ textAlign: "center", marginBottom: 64 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 16 }}>Student Stories</div>
            <h2 style={{ fontSize: "clamp(30px, 4.5vw, 56px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16 }}>
              Hear From Our <span className="gold-text">Community</span>
            </h2>
            <p style={{ fontSize: 16, color: "var(--muted)", maxWidth: 480, margin: "0 auto" }}>
              Real stories from students who trusted us to guide their study abroad journey.
            </p>
          </FadeUp>

          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(280px, 1fr))", gap: 20 }}>
            {VIDEOS.slice(0, 10).map((video, i) => (
              <FadeUp key={`${video.id}-${i}`} delay={i * 0.07}>
                <motion.a
                  href={`https://www.youtube.com/watch?v=${video.id}`}
                  target="_blank" rel="noopener noreferrer"
                  whileHover={{ y: -8, scale: 1.01 }}
                  transition={{ type: "spring", stiffness: 300, damping: 20 }}
                  style={{ display: "block", borderRadius: 20, overflow: "hidden", border: "1px solid var(--border)", position: "relative", textDecoration: "none" }}
                >
                  <div style={{ position: "relative", aspectRatio: "16/9" }}>
                    <Image
                      src={`https://img.youtube.com/vi/${video.id}/hqdefault.jpg`}
                      alt={video.title}
                      fill style={{ objectFit: "cover" }}
                    />
                    {/* Overlay */}
                    <div style={{ position: "absolute", inset: 0, background: "rgba(0,0,0,0.35)", transition: "background 0.3s" }} />
                    {/* Play */}
                    <div style={{ position: "absolute", inset: 0, display: "flex", alignItems: "center", justifyContent: "center" }}>
                      <div className="play-btn">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="#080910">
                          <path d="M8 5.5l9 5.5-9 5.5V5.5z"/>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div style={{ padding: "14px 16px", background: "var(--bg-2)" }}>
                    <div style={{ fontSize: 13, fontWeight: 600, color: "#f0f0f0" }}>{video.title}</div>
                    <div style={{ fontSize: 11, color: "rgba(240,240,240,0.4)", marginTop: 3 }}>BM Global Careers · YouTube</div>
                  </div>
                </motion.a>
              </FadeUp>
            ))}
          </div>

          <FadeUp style={{ textAlign: "center", marginTop: 48 }}>
            <Link href="/videos" className="btn-outline">
              View All Videos
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" strokeWidth="2">
                <path d="M3 8h10M9 4l4 4-4 4"/>
              </svg>
            </Link>
          </FadeUp>
        </div>
      </section>

      {/* ═══════════════════════════════════════ CTA BANNER ═══════════════════════════════════════ */}
      <section style={{ padding: "100px 0", background: "var(--bg-1)", position: "relative", overflow: "hidden" }}>
        <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 80% 80% at 50% 50%, rgba(241,200,82,0.07), transparent)" }} />
        <div className="grid-bg" style={{ position: "absolute", inset: 0, opacity: 0.3 }} />

        <div style={{ maxWidth: 720, margin: "0 auto", padding: "0 24px", textAlign: "center", position: "relative", zIndex: 1 }}>
          <FadeUp>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 24 }}>Ready to Begin?</div>
            <h2 style={{ fontSize: "clamp(32px, 5vw, 60px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 16, lineHeight: 1.1 }}>
              Chase Your Dream{" "}
              <span className="gold-text">Together</span>
            </h2>
            <p style={{ fontSize: 17, color: "var(--muted)", lineHeight: 1.7, marginBottom: 40 }}>
              Book your free 30-minute counselling session today. No obligation, no hidden costs — just honest, expert guidance from our UK-based community.
            </p>
            <div style={{ display: "flex", flexWrap: "wrap", gap: 14, justifyContent: "center" }}>
              <a href="https://bmglobalcareerscrm.eduabroadcrm.com/forms/Enquiry-Form-vGk1726210863vw"
                target="_blank" rel="noopener noreferrer" className="btn-gold">
                Enquire Now — It&apos;s Free
              </a>
              <Link href="/contact" className="btn-outline">Contact Us</Link>
            </div>
          </FadeUp>
        </div>
      </section>
    </>
  );
}
