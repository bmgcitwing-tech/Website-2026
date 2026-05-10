"use client";

import {
  ComposableMap, Geographies, Geography,
  ZoomableGroup, Marker,
} from "react-simple-maps";
import { useState, useRef, useCallback } from "react";
import { COUNTRIES, COUNTRY_BY_NUMERIC, CountryInfo } from "@/lib/universityData";

const GEO_URL = "https://cdn.jsdelivr.net/npm/world-atlas@2/countries-110m.json";

interface Tooltip { country: CountryInfo; x: number; y: number; }
interface Props { onCountryClick: (country: CountryInfo) => void; selectedKey: string | null; }

export default function MapChart({ onCountryClick, selectedKey }: Props) {
  const containerRef = useRef<HTMLDivElement>(null);
  const [tooltip,  setTooltip]  = useState<Tooltip | null>(null);
  const [zoom,     setZoom]     = useState(1);
  const [center,   setCenter]   = useState<[number, number]>([10, 10]);

  const getPos = useCallback((e: React.MouseEvent) => {
    const r = containerRef.current?.getBoundingClientRect();
    if (!r) return { x: 0, y: 0 };
    return { x: e.clientX - r.left, y: e.clientY - r.top };
  }, []);

  return (
    <div ref={containerRef} style={{ position: "relative", width: "100%", height: "100%" }}>

      {/* Tooltip */}
      {tooltip && (
        <div style={{
          position: "absolute", left: tooltip.x + 14, top: tooltip.y - 10,
          zIndex: 50, pointerEvents: "none",
          background: "rgba(10,11,18,0.95)", border: "1px solid rgba(241,200,82,0.3)",
          borderRadius: 10, padding: "8px 12px", backdropFilter: "blur(12px)",
          boxShadow: "0 8px 32px rgba(0,0,0,0.5)", minWidth: 165,
        }}>
          <div style={{ display: "flex", alignItems: "center", gap: 8, marginBottom: 3 }}>
            <span style={{ fontSize: 18 }}>{tooltip.country.flag}</span>
            <span style={{ fontSize: 13, fontWeight: 700, color: "#f0f0f0" }}>{tooltip.country.name}</span>
          </div>
          <div style={{ fontSize: 11, color: "rgba(241,200,82,0.9)", fontWeight: 600 }}>
            {tooltip.country.totalUniversities} partner universities
          </div>
          <div style={{ fontSize: 10, color: "rgba(240,240,240,0.4)", marginTop: 2 }}>Click to explore →</div>
        </div>
      )}

      {/* Zoom controls */}
      <div style={{ position: "absolute", bottom: 12, right: 12, zIndex: 10, display: "flex", flexDirection: "column", gap: 4 }}>
        {([
          { label: "+", fn: () => setZoom(z => Math.min(z * 1.6, 10)), title: "Zoom in" },
          { label: "⟲", fn: () => { setZoom(1); setCenter([10, 10]); }, title: "Reset" },
          { label: "−", fn: () => setZoom(z => Math.max(z / 1.6, 1)), title: "Zoom out" },
        ] as { label: string; fn: () => void; title: string }[]).map(({ label, fn, title }) => (
          <button key={label} onClick={fn} title={title}
            style={{
              width: 30, height: 30, borderRadius: 7,
              background: "rgba(13,15,22,0.92)", border: "1px solid rgba(241,200,82,0.25)",
              color: "#f1c852", fontSize: label === "⟲" ? 13 : 17, fontWeight: 700,
              cursor: "pointer", display: "flex", alignItems: "center", justifyContent: "center",
              transition: "background 0.18s",
            }}
            onMouseEnter={e => { (e.currentTarget as HTMLElement).style.background = "rgba(241,200,82,0.12)"; }}
            onMouseLeave={e => { (e.currentTarget as HTMLElement).style.background = "rgba(13,15,22,0.92)"; }}
          >{label}</button>
        ))}
      </div>

      {/* Map — no Sphere, no Graticule: pure country shapes */}
      <ComposableMap
        projectionConfig={{ scale: 147, center: [10, 10] }}
        style={{ width: "100%", height: "100%" }}
      >
        <ZoomableGroup
          zoom={zoom} center={center} minZoom={1} maxZoom={10}
          onMoveEnd={({ coordinates, zoom: z }) => { setCenter(coordinates); setZoom(z); }}
        >
          <Geographies geography={GEO_URL}>
            {({ geographies }) => geographies.map((geo) => {
              const numericId  = String(geo.id);
              const country    = COUNTRY_BY_NUMERIC[numericId];
              const isActive   = !!country;
              const isSelected = isActive && selectedKey === country.key;

              const fill = isSelected
                ? "rgba(241,200,82,0.75)"
                : isActive
                  ? "rgba(241,200,82,0.18)"
                  : "#1a1d27";
              const stroke = isSelected
                ? "#f1c852"
                : isActive
                  ? "rgba(241,200,82,0.45)"
                  : "rgba(255,255,255,0.05)";

              return (
                <Geography key={geo.rsmKey} geography={geo}
                  fill={fill} stroke={stroke}
                  strokeWidth={isSelected ? 0.8 : isActive ? 0.5 : 0.3}
                  style={{
                    default: { outline: "none", transition: "fill 0.18s" },
                    hover:   {
                      outline: "none",
                      cursor:  isActive ? "pointer" : "default",
                      fill:    isActive
                        ? (isSelected ? "rgba(241,200,82,0.9)" : "rgba(241,200,82,0.42)")
                        : "#1e2130",
                    },
                    pressed: { outline: "none", fill: isActive ? "#f1c852" : "#1a1d27" },
                  }}
                  onMouseEnter={e => {
                    if (!isActive) return;
                    const p = getPos(e);
                    setTooltip({ country, x: p.x, y: p.y });
                  }}
                  onMouseMove={e => {
                    if (!isActive || !tooltip) return;
                    const p = getPos(e);
                    setTooltip(prev => prev ? { ...prev, x: p.x, y: p.y } : null);
                  }}
                  onMouseLeave={() => setTooltip(null)}
                  onClick={() => { if (isActive) onCountryClick(country); }}
                />
              );
            })}
          </Geographies>

          {/* Pulse markers */}
          {COUNTRIES.map(country => (
            <Marker key={country.key} coordinates={country.coordinates}
              onClick={() => onCountryClick(country)}>
              <circle r={selectedKey === country.key ? 6 : 4} fill="none"
                stroke="#f1c852" strokeWidth={selectedKey === country.key ? 2 : 1.5}
                opacity={0.55} style={{ animation: "mapPulse 2s ease-out infinite" }} />
              <circle r={selectedKey === country.key ? 3.5 : 2.5}
                fill={selectedKey === country.key ? "#f1c852" : "rgba(241,200,82,0.85)"}
                stroke="rgba(0,0,0,0.35)" strokeWidth={0.5} style={{ cursor: "pointer" }} />
            </Marker>
          ))}
        </ZoomableGroup>
      </ComposableMap>

      <style>{`
        @keyframes mapPulse {
          0%   { r: 3; opacity: 0.9; }
          70%  { r: 9; opacity: 0;   }
          100% { r: 3; opacity: 0;   }
        }
      `}</style>
    </div>
  );
}
