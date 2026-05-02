import type { Metadata } from "next";
import { DM_Sans } from "next/font/google";
import "./globals.css";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import WhatsAppWidget from "@/components/WhatsAppWidget";

const dmSans = DM_Sans({
  variable: "--font-dm-sans",
  subsets: ["latin"],
  display: "swap",
});

export const metadata: Metadata = {
  title: "BM Global Careers — Overseas Education Consultancy | Manchester, UK",
  description:
    "BM Global Careers is a trusted overseas education consultancy based in Manchester, UK. Free counselling, financial assistance, career guidance. We are not an agency — We are a community.",
  keywords:
    "overseas education, study abroad, UK education consultancy, Manchester, BM Global Careers, free counselling, education loan",
  openGraph: {
    title: "BM Global Careers — We are not an agency, We are a community",
    description:
      "Truthful, Transparent, Trustworthy and Affable — your community for overseas education from Manchester, UK.",
    type: "website",
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html
      lang="en"
      className={`${dmSans.variable} h-full antialiased`}
    >
      <body className="min-h-full flex flex-col bg-[#0a0b0d] text-[#e8e8e8]">
        <Navbar />
        <main className="flex-1" style={{ paddingTop: 0 }}>{children}</main>
        <Footer />
        <WhatsAppWidget />
      </body>
    </html>
  );
}
