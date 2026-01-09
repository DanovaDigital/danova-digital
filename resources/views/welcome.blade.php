<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="{{ asset('images/DanovaFavicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/DanovaFavicon.png') }}" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />

    <title>Danova — Jasa Pembuatan Website UMKM Profesional</title>
    <meta name="description"
        content="Bikin bisnis UMKM Anda naik kelas dengan website profesional. Tampilan mewah, harga ramah, proses cepat." />

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2F6FED', // Biru Profesional
                        secondary: '#F59E0B', // Orange/Amber Hangat (Aksen Baru)
                        dark: '#1A1A1A',
                        'medium-gray': '#444444',
                        'light-gray': '#EFEFEF',
                        'bg-gray': '#FAFAFA',
                        'whatsapp': '#25D366',
                    },
                    fontFamily: {
                        lexend: ['Lexend', 'sans-serif'],
                    },
                    borderRadius: {
                        '4xl': '2rem',
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Utility for JS Effects */
        .reveal section {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal section.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            padding-bottom: 1.5rem;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .brief-step {
            display: none;
        }

        .brief-step.is-active {
            display: block;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="font-lexend bg-white text-dark antialiased overflow-x-hidden">
    @php
        $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

        $danovaGmail = $setting('contact.email', 'danovaagency@gmail.com');
        $danovaWhatsappNumber = $setting('contact.whatsapp', '6281234567890');
        $danovaWhatsappNumberDigits = preg_replace('/\D+/', '', (string) $danovaWhatsappNumber);
    @endphp

    <header id="header"
        class="fixed top-0 left-0 right-0 z-[1000] bg-white/80 backdrop-blur-md border-b border-light-gray transition-all duration-300 h-20 lg:h-24 flex items-center">
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center w-full">
            <a href="/" class="flex items-center gap-3 text-2xl font-bold">
                @if ($setting('branding.header_logo'))
                    <img src="{{ asset('storage/' . $setting('branding.header_logo')) }}" alt="Danova"
                        class="h-6 lg:h-7" />
                @else
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white font-black">
                        D</div>
                    <span class="tracking-tight">Danova</span>
                @endif
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-medium-gray">
                <a href="#about" class="hover:text-primary transition-colors">Tentang Kami</a>
                <a href="#services" class="hover:text-primary transition-colors">Layanan</a>
                <a href="#pricing" class="hover:text-primary transition-colors">Harga</a>
                <a href="#work" class="hover:text-primary transition-colors">Hasil Kerja</a>
                <a href="#contact" class="hover:text-primary transition-colors">Kontak</a>
            </nav>

            <div class="hidden lg:block">
                <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                    class="bg-whatsapp text-white px-7 py-3 rounded-full font-semibold text-sm hover:scale-105 transition-all flex items-center gap-2 shadow-lg shadow-green-500/20">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    Tanya via WA
                </a>
            </div>

            <button class="mobile-menu-toggle lg:hidden p-2 border border-light-gray rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </header>

    <main id="content" class="pt-24">
        <section class="relative py-12 lg:py-24 overflow-hidden bg-white">
            <div
                class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl -z-10">
            </div>
            <div
                class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-[400px] h-[400px] bg-secondary/10 rounded-full blur-3xl -z-10">
            </div>

            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                    <div class="lg:col-span-7 text-center lg:text-left">
                        <div
                            class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 px-4 py-2 rounded-full mb-6">
                            <span class="relative flex h-3 w-3">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                            </span>
                            <span class="text-xs font-black text-primary uppercase tracking-wider">Solusi Website UMKM
                                #1</span>
                        </div>

                        <h1 class="text-4xl lg:text-6xl font-black leading-[1.1] mb-6 tracking-tight text-dark">
                            Punya Bisnis Tapi <br>
                            <span class="text-primary italic text-5xl lg:text-7xl">Belum Ada di Google?</span>
                        </h1>

                        <p
                            class="text-medium-gray text-lg lg:text-xl mb-10 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-medium">
                            Jangan biarkan pelanggan sulit menemukan Anda. Bikin <span
                                class="text-dark font-bold border-b-4 border-secondary/40">Website Profesional</span>
                            yang bikin usaha Anda terlihat bonafid, terpercaya, dan siap banjir orderan!
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-10">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20mau%20tanya%20buat%20website%20bisnis"
                                class="bg-primary text-white px-10 py-5 rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/30 flex items-center justify-center gap-3">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                Konsultasi Gratis
                            </a>
                            <a href="#work"
                                class="bg-white text-dark border-2 border-light-gray px-10 py-5 rounded-2xl font-black text-sm uppercase tracking-widest hover:border-primary hover:text-primary transition-all text-center">
                                Lihat Contoh Website
                            </a>
                        </div>

                        <div class="flex flex-wrap justify-center lg:justify-start gap-x-8 gap-y-4">
                            <div class="flex items-center gap-2">
                                <span class="text-secondary text-xl">✔</span>
                                <span class="text-xs font-bold text-medium-gray uppercase tracking-tighter">Bisa Diakses
                                    HP</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-secondary text-xl">✔</span>
                                <span class="text-xs font-bold text-medium-gray uppercase tracking-tighter">Muncul di
                                    Google</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-secondary text-xl">✔</span>
                                <span class="text-xs font-bold text-medium-gray uppercase tracking-tighter">Admin
                                    Gampang</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5 relative group">
                        <div
                            class="relative bg-dark p-3 rounded-[2.5rem] shadow-2xl transition-transform duration-700 group-hover:rotate-1">
                            <div class="bg-white rounded-[2rem] overflow-hidden aspect-[3/4] lg:aspect-square relative">
                                <img src="{{ $setting('hero.main_image') ? asset('storage/' . $setting('hero.main_image')) : 'https://images.unsplash.com/photo-1556742044-3c52d6e88c62?auto=format&fit=crop&q=80' }}"
                                    alt="Contoh Website Bisnis Profesional" class="w-full h-full object-cover">

                                <div
                                    class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-light-gray animate-bounce shadow-blue-500/10">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div
                                                class="text-[10px] font-black text-medium-gray uppercase tracking-widest">
                                                Orderan Masuk!</div>
                                            <div class="text-sm font-bold text-dark">Website bantu jualan 24 jam</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="absolute -bottom-10 -right-6 lg:-right-12 w-32 lg:w-48 bg-dark p-2 rounded-[2rem] shadow-2xl hidden sm:block border-4 border-white transform rotate-6 transition-transform group-hover:rotate-0 duration-500">
                            <div class="bg-bg-gray rounded-[1.8rem] overflow-hidden aspect-[9/16]">
                                <img src="https://images.unsplash.com/photo-1512428559083-a401c338e45e?auto=format&fit=crop&q=80"
                                    alt="Tampilan Mobile" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="services" class="py-24 bg-white">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-4">Layanan Unggulan Kami</h2>
                    <p class="text-medium-gray">Solusi tepat untuk bantu kembangkan usaha Anda di dunia digital.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @php
                        $services = [
                            [
                                'Website Profil Bisnis',
                                'Bikin bisnis Anda terlihat bonafid dan profesional di mata calon pembeli.',
                                'bg-blue-50',
                            ],
                            [
                                'Landing Page Jualan',
                                'Halaman khusus promosi produk dengan fokus bikin pelanggan langsung beli.',
                                'bg-orange-50',
                            ],
                            [
                                'Sistem Visual Brand',
                                'Bikin logo dan identitas warna brand agar pelanggan selalu ingat bisnis Anda.',
                                'bg-gray-50',
                            ],
                        ];
                    @endphp

                    @foreach ($services as $s)
                        <article
                            class="p-10 rounded-[2.5rem] {{ $s[2] }} border border-transparent hover:border-primary transition-all group">
                            <div
                                class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                                @if ($loop->index == 0)
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                @elseif($loop->index == 1)
                                    <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                @else
                                    <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-3">
                                        </path>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold mb-4">{{ $s[0] }}</h3>
                            <p class="text-medium-gray text-sm leading-relaxed">{{ $s[1] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="brief" class="py-24 bg-white relative overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full opacity-40 pointer-events-none">
                <div class="absolute top-10 left-10 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-96 h-96 bg-secondary/5 rounded-full blur-3xl"></div>
            </div>

            <div class="container mx-auto px-6 lg:px-12 relative z-10">
                <div class="max-w-2xl mx-auto text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-black mb-4 tracking-tight">
                        Konsultasi & <span class="text-primary italic">Estimasi Biaya</span>
                    </h2>
                    <p class="text-medium-gray font-medium">
                        Bingung soal biaya? Isi form 60 detik ini untuk dapatkan penawaran yang pas buat budget bisnis
                        Anda.
                    </p>
                </div>

                <div class="max-w-3xl mx-auto bg-white rounded-[2rem] border border-slate-100 shadow-sm p-6 lg:p-10"
                    id="briefBuilder" data-whatsapp-url="{{ route('out.whatsapp') }}"
                    data-email-url="{{ route('out.email') }}">

                    <div class="mb-10">
                        <div class="flex justify-between items-end mb-3">
                            <div>
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Progress
                                    Kerja</span>
                                <h4 id="briefStepLabel" class="text-lg font-bold text-dark">Langkah 1/6</h4>
                            </div>
                            <span class="text-[11px] font-bold text-medium-gray/60 italic">Hampir Selesai...</span>
                        </div>
                        <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-primary transition-all duration-700 ease-out" id="briefProgressFill"
                                style="width: 16.6%"></div>
                        </div>

                        <div id="briefError"
                            class="hidden mt-4 p-4 bg-red-50 text-red-600 text-xs font-bold rounded-xl border border-red-100 animate-pulse">
                        </div>
                    </div>

                    <form id="briefForm" class="min-h-[320px]">
                        <div class="brief-step is-active animate-in" data-step="1">
                            <h3 class="text-xl font-bold mb-6 text-dark flex items-center gap-2">
                                <span
                                    class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center text-sm">01</span>
                                Apa yang ingin Anda buat?
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach (['Website Toko / UMKM', 'Landing Page Promosi', 'Website Portfolio', 'Update Website Lama', 'Keperluan Tugas/Project', 'Lainnya'] as $opt)
                                    <label
                                        class="group relative flex items-center gap-4 p-4 rounded-2xl border border-slate-200 cursor-pointer hover:border-primary hover:bg-blue-50/30 transition-all active:scale-[0.98]">
                                        <input type="radio" name="need" value="{{ $opt }}"
                                            class="peer hidden" required>
                                        <div
                                            class="w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-primary peer-checked:bg-primary flex items-center justify-center transition-all">
                                            <div
                                                class="w-2 h-2 bg-white rounded-full scale-0 peer-checked:scale-100 transition-transform">
                                            </div>
                                        </div>
                                        <span
                                            class="text-sm font-bold text-slate-600 peer-checked:text-primary transition-colors">{{ $opt }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="brief-step" data-step="6">
                            <h3 class="text-xl font-bold mb-6 text-dark flex items-center gap-2">
                                <span
                                    class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center text-sm">06</span>
                                Informasi Kontak Anda
                            </h3>
                            <div class="space-y-4">
                                <div class="group">
                                    <label
                                        class="text-[10px] font-black text-slate-400 mb-2 block uppercase tracking-widest group-focus-within:text-primary transition-colors">Nama
                                        / Nama Usaha</label>
                                    <input type="text" name="brand"
                                        placeholder="Contoh: Toko Berkah / Bapak Budi"
                                        class="w-full p-4 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-primary focus:bg-white transition-all text-sm font-medium"
                                        required>
                                </div>
                                <div class="group">
                                    <label
                                        class="text-[10px] font-black text-slate-400 mb-2 block uppercase tracking-widest group-focus-within:text-primary transition-colors">Catatan
                                        Khusus</label>
                                    <textarea name="notes" rows="3" placeholder="Ceritakan singkat keinginan Anda..."
                                        class="w-full p-4 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-primary focus:bg-white transition-all text-sm font-medium"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="flex justify-between items-center mt-10" id="briefActions">
                        <button type="button" id="briefBack"
                            class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-dark disabled:opacity-0 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali
                        </button>
                        <button type="button" id="briefNext"
                            class="px-10 py-4 bg-dark text-white rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-primary transition-all active:scale-95 shadow-lg shadow-dark/5">
                            Lanjut
                        </button>
                    </div>

                    <div id="briefResult" class="hidden mt-8 pt-8 border-t border-slate-100 animate-in">
                        <div class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100/50">
                            <div class="flex items-center gap-3 mb-4">
                                <div
                                    class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center text-xs">
                                    ✓</div>
                                <h3 class="font-bold text-dark">Brief Anda Telah Siap!</h3>
                            </div>
                            <pre id="briefSummary" class="text-[13px] text-slate-600 font-sans whitespace-pre-wrap leading-relaxed mb-6 italic"></pre>

                            <div class="flex flex-col sm:flex-row gap-3">
                                <button id="briefEdit"
                                    class="px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400 hover:text-dark transition-all">Ubah
                                    Data</button>
                                <a id="briefSendWhatsapp" href="#" target="_blank"
                                    class="px-8 py-4 bg-whatsapp text-white rounded-xl font-black text-xs uppercase tracking-widest text-center flex-1 flex items-center justify-center gap-3 hover:bg-green-600 transition-all shadow-xl shadow-green-500/10">
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

        <section id="pricing" class="py-24 bg-bg-gray">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16 max-w-2xl mx-auto">
                    <div
                        class="inline-block px-4 py-1.5 mb-4 bg-primary/10 text-primary rounded-full text-[10px] font-black uppercase tracking-[0.2em]">
                        Daftar Harga Layanan
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4 tracking-tight italic">
                        Pilih Paket <span class="text-primary">Sesuai Budget</span>
                    </h2>
                    <p class="text-medium-gray text-lg italic font-medium">
                        Investasi terbaik untuk bikin bisnis Anda terlihat lebih profesional.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch max-w-6xl mx-auto">
                    @forelse ($pricingPlans as $plan)
                        <article
                            class="relative p-10 rounded-[3.5rem] transition-all duration-500 hover:-translate-y-4 shadow-2xl flex flex-col
                {{ $plan->is_featured
                    ? 'bg-gradient-to-br from-primary to-blue-900 text-white scale-110 z-20 shadow-blue-500/40 border-0 py-16'
                    : 'bg-white text-dark border-2 border-light-gray z-10' }}">

                            @if ($plan->is_featured)
                                <div
                                    class="absolute -top-5 left-1/2 -translate-x-1/2 bg-secondary text-white text-[10px] font-black uppercase px-6 py-2 rounded-full tracking-[0.2em] shadow-xl animate-bounce">
                                    Paling Banyak Dipilih
                                </div>
                            @endif

                            <div class="text-center mb-10">
                                <div
                                    class="text-sm font-bold mb-2 uppercase tracking-[0.2em] {{ $plan->is_featured ? 'text-white/70' : 'text-medium-gray' }}">
                                    {{ $plan->name }}
                                </div>

                                <div class="flex flex-col items-center">
                                    <span
                                        class="text-[10px] font-bold uppercase tracking-widest mb-1 {{ $plan->is_featured ? 'text-secondary' : 'text-primary' }}">
                                        Mulai Dari
                                    </span>
                                    <div class="flex items-start justify-center gap-1">
                                        <span class="text-xl font-black mt-1">Rp</span>
                                        <span
                                            class="text-5xl lg:text-6xl font-black tracking-tighter italic leading-none">
                                            {{ $plan->price }}
                                        </span>
                                    </div>
                                </div>

                                <div class="text-[10px] mt-4 font-medium italic opacity-70">
                                    {{ $plan->subtitle }}
                                </div>
                            </div>

                            <div class="space-y-4 mb-12 flex-grow">
                                @foreach ($plan->features ?? [] as $feature)
                                    <div class="flex items-start gap-4 text-sm font-semibold leading-snug">
                                        <div
                                            class="flex-shrink-0 w-5 h-5 rounded-full flex items-center justify-center mt-0.5
                            {{ $plan->is_featured ? 'bg-secondary text-white' : 'bg-primary text-white' }}">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" stroke-width="4">
                                                <path d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <span
                                            class="{{ $plan->is_featured ? 'text-white/90' : 'text-dark/80' }}">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}?text=Halo%20Danova,%20saya%20tertarik%20tanya%20Paket%20{{ urlencode($plan->name) }}"
                                class="block w-full py-5 rounded-2xl font-black text-center transition-all uppercase text-xs tracking-[0.2em]
                   {{ $plan->is_featured
                       ? 'bg-white text-primary hover:bg-secondary hover:text-white shadow-lg'
                       : 'bg-dark text-white hover:bg-primary shadow-md' }}">
                                Ambil Paket Ini
                            </a>
                        </article>
                    @empty
                        <div
                            class="col-span-3 text-center p-12 bg-white border-2 border-dashed rounded-[3rem] text-medium-gray font-bold italic">
                            Paket harga sedang disiapkan. Silakan hubungi kami langsung.
                        </div>
                    @endforelse
                </div>

                <div class="mt-20 text-center">
                    <p class="text-xs text-medium-gray font-bold uppercase tracking-[0.2em]">
                        Ingin paket custom?
                        <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                            class="text-primary hover:text-secondary transition-colors ml-2 underline decoration-2 underline-offset-4">Konsultasi
                            Sekarang →</a>
                    </p>
                </div>
            </div>
        </section>

        <section id="work" class="py-24 bg-bg-gray">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="mb-16 text-center lg:text-left">
                    <h2 class="text-4xl font-bold mb-4 italic">Hasil Kerja Kami</h2>
                    <p class="text-medium-gray">Kumpulan project website yang telah kami bantu kembangkan.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($projects as $project)
                        @php
                            $workImage = $project->hero_image
                                ? asset('storage/' . $project->hero_image)
                                : $project->hero_image_url ?? '';
                        @endphp
                        <a href="{{ route('work.detail', $project->slug) }}"
                            class="group block bg-white p-4 rounded-[2.5rem] hover:shadow-2xl transition-all border border-light-gray">
                            <div
                                class="aspect-video bg-gray-100 rounded-3xl mb-6 overflow-hidden relative border border-light-gray shadow-inner">
                                <img src="{{ $workImage }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                <div
                                    class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span
                                        class="bg-white text-primary px-6 py-2 rounded-full font-bold text-xs uppercase tracking-widest">Detail
                                        Project</span>
                                </div>
                            </div>
                            <div class="px-3 pb-3">
                                <div class="font-bold text-lg group-hover:text-primary transition-colors mb-1">
                                    {{ $project->title }}</div>
                                <div class="text-[11px] text-medium-gray font-bold uppercase tracking-wider">
                                    {{ $project->subtitle }}</div>
                            </div>
                        </a>
                    @empty
                        <div
                            class="col-span-3 text-center p-20 bg-white border-2 border-dashed rounded-[3rem] text-medium-gray">
                            Belum ada portfolio yang ditampilkan.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="faq" class="py-24 bg-white">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold">Pertanyaan <span class="text-primary italic">Sering
                            Muncul</span></h2>
                </div>
                <div class="max-w-3xl mx-auto space-y-4">
                    @forelse ($faqs as $faq)
                        <div
                            class="faq-item border-2 border-light-gray rounded-3xl transition-all hover:border-primary overflow-hidden">
                            <button
                                class="faq-question w-full flex justify-between items-center p-6 text-left font-bold">
                                <span class="pr-8">{{ $faq->question }}</span>
                                <span class="faq-icon text-2xl text-primary transition-transform">+</span>
                            </button>
                            <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
                                <div class="px-6 text-medium-gray text-sm leading-relaxed">{{ $faq->answer }}</div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-medium-gray">FAQ sedang diperbarui.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="contact" class="py-24 px-6 bg-white">
            <div class="container mx-auto">
                <div
                    class="bg-dark rounded-[4rem] p-12 lg:p-24 text-center text-white relative overflow-hidden shadow-2xl">
                    <div class="relative z-10">
                        <h2 class="text-4xl lg:text-6xl font-black mb-8 leading-tight italic">Siap Bikin Bisnis <br>
                            Jadi Lebih Profesional?</h2>
                        <p class="text-white/60 text-lg mb-12 max-w-2xl mx-auto">Konsultasikan kebutuhan Anda
                            sekarang—Gratis. Tim Danova siap bantu kembangkan potensi digital bisnis Anda.</p>
                        <div class="flex flex-col sm:flex-row gap-6 justify-center">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                                class="bg-whatsapp text-white px-10 py-5 rounded-2xl font-bold hover:scale-105 transition-all shadow-xl shadow-green-500/20 flex items-center justify-center gap-3">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                Tanya Tim via WA
                            </a>
                            <a href="mailto:{{ $danovaGmail }}"
                                class="border-2 border-white/20 px-10 py-5 rounded-2xl font-bold hover:bg-white/10 transition-all flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Kirim Email
                            </a>
                        </div>
                    </div>
                    <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/20 rounded-full blur-[100px] -z-0">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-16 border-t border-light-gray bg-white">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 justify-between items-center gap-12">
                <div>
                    <div class="text-2xl font-bold mb-4 flex items-center gap-3">
                        @if (!empty($siteSettings['header_logo']))
                            <img src="{{ asset('storage/' . $siteSettings['header_logo']) }}" alt="Danova"
                                style="max-height: 24px; display: block;" />
                        @else
                            <span>Danova</span>
                        @endif
                    </div>
                    <p class="text-sm text-medium-gray max-w-sm mb-6">Creative partner untuk web & visual system
                        premium. Detail, hierarchy, dan craftsmanship yang terasa.</p>
                    <p class="text-[10px] text-medium-gray font-bold uppercase tracking-widest">© {{ date('Y') }}
                        Danova Digital — Kreasi Tanpa Batas</p>
                </div>
                <div class="flex flex-wrap gap-x-12 gap-y-6 text-sm font-bold uppercase tracking-wider text-dark">
                    <a href="#about" class="hover:text-primary">Tentang</a>
                    <a href="#services" class="hover:text-primary">Layanan</a>
                    <a href="#pricing" class="hover:text-primary">Harga</a>
                    <a href="#work" class="hover:text-primary">Portfolio</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Header Scroll Effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            header.classList.toggle('scrolled', window.scrollY > 50);
        });

        // FAQ Accordion
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const item = button.parentElement;
                const isActive = item.classList.contains('active');
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
                if (!isActive) item.classList.add('active');
            });
        });

        // Reveal Animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, {
            threshold: 0.1
        });
        document.querySelectorAll('section').forEach(s => observer.observe(s));

        // Brief Builder Wizard
        (function() {
            const root = document.getElementById('briefBuilder');
            if (!root) return;

            let currentStep = 1;
            const totalSteps = 6;
            const form = document.getElementById('briefForm');
            const progressFill = document.getElementById('briefProgressFill');
            const stepLabel = document.getElementById('briefStepLabel');
            const nextBtn = document.getElementById('briefNext');
            const backBtn = document.getElementById('briefBack');
            const resultSection = document.getElementById('briefResult');
            const summaryBox = document.getElementById('briefSummary');

            function updateUI() {
                document.querySelectorAll('.brief-step').forEach(step => {
                    step.classList.toggle('is-active', parseInt(step.dataset.step) === currentStep);
                });
                progressFill.style.width = `${(currentStep / totalSteps) * 100}%`;
                stepLabel.textContent = `Progress ${currentStep}/${totalSteps}`;
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
                    error.textContent = 'Mohon lengkapi pilihan di atas dulu ya!';
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
                let summary = "*Brief Konsultasi Website — Danova Digital*\n\n";
                summary += `*Nama Klien:* ${formData.get('brand')}\n`;
                summary += `*Kebutuhan:* ${formData.get('need')}\n`;
                summary += `*Tujuan Utama:* ${formData.get('goal')}\n`;
                summary += `*Target Budget:* ${formData.get('budget')}\n`;
                summary += `*Target Timeline:* ${formData.get('timeline')}\n`;

                const features = formData.getAll('features[]');
                summary += `*Fitur Pendukung:* ${features.length ? features.join(', ') : '-'}\n`;
                summary += `*Catatan Tambahan:* ${formData.get('notes') || '-'}`;

                summaryBox.textContent = summary;
                form.classList.add('hidden');
                document.getElementById('briefActions').classList.add('hidden');
                resultSection.classList.remove('hidden');

                const waUrl = root.dataset.whatsappUrl + "?context=brief_builder&message=" + encodeURIComponent(
                    summary);
                document.getElementById('briefSendWhatsapp').href = waUrl;
            }

            document.getElementById('briefEdit').addEventListener('click', () => {
                resultSection.classList.add('hidden');
                form.classList.remove('hidden');
                document.getElementById('briefActions').classList.remove('hidden');
            });
        })();

        // Mobile Menu Toggle logic
        document.querySelector('.mobile-menu-toggle').addEventListener('click', () => {
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
    </script>
</body>

</html>
