"use client";

import { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";

const WHATSAPP_NUMBER = "447448168104";

export default function WhatsAppWidget() {
  const [isOpen, setIsOpen] = useState(false);
  const [name, setName] = useState("");
  const [message, setMessage] = useState("");

  const handleSend = (e: React.FormEvent) => {
    e.preventDefault();
    if (!message.trim()) return;
    
    const text = name.trim() ? `Hi, my name is ${name}. ${message}` : message;
    const encodedText = encodeURIComponent(text);
    const whatsappUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodedText}`;
    
    window.open(whatsappUrl, "_blank");
    setIsOpen(false);
    setMessage("");
    setName("");
  };

  return (
    <div style={{ position: "fixed", bottom: 24, right: 24, zIndex: 9999 }}>
      <AnimatePresence>
        {isOpen && (
          <motion.div
            initial={{ opacity: 0, y: 20, scale: 0.9 }}
            animate={{ opacity: 1, y: 0, scale: 1 }}
            exit={{ opacity: 0, y: 20, scale: 0.9 }}
            transition={{ type: "spring", stiffness: 300, damping: 25 }}
            style={{
              position: "absolute",
              bottom: 80,
              right: 0,
              width: 320,
              background: "var(--bg-2)",
              border: "1px solid var(--border)",
              borderRadius: 20,
              overflow: "hidden",
              boxShadow: "0 20px 40px rgba(0,0,0,0.4)",
            }}
          >
            {/* Header */}
            <div style={{ background: "#25D366", padding: "20px 24px", color: "#fff", display: "flex", alignItems: "center", gap: 12 }}>
              <div style={{ width: 40, height: 40, borderRadius: "50%", background: "rgba(255,255,255,0.2)", display: "flex", alignItems: "center", justifyContent: "center" }}>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12.031 0C5.385 0 0 5.385 0 12.032c0 2.128.552 4.133 1.543 5.922L0 24l6.233-1.636A11.97 11.97 0 0 0 12.031 24c6.645 0 12.032-5.385 12.032-12.032C24.063 5.385 18.676 0 12.031 0zm0 20.06a9.96 9.96 0 0 1-5.112-1.406l-.367-.218-3.799.997.997-3.799-.218-.367A9.964 9.964 0 0 1 2.072 12.03c0-5.5 4.48-9.98 9.98-9.98s9.98 4.48 9.98 9.98-4.48 9.98-9.98 9.98zm5.48-7.487c-.301-.15-1.782-.879-2.058-.978-.276-.1-.476-.15-.676.15-.2.3-.775.978-.95 1.178-.175.2-.35.225-.65.075-1.365-.688-2.584-1.54-3.535-2.482-.676-.676-1.157-1.464-1.43-2.13-.125-.276.012-.425.163-.575.137-.137.301-.35.451-.525.15-.175.2-.3.3-.5.1-.2.05-.375-.025-.525-.075-.15-.676-1.626-.926-2.226-.24-.582-.486-.503-.676-.513l-.576-.013c-.2 0-.525.075-.801.375-.276.3-1.05 1.026-1.05 2.502 0 1.476 1.076 2.903 1.226 3.103.15.2 2.115 3.228 5.128 4.529 1.575.681 2.457.776 3.287.644.606-.097 1.782-.726 2.032-1.426.25-.7.25-1.301.175-1.426-.075-.125-.276-.2-.576-.35z"/>
                </svg>
              </div>
              <div>
                <div style={{ fontWeight: 700, fontSize: 16 }}>BM Global Careers</div>
                <div style={{ fontSize: 12, opacity: 0.9 }}>Typically replies in minutes</div>
              </div>
            </div>

            {/* Body */}
            <div style={{ padding: 24 }}>
              <div style={{ background: "var(--bg-1)", padding: 16, borderRadius: "0 16px 16px 16px", marginBottom: 20, fontSize: 14, color: "var(--text)", lineHeight: 1.5 }}>
                Hi there! 👋<br />How can we help you with your study abroad plans today?
              </div>
              
              <form onSubmit={handleSend} style={{ display: "flex", flexDirection: "column", gap: 12 }}>
                <input
                  type="text"
                  placeholder="Your Name (Optional)"
                  value={name}
                  onChange={(e) => setName(e.target.value)}
                  style={{
                    width: "100%",
                    padding: "12px 16px",
                    borderRadius: 12,
                    border: "1px solid var(--border)",
                    background: "var(--bg-0)",
                    color: "var(--text)",
                    fontSize: 14,
                    outline: "none",
                  }}
                />
                <textarea
                  placeholder="Type your message..."
                  required
                  value={message}
                  onChange={(e) => setMessage(e.target.value)}
                  style={{
                    width: "100%",
                    padding: "12px 16px",
                    borderRadius: 12,
                    border: "1px solid var(--border)",
                    background: "var(--bg-0)",
                    color: "var(--text)",
                    fontSize: 14,
                    minHeight: 80,
                    resize: "none",
                    outline: "none",
                  }}
                />
                <button
                  type="submit"
                  style={{
                    background: "#25D366",
                    color: "#fff",
                    fontWeight: 700,
                    padding: "12px",
                    borderRadius: 12,
                    border: "none",
                    cursor: "pointer",
                    display: "flex",
                    justifyContent: "center",
                    alignItems: "center",
                    gap: 8,
                    transition: "opacity 0.2s",
                  }}
                  onMouseEnter={(e) => (e.currentTarget.style.opacity = "0.9")}
                  onMouseLeave={(e) => (e.currentTarget.style.opacity = "1")}
                >
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                    <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                  </svg>
                  Send on WhatsApp
                </button>
              </form>
            </div>
          </motion.div>
        )}
      </AnimatePresence>

      {/* Floating Button */}
      <motion.button
        whileHover={{ scale: 1.05 }}
        whileTap={{ scale: 0.95 }}
        onClick={() => setIsOpen(!isOpen)}
        style={{
          width: 60,
          height: 60,
          borderRadius: "50%",
          background: "#25D366",
          color: "#fff",
          display: "flex",
          alignItems: "center",
          justifyContent: "center",
          border: "none",
          cursor: "pointer",
          boxShadow: "0 8px 24px rgba(37, 211, 102, 0.4)",
        }}
      >
        {isOpen ? (
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
            <path d="M18 6L6 18M6 6l12 12"/>
          </svg>
        ) : (
          <svg width="34" height="34" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12.031 0C5.385 0 0 5.385 0 12.032c0 2.128.552 4.133 1.543 5.922L0 24l6.233-1.636A11.97 11.97 0 0 0 12.031 24c6.645 0 12.032-5.385 12.032-12.032C24.063 5.385 18.676 0 12.031 0zm0 20.06a9.96 9.96 0 0 1-5.112-1.406l-.367-.218-3.799.997.997-3.799-.218-.367A9.964 9.964 0 0 1 2.072 12.03c0-5.5 4.48-9.98 9.98-9.98s9.98 4.48 9.98 9.98-4.48 9.98-9.98 9.98zm5.48-7.487c-.301-.15-1.782-.879-2.058-.978-.276-.1-.476-.15-.676.15-.2.3-.775.978-.95 1.178-.175.2-.35.225-.65.075-1.365-.688-2.584-1.54-3.535-2.482-.676-.676-1.157-1.464-1.43-2.13-.125-.276.012-.425.163-.575.137-.137.301-.35.451-.525.15-.175.2-.3.3-.5.1-.2.05-.375-.025-.525-.075-.15-.676-1.626-.926-2.226-.24-.582-.486-.503-.676-.513l-.576-.013c-.2 0-.525.075-.801.375-.276.3-1.05 1.026-1.05 2.502 0 1.476 1.076 2.903 1.226 3.103.15.2 2.115 3.228 5.128 4.529 1.575.681 2.457.776 3.287.644.606-.097 1.782-.726 2.032-1.426.25-.7.25-1.301.175-1.426-.075-.125-.276-.2-.576-.35z"/>
          </svg>
        )}
      </motion.button>
    </div>
  );
}
