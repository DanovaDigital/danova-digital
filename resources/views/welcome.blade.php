<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="/images/DanovaFavicon.png" />
    <link rel="apple-touch-icon" href="/images/DanovaFavicon.png" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />

    <title>Danova — Jasa Pembuatan Website Bisnis & UMKM Profesional</title>
    <meta name="description"
        content="Bikin bisnis Anda naik kelas dengan website profesional. Desain modern, proses cepat, dan siap meningkatkan penjualan." />

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
                        primary: '#2F6FED',
                        'primary-dark': '#1E56C9',
                        secondary: '#F59E0B',
                        dark: '#1E293B',
                        'medium-gray': '#64748B',
                        'light-gray': '#E2E8F0',
                        'bg-gray': '#F8FAFC',
                        'whatsapp': '#25D366',
                        'whatsapp-dark': '#20BA5A',
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

        header.scrolled {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.06);
            border-bottom-color: #E2E8F0;
        }

        /* Apple Spring Interactive Controls */
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
            transform: translateY(-6px) scale(1.015);
        }

        /* FAQ accordion animation styles */
        .faq-answer-inner {
            overflow: hidden;
            display: none;
        }

        .faq-item.is-open .faq-answer-inner {
            display: block;
        }

        /* Step transitions */
        .brief-step {
            display: none;
        }

        .brief-step.is-active {
            display: block;
        }
    </style>
</head>

