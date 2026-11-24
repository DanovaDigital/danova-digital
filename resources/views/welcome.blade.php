<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="/images/DanovaFavicon.png" />
    <link rel="apple-touch-icon" href="/images/DanovaFavicon.png" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />

    @php
        $pageTitle = 'Danova — Studio Desain & Pembuatan Website Bisnis';
        $pageDescription = 'Danova merancang dan membangun website bisnis berkinerja tinggi, berkecepatan kilat, dan fokus konversi nyata dengan visual modern yang memikat.';
    @endphp
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}" />
    @include('partials.social-meta', ['socialTitle' => $pageTitle, 'socialDescription' => $pageDescription, 'socialImage' => null])
    @include('partials.organization-schema', ['organizationEmail' => $settings->get('contact.email')?->value])

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <script>
        if (window.tailwind) window.tailwind.config = {
            theme: {
                extend: {
                    colors: {
                                                brand: {
                            primary: '#2454A5',
                            dark: '#193D7F',
                            secondary: '#2E64BC',
                            accent: '#225A85',
                            emerald: '#21658F',
                            light: '#EAF3FF',
                            surface: '#F4F8FE',
                            navy: '#152A4D',
                            border: '#DBE8F8',
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
                        sans: ['Instrument Sans', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
                    },
                    borderRadius: {
                        'squircle-sm': '1rem',
                        'squircle-md': '1.5rem',
                        'squircle-lg': '2rem',
                        'squircle-xl': '2.5rem',
                    },
                    boxShadow: {
                        'apple-sm': '0 2px 10px rgba(36, 84, 165, 0.06)',
                        'apple-card': '0 6px 24px -2px rgba(36, 84, 165, 0.10)',
                        'apple-float': '0 20px 48px -8px rgba(10, 17, 40, 0.18)',
                        'vibrant-glow': '0 0 35px rgba(36, 84, 165, 0.25)',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            text-wrap: balance;
        }

        p {
            text-wrap: pretty;
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 24px -2px rgba(36, 84, 165, 0.09);
            border-bottom-color: #DBE8F8;
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
            border-color: #2454A5;
            box-shadow: 0 22px 48px -6px rgba(36, 84, 165, 0.18);
        }

        /* Pastel studio palette. Display type 39?76px, section titles 30?54px, body 16?18px. */
        :root {
            --danova-ink: #142746;
            --danova-blue: #2454A5;
            --danova-paper: #F7FAFF;
            --danova-line: #DBE8F8;
        }

        body { background-color: var(--danova-paper); }
        #header { height: 76px; }
        #header .container { max-width: 1320px; }
        #header nav { gap: 1.65rem; }
        #header nav a { color: #46536a; font-size: .82rem; }
        #header nav a:hover { color: var(--danova-blue); }
        #content > section { scroll-margin-top: 76px; }
        #content > section:not(:first-child) { padding-top: clamp(4rem, 8vw, 7rem); padding-bottom: clamp(4rem, 8vw, 7rem); }
        .hero-title { max-width: 12ch; font-size: clamp(2.65rem, 5vw, 4.7rem); line-height: 1.04; letter-spacing: -.055em; color: var(--danova-ink); }
        .hero-lead { max-width: 34rem; font-size: clamp(1rem, 1.25vw, 1.15rem); line-height: 1.75; }
        .hero-badge { border-color: #DBE8F8; background: #EAF3FF; box-shadow: none; }
        .hero-cta a { min-height: 52px; border-radius: 14px; }
        .section-header { max-width: 44rem; }
        .section-header h2 { letter-spacing: -.04em; line-height: 1.12; }
        .service-card, .pricing-card { border-color: var(--danova-line); }
        .apple-card-hover { transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease; }
        .apple-card-hover:hover { transform: translateY(-3px); box-shadow: 0 14px 34px rgba(16, 28, 52, .10); }
        .apple-spring { transition: transform .2s ease, box-shadow .2s ease, background-color .2s ease; }
        :focus-visible { outline: 3px solid #2454A5; outline-offset: 3px; }
        .mobile-nav { display: none; }
        .mobile-nav.is-open { display: grid; }
        .mobile-nav a { min-height: 48px; display: flex; align-items: center; padding: .7rem 1rem; border-radius: 10px; color: #25334c; font-size: .95rem; font-weight: 600; }
        .mobile-nav a:hover, .mobile-nav a:focus-visible { background: #f1f5fc; color: var(--danova-blue); }

        @media (max-width: 1023px) {
            #header { height: 68px; }
            #header .container { padding-left: 1.25rem; padding-right: 1.25rem; }
            .mobile-nav { position: absolute; top: calc(100% + 1px); left: 0; right: 0; padding: .75rem 1.25rem 1rem; background: rgba(255,255,255,.98); border-bottom: 1px solid var(--danova-line); box-shadow: 0 14px 28px rgba(16,28,52,.10); }
            #content > section:first-child { padding-top: 3.5rem; }
            .hero-title { max-width: 14ch; }
            .hero-visual-col { width: 100%; max-width: 680px; margin-inline: auto; }
        }
        @media (max-width: 639px) {
            #content > section:first-child { padding-top: 2.5rem; padding-bottom: 3.25rem; }
            #content > section:not(:first-child) { padding-top: 3.75rem; padding-bottom: 3.75rem; }
            .hero-text-col { text-align: left; }
            .hero-badge { margin-bottom: 1.25rem; }
            .hero-title { max-width: 12ch; font-size: clamp(2.45rem, 12vw, 3.5rem); }
            .hero-lead { margin-left: 0; margin-right: 0; }
            .hero-text-col > .flex.flex-wrap { justify-content: flex-start; gap: .5rem; }
            .hero-cta { align-items: stretch; margin-bottom: 1.5rem; }
            .hero-cta a { width: 100%; }
            .hero-text-col > .flex.items-center { justify-content: flex-start; gap: .65rem; }
            .hero-text-col > .flex.items-center > span { font-size: .9rem; line-height: 1.5; }
            .section-header { margin-bottom: 2rem; }
            .section-header h2 { font-size: 1.85rem; }
            #contact { padding-left: 1rem; padding-right: 1rem; }
            .cta-banner { border-radius: 1.5rem; padding: 2.25rem 1.25rem; }
            footer .container { align-items: flex-start; }
            footer .container > div:last-child { justify-content: flex-start; gap: 1rem; }
        }

        @include('partials.welcome-pastel-styles')
        @include('partials.portfolio-styles')
        @include('partials.faq-styles')
        @include('partials.logo-styles')
        @include('partials.floating-whatsapp-styles')
        @include('partials.project-section-styles')

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; }
        }
    </style>
</head>

<body class="font-sans text-slate-900 antialiased overflow-x-hidden selection:bg-brand-primary selection:text-white">
    @php
    $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

    $danovaGmail = $setting('contact.email', 'danovaagency@gmail.com');
    $danovaWhatsappNumber = $setting('contact.whatsapp', '6281234567890');
    $danovaWhatsappNumberDigits = \App\Models\SiteSetting::normalizeWhatsappNumber($danovaWhatsappNumber);
    $serviceOptions = config('brief.services');
    @endphp

    <!-- HEADER / NAVIGATION (CLEAN SQUIRCLE WITH VIBRANT ACCENTS) -->
    <header id="header"
        class="fixed top-0 left-0 right-0 z-[1000] bg-white/92 backdrop-blur-md border-b border-slate-200/90 transition-all duration-300 h-20 flex items-center">
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center w-full">
            <a href="/" class="flex items-center gap-3.5 text-2xl font-bold apple-spring">
                @include('partials.danova-logo', ['customLogo' => $setting('branding.header_logo')])
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
                <div class="project-status inline-flex items-center gap-2 bg-emerald-50 px-4 py-1.5 rounded-full text-sm font-semibold text-emerald-700 border border-emerald-200">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <span>Slot Proyek Aktif</span>
                </div>
                <a href="#brief" data-brief-start
                    class="apple-spring bg-gradient-to-r from-brand-primary to-brand-secondary text-white px-6 py-2.5 rounded-full font-semibold text-sm flex items-center gap-2 shadow-md shadow-brand-primary/25 hover:shadow-lg hover:shadow-brand-primary/40">
                    <span>Mulai Brief</span>
                </a>
            </div>

            <button class="mobile-menu-toggle lg:hidden p-2.5 border border-slate-200 rounded-xl text-slate-700 hover:bg-slate-50 transition-colors" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-navigation">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <nav id="mobile-navigation" class="mobile-nav lg:hidden" aria-label="Navigasi utama" aria-hidden="true" inert>
                <a href="#services">Layanan</a>
                <a href="#deliverables">Inklusi Standar</a>
                <a href="#compare">Keunggulan</a>
                <a href="#transformation">Sebelum vs Sesudah</a>
                <a href="#work">Portofolio</a>
                <a href="#workflow">Proses</a>
                <a href="#pricing">Harga</a>
                <a href="#faq">FAQ</a>
                <a href="#brief" data-brief-start class="mt-2 justify-center bg-brand-primary text-white">Mulai Brief Proyek</a>
            </nav>
        </div>
    </header>

    <main id="content">

        <!-- HERO SECTION (VIBRANT STUDIO STORY WITH RICH INTERACTIVE ARTBOARD) -->
        <section class="studio-hero relative py-16 lg:py-24 border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-9 lg:gap-14 items-center">

                    <!-- Left: Studio Story & High-Energy Pitch -->
                    <div class="lg:col-span-6 text-center lg:text-left hero-text-col">
                        <div class="hero-badge inline-flex items-center gap-2.5 bg-brand-surface border border-brand-primary/30 px-4 py-1.5 rounded-full mb-6 shadow-sm">
                            <span class="w-2.5 h-2.5 rounded-full bg-brand-primary inline-block"></span>
                            <span class="text-sm font-bold text-brand-primary tracking-wide">Web Design & Growth Studio</span>
                        </div>

                        <h1 class="hero-title text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-[1.18] mb-5 tracking-tight text-slate-900">
                            Website untuk bisnis yang siap tumbuh.
                        </h1>

                        <p class="hero-lead text-slate-600 text-base sm:text-lg mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed font-normal">
                            Danova merancang website kustom yang memudahkan pelanggan mengenal bisnis Anda dan menghubungi Anda. Cepat, mudah digunakan, dan nyaman dibuka di ponsel.
                        </p>

                        <div class="hero-cta flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-10">
                            <a href="#brief" data-brief-start
                                class="apple-spring bg-gradient-to-r from-brand-primary via-[#3060AD] to-brand-secondary text-white px-8 py-4 rounded-2xl font-bold text-sm hover:shadow-xl hover:shadow-brand-primary/30 shadow-apple-card flex items-center justify-center gap-2.5">
                                <span>Mulai Brief Proyek</span>
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
                            <span class="text-sm text-slate-700 font-semibold">Rating 4.9/5 dari 100+ pelaku usaha di Indonesia</span>
                        </div>
                    </div>

                    <div class="lg:col-span-6 hero-visual-col">
                        <figure id="studio-hero-preview" class="studio-art" role="img" aria-label="Ilustrasi desain website yang menyesuaikan layar desktop dan ponsel">
                            <div class="studio-browser" aria-hidden="true">
                                <div class="studio-chrome"><i></i><i></i><i></i></div>
                                <div class="studio-screen">
                                    <div class="studio-site-nav"><b>D</b><i></i><i></i></div>
                                    <div class="studio-site-cover">
                                        <div class="studio-site-story">
                                            <b>Ruang untuk<br>tumbuh.</b>
                                            <i></i>
                                            <span></span>
                                        </div>
                                        <div class="studio-shapes"><i></i><i></i><i></i></div>
                                    </div>
                                    <div class="studio-site-grid"><i></i><i></i><i></i></div>
                                </div>
                            </div>
                            <div class="studio-phone" aria-hidden="true">
                                <div class="studio-phone-camera"></div>
                                <div class="studio-phone-cover">
                                    <div class="studio-shapes"><i></i><i></i><i></i></div>
                                </div>
                                <div class="studio-phone-copy"><b>Ruang untuk tumbuh.</b><i></i><span></span></div>
                            </div>
                            <div class="studio-badge" aria-hidden="true">
                                <span>?</span> Desain responsif
                            </div>
                        </figure>
                        <div class="studio-motion-controls" hidden>
                            <button type="button" class="studio-motion-toggle" aria-controls="studio-hero-preview">
                                <span class="studio-motion-icon" aria-hidden="true"></span>
                                <span class="studio-motion-label">Jeda animasi</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- STATS & TRUST RIBBON -->
        <section class="studio-stats py-12 bg-brand-surface border-b border-brand-border">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div class="border-r last:border-0 border-slate-200/80 pr-4">
                        <div class="text-3xl lg:text-4xl font-extrabold text-brand-primary mb-1">{{ $setting('stats.projects', '100+') }}</div>
                        <p class="text-sm text-slate-600 font-semibold">Website Sukses Meluncur</p>
                    </div>
                    <div class="border-r last:border-0 border-slate-200/80 pr-4">
                        <div class="text-3xl lg:text-4xl font-extrabold text-brand-accent mb-1">{{ $setting('stats.rating', '4.9') }} / 5.0</div>
                        <p class="text-sm text-slate-600 font-semibold">Rating Kepuasan Klien</p>
                    </div>
                    <div class="border-r last:border-0 border-slate-200/80 pr-4">
                        <div class="text-3xl lg:text-4xl font-extrabold text-brand-primary mb-1">{{ $setting('stats.on_time', '95%') }}</div>
                        <p class="text-sm text-slate-600 font-semibold">Selesai Tepat Deadline</p>
                    </div>
                    <div>
                        <div class="text-3xl lg:text-4xl font-extrabold text-emerald-600 mb-1">100%</div>
                        <p class="text-sm text-slate-600 font-semibold">Garansi Pendampingan Teknis</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES SECTION (WITH RICH CONTEXTUAL VECTOR ILLUSTRATIONS) -->
        <section id="services" class="py-20 lg:py-28 bg-white border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mb-14 section-header">
                    <span class="text-sm font-bold text-brand-primary uppercase tracking-wider block mb-2">Spesialisasi Kami</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Pilih jasa sesuai kebutuhan Anda</h2>
                    <p class="text-slate-600 text-base mt-2">Pilih layanan untuk mengisi jenis proyek otomatis di brief.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <!-- Service 1: Website Profil Bisnis & UMKM -->
                    <article class="service-card p-8 rounded-3xl border-2 border-brand-border bg-white shadow-apple-card flex flex-col justify-between apple-card-hover relative overflow-hidden">
                        <div>
                            <!-- Rich Contextual Illustration 1: Dual Viewport Architecture -->
                            <div class="w-full h-44 bg-gradient-to-br from-[#EAF4FF] to-[#CEE3FC] rounded-2xl border border-brand-border flex items-center justify-center p-4 mb-7 relative overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 240 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Desktop Frame -->
                                    <rect x="15" y="10" width="140" height="95" rx="10" fill="#FFFFFF" stroke="#2454A5" stroke-width="2"/>
                                    <rect x="22" y="18" width="35" height="10" rx="3" fill="#2454A5"/>
                                    <line x1="65" y1="23" x2="145" y2="23" stroke="#CBD5E1" stroke-width="2.5" stroke-linecap="round"/>
                                    <!-- Hero Banner Area -->
                                    <rect x="22" y="34" width="75" height="32" rx="5" fill="#BFDBFE"/>
                                    <rect x="102" y="34" width="45" height="32" rx="5" fill="#225A85"/>
                                    <!-- Product Grid -->
                                    <rect x="22" y="72" width="38" height="24" rx="4" fill="#EAF4FF" stroke="#60A5FA" stroke-width="1.5"/>
                                    <rect x="66" y="72" width="38" height="24" rx="4" fill="#EAF4FF" stroke="#60A5FA" stroke-width="1.5"/>
                                    <rect x="110" y="72" width="38" height="24" rx="4" fill="#EAF4FF" stroke="#60A5FA" stroke-width="1.5"/>

                                    <!-- Mobile Phone Companion (Overlapping) -->
                                    <rect x="165" y="24" width="60" height="85" rx="10" fill="#FFFFFF" stroke="#21658F" stroke-width="2.5"/>
                                    <rect x="175" y="30" width="40" height="8" rx="2" fill="#21658F"/>
                                    <rect x="172" y="44" width="46" height="28" rx="4" fill="#BFDBFE"/>
                                    <rect x="172" y="78" width="46" height="22" rx="4" fill="#E5F4FF" stroke="#63A4D5" stroke-width="1"/>
                                </svg>
                            </div>

                            <!-- Timeline & Scope Badge -->
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <span class="inline-block px-3 py-1 rounded-full bg-brand-surface text-brand-primary text-sm font-bold border border-brand-border">
                                    Paling Diminati UMKM
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-brand-dark text-sm font-bold border border-blue-200">
                                    <svg class="w-3.5 h-3.5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    7–10 Hari Kerja
                                </span>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Website Profil Bisnis</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
                                Representasi resmi brand Anda di internet. Menampilkan profil, katalog produk rapi, serta tombol pesan WhatsApp instan sekali klik.
                            </p>
                        </div>
                        <ul class="text-sm text-slate-700 font-medium space-y-2.5 pt-5 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> 100% Mobile responsif & kilat</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> Domain resmi (.com / .id) + SSL aman</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> Terindeks mesin pencari Google otomatis</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> Dashboard CMS kelola mandiri + video panduan</li>
                        </ul>
                        <a href="#brief" data-brief-service="website" class="service-action">Diskusikan layanan <span class="sr-only">{{ $serviceOptions['website'] }}</span><span aria-hidden="true">→</span></a>
                    </article>

                    <!-- Service 2: Landing Page Promosi & Iklan -->
                    <article class="service-card p-8 rounded-3xl border-2 border-brand-border bg-white shadow-apple-card flex flex-col justify-between apple-card-hover relative overflow-hidden">
                        <div>
                            <!-- Rich Contextual Illustration 2: Conversion Rocket Engine -->
                            <div class="w-full h-44 bg-gradient-to-br from-[#F0F8FF] via-[#E0EFFB] to-[#D4E8FA] rounded-2xl border border-brand-border flex items-center justify-center p-4 mb-7 relative overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 240 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Conversion Trajectory Line -->
                                    <path d="M25 95 Q 85 85, 125 50 T 215 25" stroke="#225A85" stroke-width="3.5" stroke-linecap="round"/>
                                    <path d="M25 95 Q 85 85, 125 50 T 215 25 L 215 105 L 25 105 Z" fill="#225A85" fill-opacity="0.15"/>
                                    <circle cx="125" cy="50" r="5" fill="#2454A5"/>
                                    <circle cx="215" cy="25" r="7" fill="#225A85"/>
                                    
                                    <!-- High Conversion Multiplier Badge -->
                                    <rect x="65" y="18" width="90" height="26" rx="6" fill="#FFFFFF" stroke="#225A85" stroke-width="1.5" filter="drop-shadow(0 4px 6px rgba(0,0,0,0.06))"/>
                                    <text x="74" y="35" font-family="sans-serif" font-size="11" fill="#225A85" font-weight="bold">Alur konversi</text>
                                    
                                    <!-- Trigger Pulse Buttons -->
                                    <rect x="35" y="65" width="45" height="18" rx="4" fill="#2454A5"/>
                                    <rect x="155" y="65" width="55" height="20" rx="4" fill="#21658F"/>
                                    <line x1="25" y1="105" x2="215" y2="105" stroke="#B9D8F2" stroke-width="1.5"/>
                                </svg>
                            </div>

                            <!-- Timeline & Scope Badge -->
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <span class="inline-block px-3 py-1 rounded-full bg-brand-light text-brand-accent text-sm font-bold border border-brand-border">
                                    Tingkat Konversi Tinggi
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-sm font-bold border border-emerald-200">
                                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    3–5 Hari Kerja (Kilat)
                                </span>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Landing Page Iklan</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
                                Dirancang khusus untuk memicu calon pembeli langsung checkout atau chat admin. Sangat cocok untuk iklan Meta Ads, TikTok Ads, dan Google Ads.
                            </p>
                        </div>
                        <ul class="text-sm text-slate-700 font-medium space-y-2.5 pt-5 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-brand-accent font-bold text-sm">✓</span> Copywriting fokus closing penjualan</li>
                            <li class="flex items-center gap-2"><span class="text-brand-accent font-bold text-sm">✓</span> Terpasang Meta Pixel, TikTok & GA4</li>
                            <li class="flex items-center gap-2"><span class="text-brand-accent font-bold text-sm">✓</span> Rotasi chat multi-admin WhatsApp</li>
                            <li class="flex items-center gap-2"><span class="text-brand-accent font-bold text-sm">✓</span> A/B testing headline & CTA optimasi</li>
                        </ul>
                        <a href="#brief" data-brief-service="landing-page" class="service-action">Diskusikan layanan <span class="sr-only">{{ $serviceOptions['landing-page'] }}</span><span aria-hidden="true">→</span></a>
                    </article>

                    <!-- Service 3: Desain UI & Identitas Digital -->
                    <article class="service-card p-8 rounded-3xl border-2 border-brand-border bg-white shadow-apple-card flex flex-col justify-between apple-card-hover relative overflow-hidden">
                        <div>
                            <!-- Rich Contextual Illustration 3: Design Workshop & Tokens -->
                            <div class="w-full h-44 bg-gradient-to-br from-[#EAF4FF] via-[#E1EFFD] to-[#DCEBFA] rounded-2xl border border-brand-border flex items-center justify-center p-4 mb-7 relative overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 240 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Palette Tokens with Real Vivid Colors -->
                                    <rect x="25" y="28" width="46" height="58" rx="8" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="1.5"/>
                                    <rect x="30" y="33" width="36" height="32" rx="5" fill="#2454A5"/>
                                    <text x="32" y="77" font-family="monospace" font-size="8" fill="#2454A5" font-weight="bold">#2454A5</text>

                                    <rect x="80" y="28" width="46" height="58" rx="8" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="1.5"/>
                                    <rect x="85" y="33" width="36" height="32" rx="5" fill="#225A85"/>
                                    <text x="87" y="77" font-family="monospace" font-size="8" fill="#225A85" font-weight="bold">#225A85</text>

                                    <rect x="135" y="28" width="46" height="58" rx="8" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="1.5"/>
                                    <rect x="140" y="33" width="36" height="32" rx="5" fill="#21658F"/>
                                    <text x="142" y="77" font-family="monospace" font-size="8" fill="#21658F" font-weight="bold">#21658F</text>

                                    <!-- Vector Pen Tool Handle & Bezier Curve -->
                                    <path d="M190 85L215 35" stroke="#2454A5" stroke-width="2"/>
                                    <circle cx="190" cy="85" r="4" fill="#00A3FF"/>
                                    <circle cx="215" cy="35" r="4" fill="#2454A5"/>
                                </svg>
                            </div>

                            <!-- Timeline & Scope Badge -->
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <span class="inline-block px-3 py-1 rounded-full bg-brand-light text-brand-primary text-sm font-bold border border-brand-border">
                                    Identitas Visual Berkelas
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-sm font-bold border border-indigo-200">
                                    <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    5–7 Hari Kerja
                                </span>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Identitas Visual & UI</h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
                                Standardisasi visual, panduan tipografi, palet warna berkarakter, dan aset grafis agar brand Anda selalu terlihat konsisten dan berwibawa.
                            </p>
                        </div>
                        <ul class="text-sm text-slate-700 font-medium space-y-2.5 pt-5 border-t border-slate-100">
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> Desain UI modern bebas template klise</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> Panduan warna & font panduan resmi</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> Format vektor SVG resolusi tajam</li>
                            <li class="flex items-center gap-2"><span class="text-brand-primary font-bold text-sm">✓</span> 100% Hak cipta & file master diserahkan</li>
                        </ul>
                        <a href="#brief" data-brief-service="visual" class="service-action">Diskusikan layanan <span class="sr-only">{{ $serviceOptions['visual'] }}</span><span aria-hidden="true">→</span></a>
                    </article>

                </div>
            </div>
        </section>

        <!-- INKLUSI STANDAR & HAK MILIK 100% (DELIVERABLES CHECKLIST) -->
        <section id="deliverables" class="border-b border-brand-border/60" aria-labelledby="deliverables-title">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="section-header mb-8">
                    <h2 id="deliverables-title" class="font-extrabold text-slate-900">Inklusi standar di setiap proyek Danova</h2>
                </div>
                <div class="deliverable-layout">
                    <article class="deliverable-ownership">
                        <div>
                            <p class="ownership-value">100%</p>
                            <h3>Hak milik aset dan kode</h3>
                            <ul class="ownership-assets">
                                <li><span class="asset-symbol asset-host" aria-hidden="true"></span>Akses hosting</li>
                                <li><span class="asset-symbol asset-code" aria-hidden="true"></span>Source code</li>
                                <li><span class="asset-symbol asset-data" aria-hidden="true"></span>Database</li>
                            </ul>
                            <p>Bebas dikelola atau dipindahkan.</p>
                        </div>
                    </article>
                    <div class="deliverable-list">
                        @foreach ([
                            ['Domain & cloud hosting', 'Tahun pertama, SSL, dan email bisnis.'],
                            ['Dashboard kelola konten', 'Edit harga, foto, dan kontak sesuai paket.'],
                            ['Bantuan penyiapan konten', 'Headline, profil bisnis, dan tampilan produk.'],
                        ] as [$title, $copy])
                            <article>
                                <span class="deliverable-check" aria-hidden="true">✓</span>
                                <div><h3>{{ $title }}</h3><p>{{ $copy }}</p></div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="compare" class="border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="section-header mb-8">
                    <h2 class="font-extrabold text-slate-900">Perbedaan nyata Danova Studio</h2>
                    <p class="mt-3 text-slate-600">Pertimbangkan empat hal ini saat memilih cara membangun website bisnis Anda.</p>
                </div>
                <div class="comparison-sheet">
                    <dl>
                        @foreach ([
                            ['Desain', 'Mengikuti struktur dan komponen bawaan.', 'Struktur halaman dirancang sesuai identitas dan tujuan bisnis Anda.'],
                            ['Performa', 'Bergantung pada tema dan plugin yang digunakan.', 'Kode dan aset dioptimalkan untuk waktu muat yang cepat.'],
                            ['Kelola konten', 'Kemudahan edit bergantung pada fitur tema.', 'Konten utama bisa diperbarui sendiri lewat panel pengelolaan.'],
                            ['Pendampingan', 'Dukungan bergantung pada penyedia tema.', 'Tim mendampingi peluncuran dan memberi bantuan teknis sesuai paket.'],
                        ] as [$criterion, $template, $danova])
                            <div class="comparison-row">
                                <dt>{{ $criterion }}</dt>
                                <dd><span>Template siap pakai</span>{{ $template }}</dd>
                                <dd><span>Studio Danova</span>{{ $danova }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </section>

        <!-- STUDI KASUS SEBELUM VS SESUDAH (TRANSFORMATION) -->
        <section id="transformation" class="border-b border-brand-border/60" aria-labelledby="transformation-title">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="section-header mb-8">
                    <h2 id="transformation-title" class="font-extrabold text-slate-900">Sebelum vs sesudah memiliki website khusus</h2>
                </div>
                <div class="transformation-board">
                    <div class="transformation-flow">
                        <div class="flow-path flow-manual">
                            <h3>Sebelum</h3>
                            <div class="flow-nodes"><span>DM</span><span>Chat</span><span>Iklan</span></div>
                            <span class="flow-connector" aria-hidden="true"></span>
                            <p>Admin mengecek banyak kanal</p>
                        </div>
                        <div class="flow-path flow-website">
                            <h3>Sesudah</h3>
                            <div class="flow-nodes"><span>Katalog</span><span>Profil</span><span>FAQ</span></div>
                            <span class="flow-connector" aria-hidden="true"></span>
                            <p>Pelanggan mulai dari satu website</p>
                        </div>
                    </div>
                    @foreach ([
                        ['Pesanan', 'DM dan chat terpisah', 'Pesanan terformat via WhatsApp'],
                        ['Pertanyaan', 'Jawaban diketik ulang', 'Harga dan FAQ bisa dicek sendiri'],
                        ['Profil bisnis', 'Portofolio tersebar', 'Profil dan karya di satu domain'],
                        ['Iklan', 'Langsung ke chat', 'Landing page dengan opsi pelacakan'],
                    ] as [$task, $before, $after])
                        <article class="transformation-row">
                            <h3>{{ $task }}</h3>
                            <div class="transformation-state transformation-before"><strong>Sebelum</strong><p>{{ $before }}</p></div>
                            <span class="transformation-arrow" aria-hidden="true">→</span>
                            <div class="transformation-state transformation-after"><strong>Sesudah</strong><p>{{ $after }}</p></div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="work" class="border-b border-brand-border/60 bg-white">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="work-heading mb-8">
                    <div class="section-header">
                        <h2 class="font-extrabold text-slate-900">Proyek website pilihan</h2>
                    </div>
                    <a href="{{ route('out.whatsapp', ['context' => 'work_archive', 'message' => 'Halo Danova, saya ingin meminta arsip proyek lengkap.']) }}"
                        class="service-action">Minta arsip lengkap proyek <span aria-hidden="true">↗</span></a>
                </div>
                <div class="work-grid">
                    @forelse ($projects as $project)
                        @php
                            $workImage = $project->hero_image ? asset('storage/' . $project->hero_image) : $project->hero_image_url;
                            $topResult = collect($project->results)->first();
                            $resultText = is_array($topResult)
                                ? trim(($topResult['metric'] ?? '') . ' ' . ($topResult['label'] ?? ''))
                                : (is_string($topResult) ? $topResult : '');
                        @endphp
                        <article class="work-tile">
                            <a href="{{ route('work.detail', $project->slug) }}" class="work-tile-link">
                                <div class="work-media">
                                    @include('partials.project-preview', ['image' => $workImage, 'title' => $project->title, 'loading' => 'lazy'])
                                </div>
                                <div class="work-caption">
                                    <div>
                                        @if ($project->industry)<p class="work-industry">{{ $project->industry }}</p>@endif
                                        <h3>{{ $project->title }}</h3>
                                    </div>
                                    <span aria-hidden="true" class="work-arrow">↗</span>
                                </div>
                                @if ($project->subtitle)<p class="work-description">{{ $project->subtitle }}</p>@endif
                                @if ($resultText !== '')<p class="work-proof">{{ $resultText }}</p>@endif
                            </a>
                        </article>
                    @empty
                        <div class="empty-panel">
                            <h3>Belum ada proyek yang ditampilkan</h3>
                            <p>Anda bisa meminta contoh proyek melalui tautan di atas.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="workflow" class="border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="studio-split">
                    <div class="section-header">
                        <h2 class="font-extrabold text-slate-900">Dari brief hingga peluncuran</h2>
                        <p class="mt-3 text-slate-600">Ketahui apa yang akan Anda terima di setiap tahap pengerjaan.</p>
                        <a href="#brief" data-brief-start class="service-action">Mulai brief proyek <span aria-hidden="true">→</span></a>
                    </div>
                    <ol class="studio-timeline">
                        <li>
                            <h3>Konsultasi dan ruang lingkup</h3>
                            <p>Kami memetakan kebutuhan bisnis, halaman utama, dan prioritas Anda.</p>
                            <p class="timeline-output">Anda menerima ruang lingkup, perkiraan biaya, dan jadwal.</p>
                        </li>
                        <li>
                            <h3>Desain, pengerjaan, dan revisi</h3>
                            <p>Kami merancang dan membangun website, lalu membagikan pratinjau agar Anda bisa mencoba dan memberi masukan.</p>
                            <p class="timeline-output">Anda menerima tautan pratinjau untuk ditinjau.</p>
                        </li>
                        <li>
                            <h3>Peluncuran dan pendampingan</h3>
                            <p>Setelah disetujui, website diterbitkan di domain Anda dan fitur yang disepakati diperiksa kembali.</p>
                            <p class="timeline-output">Anda menerima akses website dan dukungan sesuai paket.</p>
                        </li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- PRICING SECTION -->
        <section id="pricing" class="py-20 lg:py-28 bg-white border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mx-auto text-center mb-16 section-header">
                    <span class="text-sm font-bold text-brand-primary uppercase tracking-wider block mb-2">Investasi Masuk Akal</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">Paket Investasi Website Bisnis</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-stretch">
                    @forelse ($pricingPlans as $plan)
                    <article
                        class="pricing-card relative flex flex-col justify-between apple-card-hover rounded-3xl p-8 transition-all 
                        {{ $plan->is_featured
                            ? 'studio-featured text-slate-900 shadow-apple-card ring-1 ring-brand-primary relative z-20'
                            : 'bg-white text-slate-900 border-2 border-brand-border shadow-apple-card' }}">

                        @if ($plan->is_featured)
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-brand-primary to-brand-accent text-white text-sm font-bold px-4 py-1.5 rounded-full uppercase tracking-wider shadow-md">
                            Rekomendasi Utama
                        </div>
                        @endif

                        <div>
                            <div class="mb-5">
                                <h3 class="text-lg font-bold mb-1 text-slate-900">
                                    {{ $plan->name }}
                                </h3>
                                <p class="text-sm {{ $plan->is_featured ? 'text-slate-600' : 'text-slate-500' }}">
                                    {{ $plan->subtitle }}
                                </p>
                            </div>

                            <div class="mb-6 pb-5 border-b {{ $plan->is_featured ? 'border-brand-border' : 'border-slate-100' }}">
                                <span class="text-sm uppercase font-bold tracking-wider block mb-1 {{ $plan->is_featured ? 'text-brand-accent' : 'text-brand-primary' }}">
                                    Mulai Dari
                                </span>
                                <div class="flex items-baseline gap-1.5">
                                    <span class="text-base font-bold text-slate-600">Rp</span>
                                    <span class="text-3xl lg:text-4xl font-extrabold tracking-tight">
                                        {{ $plan->price }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-3 mb-8">
                                @foreach ($plan->features ?? [] as $feature)
                                <div class="flex items-start gap-2.5 text-sm">
                                    <span class="shrink-0 font-bold {{ $plan->is_featured ? 'text-brand-accent' : 'text-brand-primary' }}">✓</span>
                                    <span class="text-slate-700">
                                        {{ $feature }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <a href="#brief" data-brief-plan="{{ $plan->id }}"
                            class="apple-spring block w-full py-4 rounded-2xl font-bold text-center text-sm transition-all
                            {{ $plan->is_featured
                                ? 'bg-gradient-to-r from-brand-primary to-brand-secondary text-white hover:shadow-lg'
                                : 'bg-slate-900 text-white hover:bg-brand-primary' }}">
                            {{ $plan->cta_label ?? 'Pilih Paket' }}
                        </a>
                    </article>
                    @empty
                    <div class="empty-panel">
                        <h3>Belum ada paket yang ditampilkan</h3>
                        <p><a href="#brief" data-brief-start>Diskusikan kebutuhan</a> untuk meminta perkiraan biaya.</p>
                    </div>
                    @endforelse
                </div>

                <section class="payment-panel" aria-labelledby="payment-title">
                    <div class="payment-heading">
                        <h3 id="payment-title">Skema pembayaran bertahap &amp; jaminan ketenangan</h3>
                        <p>Contoh skema. Ketentuan mengikuti paket dan penawaran.</p>
                    </div>
                    <ol class="payment-steps">
                        <li>
                            <span class="payment-amount">50%</span>
                            <div><h4>Uang muka</h4><p>Setelah penawaran disepakati.</p></div>
                        </li>
                        <li>
                            <span class="payment-amount">50%</span>
                            <div><h4>Pelunasan</h4><p>Setelah pratinjau disetujui.</p></div>
                        </li>
                    </ol>
                    <dl class="payment-support">
                        <div><dt>Revisi desain &amp; konten</dt><dd>Sesuai lingkup proyek</dd></div>
                        <div><dt>Garansi teknis</dt><dd>30–60 hari, sesuai paket</dd></div>
                        <div><dt>Panduan pengelolaan</dt><dd>Video dan sesi panduan</dd></div>
                    </dl>
                    <a href="#brief" data-brief-start class="service-action">Mulai diskusi proyek <span aria-hidden="true">→</span></a>
                </section>
            </div>
        </section>

        <section id="testimonials" class="border-b border-brand-border/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="section-header mb-8">
                    <h2 class="font-extrabold text-slate-900">Apa kata klien kami</h2>
                </div>
                <div class="studio-reviews">
                    @forelse ($testimonials as $t)
                        @php
                            $avatar = $t->avatar_image ? asset('storage/' . $t->avatar_image) : $t->avatar_url;
                        @endphp
                        <figure class="studio-review {{ $loop->first ? 'studio-review-featured' : '' }}">
                            <blockquote>“{{ $t->quote }}”</blockquote>
                            <figcaption>
                                @if ($avatar)
                                    <img src="{{ $avatar }}" alt="" loading="lazy" decoding="async" onerror="this.hidden = true; this.nextElementSibling.hidden = false;">
                                @endif
                                <span class="review-initial" aria-hidden="true" @if ($avatar) hidden @endif>{{ mb_substr($t->name, 0, 1) }}</span>
                                <div>
                                    <strong>{{ $t->name }}</strong>
                                    @if ($t->title)<p>{{ $t->title }}</p>@endif
                                </div>
                            </figcaption>
                        </figure>
                    @empty
                        <div class="empty-panel"><h3>Belum ada testimoni yang ditampilkan</h3></div>
                    @endforelse
                </div>
            </div>
        </section>

        @include('partials.project-brief')

        @include('partials.faq')

        <!-- CALL TO ACTION BANNER (DEEP OBSIDIAN NAVY & SOLAR ACCENTS) -->
        <section id="contact" class="py-20 lg:py-24 px-6 bg-white">
            <div class="container mx-auto">
                <div class="cta-banner rounded-[2.5rem] p-10 lg:p-16 text-center text-slate-900 relative overflow-hidden">
                    <div class="relative z-10 max-w-3xl mx-auto">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold mb-5 tracking-tight leading-tight">
                            Mari bicarakan website Anda.
                        </h2>
                        <p class="text-slate-700 text-base lg:text-lg mb-10 max-w-xl mx-auto leading-relaxed font-normal">
                            Ceritakan kebutuhan bisnis Anda kepada tim Danova. Kami bantu menentukan langkah awalnya.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                                class="apple-spring bg-gradient-to-r from-brand-primary via-[#3060AD] to-brand-accent text-white px-9 py-4 rounded-full font-bold text-base flex items-center justify-center gap-3 shadow-lg shadow-brand-primary/30">
                                @include('partials.whatsapp-icon')
                                <span>Konsultasi via WhatsApp</span>
                            </a>
                            <a href="mailto:{{ $danovaGmail }}"
                                class="apple-spring border border-brand-primary text-brand-dark px-9 py-4 rounded-full font-bold text-base hover:bg-white/10 flex items-center justify-center gap-2">
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
                <a href="/">
                    @include('partials.danova-logo', ['customLogo' => $setting('branding.header_logo')])
                </a>
                <span class="text-sm text-slate-400 font-semibold">© {{ date('Y') }}</span>
            </div>
            <div class="flex flex-wrap gap-6 text-sm text-slate-600 font-semibold">
                <a href="#services" class="hover:text-brand-primary transition-colors">Layanan</a>
                <a href="#deliverables" class="hover:text-brand-primary transition-colors">Inklusi</a>
                <a href="#compare" class="hover:text-brand-primary transition-colors">Keunggulan</a>
                <a href="#transformation" class="hover:text-brand-primary transition-colors">Hasil</a>
                <a href="#work" class="hover:text-brand-primary transition-colors">Portofolio</a>
                <a href="#workflow" class="hover:text-brand-primary transition-colors">Proses</a>
                <a href="#pricing" class="hover:text-brand-primary transition-colors">Harga</a>
                <a href="#faq" class="hover:text-brand-primary transition-colors">FAQ</a>
            </div>
        </div>
    </footer>

    @include('partials.floating-whatsapp', ['whatsappContext' => ['context' => 'mobile_floating']])

    <!-- Landing page motion and interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.querySelector('.mobile-menu-toggle');
            const mobileNavigation = document.getElementById('mobile-navigation');
            const closeMobileNavigation = () => {
                if (!menuButton || !mobileNavigation) return;
                menuButton.setAttribute('aria-expanded', 'false');
                menuButton.setAttribute('aria-label', 'Buka menu navigasi');
                mobileNavigation.setAttribute('aria-hidden', 'true');
                mobileNavigation.inert = true;
                mobileNavigation.classList.remove('is-open');
            };
            menuButton?.addEventListener('click', () => {
                const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
                menuButton.setAttribute('aria-expanded', String(!isOpen));
                menuButton.setAttribute('aria-label', isOpen ? 'Buka menu navigasi' : 'Tutup menu navigasi');
                mobileNavigation.setAttribute('aria-hidden', String(isOpen));
                mobileNavigation.inert = isOpen;
                mobileNavigation.classList.toggle('is-open', !isOpen);
            });
            mobileNavigation?.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMobileNavigation));
            document.addEventListener('keydown', event => {
                if (event.key === 'Escape' && menuButton?.getAttribute('aria-expanded') === 'true') {
                    closeMobileNavigation();
                    menuButton.focus();
                }
            });

            // 1. Header scroll effect
            const header = document.getElementById('header');
            window.addEventListener('scroll', () => {
                header.classList.toggle('scrolled', window.scrollY > 30);
            });

            const gsap = window.gsap;
            const motion = window.matchMedia('(prefers-reduced-motion: no-preference)');
            const art = document.getElementById('studio-hero-preview');
            const controls = document.querySelector('.studio-motion-controls');
            const toggle = controls.querySelector('.studio-motion-toggle');
            const motionLabel = toggle.querySelector('.studio-motion-label');
            let visible = !('IntersectionObserver' in window);
            let paused = false;
            let liveTimeline;

            function updateHeroMotion() {
                const playing = motion.matches && visible && !document.hidden && !paused;
                controls.hidden = !motion.matches;
                art.classList.toggle('is-moving', playing);
                liveTimeline?.paused(!playing);
                toggle.classList.toggle('is-paused', paused);
                motionLabel.textContent = paused ? 'Putar animasi' : 'Jeda animasi';
            }

            toggle.addEventListener('click', () => {
                paused = !paused;
                updateHeroMotion();
            });
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver(([entry]) => {
                    visible = entry.isIntersecting;
                    updateHeroMotion();
                });
                observer.observe(art);
            }
            motion.addEventListener('change', updateHeroMotion);
            document.addEventListener('visibilitychange', updateHeroMotion);
            updateHeroMotion();

            if (gsap) {
                if (window.ScrollTrigger) gsap.registerPlugin(window.ScrollTrigger);
                gsap.matchMedia().add('(prefers-reduced-motion: no-preference)', () => {
                    gsap.timeline({ defaults: { duration: .65, ease: 'power3.out' } })
                        .from('.hero-text-col .hero-title', { y: 24, opacity: .55 })
                        .from('.hero-text-col .hero-lead', { y: 18, opacity: .65 }, '<.12')
                        .from('.hero-cta a', { y: 14, scale: .94, stagger: .09, ease: 'back.out(2)' }, '<.12')
                        .from('.studio-browser', { y: 26, scale: .96 }, 0)
                        .from('.studio-phone', { y: 38, rotation: 7, scale: .91, duration: .85, ease: 'back.out(2)' }, .17)
                        .from('.studio-badge', { y: 16, scale: .8, ease: 'back.out(2.4)' }, .4);

                    art.classList.add('has-gsap-motion');
                    liveTimeline = gsap.timeline({ paused: true, delay: .9, repeat: -1, yoyo: true, defaults: { duration: 2.1, ease: 'sine.inOut' } })
                        .to(art, { '--studio-phone-lift': -3.2, '--studio-badge-lift': 1.7 }, 0)
                        .to(art, { '--studio-shape-drift': 12 }, 0);
                    updateHeroMotion();

                    if (window.ScrollTrigger) {
                        gsap.utils.toArray('.service-card').forEach(card => {
                            gsap.from(card, {
                                y: 14,
                                duration: .55,
                                ease: 'back.out(1.45)',
                                scrollTrigger: { trigger: card, start: 'top 94%', once: true }
                            });
                        });

                        gsap.timeline({ scrollTrigger: { trigger: '.deliverable-layout', start: 'top 84%', once: true } })
                            .from('.ownership-value', { scale: .85, transformOrigin: 'left center', duration: .65, ease: 'back.out(2)' })
                            .from('.ownership-assets li', { y: 12, opacity: .65, scale: .93, stagger: .09, duration: .48, ease: 'back.out(1.8)' }, '<.18');

                        gsap.timeline({ scrollTrigger: { trigger: '.transformation-flow', start: 'top 84%', once: true } })
                            .from('.flow-manual .flow-nodes span', { y: -12, opacity: .65, stagger: .07, duration: .4, ease: 'power2.out' })
                            .from('.flow-website .flow-nodes span', { y: 17, scale: .86, opacity: .68, stagger: .09, duration: .52, ease: 'back.out(2)' }, '<.15')
                            .from('.flow-connector', { scaleX: .25, opacity: .55, duration: .4, ease: 'power2.out' }, '<.2');

                        gsap.timeline({ scrollTrigger: { trigger: '.payment-steps', start: 'top 86%', once: true } })
                            .from('.payment-amount', { y: 12, scale: .78, stagger: .14, duration: .65, ease: 'back.out(2)' })
                            .from('.payment-support > div', { y: 12, opacity: .65, stagger: .08, duration: .48, ease: 'power2.out' }, '<.2');
                    }

                    return () => {
                        art.classList.remove('has-gsap-motion');
                        liveTimeline = undefined;
                    };
                });
            }

        });
    </script>
    <script defer src="{{ asset('js/project-brief.js') }}"></script>
    <script defer src="{{ asset('js/faq.js') }}"></script>
</body>

</html>
