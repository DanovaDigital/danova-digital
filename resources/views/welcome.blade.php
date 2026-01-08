<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="{{ asset('images/DanovaFavicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/DanovaFavicon.png') }}" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />

    <title>Danova — Kreasi Tanpa Batas</title>
    <meta name="description" content="Danova — Kreasi Tanpa Batas. Premium visual-first web design & development." />

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Danova" />
    <meta property="og:title" content="Danova — Kreasi Tanpa Batas" />
    <meta property="og:description"
        content="Danova — Kreasi Tanpa Batas. Premium visual-first web design & development." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/DanovaBlue.png') }}" />
    <meta name="twitter:card" content="summary_large_image" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2F6FED',
                        dark: '#1A1A1A',
                        'medium-gray': '#444444',
                        'light-gray': '#EFEFEF',
                        'bg-gray': '#FAFAFA',
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

        /* Floating Animation */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
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
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center">
            <a href="/" class="flex items-center gap-3 text-2xl font-bold">
                @if ($setting('branding.header_logo'))
                    <img src="{{ asset('storage/' . $setting('branding.header_logo')) }}" alt="Danova"
                        class="h-6 lg:h-7" />
                @else
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">D</div>
                    <span>Danova</span>
                @endif
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-medium-gray">
                <a href="#about" class="hover:text-primary transition-colors">About</a>
                <a href="#services" class="hover:text-primary transition-colors">Services</a>
                <a href="#pricing" class="hover:text-primary transition-colors">Pricing</a>
                <a href="#work" class="hover:text-primary transition-colors">Work</a>
                <a href="#contact" class="hover:text-primary transition-colors">Contact</a>
            </nav>

            <div class="hidden lg:block">
                <a href="#contact"
                    class="bg-primary text-white px-7 py-3 rounded-full font-semibold text-sm hover:bg-blue-700 shadow-lg shadow-blue-500/20 transition-all">Start
                    a Project</a>
            </div>

            <button class="mobile-menu-toggle lg:hidden p-2 border border-light-gray rounded-xl"
                aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </header>

    <main id="content" class="pt-24">
        <section class="py-12 lg:py-24 relative overflow-hidden">
            <div class="container mx-auto px-6 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="text-center lg:text-left">
                        <div
                            class="inline-flex items-center gap-3 bg-white border border-light-gray px-4 py-2 rounded-full shadow-sm mb-8 animate-in">
                            <div class="flex -space-x-3">
                                @php
                                    $avatar1 = $setting('hero.badge_avatar1')
                                        ? asset('storage/' . $setting('hero.badge_avatar1'))
                                        : '/images/avatar-1.svg';
                                    $avatar2 = $setting('hero.badge_avatar2')
                                        ? asset('storage/' . $setting('hero.badge_avatar2'))
                                        : '/images/avatar-2.svg';
                                    $avatar3 = $setting('hero.badge_avatar3')
                                        ? asset('storage/' . $setting('hero.badge_avatar3'))
                                        : '/images/avatar-3.svg';
                                @endphp
                                <img src="{{ $avatar1 }}"
                                    class="w-8 h-8 rounded-full border-2 border-white bg-gray-100" />
                                <img src="{{ $avatar2 }}"
                                    class="w-8 h-8 rounded-full border-2 border-white bg-gray-100" />
                                <img src="{{ $avatar3 }}"
                                    class="w-8 h-8 rounded-full border-2 border-white bg-gray-100" />
                            </div>
                            <span class="text-xs font-semibold"><strong>200+</strong> Premium Clients</span>
                        </div>

                        <h1 class="text-4xl lg:text-6xl font-bold leading-[1.1] mb-6 tracking-tight">
                            Life Feels Empty Without <br>
                            <span class="text-primary">Beautiful Design</span>
                        </h1>

                        <p class="text-medium-gray text-base lg:text-lg mb-10 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            We create and design applications, websites, or other digital products with professionalism.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-12">
                            <a href="#contact"
                                class="bg-primary text-white px-8 py-4 rounded-2xl font-bold hover:bg-blue-700 transition-all text-center">Start
                                a Project</a>
                            <a href="#work"
                                class="bg-white text-dark border-2 border-light-gray px-8 py-4 rounded-2xl font-bold hover:border-primary hover:text-primary transition-all text-center">View
                                Work</a>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            <div class="bg-bg-gray p-6 rounded-3xl hover:shadow-md transition-all">
                                <div class="text-[10px] font-bold text-medium-gray uppercase tracking-widest mb-1">
                                    Projects</div>
                                <div class="text-3xl font-black">{{ $setting('stats.projects', '100+') }}</div>
                            </div>
                            <div class="bg-bg-gray p-6 rounded-3xl hover:shadow-md transition-all">
                                <div class="text-[10px] font-bold text-medium-gray uppercase tracking-widest mb-1">Avg.
                                    Rating</div>
                                <div class="text-3xl font-black">{{ $setting('stats.rating', '4.9') }}</div>
                            </div>
                            <div
                                class="bg-bg-gray p-6 rounded-3xl hover:shadow-md transition-all col-span-2 sm:col-span-1">
                                <div class="text-[10px] font-bold text-medium-gray uppercase tracking-widest mb-1">
                                    On-time</div>
                                <div class="text-3xl font-black">{{ $setting('stats.on_time', '95%') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:block">
                        <div
                            class="bg-light-gray p-6 lg:p-10 rounded-[3rem] shadow-xl hover:-translate-y-2 hover:-rotate-1 transition-all duration-500">
                            <div
                                class="bg-bg-gray aspect-video rounded-3xl mb-8 flex items-center justify-center border-2 border-light-gray overflow-hidden">
                                @if ($setting('hero.showcase_logo'))
                                    <img src="{{ asset('storage/' . $setting('hero.showcase_logo')) }}"
                                        class="w-full h-full object-cover" />
                                @else
                                    <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                @endif
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-white p-6 rounded-2xl">
                                    <div class="font-bold text-sm mb-2">UI/UX Design</div>
                                    <div class="text-xs text-medium-gray leading-relaxed">
                                        {{ $setting('hero.feature1_description', 'Interface yang clean, jelas, dan premium.') }}
                                    </div>
                                </div>
                                <div class="bg-white p-6 rounded-2xl">
                                    <div class="font-bold text-sm mb-2">Web Development</div>
                                    <div class="text-xs text-medium-gray leading-relaxed">
                                        {{ $setting('hero.feature2_description', 'Blade SSR + performa yang ringan.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl -z-10 animate-pulse">
            </div>
        </section>

        <section id="about" class="py-24 bg-bg-gray">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                    <div>
                        <h2 class="text-3xl lg:text-5xl font-bold mb-8 leading-tight">
                            We don't just build websites. <br>
                            <span class="text-primary">We craft brand presence.</span>
                        </h2>
                        <p class="text-medium-gray text-lg leading-relaxed">
                            Danova adalah arsitek visual: fokus pada detail, kontras yang tegas, dan struktur yang
                            memandu perhatian—agar brand Anda terlihat lebih kuat.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div
                            class="bg-white p-8 rounded-3xl border-2 border-light-gray hover:border-primary transition-all">
                            <div class="font-bold mb-3">High contrast hierarchy</div>
                            <p class="text-sm text-medium-gray leading-relaxed">Headline kuat, whitespace rapi, fokus
                                terarah.</p>
                        </div>
                        <div
                            class="bg-white p-8 rounded-3xl border-2 border-light-gray hover:border-primary transition-all">
                            <div class="font-bold mb-3">Pixel-perfect details</div>
                            <p class="text-sm text-medium-gray leading-relaxed">Setiap komponen terasa presisi &
                                berkelas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="py-24">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="flex flex-col lg:flex-row justify-between items-end gap-8 mb-16">
                    <div class="max-w-2xl">
                        <h2 class="text-4xl font-bold mb-4">Services that elevate your <span
                                class="text-primary">digital aesthetic</span></h2>
                        <p class="text-medium-gray">Paket layanan yang fokus pada visual, pengalaman, dan hasil.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ([['Website Design', 'Layout premium, tipografi kuat, dan interaksi yang rapi.'], ['Landing Pages', 'Fokus konversi: pesan jelas, CTA tegas, struktur meyakinkan.'], ['Brand Visual System', 'Konsistensi warna, komponen, dan gaya untuk jangka panjang.']] as $service)
                        <article
                            class="p-10 rounded-3xl bg-white shadow-xl hover:-translate-y-2 transition-all relative overflow-hidden group">
                            <div
                                class="absolute top-0 left-0 w-full h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform origin-left">
                            </div>
                            <h3 class="text-2xl font-bold mb-4">{{ $service[0] }}</h3>
                            <p class="text-medium-gray text-sm leading-relaxed">{{ $service[1] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="brief" class="py-24 bg-bg-gray">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4">60 detik untuk <span class="text-primary">brief yang
                            jelas</span></h2>
                    <p class="text-medium-gray">Pilih opsi yang paling dekat lalu kirim ringkasannya ke WhatsApp /
                        Email.</p>
                </div>

                <div class="max-w-4xl mx-auto bg-white rounded-[2.5rem] p-8 lg:p-12 shadow-2xl" id="briefBuilder"
                    data-whatsapp-url="{{ route('out.whatsapp') }}" data-email-url="{{ route('out.email') }}">

                    <div class="mb-12">
                        <div class="flex justify-between items-center mb-4">
                            <span id="briefStepLabel"
                                class="text-sm font-bold text-medium-gray uppercase tracking-widest">Step 1/6</span>
                        </div>
                        <div class="h-2 bg-light-gray rounded-full overflow-hidden">
                            <div class="h-full bg-primary transition-all duration-500" id="briefProgressFill"
                                style="width: 16.6%"></div>
                        </div>
                        <div id="briefError"
                            class="hidden mt-4 p-4 bg-red-50 text-red-500 text-sm rounded-xl border border-red-100">
                        </div>
                    </div>

                    <form id="briefForm" class="min-h-[300px]">
                        <div class="brief-step is-active" data-step="1">
                            <h3 class="text-2xl font-bold mb-8">Kebutuhan utama</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach (['Website bisnis/UMKM', 'Landing page', 'Portfolio pribadi', 'Redesign website', 'Tugas kuliah', 'Lainnya (isi sendiri)'] as $opt)
                                    <label
                                        class="flex items-center gap-4 p-5 rounded-2xl border-2 border-light-gray cursor-pointer hover:border-primary transition-all">
                                        <input type="radio" name="need" value="{{ $opt }}"
                                            class="w-4 h-4 text-primary" required>
                                        <span class="text-sm font-semibold">{{ $opt }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="brief-other mt-4 hidden" data-other-for="need">
                                <input type="text" name="need_other" placeholder="Tuliskan kebutuhan Anda..."
                                    class="w-full p-4 border-2 border-light-gray rounded-2xl outline-none focus:border-primary">
                            </div>
                        </div>

                        <div class="brief-step" data-step="2">
                            <h3 class="text-2xl font-bold mb-8">Tujuan utama</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach (['Cari klien / leads', 'Personal branding', 'Kredibilitas', 'Sales / Pendaftaran', 'Tugas / Presentasi', 'Lainnya'] as $opt)
                                    <label
                                        class="flex items-center gap-4 p-5 rounded-2xl border-2 border-light-gray cursor-pointer hover:border-primary transition-all">
                                        <input type="radio" name="goal" value="{{ $opt }}"
                                            class="w-4 h-4 text-primary" required>
                                        <span class="text-sm font-semibold">{{ $opt }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="brief-step" data-step="3">
                            <h3 class="text-2xl font-bold mb-8">Budget range</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach (['< 1 juta', '1–3 juta', '3–6 juta', 'Belum yakin', 'Lainnya'] as $opt)
                                    <label
                                        class="flex items-center gap-4 p-5 rounded-2xl border-2 border-light-gray cursor-pointer hover:border-primary transition-all">
                                        <input type="radio" name="budget" value="{{ $opt }}"
                                            class="w-4 h-4 text-primary" required>
                                        <span class="text-sm font-semibold">{{ $opt }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="brief-step" data-step="4">
                            <h3 class="text-2xl font-bold mb-8">Timeline target</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach (['< 2 minggu', '3–4 minggu', '1–2 bulan', 'Flexible'] as $opt)
                                    <label
                                        class="flex items-center gap-4 p-5 rounded-2xl border-2 border-light-gray cursor-pointer hover:border-primary transition-all">
                                        <input type="radio" name="timeline" value="{{ $opt }}"
                                            class="w-4 h-4 text-primary" required>
                                        <span class="text-sm font-semibold">{{ $opt }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="brief-step" data-step="5">
                            <h3 class="text-2xl font-bold mb-8">Fitur dibutuhkan (opsional)</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                @foreach (['Portfolio', 'Pricing', 'Form Contact', 'CMS Admin', 'Blog', 'Multi-language'] as $opt)
                                    <label
                                        class="flex items-center gap-4 p-5 rounded-2xl border-2 border-light-gray cursor-pointer hover:border-primary transition-all">
                                        <input type="checkbox" name="features[]" value="{{ $opt }}"
                                            class="w-4 h-4 text-primary rounded">
                                        <span class="text-sm font-semibold">{{ $opt }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="brief-step" data-step="6">
                            <h3 class="text-2xl font-bold mb-8">Detail singkat</h3>
                            <div class="space-y-4">
                                <input type="text" name="brand" placeholder="Nama / Brand / Organisasi"
                                    class="w-full p-5 border-2 border-light-gray rounded-2xl outline-none focus:border-primary"
                                    required>
                                <input type="url" name="url" placeholder="Website / Sosmed (opsional)"
                                    class="w-full p-5 border-2 border-light-gray rounded-2xl outline-none focus:border-primary">
                                <textarea name="notes" rows="4" placeholder="Catatan tambahan..."
                                    class="w-full p-5 border-2 border-light-gray rounded-2xl outline-none focus:border-primary"></textarea>
                            </div>
                        </div>
                    </form>

                    <div class="flex justify-between items-center mt-12" id="briefActions">
                        <button type="button" id="briefBack"
                            class="px-8 py-4 border-2 border-light-gray rounded-2xl font-bold hover:bg-bg-gray disabled:opacity-30 disabled:pointer-events-none transition-all">Back</button>
                        <button type="button" id="briefNext"
                            class="px-10 py-4 bg-primary text-white rounded-2xl font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/20">Next</button>
                    </div>

                    <div id="briefResult" class="hidden mt-12 pt-12 border-t-2 border-light-gray">
                        <h3 class="text-2xl font-bold mb-6">Ringkasan Brief</h3>
                        <pre id="briefSummary"
                            class="bg-bg-gray p-6 rounded-3xl border-2 border-light-gray text-sm text-dark font-sans whitespace-pre-wrap leading-relaxed mb-8"></pre>
                        <div class="flex flex-wrap gap-4">
                            <button id="briefEdit"
                                class="px-6 py-4 border-2 border-light-gray rounded-2xl font-bold">Edit</button>
                            <button id="briefCopy"
                                class="px-6 py-4 border-2 border-light-gray rounded-2xl font-bold">Copy</button>
                            <a id="briefSendWhatsapp" href="#" target="_blank"
                                class="px-8 py-4 bg-green-500 text-white rounded-2xl font-bold hover:bg-green-600 transition-all flex-1 text-center">Send
                                WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="pricing" class="py-24">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4">Transparent pricing for <span class="text-primary">premium
                            results</span></h2>
                    <p class="text-medium-gray">Pilih paket yang sesuai kebutuhan. Harga final menyesuaikan scope.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($pricingPlans as $plan)
                        <article
                            class="p-10 rounded-[2.5rem] border-2 {{ $plan->is_featured ? 'bg-primary text-white border-primary scale-105 shadow-2xl' : 'bg-white border-light-gray' }} transition-all hover:-translate-y-2">
                            <div class="text-xl font-bold mb-2">{{ $plan->name }}</div>
                            <div class="text-4xl font-black mb-1">{{ $plan->price }}</div>
                            <div class="text-xs opacity-70 mb-8">{{ $plan->subtitle }}</div>
                            <ul class="space-y-4 mb-10">
                                @foreach ($plan->features ?? [] as $feature)
                                    <li class="flex items-start gap-3 text-sm">
                                        <span class="font-bold">✓</span> {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                            <a href="#contact"
                                class="block w-full py-4 rounded-2xl font-bold text-center transition-all {{ $plan->is_featured ? 'bg-white text-primary' : 'bg-primary text-white' }}">Choose
                                {{ $plan->name }}</a>
                        </article>
                    @empty
                        <div
                            class="col-span-3 text-center p-12 bg-bg-gray border-2 border-dashed rounded-3xl text-medium-gray">
                            Pricing plan belum tersedia.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="work" class="py-24 bg-bg-gray">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="mb-16">
                    <h2 class="text-4xl font-bold mb-4">Visual Excellence <span class="text-primary">In Every
                            Pixel</span></h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($projects as $project)
                        @php
                            $workImage = $project->hero_image
                                ? asset('storage/' . $project->hero_image)
                                : $project->hero_image_url ?? '';
                        @endphp
                        <a href="{{ route('work.detail', $project->slug) }}"
                            class="group block bg-white p-4 rounded-[2rem] hover:shadow-2xl transition-all">
                            <div class="aspect-video bg-gray-100 rounded-2xl mb-6 overflow-hidden relative">
                                <img src="{{ $workImage }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                <div
                                    class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="bg-white text-primary px-6 py-2 rounded-full font-bold">View
                                        Detail</span>
                                </div>
                            </div>
                            <div class="px-2 pb-2">
                                <div class="font-bold text-lg group-hover:text-primary transition-colors">
                                    {{ $project->title }}</div>
                                <div class="text-sm text-medium-gray">{{ $project->subtitle }}</div>
                            </div>
                        </a>
                    @empty
                        <div
                            class="col-span-3 text-center p-20 bg-white border-2 border-dashed rounded-[3rem] text-medium-gray">
                            Portfolio masih kosong.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="faq" class="py-24">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold">Frequently Asked <span class="text-primary">Questions</span></h2>
                </div>
                <div class="max-w-3xl mx-auto space-y-4">
                    @forelse ($faqs as $faq)
                        <div
                            class="faq-item border-2 border-light-gray rounded-3xl transition-all hover:border-primary overflow-hidden">
                            <button
                                class="faq-question w-full flex justify-between items-center p-6 text-left font-bold">
                                <span>{{ $faq->question }}</span>
                                <span class="faq-icon text-2xl text-primary transition-transform">+</span>
                            </button>
                            <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
                                <div class="px-6 text-medium-gray text-sm leading-relaxed">{{ $faq->answer }}</div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-medium-gray">FAQ belum tersedia.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="contact" class="py-24 px-6">
            <div class="container mx-auto">
                <div class="bg-dark rounded-[3rem] p-12 lg:p-24 text-center text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h2 class="text-4xl lg:text-6xl font-black mb-8">Ready to craft masterpiece?</h2>
                        <p class="text-white/70 text-lg mb-12 max-w-2xl mx-auto">Ceritakan tujuan brand Anda—Danova
                            akan bantu merancang estetika digital yang kuat dan premium.</p>
                        <div class="flex flex-col sm:flex-row gap-6 justify-center">
                            <a href="https://wa.me/{{ $danovaWhatsappNumberDigits }}"
                                class="bg-white text-dark px-10 py-5 rounded-2xl font-bold hover:scale-105 transition-all">WhatsApp
                                Kami</a>
                            <a href="mailto:{{ $danovaGmail }}"
                                class="border-2 border-white/20 px-10 py-5 rounded-2xl font-bold hover:bg-white/10 transition-all">Email
                                Danova</a>
                        </div>
                    </div>
                    <div class="absolute top-0 right-0 w-96 h-96 bg-primary/20 rounded-full blur-[120px] -z-0"></div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-12 border-t border-light-gray">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div>
                    <div class="text-2xl font-bold mb-4">Danova</div>
                    <p class="text-sm text-medium-gray">© {{ date('Y') }} Danova — Kreasi Tanpa Batas</p>
                </div>
                <div class="flex gap-8 text-sm font-semibold">
                    <a href="#about" class="hover:text-primary">About</a>
                    <a href="#services" class="hover:text-primary">Services</a>
                    <a href="#pricing" class="hover:text-primary">Pricing</a>
                    <a href="#work" class="hover:text-primary">Work</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Header Scroll
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
                stepLabel.textContent = `Step ${currentStep}/${totalSteps}`;
                backBtn.disabled = currentStep === 1;
                nextBtn.textContent = currentStep === totalSteps ? 'Generate' : 'Next';
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
                    error.textContent = 'Mohon lengkapi pilihan Anda.';
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
                let summary = "Brief Builder — Danova\n\n";
                summary += `Brand: ${formData.get('brand')}\n`;
                summary += `Kebutuhan: ${formData.get('need')}\n`;
                summary += `Tujuan: ${formData.get('goal')}\n`;
                summary += `Budget: ${formData.get('budget')}\n`;
                summary += `Timeline: ${formData.get('timeline')}\n`;

                const features = formData.getAll('features[]');
                summary += `Fitur: ${features.length ? features.join(', ') : '-'}\n`;
                summary += `Catatan: ${formData.get('notes') || '-'}`;

                summaryBox.textContent = summary;
                form.classList.add('hidden');
                document.getElementById('briefActions').classList.add('hidden');
                resultSection.classList.remove('hidden');

                // Update Links
                const waUrl = root.dataset.whatsappUrl + "?message=" + encodeURIComponent(summary);
                document.getElementById('briefSendWhatsapp').href = waUrl;
            }

            document.getElementById('briefEdit').addEventListener('click', () => {
                resultSection.classList.add('hidden');
                form.classList.remove('hidden');
                document.getElementById('briefActions').classList.remove('hidden');
            });

            document.getElementById('briefCopy').addEventListener('click', function() {
                navigator.clipboard.writeText(summaryBox.textContent);
                this.textContent = 'Copied!';
                setTimeout(() => this.textContent = 'Copy', 2000);
            });
        })();
    </script>
</body>

</html>
