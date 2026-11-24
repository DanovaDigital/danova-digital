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
        content="Danova membantu brand dan UMKM tampil kredibel, memikat, dan menghasilkan penjualan melalui website kustom berkinerja tinggi dengan estetika modern." />

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
                        primary: '#436EE8',
                        'primary-dark': '#3258CA',
                        'primary-soft': '#EBF2FE',
                        'pastel-sky': {
                            50: '#F4F8FD',
                            100: '#E8F2FC',
                            200: '#D5E5F8',
                            300: '#B8D4F3',
                            400: '#7AAAE5',
                            500: '#4E80EE',
                        },
                        'pastel-mint': '#E8F8F2',
                        'pastel-peach': '#FFF3EB',
                        'pastel-butter': '#FEFBE8',
                        'pastel-lavender': '#F4F2FF',
                        dark: '#1C2436',
                        'slate-subtle': '#5E708E',
                        'light-border': '#DFE8F4',
                        'whatsapp': '#22C55E',
                        'whatsapp-dark': '#16A34A',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                        sans: ['Poppins', 'sans-serif'],
                    },
                    borderRadius: {
                        '3xl': '1.75rem',
                        '4xl': '2.25rem',
                    }
                }
            }
        }
    </script>

    <style>
        * {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        .pastel-mesh-bg {
            background-color: #FAFCFF;
            background-image: 
                radial-gradient(at 15% 10%, rgba(213, 229, 248, 0.5) 0px, transparent 55%),
                radial-gradient(at 85% 15%, rgba(232, 242, 252, 0.6) 0px, transparent 50%),
                radial-gradient(at 50% 90%, rgba(244, 242, 255, 0.4) 0px, transparent 60%);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 20px -2px rgba(67, 110, 232, 0.08);
            border-bottom-color: #DFE8F4;
        }

        .apple-spring {
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease, background-color 0.2s ease;
            will-change: transform;
        }

        .apple-spring:hover {
            transform: translateY(-3px) scale(1.025);
        }

        .apple-spring:active {
            transform: translateY(1px) scale(0.97);
            transition: transform 0.12s ease;
        }

        .apple-card-hover {
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease, border-color 0.3s ease;
            will-change: transform;
        }

        .apple-card-hover:hover {
            transform: translateY(-5px) scale(1.012);
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

        /* 3D Perspective container for Hero Canvas */
        .hero-perspective {
            perspective: 1200px;
        }
    </style>
</head>

<body class="font-poppins pastel-mesh-bg text-dark antialiased overflow-x-hidden selection:bg-primary/15 selection:text-primary">
    @php
    $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

    $danovaGmail = $setting('contact.email', 'danovaagency@gmail.com');
    $danovaWhatsappNumber = $setting('contact.whatsapp', '6281234567890');
    $danovaWhatsappNumberDigits = preg_replace('/\D+/', '', (string) $danovaWhatsappNumber);
    @endphp

    <!-- HEADER / NAVIGATION (CLEAN FLOATING STUDIO PILL) -->
    <header id="header"
        class="fixed top-0 left-0 right-0 z-[1000] bg-white/85 backdrop-blur-md border-b border-[#DFE8F4]/80 transition-all duration-300 h-20 lg:h-24 flex items-center">
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center w-full">
            <a href="/" class="flex items-center gap-3 text-2xl font-bold apple-spring">
                @if ($setting('branding.header_logo'))
                <img src="{{ asset('storage/' . $setting('branding.header_logo')) }}" alt="Danova"
                    class="h-7 lg:h-8" />
                @else
                <div class="w-10 h-10 bg-primary rounded-2xl flex items-center justify-center text-white font-bold shadow-md shadow-primary/20">
                    D
                </div>
                <div class="flex flex-col">
                    <span class="tracking-tight text-slate-900 font-bold leading-none">Danova</span>
                    <span class="text-[11px] text-slate-400 font-medium tracking-wide mt-0.5">Digital Studio</span>
                </div>
                @endif
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-base font-medium text-slate-600">
                <a href="#services" class="hover:text-primary transition-colors py-1">Layanan</a>
                <a href="#compare" class="hover:text-primary transition-colors py-1">Kenapa Kami</a>
                <a href="#work" class="hover:text-primary transition-colors py-1">Portofolio</a>
                <a href="#workflow" class="hover:text-primary transition-colors py-1">Proses Kerja</a>
                <a href="#pricing" class="hover:text-primary transition-colors py-1">Harga</a>
                <a href="#testimonials" class="hover:text-primary transition-colors py-1">Testimoni</a>
                <a href="#faq" class="hover:text-primary transition-colors py-1">FAQ</a>
            </nav>

            <div class="hidden lg:flex items-center gap-4">
                <div class="inline-flex items-center gap-2 bg-[#EBF3FC] px-3.5 py-1.5 rounded-full text-xs font-semibold text-primary border border-[#D5E5F8]">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Slot Project Tersedia</span>
                </div>
                <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                    class="apple-spring bg-whatsapp text-white px-6 py-3 rounded-full font-semibold text-sm flex items-center gap-2 shadow-md shadow-green-500/20 hover:bg-whatsapp-dark">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    <span>Konsultasi WA</span>
                </a>
            </div>

            <button class="mobile-menu-toggle lg:hidden p-2.5 border border-[#DFE8F4] rounded-2xl text-slate-700 hover:bg-slate-50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </header>

    <main id="content" class="pt-24 lg:pt-28">

        <!-- BESPOKE STUDIO HERO SECTION WITH INTERACTIVE VECTOR ARTBOARD -->
        <section class="relative py-16 lg:py-24 overflow-hidden">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">

                    <!-- Left: Studio Story & Value -->
                    <div class="lg:col-span-7 text-center lg:text-left hero-text-col">
                        <div class="hero-badge inline-flex items-center gap-2.5 bg-[#EBF3FC] border border-[#D5E5F8] px-4 py-2 rounded-full mb-6">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary inline-block"></span>
                            <span class="text-sm font-semibold text-primary">Studio Desain & Website Bisnis Modern</span>
                        </div>

                        <h1 class="hero-title text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.2] lg:leading-[1.15] mb-6 tracking-tight text-slate-900">
                            Website Cantik, Ringan, dan Bekerja Nyata untuk Bisnis Anda
                        </h1>

                        <p class="hero-lead text-slate-600 text-base sm:text-lg lg:text-xl mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
                            Bukan sekadar template siap pakai yang generik. Danova merancang setiap halaman secara spesifik untuk meningkatkan kredibilitas, memikat calon pembeli, dan mempercepat pertumbuhan penjualan bisnis Anda.
                        </p>

                        <!-- Studio Tag Chips -->
                        <div class="flex flex-wrap justify-center lg:justify-start gap-2 mb-10">
                            <span class="px-3.5 py-1.5 rounded-xl bg-white border border-[#DFE8F4] text-xs font-medium text-slate-600 shadow-2xs">#WebsiteUMKM</span>
                            <span class="px-3.5 py-1.5 rounded-xl bg-white border border-[#DFE8F4] text-xs font-medium text-slate-600 shadow-2xs">#LandingPageIklan</span>
                            <span class="px-3.5 py-1.5 rounded-xl bg-white border border-[#DFE8F4] text-xs font-medium text-slate-600 shadow-2xs">#CompanyProfile</span>
                            <span class="px-3.5 py-1.5 rounded-xl bg-white border border-[#DFE8F4] text-xs font-medium text-slate-600 shadow-2xs">#KatalogWhatsApp</span>
                            <span class="px-3.5 py-1.5 rounded-xl bg-[#EBF3FC] border border-[#D5E5F8] text-xs font-medium text-primary">#DesainPastelModern</span>
                        </div>

                        <div class="hero-cta flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-10">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20mau%20konsultasi%20website%20bisnis%20saya"
                                class="apple-spring bg-primary text-white px-8 py-4 rounded-2xl font-semibold text-base hover:bg-primary-dark shadow-xl shadow-primary/20 flex items-center justify-center gap-3">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                <span>Konsultasi Proyek Gratis</span>
                            </a>
                            <a href="#work"
                                class="apple-spring bg-white text-slate-800 border-2 border-[#DFE8F4] px-8 py-4 rounded-2xl font-semibold text-base hover:border-primary hover:text-primary text-center">
                                Lihat Contoh Karya
                            </a>
                        </div>

                        <!-- Real Credibility Proof Stack -->
                        <div class="flex items-center justify-center lg:justify-start gap-4">
                            <div class="flex -space-x-3 overflow-hidden">
                                <img src="/images/avatar-1.svg" alt="Client 1" class="inline-block h-10 w-10 rounded-full ring-2 ring-white">
                                <img src="/images/avatar-2.svg" alt="Client 2" class="inline-block h-10 w-10 rounded-full ring-2 ring-white">
                                <img src="/images/avatar-3.svg" alt="Client 3" class="inline-block h-10 w-10 rounded-full ring-2 ring-white">
                            </div>
                            <div class="text-left">
                                <div class="flex items-center gap-1.5 text-amber-400 text-sm">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    <span class="text-slate-900 font-bold ml-1">4.9/5</span>
                                </div>
                                <p class="text-xs text-slate-500 font-medium">Bantu 100+ UMKM & Pengusaha Tampil Profesional</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: BESPOKE STUDIO INTERACTIVE CANVAS ILLUSTRATION -->
                    <div class="lg:col-span-5 relative hero-visual-col hero-perspective">
                        <div class="hero-canvas-wrapper relative" id="heroCanvas">
                            
                            <!-- Ambient Pastel Aura Glows -->
                            <div class="absolute -top-10 -right-10 w-72 h-72 bg-gradient-to-br from-blue-200/45 via-indigo-100/30 to-purple-100/20 rounded-full blur-3xl -z-10 pointer-events-none"></div>
                            <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-gradient-to-tr from-emerald-100/40 via-amber-100/30 to-transparent rounded-full blur-3xl -z-10 pointer-events-none"></div>

                            <!-- Main Desktop Browser Artboard (Vector Illustrated Canvas) -->
                            <div class="hero-artboard relative bg-white rounded-3xl shadow-2xl shadow-indigo-950/12 border-2 border-[#D5E5F8] overflow-hidden">
                                <!-- Safari Mac Header -->
                                <div class="bg-[#F4F8FD] px-5 py-3.5 border-b border-[#DFE8F4] flex items-center justify-between">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-3 h-3 rounded-full bg-rose-400 inline-block"></span>
                                        <span class="w-3 h-3 rounded-full bg-amber-400 inline-block"></span>
                                        <span class="w-3 h-3 rounded-full bg-emerald-400 inline-block"></span>
                                    </div>
                                    <div class="bg-white border border-[#DFE8F4] rounded-xl px-4 py-1 text-xs text-slate-600 font-medium flex items-center gap-2 shadow-2xs">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                        <span class="text-slate-800 font-semibold">kedaikopi.id</span>
                                        <span class="text-slate-400 text-[10px]">/katalog</span>
                                    </div>
                                    <div class="text-[10px] text-slate-400 font-medium">Danova Studio</div>
                                </div>

                                <!-- Inside Illustrated Storefront Canvas -->
                                <div class="p-6 bg-gradient-to-b from-[#FAFCFF] to-white relative min-h-[380px] flex flex-col justify-between">
                                    <!-- Mini Store Header -->
                                    <div class="flex items-center justify-between pb-3.5 border-b border-slate-100">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 rounded-xl bg-primary text-white flex items-center justify-center text-xs font-bold shadow-xs">K</div>
                                            <span class="text-sm font-bold text-slate-900">Kopi Kencana</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-3 py-1 rounded-full bg-[#EBF3FC] text-primary text-[11px] font-semibold border border-[#D5E5F8]">Pesan WhatsApp</span>
                                        </div>
                                    </div>

                                    <!-- Illustrated Store Banner -->
                                    <div class="my-4 p-5 rounded-2xl bg-gradient-to-r from-[#EBF3FC] via-[#F4F8FD] to-[#FFF5ED] border border-[#D5E5F8] relative overflow-hidden">
                                        <div class="max-w-[210px] sm:max-w-[240px]">
                                            <span class="inline-block px-2.5 py-0.5 rounded-md bg-white/95 text-primary text-[10px] font-bold uppercase tracking-wider mb-2 border border-blue-100">UMKM Binaan</span>
                                            <h4 class="text-base font-bold text-slate-900 leading-snug mb-1">Kopi Pilihan, Sangrai Segar Tiap Hari</h4>
                                            <p class="text-xs text-slate-500 mb-3">Pesan langsung ke WhatsApp tanpa ribet.</p>
                                            <button class="px-3.5 py-1.5 rounded-xl bg-primary text-white text-xs font-semibold shadow-xs">Pesan Sekarang →</button>
                                        </div>
                                        
                                        <!-- Custom Pastel Vector Coffee Illustration -->
                                        <div class="absolute right-2 bottom-1 w-28 h-28 pointer-events-none opacity-90">
                                            <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="60" cy="60" r="48" fill="#DCEBFA" />
                                                <rect x="36" y="46" width="46" height="40" rx="10" fill="#436EE8" />
                                                <path d="M82 54C88 54 92 58 92 64C92 70 88 74 82 74" stroke="#436EE8" stroke-width="5" stroke-linecap="round" />
                                                <path d="M48 30C48 35 44 38 44 43" stroke="#F59E0B" stroke-width="3" stroke-linecap="round" />
                                                <path d="M58 28C58 33 54 36 54 41" stroke="#F59E0B" stroke-width="3" stroke-linecap="round" />
                                                <ellipse cx="59" cy="88" rx="30" ry="5" fill="#CADDF3" />
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Illustrated Product Catalog Mini Cards -->
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="p-3 rounded-2xl bg-white border border-[#DFE8F4] shadow-2xs flex items-center justify-between">
                                            <div>
                                                <div class="text-xs font-bold text-slate-800">Cold Brew Latte</div>
                                                <div class="text-[11px] font-semibold text-primary">Rp 25.000</div>
                                            </div>
                                            <span class="w-6 h-6 rounded-full bg-[#EBF3FC] text-primary flex items-center justify-center text-xs font-bold">+</span>
                                        </div>
                                        <div class="p-3 rounded-2xl bg-white border border-[#DFE8F4] shadow-2xs flex items-center justify-between">
                                            <div>
                                                <div class="text-xs font-bold text-slate-800">Butter Croissant</div>
                                                <div class="text-[11px] font-semibold text-primary">Rp 22.000</div>
                                            </div>
                                            <span class="w-6 h-6 rounded-full bg-[#EBF3FC] text-primary flex items-center justify-center text-xs font-bold">+</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Element 1: Google SEO Traffic Graph (Top Right) -->
                            <div class="floating-layer floating-google absolute -top-6 -right-5 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-[#D5E5F8] max-w-[210px] z-20">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-7 h-7 rounded-xl bg-[#EBF3FC] flex items-center justify-center text-primary font-bold text-xs border border-blue-100">
                                        G
                                    </div>
                                    <div>
                                        <div class="text-[11px] font-bold text-slate-800 leading-tight">Posisi #1 Google</div>
                                        <div class="text-[9px] text-emerald-600 font-semibold">● Terindeks Otomatis</div>
                                    </div>
                                </div>
                                <svg class="w-full h-8" viewBox="0 0 160 36" fill="none">
                                    <path d="M0 30 Q 30 25, 60 18 T 110 12 T 160 4" stroke="#436EE8" stroke-width="3" stroke-linecap="round" />
                                    <path d="M0 30 Q 30 25, 60 18 T 110 12 T 160 4 L 160 36 L 0 36 Z" fill="url(#heroBlueGlow)" opacity="0.2" />
                                    <defs>
                                        <linearGradient id="heroBlueGlow" x1="0" y1="0" x2="0" y2="1">
                                            <stop offset="0%" stop-color="#436EE8" />
                                            <stop offset="100%" stop-color="#FFFFFF" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="flex justify-between items-center text-[10px] font-semibold text-slate-500 mt-1">
                                    <span>Pengunjung</span>
                                    <span class="text-emerald-600 font-bold">+280% Naik</span>
                                </div>
                            </div>

                            <!-- Floating Element 2: WhatsApp Live Order (Bottom Left) -->
                            <div class="floating-layer floating-wa absolute -bottom-6 -left-5 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-[#D5E5F8] max-w-[250px] z-20">
                                <div class="flex items-center gap-2.5 mb-2">
                                    <div class="relative">
                                        <img src="/images/avatar-1.svg" class="w-8 h-8 rounded-full border border-slate-200">
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 border-2 border-white absolute -bottom-0.5 -right-0.5"></span>
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-slate-900 leading-tight">Pelanggan Baru</div>
                                        <div class="text-[10px] text-slate-400">Via Tombol WhatsApp Web</div>
                                    </div>
                                </div>
                                <div class="p-2.5 rounded-xl bg-[#E8F8F2] text-slate-800 text-xs leading-snug border border-emerald-100">
                                    "Halo kak, mau pesan 2 box paket kopi dari katalog website ya! ☕"
                                </div>
                                <div class="text-right text-[9px] text-slate-400 font-medium mt-1">08:42 • Berhasil Masuk ✓✓</div>
                            </div>

                            <!-- Floating Element 3: Speed Gauge Sticker (Top Left) -->
                            <div class="floating-layer floating-speed absolute -top-5 -left-5 bg-white p-2.5 rounded-2xl shadow-lg border border-[#D5E5F8] flex items-center gap-2.5 z-20">
                                <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">
                                    ⚡
                                </div>
                                <div>
                                    <div class="text-[10px] font-bold text-slate-800">Skor 99/100</div>
                                    <div class="text-[9px] text-slate-500">Google PageSpeed</div>
                                </div>
                            </div>

                            <!-- Floating Studio Designer Cursor -->
                            <div class="floating-layer floating-cursor absolute top-28 -right-4 z-30 pointer-events-none hidden sm:flex items-center gap-1.5 bg-primary text-white text-[11px] font-semibold px-3 py-1.5 rounded-full shadow-lg shadow-primary/30">
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
        <section class="py-12 bg-white border-y border-[#DFE8F4]">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-12 text-center">
                    <div class="border-r last:border-0 border-slate-100 pr-4">
                        <div class="text-3xl lg:text-4xl font-bold text-slate-900 mb-1">{{ $setting('stats.projects', '100+') }}</div>
                        <p class="text-sm font-medium text-slate-500">Project Website Diluncurkan</p>
                    </div>
                    <div class="border-r last:border-0 border-slate-100 pr-4">
                        <div class="text-3xl lg:text-4xl font-bold text-primary mb-1">{{ $setting('stats.rating', '4.9') }} / 5.0</div>
                        <p class="text-sm font-medium text-slate-500">Rating Kepuasan Klien</p>
                    </div>
                    <div class="border-r last:border-0 border-slate-100 pr-4">
                        <div class="text-3xl lg:text-4xl font-bold text-slate-900 mb-1">{{ $setting('stats.on_time', '95%') }}</div>
                        <p class="text-sm font-medium text-slate-500">Tepat Waktu Sesuai Deadline</p>
                    </div>
                    <div>
                        <div class="text-3xl lg:text-4xl font-bold text-emerald-600 mb-1">100%</div>
                        <p class="text-sm font-medium text-slate-500">Garansi Kepuasan & Revisi</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES BENTO SHOWCASE (WITH BESPOKE SVG ILLUSTRATIONS) -->
        <section id="services" class="py-20 lg:py-28 bg-[#F4F8FD]/70">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="max-w-2xl mb-16 section-header">
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider block mb-2">Spesialisasi Kami</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-3 tracking-tight">Layanan yang Dirancang untuk Pertumbuhan Nyata</h2>
                    <p class="text-slate-600 text-base lg:text-lg">Setiap solusi disesuaikan dengan tujuan bisnis Anda, bukan sekadar menempelkan teks ke dalam template.</p>
                </div>

                <!-- Bento Grid Layout with Bespoke Vector Visuals -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">

                    <!-- Flagship Service: Website Profil Bisnis (7 Col) -->
                    <article class="service-card lg:col-span-7 bg-white p-8 lg:p-12 rounded-3xl border border-[#D5E5F8] shadow-sm flex flex-col justify-between apple-card-hover">
                        <div>
                            <div class="flex justify-between items-start mb-6">
                                <div class="inline-flex items-center gap-2 bg-[#EBF3FC] text-primary px-4 py-1.5 rounded-full text-xs font-semibold border border-[#D5E5F8]">
                                    <span>Paling Diminati</span>
                                </div>
                                <!-- Bespoke SVG Icon Illustration -->
                                <div class="w-14 h-14 rounded-2xl bg-[#EBF3FC] border border-[#D5E5F8] flex items-center justify-center text-primary">
                                    <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="6" y="8" width="36" height="26" rx="5" fill="#E0ECFF" stroke="#436EE8" stroke-width="2.5" />
                                        <line x1="6" y1="16" x2="42" y2="16" stroke="#436EE8" stroke-width="2" />
                                        <circle cx="12" cy="12" r="1.5" fill="#436EE8" />
                                        <circle cx="16" cy="12" r="1.5" fill="#436EE8" />
                                        <path d="M18 34L24 40L30 34" stroke="#436EE8" stroke-width="2.5" stroke-linecap="round" />
                                        <rect x="26" y="20" width="12" height="10" rx="3" fill="#436EE8" />
                                    </svg>
                                </div>
                            </div>

                            <h3 class="text-2xl lg:text-3xl font-bold text-slate-900 mb-4">Website Profil Bisnis & UMKM</h3>
                            <p class="text-slate-600 text-base leading-relaxed mb-8 max-w-xl">
                                Halaman representasi resmi usaha Anda di internet. Memperkenalkan layanan, menampilkan katalog produk, membangun reputasi terpercaya, dan memudahkan calon pelanggan menghubungi Anda melalui WhatsApp sekali klik.
                            </p>

                            <!-- Interactive Deliverable Tags -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-8">
                                <div class="flex items-center gap-3 p-3.5 bg-[#F8FAFD] rounded-2xl border border-slate-100">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span class="text-sm font-medium text-slate-700">Tampilan Mobile Responsif</span>
                                </div>
                                <div class="flex items-center gap-3 p-3.5 bg-[#F8FAFD] rounded-2xl border border-slate-100">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span class="text-sm font-medium text-slate-700">Terindeks Google (SEO Dasar)</span>
                                </div>
                                <div class="flex items-center gap-3 p-3.5 bg-[#F8FAFD] rounded-2xl border border-slate-100">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span class="text-sm font-medium text-slate-700">Tombol Chat WhatsApp Instan</span>
                                </div>
                                <div class="flex items-center gap-3 p-3.5 bg-[#F8FAFD] rounded-2xl border border-slate-100">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span class="text-sm font-medium text-slate-700">Dashboard Admin Mandiri</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-sm text-slate-500">Estimasi pengerjaan: 5–10 hari kerja</span>
                            <a href="#brief" class="text-primary font-semibold text-sm hover:underline flex items-center gap-1.5">
                                Hitung Estimasi Biaya →
                            </a>
                        </div>
                    </article>

                    <!-- Supporting Bento Stack (5 Col) -->
                    <div class="lg:col-span-5 flex flex-col gap-8">
                        <!-- Bento 2: Landing Page Iklan (Peach Pastel) -->
                        <article class="service-card bg-[#FFF5ED] p-8 rounded-3xl border border-[#FDE5D2] shadow-sm flex flex-col justify-between apple-card-hover flex-1">
                            <div>
                                <div class="flex justify-between items-start mb-5">
                                    <div class="w-12 h-12 rounded-2xl bg-[#FEEAD9] text-[#EA580C] flex items-center justify-center font-bold text-lg border border-[#FCD8BE]">
                                        <!-- Funnel Vector Icon -->
                                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                        </svg>
                                    </div>
                                    <span class="px-3 py-1 rounded-full bg-white/80 text-[#EA580C] text-[11px] font-bold border border-[#FDE5D2]">Iklan Ads</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 mb-2">Landing Page Promosi & Iklan</h3>
                                <p class="text-slate-600 text-sm leading-relaxed mb-6">
                                    Fokus pada satu penawaran produk untuk memancing pembeli langsung klik beli. Sangat ideal untuk iklan Instagram Ads, TikTok Ads, dan Google Ads.
                                </p>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t border-[#FDE5D2]/70 text-xs text-[#EA580C] font-semibold">
                                <span>Tinggi Konversi • Loading Kilat</span>
                                <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20tertarik%20buat%20Landing%20Page%20Iklan" class="hover:underline">Diskusi →</a>
                            </div>
                        </article>

                        <!-- Bento 3: Sistem Visual & Branding (Lavender Pastel) -->
                        <article class="service-card bg-[#F5F2FF] p-8 rounded-3xl border border-[#E7E0FF] shadow-sm flex flex-col justify-between apple-card-hover flex-1">
                            <div>
                                <div class="flex justify-between items-start mb-5">
                                    <div class="w-12 h-12 rounded-2xl bg-[#EFE8FF] text-[#7C3AED] flex items-center justify-center font-bold text-lg border border-[#DECFFF]">
                                        <!-- Palette Vector Icon -->
                                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <circle cx="12" cy="7" r="1" fill="currentColor"></circle>
                                            <circle cx="17" cy="11" r="1" fill="currentColor"></circle>
                                            <circle cx="15" cy="16" r="1" fill="currentColor"></circle>
                                            <circle cx="9" cy="15" r="1" fill="currentColor"></circle>
                                        </svg>
                                    </div>
                                    <span class="px-3 py-1 rounded-full bg-white/80 text-[#7C3AED] text-[11px] font-bold border border-[#E7E0FF]">Identitas Unik</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 mb-2">Identitas Visual & Branding</h3>
                                <p class="text-slate-600 text-sm leading-relaxed mb-6">
                                    Desain logo, palet warna pastel khas, panduan tipografi, dan aset visual pendukung agar brand Anda selalu terlihat konsisten dan berkelas.
                                </p>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t border-[#E7E0FF]/70 text-xs text-[#7C3AED] font-semibold">
                                <span>Logo • Palet Warna • Aset Sosmed</span>
                                <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20tertarik%20konsultasi%20Branding" class="hover:underline">Diskusi →</a>
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </section>

        <!-- DISTINCTIVE COMPARISON SECTION (KENAPA DANOVA BEDA DENGAN WEBSITE LAIN) -->
        <section id="compare" class="py-20 lg:py-28 bg-white border-b border-[#DFE8F4]">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center max-w-2xl mx-auto mb-16 section-header">
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider block mb-2">Nilai Lebih</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 tracking-tight">Perbedaan Nyata Bersama Danova</h2>
                    <p class="text-slate-600 text-base lg:text-lg">Mengapa ratusan pemilik bisnis memilih studio kami dibanding template instan yang kaku.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Website Biasa / Generic Template -->
                    <div class="p-8 lg:p-10 rounded-3xl bg-slate-50 border border-slate-200/80">
                        <div class="text-slate-400 font-bold text-lg mb-4 flex items-center gap-2">
                            <span class="w-7 h-7 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center text-xs">✕</span>
                            <span>Website Template Biasa</span>
                        </div>
                        <ul class="space-y-4 text-sm text-slate-600">
                            <li class="flex items-start gap-3">
                                <span class="text-rose-400 font-bold shrink-0">✕</span>
                                <span>Desain template pasaran, terlihat mirip dengan puluhan kompetitor.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-rose-400 font-bold shrink-0">✕</span>
                                <span>Loading lambat karena plugin berlebih, pengunjung cepat keluar.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-rose-400 font-bold shrink-0">✕</span>
                                <span>Susah diedit sendiri dan sering dikenakan biaya mahal tiap revisi kecil.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-rose-400 font-bold shrink-0">✕</span>
                                <span>Tidak dipandu: selesai buat langsung ditinggal tanpa arahan.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Bersama Danova -->
                    <div class="p-8 lg:p-10 rounded-3xl bg-[#EBF3FC]/70 border-2 border-primary/40 shadow-lg shadow-blue-500/5 relative overflow-hidden">
                        <div class="absolute -top-3 right-6 bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-3.5 py-1 rounded-full">
                            Standar Danova
                        </div>
                        <div class="text-primary font-bold text-lg mb-4 flex items-center gap-2">
                            <span class="w-7 h-7 rounded-full bg-primary text-white flex items-center justify-center text-xs">✓</span>
                            <span>Website Studio Danova</span>
                        </div>
                        <ul class="space-y-4 text-sm text-slate-800 font-medium">
                            <li class="flex items-start gap-3">
                                <span class="text-emerald-500 font-bold shrink-0">✓</span>
                                <span>Desain kustom eksklusif bernuansa pastel modern yang memperkuat citra brand.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-emerald-500 font-bold shrink-0">✓</span>
                                <span>Kode ringan dan bersih, skor performa tinggi, langsung terbuka di HP.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-emerald-500 font-bold shrink-0">✓</span>
                                <span>Dilengkapi CMS mandiri yang mudah digunakan siapapun tanpa coding.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-emerald-500 font-bold shrink-0">✓</span>
                                <span>Didampingi penuh hingga live, plus garansi bantuan teknis jika ada kendala.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- PORTFOLIO / WORK SHOWCASE -->
        <section id="work" class="py-20 lg:py-28 bg-[#FAFCFF]">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 section-header">
                    <div class="max-w-2xl">
                        <span class="text-xs font-semibold text-primary uppercase tracking-wider block mb-2">Karya Pilihan</span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-3 tracking-tight">Hasil Nyata untuk Klien Kami</h2>
                        <p class="text-slate-600 text-base lg:text-lg">Koleksi proyek website yang telah berhasil membantu brand tampil lebih meyakinkan.</p>
                    </div>
                    <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20mau%20lihat%20portfolio%20lainnya"
                        class="apple-spring mt-4 md:mt-0 text-sm font-semibold text-primary hover:underline flex items-center gap-1.5">
                        Lihat Lebih Banyak Contoh →
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
                        class="work-card apple-card-hover group block bg-white p-5 rounded-3xl border border-[#DFE8F4] shadow-sm hover:shadow-xl hover:border-primary/40 transition-all">
                        <div class="aspect-video bg-slate-100 rounded-2xl mb-5 overflow-hidden relative border border-slate-100 shadow-inner">
                            <img src="{{ $workImage }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                            
                            @if ($topResult)
                            <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-xs font-semibold text-emerald-700 shadow-sm border border-emerald-100 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>{{ $topResult }}</span>
                            </div>
                            @endif

                            <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-xs">
                                <span class="apple-spring bg-white text-primary px-5 py-2.5 rounded-full font-semibold text-sm shadow-md">
                                    Buka Studi Kasus →
                                </span>
                            </div>
                        </div>
                        <div class="px-2 pb-2">
                            <h3 class="font-bold text-xl text-slate-900 group-hover:text-primary transition-colors mb-1.5">
                                {{ $project->title }}
                            </h3>
                            <p class="text-sm text-slate-500 font-medium">
                                {{ $project->subtitle }}
                            </p>
                        </div>
                    </a>
                    @empty
                    <div class="col-span-3 text-center p-16 bg-white border border-[#DFE8F4] rounded-3xl text-slate-500 font-medium">
                        Portofolio sedang diperbarui.
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- WORKFLOW JOURNEY SECTION (WITH STEP ILLUSTRATIONS) -->
        <section id="workflow" class="py-20 lg:py-28 bg-[#F4F8FD]/60 border-y border-[#DFE8F4]">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center max-w-2xl mx-auto mb-16 section-header">
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider block mb-2">Alur Kerjasama</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 tracking-tight">Proses Praktis, Tanpa Bikin Pusing</h2>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed">Dari diskusi konsep hingga website siap diakses pelanggan, semua transparan dan teratur.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                    <!-- Step 1 -->
                    <div class="bg-white p-8 lg:p-10 rounded-3xl border border-[#DFE8F4] shadow-xs relative flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-12 h-12 rounded-2xl bg-[#EBF3FC] text-primary flex items-center justify-center text-lg font-bold border border-[#D5E5F8]">
                                    01
                                </div>
                                <svg class="w-8 h-8 text-primary/60" viewBox="0 0 32 32" fill="none">
                                    <rect x="6" y="4" width="20" height="24" rx="4" stroke="currentColor" stroke-width="2"/>
                                    <line x1="10" y1="10" x2="22" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <line x1="10" y1="16" x2="18" y2="16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <circle cx="21" cy="22" r="3" fill="#EBF3FC" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">Konsultasi & Skema Kebutuhan</h3>
                            <p class="text-slate-600 text-base leading-relaxed">
                                Kami menggali profil bisnis Anda, menentukan halaman kunci, dan menyusun penawaran biaya yang pas dengan target Anda.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-white p-8 lg:p-10 rounded-3xl border border-[#DFE8F4] shadow-xs relative flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-12 h-12 rounded-2xl bg-[#FFF3EB] text-[#EA580C] flex items-center justify-center text-lg font-bold border border-[#FDE5D2]">
                                    02
                                </div>
                                <svg class="w-8 h-8 text-[#EA580C]/60" viewBox="0 0 32 32" fill="none">
                                    <rect x="4" y="6" width="24" height="18" rx="3" stroke="currentColor" stroke-width="2"/>
                                    <path d="M11 12L8 15L11 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M21 12L24 15L21 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <line x1="14" y1="20" x2="18" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">Desain & Live Preview</h3>
                            <p class="text-slate-600 text-base leading-relaxed">
                                Proses pembuatan langsung dikerjakan. Anda mendapatkan link live preview untuk mencoba tampilan dan memberikan masukan revisi.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-white p-8 lg:p-10 rounded-3xl border border-[#DFE8F4] shadow-xs relative flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-12 h-12 rounded-2xl bg-[#E8F8F2] text-emerald-600 flex items-center justify-center text-lg font-bold border border-emerald-100">
                                    03
                                </div>
                                <svg class="w-8 h-8 text-emerald-500/60" viewBox="0 0 32 32" fill="none">
                                    <path d="M16 4C16 4 23 8 23 17L19 21L16 19L13 21L9 17C9 8 16 4 16 4Z" stroke="currentColor" stroke-width="2"/>
                                    <circle cx="16" cy="12" r="2.5" fill="currentColor"/>
                                    <path d="M13 25L16 28L19 25" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">Peluncuran & Pelatihan</h3>
                            <p class="text-slate-600 text-base leading-relaxed">
                                Website diaktifkan di domain resmi bisnis Anda, terhubung ke Google & WhatsApp, plus video panduan mudah mengelola konten secara mandiri.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TESTIMONIALS SECTION -->
        <section id="testimonials" class="py-20 lg:py-28 bg-white">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center max-w-2xl mx-auto mb-16 section-header">
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider block mb-2">Kisah Sukses</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 tracking-tight">Cerita Pemilik Usaha yang Bertumbuh Bersama Danova</h2>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed">Ulasan jujur dari klien yang telah merasakan dampak positif website baru mereka.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($testimonials as $t)
                    <div class="apple-card-hover bg-[#FAFCFF] p-8 lg:p-10 rounded-3xl border border-[#DFE8F4] shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-1 text-amber-400 mb-6 text-sm">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-slate-700 text-base leading-relaxed mb-8 italic">
                                "{{ $t->quote }}"
                            </p>
                        </div>
                        <div class="flex items-center gap-3.5 pt-4 border-t border-slate-100">
                            @if (!empty($t->avatar_image) || !empty($t->avatar_url))
                            <img src="{{ !empty($t->avatar_image) ? asset('storage/' . $t->avatar_image) : $t->avatar_url }}"
                                alt="{{ $t->name }}" class="w-11 h-11 rounded-full object-cover border border-slate-200">
                            @else
                            <div class="w-11 h-11 rounded-full bg-[#EBF3FC] text-primary flex items-center justify-center font-bold text-base">
                                {{ substr($t->name, 0, 1) }}
                            </div>
                            @endif
                            <div>
                                <h4 class="font-bold text-slate-900 text-base">{{ $t->name }}</h4>
                                <p class="text-xs text-slate-500 font-medium">{{ $t->title }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-3 text-center p-12 bg-slate-50 rounded-3xl text-slate-500">
                        Testimoni sedang diperbarui.
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- PRICING SECTION -->
        <section id="pricing" class="py-20 lg:py-28 bg-[#F4F8FD]/60 relative">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-2xl mx-auto section-header">
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider block mb-2">Transparan & Masuk Akal</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 tracking-tight">
                        Paket Investasi Website Bisnis
                    </h2>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed">
                        Pilih paket yang paling cocok dengan tahap perkembangan bisnis Anda saat ini.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-8 items-stretch max-w-7xl mx-auto">
                    @forelse ($pricingPlans as $plan)
                    <article
                        class="pricing-card relative flex flex-col justify-between apple-card-hover rounded-3xl p-8 lg:p-10 transition-all 
                        {{ $plan->is_featured
                            ? 'bg-[#181F34] text-white shadow-2xl shadow-indigo-950/25 ring-2 ring-primary/80 relative z-20'
                            : 'bg-white text-slate-900 border border-[#DFE8F4] shadow-sm hover:shadow-xl' }}">

                        @if ($plan->is_featured)
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-primary to-[#5C7CFA] text-white text-xs font-semibold px-5 py-1.5 rounded-full shadow-lg shadow-primary/30 uppercase tracking-wider">
                            Rekomendasi Terbaik
                        </div>
                        @endif

                        <div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold mb-1.5 {{ $plan->is_featured ? 'text-white' : 'text-slate-900' }}">
                                    {{ $plan->name }}
                                </h3>
                                <p class="text-sm font-normal leading-relaxed {{ $plan->is_featured ? 'text-slate-300' : 'text-slate-500' }}">
                                    {{ $plan->subtitle }}
                                </p>
                            </div>

                            <div class="mb-8 pb-6 border-b {{ $plan->is_featured ? 'border-slate-700/60' : 'border-slate-100' }}">
                                <span class="text-xs font-semibold uppercase tracking-wider block mb-2 {{ $plan->is_featured ? 'text-slate-400' : 'text-primary' }}">
                                    Mulai Dari
                                </span>
                                <div class="flex items-baseline gap-1.5">
                                    <span class="text-xl font-bold {{ $plan->is_featured ? 'text-slate-300' : 'text-slate-700' }}">Rp</span>
                                    <span class="text-4xl lg:text-5xl font-bold tracking-tight">
                                        {{ $plan->price }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-4 mb-8">
                                @foreach ($plan->features ?? [] as $feature)
                                <div class="flex items-start gap-3 text-base">
                                    <div class="shrink-0 w-5 h-5 rounded-full flex items-center justify-center mt-0.5 {{ $plan->is_featured ? 'bg-primary/25 text-blue-300' : 'bg-[#EBF3FC] text-primary' }}">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                            <path d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="font-normal {{ $plan->is_featured ? 'text-slate-200' : 'text-slate-600' }}">
                                        {{ $feature }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20tertarik%20tanya%20Paket%20{{ urlencode($plan->name) }}"
                            class="apple-spring block w-full py-4 rounded-2xl font-semibold text-center text-base transition-all
                            {{ $plan->is_featured
                                ? 'bg-primary text-white hover:bg-primary-dark shadow-lg shadow-primary/25'
                                : 'bg-[#1C2436] text-white hover:bg-primary shadow-sm' }}">
                            {{ $plan->cta_label ?? 'Pilih Paket Ini' }}
                        </a>
                    </article>
                    @empty
                    @endforelse
                </div>

                <div class="mt-16 text-center">
                    <div class="inline-flex flex-col sm:flex-row items-center gap-4 p-5 bg-white rounded-2xl border border-[#DFE8F4] shadow-sm">
                        <p class="text-base font-medium text-slate-700">
                            Punya kebutuhan sistem khusus atau integrasi database kustom?
                        </p>
                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                            class="apple-spring px-6 py-2.5 bg-[#EBF3FC] text-primary rounded-xl text-sm font-semibold hover:bg-primary hover:text-white transition-all shadow-xs border border-[#D5E5F8]">
                            Konsultasi Custom →
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- BRIEF BUILDER SECTION -->
        <section id="brief" class="py-20 lg:py-28 bg-white relative overflow-hidden">
            <div class="container mx-auto px-6 lg:px-12 relative z-10">
                <div class="max-w-2xl mx-auto text-center mb-14 section-header">
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider block mb-2">Simulasi Mudah</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 tracking-tight">
                        Rencanakan Kebutuhan Website Anda
                    </h2>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed">
                        Pilih jenis website Anda dan dapatkan ringkasan proposal instan yang siap didiskusikan bersama tim teknis kami.
                    </p>
                </div>

                <div class="max-w-3xl mx-auto bg-white rounded-3xl border border-[#DFE8F4] shadow-xl shadow-blue-500/5 p-8 lg:p-12"
                    id="briefBuilder" data-whatsapp-url="{{ route('out.whatsapp') }}"
                    data-email-url="{{ route('out.email') }}">

                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Konsultasi Terpandu</span>
                                <h4 id="briefStepLabel" class="text-lg font-bold text-slate-900">Langkah 1 dari 2</h4>
                            </div>
                            <span class="text-xs font-medium text-slate-500">Estimasi 60 Detik</span>
                        </div>

                        <div class="h-2 bg-[#EBF3FC] rounded-full overflow-hidden">
                            <div class="h-full bg-primary transition-all duration-500 ease-out rounded-full" id="briefProgressFill"
                                style="width: 50%"></div>
                        </div>

                        <div id="briefError"
                            class="hidden mt-4 p-4 bg-red-50 text-red-600 text-sm font-medium rounded-xl border border-red-200">
                        </div>
                    </div>

                    <form id="briefForm" class="min-h-[280px]">
                        <!-- Step 1: Kebutuhan -->
                        <div class="brief-step is-active" data-step="1">
                            <h3 class="text-lg lg:text-xl font-bold mb-5 text-slate-900 flex items-center gap-3">
                                <span class="w-8 h-8 rounded-xl bg-[#EBF3FC] text-primary flex items-center justify-center text-sm font-bold">1</span>
                                Apa jenis website yang ingin Anda buat?
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                @foreach (['Website Profil Bisnis & UMKM', 'Landing Page Promosi & Iklan', 'Toko Online & Katalog WA', 'Portfolio & Personal Branding', 'Perbarui Website Lama', 'Kebutuhan Kustom Lainnya'] as $opt)
                                <label
                                    class="apple-spring group relative flex items-center gap-4 p-4 rounded-2xl border border-[#DFE8F4] cursor-pointer hover:border-primary hover:bg-[#EBF3FC]/40">
                                    <input type="radio" name="need" value="{{ $opt }}" class="peer hidden" required>
                                    <div class="w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-primary peer-checked:bg-primary flex items-center justify-center transition-all shrink-0">
                                        <div class="w-2 h-2 bg-white rounded-full scale-0 peer-checked:scale-100 transition-transform"></div>
                                    </div>
                                    <span class="text-base font-medium text-slate-700 peer-checked:text-primary peer-checked:font-semibold transition-colors">{{ $opt }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Step 2: Kontak & Detail -->
                        <div class="brief-step" data-step="2">
                            <h3 class="text-lg lg:text-xl font-bold mb-5 text-slate-900 flex items-center gap-3">
                                <span class="w-8 h-8 rounded-xl bg-[#EBF3FC] text-primary flex items-center justify-center text-sm font-bold">2</span>
                                Informasi Kontak Anda
                            </h3>
                            <div class="space-y-5">
                                <div>
                                    <label class="text-sm font-semibold text-slate-700 mb-2 block">Nama Lengkap / Nama Usaha <span class="text-red-500">*</span></label>
                                    <input type="text" name="brand" placeholder="Contoh: Toko Berkah / Budi Santoso"
                                        class="w-full p-4 bg-[#F8FAFD] border border-[#DFE8F4] rounded-xl outline-none focus:border-primary focus:bg-white transition-all text-base font-normal text-slate-800"
                                        required>
                                </div>
                                <div>
                                    <label class="text-sm font-semibold text-slate-700 mb-2 block">Catatan atau Fitur Khusus</label>
                                    <textarea name="notes" rows="3" placeholder="Ceritakan singkat tujuan Anda atau referensi website yang Anda sukai..."
                                        class="w-full p-4 bg-[#F8FAFD] border border-[#DFE8F4] rounded-xl outline-none focus:border-primary focus:bg-white transition-all text-base font-normal text-slate-800"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="flex justify-between items-center mt-8 pt-6 border-t border-slate-100" id="briefActions">
                        <button type="button" id="briefBack"
                            class="apple-spring text-sm font-semibold text-slate-500 hover:text-slate-900 disabled:opacity-0 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali
                        </button>
                        <button type="button" id="briefNext"
                            class="apple-spring px-8 py-3.5 bg-primary text-white rounded-2xl font-semibold text-base hover:bg-primary-dark transition-all shadow-lg shadow-primary/20">
                            Lanjut
                        </button>
                    </div>

                    <div id="briefResult" class="hidden mt-6 pt-6 border-t border-slate-100">
                        <div class="bg-[#EBF3FC]/70 rounded-2xl p-6 border border-[#D5E5F8]">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-emerald-500 text-white rounded-full flex items-center justify-center text-sm font-bold">✓</div>
                                <h3 class="font-bold text-slate-900 text-lg">Brief Konsultasi Siap Dikirim!</h3>
                            </div>
                            <pre id="briefSummary" class="text-sm text-slate-700 font-sans whitespace-pre-wrap leading-relaxed mb-6 bg-white p-4 rounded-xl border border-blue-100"></pre>

                            <div class="flex flex-col sm:flex-row gap-3.5">
                                <button id="briefEdit"
                                    class="apple-spring px-6 py-3.5 text-sm font-semibold text-slate-600 hover:text-slate-900 border border-slate-200 rounded-xl bg-white">
                                    Ubah Data
                                </button>
                                <a id="briefSendWhatsapp" href="#" target="_blank"
                                    class="apple-spring px-8 py-3.5 bg-whatsapp text-white rounded-xl font-semibold text-base text-center flex-1 flex items-center justify-center gap-3 hover:bg-whatsapp-dark shadow-xl shadow-green-500/15">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                    </svg>
                                    Kirim ke WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section id="faq" class="py-20 lg:py-28 bg-[#F4F8FD]/60">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-14 max-w-2xl mx-auto section-header">
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider block mb-2">Jawaban Cepat</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Pertanyaan yang Sering Diajukan
                    </h2>
                    <p class="text-slate-600 text-base mt-2">Segala hal yang perlu Anda ketahui sebelum memulai proyek bersama kami.</p>
                </div>

                <div class="max-w-3xl mx-auto space-y-4">
                    @forelse ($faqs as $faq)
                    <div class="faq-item bg-white border border-[#DFE8F4] rounded-2xl transition-all shadow-sm hover:border-primary/40 overflow-hidden">
                        <button type="button"
                            class="faq-question w-full flex justify-between items-center p-6 text-left font-semibold text-slate-800 text-base lg:text-lg focus:outline-none">
                            <span class="pr-6">{{ $faq->question }}</span>
                            <span class="faq-icon w-8 h-8 rounded-full bg-[#EBF3FC] text-primary flex items-center justify-center shrink-0 text-xl font-bold transition-transform">
                                +
                            </span>
                        </button>
                        <div class="faq-answer-inner px-6 pb-6 text-slate-600 text-base leading-relaxed border-t border-slate-50 pt-4">
                            {{ $faq->answer }}
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-slate-500">FAQ sedang diperbarui.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- CALL TO ACTION BANNER -->
        <section id="contact" class="py-20 lg:py-28 px-6 bg-white">
            <div class="container mx-auto">
                <div class="cta-banner bg-gradient-to-br from-[#161D2F] via-[#1A2338] to-[#1F2C47] rounded-[2.5rem] lg:rounded-[3rem] p-10 lg:p-20 text-center text-white relative overflow-hidden shadow-2xl shadow-indigo-950/20">
                    <div class="relative z-10 max-w-3xl mx-auto">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-6 leading-tight tracking-tight">
                            Siap Membawa Bisnis Anda ke Tingkat yang Jauh Lebih Profesional?
                        </h2>
                        <p class="text-slate-300 text-base lg:text-lg mb-10 max-w-2xl mx-auto leading-relaxed font-normal">
                            Konsultasikan kebutuhan Anda sekarang tanpa biaya komitmen. Tim studio Danova siap membantu mewujudkan website yang memikat dan siap menghasilkan omzet.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                                class="apple-spring bg-whatsapp text-white px-9 py-4 rounded-2xl font-semibold text-base flex items-center justify-center gap-3 shadow-xl shadow-green-500/20 hover:bg-whatsapp-dark">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                <span>Hubungi via WhatsApp</span>
                            </a>
                            <a href="mailto:{{ $danovaGmail }}"
                                class="apple-spring border border-white/25 text-white px-9 py-4 rounded-2xl font-semibold text-base hover:bg-white/10 flex items-center justify-center gap-3">
                                <svg class="w-5 h-5 fill-none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Kirim Email</span>
                            </a>
                        </div>
                    </div>
                    <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/25 rounded-full blur-[90px] pointer-events-none"></div>
                    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-amber-400/15 rounded-full blur-[90px] pointer-events-none"></div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="py-14 border-t border-[#DFE8F4] bg-white">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 justify-between items-center gap-10">
                <div>
                    <div class="text-2xl font-bold mb-3 flex items-center gap-3">
                        @if (!empty($siteSettings['header_logo']))
                        <img src="{{ asset('storage/' . $siteSettings['header_logo']) }}" alt="Danova"
                            style="max-height: 28px; display: block;" />
                        @else
                        <span class="text-slate-900">Danova Digital</span>
                        @endif
                    </div>
                    <p class="text-sm text-slate-500 max-w-sm mb-4 leading-relaxed font-normal">
                        Studio kreatif untuk pembuatan website kustom dan identitas visual bisnis. Solusi praktis, elegan, dan berorientasi hasil nyata.
                    </p>
                    <p class="text-xs text-slate-400 font-medium">© {{ date('Y') }} Danova Digital. Hak cipta dilindungi.</p>
                </div>
                <div class="flex flex-wrap gap-x-10 gap-y-4 text-base font-medium text-slate-600">
                    <a href="#services" class="hover:text-primary transition-colors">Layanan</a>
                    <a href="#compare" class="hover:text-primary transition-colors">Kenapa Kami</a>
                    <a href="#work" class="hover:text-primary transition-colors">Portofolio</a>
                    <a href="#workflow" class="hover:text-primary transition-colors">Cara Kerja</a>
                    <a href="#pricing" class="hover:text-primary transition-colors">Harga</a>
                    <a href="#faq" class="hover:text-primary transition-colors">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- GSAP ANIMATION & INTERACTIVE 3D PARALLAX SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Header scroll effect
            const header = document.getElementById('header');
            window.addEventListener('scroll', () => {
                header.classList.toggle('scrolled', window.scrollY > 40);
            });

            // 2. Apple-Style Bouncy Hero Entrance Timeline
            const heroTL = gsap.timeline({ defaults: { ease: "back.out(1.4)" } });

            heroTL
                .from('.hero-badge', {
                    y: 20,
                    scale: 0.85,
                    opacity: 0,
                    duration: 0.65
                })
                .from('.hero-title', {
                    y: 35,
                    opacity: 0,
                    duration: 0.85,
                    ease: "back.out(1.2)"
                }, "-=0.35")
                .from('.hero-lead', {
                    y: 25,
                    opacity: 0,
                    duration: 0.7,
                    ease: "power3.out"
                }, "-=0.5")
                .from('.hero-cta a', {
                    scale: 0.88,
                    y: 20,
                    opacity: 0,
                    stagger: 0.12,
                    duration: 0.65,
                    ease: "back.out(1.8)"
                }, "-=0.4")
                .from('.hero-artboard', {
                    scale: 0.9,
                    y: 40,
                    opacity: 0,
                    duration: 0.9,
                    ease: "back.out(1.4)"
                }, "-=0.8")
                .from('.floating-layer', {
                    scale: 0.7,
                    y: 30,
                    opacity: 0,
                    stagger: 0.12,
                    duration: 0.75,
                    ease: "back.out(1.8)"
                }, "-=0.5");

            // 3. Gentle floating physics on individual badges
            gsap.to('.floating-google', {
                y: -10,
                duration: 2.6,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });
            gsap.to('.floating-wa', {
                y: -8,
                duration: 2.2,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: 0.4
            });
            gsap.to('.floating-speed', {
                y: -6,
                duration: 2.0,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: 0.8
            });
            gsap.to('.floating-cursor', {
                y: -12,
                x: 4,
                duration: 2.8,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: 0.2
            });

            // 4. Interactive 3D Mouse Parallax on Hero Canvas
            const heroCanvas = document.getElementById('heroCanvas');
            if (heroCanvas) {
                const artboard = heroCanvas.querySelector('.hero-artboard');
                const floatingGoogle = heroCanvas.querySelector('.floating-google');
                const floatingWa = heroCanvas.querySelector('.floating-wa');
                const floatingSpeed = heroCanvas.querySelector('.floating-speed');

                window.addEventListener('mousemove', (e) => {
                    const rect = heroCanvas.getBoundingClientRect();
                    const x = e.clientX - (rect.left + rect.width / 2);
                    const y = e.clientY - (rect.top + rect.height / 2);

                    // Only animate when near viewport
                    if (Math.abs(x) < 800 && Math.abs(y) < 600) {
                        gsap.to(artboard, {
                            rotateY: x * 0.02,
                            rotateX: -y * 0.02,
                            duration: 0.6,
                            ease: "power2.out"
                        });
                        gsap.to(floatingGoogle, {
                            x: -x * 0.035,
                            y: -y * 0.035,
                            duration: 0.7,
                            ease: "power2.out"
                        });
                        gsap.to(floatingWa, {
                            x: x * 0.04,
                            y: y * 0.04,
                            duration: 0.7,
                            ease: "power2.out"
                        });
                        gsap.to(floatingSpeed, {
                            x: -x * 0.025,
                            y: y * 0.025,
                            duration: 0.7,
                            ease: "power2.out"
                        });
                    }
                });
            }

            // 5. ScrollTrigger section header animations
            gsap.utils.toArray('.section-header').forEach(header => {
                gsap.from(header, {
                    scrollTrigger: {
                        trigger: header,
                        start: "top 85%",
                        toggleActions: "play none none none"
                    },
                    y: 35,
                    opacity: 0,
                    duration: 0.75,
                    ease: "back.out(1.3)"
                });
            });

            // 6. Staggered Service Bento Cards
            gsap.from('.service-card', {
                scrollTrigger: {
                    trigger: '#services',
                    start: "top 78%",
                    toggleActions: "play none none none"
                },
                y: 45,
                scale: 0.95,
                opacity: 0,
                stagger: 0.14,
                duration: 0.75,
                ease: "back.out(1.4)"
            });

            // 7. Staggered Work Cards
            gsap.from('.work-card', {
                scrollTrigger: {
                    trigger: '#work',
                    start: "top 78%",
                    toggleActions: "play none none none"
                },
                y: 40,
                scale: 0.94,
                opacity: 0,
                stagger: 0.14,
                duration: 0.8,
                ease: "back.out(1.3)"
            });

            // 8. Staggered Pricing Cards
            gsap.from('.pricing-card', {
                scrollTrigger: {
                    trigger: '#pricing',
                    start: "top 75%",
                    toggleActions: "play none none none"
                },
                y: 50,
                scale: 0.92,
                opacity: 0,
                stagger: 0.15,
                duration: 0.85,
                ease: "back.out(1.4)"
            });

            // 9. CTA Banner spring scale
            gsap.from('.cta-banner', {
                scrollTrigger: {
                    trigger: '#contact',
                    start: "top 80%",
                    toggleActions: "play none none none"
                },
                scale: 0.92,
                y: 40,
                opacity: 0,
                duration: 0.9,
                ease: "back.out(1.3)"
            });

            // 10. Interactive Apple Bouncy Spring on Buttons (.apple-spring)
            document.querySelectorAll('.apple-spring').forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    gsap.to(btn, { scale: 1.04, y: -2, duration: 0.3, ease: "back.out(2.2)" });
                });
                btn.addEventListener('mouseleave', () => {
                    gsap.to(btn, { scale: 1, y: 0, duration: 0.35, ease: "back.out(1.8)" });
                });
                btn.addEventListener('mousedown', () => {
                    gsap.to(btn, { scale: 0.96, duration: 0.12, ease: "power2.out" });
                });
                btn.addEventListener('mouseup', () => {
                    gsap.to(btn, { scale: 1.04, duration: 0.25, ease: "back.out(2)" });
                });
            });

            // 11. FAQ Accordion with GSAP spring animations
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
                            gsap.to(otherAns, {
                                height: 0,
                                opacity: 0,
                                duration: 0.35,
                                ease: "power2.inOut",
                                onComplete: () => { otherAns.style.display = 'none'; }
                            });
                            gsap.to(otherIcon, { rotation: 0, duration: 0.35, ease: "back.out(2)" });
                        }
                    });

                    if (isOpen) {
                        item.classList.remove('is-open');
                        gsap.to(answer, {
                            height: 0,
                            opacity: 0,
                            duration: 0.35,
                            ease: "power2.inOut",
                            onComplete: () => { answer.style.display = 'none'; }
                        });
                        gsap.to(icon, { rotation: 0, duration: 0.35, ease: "back.out(2)" });
                    } else {
                        item.classList.add('is-open');
                        answer.style.display = 'block';
                        answer.style.height = 'auto';
                        const fullHeight = answer.offsetHeight;
                        answer.style.height = '0px';

                        gsap.to(answer, {
                            height: fullHeight,
                            opacity: 1,
                            duration: 0.45,
                            ease: "back.out(1.2)"
                        });
                        gsap.to(icon, { rotation: 45, duration: 0.4, ease: "back.out(2.2)" });
                    }
                });
            });

            // 12. Brief Builder Wizard Logic
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
                            gsap.fromTo(step, 
                                { opacity: 0, y: 15, scale: 0.98 }, 
                                { opacity: 1, y: 0, scale: 1, duration: 0.45, ease: "back.out(1.5)" }
                            );
                        }
                    });

                    const percentage = (currentStep / totalSteps) * 100;
                    progressFill.style.width = `${percentage}%`;
                    stepLabel.textContent = `Langkah ${currentStep} dari ${totalSteps}`;
                    backBtn.disabled = currentStep === 1;
                    nextBtn.textContent = currentStep === totalSteps ? 'Kirim Ringkasan' : 'Lanjut';
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
                        error.textContent = 'Mohon lengkapi pilihan yang diperlukan terlebih dahulu.';
                        error.classList.remove('hidden');
                        gsap.fromTo(error, { x: -8 }, { x: 8, duration: 0.08, repeat: 3, yoyo: true, ease: "power1.inOut" });
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
                    let summary = "*Brief Konsultasi Website — Danova Digital*\n\n";
                    summary += `*Nama Klien:* ${formData.get('brand')}\n`;
                    summary += `*Kebutuhan:* ${formData.get('need') || '-'}\n`;
                    summary += `*Catatan Tambahan:* ${formData.get('notes') || '-'}`;

                    summaryBox.textContent = summary;
                    form.classList.add('hidden');
                    document.getElementById('briefActions').classList.add('hidden');
                    resultSection.classList.remove('hidden');

                    gsap.fromTo(resultSection, 
                        { opacity: 0, scale: 0.95, y: 20 }, 
                        { opacity: 1, scale: 1, y: 0, duration: 0.5, ease: "back.out(1.5)" }
                    );

                    const waUrl = root.dataset.whatsappUrl + "?context=brief_builder&message=" + encodeURIComponent(summary);
                    document.getElementById('briefSendWhatsapp').href = waUrl;
                }

                document.getElementById('briefEdit').addEventListener('click', () => {
                    resultSection.classList.add('hidden');
                    form.classList.remove('hidden');
                    document.getElementById('briefActions').classList.remove('hidden');
                });
            })();

            // 13. Mobile Menu Toggle
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
                    nav.classList.toggle('border-[#DFE8F4]');
                    nav.classList.toggle('z-[1000]');
                });
            }
        });
    </script>
</body>

</html>
