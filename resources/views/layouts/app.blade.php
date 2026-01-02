<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="{{ asset('images/DanovaFavicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/DanovaFavicon.png') }}" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />

    <title>@yield('title', 'Danova — Kreasi Tanpa Batas')</title>
    <meta name="description" content="@yield('description', 'Danova — Kreasi Tanpa Batas. Premium visual-first web design & development.')" />

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Danova" />
    <meta property="og:title" content="@yield('title', 'Danova — Kreasi Tanpa Batas')" />
    <meta property="og:description" content="@yield('description', 'Danova — Kreasi Tanpa Batas. Premium visual-first web design & development.')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/DanovaBlue.png') }}" />
    <meta property="og:locale" content="id_ID" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', 'Danova — Kreasi Tanpa Batas')" />
    <meta name="twitter:description" content="@yield('description', 'Danova — Kreasi Tanpa Batas. Premium visual-first web design & development.')" />
    <meta name="twitter:image" content="{{ asset('images/DanovaBlue.png') }}" />

    <script type="application/ld+json">
        @php
        echo json_encode([
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => rtrim(config('app.url'), '/').
                    '/#organization',
                    'name' => 'Danova',
                    'url' => rtrim(config('app.url'), '/'),
                    'logo' => asset('images/DanovaFavicon.png'),
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => rtrim(config('app.url'), '/').
                    '/#website',
                    'url' => rtrim(config('app.url'), '/'),
                    'name' => 'Danova',
                    'publisher' => ['@id' => rtrim(config('app.url'), '/').
                        '/#organization'
                    ],
                ],
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        @endphp
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Colors */
            --primary: #2F6FED;
            --black: #1A1A1A;
            --dark-gray: #2A2A2A;
            --medium-gray: #444444;
            --light-gray: #EFEFEF;
            --bg-gray: #FAFAFA;
            --white: #FFFFFF;

            /* Typography */
            --font-family: 'Lexend', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;

            /* Font Sizes */
            --font-h1: 56px;
            --font-h2: 40px;
            --font-h3: 24px;
            --font-body: 16px;
            --font-small: 14px;
            --font-tiny: 12px;

            /* Font Weights */
            --weight-h1: 600;
            --weight-h2: 500;
            --weight-h3: 500;
            --weight-body: 400;

            /* Line Heights */
            --lh-h1: 1.1;
            --lh-h2: 1.2;
            --lh-h3: 1.3;
            --lh-body: 1.6;
            --lh-small: 1.6;
            --lh-tiny: 1.5;

            /* Spacing */
            --space-xs: 8px;
            --space-sm: 12px;
            --space-md: 16px;
            --space-lg: 24px;
            --space-xl: 32px;
            --space-2xl: 48px;
            --space-3xl: 64px;
            --space-4xl: 80px;

            /* Border Radius */
            --radius-xs: 6px;
            --radius-sm: 12px;
            --radius-md: 16px;
            --radius-lg: 20px;
            --radius-xl: 24px;
            --radius-full: 50%;

            /* Shadows */
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 2px 6px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 4px 12px rgba(0, 0, 0, 0.08);

            /* Container */
            --container-max-width: 1440px;
            --container-padding-h: 48px;
            --container-padding-v: 80px;

            /* Grid */
            --grid-columns: 12;
            --grid-gap: 24px;

            /* Button */
            --button-padding: 12px 24px;
            --button-radius: var(--radius-lg);
            --button-font-size: 14px;
            --button-font-weight: 500;

            /* Card */
            --card-padding: 32px;
            --card-radius: 16px;
            --card-border: 1px solid #E8E8E8;

            /* Icon Container */
            --icon-size: 48px;
            --icon-radius: 12px;

            /* Avatar */
            --avatar-size: 48px;

            /* Section Spacing */
            --section-spacing: 80px;
            --section-spacing-within: 48px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-family);
            background: var(--white);
            color: var(--black);
            font-size: var(--font-body);
            font-weight: var(--weight-body);
            line-height: var(--lh-body);
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 88px;
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
        }

        .container {
            max-width: var(--container-max-width);
            margin: 0 auto;
            padding: 0 var(--container-padding-h);
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 var(--space-lg);
            }
        }

        /* Enhanced Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--light-gray);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: var(--shadow-md);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 5.5rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-family: var(--font-family);
            font-size: var(--font-h3);
            font-weight: var(--weight-h1);
            color: var(--black);
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            width: var(--icon-size);
            height: var(--icon-size);
            background: linear-gradient(135deg, var(--primary), #5A8FFF);
            border-radius: var(--icon-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 900;
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        nav {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        nav a {
            color: var(--dark-gray);
            text-decoration: none;
            font-weight: var(--weight-h3);
            font-size: var(--font-small);
            position: relative;
            transition: color 0.3s ease;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        nav a:hover {
            color: var(--primary);
        }

        nav a:hover::after {
            width: 100%;
        }

        .cta-button {
            padding: var(--button-padding);
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: var(--button-radius);
            font-weight: var(--button-font-weight);
            font-size: var(--button-font-size);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(47, 111, 237, 0.25);
        }

        .cta-button:hover {
            background: #1E5BD9;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(47, 111, 237, 0.35);
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: 1px solid var(--light-gray);
            padding: var(--space-xs);
            border-radius: var(--radius-sm);
            cursor: pointer;
        }

        @media (max-width: 768px) {
            nav {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .header-actions {
                display: none;
            }
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--light-gray);
            padding: var(--space-3xl) 0 var(--space-xl);
            background: var(--white);
        }

        .footer-top {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: var(--space-2xl);
            padding-bottom: var(--space-2xl);
            border-bottom: 1px solid var(--light-gray);
            margin-bottom: var(--space-xl);
        }

        @media (max-width: 968px) {
            .footer-top {
                grid-template-columns: 1fr;
            }
        }

        .footer-brand {
            max-width: 448px;
        }

        .footer-logo {
            display: inline-flex;
            align-items: center;
            gap: var(--space-sm);
            font-family: var(--font-family);
            font-size: var(--font-h3);
            font-weight: var(--weight-h1);
            color: var(--black);
            text-decoration: none;
            margin-bottom: var(--space-md);
        }

        .footer-desc {
            font-size: var(--font-small);
            color: var(--medium-gray);
            line-height: var(--lh-small);
            margin-bottom: var(--space-lg);
        }

        .footer-heading {
            font-size: var(--font-small);
            font-weight: var(--weight-h1);
            color: var(--dark-gray);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: var(--space-md);
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: var(--space-sm);
        }

        .footer-links a {
            text-decoration: none;
            color: var(--medium-gray);
            font-size: var(--font-small);
            font-weight: var(--weight-h3);
            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
        }

        @media (max-width: 768px) {
            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        .footer-text {
            font-size: var(--font-small);
            color: var(--medium-gray);
        }

        .footer-tagline {
            font-size: var(--font-small);
            color: var(--dark-gray);
            font-weight: var(--weight-h3);
        }

        /* Accessibility */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        *:focus-visible {
            outline: 3px solid var(--primary);
            outline-offset: 2px;
        }
    </style>

    @yield('styles')