<body class="font-poppins bg-white text-dark antialiased overflow-x-hidden selection:bg-primary/10 selection:text-primary">
    @php
    $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

    $danovaGmail = $setting('contact.email', 'danovaagency@gmail.com');
    $danovaWhatsappNumber = $setting('contact.whatsapp', '6281234567890');
    $danovaWhatsappNumberDigits = preg_replace('/\D+/', '', (string) $danovaWhatsappNumber);
    @endphp

    <!-- HEADER / NAVIGATION -->
    <header id="header"
        class="fixed top-0 left-0 right-0 z-[1000] bg-white/85 backdrop-blur-md border-b border-light-gray/70 transition-all duration-300 h-20 lg:h-24 flex items-center">
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center w-full">
            <a href="/" class="flex items-center gap-3 text-2xl font-bold apple-spring">
                @if ($setting('branding.header_logo'))
                <img src="{{ asset('storage/' . $setting('branding.header_logo')) }}" alt="Danova"
                    class="h-7 lg:h-8" />
                @else
                <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white font-bold shadow-md shadow-primary/25">
                    D
                </div>
                <span class="tracking-tight text-slate-900 font-bold">Danova</span>
                @endif
            </a>

            <nav class="hidden lg:flex items-center gap-9 text-base font-medium text-slate-600">
                <a href="#about" class="hover:text-primary transition-colors py-1">Tentang Kami</a>
                <a href="#services" class="hover:text-primary transition-colors py-1">Layanan</a>
                <a href="#pricing" class="hover:text-primary transition-colors py-1">Harga</a>
                <a href="#work" class="hover:text-primary transition-colors py-1">Hasil Kerja</a>
                <a href="#faq" class="hover:text-primary transition-colors py-1">FAQ</a>
                <a href="#contact" class="hover:text-primary transition-colors py-1">Kontak</a>
            </nav>

            <div class="hidden lg:block">
                <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                    class="apple-spring bg-whatsapp text-white px-7 py-3.5 rounded-full font-semibold text-sm flex items-center gap-2.5 shadow-lg shadow-green-500/20 hover:bg-whatsapp-dark">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    <span>Tanya via WhatsApp</span>
                </a>
            </div>

            <button class="mobile-menu-toggle lg:hidden p-2.5 border border-light-gray rounded-xl text-slate-700 hover:bg-slate-50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </header>

    <main id="content" class="pt-24 lg:pt-28">

        <!-- HERO SECTION -->
        <section class="relative py-16 lg:py-24 overflow-hidden bg-white">
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl -z-10 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-[450px] h-[450px] bg-secondary/10 rounded-full blur-3xl -z-10 pointer-events-none"></div>

            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">

                    <!-- Hero Text Content -->
                    <div class="lg:col-span-7 text-center lg:text-left hero-text-col">
                        <div class="hero-badge inline-flex items-center gap-2.5 bg-blue-50/80 border border-blue-200/60 px-4 py-2 rounded-full mb-6 shadow-sm">
                            <span class="relative flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary"></span>
                            </span>
                            <span class="text-sm font-semibold text-primary">Partner Pembuatan Website Bisnis #1</span>
                        </div>

                        <h1 class="hero-title text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.2] lg:leading-[1.18] mb-6 tracking-tight text-slate-900">
                            Punya Bisnis Tapi <br>
                            <span class="text-primary font-bold">Belum Ada di Google?</span>
                        </h1>

                        <p class="hero-lead text-slate-600 text-base sm:text-lg lg:text-xl mb-10 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
                            Jangan biarkan calon pembeli beralih ke kompetitor. Hadirkan <span class="text-slate-900 font-semibold border-b-2 border-secondary/50 pb-0.5">Website Profesional</span> yang responsif, terpercaya, dan siap menghasilkan lebih banyak prospek setiap hari.
                        </p>

                        <div class="hero-cta flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-12">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20mau%20tanya%20buat%20website%20bisnis"
                                class="apple-spring bg-primary text-white px-8 py-4 rounded-2xl font-semibold text-base hover:bg-primary-dark shadow-xl shadow-blue-500/25 flex items-center justify-center gap-3">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                <span>Konsultasi Gratis</span>
                            </a>
                            <a href="#work"
                                class="apple-spring bg-white text-slate-800 border-2 border-slate-200 px-8 py-4 rounded-2xl font-semibold text-base hover:border-primary hover:text-primary text-center">
                                Lihat Contoh Website
                            </a>
                        </div>

                        <div class="hero-features flex flex-wrap justify-center lg:justify-start gap-x-8 gap-y-3">
                            <div class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">✓</span>
                                <span class="text-sm font-medium text-slate-600">Responsif di Semua Layar HP</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">✓</span>
                                <span class="text-sm font-medium text-slate-600">SEO & Cepat Muncul di Google</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">✓</span>
                                <span class="text-sm font-medium text-slate-600">Admin Dashboard Mudah Digunakan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Visual / Mockup -->
                    <div class="lg:col-span-5 relative hero-visual-col">
                        <div class="hero-mockup relative bg-slate-900 p-3.5 rounded-[2.5rem] shadow-2xl shadow-slate-900/20 border-4 border-slate-800/40">
                            <div class="bg-white rounded-[2rem] overflow-hidden aspect-[4/3] lg:aspect-square relative">
                                <img src="{{ $setting('hero.main_image') ? asset('storage/' . $setting('hero.main_image')) : 'https://images.unsplash.com/photo-1556742044-3c52d6e88c62?auto=format&fit=crop&q=80' }}"
                                    alt="Contoh Website Bisnis Profesional" class="w-full h-full object-cover">

                                <!-- Floating Bouncy Notification Badge -->
                                <div class="floating-badge absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-slate-100 shadow-blue-500/10">
                                    <div class="flex items-center gap-3.5">
                                        <div class="w-11 h-11 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 shrink-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wide">
                                                Orderan Masuk!
                                            </div>
                                            <div class="text-sm font-semibold text-slate-900">
                                                Website bantu penjualan 24/7 otomatis
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Secondary Mobile Frame -->
                        <div class="hero-mobile-frame absolute -bottom-8 -right-4 lg:-right-8 w-36 lg:w-48 bg-slate-900 p-2 rounded-[2rem] shadow-2xl hidden sm:block border-4 border-white transform rotate-3">
                            <div class="bg-slate-50 rounded-[1.6rem] overflow-hidden aspect-[9/16]">
                                <img src="{{ $setting('hero.mobile_image') ? asset('storage/' . $setting('hero.mobile_image')) : 'https://images.unsplash.com/photo-1512428559083-a401c338e45e?auto=format&fit=crop&q=80' }}"
                                    alt="Tampilan Mobile" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SERVICES SECTION -->
        <section id="services" class="py-20 lg:py-28 bg-slate-50/50">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center max-w-2xl mx-auto mb-16 section-header">
                    <span class="inline-block px-4 py-1.5 mb-3 bg-primary/10 text-primary rounded-full text-xs font-semibold uppercase tracking-wider">
                        Solusi Lengkap
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 tracking-tight">Layanan Unggulan Kami</h2>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed">Pilihan tepat dan praktis untuk mempercepat pertumbuhan bisnis Anda di era digital.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @php
                    $services = [
                    [
                    'Website Profil Bisnis',
                    'Membangun citra kredibel dan profesional di mata calon pembeli dengan struktur informasi yang rapi.',
                    'bg-white',
                    'border-blue-100',
                    'text-primary',
                    ],
                    [
                    'Landing Page Penjualan',
                    'Halaman khusus promosi produk dengan copywriting terarah untuk mengonversi pengunjung menjadi pembeli.',
                    'bg-white',
                    'border-amber-100',
                    'text-secondary',
                    ],
                    [
                    'Sistem Visual & Branding',
                    'Desain logo, warna, dan identitas visual yang serasi agar brand Anda mudah diingat pelanggan setia.',
                    'bg-white',
                    'border-slate-200',
                    'text-slate-700',
                    ],
                    ];
                    @endphp

                    @foreach ($services as $s)
                    <article class="service-card apple-card-hover p-8 lg:p-10 rounded-3xl {{ $s[2] }} border {{ $s[3] }} shadow-sm hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center mb-6 shadow-sm border border-slate-100 group-hover:scale-110 group-hover:bg-blue-50 transition-all">
                            @if ($loop->index == 0)
                            <svg class="w-7 h-7 {{ $s[4] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            @elseif($loop->index == 1)
                            <svg class="w-7 h-7 {{ $s[4] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            @else
                            <svg class="w-7 h-7 {{ $s[4] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-3">
                                </path>
                            </svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $s[0] }}</h3>
                        <p class="text-slate-600 text-base leading-relaxed">{{ $s[1] }}</p>
                    </article>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- BRIEF BUILDER SECTION -->
        <section id="brief" class="py-20 lg:py-28 bg-white relative overflow-hidden">
            <div class="container mx-auto px-6 lg:px-12 relative z-10">
                <div class="max-w-2xl mx-auto text-center mb-14 section-header">
                    <span class="inline-block px-4 py-1.5 mb-3 bg-primary/10 text-primary rounded-full text-xs font-semibold uppercase tracking-wider">
                        Kalkulator Cepat
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 tracking-tight">
                        Konsultasi & <span class="text-primary">Estimasi Biaya</span>
                    </h2>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed">
                        Isi form singkat ini untuk mendapatkan penawaran yang tepat dan sesuai budget bisnis Anda.
                    </p>
                </div>

                <div class="max-w-3xl mx-auto bg-white rounded-3xl border border-slate-200/80 shadow-xl shadow-slate-100 p-8 lg:p-12"
                    id="briefBuilder" data-whatsapp-url="{{ route('out.whatsapp') }}"
                    data-email-url="{{ route('out.email') }}">

                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Langkah Konsultasi</span>
                                <h4 id="briefStepLabel" class="text-lg font-bold text-slate-900">Langkah 1 dari 2</h4>
                            </div>
                            <span class="text-xs font-medium text-slate-500">Praktis & Cepat</span>
                        </div>

                        <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
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
                                <span class="w-8 h-8 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-sm font-bold">1</span>
                                Apa jenis website yang ingin Anda buat?
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                @foreach (['Website Toko / UMKM', 'Landing Page Promosi', 'Website Profil Bisnis', 'Portfolio & CV Online', 'Perbarui Website Lama', 'Kebutuhan Kustom Lainnya'] as $opt)
                                <label
                                    class="apple-spring group relative flex items-center gap-4 p-4 rounded-2xl border border-slate-200 cursor-pointer hover:border-primary hover:bg-blue-50/20">
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
                                <span class="w-8 h-8 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-sm font-bold">2</span>
                                Informasi Kontak Anda
                            </h3>
                            <div class="space-y-5">
                                <div>
                                    <label class="text-sm font-semibold text-slate-700 mb-2 block">Nama atau Nama Usaha <span class="text-red-500">*</span></label>
                                    <input type="text" name="brand" placeholder="Contoh: Toko Berkah / Budi Santoso"
                                        class="w-full p-4 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-primary focus:bg-white transition-all text-base font-normal text-slate-800"
                                        required>
                                </div>
                                <div>
                                    <label class="text-sm font-semibold text-slate-700 mb-2 block">Catatan atau Keinginan Khusus</label>
                                    <textarea name="notes" rows="3" placeholder="Ceritakan fitur atau ide yang Anda inginkan..."
                                        class="w-full p-4 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-primary focus:bg-white transition-all text-base font-normal text-slate-800"></textarea>
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
                            class="apple-spring px-8 py-3.5 bg-primary text-white rounded-2xl font-semibold text-base hover:bg-primary-dark transition-all shadow-lg shadow-blue-500/20">
                            Lanjut
                        </button>
                    </div>

                    <div id="briefResult" class="hidden mt-6 pt-6 border-t border-slate-100">
                        <div class="bg-blue-50/60 rounded-2xl p-6 border border-blue-100">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-emerald-500 text-white rounded-full flex items-center justify-center text-sm font-bold">✓</div>
                                <h3 class="font-bold text-slate-900 text-lg">Brief Konsultasi Siap Dikirim!</h3>
                            </div>
                            <pre id="briefSummary" class="text-sm text-slate-700 font-sans whitespace-pre-wrap leading-relaxed mb-6 bg-white p-4 rounded-xl border border-blue-100/70"></pre>

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

        <!-- PRICING SECTION -->
        <section id="pricing" class="py-20 lg:py-28 bg-slate-50/70 relative">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-2xl mx-auto section-header">
                    <span class="inline-block px-4 py-1.5 mb-3 bg-primary/10 text-primary rounded-full text-xs font-semibold uppercase tracking-wider">
                        Investasi Transparan
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 tracking-tight">
                        Pilih Paket <span class="text-primary">Sesuai Kebutuhan</span>
                    </h2>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed">
                        Harga terjangkau dengan hasil berkualitas tinggi untuk kemajuan bisnis Anda.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-8 items-stretch max-w-7xl mx-auto">
                    @forelse ($pricingPlans as $plan)
                    <article
                        class="pricing-card relative flex flex-col justify-between apple-card-hover rounded-3xl p-8 lg:p-10 transition-all 
                        {{ $plan->is_featured
                            ? 'bg-slate-900 text-white shadow-2xl shadow-slate-900/25 ring-2 ring-primary relative z-20'
                            : 'bg-white text-slate-900 border border-slate-200/80 shadow-md hover:shadow-xl' }}">

                        @if ($plan->is_featured)
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary text-white text-xs font-semibold px-5 py-1.5 rounded-full shadow-lg shadow-primary/30 uppercase tracking-wider">
                            Paling Diminati
                        </div>
                        @endif

                        <div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold mb-1.5 {{ $plan->is_featured ? 'text-white' : 'text-slate-900' }}">
                                    {{ $plan->name }}
                                </h3>
                                <p class="text-sm font-normal leading-relaxed {{ $plan->is_featured ? 'text-slate-400' : 'text-slate-500' }}">
                                    {{ $plan->subtitle }}
                                </p>
                            </div>

                            <div class="mb-8 pb-6 border-b {{ $plan->is_featured ? 'border-slate-800' : 'border-slate-100' }}">
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
                                    <div class="shrink-0 w-5 h-5 rounded-full flex items-center justify-center mt-0.5 {{ $plan->is_featured ? 'bg-primary/20 text-primary' : 'bg-blue-50 text-primary' }}">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                            <path d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="font-normal {{ $plan->is_featured ? 'text-slate-300' : 'text-slate-600' }}">
                                        {{ $feature }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20tertarik%20tanya%20Paket%20{{ urlencode($plan->name) }}"
                            class="apple-spring block w-full py-4 rounded-2xl font-semibold text-center text-base transition-all
                            {{ $plan->is_featured
                                ? 'bg-primary text-white hover:bg-primary-dark shadow-lg shadow-primary/20'
                                : 'bg-slate-900 text-white hover:bg-primary shadow-sm' }}">
                            {{ $plan->cta_label ?? 'Pilih Paket Ini' }}
                        </a>
                    </article>
                    @empty
                    @endforelse
                </div>

                <div class="mt-16 text-center">
                    <div class="inline-flex flex-col sm:flex-row items-center gap-4 p-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm">
                        <p class="text-base font-medium text-slate-700">
                            Butuh fitur custom atau kebutuhan khusus?
                        </p>
                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                            class="apple-spring px-6 py-2.5 bg-primary/10 text-primary rounded-xl text-sm font-semibold hover:bg-primary hover:text-white transition-all">
                            Konsultasi Custom →
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- PORTFOLIO / WORK SECTION -->
        <section id="work" class="py-20 lg:py-28 bg-white">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="mb-14 text-center lg:text-left section-header">
                    <span class="inline-block px-4 py-1.5 mb-3 bg-primary/10 text-primary rounded-full text-xs font-semibold uppercase tracking-wider">
                        Portofolio Pilihan
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-3 tracking-tight">Hasil Karya Kami</h2>
                    <p class="text-slate-600 text-base lg:text-lg">Koleksi project website yang telah kami bantu kembangkan untuk klien.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($projects as $project)
                    @php
                    $workImage = $project->hero_image
                    ? asset('storage/' . $project->hero_image)
                    : $project->hero_image_url ?? '';
                    @endphp
                    <a href="{{ route('work.detail', $project->slug) }}"
                        class="work-card apple-card-hover group block bg-white p-5 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-primary/40 transition-all">
                        <div class="aspect-video bg-slate-100 rounded-2xl mb-5 overflow-hidden relative border border-slate-100 shadow-inner">
                            <img src="{{ $workImage }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-xs">
                                <span class="apple-spring bg-white text-primary px-5 py-2.5 rounded-full font-semibold text-sm shadow-md">
                                    Lihat Detail
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
                    <div class="col-span-3 text-center p-16 bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl text-slate-500 font-medium">
                        Portofolio sedang diperbarui.
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section id="faq" class="py-20 lg:py-28 bg-slate-50/50">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-14 max-w-2xl mx-auto section-header">
                    <span class="inline-block px-4 py-1.5 mb-3 bg-primary/10 text-primary rounded-full text-xs font-semibold uppercase tracking-wider">
                        Bantuan & Tanya Jawab
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 tracking-tight">
                        Pertanyaan yang <span class="text-primary">Sering Diajukan</span>
                    </h2>
                </div>

                <div class="max-w-3xl mx-auto space-y-4">
                    @forelse ($faqs as $faq)
                    <div class="faq-item bg-white border border-slate-200 rounded-2xl transition-all shadow-sm hover:border-primary/50 overflow-hidden">
                        <button type="button"
                            class="faq-question w-full flex justify-between items-center p-6 text-left font-semibold text-slate-800 text-base lg:text-lg focus:outline-none">
                            <span class="pr-6">{{ $faq->question }}</span>
                            <span class="faq-icon w-8 h-8 rounded-full bg-slate-100 text-primary flex items-center justify-center shrink-0 text-xl font-bold transition-transform">
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
                <div class="cta-banner bg-slate-900 rounded-[2.5rem] lg:rounded-[3rem] p-10 lg:p-20 text-center text-white relative overflow-hidden shadow-2xl shadow-slate-900/20">
                    <div class="relative z-10 max-w-3xl mx-auto">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-6 leading-tight tracking-tight">
                            Siap Membuat Bisnis Anda <br class="hidden sm:inline"> Terlihat Jauh Lebih Profesional?
                        </h2>
                        <p class="text-slate-300 text-base lg:text-lg mb-10 max-w-2xl mx-auto leading-relaxed font-normal">
                            Konsultasikan kebutuhan Anda sekarang secara gratis. Tim Danova siap membantu merancang website terbaik yang siap melipatgandakan kepercayaan pelanggan.
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
                                class="apple-spring border border-white/30 text-white px-9 py-4 rounded-2xl font-semibold text-base hover:bg-white/10 flex items-center justify-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Kirim Email</span>
                            </a>
                        </div>
                    </div>
                    <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/25 rounded-full blur-[90px] pointer-events-none"></div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="py-14 border-t border-slate-200 bg-white">
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
                        Partner kreatif untuk pembuatan website dan identitas visual bisnis. Solusi praktis, elegan, dan berorientasi hasil.
                    </p>
                    <p class="text-xs text-slate-400 font-medium">© {{ date('Y') }} Danova Digital. Hak cipta dilindungi.</p>
                </div>
                <div class="flex flex-wrap gap-x-10 gap-y-4 text-base font-medium text-slate-600">
                    <a href="#about" class="hover:text-primary transition-colors">Tentang</a>
                    <a href="#services" class="hover:text-primary transition-colors">Layanan</a>
                    <a href="#pricing" class="hover:text-primary transition-colors">Harga</a>
                    <a href="#work" class="hover:text-primary transition-colors">Portofolio</a>
                    <a href="#faq" class="hover:text-primary transition-colors">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- GSAP ANIMATION & INTERACTION SCRIPT -->
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
                .from('.hero-features > div', {
                    y: 15,
                    opacity: 0,
                    stagger: 0.1,
                    duration: 0.5,
                    ease: "power2.out"
                }, "-=0.3")
                .from('.hero-mockup', {
                    scale: 0.9,
                    y: 40,
                    opacity: 0,
                    duration: 0.9,
                    ease: "back.out(1.4)"
                }, "-=0.9")
                .from('.hero-mobile-frame', {
                    scale: 0.8,
                    rotation: -10,
                    y: 30,
                    opacity: 0,
                    duration: 0.8,
                    ease: "back.out(1.7)"
                }, "-=0.6");

            // 3. Continuous gentle floating animation on the "Orderan Masuk" notification badge
            gsap.to('.floating-badge', {
                y: -9,
                duration: 2.2,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });

            // 4. ScrollTrigger section header animations
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

            // 5. Staggered Service Cards with Apple-like spring entrance
            gsap.from('.service-card', {
                scrollTrigger: {
                    trigger: '#services',
                    start: "top 78%",
                    toggleActions: "play none none none"
                },
                y: 45,
                scale: 0.94,
                opacity: 0,
                stagger: 0.14,
                duration: 0.75,
                ease: "back.out(1.4)"
            });

            // 6. Staggered Pricing Cards
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

            // 8. CTA Banner spring scale
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

            // 9. Interactive Apple Bouncy Spring on Buttons (.apple-spring)
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

            // 10. FAQ Accordion with GSAP spring animations
            document.querySelectorAll('.faq-item').forEach(item => {
                const questionBtn = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer-inner');
                const icon = item.querySelector('.faq-icon');

                questionBtn.addEventListener('click', () => {
                    const isOpen = item.classList.contains('is-open');

                    // Close any other open items
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

            // 11. Brief Builder Wizard Logic
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

            // 12. Mobile Menu Toggle
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
                    nav.classList.toggle('border-light-gray');
                    nav.classList.toggle('z-[1000]');
                });
            }
        });
    </script>
</body>

</html>
