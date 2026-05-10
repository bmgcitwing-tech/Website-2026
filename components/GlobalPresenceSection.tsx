"use client";

import { useState, useRef, useMemo } from "react";
import dynamic from "next/dynamic";
import { motion, AnimatePresence, useInView } from "framer-motion";
import { COUNTRIES, CountryInfo, University, ENQUIRY_URL } from "@/lib/universityData";

const MapChart = dynamic(() => import("./MapChart"), {
  ssr: false,
  loading: () => (
    <div style={{ width: "100%", height: "100%", display: "flex", alignItems: "center", justifyContent: "center" }}>
      <div style={{ textAlign: "center" }}>
        <div style={{ width: 44, height: 44, border: "3px solid rgba(241,200,82,0.2)", borderTopColor: "#f1c852", borderRadius: "50%", animation: "gpSpin 0.8s linear infinite", margin: "0 auto 12px" }} />
        <p style={{ color: "rgba(240,240,240,0.4)", fontSize: 13 }}>Loading interactive map…</p>
      </div>
    </div>
  ),
});

// ── Rank badge ──────────────────────────────────────────────────────────────
function RankBadge({ rank }: { rank: number | string }) {
  const label  = typeof rank === "number" ? `#${rank}` : rank;
  const isTop  = typeof rank === "number" && rank <= 100;
  const isMid  = typeof rank === "number" && rank <= 300;
  const color  = isTop ? "#f1c852" : isMid ? "#a8c5da" : "rgba(240,240,240,0.45)";
  const bg     = isTop ? "rgba(241,200,82,0.12)" : isMid ? "rgba(106,148,193,0.1)" : "rgba(255,255,255,0.05)";
  const border = isTop ? "rgba(241,200,82,0.3)"  : isMid ? "rgba(106,148,193,0.2)" : "rgba(255,255,255,0.08)";
  return (
    <span style={{ display: "inline-flex", alignItems: "center", padding: "2px 8px", borderRadius: 20, fontSize: 11, fontWeight: 700, background: bg, color, border: `1px solid ${border}` }}>
      QS {label}
    </span>
  );
}