</head>

<body>
    @php
    $danovaGmail = 'danovaagency@gmail.com';
    $danovaGmailSubject = 'Project Inquiry — Danova';
    $danovaGmailBody = "Hi Danova Team,\n\nNama:\nBrand/Usaha:\nWebsite/Sosmed:\nLayanan yang dibutuhkan: (Website / Landing Page / Brand System)\nBudget range:\nTimeline:\nTujuan:\n\nThanks,\n";
    $danovaGmailHref = 'https://mail.google.com/mail/?view=cm&fs=1&to=' . rawurlencode($danovaGmail)
    . '&su=' . rawurlencode($danovaGmailSubject)
    . '&body=' . rawurlencode($danovaGmailBody);
    @endphp

    <a href="#content" class="sr-only">Skip to content</a>

    <header id="header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo">
                    @if(!empty($siteSettings['header_logo']))
                    <img src="{{ asset('storage/' . $siteSettings['header_logo']) }}" alt="Danova" style="max-height: 24px; display: block;" />
                    @else
                    <span>Danova</span>
                    @endif
                </a>

                <nav class="nav-desktop">
                    <a href="/#about">About</a>
                    <a href="/#services">Services</a>
                    <a href="/#pricing">Pricing</a>
                    <a href="/#work">Work</a>
                    <a href="/#testimonials">Testimonials</a>
                    <a href="/#contact">Contact</a>
                </nav>

                <div class="header-actions">
                    <a href="/#contact" class="cta-button">Start a Project</a>
                </div>

                <button class="mobile-menu-toggle" aria-label="Toggle menu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="footer-brand">
                    <a href="/" class="footer-logo">
                        <span class="logo-icon" aria-hidden="true">D</span>
                        <span>Danova</span>
                    </a>
                    <p class="footer-desc">
                        Danova adalah creative partner untuk web & visual system premium. Detail, hierarchy, dan craftsmanship yang terasa.
                    </p>
                </div>

                <div>
                    <div class="footer-heading">Quick Links</div>
                    <ul class="footer-links">
                        <li><a href="/#about">About</a></li>
                        <li><a href="/#services">Services</a></li>
                        <li><a href="/#pricing">Pricing</a></li>
                        <li><a href="/#work">Work</a></li>
                    </ul>
                </div>

                <div>
                    <div class="footer-heading">Services</div>
                    <ul class="footer-links">
                        <li><a href="/#services">Website Design</a></li>
                        <li><a href="/#services">Landing Pages</a></li>
                        <li><a href="/#services">Brand Visual System</a></li>
                    </ul>
                </div>

                <div>
                    <div class="footer-heading">Contact</div>
                    <ul class="footer-links">
                        <li><a href="{{ $danovaGmailHref }}" target="_blank" rel="noreferrer noopener">Email (Gmail)</a></li>
                        <li><a href="/#contact">Start a Project</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="footer-text">© {{ date('Y') }} Danova — Kreasi Tanpa Batas</p>
                <p class="footer-tagline">Representasi dari estetika digital</p>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll effect (smooth + cheap)
        const header = document.getElementById('header');
        let scrollTicking = false;

        const updateHeaderOnScroll = () => {
            const y = window.scrollY || window.pageYOffset || 0;
            if (header) {
                header.classList.toggle('scrolled', y > 100);
            }
            scrollTicking = false;
        };

        window.addEventListener('scroll', () => {
            if (scrollTicking) return;
            scrollTicking = true;
            window.requestAnimationFrame(updateHeaderOnScroll);
        }, {
            passive: true
        });

        updateHeaderOnScroll();

        @yield('scripts')
    </script>
</body>

</html>