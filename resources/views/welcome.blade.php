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
        content="Danova membantu bisnis dan brand tampil kredibel melalui website presisi, berkecepatan tinggi, dan fokus pada konversi nyata." />

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Strict Brand Blues (Non-Pastel)
                        brand: {
                            primary: '#3368A0',
                            dark: '#244D77',
                            secondary: '#619DC6',
                            accent: '#A6C8E2',
                            light: '#EAF2F8',
                            surface: '#F4F8FC',
                            navy: '#172A42',
                            border: '#D1E2F0',
                        },
                        slate: {
                            950: '#0F172A',
                            900: '#1E293B',
                            800: '#334155',
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
                        poppins: ['Poppins', 'sans-serif'],
                        sans: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        'subtle': '0 2px 10px rgba(51, 104, 160, 0.05)',
                        'elevated': '0 12px 30px -4px rgba(51, 104, 160, 0.10)',
                        'card': '0 4px 18px rgba(30, 41, 59, 0.04)',
                    }
                }
            }
        }
    </script>

    <style>
        * {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        .minimal-mesh-bg {
            background-color: #FFFFFF;
            background-image: 
                radial-gradient(at 10% 5%, rgba(166, 200, 226, 0.18) 0px, transparent 40%),
                radial-gradient(at 90% 12%, rgba(97, 157, 198, 0.12) 0px, transparent 45%),
                radial-gradient(at 50% 95%, rgba(51, 104, 160, 0.06) 0px, transparent 50%);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(16px);
            box-shadow: 0 2px 15px rgba(51, 104, 160, 0.06);
            border-bottom-color: #D1E2F0;
        }

        .apple-spring {
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease, background-color 0.2s ease, border-color 0.2s ease;
            will-change: transform;
        }

        .apple-spring:hover {
            transform: translateY(-2.5px) scale(1.018);
        }

        .apple-spring:active {
            transform: translateY(1px) scale(0.98);
        }

        .apple-card-hover {
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease, border-color 0.25s ease;
            will-change: transform;
        }

        .apple-card-hover:hover {
            transform: translateY(-4px);
            border-color: #619DC6;
            box-shadow: 0 14px 34px -4px rgba(51, 104, 160, 0.12);
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

<body class="font-poppins minimal-mesh-bg text-slate-900 antialiased overflow-x-hidden selection:bg-brand-accent/30 selection:text-brand-primary">
    @php
    $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

    $danovaGmail = $setting('contact.email', 'danovaagency@gmail.com');
    $danovaWhatsappNumber = $setting('contact.whatsapp', '6281234567890');
    $danovaWhatsappNumberDigits = preg_replace('/\D+/', '', (string) $danovaWhatsappNumber);
    @endphp

    <!-- HEADER / NAVIGATION (CLEAN MINIMAL BAR) -->
    <header id="header"
        class="fixed top-0 left-0 right-0 z-[1000] bg-white/90 backdrop-blur-md border-b border-slate-200/80 transition-all duration-300 h-20 flex items-center">
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center w-full">
            <a href="/" class="flex items-center gap-3 text-2xl font-bold apple-spring">
                @if ($setting('branding.header_logo'))
                <img src="{{ asset('storage/' . $setting('branding.header_logo')) }}" alt="Danova"
                    class="h-7 lg:h-8" />
                @else
                <!-- Minimalist Brandmark Icon -->
                <div class="w-9 h-9 bg-brand-primary rounded-xl flex items-center justify-center text-white font-bold shadow-sm shadow-brand-primary/25">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M4 4h7a8 8 0 018 8 8 8 0 01-8 8H4V4zm4 4v8h3a4 4 0 004-4 4 4 0 00-4-4H8z" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="tracking-tight text-slate-900 font-bold leading-none text-xl">Danova</span>
                    <span class="text-[10px] text-brand-secondary font-medium tracking-wider uppercase mt-0.5">Digital Studio</span>
                </div>
                @endif
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="#services" class="hover:text-brand-primary transition-colors py-1">Layanan</a>
                <a href="#work" class="hover:text-brand-primary transition-colors py-1">Portofolio</a>
                <a href="#workflow" class="hover:text-brand-primary transition-colors py-1">Proses</a>
                <a href="#pricing" class="hover:text-brand-primary transition-colors py-1">Biaya</a>
                <a href="#testimonials" class="hover:text-brand-primary transition-colors py-1">Testimoni</a>
                <a href="#faq" class="hover:text-brand-primary transition-colors py-1">FAQ</a>
            </nav>

            <div class="hidden lg:flex items-center gap-4">
                <div class="inline-flex items-center gap-2 bg-brand-surface px-3.5 py-1.5 rounded-full text-xs font-semibold text-brand-primary border border-brand-border">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Slot Proyek Aktif</span>
                </div>
                <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                    class="apple-spring bg-brand-primary text-white px-5 py-2.5 rounded-xl font-semibold text-sm flex items-center gap-2 shadow-sm shadow-brand-primary/20 hover:bg-brand-dark">
                    <span>Konsultasi Proyek</span>
                </a>
            </div>

            <button class="mobile-menu-toggle lg:hidden p-2.5 border border-slate-200 rounded-xl text-slate-700 hover:bg-slate-50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </header>

    <main id="content" class="pt-20">

        <!-- HERO SECTION (MINIMALIST & CONTEXTUAL STUDIO ILLUSTRATION) -->
        <section class="relative py-16 lg:py-24 overflow-hidden border-b border-slate-100">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">

                    <!-- Left: Studio Story (Minimal Text, High Impact) -->
                    <div class="lg:col-span-6 text-center lg:text-left hero-text-col">
                        <div class="hero-badge inline-flex items-center gap-2 bg-brand-surface border border-brand-border px-3.5 py-1.5 rounded-full mb-6">
                            <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                            <span class="text-xs font-semibold text-brand-primary tracking-wide">Web Design & Engineering Studio</span>
                        </div>

                        <h1 class="hero-title text-3xl sm:text-4xl lg:text-5xl font-bold leading-[1.2] mb-5 tracking-tight text-slate-900">
                            Website Presisi untuk Bisnis yang Siap Tumbuh
                        </h1>

                        <p class="hero-lead text-slate-600 text-base sm:text-lg mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed font-normal">
                            Kami merancang dan membangun website kustom dengan kode bersih, kecepatan tinggi, dan antarmuka yang meyakinkan calon pelanggan Anda.
                        </p>

                        <!-- Minimal Feature Chips -->
                        <div class="flex flex-wrap justify-center lg:justify-start gap-2 mb-8">
                            <span class="px-3 py-1 rounded-lg bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700">Profil Bisnis</span>
                            <span class="px-3 py-1 rounded-lg bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700">Landing Page Iklan</span>
                            <span class="px-3 py-1 rounded-lg bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700">Katalog Terintegrasi WA</span>
                            <span class="px-3 py-1 rounded-lg bg-brand-surface border border-brand-border text-xs font-medium text-brand-primary">SEO & Performa 99+</span>
                        </div>

                        <div class="hero-cta flex flex-col sm:flex-row gap-3.5 justify-center lg:justify-start mb-10">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20mau%20konsultasi%20website%20bisnis%20saya"
                                class="apple-spring bg-brand-primary text-white px-7 py-3.5 rounded-xl font-semibold text-sm hover:bg-brand-dark shadow-sm shadow-brand-primary/25 flex items-center justify-center gap-2.5">
                                <span>Mulai Konsultasi Gratis</span>
                                <svg class="w-4 h-4 fill-none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <a href="#work"
                                class="apple-spring bg-white text-slate-700 border border-slate-300 px-7 py-3.5 rounded-xl font-semibold text-sm hover:border-brand-primary hover:text-brand-primary text-center">
                                Lihat Portofolio
                            </a>
                        </div>

                        <!-- Minimal Proof -->
                        <div class="flex items-center justify-center lg:justify-start gap-4 pt-4 border-t border-slate-100">
                            <div class="flex text-amber-400 text-sm">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-xs text-slate-600 font-medium">Rating 4.9/5 dari 100+ pelaku usaha di Indonesia</span>
                        </div>
                    </div>

                    <!-- Right: CONTEXTUAL VECTOR STUDIO ILLUSTRATION -->
                    <div class="lg:col-span-6 relative hero-visual-col hero-perspective">
                        <div class="hero-canvas-wrapper relative" id="heroCanvas">

                            <!-- Minimal Desktop Browser Artboard (Visualizing Website Development Context) -->
                            <div class="hero-artboard relative bg-white rounded-2xl shadow-elevated border border-brand-border overflow-hidden">
                                
                                <!-- Browser Header Bar -->
                                <div class="bg-slate-50 px-4 py-3 border-b border-brand-border flex items-center justify-between">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 inline-block"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 inline-block"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 inline-block"></span>
                                    </div>
                                    <div class="bg-white border border-brand-border rounded-lg px-4 py-1 text-xs text-slate-600 font-mono flex items-center gap-2 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                        <span>danova.id/preview-system</span>
                                    </div>
                                    <div class="text-[10px] text-slate-400 font-medium">Live Studio v2.4</div>
                                </div>

                                <!-- Inside Context Illustration: Web Blueprint & Live System -->
                                <div class="p-6 bg-white space-y-4">
                                    
                                    <!-- Context Nav Bar Mockup -->
                                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-lg bg-brand-primary flex items-center justify-center text-white text-[10px] font-bold">D</div>
                                            <div class="h-2.5 w-20 bg-slate-200 rounded-sm"></div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="h-2 w-12 bg-slate-100 rounded-sm"></div>
                                            <div class="h-2 w-12 bg-slate-100 rounded-sm"></div>
                                            <div class="h-5 px-2.5 rounded-md bg-brand-secondary text-white text-[9px] font-medium flex items-center">Kontak</div>
                                        </div>
                                    </div>

                                    <!-- Context Hero Canvas: Wireframe transforming to High-Converting UI -->
                                    <div class="p-4 rounded-xl bg-brand-surface border border-brand-border relative overflow-hidden">
                                        <div class="max-w-[65%] space-y-2">
                                            <div class="inline-block px-2 py-0.5 rounded bg-white text-brand-primary text-[10px] font-semibold border border-brand-border">
                                                Web Bisnis Kustom
                                            </div>
                                            <div class="h-4 w-40 bg-slate-800 rounded"></div>
                                            <div class="h-2.5 w-48 bg-slate-300 rounded"></div>
                                            <div class="h-2.5 w-36 bg-slate-200 rounded"></div>
                                            <div class="pt-2 flex items-center gap-2">
                                                <div class="h-6 px-3 bg-brand-primary rounded text-white text-[10px] font-medium flex items-center">Lihat Produk</div>
                                                <div class="h-6 px-3 bg-white border border-slate-200 rounded text-slate-600 text-[10px] font-medium flex items-center">Detail</div>
                                            </div>
                                        </div>

                                        <!-- Context Vector: Interactive Wireframe Grid -->
                                        <div class="absolute right-3 top-3 w-32 h-28 pointer-events-none opacity-90">
                                            <svg viewBox="0 0 120 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="10" y="10" width="100" height="80" rx="6" fill="#FFFFFF" stroke="#619DC6" stroke-width="1.5" stroke-dasharray="3 3"/>
                                                <rect x="20" y="22" width="40" height="20" rx="3" fill="#A6C8E2" />
                                                <rect x="66" y="22" width="34" height="20" rx="3" fill="#EAF2F8" stroke="#3368A0" stroke-width="1"/>
                                                <line x1="20" y1="52" x2="100" y2="52" stroke="#D1E2F0" stroke-width="1.5"/>
                                                <circle cx="30" cy="68" r="8" fill="#3368A0" />
                                                <circle cx="60" cy="68" r="8" fill="#619DC6" />
                                                <circle cx="90" cy="68" r="8" fill="#A6C8E2" />
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Responsive Micro Cards (Component Hierarchy) -->
                                    <div class="grid grid-cols-3 gap-3">
                                        <div class="p-2.5 rounded-lg border border-brand-border bg-slate-50 flex items-center gap-2">
                                            <div class="w-6 h-6 rounded bg-brand-light text-brand-primary flex items-center justify-center text-xs font-bold">⚡</div>
                                            <div>
                                                <div class="text-[10px] font-bold text-slate-800">0.4 Detik</div>
                                                <div class="text-[8px] text-slate-400">Loading Speed</div>
                                            </div>
                                        </div>
                                        <div class="p-2.5 rounded-lg border border-brand-border bg-slate-50 flex items-center gap-2">
                                            <div class="w-6 h-6 rounded bg-brand-light text-brand-primary flex items-center justify-center text-xs font-bold">📱</div>
                                            <div>
                                                <div class="text-[10px] font-bold text-slate-800">100% Mobile</div>
                                                <div class="text-[8px] text-slate-400">Responsif</div>
                                            </div>
                                        </div>
                                        <div class="p-2.5 rounded-lg border border-brand-border bg-slate-50 flex items-center gap-2">
                                            <div class="w-6 h-6 rounded bg-brand-light text-brand-primary flex items-center justify-center text-xs font-bold">🔒</div>
                                            <div>
                                                <div class="text-[10px] font-bold text-slate-800">SSL Aktif</div>
                                                <div class="text-[8px] text-slate-400">Keamanan</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Context Badge 1: Core Web Vitals Metric (Top Right) -->
                            <div class="floating-layer floating-speed absolute -top-4 -right-4 bg-white p-3 rounded-xl shadow-card border border-brand-border flex items-center gap-3 z-20">
                                <div class="w-9 h-9 rounded-lg bg-brand-light text-brand-primary flex items-center justify-center font-bold text-sm">
                                    99
                                </div>
                                <div>
                                    <div class="text-xs font-bold text-slate-900">Google PageSpeed</div>
                                    <div class="text-[10px] text-emerald-600 font-semibold">● Optimal & Kilat</div>
                                </div>
                            </div>

                            <!-- Context Badge 2: Live Inbound WhatsApp Lead (Bottom Left) -->
                            <div class="floating-layer floating-wa absolute -bottom-5 -left-4 bg-white p-3.5 rounded-xl shadow-card border border-brand-border max-w-[240px] z-20">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    <span class="text-xs font-bold text-slate-900">Notifikasi Calon Pembeli</span>
                                </div>
                                <div class="text-[11px] text-slate-600 bg-slate-50 p-2 rounded border border-slate-100">
                                    "Halo, saya lihat katalog website & mau tanya pemesanan..."
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- STATS BAR (SIMPLE & CLEAN) -->
        <section class="py-10 bg-slate-50 border-b border-slate-200">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div>
                        <div class="text-2xl lg:text-3xl font-bold text-brand-primary">{{ $setting('stats.projects', '100+') }}</div>
                        <p class="text-xs text-slate-500 font-medium mt-1">Website Diluncurkan</p>
                    </div>
                    <div>
                        <div class="text-2xl lg:text-3xl font-bold text-brand-primary">{{ $setting('stats.rating', '4.9') }} / 5.0</div>
                        <p class="text-xs text-slate-500 font-medium mt-1">Kepuasan Klien</p>
                    </div>
                    <div>
                        <div class="text-2xl lg:text-3xl font-bold text-brand-primary">{{ $setting('stats.on_time', '95%') }}</div>
                        <p class="text-xs text-slate-500 font-medium mt-1">Tepat Sesuai Target</p>
                    </div>
                    <div>
                        <div class="text-2xl lg:text-3xl font-bold text-brand-primary">100%</div>
                        <p class="text-xs text-slate-500 font-medium mt-1">Garansi Perbaikan Teknis</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES SECTION (MINIMALIST WITH DIRECT CONTEXTUAL ILLUSTRATIONS) -->
        <section id="services" class="py-16 lg:py-24 bg-white border-b border-slate-100">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-xl mb-12 section-header">
                    <span class="text-xs font-semibold text-brand-primary uppercase tracking-wider block mb-2">Spesialisasi Kami</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">Solusi Digital Sesuai Target Usaha Anda</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">

                    <!-- Service 1: Website Bisnis & UMKM -->
                    <article class="service-card p-6 lg:p-8 rounded-2xl border border-brand-border bg-white shadow-card flex flex-col justify-between apple-card-hover">
                        <div>
                            <!-- Contextual Illustration 1: Responsive Layout Blueprint -->
                            <div class="w-full h-36 bg-brand-surface rounded-xl border border-brand-border flex items-center justify-center p-3 mb-6">
                                <svg class="w-full h-full" viewBox="0 0 240 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="20" y="10" width="130" height="80" rx="5" fill="#FFFFFF" stroke="#3368A0" stroke-width="1.5"/>
                                    <rect x="25" y="16" width="30" height="8" rx="2" fill="#3368A0"/>
                                    <line x1="60" y1="20" x2="140" y2="20" stroke="#D1E2F0" stroke-width="2"/>
                                    <rect x="25" y="30" width="70" height="24" rx="3" fill="#EAF2F8"/>
                                    <rect x="100" y="30" width="45" height="24" rx="3" fill="#A6C8E2"/>
                                    <rect x="25" y="60" width="35" height="22" rx="2" fill="#F4F8FC" stroke="#619DC6" stroke-width="1"/>
                                    <rect x="65" y="60" width="35" height="22" rx="2" fill="#F4F8FC" stroke="#619DC6" stroke-width="1"/>
                                    <rect x="105" y="60" width="40" height="22" rx="2" fill="#F4F8FC" stroke="#619DC6" stroke-width="1"/>
                                    <!-- Mobile Companion -->
                                    <rect x="165" y="20" width="50" height="70" rx="5" fill="#FFFFFF" stroke="#619DC6" stroke-width="1.5"/>
                                    <rect x="175" y="26" width="30" height="6" rx="1.5" fill="#3368A0"/>
                                    <rect x="172" y="36" width="36" height="22" rx="2" fill="#A6C8E2"/>
                                    <rect x="172" y="62" width="36" height="18" rx="2" fill="#EAF2F8"/>
                                </svg>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 mb-2">Website Profil Bisnis</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6">
                                Memperkenalkan profil usaha, katalog produk, dan kredibilitas brand agar calon pembeli mudah menghubungi via WhatsApp.
                            </p>
                        </div>
                        <ul class="text-xs text-slate-600 space-y-2 pt-4 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Mobile responsif & loading kilat</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Domain resmi & SSL terpasang</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Terindeks mesin pencari Google</li>
                        </ul>
                    </article>

                    <!-- Service 2: Landing Page Promosi & Iklan -->
                    <article class="service-card p-6 lg:p-8 rounded-2xl border border-brand-border bg-white shadow-card flex flex-col justify-between apple-card-hover">
                        <div>
                            <!-- Contextual Illustration 2: Conversion Funnel & Analytics Curve -->
                            <div class="w-full h-36 bg-brand-surface rounded-xl border border-brand-border flex items-center justify-center p-3 mb-6">
                                <svg class="w-full h-full" viewBox="0 0 240 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30 75 Q 80 65, 120 40 T 210 20" stroke="#3368A0" stroke-width="2.5" stroke-linecap="round"/>
                                    <path d="M30 75 Q 80 65, 120 40 T 210 20 L 210 85 L 30 85 Z" fill="#619DC6" fill-opacity="0.12"/>
                                    <circle cx="120" cy="40" r="4" fill="#619DC6"/>
                                    <circle cx="210" cy="20" r="5" fill="#3368A0"/>
                                    <!-- Conversion Funnel Beacon -->
                                    <rect x="70" y="16" width="70" height="20" rx="4" fill="#FFFFFF" stroke="#3368A0" stroke-width="1"/>
                                    <text x="77" y="30" font-family="sans-serif" font-size="9" fill="#3368A0" font-weight="bold">+140% Konversi</text>
                                    <line x1="30" y1="85" x2="210" y2="85" stroke="#D1E2F0" stroke-width="1"/>
                                </svg>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 mb-2">Landing Page Promosi</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6">
                                Halaman fokus dengan alur penawaran khusus untuk memaksimalkan hasil iklan Meta Ads, TikTok Ads, dan Google Ads.
                            </p>
                        </div>
                        <ul class="text-xs text-slate-600 space-y-2 pt-4 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Copywriting fokus closing penjualan</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Integrasi Meta Pixel & GA4</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Tombol WhatsApp multi-admin</li>
                        </ul>
                    </article>

                    <!-- Service 3: Sistem UI & Identitas Digital -->
                    <article class="service-card p-6 lg:p-8 rounded-2xl border border-brand-border bg-white shadow-card flex flex-col justify-between apple-card-hover">
                        <div>
                            <!-- Contextual Illustration 3: Design Tokens & Bezier Geometry -->
                            <div class="w-full h-36 bg-brand-surface rounded-xl border border-brand-border flex items-center justify-center p-3 mb-6">
                                <svg class="w-full h-full" viewBox="0 0 240 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Color Swatch Tokens -->
                                    <rect x="30" y="24" width="46" height="52" rx="4" fill="#FFFFFF" stroke="#D1E2F0"/>
                                    <rect x="34" y="28" width="38" height="28" rx="2" fill="#3368A0"/>
                                    <text x="36" y="68" font-family="monospace" font-size="7" fill="#64748B">#3368A0</text>

                                    <rect x="85" y="24" width="46" height="52" rx="4" fill="#FFFFFF" stroke="#D1E2F0"/>
                                    <rect x="89" y="28" width="38" height="28" rx="2" fill="#619DC6"/>
                                    <text x="91" y="68" font-family="monospace" font-size="7" fill="#64748B">#619DC6</text>

                                    <rect x="140" y="24" width="46" height="52" rx="4" fill="#FFFFFF" stroke="#D1E2F0"/>
                                    <rect x="144" y="28" width="38" height="28" rx="2" fill="#A6C8E2"/>
                                    <text x="146" y="68" font-family="monospace" font-size="7" fill="#64748B">#A6C8E2</text>

                                    <!-- Vector Pen tool handle -->
                                    <path d="M195 70L215 30" stroke="#3368A0" stroke-width="1.5"/>
                                    <circle cx="195" cy="70" r="3" fill="#619DC6"/>
                                    <circle cx="215" cy="30" r="3" fill="#3368A0"/>
                                </svg>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 mb-2">Desain & Identitas Brand</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6">
                                Standardisasi visual, palet warna, tipografi, dan aset grafis agar bisnis Anda terlihat profesional dan konsisten.
                            </p>
                        </div>
                        <ul class="text-xs text-slate-600 space-y-2 pt-4 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Desain UI modern tanpa template generik</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Panduan warna & font brand</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold">✓</span> Aset vektor resolusi tinggi</li>
                        </ul>
                    </article>

                </div>
            </div>
        </section>

        <!-- PORTFOLIO SECTION (WITH EMPTY STATE HANDLING & IMAGE FALLBACK) -->
        <section id="work" class="py-16 lg:py-24 bg-slate-50 border-b border-slate-200">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 section-header">
                    <div>
                        <span class="text-xs font-semibold text-brand-primary uppercase tracking-wider block mb-2">Hasil Karya</span>
                        <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">Proyek Website Pilihan</h2>
                    </div>
                    <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20mau%20lihat%20portfolio%20lainnya"
                        class="apple-spring mt-4 md:mt-0 text-xs font-semibold text-brand-primary hover:underline flex items-center gap-1">
                        <span>Lihat Arsip Lengkap</span>
                        <span>→</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                    @forelse ($projects as $project)
                    @php
                    $workImage = $project->hero_image
                        ? asset('storage/' . $project->hero_image)
                        : $project->hero_image_url ?? '';
                    $topResult = is_array($project->results) && count($project->results) > 0 ? $project->results[0] : null;
                    @endphp
                    <a href="{{ route('work.detail', $project->slug) }}"
                        class="work-card apple-card-hover group block bg-white p-4 rounded-2xl border border-brand-border shadow-card hover:border-brand-primary transition-all">
                        
                        <!-- Image Container with Empty State Fallback -->
                        <div class="aspect-video bg-brand-surface rounded-xl mb-4 overflow-hidden relative border border-slate-100 flex items-center justify-center">
                            @if (!empty($workImage))
                            <img src="{{ $workImage }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-102"
                                onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');" />
                            @endif

                            <!-- Contextual Empty State Illustration for missing or broken image -->
                            <div class="{{ !empty($workImage) ? 'hidden' : '' }} w-full h-full flex flex-col items-center justify-center p-6 text-center bg-brand-surface">
                                <svg class="w-16 h-12 mb-2 text-brand-secondary" viewBox="0 0 64 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="4" y="4" width="56" height="40" rx="4" fill="#FFFFFF" stroke="#619DC6" stroke-width="1.5"/>
                                    <circle cx="20" cy="18" r="4" fill="#A6C8E2"/>
                                    <path d="M10 38L24 24L36 34L46 22L54 38H10Z" fill="#3368A0" fill-opacity="0.2" stroke="#3368A0" stroke-width="1.5"/>
                                </svg>
                                <span class="text-xs font-semibold text-brand-primary">Pratinjau Desain</span>
                                <span class="text-[10px] text-slate-400">Danova Digital</span>
                            </div>

                            @if ($topResult)
                            <div class="absolute top-2.5 left-2.5 bg-white/95 px-3 py-1 rounded-md text-[11px] font-semibold text-slate-800 shadow-sm border border-slate-200">
                                {{ $topResult }}
                            </div>
                            @endif
                        </div>

                        <div class="px-1 pb-1">
                            <h3 class="font-bold text-base text-slate-900 group-hover:text-brand-primary transition-colors mb-1">
                                {{ $project->title }}
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-1">
                                {{ $project->subtitle }}
                            </p>
                        </div>
                    </a>
                    @empty
                    <!-- FULL SECTION EMPTY STATE (IF NO PROJECTS EXIST) -->
                    <div class="col-span-3 text-center p-12 lg:p-16 bg-white border border-brand-border rounded-2xl shadow-card">
                        <div class="w-20 h-20 mx-auto mb-4 bg-brand-surface rounded-2xl border border-brand-border flex items-center justify-center text-brand-primary">
                            <!-- Contextual Empty Illustration: Drafting Easel & Canvas -->
                            <svg class="w-10 h-10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="8" y="8" width="32" height="24" rx="3" fill="#FFFFFF" stroke="#3368A0" stroke-width="2"/>
                                <line x1="14" y1="16" x2="34" y2="16" stroke="#A6C8E2" stroke-width="2" stroke-linecap="round"/>
                                <line x1="14" y1="22" x2="26" y2="22" stroke="#619DC6" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 36L6 44M36 36L42 44" stroke="#3368A0" stroke-width="2" stroke-linecap="round"/>
                                <line x1="24" y1="32" x2="24" y2="44" stroke="#619DC6" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">Portofolio Sedang Dikurasi</h3>
                        <p class="text-xs text-slate-500 max-w-md mx-auto mb-6">
                            Koleksi proyek terbaru kami sedang dalam proses pembaruan. Anda dapat meminta katalog studi kasus secara langsung.
                        </p>
                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20mau%20minta%20katalog%20portofolio%20terbaru"
                            class="apple-spring inline-flex items-center gap-2 px-5 py-2.5 bg-brand-primary text-white rounded-xl text-xs font-semibold hover:bg-brand-dark">
                            <span>Minta Katalog Portofolio via WA</span>
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- WORKFLOW SECTION (SIMPLE 3-STEP PROCESS) -->
        <section id="workflow" class="py-16 lg:py-24 bg-white border-b border-slate-100">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-xl mx-auto text-center mb-12 section-header">
                    <span class="text-xs font-semibold text-brand-primary uppercase tracking-wider block mb-2">Alur Kerja</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">Proses Praktis & Terarah</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Step 1 -->
                    <div class="p-6 rounded-2xl bg-slate-50 border border-brand-border flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-xs font-bold text-brand-primary bg-brand-surface px-3 py-1 rounded-md border border-brand-border">01 / Rencana</span>
                                <!-- Vector Context Icon: Scope & Discovery -->
                                <svg class="w-6 h-6 text-brand-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 mb-2">Konsultasi & Kebutuhan</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Diskusi tujuan bisnis, pemilihan halaman kunci, dan penentuan estimasi waktu serta biaya yang jelas.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="p-6 rounded-2xl bg-slate-50 border border-brand-border flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-xs font-bold text-brand-primary bg-brand-surface px-3 py-1 rounded-md border border-brand-border">02 / Bangun</span>
                                <!-- Vector Context Icon: Code & UI Design -->
                                <svg class="w-6 h-6 text-brand-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 mb-2">Desain & Coding</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Tim kami membangun tampilan website secara langsung. Anda mendapatkan link pratinjau live untuk evaluasi.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="p-6 rounded-2xl bg-slate-50 border border-brand-border flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-xs font-bold text-brand-primary bg-brand-surface px-3 py-1 rounded-md border border-brand-border">03 / Luncur</span>
                                <!-- Vector Context Icon: Launch Rocket -->
                                <svg class="w-6 h-6 text-brand-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 mb-2">Peluncuran & Panduan</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Website siap diakses di domain resmi bisnis Anda, terhubung ke Google, lengkap dengan garansi bantuan teknis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PRICING SECTION -->
        <section id="pricing" class="py-16 lg:py-24 bg-slate-50 border-b border-slate-200">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-xl mx-auto text-center mb-12 section-header">
                    <span class="text-xs font-semibold text-brand-primary uppercase tracking-wider block mb-2">Biaya Transparan</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">Paket Investasi Website</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 max-w-6xl mx-auto items-stretch">
                    @forelse ($pricingPlans as $plan)
                    <article
                        class="pricing-card relative flex flex-col justify-between apple-card-hover rounded-2xl p-6 lg:p-8 transition-all 
                        {{ $plan->is_featured
                            ? 'bg-brand-navy text-white shadow-card border-2 border-brand-primary relative z-20'
                            : 'bg-white text-slate-900 border border-brand-border shadow-card' }}">

                        @if ($plan->is_featured)
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-brand-primary text-white text-[11px] font-semibold px-4 py-1 rounded-full uppercase tracking-wider">
                            Paling Populer
                        </div>
                        @endif

                        <div>
                            <div class="mb-5">
                                <h3 class="text-base font-bold mb-1 {{ $plan->is_featured ? 'text-white' : 'text-slate-900' }}">
                                    {{ $plan->name }}
                                </h3>
                                <p class="text-xs {{ $plan->is_featured ? 'text-slate-300' : 'text-slate-500' }}">
                                    {{ $plan->subtitle }}
                                </p>
                            </div>

                            <div class="mb-6 pb-5 border-b {{ $plan->is_featured ? 'border-slate-700' : 'border-slate-100' }}">
                                <span class="text-[10px] uppercase font-semibold tracking-wider block mb-1 {{ $plan->is_featured ? 'text-brand-accent' : 'text-brand-primary' }}">
                                    Mulai Dari
                                </span>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-base font-semibold {{ $plan->is_featured ? 'text-slate-300' : 'text-slate-600' }}">Rp</span>
                                    <span class="text-3xl lg:text-4xl font-bold tracking-tight">
                                        {{ $plan->price }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-3 mb-8">
                                @foreach ($plan->features ?? [] as $feature)
                                <div class="flex items-start gap-2.5 text-xs">
                                    <span class="shrink-0 font-bold {{ $plan->is_featured ? 'text-brand-accent' : 'text-brand-primary' }}">✓</span>
                                    <span class="{{ $plan->is_featured ? 'text-slate-200' : 'text-slate-600' }}">
                                        {{ $feature }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20tertarik%20tanya%20Paket%20{{ urlencode($plan->name) }}"
                            class="apple-spring block w-full py-3 rounded-xl font-semibold text-center text-xs transition-all
                            {{ $plan->is_featured
                                ? 'bg-brand-primary text-white hover:bg-brand-dark'
                                : 'bg-slate-900 text-white hover:bg-brand-primary' }}">
                            {{ $plan->cta_label ?? 'Pilih Paket' }}
                        </a>
                    </article>
                    @empty
                    <!-- PRICING EMPTY STATE -->
                    <div class="col-span-3 text-center p-12 bg-white border border-brand-border rounded-2xl shadow-card">
                        <div class="w-16 h-16 mx-auto mb-3 bg-brand-surface rounded-xl border border-brand-border flex items-center justify-center text-brand-primary">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="5" width="20" height="14" rx="2" />
                                <line x1="2" y1="10" x2="22" y2="10" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 mb-1">Paket Kustom Tersedia</h3>
                        <p class="text-xs text-slate-500 mb-4">Kami menyediakan paket kustom sesuai anggaran dan kebutuhan spesifik Anda.</p>
                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}" class="apple-spring px-5 py-2.5 bg-brand-primary text-white text-xs font-semibold rounded-xl inline-block">
                            Konsultasi Anggaran via WA
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- TESTIMONIALS SECTION (WITH EMPTY STATE & MONOGRAM AVATAR FALLBACK) -->
        <section id="testimonials" class="py-16 lg:py-24 bg-white border-b border-slate-100">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-xl mx-auto text-center mb-12 section-header">
                    <span class="text-xs font-semibold text-brand-primary uppercase tracking-wider block mb-2">Testimoni Klien</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">Kepuasan Klien Kami</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse ($testimonials as $t)
                    <div class="apple-card-hover bg-slate-50 p-6 rounded-2xl border border-brand-border flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-1 text-amber-400 mb-4 text-xs">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-slate-700 text-xs leading-relaxed mb-6 italic">
                                "{{ $t->quote }}"
                            </p>
                        </div>
                        <div class="flex items-center gap-3 pt-3 border-t border-slate-200">
                            @if (!empty($t->avatar_image) || !empty($t->avatar_url))
                            <img src="{{ !empty($t->avatar_image) ? asset('storage/' . $t->avatar_image) : $t->avatar_url }}"
                                alt="{{ $t->name }}" class="w-9 h-9 rounded-full object-cover border border-slate-200"
                                onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');">
                            @endif

                            <!-- Monogram Empty State Avatar Fallback -->
                            <div class="{{ (!empty($t->avatar_image) || !empty($t->avatar_url)) ? 'hidden' : '' }} w-9 h-9 rounded-full bg-brand-surface text-brand-primary border border-brand-border flex items-center justify-center font-bold text-xs">
                                {{ substr($t->name, 0, 1) }}
                            </div>

                            <div>
                                <h4 class="font-bold text-slate-900 text-xs">{{ $t->name }}</h4>
                                <p class="text-[10px] text-slate-500">{{ $t->title }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- TESTIMONIALS EMPTY STATE -->
                    <div class="col-span-3 text-center p-12 bg-slate-50 border border-brand-border rounded-2xl">
                        <div class="w-16 h-16 mx-auto mb-3 bg-white rounded-xl border border-brand-border flex items-center justify-center text-brand-primary">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 mb-1">Ulasan Sedang Dikurasi</h3>
                        <p class="text-xs text-slate-500">Testimoni klien sedang diverifikasi untuk ditampilkan.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- BRIEF BUILDER (INTERACTIVE 2-STEP CONSULTATION) -->
        <section id="brief" class="py-16 lg:py-24 bg-slate-50 border-b border-slate-200">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-xl mx-auto text-center mb-10 section-header">
                    <span class="text-xs font-semibold text-brand-primary uppercase tracking-wider block mb-2">Simulasi Kebutuhan</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">Rencanakan Website Anda</h2>
                </div>

                <div class="max-w-2xl mx-auto bg-white rounded-2xl border border-brand-border shadow-card p-6 lg:p-10"
                    id="briefBuilder" data-whatsapp-url="{{ route('out.whatsapp') }}"
                    data-email-url="{{ route('out.email') }}">

                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span id="briefStepLabel" class="text-xs font-bold text-brand-primary uppercase tracking-wider">Langkah 1 dari 2</span>
                            <span class="text-xs text-slate-400">Estimasi 60 detik</span>
                        </div>

                        <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-brand-primary transition-all duration-300 rounded-full" id="briefProgressFill"
                                style="width: 50%"></div>
                        </div>

                        <div id="briefError" class="hidden mt-3 p-3 bg-red-50 text-red-600 text-xs rounded-lg border border-red-200"></div>
                    </div>

                    <form id="briefForm">
                        <!-- Step 1 -->
                        <div class="brief-step is-active" data-step="1">
                            <h3 class="text-base font-bold mb-4 text-slate-900">Pilih jenis website yang Anda butuhkan:</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach (['Website Profil Bisnis', 'Landing Page Promosi', 'Katalog WhatsApp', 'Kebutuhan Kustom Lainnya'] as $opt)
                                <label class="apple-spring flex items-center gap-3 p-3.5 rounded-xl border border-brand-border cursor-pointer hover:border-brand-primary hover:bg-brand-surface">
                                    <input type="radio" name="need" value="{{ $opt }}" class="peer hidden" required>
                                    <div class="w-4 h-4 rounded-full border border-slate-300 peer-checked:border-brand-primary peer-checked:bg-brand-primary flex items-center justify-center shrink-0">
                                        <div class="w-1.5 h-1.5 bg-white rounded-full scale-0 peer-checked:scale-100 transition-transform"></div>
                                    </div>
                                    <span class="text-xs font-medium text-slate-700 peer-checked:text-brand-primary peer-checked:font-semibold">{{ $opt }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="brief-step" data-step="2">
                            <h3 class="text-base font-bold mb-4 text-slate-900">Kontak & Keterangan Singkat:</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs font-semibold text-slate-700 mb-1 block">Nama Usaha / Anda *</label>
                                    <input type="text" name="brand" placeholder="Contoh: Kedai Kopi / Budi"
                                        class="w-full p-3 bg-slate-50 border border-brand-border rounded-xl text-xs outline-none focus:border-brand-primary focus:bg-white" required>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-slate-700 mb-1 block">Catatan Tambahan</label>
                                    <textarea name="notes" rows="2" placeholder="Jelaskan singkat target atau referensi website..."
                                        class="w-full p-3 bg-slate-50 border border-brand-border rounded-xl text-xs outline-none focus:border-brand-primary focus:bg-white"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="flex justify-between items-center mt-6 pt-4 border-t border-slate-100" id="briefActions">
                        <button type="button" id="briefBack"
                            class="apple-spring text-xs font-semibold text-slate-400 hover:text-slate-800 disabled:opacity-0 transition-opacity">
                            ← Kembali
                        </button>
                        <button type="button" id="briefNext"
                            class="apple-spring px-6 py-2.5 bg-brand-primary text-white rounded-xl font-semibold text-xs hover:bg-brand-dark">
                            Lanjut →
                        </button>
                    </div>

                    <div id="briefResult" class="hidden mt-6 pt-6 border-t border-slate-100">
                        <div class="bg-brand-surface rounded-xl p-5 border border-brand-border">
                            <div class="text-xs font-bold text-slate-900 mb-2">Ringkasan Draf Brief:</div>
                            <pre id="briefSummary" class="text-xs text-slate-700 whitespace-pre-wrap leading-relaxed mb-4 bg-white p-3 rounded-lg border border-brand-border font-sans"></pre>

                            <div class="flex gap-3">
                                <button id="briefEdit" class="apple-spring px-4 py-2 text-xs font-semibold text-slate-600 border border-slate-200 rounded-lg bg-white">
                                    Edit
                                </button>
                                <a id="briefSendWhatsapp" href="#" target="_blank"
                                    class="apple-spring px-5 py-2 bg-whatsapp text-white rounded-lg font-semibold text-xs flex-1 text-center hover:bg-whatsapp-dark">
                                    Kirim ke WhatsApp Danova
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section id="faq" class="py-16 lg:py-24 bg-white border-b border-slate-100">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-xl mx-auto text-center mb-12 section-header">
                    <span class="text-xs font-semibold text-brand-primary uppercase tracking-wider block mb-2">Tanya Jawab</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">Pertanyaan Umum</h2>
                </div>

                <div class="max-w-2xl mx-auto space-y-3">
                    @forelse ($faqs as $faq)
                    <div class="faq-item bg-slate-50 border border-brand-border rounded-xl transition-all overflow-hidden">
                        <button type="button"
                            class="faq-question w-full flex justify-between items-center p-4 text-left font-semibold text-slate-800 text-sm focus:outline-none">
                            <span class="pr-4">{{ $faq->question }}</span>
                            <span class="faq-icon w-6 h-6 rounded-md bg-white border border-slate-200 text-brand-primary flex items-center justify-center shrink-0 text-sm font-bold transition-transform">
                                +
                            </span>
                        </button>
                        <div class="faq-answer-inner px-4 pb-4 text-slate-600 text-xs leading-relaxed border-t border-slate-200/60 pt-3">
                            {{ $faq->answer }}
                        </div>
                    </div>
                    @empty
                    <!-- FAQ EMPTY STATE -->
                    <div class="text-center p-8 bg-slate-50 border border-brand-border rounded-xl">
                        <p class="text-xs text-slate-500">FAQ sedang diperbarui. Hubungi WhatsApp kami jika ada pertanyaan spesifik.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- CALL TO ACTION BANNER (MINIMAL & DEEP NAVY CONTRAST) -->
        <section id="contact" class="py-16 lg:py-20 px-6 bg-white">
            <div class="container mx-auto">
                <div class="cta-banner bg-brand-navy rounded-2xl p-8 lg:p-14 text-center text-white relative overflow-hidden shadow-elevated">
                    <div class="relative z-10 max-w-2xl mx-auto">
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 tracking-tight">
                            Mulai Proyek Website Anda Sekarang
                        </h2>
                        <p class="text-brand-accent text-sm mb-8 max-w-lg mx-auto leading-relaxed">
                            Konsultasikan kebutuhan website bisnis Anda bersama tim Danova. Respon cepat, ramah, dan solutif.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                                class="apple-spring bg-brand-primary text-white px-7 py-3 rounded-xl font-semibold text-sm flex items-center justify-center gap-2 hover:bg-brand-dark shadow-sm">
                                <span>Konsultasi via WhatsApp</span>
                            </a>
                            <a href="mailto:{{ $danovaGmail }}"
                                class="apple-spring border border-slate-600 text-slate-200 px-7 py-3 rounded-xl font-semibold text-sm hover:bg-white/10 flex items-center justify-center gap-2">
                                <span>Kirim Email</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="py-10 border-t border-slate-200 bg-white">
        <div class="container mx-auto px-6 lg:px-12 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2.5">
                <div class="w-7 h-7 bg-brand-primary rounded-lg flex items-center justify-center text-white font-bold text-xs">D</div>
                <span class="text-sm font-bold text-slate-800">Danova Digital Studio</span>
                <span class="text-xs text-slate-400">© {{ date('Y') }}</span>
            </div>
            <div class="flex flex-wrap gap-6 text-xs text-slate-500 font-medium">
                <a href="#services" class="hover:text-brand-primary transition-colors">Layanan</a>
                <a href="#work" class="hover:text-brand-primary transition-colors">Portofolio</a>
                <a href="#workflow" class="hover:text-brand-primary transition-colors">Proses</a>
                <a href="#pricing" class="hover:text-brand-primary transition-colors">Biaya</a>
                <a href="#faq" class="hover:text-brand-primary transition-colors">FAQ</a>
            </div>
        </div>
    </footer>

    <!-- GSAP ANIMATION & INTERACTIVE PARALLAX -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Header scroll effect
            const header = document.getElementById('header');
            window.addEventListener('scroll', () => {
                header.classList.toggle('scrolled', window.scrollY > 30);
            });

            // 2. Apple-Style Hero Entrance
            const heroTL = gsap.timeline({ defaults: { ease: "back.out(1.4)" } });

            heroTL
                .from('.hero-badge', { y: 15, scale: 0.9, opacity: 0, duration: 0.5 })
                .from('.hero-title', { y: 25, opacity: 0, duration: 0.7, ease: "back.out(1.2)" }, "-=0.3")
                .from('.hero-lead', { y: 20, opacity: 0, duration: 0.6, ease: "power2.out" }, "-=0.4")
                .from('.hero-cta a', { scale: 0.92, y: 15, opacity: 0, stagger: 0.1, duration: 0.5, ease: "back.out(1.6)" }, "-=0.3")
                .from('.hero-artboard', { scale: 0.92, y: 30, opacity: 0, duration: 0.8, ease: "back.out(1.3)" }, "-=0.6")
                .from('.floating-layer', { scale: 0.75, y: 20, opacity: 0, stagger: 0.1, duration: 0.6, ease: "back.out(1.8)" }, "-=0.4");

            // 3. Gentle floating physics on badges
            gsap.to('.floating-speed', { y: -6, duration: 2.2, repeat: -1, yoyo: true, ease: "sine.inOut" });
            gsap.to('.floating-wa', { y: -7, duration: 2.5, repeat: -1, yoyo: true, ease: "sine.inOut", delay: 0.3 });

            // 4. Interactive 3D Mouse Parallax
            const heroCanvas = document.getElementById('heroCanvas');
            if (heroCanvas) {
                const artboard = heroCanvas.querySelector('.hero-artboard');
                const speedBadge = heroCanvas.querySelector('.floating-speed');
                const waBadge = heroCanvas.querySelector('.floating-wa');

                window.addEventListener('mousemove', (e) => {
                    const rect = heroCanvas.getBoundingClientRect();
                    const x = e.clientX - (rect.left + rect.width / 2);
                    const y = e.clientY - (rect.top + rect.height / 2);

                    if (Math.abs(x) < 800 && Math.abs(y) < 600) {
                        gsap.to(artboard, { rotateY: x * 0.015, rotateX: -y * 0.015, duration: 0.6, ease: "power2.out" });
                        gsap.to(speedBadge, { x: -x * 0.025, y: -y * 0.025, duration: 0.7, ease: "power2.out" });
                        gsap.to(waBadge, { x: x * 0.03, y: y * 0.03, duration: 0.7, ease: "power2.out" });
                    }
                });
            }

            // 5. ScrollTrigger reveals
            gsap.utils.toArray('.section-header').forEach(header => {
                gsap.from(header, {
                    scrollTrigger: { trigger: header, start: "top 85%", toggleActions: "play none none none" },
                    y: 25, opacity: 0, duration: 0.6, ease: "back.out(1.2)"
                });
            });

            gsap.from('.service-card', {
                scrollTrigger: { trigger: '#services', start: "top 80%", toggleActions: "play none none none" },
                y: 30, opacity: 0, stagger: 0.12, duration: 0.6, ease: "back.out(1.3)"
            });

            gsap.from('.work-card', {
                scrollTrigger: { trigger: '#work', start: "top 80%", toggleActions: "play none none none" },
                y: 30, opacity: 0, stagger: 0.12, duration: 0.6, ease: "back.out(1.3)"
            });

            // 6. Interactive Apple Bouncy Spring on Buttons (.apple-spring)
            document.querySelectorAll('.apple-spring').forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    gsap.to(btn, { scale: 1.03, y: -2, duration: 0.25, ease: "back.out(2)" });
                });
                btn.addEventListener('mouseleave', () => {
                    gsap.to(btn, { scale: 1, y: 0, duration: 0.3, ease: "back.out(1.8)" });
                });
            });

            // 7. FAQ Accordion
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
                            gsap.to(otherIcon, { rotation: 0, duration: 0.3 });
                        }
                    });

                    if (isOpen) {
                        item.classList.remove('is-open');
                        gsap.to(answer, { height: 0, opacity: 0, duration: 0.3, onComplete: () => { answer.style.display = 'none'; } });
                        gsap.to(icon, { rotation: 0, duration: 0.3 });
                    } else {
                        item.classList.add('is-open');
                        answer.style.display = 'block';
                        answer.style.height = 'auto';
                        const fullHeight = answer.offsetHeight;
                        answer.style.height = '0px';

                        gsap.to(answer, { height: fullHeight, opacity: 1, duration: 0.35, ease: "back.out(1.2)" });
                        gsap.to(icon, { rotation: 45, duration: 0.35, ease: "back.out(2)" });
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
                            gsap.fromTo(step, { opacity: 0, y: 10 }, { opacity: 1, y: 0, duration: 0.35 });
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