// ── Single university card ───────────────────────────────────────────────────
function UniversityCard({ uni, index }: { uni: University; index: number }) {
  const [expanded, setExpanded] = useState(false);
  return (
    <motion.div
      initial={{ opacity: 0, y: 12 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.28, delay: Math.min(index * 0.04, 0.5) }}
      onClick={() => setExpanded(!expanded)}
      style={{
        background: "rgba(255,255,255,0.03)",
        border: `1px solid ${expanded ? "rgba(241,200,82,0.22)" : "rgba(255,255,255,0.07)"}`,
        borderRadius: 14, padding: "16px 16px 14px", marginBottom: 8, cursor: "pointer",
        transition: "border-color 0.2s",
      }}
    >
      {/* Header */}
      <div style={{ display: "flex", alignItems: "flex-start", gap: 10, marginBottom: 8 }}>
        <div style={{ flex: 1, minWidth: 0 }}>
          <div style={{ fontSize: 13, fontWeight: 700, color: "#f0f0f0", lineHeight: 1.3, marginBottom: 3 }}>
            {uni.name}
          </div>
          <div style={{ fontSize: 11, color: "rgba(240,240,240,0.4)", display: "flex", alignItems: "center", gap: 4 }}>
            <svg width="9" height="9" viewBox="0 0 12 12" fill="currentColor"><path d="M6 0C3.8 0 2 1.8 2 4c0 3 4 8 4 8s4-5 4-8c0-2.2-1.8-4-4-4zm0 5.5c-.8 0-1.5-.7-1.5-1.5S5.2 2.5 6 2.5 7.5 3.2 7.5 4 6.8 5.5 6 5.5z"/></svg>
            {uni.city}
          </div>
        </div>
        <div style={{ display: "flex", flexDirection: "column", alignItems: "flex-end", gap: 3, flexShrink: 0 }}>
          <RankBadge rank={uni.qsRank} />
          <span style={{ fontSize: 11, color: "#f1c852", fontWeight: 600 }}>{uni.totalPrograms}+ programmes</span>
        </div>
      </div>

      {/* Intake + fee pills */}
      <div style={{ display: "flex", flexWrap: "wrap", gap: 5, marginBottom: 8 }}>
        {uni.intakes.map(intake => (
          <span key={intake} style={{ fontSize: 10, padding: "2px 7px", borderRadius: 20, background: "rgba(106,148,193,0.1)", color: "rgba(106,148,193,0.85)", border: "1px solid rgba(106,148,193,0.2)" }}>
            {intake}
          </span>
        ))}
        <span style={{ fontSize: 10, padding: "2px 7px", borderRadius: 20, background: "rgba(255,255,255,0.04)", color: "rgba(240,240,240,0.45)", border: "1px solid rgba(255,255,255,0.06)" }}>
          {uni.annualFee}/yr
        </span>
      </div>

      {/* Expand row */}
      <div style={{ display: "flex", alignItems: "center", justifyContent: "space-between" }}>
        <span style={{ fontSize: 10, color: "rgba(240,240,240,0.3)" }}>
          {expanded ? "Hide details" : "Programmes & apply →"}
        </span>
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="rgba(241,200,82,0.6)" strokeWidth="2"
          style={{ transition: "transform 0.2s", transform: expanded ? "rotate(180deg)" : "none" }}>
          <path d="M2 4l4 4 4-4"/>
        </svg>
      </div>

      {/* Expanded detail */}
      <AnimatePresence>
        {expanded && (
          <motion.div
            initial={{ height: 0, opacity: 0 }} animate={{ height: "auto", opacity: 1 }}
            exit={{ height: 0, opacity: 0 }} transition={{ duration: 0.22 }}
            style={{ overflow: "hidden" }}
          >
            <div style={{ paddingTop: 12, borderTop: "1px solid rgba(255,255,255,0.06)", marginTop: 10 }}>
              <div style={{ marginBottom: 12 }}>
                <div style={{ fontSize: 10, fontWeight: 700, color: "rgba(240,240,240,0.35)", textTransform: "uppercase", letterSpacing: "0.08em", marginBottom: 6 }}>
                  Popular Programmes
                </div>
                <div style={{ display: "flex", flexWrap: "wrap", gap: 5 }}>
                  {uni.popularPrograms.map(p => (
                    <span key={p} style={{ fontSize: 11, padding: "3px 9px", borderRadius: 20, background: "rgba(241,200,82,0.07)", color: "rgba(241,200,82,0.85)", border: "1px solid rgba(241,200,82,0.15)" }}>
                      {p}
                    </span>
                  ))}
                </div>
              </div>
              <div style={{ display: "flex", gap: 7, flexWrap: "wrap" }}>
                <a
                  href={ENQUIRY_URL}
                  target="_blank" rel="noopener noreferrer"
                  onClick={e => e.stopPropagation()}
                  style={{
                    flex: 1, minWidth: 130, display: "inline-flex", alignItems: "center", justifyContent: "center",
                    gap: 5, padding: "9px 14px", borderRadius: 9, fontSize: 11, fontWeight: 700,
                    background: "#f1c852", color: "#080910", textDecoration: "none", whiteSpace: "nowrap",
                    transition: "all 0.2s",
                  }}
                  onMouseEnter={e => { (e.currentTarget as HTMLElement).style.background = "#c9a037"; }}
                  onMouseLeave={e => { (e.currentTarget as HTMLElement).style.background = "#f1c852"; }}
                >
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" strokeWidth="2"><rect x="1" y="2" width="10" height="8" rx="1.5"/><path d="M1 5h10M4.5 2v2M7.5 2v2"/></svg>
                  Book Appointment
                </a>
                <a
                  href={uni.website}
                  target="_blank" rel="noopener noreferrer"
                  onClick={e => e.stopPropagation()}
                  style={{
                    display: "inline-flex", alignItems: "center", gap: 4,
                    padding: "9px 14px", borderRadius: 9, fontSize: 11, fontWeight: 600,
                    background: "rgba(255,255,255,0.04)", color: "rgba(240,240,240,0.65)",
                    border: "1px solid rgba(255,255,255,0.1)", textDecoration: "none", whiteSpace: "nowrap",
                    transition: "all 0.2s",
                  }}
                  onMouseEnter={e => { (e.currentTarget as HTMLElement).style.borderColor = "rgba(241,200,82,0.3)"; }}
                  onMouseLeave={e => { (e.currentTarget as HTMLElement).style.borderColor = "rgba(255,255,255,0.1)"; }}
                >
                  Visit Website
                  <svg width="9" height="9" viewBox="0 0 9 9" fill="none" stroke="currentColor" strokeWidth="1.8"><path d="M1.5 1.5h6v6M7.5 1.5l-6 6"/></svg>
                </a>
              </div>
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </motion.div>
  );
}

// ── Country side drawer ──────────────────────────────────────────────────────
function CountryDrawer({ country, onClose }: { country: CountryInfo; onClose: () => void }) {
  const [query,  setQuery]  = useState("");
  const [sortBy, setSortBy] = useState<"rank" | "programs">("rank");

  const filtered = useMemo(() => {
    let list = [...country.universities];
    if (query) list = list.filter(u => u.name.toLowerCase().includes(query.toLowerCase()) || u.city.toLowerCase().includes(query.toLowerCase()));
    if (sortBy === "rank") {
      list.sort((a, b) => {
        const ra = typeof a.qsRank === "number" ? a.qsRank : 9999;
        const rb = typeof b.qsRank === "number" ? b.qsRank : 9999;
        return ra - rb;
      });
    } else {
      list.sort((a, b) => b.totalPrograms - a.totalPrograms);
    }
    return list;
  }, [country, query, sortBy]);

  return (
    <>
      {/* Backdrop */}
      <motion.div
        initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }}
        onClick={onClose}
        style={{ position: "fixed", inset: 0, zIndex: 1000, background: "rgba(0,0,0,0.65)", backdropFilter: "blur(4px)" }}
      />

      {/* Drawer panel */}
      <motion.div
        initial={{ x: "100%" }} animate={{ x: 0 }} exit={{ x: "100%" }}
        transition={{ type: "spring", damping: 30, stiffness: 260 }}
        style={{
          position: "fixed", top: 0, right: 0, bottom: 0, zIndex: 1001,
          width: "min(540px, 100vw)",
          background: "rgba(10,11,18,0.98)",
          borderLeft: "1px solid rgba(255,255,255,0.08)",
          backdropFilter: "blur(30px)",
          display: "flex", flexDirection: "column",
        }}
      >
        {/* Header */}
        <div style={{ padding: "22px 22px 16px", borderBottom: "1px solid rgba(255,255,255,0.06)", flexShrink: 0 }}>
          <div style={{ display: "flex", alignItems: "center", justifyContent: "space-between", marginBottom: 14 }}>
            <div style={{ display: "flex", alignItems: "center", gap: 12 }}>
              <span style={{ fontSize: 34, lineHeight: 1 }}>{country.flag}</span>
              <div>
                <h3 style={{ fontSize: 20, fontWeight: 800, color: "#f0f0f0", lineHeight: 1.1 }}>{country.name}</h3>
                <p style={{ fontSize: 12, color: "rgba(241,200,82,0.8)", marginTop: 2, fontWeight: 600 }}>
                  {country.totalUniversities} partner universities
                </p>
              </div>
            </div>
            <button onClick={onClose} style={{ width: 34, height: 34, borderRadius: 9, background: "rgba(255,255,255,0.05)", border: "1px solid rgba(255,255,255,0.09)", display: "flex", alignItems: "center", justifyContent: "center", cursor: "pointer", flexShrink: 0 }}>
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="rgba(240,240,240,0.6)" strokeWidth="2"><path d="M2 2l10 10M12 2L2 12"/></svg>
            </button>
          </div>

          {/* Highlights */}
          <div style={{ display: "flex", flexDirection: "column", gap: 5, marginBottom: 14 }}>
            {country.highlights.map((h, i) => (
              <div key={i} style={{ display: "flex", alignItems: "flex-start", gap: 7 }}>
                <div style={{ minWidth: 16, height: 16, borderRadius: "50%", background: "rgba(241,200,82,0.1)", border: "1px solid rgba(241,200,82,0.25)", display: "flex", alignItems: "center", justifyContent: "center", marginTop: 1, flexShrink: 0 }}>
                  <svg width="8" height="8" viewBox="0 0 8 8" fill="none" stroke="#f1c852" strokeWidth="2"><path d="M1 4l2 2L7 1.5"/></svg>
                </div>
                <span style={{ fontSize: 11, color: "rgba(240,240,240,0.55)", lineHeight: 1.5 }}>{h}</span>
              </div>
            ))}
          </div>

          {/* Search + sort bar */}
          <div style={{ display: "flex", gap: 8 }}>
            <div style={{ position: "relative", flex: 1 }}>
              <svg style={{ position: "absolute", left: 9, top: "50%", transform: "translateY(-50%)" }} width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="rgba(240,240,240,0.35)" strokeWidth="1.8"><circle cx="5" cy="5" r="3.5"/><path d="M9 9l2 2"/></svg>
              <input
                type="text"
                placeholder="Search universities…"
                value={query}
                onChange={e => setQuery(e.target.value)}
                style={{ width: "100%", paddingLeft: 28, paddingRight: 10, paddingTop: 7, paddingBottom: 7, borderRadius: 9, fontSize: 12, background: "rgba(255,255,255,0.05)", border: "1px solid rgba(255,255,255,0.09)", color: "#f0f0f0", outline: "none" }}
              />
            </div>
            <select
              value={sortBy}
              onChange={e => setSortBy(e.target.value as "rank" | "programs")}
              style={{ padding: "7px 10px", borderRadius: 9, fontSize: 11, background: "rgba(255,255,255,0.05)", border: "1px solid rgba(255,255,255,0.09)", color: "rgba(240,240,240,0.7)", cursor: "pointer", outline: "none" }}
            >
              <option value="rank">Sort: Ranking</option>
              <option value="programs">Sort: Programmes</option>
            </select>
          </div>
          <div style={{ marginTop: 8, fontSize: 11, color: "rgba(240,240,240,0.35)" }}>
            Showing {filtered.length} of {country.universities.length} listed · <span style={{ color: "rgba(241,200,82,0.6)" }}>click any card to expand</span>
          </div>
        </div>

        {/* University list */}
        <div style={{ flex: 1, overflowY: "auto", padding: "14px 16px 24px" }}>
          {filtered.length === 0 ? (
            <div style={{ textAlign: "center", padding: "32px 0", color: "rgba(240,240,240,0.3)", fontSize: 13 }}>
              No universities match "{query}"
            </div>
          ) : (
            filtered.map((uni, i) => <UniversityCard key={uni.name} uni={uni} index={i} />)
          )}

          {/* Bottom CTA */}
          <div style={{ marginTop: 12, padding: "18px 18px", borderRadius: 14, background: "rgba(241,200,82,0.04)", border: "1px solid rgba(241,200,82,0.12)", textAlign: "center" }}>
            <p style={{ fontSize: 12, color: "rgba(240,240,240,0.5)", marginBottom: 12, lineHeight: 1.55 }}>
              Want the complete list of <strong style={{ color: "#f1c852" }}>{country.totalUniversities} universities</strong> in {country.name} with a personalised shortlist?
            </p>
            <a
              href={ENQUIRY_URL}
              target="_blank" rel="noopener noreferrer"
              className="btn-gold"
              style={{ padding: "10px 22px", fontSize: 12, borderRadius: 10, display: "inline-flex" }}
            >
              Get Free Counselling
              <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" strokeWidth="2.5"><path d="M2.5 6.5h8M7 3l3.5 3.5L7 10"/></svg>
            </a>
          </div>
        </div>
      </motion.div>
    </>
  );
}

