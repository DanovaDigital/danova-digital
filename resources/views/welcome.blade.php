<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="/images/DanovaFavicon.png" />
    <link rel="apple-touch-icon" href="/images/DanovaFavicon.png" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />

    <title>Danova — Studio Desain & Pembuatan Website Bisnis</title>
    <meta name="description"
        content="Danova merancang dan membangun website bisnis berkinerja tinggi, berkecepatan kilat, dan fokus konversi nyata dengan visual modern yang memikat." />

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">

    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // High-Energy, Vibrant Studio Palette (Not Pale)
                        brand: {
                            primary: '#1E5BF6',     // Electric Vivid Royal Blue
                            dark: '#1443BD',        // Deep Royal Indigo
                            secondary: '#00A3FF',   // Radiant Cyan Blue
                            accent: '#FF6B35',      // Solar Sunset Tangerine (Warmth & Life)
                            emerald: '#10B981',     // Vibrant Growth Emerald
                            light: '#EFF6FF',       // Luminous Sky Light
                            surface: '#F4F8FF',     // Luminous Ice Surface
                            navy: '#0A1128',        // Deep Obsidian Navy (Strong Anchor)
                            border: '#D3E2F8',      // Crisp Confident Border
                        },
                        slate: {
                            950: '#070C18',
                            900: '#0F172A',
                            800: '#1E293B',
                            700: '#334155',
                            600: '#475569',
                            500: '#64748B',
                            400: '#94A3B8',
                            200: '#E2E8F0',
                            100: '#F1F5F9',
                            50: '#F8FAFC',
                        },
                        whatsapp: '#22C55E',
                        'whatsapp-dark': '#16A34A',
                    },
                    fontFamily: {
                        poppins: ['Poppins', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
                        sans: ['Poppins', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
                    },
                    borderRadius: {
                        'squircle-sm': '1rem',
                        'squircle-md': '1.5rem',
                        'squircle-lg': '2rem',
                        'squircle-xl': '2.5rem',
                    },
                    boxShadow: {
                        'apple-sm': '0 2px 10px rgba(30, 91, 246, 0.06)',
                        'apple-card': '0 6px 24px -2px rgba(30, 91, 246, 0.10)',
                        'apple-float': '0 20px 48px -8px rgba(10, 17, 40, 0.18)',
                        'vibrant-glow': '0 0 35px rgba(30, 91, 246, 0.25)',
                        'accent-glow': '0 8px 24px rgba(255, 107, 53, 0.25)',
                    }
                }
            }
        }
    </script>

    <style>
        * {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4 {
            text-wrap: balance;
        }

        p {
            text-wrap: pretty;
        }

        /* Vibrant Luminous Background with Electric Accents */
        .vibrant-mesh-bg {
            background-color: #FFFFFF;
            background-image: 
                radial-gradient(at 12% 8%, rgba(30, 91, 246, 0.12) 0px, transparent 45%),
                radial-gradient(at 88% 12%, rgba(0, 163, 255, 0.14) 0px, transparent 50%),
                radial-gradient(at 50% 92%, rgba(255, 107, 53, 0.08) 0px, transparent 45%),
                radial-gradient(at 20% 60%, rgba(16, 185, 129, 0.06) 0px, transparent 40%);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 24px -2px rgba(30, 91, 246, 0.09);
            border-bottom-color: #D3E2F8;
        }

        /* Apple Spring Curve Physics */
        .apple-spring {
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease, background-color 0.2s ease, border-color 0.2s ease;
            will-change: transform;
        }

        .apple-spring:hover {
            transform: translateY(-3px) scale(1.02);
        }

        .apple-spring:active {
            transform: translateY(1.5px) scale(0.975);
            transition: transform 0.12s ease;
        }

        .apple-card-hover {
            transition: transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease, border-color 0.3s ease;
            will-change: transform;
        }

        .apple-card-hover:hover {
            transform: translateY(-6px);
            border-color: #1E5BF6;
            box-shadow: 0 22px 48px -6px rgba(30, 91, 246, 0.18);
        }

        .faq-answer-inner {
            overflow: hidden;
            display: none;
        }

        .faq-item.is-open .faq-answer-inner {
            display: block;
        }

        .brief-step {
            display: none;
        }

        .brief-step.is-active {
            display: block;
        }

        .hero-perspective {
            perspective: 1200px;
        }
    </style>
</head>

<body class="font-poppins vibrant-mesh-bg text-slate-900 antialiased overflow-x-hidden selection:bg-brand-primary selection:text-white">
    @php
    $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

    $danovaGmail = $setting('contact.email', 'danovaagency@gmail.com');
    $danovaWhatsappNumber = $setting('contact.whatsapp', '6281234567890');
    $danovaWhatsappNumberDigits = preg_replace('/\D+/', '', (string) $danovaWhatsappNumber);
    @endphp

    <!-- HEADER / NAVIGATION (CLEAN SQUIRCLE WITH VIBRANT ACCENTS) -->
    <header id="header"
        class="fixed top-0 left-0 right-0 z-[1000] bg-white/92 backdrop-blur-md border-b border-slate-200/90 transition-all duration-300 h-20 flex items-center">
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center w-full">
            <a href="/" class="flex items-center gap-3.5 text-2xl font-bold apple-spring">
                @if ($setting('branding.header_logo'))
                <img src="{{ asset('storage/' . $setting('branding.header_logo')) }}" alt="Danova"
                    class="h-7 lg:h-8" />
                @else
                <!-- Vibrant Monogram Brandmark Squircle -->
                <div class="w-11 h-11 bg-gradient-to-br from-brand-primary via-[#2563EB] to-[#1D4ED8] rounded-2xl flex items-center justify-center text-white font-bold shadow-md shadow-brand-primary/30 ring-2 ring-brand-primary/20">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path d="M4 4h7a8 8 0 018 8 8 8 0 01-8 8H4V4zm4 4v8h3a4 4 0 004-4 4 4 0 00-4-4H8z" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="tracking-tight text-slate-900 font-bold leading-none text-2xl">Danova</span>
                    <span class="text-[11px] text-brand-primary font-semibold tracking-wider uppercase mt-1">Digital Studio</span>
                </div>
                @endif
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-sm font-semibold text-slate-700">
                <a href="#services" class="hover:text-brand-primary transition-colors py-1">Layanan</a>
                <a href="#compare" class="hover:text-brand-primary transition-colors py-1">Keunggulan</a>
                <a href="#work" class="hover:text-brand-primary transition-colors py-1">Portofolio</a>
                <a href="#workflow" class="hover:text-brand-primary transition-colors py-1">Proses</a>
                <a href="#pricing" class="hover:text-brand-primary transition-colors py-1">Harga</a>
                <a href="#faq" class="hover:text-brand-primary transition-colors py-1">FAQ</a>
            </nav>

            <div class="hidden lg:flex items-center gap-4">
                <div class="inline-flex items-center gap-2 bg-emerald-50 px-4 py-1.5 rounded-full text-xs font-semibold text-emerald-700 border border-emerald-200">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Slot Proyek Aktif</span>
                </div>
                <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                    class="apple-spring bg-gradient-to-r from-brand-primary to-brand-secondary text-white px-6 py-2.5 rounded-full font-semibold text-sm flex items-center gap-2 shadow-md shadow-brand-primary/25 hover:shadow-lg hover:shadow-brand-primary/40">
                    <span>Konsultasi WA</span>
                </a>
            </div>

            <button class="mobile-menu-toggle lg:hidden p-2.5 border border-slate-200 rounded-2xl text-slate-700 hover:bg-slate-50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </header>

    <main id="content" class="pt-20">

        <!-- HERO SECTION (VIBRANT STUDIO STORY WITH RICH INTERACTIVE ARTBOARD) -->
        <section class="relative py-16 lg:py-24 overflow-hidden border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">

                    <!-- Left: Studio Story & High-Energy Pitch -->
                    <div class="lg:col-span-6 text-center lg:text-left hero-text-col">
                        <div class="hero-badge inline-flex items-center gap-2.5 bg-brand-surface border border-brand-primary/30 px-4 py-1.5 rounded-full mb-6 shadow-sm">
                            <span class="w-2.5 h-2.5 rounded-full bg-brand-primary inline-block"></span>
                            <span class="text-xs font-bold text-brand-primary tracking-wide">Web Design & Growth Studio</span>
                        </div>

                        <h1 class="hero-title text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-[1.18] mb-5 tracking-tight text-slate-900">
                            Website Berkharisma untuk Bisnis yang Ingin Tumbuh Pesat
                        </h1>

                        <p class="hero-lead text-slate-600 text-base sm:text-lg mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed font-normal">
                            Bukan sekadar template mati. Danova merancang website bisnis kustom dengan visual hidup, kode secepat kilat, dan alur penawaran yang terbukti menghasilkan penjualan nyata.
                        </p>

                        <!-- Vibrant Rounded Feature Pills -->
                        <div class="flex flex-wrap justify-center lg:justify-start gap-2.5 mb-8">
                            <span class="px-4 py-1.5 rounded-full bg-white border border-brand-border text-xs font-semibold text-slate-800 shadow-apple-sm flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                <span>Website Profil Bisnis</span>
                            </span>
                            <span class="px-4 py-1.5 rounded-full bg-white border border-brand-border text-xs font-semibold text-slate-800 shadow-apple-sm flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-brand-accent"></span>
                                <span>Landing Page Iklan</span>
                            </span>
                            <span class="px-4 py-1.5 rounded-full bg-white border border-brand-border text-xs font-semibold text-slate-800 shadow-apple-sm flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-brand-emerald"></span>
                                <span>Katalog WhatsApp Instan</span>
                            </span>
                            <span class="px-4 py-1.5 rounded-full bg-brand-primary text-white text-xs font-semibold shadow-sm">
                                ⚡ Skor 99+ PageSpeed
                            </span>
                        </div>

                        <div class="hero-cta flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-10">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20mau%20konsultasi%20website%20bisnis%20saya"
                                class="apple-spring bg-gradient-to-r from-brand-primary via-[#2563EB] to-brand-secondary text-white px-8 py-4 rounded-2xl font-bold text-sm hover:shadow-xl hover:shadow-brand-primary/30 shadow-apple-card flex items-center justify-center gap-2.5">
                                <span>Mulai Konsultasi Gratis</span>
                                <svg class="w-4 h-4 fill-none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <a href="#work"
                                class="apple-spring bg-white text-slate-800 border-2 border-brand-border px-8 py-4 rounded-2xl font-semibold text-sm hover:border-brand-primary hover:text-brand-primary text-center shadow-apple-sm">
                                Lihat Contoh Karya
                            </a>
                        </div>

                        <!-- Real Proof Rating Stack -->
                        <div class="flex items-center justify-center lg:justify-start gap-4 pt-4 border-t border-brand-border/60">
                            <div class="flex text-amber-400 text-sm">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-xs text-slate-700 font-semibold">Rating 4.9/5 dari 100+ pelaku usaha di Indonesia</span>
                        </div>
                    </div>

                    <!-- Right: RICH VIBRANT CONTEXTUAL VECTOR STUDIO ARTBOARD & 3D PARALLAX -->
                    <div class="lg:col-span-6 relative hero-visual-col hero-perspective">
                        <div class="hero-canvas-wrapper relative" id="heroCanvas">

                            <!-- Ambient Vibrant Aura Glows -->
                            <div class="absolute -top-10 -right-10 w-72 h-72 bg-gradient-to-br from-brand-primary/25 via-brand-secondary/20 to-transparent rounded-full blur-3xl -z-10 pointer-events-none"></div>
                            <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-gradient-to-tr from-brand-accent/20 via-brand-emerald/15 to-transparent rounded-full blur-3xl -z-10 pointer-events-none"></div>

                            <!-- Main Squircle Browser Artboard (Vibrant Living Website) -->
                            <div class="hero-artboard relative bg-white rounded-3xl shadow-apple-float border-2 border-brand-border overflow-hidden">
                                
                                <!-- Safari Browser Header Bar -->
                                <div class="bg-gradient-to-r from-[#F0F5FD] to-[#E9F1FC] px-5 py-3.5 border-b border-brand-border flex items-center justify-between">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-3 h-3 rounded-full bg-[#FF5F56] inline-block shadow-2xs"></span>
                                        <span class="w-3 h-3 rounded-full bg-[#FFBD2E] inline-block shadow-2xs"></span>
                                        <span class="w-3 h-3 rounded-full bg-[#27C93F] inline-block shadow-2xs"></span>
                                    </div>
                                    <div class="bg-white border border-brand-border rounded-xl px-4 py-1 text-xs text-slate-700 font-medium flex items-center gap-2 shadow-2xs">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary animate-pulse"></span>
                                        <span class="font-bold text-slate-900">kopikencana.id</span>
                                        <span class="text-brand-primary font-semibold text-[11px]">/katalog</span>
                                    </div>
                                    <div class="text-[10px] text-brand-primary font-bold tracking-wider uppercase bg-white/80 px-2 py-0.5 rounded-md border border-blue-100">
                                        Danova Studio
                                    </div>
                                </div>

                                <!-- Inside Context Illustration: Vibrant Living Storefront -->
                                <div class="p-6 bg-gradient-to-b from-[#FAFCFF] to-white space-y-4">
                                    
                                    <!-- Store Brand Header -->
                                    <div class="flex items-center justify-between pb-3.5 border-b border-slate-100">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-brand-primary to-brand-secondary text-white flex items-center justify-center text-xs font-bold shadow-xs">
                                                K
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-slate-900 leading-tight">Kopi Kencana</div>
                                                <div class="text-[10px] text-brand-emerald font-semibold">● Buka • Siap Kirim Hari Ini</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-3 py-1 rounded-full bg-brand-surface text-brand-primary text-[11px] font-bold border border-brand-border">
                                                Katalog Resmi
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Rich Hero Banner Illustration inside Web Artboard -->
                                    <div class="p-5 rounded-2xl bg-gradient-to-r from-[#EFF6FF] via-[#E0EFFF] to-[#FFF4ED] border border-brand-border relative overflow-hidden">
                                        <div class="max-w-[62%] space-y-2">
                                            <span class="inline-block px-2.5 py-0.5 rounded-full bg-brand-primary text-white text-[10px] font-bold uppercase tracking-wider">
                                                Produk Unggulan
                                            </span>
                                            <h4 class="text-base font-extrabold text-slate-900 leading-snug">
                                                Biji Kopi Asli, Sangrai Tiap Pagi
                                            </h4>
                                            <p class="text-xs text-slate-600">Pesan langsung ke WhatsApp tanpa repot.</p>
                                            <div class="pt-1">
                                                <button class="px-3.5 py-1.5 rounded-xl bg-brand-accent text-white text-xs font-bold shadow-accent-glow flex items-center gap-1.5">
                                                    <span>Order Cepat</span>
                                                    <span>→</span>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Colorful Vector Coffee Cup & Beans Illustration -->
                                        <div class="absolute right-2 bottom-1 w-32 h-32 pointer-events-none">
                                            <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="60" cy="60" r="50" fill="#DBEAFE" />
                                                <!-- Cup Body -->
                                                <rect x="34" y="44" width="50" height="42" rx="10" fill="#1E5BF6" />
                                                <!-- Coffee Inside -->
                                                <rect x="38" y="48" width="42" height="12" rx="5" fill="#FF6B35" />
                                                <!-- Cup Handle -->
                                                <path d="M84 52C92 52 96 56 96 64C96 72 92 76 84 76" stroke="#1E5BF6" stroke-width="6" stroke-linecap="round" />
                                                <!-- Steam -->
                                                <path d="M48 26C48 32 44 36 44 40" stroke="#FF6B35" stroke-width="3" stroke-linecap="round" />
                                                <path d="M60 22C60 29 56 33 56 38" stroke="#10B981" stroke-width="3" stroke-linecap="round" />
                                                <!-- Saucer -->
                                                <ellipse cx="59" cy="90" rx="36" ry="6" fill="#93C5FD" />
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Product Mini Cards with Vibrant Color Badges -->
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="p-3.5 rounded-2xl bg-white border border-brand-border shadow-apple-sm flex items-center justify-between">
                                            <div>
                                                <div class="text-xs font-bold text-slate-900">Cold Brew Latte</div>
                                                <div class="text-xs font-extrabold text-brand-primary">Rp 25.000</div>
                                            </div>
                                            <span class="w-7 h-7 rounded-full bg-brand-surface text-brand-primary border border-brand-border flex items-center justify-center text-xs font-bold">+</span>
                                        </div>
                                        <div class="p-3.5 rounded-2xl bg-white border border-brand-border shadow-apple-sm flex items-center justify-between">
                                            <div>
                                                <div class="text-xs font-bold text-slate-900">Roasted Arabica</div>
                                                <div class="text-xs font-extrabold text-brand-primary">Rp 75.000</div>
                                            </div>
                                            <span class="w-7 h-7 rounded-full bg-brand-surface text-brand-primary border border-brand-border flex items-center justify-center text-xs font-bold">+</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Floating Badge 1: Google SEO Top 1 Sparkline (Vivid Emerald & Blue) -->
                            <div class="floating-layer floating-google absolute -top-5 -right-4 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-apple-float border-2 border-brand-border max-w-[220px] z-20">
                                <div class="flex items-center gap-2.5 mb-2">
                                    <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-brand-primary to-brand-secondary flex items-center justify-center text-white font-bold text-xs shadow-xs">
                                        G
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-slate-900">Peringkat #1 Google</div>
                                        <div class="text-[10px] text-emerald-600 font-extrabold">● Terindeks Otomatis</div>
                                    </div>
                                </div>
                                <svg class="w-full h-9" viewBox="0 0 160 36" fill="none">
                                    <path d="M0 30 Q 35 24, 65 16 T 115 12 T 160 4" stroke="#1E5BF6" stroke-width="3" stroke-linecap="round" />
                                    <path d="M0 30 Q 35 24, 65 16 T 115 12 T 160 4 L 160 36 L 0 36 Z" fill="url(#blueVibrantGradient)" opacity="0.25" />
                                    <defs>
                                        <linearGradient id="blueVibrantGradient" x1="0" y1="0" x2="0" y2="1">
                                            <stop offset="0%" stop-color="#1E5BF6" />
                                            <stop offset="100%" stop-color="#FFFFFF" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="flex justify-between items-center text-[11px] font-bold text-slate-700 mt-1">
                                    <span>Trafik Pengunjung</span>
                                    <span class="text-emerald-600 font-extrabold">+280% Naik</span>
                                </div>
                            </div>

                            <!-- Floating Badge 2: WhatsApp Live Customer Order Bubble (Tangerine & Green) -->
                            <div class="floating-layer floating-wa absolute -bottom-6 -left-4 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-apple-float border-2 border-brand-border max-w-[260px] z-20">
                                <div class="flex items-center gap-2.5 mb-2">
                                    <div class="relative">
                                        <img src="/images/avatar-1.svg" class="w-9 h-9 rounded-full border border-slate-200">
                                        <span class="w-3 h-3 rounded-full bg-emerald-500 border-2 border-white absolute -bottom-0.5 -right-0.5"></span>
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-slate-900 leading-tight">Order Pelanggan Baru</div>
                                        <div class="text-[10px] text-brand-primary font-semibold">Via Tombol WhatsApp Web</div>
                                    </div>
                                </div>
                                <div class="p-2.5 rounded-xl bg-emerald-50 text-slate-800 text-xs leading-snug border border-emerald-200 font-medium">
                                    "Halo Danova, mau pesan paket kopi langsung dari website ya! ☕"
                                </div>
                                <div class="text-right text-[10px] text-emerald-700 font-bold mt-1">09:12 • Masuk Seketika ✓✓</div>
                            </div>

                            <!-- Floating Badge 3: Speed Gauge Sticker (Vivid Emerald) -->
                            <div class="floating-layer floating-speed absolute -top-5 -left-4 bg-white p-3 rounded-2xl shadow-apple-card border-2 border-brand-border flex items-center gap-2.5 z-20">
                                <div class="w-9 h-9 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-extrabold text-sm shadow-sm">
                                    ⚡ 99
                                </div>
                                <div>
                                    <div class="text-xs font-bold text-slate-900">Google PageSpeed</div>
                                    <div class="text-[10px] text-emerald-600 font-bold">Ultra Cepat</div>
                                </div>
                            </div>

                            <!-- Floating Studio Designer Cursor (Vibrant Tangerine) -->
                            <div class="floating-layer floating-cursor absolute top-28 -right-4 z-30 pointer-events-none hidden sm:flex items-center gap-1.5 bg-brand-accent text-white text-xs font-bold px-3.5 py-1.5 rounded-full shadow-accent-glow">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                    <path d="M4 2l16 11.5-7.5 1.5-4 7-2-1 3.5-6.5-6-1.5z" />
                                </svg>
                                <span>Danova Studio</span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- STATS & TRUST RIBBON -->
        <section class="py-12 bg-gradient-to-r from-brand-surface via-white to-brand-surface border-b border-brand-border">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div class="border-r last:border-0 border-slate-200/80 pr-4">
                        <div class="text-3xl lg:text-4xl font-extrabold text-brand-primary mb-1">{{ $setting('stats.projects', '100+') }}</div>
                        <p class="text-xs text-slate-600 font-semibold">Website Sukses Meluncur</p>
                    </div>
                    <div class="border-r last:border-0 border-slate-200/80 pr-4">
                        <div class="text-3xl lg:text-4xl font-extrabold text-brand-accent mb-1">{{ $setting('stats.rating', '4.9') }} / 5.0</div>
                        <p class="text-xs text-slate-600 font-semibold">Rating Kepuasan Klien</p>
                    </div>
                    <div class="border-r last:border-0 border-slate-200/80 pr-4">
                        <div class="text-3xl lg:text-4xl font-extrabold text-brand-primary mb-1">{{ $setting('stats.on_time', '95%') }}</div>
                        <p class="text-xs text-slate-600 font-semibold">Selesai Tepat Deadline</p>
                    </div>
                    <div>
                        <div class="text-3xl lg:text-4xl font-extrabold text-emerald-600 mb-1">100%</div>
                        <p class="text-xs text-slate-600 font-semibold">Garansi Pendampingan Teknis</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES SECTION (WITH RICH CONTEXTUAL VECTOR ILLUSTRATIONS) -->
        <section id="services" class="py-20 lg:py-28 bg-white border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mb-14 section-header">
                    <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Spesialisasi Kami</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Solusi Digital Berdaya Saing Tinggi</h2>
                    <p class="text-slate-600 text-base mt-2">Dirancang khusus untuk memikat calon pembeli dan mempermudah operasional usaha Anda.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <!-- Service 1: Website Profil Bisnis & UMKM -->
                    <article class="service-card p-8 rounded-3xl border-2 border-brand-border bg-white shadow-apple-card flex flex-col justify-between apple-card-hover relative overflow-hidden">
                        <div>
                            <!-- Rich Contextual Illustration 1: Dual Viewport Architecture -->
                            <div class="w-full h-44 bg-gradient-to-br from-[#EFF6FF] to-[#DBEAFE] rounded-2xl border border-brand-border flex items-center justify-center p-4 mb-7 relative overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 240 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Desktop Frame -->
                                    <rect x="15" y="10" width="140" height="95" rx="10" fill="#FFFFFF" stroke="#1E5BF6" stroke-width="2"/>
                                    <rect x="22" y="18" width="35" height="10" rx="3" fill="#1E5BF6"/>
                                    <line x1="65" y1="23" x2="145" y2="23" stroke="#CBD5E1" stroke-width="2.5" stroke-linecap="round"/>
                                    <!-- Hero Banner Area -->
                                    <rect x="22" y="34" width="75" height="32" rx="5" fill="#BFDBFE"/>
                                    <rect x="102" y="34" width="45" height="32" rx="5" fill="#FF6B35"/>
                                    <!-- Product Grid -->
                                    <rect x="22" y="72" width="38" height="24" rx="4" fill="#EFF6FF" stroke="#60A5FA" stroke-width="1.5"/>
                                    <rect x="66" y="72" width="38" height="24" rx="4" fill="#EFF6FF" stroke="#60A5FA" stroke-width="1.5"/>
                                    <rect x="110" y="72" width="38" height="24" rx="4" fill="#EFF6FF" stroke="#60A5FA" stroke-width="1.5"/>

                                    <!-- Mobile Phone Companion (Overlapping) -->
                                    <rect x="165" y="24" width="60" height="85" rx="10" fill="#FFFFFF" stroke="#10B981" stroke-width="2.5"/>
                                    <rect x="175" y="30" width="40" height="8" rx="2" fill="#10B981"/>
                                    <rect x="172" y="44" width="46" height="28" rx="4" fill="#BFDBFE"/>
                                    <rect x="172" y="78" width="46" height="22" rx="4" fill="#FEF3C7" stroke="#F59E0B" stroke-width="1"/>
                                </svg>
                            </div>

                            <span class="inline-block px-3 py-1 rounded-full bg-brand-surface text-brand-primary text-xs font-bold mb-3 border border-brand-border">
                                Paling Diminati UMKM
                            </span>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Website Profil Bisnis</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
                                Representasi resmi brand Anda di internet. Menampilkan profil, katalog produk rapi, serta tombol pesan WhatsApp instan sekali klik.
                            </p>
                        </div>
                        <ul class="text-xs text-slate-700 font-medium space-y-2.5 pt-5 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> 100% Mobile responsif & kilat</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> Domain resmi (.com / .id) + SSL aman</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> Terindeks mesin pencari Google otomatis</li>
                        </ul>
                    </article>

                    <!-- Service 2: Landing Page Promosi & Iklan -->
                    <article class="service-card p-8 rounded-3xl border-2 border-brand-border bg-white shadow-apple-card flex flex-col justify-between apple-card-hover relative overflow-hidden">
                        <div>
                            <!-- Rich Contextual Illustration 2: Conversion Rocket Engine -->
                            <div class="w-full h-44 bg-gradient-to-br from-[#FFF5ED] via-[#FEEAD9] to-[#FFEDD5] rounded-2xl border border-orange-200 flex items-center justify-center p-4 mb-7 relative overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 240 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Conversion Trajectory Line -->
                                    <path d="M25 95 Q 85 85, 125 50 T 215 25" stroke="#FF6B35" stroke-width="3.5" stroke-linecap="round"/>
                                    <path d="M25 95 Q 85 85, 125 50 T 215 25 L 215 105 L 25 105 Z" fill="#FF6B35" fill-opacity="0.15"/>
                                    <circle cx="125" cy="50" r="5" fill="#1E5BF6"/>
                                    <circle cx="215" cy="25" r="7" fill="#FF6B35"/>
                                    
                                    <!-- High Conversion Multiplier Badge -->
                                    <rect x="65" y="18" width="90" height="26" rx="6" fill="#FFFFFF" stroke="#FF6B35" stroke-width="1.5" filter="drop-shadow(0 4px 6px rgba(0,0,0,0.06))"/>
                                    <text x="74" y="35" font-family="sans-serif" font-size="11" fill="#FF6B35" font-weight="bold">🚀 +3.4x Konversi</text>
                                    
                                    <!-- Trigger Pulse Buttons -->
                                    <rect x="35" y="65" width="45" height="18" rx="4" fill="#1E5BF6"/>
                                    <rect x="155" y="65" width="55" height="20" rx="4" fill="#10B981"/>
                                    <line x1="25" y1="105" x2="215" y2="105" stroke="#FED7AA" stroke-width="1.5"/>
                                </svg>
                            </div>

                            <span class="inline-block px-3 py-1 rounded-full bg-orange-50 text-brand-accent text-xs font-bold mb-3 border border-orange-200">
                                Tingkat Konversi Tinggi
                            </span>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Landing Page Iklan</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
                                Dirancang khusus untuk memicu calon pembeli langsung checkout atau chat admin. Sangat cocok untuk iklan Meta Ads, TikTok Ads, dan Google Ads.
                            </p>
                        </div>
                        <ul class="text-xs text-slate-700 font-medium space-y-2.5 pt-5 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-brand-accent font-bold text-sm">✓</span> Copywriting fokus closing penjualan</li>
                            <li class="flex items-center gap-2"><span class="text-brand-accent font-bold text-sm">✓</span> Terpasang Meta Pixel, TikTok & GA4</li>
                            <li class="flex items-center gap-2"><span class="text-brand-accent font-bold text-sm">✓</span> Rotasi chat multi-admin WhatsApp</li>
                        </ul>
                    </article>

                    <!-- Service 3: Desain UI & Identitas Digital -->
                    <article class="service-card p-8 rounded-3xl border-2 border-brand-border bg-white shadow-apple-card flex flex-col justify-between apple-card-hover relative overflow-hidden">
                        <div>
                            <!-- Rich Contextual Illustration 3: Design Workshop & Tokens -->
                            <div class="w-full h-44 bg-gradient-to-br from-[#EFF6FF] via-[#E0E7FF] to-[#EDE9FE] rounded-2xl border border-indigo-200 flex items-center justify-center p-4 mb-7 relative overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 240 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Palette Tokens with Real Vivid Colors -->
                                    <rect x="25" y="28" width="46" height="58" rx="8" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="1.5"/>
                                    <rect x="30" y="33" width="36" height="32" rx="5" fill="#1E5BF6"/>
                                    <text x="32" y="77" font-family="monospace" font-size="8" fill="#1E5BF6" font-weight="bold">#1E5BF6</text>

                                    <rect x="80" y="28" width="46" height="58" rx="8" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="1.5"/>
                                    <rect x="85" y="33" width="36" height="32" rx="5" fill="#FF6B35"/>
                                    <text x="87" y="77" font-family="monospace" font-size="8" fill="#FF6B35" font-weight="bold">#FF6B35</text>

                                    <rect x="135" y="28" width="46" height="58" rx="8" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="1.5"/>
                                    <rect x="140" y="33" width="36" height="32" rx="5" fill="#10B981"/>
                                    <text x="142" y="77" font-family="monospace" font-size="8" fill="#10B981" font-weight="bold">#10B981</text>

                                    <!-- Vector Pen Tool Handle & Bezier Curve -->
                                    <path d="M190 85L215 35" stroke="#1E5BF6" stroke-width="2"/>
                                    <circle cx="190" cy="85" r="4" fill="#00A3FF"/>
                                    <circle cx="215" cy="35" r="4" fill="#1E5BF6"/>
                                </svg>
                            </div>

                            <span class="inline-block px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-bold mb-3 border border-indigo-200">
                                Identitas Visual Berkelas
                            </span>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Identitas Visual & UI</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
                                Standardisasi visual, panduan tipografi, palet warna berkarakter, dan aset grafis agar brand Anda selalu terlihat konsisten dan berwibawa.
                            </p>
                        </div>
                        <ul class="text-xs text-slate-700 font-medium space-y-2.5 pt-5 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-indigo-600 font-bold text-sm">✓</span> Desain UI modern bebas template klise</li>
                            <li class="flex items-center gap-2"><span class="text-indigo-600 font-bold text-sm">✓</span> Panduan warna & font panduan resmi</li>
                            <li class="flex items-center gap-2"><span class="text-indigo-600 font-bold text-sm">✓</span> Format vektor SVG resolusi tajam</li>
                        </ul>
                    </article>

                </div>
            </div>
        </section>

        <!-- DISTINCTIVE COMPARISON SECTION (KENAPA DANOVA BEDA) -->
        <section id="compare" class="py-20 lg:py-28 bg-slate-50 border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center max-w-2xl mx-auto mb-16 section-header">
                    <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Nilai Tambah</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Perbedaan Nyata Danova Studio</h2>
                    <p class="text-slate-600 text-base mt-2">Mengapa pelaku bisnis beralih dari template pasaran ke karya studio Danova.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Website Biasa -->
                    <div class="p-8 lg:p-10 rounded-3xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="text-slate-400 font-bold text-lg mb-6 flex items-center gap-3">
                                <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-sm">✕</span>
                                <span>Website Template Pasaran</span>
                            </div>
                            <ul class="space-y-4 text-sm text-slate-600">
                                <li class="flex items-start gap-3">
                                    <span class="text-rose-500 font-bold">✕</span>
                                    <span>Tampilan mirip dengan puluhan kompetitor, tidak berkarakter.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-rose-500 font-bold">✕</span>
                                    <span>Loading berat karena plugin berlebihan, calon pembeli keburu keluar.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-rose-500 font-bold">✕</span>
                                    <span>Sulit diperbarui mandiri dan biaya tersembunyi tiap kali minta revisi.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-rose-500 font-bold">✕</span>
                                    <span>Selesai dibuat langsung ditinggal tanpa garansi atau pendampingan.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Bersama Danova -->
                    <div class="p-8 lg:p-10 rounded-3xl bg-gradient-to-br from-brand-primary via-[#2563EB] to-[#1D4ED8] text-white shadow-apple-float relative overflow-hidden flex flex-col justify-between">
                        <div class="absolute -top-3 right-6 bg-brand-accent text-white text-[11px] font-bold uppercase tracking-wider px-4 py-1.5 rounded-full shadow-accent-glow">
                            Standar Danova
                        </div>
                        <div>
                            <div class="font-bold text-lg mb-6 flex items-center gap-3">
                                <span class="w-8 h-8 rounded-full bg-white text-brand-primary flex items-center justify-center font-bold text-sm">✓</span>
                                <span>Website Studio Danova</span>
                            </div>
                            <ul class="space-y-4 text-sm text-blue-50 font-medium">
                                <li class="flex items-start gap-3">
                                    <span class="text-emerald-300 font-bold">✓</span>
                                    <span>Desain eksklusif bernuansa modern yang mengangkat derajat brand Anda.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-emerald-300 font-bold">✓</span>
                                    <span>Struktur kode bersih & super ringan, skor Google PageSpeed 95–99+.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-emerald-300 font-bold">✓</span>
                                    <span>Pengelolaan konten mudah secara mandiri tanpa harus paham koding.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-emerald-300 font-bold">✓</span>
                                    <span>Didampingi penuh hingga live, plus garansi bantuan teknis jika ada kendala.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PORTFOLIO SECTION (WITH EMPTY STATE HANDLING & SQUIRCLE IMAGE FRAMES) -->
        <section id="work" class="py-20 lg:py-28 bg-white border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 section-header">
                    <div>
                        <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Hasil Karya</span>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Proyek Website Pilihan</h2>
                    </div>
                    <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20mau%20lihat%20portfolio%20lainnya"
                        class="apple-spring mt-4 md:mt-0 text-sm font-bold text-brand-primary hover:underline flex items-center gap-1.5">
                        <span>Lihat Arsip Lengkap Proyek</span>
                        <span>→</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($projects as $project)
                    @php
                    $workImage = $project->hero_image
                        ? asset('storage/' . $project->hero_image)
                        : $project->hero_image_url ?? '';
                    $topResult = is_array($project->results) && count($project->results) > 0 ? $project->results[0] : null;
                    @endphp
                    <a href="{{ route('work.detail', $project->slug) }}"
                        class="work-card apple-card-hover group block bg-white p-5 rounded-3xl border-2 border-brand-border shadow-apple-card hover:border-brand-primary transition-all">
                        
                        <!-- Squircle Image Container with Empty State Fallback -->
                        <div class="aspect-video bg-brand-surface rounded-2xl mb-5 overflow-hidden relative border border-slate-100 flex items-center justify-center">
                            @if (!empty($workImage))
                            <img src="{{ $workImage }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-103"
                                onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');" />
                            @endif

                            <!-- Contextual Empty State Illustration for missing or broken image -->
                            <div class="{{ !empty($workImage) ? 'hidden' : '' }} w-full h-full flex flex-col items-center justify-center p-6 text-center bg-gradient-to-br from-[#EFF6FF] to-[#DBEAFE]">
                                <svg class="w-16 h-12 mb-2 text-brand-primary" viewBox="0 0 64 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="4" y="4" width="56" height="40" rx="6" fill="#FFFFFF" stroke="#1E5BF6" stroke-width="2"/>
                                    <circle cx="20" cy="18" r="4.5" fill="#FF6B35"/>
                                    <path d="M10 38L24 24L36 34L46 22L54 38H10Z" fill="#1E5BF6" fill-opacity="0.25" stroke="#1E5BF6" stroke-width="2"/>
                                </svg>
                                <span class="text-xs font-bold text-brand-primary">Pratinjau Desain Studio</span>
                                <span class="text-[10px] text-slate-500 font-semibold">Danova Digital</span>
                            </div>

                            @if ($topResult)
                            <div class="absolute top-3 left-3 bg-white/95 px-3.5 py-1.5 rounded-full text-xs font-bold text-slate-800 shadow-sm border border-slate-200">
                                {{ $topResult }}
                            </div>
                            @endif
                        </div>

                        <div class="px-2 pb-2">
                            <h3 class="font-bold text-lg text-slate-900 group-hover:text-brand-primary transition-colors mb-1.5">
                                {{ $project->title }}
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-1 font-medium">
                                {{ $project->subtitle }}
                            </p>
                        </div>
                    </a>
                    @empty
                    <!-- FULL SECTION EMPTY STATE (IF NO PROJECTS EXIST) -->
                    <div class="col-span-3 text-center p-14 lg:p-18 bg-white border-2 border-brand-border rounded-3xl shadow-apple-card">
                        <div class="w-20 h-20 mx-auto mb-4 bg-brand-surface rounded-2xl border border-brand-border flex items-center justify-center text-brand-primary">
                            <!-- Contextual Empty Illustration: Drafting Easel & Canvas -->
                            <svg class="w-10 h-10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="8" y="8" width="32" height="24" rx="4" fill="#FFFFFF" stroke="#1E5BF6" stroke-width="2.5"/>
                                <line x1="14" y1="16" x2="34" y2="16" stroke="#00A3FF" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="14" y1="22" x2="26" y2="22" stroke="#FF6B35" stroke-width="2.5" stroke-linecap="round"/>
                                <path d="M12 36L6 44M36 36L42 44" stroke="#1E5BF6" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="24" y1="32" x2="24" y2="44" stroke="#1E5BF6" stroke-width="2.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Portofolio Sedang Dikurasi</h3>
                        <p class="text-sm text-slate-500 max-w-md mx-auto mb-6">
                            Koleksi proyek terbaru kami sedang dalam proses pembaruan. Anda dapat meminta katalog studi kasus secara langsung.
                        </p>
                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20mau%20minta%20katalog%20portofolio%20terbaru"
                            class="apple-spring inline-flex items-center gap-2 px-7 py-3.5 bg-brand-primary text-white rounded-full text-xs font-bold hover:bg-brand-dark shadow-apple-sm">
                            <span>Minta Katalog Portofolio via WA</span>
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- WORKFLOW SECTION (4-STEP PRODUCTION JOURNEY) -->
        <section id="workflow" class="py-20 lg:py-28 bg-slate-50 border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mx-auto text-center mb-16 section-header">
                    <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Alur Kerja Teratur</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Proses Praktis & Bebas Pusing</h2>
                    <p class="text-slate-600 text-base mt-2">Dari konsultasi konsep hingga website siap diakses pelanggan, semua transparan dan teratur.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div class="p-8 rounded-3xl bg-white border-2 border-brand-border flex flex-col justify-between apple-card-hover shadow-apple-card">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <span class="text-xs font-bold text-brand-primary bg-brand-surface px-4 py-1.5 rounded-full border border-brand-border">
                                    01 / Rencana
                                </span>
                                <svg class="w-7 h-7 text-brand-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2">Konsultasi & Skema Kebutuhan</h3>
                            <p class="text-xs text-slate-600 leading-relaxed font-normal">
                                Kami menganalisis profil bisnis Anda, menentukan halaman kunci, dan menyusun penawaran biaya yang pas dengan target Anda.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="p-8 rounded-3xl bg-white border-2 border-brand-border flex flex-col justify-between apple-card-hover shadow-apple-card">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <span class="text-xs font-bold text-brand-accent bg-orange-50 px-4 py-1.5 rounded-full border border-orange-200">
                                    02 / Bangun
                                </span>
                                <svg class="w-7 h-7 text-brand-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2">Desain & Live Preview</h3>
                            <p class="text-xs text-slate-600 leading-relaxed font-normal">
                                Proses pengerjaan langsung dikerjakan. Anda mendapatkan link live preview untuk mencoba tampilan dan memberikan masukan revisi.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="p-8 rounded-3xl bg-white border-2 border-brand-border flex flex-col justify-between apple-card-hover shadow-apple-card">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-4 py-1.5 rounded-full border border-emerald-200">
                                    03 / Luncur
                                </span>
                                <svg class="w-7 h-7 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2">Peluncuran & Garansi</h3>
                            <p class="text-xs text-slate-600 leading-relaxed font-normal">
                                Website diaktifkan di domain resmi bisnis Anda, terhubung ke Google & WhatsApp, plus garansi pendampingan penuh dari tim teknis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PRICING SECTION -->
        <section id="pricing" class="py-20 lg:py-28 bg-white border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mx-auto text-center mb-16 section-header">
                    <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Investasi Masuk Akal</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Paket Investasi Website Bisnis</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-stretch">
                    @forelse ($pricingPlans as $plan)
                    <article
                        class="pricing-card relative flex flex-col justify-between apple-card-hover rounded-3xl p-8 transition-all 
                        {{ $plan->is_featured
                            ? 'bg-gradient-to-b from-brand-navy via-[#0F1C38] to-[#122347] text-white shadow-apple-float ring-2 ring-brand-primary relative z-20'
                            : 'bg-white text-slate-900 border-2 border-brand-border shadow-apple-card' }}">

                        @if ($plan->is_featured)
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-brand-primary to-brand-accent text-white text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider shadow-md">
                            Rekomendasi Utama
                        </div>
                        @endif

                        <div>
                            <div class="mb-5">
                                <h3 class="text-lg font-bold mb-1 {{ $plan->is_featured ? 'text-white' : 'text-slate-900' }}">
                                    {{ $plan->name }}
                                </h3>
                                <p class="text-xs {{ $plan->is_featured ? 'text-slate-300' : 'text-slate-500' }}">
                                    {{ $plan->subtitle }}
                                </p>
                            </div>

                            <div class="mb-6 pb-5 border-b {{ $plan->is_featured ? 'border-slate-700' : 'border-slate-100' }}">
                                <span class="text-[10px] uppercase font-bold tracking-wider block mb-1 {{ $plan->is_featured ? 'text-brand-accent' : 'text-brand-primary' }}">
                                    Mulai Dari
                                </span>
                                <div class="flex items-baseline gap-1.5">
                                    <span class="text-base font-bold {{ $plan->is_featured ? 'text-slate-300' : 'text-slate-600' }}">Rp</span>
                                    <span class="text-3xl lg:text-4xl font-extrabold tracking-tight">
                                        {{ $plan->price }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-3 mb-8">
                                @foreach ($plan->features ?? [] as $feature)
                                <div class="flex items-start gap-2.5 text-xs">
                                    <span class="shrink-0 font-bold {{ $plan->is_featured ? 'text-brand-accent' : 'text-brand-primary' }}">✓</span>
                                    <span class="{{ $plan->is_featured ? 'text-slate-200' : 'text-slate-700' }}">
                                        {{ $feature }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20tertarik%20tanya%20Paket%20{{ urlencode($plan->name) }}"
                            class="apple-spring block w-full py-4 rounded-2xl font-bold text-center text-xs transition-all
                            {{ $plan->is_featured
                                ? 'bg-gradient-to-r from-brand-primary to-brand-secondary text-white hover:shadow-lg'
                                : 'bg-slate-900 text-white hover:bg-brand-primary' }}">
                            {{ $plan->cta_label ?? 'Pilih Paket' }}
                        </a>
                    </article>
                    @empty
                    <!-- PRICING EMPTY STATE -->
                    <div class="col-span-3 text-center p-14 bg-white border-2 border-brand-border rounded-3xl shadow-apple-card">
                        <div class="w-16 h-16 mx-auto mb-4 bg-brand-surface rounded-2xl border border-brand-border flex items-center justify-center text-brand-primary">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="5" width="20" height="14" rx="3" />
                                <line x1="2" y1="10" x2="22" y2="10" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 mb-1">Paket Kustom Tersedia</h3>
                        <p class="text-xs text-slate-500 mb-4">Kami menyediakan skema biaya yang disesuaikan dengan skala bisnis Anda.</p>
                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}" class="apple-spring px-6 py-3 bg-brand-primary text-white text-xs font-bold rounded-full inline-block">
                            Konsultasi Anggaran via WA
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- TESTIMONIALS SECTION -->
        <section id="testimonials" class="py-20 lg:py-28 bg-slate-50 border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mx-auto text-center mb-16 section-header">
                    <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Cerita Nyata</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Apa Kata Klien Kami</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($testimonials as $t)
                    <div class="apple-card-hover bg-white p-8 rounded-3xl border-2 border-brand-border flex flex-col justify-between shadow-apple-card">
                        <div>
                            <div class="flex items-center gap-1 text-amber-400 mb-5 text-sm">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-slate-700 text-sm leading-relaxed mb-6 italic font-medium">
                                "{{ $t->quote }}"
                            </p>
                        </div>
                        <div class="flex items-center gap-3.5 pt-4 border-t border-slate-100">
                            @if (!empty($t->avatar_image) || !empty($t->avatar_url))
                            <img src="{{ !empty($t->avatar_image) ? asset('storage/' . $t->avatar_image) : $t->avatar_url }}"
                                alt="{{ $t->name }}" class="w-11 h-11 rounded-full object-cover border-2 border-brand-border"
                                onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');">
                            @endif

                            <!-- Monogram Empty State Avatar Fallback -->
                            <div class="{{ (!empty($t->avatar_image) || !empty($t->avatar_url)) ? 'hidden' : '' }} w-11 h-11 rounded-full bg-gradient-to-tr from-brand-primary to-brand-secondary text-white flex items-center justify-center font-bold text-sm shadow-xs">
                                {{ substr($t->name, 0, 1) }}
                            </div>

                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">{{ $t->name }}</h4>
                                <p class="text-xs text-slate-500 font-medium">{{ $t->title }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- TESTIMONIALS EMPTY STATE -->
                    <div class="col-span-3 text-center p-14 bg-white border-2 border-brand-border rounded-3xl">
                        <div class="w-16 h-16 mx-auto mb-4 bg-brand-surface rounded-2xl border border-brand-border flex items-center justify-center text-brand-primary">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">Ulasan Sedang Dikurasi</h3>
                        <p class="text-xs text-slate-500">Testimoni klien sedang diverifikasi untuk ditampilkan.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- BRIEF BUILDER (INTERACTIVE 2-STEP CONSULTATION SQUIRCLE) -->
        <section id="brief" class="py-20 lg:py-28 bg-white border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mx-auto text-center mb-12 section-header">
                    <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Simulasi Cepat</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Rencanakan Kebutuhan Website Anda</h2>
                </div>

                <div class="max-w-3xl mx-auto bg-white rounded-3xl border-2 border-brand-border shadow-apple-card p-8 lg:p-12"
                    id="briefBuilder" data-whatsapp-url="{{ route('out.whatsapp') }}"
                    data-email-url="{{ route('out.email') }}">

                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-3">
                            <span id="briefStepLabel" class="text-xs font-bold text-brand-primary uppercase tracking-wider">Langkah 1 dari 2</span>
                            <span class="text-xs text-slate-400 font-semibold">Estimasi 60 detik</span>
                        </div>

                        <div class="h-2.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-brand-primary to-brand-accent transition-all duration-300 rounded-full" id="briefProgressFill"
                                style="width: 50%"></div>
                        </div>

                        <div id="briefError" class="hidden mt-4 p-3.5 bg-red-50 text-red-600 text-xs font-semibold rounded-xl border border-red-200"></div>
                    </div>

                    <form id="briefForm">
                        <!-- Step 1 -->
                        <div class="brief-step is-active" data-step="1">
                            <h3 class="text-lg font-bold mb-5 text-slate-900">Pilih jenis website yang Anda butuhkan:</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach (['Website Profil Bisnis & UMKM', 'Landing Page Promosi & Iklan', 'Katalog WhatsApp Instan', 'Kebutuhan Kustom Lainnya'] as $opt)
                                <label class="apple-spring flex items-center gap-3.5 p-4 rounded-2xl border-2 border-brand-border cursor-pointer hover:border-brand-primary hover:bg-brand-surface">
                                    <input type="radio" name="need" value="{{ $opt }}" class="peer hidden" required>
                                    <div class="w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-brand-primary peer-checked:bg-brand-primary flex items-center justify-center shrink-0">
                                        <div class="w-2 h-2 bg-white rounded-full scale-0 peer-checked:scale-100 transition-transform"></div>
                                    </div>
                                    <span class="text-sm font-semibold text-slate-700 peer-checked:text-brand-primary">{{ $opt }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="brief-step" data-step="2">
                            <h3 class="text-lg font-bold mb-5 text-slate-900">Kontak & Keterangan Singkat:</h3>
                            <div class="space-y-5">
                                <div>
                                    <label class="text-xs font-bold text-slate-700 mb-1.5 block">Nama Usaha / Nama Anda *</label>
                                    <input type="text" name="brand" placeholder="Contoh: Toko Kopi Sejahtera / Budi"
                                        class="w-full p-4 bg-slate-50 border border-brand-border rounded-xl text-sm outline-none focus:border-brand-primary focus:bg-white transition-colors" required>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-700 mb-1.5 block">Catatan Khusus</label>
                                    <textarea name="notes" rows="3" placeholder="Ceritakan target Anda atau lampirkan website referensi yang Anda sukai..."
                                        class="w-full p-4 bg-slate-50 border border-brand-border rounded-xl text-sm outline-none focus:border-brand-primary focus:bg-white transition-colors"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="flex justify-between items-center mt-8 pt-5 border-t border-slate-100" id="briefActions">
                        <button type="button" id="briefBack"
                            class="apple-spring text-sm font-bold text-slate-400 hover:text-slate-800 disabled:opacity-0 transition-opacity">
                            ← Kembali
                        </button>
                        <button type="button" id="briefNext"
                            class="apple-spring px-8 py-3.5 bg-brand-primary text-white rounded-2xl font-bold text-sm hover:bg-brand-dark shadow-apple-sm">
                            Lanjut →
                        </button>
                    </div>

                    <div id="briefResult" class="hidden mt-8 pt-6 border-t border-slate-100">
                        <div class="bg-brand-surface rounded-2xl p-6 border-2 border-brand-border">
                            <div class="text-sm font-bold text-slate-900 mb-2">Ringkasan Draf Brief:</div>
                            <pre id="briefSummary" class="text-xs text-slate-700 whitespace-pre-wrap leading-relaxed mb-5 bg-white p-4 rounded-xl border border-brand-border font-sans"></pre>

                            <div class="flex flex-col sm:flex-row gap-3.5">
                                <button id="briefEdit" class="apple-spring px-5 py-3 text-xs font-bold text-slate-600 border border-slate-200 rounded-xl bg-white">
                                    Ubah Data
                                </button>
                                <a id="briefSendWhatsapp" href="#" target="_blank"
                                    class="apple-spring px-8 py-3 bg-whatsapp text-white rounded-xl font-bold text-sm flex-1 text-center hover:bg-whatsapp-dark shadow-sm">
                                    Kirim Draf ke WhatsApp Danova
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section id="faq" class="py-20 lg:py-28 bg-slate-50 border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mx-auto text-center mb-16 section-header">
                    <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Tanya Jawab</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Pertanyaan yang Sering Diajukan</h2>
                </div>

                <div class="max-w-3xl mx-auto space-y-3.5">
                    @forelse ($faqs as $faq)
                    <div class="faq-item bg-white border-2 border-brand-border rounded-2xl transition-all overflow-hidden shadow-apple-sm">
                        <button type="button"
                            class="faq-question w-full flex justify-between items-center p-5 text-left font-bold text-slate-800 text-base focus:outline-none">
                            <span class="pr-4">{{ $faq->question }}</span>
                            <span class="faq-icon w-8 h-8 rounded-xl bg-brand-surface border border-brand-border text-brand-primary flex items-center justify-center shrink-0 text-base font-bold transition-transform">
                                +
                            </span>
                        </button>
                        <div class="faq-answer-inner px-5 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-100 pt-4">
                            {{ $faq->answer }}
                        </div>
                    </div>
                    @empty
                    <!-- FAQ EMPTY STATE -->
                    <div class="text-center p-10 bg-white border-2 border-brand-border rounded-2xl">
                        <p class="text-xs text-slate-500">FAQ sedang diperbarui. Hubungi WhatsApp kami jika ada pertanyaan spesifik.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- CALL TO ACTION BANNER (DEEP OBSIDIAN NAVY & SOLAR ACCENTS) -->
        <section id="contact" class="py-20 lg:py-24 px-6 bg-white">
            <div class="container mx-auto">
                <div class="cta-banner bg-brand-navy rounded-[2.5rem] p-10 lg:p-18 text-center text-white relative overflow-hidden shadow-apple-float">
                    <div class="relative z-10 max-w-3xl mx-auto">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold mb-5 tracking-tight leading-tight">
                            Siap Membawa Bisnis Anda ke Tingkat yang Jauh Lebih Meyakinkan?
                        </h2>
                        <p class="text-blue-100 text-base lg:text-lg mb-10 max-w-xl mx-auto leading-relaxed font-normal">
                            Konsultasikan rencana website Anda bersama tim Danova sekarang. Respon cepat, ramah, dan solutif.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                                class="apple-spring bg-gradient-to-r from-brand-primary via-[#2563EB] to-brand-accent text-white px-9 py-4 rounded-full font-bold text-base flex items-center justify-center gap-3 shadow-lg shadow-brand-primary/30">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                <span>Konsultasi via WhatsApp</span>
                            </a>
                            <a href="mailto:{{ $danovaGmail }}"
                                class="apple-spring border-2 border-slate-700 text-white px-9 py-4 rounded-full font-bold text-base hover:bg-white/10 flex items-center justify-center gap-2">
                                <span>Kirim Email</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="py-12 border-t border-brand-border bg-white">
        <div class="container mx-auto px-6 lg:px-12 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-brand-primary rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-xs">D</div>
                <span class="text-base font-bold text-slate-900">Danova Digital Studio</span>
                <span class="text-xs text-slate-400 font-semibold">© {{ date('Y') }}</span>
            </div>
            <div class="flex flex-wrap gap-7 text-xs text-slate-600 font-semibold">
                <a href="#services" class="hover:text-brand-primary transition-colors">Layanan</a>
                <a href="#compare" class="hover:text-brand-primary transition-colors">Keunggulan</a>
                <a href="#work" class="hover:text-brand-primary transition-colors">Portofolio</a>
                <a href="#workflow" class="hover:text-brand-primary transition-colors">Proses</a>
                <a href="#pricing" class="hover:text-brand-primary transition-colors">Harga</a>
                <a href="#faq" class="hover:text-brand-primary transition-colors">FAQ</a>
            </div>
        </div>
    </footer>

    <!-- GSAP ANIMATION & INTERACTIVE BOUNCING APPLE PARALLAX -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Header scroll effect
            const header = document.getElementById('header');
            window.addEventListener('scroll', () => {
                header.classList.toggle('scrolled', window.scrollY > 30);
            });

            // 2. Apple-Style Bouncing Spring Timeline
            const heroTL = gsap.timeline({ defaults: { ease: "back.out(1.6)" } });

            heroTL
                .from('.hero-badge', { y: 20, scale: 0.88, opacity: 0, duration: 0.6 })
                .from('.hero-title', { y: 30, opacity: 0, duration: 0.8, ease: "back.out(1.3)" }, "-=0.35")
                .from('.hero-lead', { y: 20, opacity: 0, duration: 0.65, ease: "power2.out" }, "-=0.45")
                .from('.hero-cta a', { scale: 0.9, y: 15, opacity: 0, stagger: 0.12, duration: 0.55, ease: "back.out(1.8)" }, "-=0.3")
                .from('.hero-artboard', { scale: 0.92, y: 35, opacity: 0, duration: 0.85, ease: "back.out(1.4)" }, "-=0.6")
                .from('.floating-layer', { scale: 0.7, y: 25, opacity: 0, stagger: 0.12, duration: 0.7, ease: "back.out(2)" }, "-=0.4");

            // 3. Gentle floating physics on badges
            gsap.to('.floating-google', { y: -8, duration: 2.6, repeat: -1, yoyo: true, ease: "sine.inOut" });
            gsap.to('.floating-wa', { y: -8, duration: 2.3, repeat: -1, yoyo: true, ease: "sine.inOut", delay: 0.35 });
            gsap.to('.floating-speed', { y: -6, duration: 2.0, repeat: -1, yoyo: true, ease: "sine.inOut", delay: 0.7 });
            gsap.to('.floating-cursor', { y: -10, x: 4, duration: 2.8, repeat: -1, yoyo: true, ease: "sine.inOut", delay: 0.2 });

            // 4. Interactive 3D Mouse Parallax with Spring Inertia
            const heroCanvas = document.getElementById('heroCanvas');
            if (heroCanvas) {
                const artboard = heroCanvas.querySelector('.hero-artboard');
                const googleBadge = heroCanvas.querySelector('.floating-google');
                const waBadge = heroCanvas.querySelector('.floating-wa');
                const speedBadge = heroCanvas.querySelector('.floating-speed');

                window.addEventListener('mousemove', (e) => {
                    const rect = heroCanvas.getBoundingClientRect();
                    const x = e.clientX - (rect.left + rect.width / 2);
                    const y = e.clientY - (rect.top + rect.height / 2);

                    if (Math.abs(x) < 800 && Math.abs(y) < 600) {
                        gsap.to(artboard, { rotateY: x * 0.018, rotateX: -y * 0.018, duration: 0.6, ease: "power2.out" });
                        gsap.to(googleBadge, { x: -x * 0.03, y: -y * 0.03, duration: 0.7, ease: "power2.out" });
                        gsap.to(waBadge, { x: x * 0.035, y: y * 0.035, duration: 0.7, ease: "power2.out" });
                        gsap.to(speedBadge, { x: -x * 0.02, y: y * 0.02, duration: 0.7, ease: "power2.out" });
                    }
                });
            }

            // 5. ScrollTrigger reveals with Bouncing Spring
            gsap.utils.toArray('.section-header').forEach(header => {
                gsap.from(header, {
                    scrollTrigger: { trigger: header, start: "top 85%", toggleActions: "play none none none" },
                    y: 30, opacity: 0, duration: 0.7, ease: "back.out(1.4)"
                });
            });

            gsap.from('.service-card', {
                scrollTrigger: { trigger: '#services', start: "top 80%", toggleActions: "play none none none" },
                y: 35, scale: 0.95, opacity: 0, stagger: 0.14, duration: 0.7, ease: "back.out(1.5)"
            });

            gsap.from('.work-card', {
                scrollTrigger: { trigger: '#work', start: "top 80%", toggleActions: "play none none none" },
                y: 35, scale: 0.95, opacity: 0, stagger: 0.14, duration: 0.7, ease: "back.out(1.5)"
            });

            gsap.from('.pricing-card', {
                scrollTrigger: { trigger: '#pricing', start: "top 80%", toggleActions: "play none none none" },
                y: 40, scale: 0.93, opacity: 0, stagger: 0.15, duration: 0.75, ease: "back.out(1.5)"
            });

            // 6. Interactive Apple Bouncy Spring on Buttons (.apple-spring)
            document.querySelectorAll('.apple-spring').forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    gsap.to(btn, { scale: 1.04, y: -2, duration: 0.25, ease: "back.out(2.2)" });
                });
                btn.addEventListener('mouseleave', () => {
                    gsap.to(btn, { scale: 1, y: 0, duration: 0.3, ease: "back.out(1.8)" });
                });
                btn.addEventListener('mousedown', () => {
                    gsap.to(btn, { scale: 0.96, duration: 0.1, ease: "power2.out" });
                });
                btn.addEventListener('mouseup', () => {
                    gsap.to(btn, { scale: 1.04, duration: 0.2, ease: "back.out(2)" });
                });
            });

            // 7. FAQ Accordion with Spring Rotation
            document.querySelectorAll('.faq-item').forEach(item => {
                const questionBtn = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer-inner');
                const icon = item.querySelector('.faq-icon');

                questionBtn.addEventListener('click', () => {
                    const isOpen = item.classList.contains('is-open');

                    document.querySelectorAll('.faq-item.is-open').forEach(other => {
                        if (other !== item) {
                            other.classList.remove('is-open');
                            const otherAns = other.querySelector('.faq-answer-inner');
                            const otherIcon = other.querySelector('.faq-icon');
                            gsap.to(otherAns, { height: 0, opacity: 0, duration: 0.3, onComplete: () => { otherAns.style.display = 'none'; } });
                            gsap.to(otherIcon, { rotation: 0, duration: 0.3, ease: "back.out(1.5)" });
                        }
                    });

                    if (isOpen) {
                        item.classList.remove('is-open');
                        gsap.to(answer, { height: 0, opacity: 0, duration: 0.3, onComplete: () => { answer.style.display = 'none'; } });
                        gsap.to(icon, { rotation: 0, duration: 0.3, ease: "back.out(1.5)" });
                    } else {
                        item.classList.add('is-open');
                        answer.style.display = 'block';
                        answer.style.height = 'auto';
                        const fullHeight = answer.offsetHeight;
                        answer.style.height = '0px';

                        gsap.to(answer, { height: fullHeight, opacity: 1, duration: 0.4, ease: "back.out(1.3)" });
                        gsap.to(icon, { rotation: 45, duration: 0.35, ease: "back.out(2.2)" });
                    }
                });
            });

            // 8. Brief Builder Wizard Logic
            (function() {
                const root = document.getElementById('briefBuilder');
                if (!root) return;

                let currentStep = 1;
                const totalSteps = 2;
                const form = document.getElementById('briefForm');
                const progressFill = document.getElementById('briefProgressFill');
                const stepLabel = document.getElementById('briefStepLabel');
                const nextBtn = document.getElementById('briefNext');
                const backBtn = document.getElementById('briefBack');
                const resultSection = document.getElementById('briefResult');
                const summaryBox = document.getElementById('briefSummary');

                function updateUI() {
                    document.querySelectorAll('.brief-step').forEach(step => {
                        const isCurrent = parseInt(step.dataset.step) === currentStep;
                        step.classList.toggle('is-active', isCurrent);
                        if (isCurrent) {
                            gsap.fromTo(step, { opacity: 0, y: 12, scale: 0.98 }, { opacity: 1, y: 0, scale: 1, duration: 0.4, ease: "back.out(1.5)" });
                        }
                    });

                    const percentage = (currentStep / totalSteps) * 100;
                    progressFill.style.width = `${percentage}%`;
                    stepLabel.textContent = `Langkah ${currentStep} dari ${totalSteps}`;
                    backBtn.disabled = currentStep === 1;
                    nextBtn.textContent = currentStep === totalSteps ? 'Selesai & Kirim' : 'Lanjut →';
                }

                nextBtn.addEventListener('click', () => {
                    const currentStepEl = form.querySelector(`.brief-step[data-step="${currentStep}"]`);
                    const inputs = currentStepEl.querySelectorAll('[required]');
                    let valid = true;

                    inputs.forEach(input => {
                        if (input.type === 'radio') {
                            const name = input.name;
                            if (!form.querySelector(`input[name="${name}"]:checked`)) valid = false;
                        } else if (!input.value.trim()) {
                            valid = false;
                        }
                    });

                    if (!valid) {
                        const error = document.getElementById('briefError');
                        error.textContent = 'Mohon lengkapi pilihan terlebih dahulu.';
                        error.classList.remove('hidden');
                        gsap.fromTo(error, { x: -6 }, { x: 6, duration: 0.08, repeat: 3, yoyo: true, ease: "power1.inOut" });
                        return;
                    }

                    document.getElementById('briefError').classList.add('hidden');

                    if (currentStep < totalSteps) {
                        currentStep++;
                        updateUI();
                    } else {
                        generateSummary();
                    }
                });

                backBtn.addEventListener('click', () => {
                    if (currentStep > 1) {
                        currentStep--;
                        updateUI();
                    }
                });

                function generateSummary() {
                    const formData = new FormData(form);
                    let summary = "*Brief Website — Danova Digital*\n\n";
                    summary += `*Nama Usaha/Klien:* ${formData.get('brand')}\n`;
                    summary += `*Kebutuhan:* ${formData.get('need') || '-'}\n`;
                    summary += `*Catatan:* ${formData.get('notes') || '-'}`;

                    summaryBox.textContent = summary;
                    form.classList.add('hidden');
                    document.getElementById('briefActions').classList.add('hidden');
                    resultSection.classList.remove('hidden');

                    gsap.fromTo(resultSection, { opacity: 0, scale: 0.95, y: 15 }, { opacity: 1, scale: 1, y: 0, duration: 0.45, ease: "back.out(1.5)" });

                    const waUrl = root.dataset.whatsappUrl + "?context=brief_builder&message=" + encodeURIComponent(summary);
                    document.getElementById('briefSendWhatsapp').href = waUrl;
                }

                document.getElementById('briefEdit').addEventListener('click', () => {
                    resultSection.classList.add('hidden');
                    form.classList.remove('hidden');
                    document.getElementById('briefActions').classList.remove('hidden');
                });
            })();

            // 9. Mobile Menu Toggle
            const mobileBtn = document.querySelector('.mobile-menu-toggle');
            if (mobileBtn) {
                mobileBtn.addEventListener('click', () => {
                    const nav = document.querySelector('nav');
                    nav.classList.toggle('hidden');
                    nav.classList.toggle('flex');
                    nav.classList.toggle('flex-col');
                    nav.classList.toggle('absolute');
                    nav.classList.toggle('top-20');
                    nav.classList.toggle('left-0');
                    nav.classList.toggle('w-full');
                    nav.classList.toggle('bg-white');
                    nav.classList.toggle('p-6');
                    nav.classList.toggle('border-b');
                    nav.classList.toggle('border-slate-200');
                    nav.classList.toggle('z-[1000]');
                });
            }
        });
    </script>
</body>

</html>