// ── Fade-up animation wrapper ────────────────────────────────────────────────
function FadeUp({ children, delay = 0 }: { children: React.ReactNode; delay?: number }) {
  const ref = useRef<HTMLDivElement>(null);
  const inView = useInView(ref, { once: true, margin: "-60px" });
  return (
    <motion.div ref={ref}
      initial={{ opacity: 0, y: 32 }}
      animate={inView ? { opacity: 1, y: 0 } : {}}
      transition={{ duration: 0.7, delay, ease: [0.22, 1, 0.36, 1] }}
    >
      {children}
    </motion.div>
  );
}

// ── Region filter config ─────────────────────────────────────────────────────
const REGIONS = [
  { label: "All",          key: "all" },
  { label: "UK & Europe",  key: "europe" },
  { label: "Asia Pacific", key: "asia" },
  { label: "Americas",     key: "americas" },
  { label: "Middle East",  key: "me" },
];
const REGION_KEYS: Record<string, string[]> = {
  europe:   ["uk","germany","france","italy","spain","netherlands","switzerland","ireland","sweden","finland","belgium","austria","denmark","hungary","poland","lithuania","latvia","croatia","luxembourg","monaco","russia","georgia","greece","malta"],
  asia:     ["australia","new-zealand","singapore","japan","south-korea","malaysia","china","thailand","vietnam","indonesia","sri-lanka","mauritius"],
  americas: ["usa","canada"],
  me:       ["uae","saudi-arabia","kazakhstan","cyprus"],
};

// ── Main exported section ────────────────────────────────────────────────────
export default function GlobalPresenceSection() {
  const [selectedCountry, setSelectedCountry] = useState<CountryInfo | null>(null);
  const [activeRegion,    setActiveRegion]    = useState("all");
  const [searchQuery,     setSearchQuery]     = useState("");

  const filteredCountries = useMemo(() => COUNTRIES.filter(c => {
    const matchesRegion  = activeRegion === "all" || (REGION_KEYS[activeRegion]?.includes(c.key) ?? false);
    const matchesSearch  = !searchQuery || c.name.toLowerCase().includes(searchQuery.toLowerCase());
    return matchesRegion && matchesSearch;
  }), [activeRegion, searchQuery]);

  const totalUniversities = COUNTRIES.reduce((s, c) => s + c.totalUniversities, 0);

  return (
    <section style={{ padding: "120px 0 80px", background: "var(--bg-0)", position: "relative", overflow: "hidden" }}>
      {/* Ambient glows */}
      <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 80% 60% at 50% 0%, rgba(241,200,82,0.05) 0%, transparent 60%)", pointerEvents: "none" }} />
      <div className="grid-bg" style={{ position: "absolute", inset: 0, opacity: 0.25, pointerEvents: "none" }} />

      <div style={{ maxWidth: 1280, margin: "0 auto", padding: "0 24px", position: "relative", zIndex: 1 }}>

        {/* ── Section header ── */}
        <FadeUp>
          <div style={{ textAlign: "center", marginBottom: 56 }}>
            <div className="tag" style={{ display: "inline-flex", marginBottom: 14 }}>Global Reach</div>
            <h2 style={{ fontSize: "clamp(30px, 4.5vw, 56px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 14, lineHeight: 1.1 }}>
              Study in <span className="gold-text">42+ Countries</span> Worldwide
            </h2>
            <p style={{ fontSize: 17, color: "var(--muted)", maxWidth: 560, margin: "0 auto", lineHeight: 1.7 }}>
              Click any glowing country on the map — or use the cards below — to explore ranked universities, programmes, fees and book a free counselling appointment.
            </p>
            <div style={{ display: "flex", justifyContent: "center", flexWrap: "wrap", gap: 32, marginTop: 28 }}>
              {[
                { value: "42",           label: "Countries" },
                { value: `${totalUniversities}+`, label: "Partner Universities" },
                { value: "1,200+",       label: "Programmes Listed" },
              ].map(s => (
                <div key={s.label} style={{ textAlign: "center" }}>
                  <div style={{ fontSize: 30, fontWeight: 900, color: "#f1c852" }}>{s.value}</div>
                  <div style={{ fontSize: 12, color: "rgba(240,240,240,0.4)", marginTop: 2 }}>{s.label}</div>
                </div>
              ))}
            </div>
          </div>
        </FadeUp>

        {/* ── Interactive world map ── */}
        <FadeUp delay={0.1}>
          <div style={{ position: "relative", borderRadius: 24, overflow: "hidden", border: "1px solid rgba(255,255,255,0.07)", background: "rgba(8,12,24,0.85)", marginBottom: 20 }}>
            {/* Legend */}
            <div style={{ position: "absolute", top: 14, left: 14, zIndex: 10, display: "flex", alignItems: "center", gap: 14, flexWrap: "wrap" }}>
              <div style={{ display: "flex", alignItems: "center", gap: 6 }}>
                <div style={{ width: 10, height: 10, borderRadius: 2, background: "rgba(241,200,82,0.22)", border: "1px solid rgba(241,200,82,0.5)" }} />
                <span style={{ fontSize: 11, color: "rgba(240,240,240,0.45)" }}>Partner country</span>
              </div>
              <div style={{ display: "flex", alignItems: "center", gap: 6 }}>
                <div style={{ width: 10, height: 10, borderRadius: 2, background: "#f1c852" }} />
                <span style={{ fontSize: 11, color: "rgba(240,240,240,0.45)" }}>Selected</span>
              </div>
            </div>
            {/* Controls hint */}
            <div style={{ position: "absolute", top: 14, right: 60, zIndex: 10 }}>
              <div style={{ fontSize: 10, color: "rgba(240,240,240,0.3)", background: "rgba(0,0,0,0.35)", padding: "3px 9px", borderRadius: 20, border: "1px solid rgba(255,255,255,0.05)" }}>
                Scroll / pinch to zoom · Drag to pan · Click country or marker
              </div>
            </div>
            {/* Map canvas */}
            <div style={{ height: "clamp(300px, 44vw, 510px)" }}>
              <MapChart
                onCountryClick={setSelectedCountry}
                selectedKey={selectedCountry?.key ?? null}
              />
            </div>
          </div>
        </FadeUp>

        {/* ── Country cards grid ── */}
        <FadeUp delay={0.15}>
          {/* Filter + search bar */}
          <div style={{ display: "flex", alignItems: "center", flexWrap: "wrap", gap: 10, marginBottom: 18, justifyContent: "space-between" }}>
            <div style={{ display: "flex", gap: 6, flexWrap: "wrap" }}>
              {REGIONS.map(r => (
                <button key={r.key} onClick={() => setActiveRegion(r.key)}
                  style={{
                    padding: "6px 14px", borderRadius: 20, fontSize: 12, fontWeight: 600, cursor: "pointer", border: "none",
                    background: activeRegion === r.key ? "#f1c852" : "rgba(255,255,255,0.05)",
                    color: activeRegion === r.key ? "#080910" : "rgba(240,240,240,0.6)",
                    transition: "all 0.18s",
                  }}
                >
                  {r.label}
                </button>
              ))}
            </div>
            <div style={{ position: "relative" }}>
              <svg style={{ position: "absolute", left: 9, top: "50%", transform: "translateY(-50%)" }} width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="rgba(240,240,240,0.3)" strokeWidth="1.8"><circle cx="5" cy="5" r="3.5"/><path d="M9 9l2 2"/></svg>
              <input
                type="text" placeholder="Search country…"
                value={searchQuery}
                onChange={e => setSearchQuery(e.target.value)}
                style={{ paddingLeft: 28, paddingRight: 12, paddingTop: 7, paddingBottom: 7, borderRadius: 20, fontSize: 12, background: "rgba(255,255,255,0.05)", border: "1px solid rgba(255,255,255,0.09)", color: "#f0f0f0", outline: "none", width: 175 }}
              />
            </div>
          </div>

          {/* Cards */}
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fill, minmax(170px, 1fr))", gap: 10 }}>
            <AnimatePresence>
              {filteredCountries.map((country, i) => (
                <motion.button
                  key={country.key}
                  layout
                  initial={{ opacity: 0, scale: 0.95 }}
                  animate={{ opacity: 1, scale: 1 }}
                  exit={{ opacity: 0, scale: 0.95 }}
                  transition={{ duration: 0.28, delay: Math.min(i * 0.025, 0.5) }}
                  whileHover={{ y: -4, scale: 1.02 }}
                  onClick={() => setSelectedCountry(country)}
                  style={{
                    background: selectedCountry?.key === country.key ? "rgba(241,200,82,0.1)" : "rgba(255,255,255,0.03)",
                    border: `1px solid ${selectedCountry?.key === country.key ? "rgba(241,200,82,0.35)" : "rgba(255,255,255,0.07)"}`,
                    borderRadius: 13, padding: "14px 13px", textAlign: "left",
                    cursor: "pointer", transition: "border-color 0.18s, background 0.18s",
                    display: "flex", flexDirection: "column", gap: 5,
                  }}
                >
                  <div style={{ display: "flex", alignItems: "center", justifyContent: "space-between" }}>
                    <span style={{ fontSize: 22 }}>{country.flag}</span>
                    <span style={{ fontSize: 11, fontWeight: 700, color: "#f1c852", background: "rgba(241,200,82,0.1)", padding: "2px 6px", borderRadius: 20 }}>
                      {country.totalUniversities}
                    </span>
                  </div>
                  <div style={{ fontSize: 12, fontWeight: 600, color: "#f0f0f0", lineHeight: 1.2 }}>{country.name}</div>
                  <div style={{ fontSize: 10, color: "rgba(240,240,240,0.38)" }}>{country.universities.length} listed · click to view</div>
                </motion.button>
              ))}
            </AnimatePresence>
          </div>

          {filteredCountries.length === 0 && (
            <div style={{ textAlign: "center", padding: "36px 0", color: "rgba(240,240,240,0.3)", fontSize: 14 }}>
              No countries match "{searchQuery}"
            </div>
          )}
        </FadeUp>

        {/* ── Bottom CTA strip ── */}
        <FadeUp delay={0.2}>
          <div style={{ marginTop: 48, padding: "36px 28px", borderRadius: 22, background: "rgba(241,200,82,0.04)", border: "1px solid rgba(241,200,82,0.12)", textAlign: "center", position: "relative", overflow: "hidden" }}>
            <div style={{ position: "absolute", inset: 0, background: "radial-gradient(ellipse 60% 60% at 50% 100%, rgba(241,200,82,0.06), transparent)", pointerEvents: "none" }} />
            <h3 style={{ fontSize: "clamp(19px, 3vw, 30px)", fontWeight: 800, color: "#f0f0f0", marginBottom: 10, position: "relative" }}>
              Can't find your dream destination?
            </h3>
            <p style={{ fontSize: 15, color: "rgba(240,240,240,0.5)", marginBottom: 24, maxWidth: 460, margin: "0 auto 24px", lineHeight: 1.7, position: "relative" }}>
              Our counsellors cover 42+ countries and 1,200+ programmes. Book a free session and get a personalised university shortlist within 24 hours.
            </p>
            <div style={{ display: "flex", gap: 12, justifyContent: "center", flexWrap: "wrap", position: "relative" }}>
              <a href={ENQUIRY_URL} target="_blank" rel="noopener noreferrer" className="btn-gold">
                Book Free Counselling
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" strokeWidth="2.5"><path d="M3 7h8M8 3.5L11.5 7 8 10.5"/></svg>
              </a>
              <a href="https://wa.me/447448168104" target="_blank" rel="noopener noreferrer" className="btn-outline">
                WhatsApp Us
              </a>
            </div>
          </div>
        </FadeUp>
      </div>

      {/* ── Drawer ── */}
      <AnimatePresence>
        {selectedCountry && (
          <CountryDrawer
            country={selectedCountry}
            onClose={() => setSelectedCountry(null)}
          />
        )}
      </AnimatePresence>

      <style>{`
        @keyframes gpSpin { to { transform: rotate(360deg); } }
        input::placeholder { color: rgba(240,240,240,0.28); }
        input:focus  { border-color: rgba(241,200,82,0.3) !important; }
        select option { background: #0d0f16; color: #f0f0f0; }
      `}</style>
    </section>
  );
}
