<!DOCTYPE html>
<html lang="id">

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
    <meta property="og:description" content="Danova — Kreasi Tanpa Batas. Premium visual-first web design & development." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/DanovaBlue.png') }}" />
    <meta property="og:locale" content="id_ID" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Danova — Kreasi Tanpa Batas" />
    <meta name="twitter:description" content="Danova — Kreasi Tanpa Batas. Premium visual-first web design & development." />
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

    <script>
        // Enables scroll-reveal styles only when JS is available.
        document.documentElement.classList.add('reveal');
    </script>

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
            --weight-body: 300;

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

        /* Scroll reveal (JS-enhanced, no flicker) */
        .reveal .service-card,
        .reveal .work-card,
        .reveal .testimonial-card,
        .reveal .pricing-card,
        .reveal .process-step,
        .reveal .faq-item,
        .reveal .brief-card {
            opacity: 0;
            transform: translateY(18px);
            will-change: opacity, transform;
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal section.animate-in .service-card,
        .reveal section.animate-in .work-card,
        .reveal section.animate-in .testimonial-card,
        .reveal section.animate-in .pricing-card,
        .reveal section.animate-in .process-step,
        .reveal section.animate-in .faq-item,
        .reveal section.animate-in .brief-card {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal section.animate-in .service-card:nth-child(1) {
            transition-delay: 0.06s;
        }

        .reveal section.animate-in .service-card:nth-child(2) {
            transition-delay: 0.12s;
        }

        .reveal section.animate-in .service-card:nth-child(3) {
            transition-delay: 0.18s;
        }

        .reveal section.animate-in .work-card:nth-child(1) {
            transition-delay: 0.06s;
        }

        .reveal section.animate-in .work-card:nth-child(2) {
            transition-delay: 0.12s;
        }

        .reveal section.animate-in .work-card:nth-child(3) {
            transition-delay: 0.18s;
        }

        .reveal section.animate-in .testimonial-card:nth-child(1) {
            transition-delay: 0.06s;
        }

        .reveal section.animate-in .testimonial-card:nth-child(2) {
            transition-delay: 0.12s;
        }

        .reveal section.animate-in .testimonial-card:nth-child(3) {
            transition-delay: 0.18s;
        }

        .reveal section.animate-in .pricing-card:nth-child(1) {
            transition-delay: 0.06s;
        }

        .reveal section.animate-in .pricing-card:nth-child(2) {
            transition-delay: 0.12s;
        }

        .reveal section.animate-in .pricing-card:nth-child(3) {
            transition-delay: 0.18s;
        }

        .reveal section.animate-in .process-step:nth-child(1) {
            transition-delay: 0.04s;
        }

        .reveal section.animate-in .process-step:nth-child(2) {
            transition-delay: 0.08s;
        }

        .reveal section.animate-in .process-step:nth-child(3) {
            transition-delay: 0.12s;
        }

        .reveal section.animate-in .process-step:nth-child(4) {
            transition-delay: 0.16s;
        }

        .reveal section.animate-in .process-step:nth-child(5) {
            transition-delay: 0.20s;
        }

        .reveal section.animate-in .process-step:nth-child(6) {
            transition-delay: 0.24s;
        }

        .reveal section.animate-in .faq-item {
            transition-delay: 0.04s;
        }

        @media (prefers-reduced-motion: reduce) {

            .reveal .service-card,
            .reveal .work-card,
            .reveal .testimonial-card,
            .reveal .pricing-card,
            .reveal .process-step,
            .reveal .faq-item,
            .reveal .brief-card {
                opacity: 1;
                transform: none;
                transition: none;
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

        /* Hero Section - Enhanced */
        .hero {
            padding: calc(var(--space-4xl) * 2) 0 var(--space-4xl);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 150%;
            background: radial-gradient(circle, rgba(47, 111, 237, 0.05) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            50% {
                transform: translate(-30px, 30px) rotate(5deg);
            }
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-3xl);
            align-items: center;
            position: relative;
            z-index: 1;
        }

        @media (max-width: 968px) {
            .hero {
                padding: var(--space-4xl) 0 var(--space-2xl);
            }

            .hero-grid {
                grid-template-columns: 1fr;
                gap: var(--space-2xl);
            }
        }

        .hero-content {
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-xs) var(--space-md) var(--space-xs) var(--space-sm);
            background: var(--white);
            border: 1px solid var(--light-gray);
            border-radius: 100px;
            box-shadow: var(--shadow-sm);
            margin-bottom: var(--space-lg);
            animation: fadeInUp 0.6s ease-out 0.2s backwards;
        }

        .badge-avatars {
            display: flex;
            align-items: center;
            width: 60px;
        }

        .badge-avatars img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid var(--white);
            object-fit: cover;
            margin-left: -12px;
            background: var(--light-gray);
        }

        .badge-avatars img:first-child {
            margin-left: 0;
        }

        .badge-text {
            font-family: var(--font-family);
            font-size: var(--font-small);
            font-weight: var(--weight-h3);
            line-height: 1;
            letter-spacing: 0;
            color: var(--dark-gray);
            white-space: nowrap;
        }

        .badge-text strong {
            font-weight: var(--weight-h2);
        }

        .hero h1 {
            font-family: var(--font-family);
            font-size: var(--font-h1);
            font-weight: var(--weight-h1);
            line-height: var(--lh-h1);
            margin-bottom: var(--space-lg);
            letter-spacing: -0.02em;
            animation: fadeInUp 1s ease-out 0.4s backwards;
        }

        .hero-line {
            display: block;
        }

        .hero h1 .highlight {
            color: var(--primary);
            position: relative;
            display: inline-block;
        }

        .hero h1 .highlight::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            left: 0;
            right: 0;
            height: 0.5rem;
            background: linear-gradient(90deg, transparent, rgba(47, 111, 237, 0.2), transparent);
            z-index: -1;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
        }

        .hero p {
            font-size: var(--font-body);
            color: var(--medium-gray);
            line-height: var(--lh-body);
            margin-bottom: var(--space-xl);
            max-width: 600px;
            animation: fadeInUp 1s ease-out 0.6s backwards;
        }

        @media (max-width: 768px) {
            .badge-avatars {
                width: 52px;
            }

            .badge-avatars img {
                width: 24px;
                height: 24px;
                margin-left: -10px;
            }

            .badge-text {
                font-size: 0.75rem;
            }
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
            animation: fadeInUp 1s ease-out 0.8s backwards;
        }

        @media (max-width: 768px) {
            .hero-actions {
                flex-direction: column;
            }
        }

        .button-primary {
            padding: var(--space-md) var(--space-xl);
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: var(--button-radius);
            font-weight: var(--weight-h2);
            font-size: var(--font-body);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 20px 60px rgba(47, 111, 237, 0.15);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .button-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .button-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .button-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 70px rgba(47, 111, 237, 0.25);
        }

        .button-secondary {
            padding: var(--space-md) var(--space-xl);
            background: white;
            color: var(--black);
            text-decoration: none;
            border-radius: var(--button-radius);
            font-weight: var(--weight-h2);
            font-size: var(--font-body);
            border: 2px solid var(--light-gray);
            transition: all 0.3s ease;
            text-align: center;
        }

        .button-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            animation: fadeInUp 1s ease-out 1s backwards;
        }

        .stat-card {
            background: var(--bg-gray);
            padding: var(--space-lg);
            border-radius: var(--card-radius);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .stat-label {
            font-size: var(--font-tiny);
            font-weight: var(--weight-h3);
            color: var(--medium-gray);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: var(--space-xs);
        }

        .stat-value {
            font-family: var(--font-family);
            font-size: var(--font-h2);
            font-weight: 900;
            color: var(--black);
        }

        /* Hero Visual */
        .hero-visual {
            position: relative;
            animation: fadeIn 1.2s ease-out 0.5s backwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .showcase-card {
            background: var(--light-gray);
            padding: 2rem;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-card);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .showcase-card:hover {
            transform: translateY(-8px) rotate(-1deg);
            box-shadow: var(--shadow-lg);
        }

        .showcase-image {
            width: 100%;
            height: 18rem;
            background: var(--bg-gray);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
            border: 2px solid var(--light-gray);
        }

        .showcase-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }



        .feature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }

        .feature-box {
            background: white;
            padding: 1.5rem;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .feature-title {
            font-weight: 700;
            font-size: 0.9375rem;
            color: var(--black);
            margin-bottom: 0.5rem;
        }

        .feature-description {
            font-size: 0.875rem;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* About Section */
        .about {
            padding: var(--section-spacing) 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-4xl);
            align-items: start;
        }

        @media (max-width: 968px) {
            .about-grid {
                grid-template-columns: 1fr;
                gap: var(--space-2xl);
            }
        }

        .section-title {
            font-family: var(--font-family);
            font-size: var(--font-h2);
            font-weight: var(--weight-h2);
            line-height: var(--lh-h2);
            margin-bottom: var(--space-lg);
            letter-spacing: -0.02em;
        }

        .section-title .highlight {
            color: var(--primary);
        }

        .section-description {
            font-size: var(--font-body);
            color: var(--medium-gray);
            line-height: var(--lh-body);
        }

        .principles-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        @media (max-width: 768px) {
            .principles-grid {
                grid-template-columns: 1fr;
            }
        }

        .principle-card {
            background: white;
            border: 2px solid var(--light-gray);
            padding: var(--card-padding);
            border-radius: var(--radius-lg);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .principle-card:hover {
            border-color: var(--primary);
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(47, 111, 237, 0.15);
        }

        .principle-title {
            font-weight: var(--weight-h2);
            font-size: var(--font-body);
            color: var(--black);
            margin-bottom: var(--space-sm);
        }

        .principle-text {
            font-size: var(--font-small);
            color: var(--medium-gray);
            line-height: var(--lh-small);
        }

        /* Services Section */
        .services {
            padding: calc(var(--section-spacing) * 1.5) 0;
            background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 50%, #f1f3f5 100%);
            border-top: 1px solid var(--light-gray);
            border-bottom: 1px solid var(--light-gray);
            position: relative;
            overflow: hidden;
            min-height: 600px;
        }

        .services::after {
            content: '';
            position: absolute;
            bottom: -10%;
            left: -10%;
            width: 40%;
            height: 60%;
            background: radial-gradient(circle, rgba(47, 111, 237, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .services-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3rem;
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .services-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        @media (max-width: 968px) {
            .services-grid {
                grid-template-columns: 1fr;
            }
        }

        .service-card {
            background: white;
            padding: var(--card-padding);
            border-radius: var(--radius-lg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), #5A8FFF);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .service-title {
            font-family: var(--font-family);
            font-size: var(--font-h3);
            font-weight: var(--weight-h1);
            color: var(--black);
            margin-bottom: var(--space-md);
        }

        .service-description {
            font-size: var(--font-small);
            color: var(--medium-gray);
            line-height: var(--lh-small);
        }

        /* Process Section */
        .process {
            padding: var(--section-spacing) 0;
            background: var(--bg-gray);
            border-top: 1px solid var(--light-gray);
            border-bottom: 1px solid var(--light-gray);
        }

        .process-header {
            margin-bottom: var(--space-2xl);
            text-align: center;
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
            position: relative;
        }

        /* Hapus bagian ini - garis dashed horizontal */
        /* .process-steps::before {
    content: '';
    position: absolute;
    top: 3rem;
    left: 16.666%;
    right: 16.666%;
    height: 2px;
    background: linear-gradient(90deg, var(--royal) 0%, var(--royal) 50%, transparent 50%, transparent 100%);
    background-size: 20px 2px;
    z-index: 0;
} */

        @media (max-width: 968px) {
            .process-steps {
                grid-template-columns: 1fr;
            }
        }

        .process-step {
            background: var(--white);
            padding: var(--card-padding);
            border-radius: var(--radius-lg);
            position: relative;
            box-shadow: var(--shadow-sm);
            z-index: 1;
            transition: all 0.3s ease;
        }

        /* Hapus bagian ini - panah antar step */
        /* .process-step:not(:nth-child(3n))::after {
    content: '';
    position: absolute;
    top: 50%;
    right: -2rem;
    width: 3rem;
    height: 3rem;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="%232563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>') center/contain no-repeat;
    transform: translateY(-50%);
    z-index: 2;
    opacity: 0.8;
    filter: drop-shadow(0 2px 4px rgba(37, 99, 235, 0.2));
} */

        /* @media (max-width: 968px) {
    .process-step:not(:nth-child(3n))::after {
        top: auto;
        bottom: -2.5rem;
        right: 50%;
        transform: translateX(50%) rotate(90deg);
    }
} */

        .process-number {
            position: absolute;
            top: -12px;
            left: var(--card-padding);
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: var(--white);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-family);
            font-size: var(--font-body);
            font-weight: var(--weight-h1);
            box-shadow: var(--shadow-md);
        }

        .process-step-title {
            font-family: var(--font-family);
            font-size: var(--font-body);
            font-weight: var(--weight-h2);
            color: var(--black);
            margin: var(--space-md) 0 var(--space-sm);
        }

        .process-step-description {
            font-size: var(--font-small);
            color: var(--medium-gray);
            line-height: var(--lh-small);
            margin-bottom: var(--space-sm);
        }

        .process-step-duration {
            display: inline-block;
            font-size: var(--font-tiny);
            font-weight: var(--weight-h3);
            color: var(--primary);
            background: rgba(47, 111, 237, 0.1);
            padding: var(--space-xs) var(--space-sm);
            border-radius: 1rem;
        }

        /* Work Section */
        .work {
            padding: var(--section-spacing) 0;
            background: linear-gradient(135deg, #f1f3f5 0%, #e9ecef 50%, #f8f9fa 100%);
            position: relative;
        }

        .work-header {
            margin-bottom: var(--space-2xl);
        }

        .work-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        @media (max-width: 968px) {
            .work-grid {
                grid-template-columns: 1fr;
            }
        }

        .work-card {
            background: var(--bg-gray);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            text-decoration: none;
            display: block;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .work-card::after {
            content: '→';
            position: absolute;
            top: var(--space-lg);
            right: var(--space-lg);
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: var(--font-h3);
            opacity: 0;
            transform: translate(10px, -10px);
            transition: all 0.3s ease;
        }

        .work-card:hover::after {
            opacity: 1;
            transform: translate(0, 0);
        }

        .work-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .work-image {
            width: 100%;
            height: 176px;
            background: linear-gradient(135deg, #5A8FFF, var(--primary));
            border-radius: var(--card-radius);
            margin-bottom: var(--space-lg);
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
        }

        .work-card:nth-child(1) .work-image {
            background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80');
        }

        .work-card:nth-child(2) .work-image {
            background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80');
        }

        .work-card:nth-child(3) .work-image {
            background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&q=80');
        }

        .work-image::before {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 20px,
                    rgba(255, 255, 255, 0.05) 20px,
                    rgba(255, 255, 255, 0.05) 40px);
        }

        .work-title {
            font-weight: var(--weight-h2);
            font-size: var(--font-body);
            color: var(--black);
            margin-bottom: var(--space-xs);
        }

        .work-description {
            font-size: var(--font-small);
            color: var(--medium-gray);
        }

        /* Testimonials Section */
        .testimonials {
            padding: var(--section-spacing) 0;
            background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
            border-top: 1px solid var(--light-gray);
            border-bottom: 1px solid var(--light-gray);
            position: relative;
            overflow: hidden;
        }

        .testimonials::before {
            content: '';
            position: absolute;
            top: -5%;
            right: -5%;
            width: 30%;
            height: 50%;
            background: radial-gradient(circle, rgba(47, 111, 237, 0.06) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .testimonials-header {
            margin-bottom: var(--space-2xl);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        @media (max-width: 968px) {
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
        }

        .testimonial-card {
            background: white;
            padding: var(--card-padding);
            border-radius: var(--radius-lg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .testimonial-card.featured {
            background: var(--primary);
            color: white;
            transform: scale(1.05);
        }

        .testimonial-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
        }

        .testimonial-card.featured:hover {
            transform: scale(1.05) translateY(-6px);
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .author-avatar {
            width: var(--avatar-size);
            height: var(--avatar-size);
            border-radius: var(--radius-full);
            background: linear-gradient(135deg, var(--primary), #5A8FFF);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: var(--weight-h2);
            font-size: var(--font-h3);
        }

        .author-avatar-img {
            width: var(--avatar-size);
            height: var(--avatar-size);
            border-radius: var(--radius-full);
            object-fit: cover;
            border: 2px solid white;
        }

        .testimonial-card:nth-child(1) .author-avatar {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .testimonial-card:nth-child(2) .author-avatar {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .testimonial-card:nth-child(3) .author-avatar {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .author-info {
            flex: 1;
        }

        .author-name {
            font-weight: var(--weight-h2);
            font-size: var(--font-small);
            margin-bottom: 4px;
        }

        .author-title {
            font-size: var(--font-small);
            opacity: 0.8;
        }

        .testimonial-text {
            font-size: var(--font-small);
            line-height: var(--lh-small);
        }

        .testimonial-card.featured .testimonial-text {
            color: white;
        }

        /* FAQ Section */
        .faq {
            padding: var(--section-spacing) 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
        }

        .faq-header {
            margin-bottom: var(--space-2xl);
            text-align: center;
        }

        .faq-list {
            max-width: 100%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-lg);
        }

        @media (max-width: 968px) {
            .faq-list {
                grid-template-columns: 1fr;
            }
        }

        .faq-item {
            background: var(--white);
            border: 2px solid var(--light-gray);
            border-radius: var(--card-radius);
            overflow: hidden;
            transition: border-color 0.3s ease;
        }

        .faq-item:hover {
            border-color: var(--primary);
        }

        .faq-question {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            padding: var(--space-lg);
            font-family: var(--font-family);
            font-size: var(--font-body);
            font-weight: var(--weight-h2);
            color: var(--black);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
        }

        .faq-question:hover {
            color: var(--primary);
        }

        .faq-icon {
            font-size: var(--font-h3);
            font-weight: var(--weight-h1);
            color: var(--primary);
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
        }

        .faq-answer-content {
            padding: 0 var(--space-lg) var(--space-lg);
            font-size: var(--font-small);
            color: var(--medium-gray);
            line-height: var(--lh-small);
        }

        /* Brief Builder Section */
        .brief-builder {
            padding: var(--section-spacing) 0;
            background: linear-gradient(180deg, #ffffff 0%, #f1f3f5 100%);
        }

        .brief-header {
            margin-bottom: var(--space-2xl);
        }

        .brief-card {
            background: var(--white);
            border: 2px solid var(--light-gray);
            border-radius: var(--radius-lg);
            padding: var(--card-padding);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .brief-progress {
            display: grid;
            gap: var(--space-sm);
            margin-bottom: var(--space-xl);
        }

        .brief-progress-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-md);
            font-size: var(--font-small);
            color: var(--medium-gray);
        }

        .brief-progress-hint {
            color: var(--medium-gray);
            opacity: 0.85;
        }

        .brief-progress-bar {
            height: 10px;
            background: var(--bg-gray);
            border-radius: 999px;
            overflow: hidden;
            border: 1px solid var(--light-gray);
        }

        .brief-progress-fill {
            height: 100%;
            width: 16.6%;
            background: linear-gradient(90deg, rgba(47, 111, 237, 0.9), rgba(47, 111, 237, 0.65));
            border-radius: 999px;
            transition: width 0.25s ease;
        }

        .brief-error {
            font-size: var(--font-small);
            color: var(--primary);
            background: rgba(47, 111, 237, 0.08);
            border: 1px solid rgba(47, 111, 237, 0.18);
            border-radius: var(--button-radius);
            padding: 10px 12px;
        }

        .brief-other {
            display: none;
            margin-top: var(--space-md);
        }

        .brief-other.is-active {
            display: block;
        }

        .brief-step {
            display: none;
        }

        .brief-step.is-active {
            display: block;
        }

        .brief-step-title {
            font-family: var(--font-family);
            font-size: var(--font-h3);
            font-weight: var(--weight-h1);
            letter-spacing: -0.01em;
            margin-bottom: var(--space-md);
        }

        .brief-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-md);
        }

        .brief-options-multi {
            grid-template-columns: repeat(3, 1fr);
        }

        @media (max-width: 968px) {

            .brief-options,
            .brief-options-multi {
                grid-template-columns: 1fr;
            }
        }

        .brief-option {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            padding: 14px 14px;
            border-radius: var(--button-radius);
            border: 2px solid var(--light-gray);
            background: var(--white);
            cursor: pointer;
            transition: border-color 0.25s ease, transform 0.25s ease;
            user-select: none;
        }

        .brief-option:hover {
            border-color: rgba(47, 111, 237, 0.45);
            transform: translateY(-2px);
        }

        .brief-option.is-selected {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(47, 111, 237, 0.10);
        }

        .brief-option input {
            margin-top: 3px;
        }

        .brief-fields {
            display: grid;
            gap: var(--space-md);
        }

        .brief-label {
            display: block;
            font-size: var(--font-small);
            color: var(--medium-gray);
            margin-bottom: 6px;
        }

        .brief-input,
        .brief-textarea {
            width: 100%;
            border: 2px solid var(--light-gray);
            border-radius: var(--button-radius);
            padding: 12px 12px;
            font-family: var(--font-family);
            font-size: var(--font-small);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .brief-input:focus,
        .brief-textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(47, 111, 237, 0.10);
        }

        .brief-actions {
            margin-top: var(--space-xl);
            display: flex;
            justify-content: space-between;
            gap: var(--space-md);
        }

        .brief-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: var(--space-md) var(--space-lg);
            border-radius: var(--button-radius);
            text-decoration: none;
            font-weight: var(--weight-h2);
            border: 2px solid transparent;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.2s ease, border-color 0.2s ease;
            white-space: nowrap;
        }

        .brief-btn:disabled {
            opacity: 0.55;
            cursor: not-allowed;
        }

        .brief-btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .brief-btn-primary:hover {
            background: #1E5BD9;
            transform: translateY(-2px);
        }

        .brief-btn-secondary {
            background: var(--white);
            border-color: var(--light-gray);
            color: var(--black);
        }

        .brief-btn-secondary:hover {
            border-color: rgba(47, 111, 237, 0.45);
            transform: translateY(-2px);
        }

        .brief-result {
            margin-top: var(--space-xl);
            padding-top: var(--space-xl);
            border-top: 2px solid var(--light-gray);
        }

        .brief-result-title {
            font-family: var(--font-family);
            font-size: var(--font-h3);
            font-weight: var(--weight-h1);
            margin-bottom: var(--space-md);
        }

        .brief-result-box {
            width: 100%;
            background: var(--bg-gray);
            border: 2px solid var(--light-gray);
            border-radius: var(--radius-lg);
            padding: var(--space-md);
            overflow: auto;
            white-space: pre-wrap;
            font-size: var(--font-small);
            line-height: var(--lh-small);
            color: var(--black);
        }

        .brief-result-actions {
            margin-top: var(--space-md);
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .brief-privacy {
            margin-top: var(--space-sm);
            font-size: var(--font-small);
            color: var(--medium-gray);
        }

        /* Pricing Section */
        .pricing {
            padding: var(--section-spacing) 0;
            background: linear-gradient(180deg, #ffffff 0%, #f1f3f5 50%, #e9ecef 100%);
        }

        .pricing-header {
            margin-bottom: var(--space-2xl);
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        @media (max-width: 968px) {
            .pricing-grid {
                grid-template-columns: 1fr;
            }
        }

        .pricing-card {
            background: var(--white);
            border: 2px solid var(--light-gray);
            border-radius: var(--radius-lg);
            padding: var(--card-padding);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .pricing-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
        }

        .pricing-card.featured {
            background: var(--primary);
            border-color: var(--primary);
            color: var(--white);
            transform: scale(1.03);
        }

        .pricing-card.featured:hover {
            transform: scale(1.03) translateY(-8px);
        }

        .pricing-plan {
            font-family: var(--font-family);
            font-size: var(--font-h3);
            font-weight: var(--weight-h1);
            letter-spacing: -0.01em;
            margin-bottom: var(--space-xs);
        }

        .pricing-price {
            font-family: var(--font-family);
            font-size: var(--font-h2);
            font-weight: var(--weight-h1);
            line-height: var(--lh-h1);
            margin-bottom: 4px;
        }

        .pricing-sub {
            font-size: var(--font-small);
            color: var(--medium-gray);
            margin-bottom: var(--space-lg);
        }

        .pricing-card.featured .pricing-sub {
            color: rgba(255, 255, 255, 0.9);
        }

        .pricing-features {
            list-style: none;
            display: grid;
            gap: var(--space-sm);
            margin: var(--space-lg) 0 var(--space-xl);
            padding: 0;
        }

        .pricing-features li {
            font-size: var(--font-small);
            color: var(--dark-gray);
            display: flex;
            gap: var(--space-sm);
            align-items: flex-start;
        }

        .pricing-features li::before {
            content: '✓';
            color: var(--primary);
            font-weight: var(--weight-h1);
            margin-top: 1px;
        }

        .pricing-card.featured .pricing-features li {
            color: rgba(255, 255, 255, 0.95);
        }

        .pricing-card.featured .pricing-features li::before {
            color: var(--white);
        }

        .pricing-cta {
            display: inline-flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            padding: var(--space-md) var(--space-lg);
            border-radius: var(--button-radius);
            text-decoration: none;
            font-weight: var(--weight-h2);
            transition: all 0.3s ease;
            text-align: center;
            background: var(--primary);
            color: var(--white);
        }

        .pricing-cta:hover {
            background: #1E5BD9;
            transform: translateY(-2px);
        }

        .pricing-card.featured .pricing-cta {
            background: var(--white);
            color: var(--black);
        }

        .pricing-card.featured .pricing-cta:hover {
            background: rgba(255, 255, 255, 0.92);
        }

        .pricing-note {
            margin-top: var(--space-2xl);
            background: linear-gradient(135deg, rgba(47, 111, 237, 0.05), rgba(47, 111, 237, 0.02));
            border: 2px solid rgba(47, 111, 237, 0.15);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            display: flex;
            gap: var(--space-md);
            align-items: flex-start;
        }

        .pricing-note-icon {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pricing-note-icon svg {
            width: 20px;
            height: 20px;
            stroke: white;
        }

        .pricing-note-content {
            flex: 1;
        }

        .pricing-note-title {
            font-weight: var(--weight-h1);
            font-size: var(--font-small);
            color: var(--dark-gray);
            margin-bottom: var(--space-xs);
            font-family: var(--font-family);
        }

        .pricing-note-text {
            font-size: var(--font-small);
            color: var(--medium-gray);
            line-height: var(--lh-small);
        }

        .pricing-note-text strong {
            color: var(--primary);
            font-weight: var(--weight-h2);
        }

        /* Contact Section */
        .contact {
            padding: var(--section-spacing) 0;
        }

        .contact-card {
            background: var(--black);
            color: white;
            padding: var(--space-3xl);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 60%;
            height: 200%;
            background: radial-gradient(circle, rgba(47, 111, 237, 0.2) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .contact-content {
            position: relative;
            z-index: 1;
        }

        .contact-title {
            font-family: var(--font-family);
            font-size: var(--font-h2);
            font-weight: 900;
            margin-bottom: var(--space-md);
            letter-spacing: -0.02em;
        }

        .contact-description {
            font-size: var(--font-body);
            line-height: var(--lh-body);
            opacity: 0.9;
            margin-bottom: var(--space-xl);
            max-width: 640px;
        }

        .contact-actions {
            display: flex;
            gap: var(--space-md);
        }

        @media (max-width: 768px) {
            .contact-card {
                padding: var(--space-2xl) var(--space-xl);
            }

            .contact-title {
                font-size: var(--space-xl);
            }

            .contact-actions {
                flex-direction: column;
            }
        }

        .button-white {
            padding: var(--space-md) var(--space-xl);
            background: white;
            color: var(--black);
            text-decoration: none;
            border-radius: var(--button-radius);
            font-weight: var(--weight-h2);
            font-size: var(--font-body);
            transition: all 0.3s ease;
            text-align: center;
            display: inline-flex;
            align-items: center;
            gap: var(--space-xs);
        }

        .button-white svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
        }

        .button-white:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.3);
        }

        .button-outline {
            padding: var(--space-md) var(--space-xl);
            background: transparent;
            color: white;
            text-decoration: none;
            border-radius: var(--button-radius);
            border: 2px solid rgba(255, 255, 255, 0.3);
            font-weight: var(--weight-h2);
            font-size: var(--font-body);
            transition: all 0.3s ease;
            text-align: center;
            display: inline-flex;
            align-items: center;
            gap: var(--space-xs);
        }

        .button-outline svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
        }

        .button-outline:hover {
            border-color: white;
            background: rgba(255, 255, 255, 0.1);
        }

        .contact-info {
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .contact-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        @media (max-width: 640px) {
            .contact-info-grid {
                grid-template-columns: 1fr;
            }
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .contact-info-label {
            font-size: 0.875rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 0.25rem;
        }

        .contact-info-value {
            font-size: 0.9375rem;
            color: var(--white);
        }

        .contact-info-value a {
            color: var(--white);
            text-decoration: none;
            transition: opacity 0.2s ease;
        }

        .contact-info-value a:hover {
            opacity: 0.8;
        }

        .contact-checklist {
            margin-top: 1.5rem;
        }

        .contact-checklist-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.75rem;
        }

        .contact-checklist-items {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .contact-checklist-items li::before {
            content: '✓';
            color: var(--white);
            font-weight: 800;
            margin-right: 0.5rem;
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

        /* Floating Contact Bubbles */
        .floating-contacts {
            position: fixed;
            bottom: var(--space-xl);
            right: var(--space-xl);
            z-index: 998;
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .contact-bubble {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            text-decoration: none;
            position: relative;
        }

        .contact-bubble::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            background: inherit;
            opacity: 0.3;
            transform: scale(0.9);
            transition: all 0.3s ease;
        }

        .contact-bubble:hover::before {
            transform: scale(1.15);
            opacity: 0.2;
        }

        .contact-bubble:hover {
            transform: translateY(-6px) scale(1.08);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
        }

        .contact-bubble svg {
            width: 28px;
            height: 28px;
            fill: white;
            position: relative;
            z-index: 1;
        }

        .bubble-whatsapp {
            background: linear-gradient(135deg, #25D366, #128C7E);
        }

        .bubble-gmail {
            background: linear-gradient(135deg, #EA4335, #C5221F);
        }

        .contact-bubble-label {
            position: absolute;
            right: 72px;
            background: var(--dark-gray);
            color: white;
            padding: var(--space-xs) var(--space-md);
            border-radius: var(--button-radius);
            font-size: var(--font-small);
            font-weight: var(--weight-h3);
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transform: translateX(10px);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .contact-bubble-label::after {
            content: '';
            position: absolute;
            right: -6px;
            top: 50%;
            transform: translateY(-50%);
            border-left: 6px solid var(--dark-gray);
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
        }

        .contact-bubble:hover .contact-bubble-label {
            opacity: 1;
            transform: translateX(0);
        }

        @media (max-width: 768px) {
            .floating-contacts {
                bottom: var(--space-lg);
                right: var(--space-lg);
            }

            .contact-bubble {
                width: var(--avatar-size);
                height: var(--avatar-size);
            }

            .contact-bubble svg {
                width: var(--space-lg);
                height: var(--space-lg);
            }

            .contact-bubble-label {
                display: none;
            }
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

        /* Empty States */
        .empty-state {
            text-align: center;
            padding: var(--space-2xl) var(--space-xl) !important;
        }

        .empty-icon {
            display: flex;
            justify-content: center;
            margin-bottom: var(--space-lg);
            opacity: 0.2;
        }

        .empty-icon svg {
            stroke: var(--primary);
        }

        .work-empty-state,
        .testimonial-empty-state,
        .faq-empty-state,
        .pricing-empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: var(--space-4xl) var(--space-xl);
            background: var(--white);
            border: 2px dashed var(--light-gray);
            border-radius: var(--radius-lg);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .empty-state-icon,
        .empty-state-icon-testimonial,
        .empty-state-icon-faq,
        .empty-state-icon-pricing {
            width: 120px;
            height: 120px;
            margin: 0 auto var(--space-xl);
            background: linear-gradient(135deg, rgba(47, 111, 237, 0.05), rgba(90, 143, 255, 0.1));
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .empty-state-icon svg,
        .empty-state-icon-testimonial svg,
        .empty-state-icon-faq svg,
        .empty-state-icon-pricing svg {
            stroke: var(--primary);
            opacity: 0.4;
        }

        .empty-state-icon::before,
        .empty-state-icon-testimonial::before,
        .empty-state-icon-faq::before,
        .empty-state-icon-pricing::before {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(47, 111, 237, 0.1), rgba(90, 143, 255, 0.15));
            animation: pulse-ring 2s ease-out infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.95);
                opacity: 1;
            }

            100% {
                transform: scale(1.1);
                opacity: 0;
            }
        }

        .empty-state-title {
            font-size: var(--font-h3);
            font-weight: var(--weight-h1);
            color: var(--black);
            margin-bottom: var(--space-sm);
        }

        .empty-state-description {
            font-size: var(--font-body);
            color: var(--medium-gray);
            line-height: var(--lh-body);
            max-width: 500px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {

            .work-empty-state,
            .testimonial-empty-state,
            .faq-empty-state,
            .pricing-empty-state {
                padding: var(--space-2xl) var(--space-lg);
            }

            .empty-state-icon,
            .empty-state-icon-testimonial,
            .empty-state-icon-faq,
            .empty-state-icon-pricing {
                width: 100px;
                height: 100px;
            }

            .empty-state-icon svg,
            .empty-state-icon-testimonial svg,
            .empty-state-icon-faq svg,
            .empty-state-icon-pricing svg {
                width: 80px;
                height: 80px;
            }

            .empty-state-title {
                font-size: var(--font-h3);
            }

            .empty-state-description {
                font-size: var(--font-small);
            }
        }
    </style>
</head>

<body>
    @php
    $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

    $danovaGmail = $setting('contact.email', 'danovaagency@gmail.com');
    $danovaGmailSubject = $setting('contact.email_subject', 'Project Inquiry — Danova');
    $danovaGmailBody = $setting(
    'contact.email_body',
    "Hi Danova Team,\n\nNama:\nBrand/Usaha:\nWebsite/Sosmed:\nLayanan yang dibutuhkan: (Website / Landing Page / Brand System)\nBudget range:\nTimeline:\nTujuan:\n\nThanks,\n",
    );
    $danovaGmailHref = 'https://mail.google.com/mail/?view=cm&fs=1&to=' . rawurlencode($danovaGmail)
    . '&su=' . rawurlencode($danovaGmailSubject)
    . '&body=' . rawurlencode($danovaGmailBody);

    $danovaWhatsappNumber = $setting('contact.whatsapp', '6281234567890');
    $danovaWhatsappNumberDigits = preg_replace('/\D+/', '', (string) $danovaWhatsappNumber);
    $danovaWhatsappPrefill = $setting(
    'contact.whatsapp_prefill',
    'Hi Danova, saya tertarik diskusi project website.',
    );
    $danovaWhatsappHref = 'https://wa.me/' . $danovaWhatsappNumberDigits . '?text=' . rawurlencode($danovaWhatsappPrefill);
    @endphp

    <a href="#content" class="sr-only">Skip to content</a>

    <header id="header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo">
                    @if($setting('branding.header_logo'))
                    <img src="{{ asset('storage/' . $setting('branding.header_logo')) }}" alt="Danova" style="max-height: 24px; display: block;" />
                    @else
                    <span>Danova</span>
                    @endif
                </a>

                <nav class="nav-desktop">
                    <a href="#about">About</a>
                    <a href="#services">Services</a>
                    <a href="#pricing">Pricing</a>
                    <a href="#work">Work</a>
                    <a href="#testimonials">Testimonials</a>
                    <a href="#contact">Contact</a>
                </nav>

                <div class="header-actions">
                    <a href="#contact" class="cta-button">Start a Project</a>
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

    <main id="content">
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-content">
                        <div class="badge" role="group" aria-label="200 plus premium clients">
                            <div class="badge-avatars">
                                @php
                                $avatar1 = $setting('hero.badge_avatar1') ? asset('storage/' . $setting('hero.badge_avatar1')) : '/images/avatar-1.svg';
                                $avatar2 = $setting('hero.badge_avatar2') ? asset('storage/' . $setting('hero.badge_avatar2')) : '/images/avatar-2.svg';
                                $avatar3 = $setting('hero.badge_avatar3') ? asset('storage/' . $setting('hero.badge_avatar3')) : '/images/avatar-3.svg';
                                @endphp
                                <img src="{{ $avatar1 }}" alt="Customer profile photo" loading="lazy" />
                                <img src="{{ $avatar2 }}" alt="Customer profile photo" loading="lazy" />
                                <img src="{{ $avatar3 }}" alt="Customer profile photo" loading="lazy" />
                            </div>
                            <div class="badge-text"><strong>200+</strong> Premium Clients</div>
                        </div>

                        <h1>
                            <span class="hero-line">Life Feels Empty Without</span>
                            <span class="hero-line highlight">Beautiful Design</span>
                        </h1>

                        <p>
                            We create and design applications, websites, or other digital products with professionalism.
                        </p>

                        <div class="hero-actions">
                            <a href="#contact" class="button-primary">Start a Project</a>
                            <a href="#work" class="button-secondary">View Work</a>
                        </div>

                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-label">Projects</div>
                                <div class="stat-value">{{ $setting('stats.projects', '100+') }}</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-label">Avg. Rating</div>
                                <div class="stat-value">{{ $setting('stats.rating', '4.9') }}</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-label">On-time</div>
                                <div class="stat-value">{{ $setting('stats.on_time', '95%') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-visual">
                        <div class="showcase-card">
                            <div class="showcase-image">
                                @if($setting('hero.showcase_logo'))
                                <img src="{{ asset('storage/' . $setting('hero.showcase_logo')) }}" alt="Danova Logo" />
                                @else
                                <svg width="80" height="80" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--medium-gray); opacity: 0.5;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                @endif
                            </div>
                            <div class="feature-grid">
                                <div class="feature-box">
                                    <div class="feature-title">{{ $setting('hero.feature1_title', 'UI/UX Design') }}</div>
                                    <div class="feature-description">{{ $setting('hero.feature1_description', 'Interface yang clean, jelas, dan premium.') }}</div>
                                </div>
                                <div class="feature-box">
                                    <div class="feature-title">{{ $setting('hero.feature2_title', 'Web Development') }}</div>
                                    <div class="feature-description">{{ $setting('hero.feature2_description', 'Blade SSR + performa yang ringan.') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about">
            <div class="container">
                <div class="about-grid">
                    <div>
                        <h2 class="section-title">
                            We don't just build websites.
                            <span class="highlight">We craft brand presence.</span>
                        </h2>
                        <p class="section-description">
                            Danova adalah arsitek visual: fokus pada detail, kontras yang tegas, dan struktur yang memandu perhatian—agar brand Anda terlihat lebih kuat.
                        </p>
                    </div>
                    <div>
                        <div class="principles-grid">
                            <div class="principle-card">
                                <div class="principle-title">High contrast hierarchy</div>
                                <div class="principle-text">Headline kuat, whitespace rapi, fokus terarah.</div>
                            </div>
                            <div class="principle-card">
                                <div class="principle-title">Pixel-perfect details</div>
                                <div class="principle-text">Setiap komponen terasa presisi & berkelas.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="services">
            <div class="container">
                <div class="services-header">
                    <div>
                        <h2 class="section-title">
                            Services that elevate your
                            <span class="highlight">digital aesthetic</span>
                        </h2>
                        <p class="section-description">Paket layanan yang fokus pada visual, pengalaman, dan hasil.</p>
                    </div>
                </div>

                <div class="services-grid">
                    <article class="service-card">
                        <h3 class="service-title">Website Design</h3>
                        <p class="service-description">Layout premium, tipografi kuat, dan interaksi yang rapi.</p>
                    </article>
                    <article class="service-card">
                        <h3 class="service-title">Landing Pages</h3>
                        <p class="service-description">Fokus konversi: pesan jelas, CTA tegas, struktur meyakinkan.</p>
                    </article>
                    <article class="service-card">
                        <h3 class="service-title">Brand Visual System</h3>
                        <p class="service-description">Konsistensi warna, komponen, dan gaya untuk jangka panjang.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section id="process" class="process">
            <div class="container">
                <div class="process-header">
                    <h2 class="section-title">
                        How we
                        <span class="highlight">work together</span>
                    </h2>
                    <p class="section-description">
                        Proses terstruktur dan transparan dari konsep hingga peluncuran—setiap langkah dirancang untuk hasil maksimal.
                    </p>
                </div>

                <div class="process-steps">
                    <div class="process-step">
                        <div class="process-number">1</div>
                        <div class="process-step-title">Discovery & Brief</div>
                        <div class="process-step-description">
                            Diskusi mendalam tentang tujuan brand, target audience, dan competitive landscape untuk membangun fondasi strategi yang kuat.
                        </div>
                        <div class="process-step-duration">3–5 hari</div>
                    </div>

                    <div class="process-step">
                        <div class="process-number">2</div>
                        <div class="process-step-title">Visual Design</div>
                        <div class="process-step-description">
                            Pembuatan mockup premium dengan sistem warna, tipografi, dan komponen UI yang konsisten—termasuk versi desktop dan mobile.
                        </div>
                        <div class="process-step-duration">7–10 hari</div>
                    </div>

                    <div class="process-step">
                        <div class="process-number">3</div>
                        <div class="process-step-title">Development</div>
                        <div class="process-step-description">
                            Transformasi desain menjadi kode production-ready dengan fokus pada performa, responsiveness, dan browser compatibility.
                        </div>
                        <div class="process-step-duration">7–12 hari</div>
                    </div>

                    <div class="process-step">
                        <div class="process-number">4</div>
                        <div class="process-step-title">Content Integration</div>
                        <div class="process-step-description">
                            Implementasi konten, optimasi SEO, accessibility audit, dan fine-tuning untuk memastikan kualitas maksimal.
                        </div>
                        <div class="process-step-duration">2–3 hari</div>
                    </div>

                    <div class="process-step">
                        <div class="process-number">5</div>
                        <div class="process-step-title">Launch & Deploy</div>
                        <div class="process-step-description">
                            Deployment ke server production, final testing, DNS configuration, dan dokumentasi lengkap untuk handover.
                        </div>
                        <div class="process-step-duration">1–2 hari</div>
                    </div>

                    <div class="process-step">
                        <div class="process-number">6</div>
                        <div class="process-step-title">Post-Launch Support</div>
                        <div class="process-step-description">
                            Monitoring aktif dan dukungan penuh untuk bug fixes dan adjustment selama periode garansi.
                        </div>
                        <div class="process-step-duration">14 hari</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Brief Builder Section -->
        <section id="brief" class="brief-builder">
            <div class="container">
                <div class="brief-header">
                    <h2 class="section-title">
                        60 detik untuk
                        <span class="highlight">brief yang jelas</span>
                    </h2>
                    <p class="section-description">
                        Cocok untuk bisnis, organisasi, maupun mahasiswa. Pilih opsi yang paling dekat—atau isi sendiri—lalu kirim ringkasannya ke WhatsApp / Email.
                    </p>
                </div>

                <div class="brief-card" id="briefBuilder" data-whatsapp-url="{{ route('out.whatsapp') }}" data-email-url="{{ route('out.email') }}">
                    <div class="brief-progress">
                        <div class="brief-progress-meta">
                            <span id="briefStepLabel">Step 1/6</span>
                        </div>
                        <div class="brief-progress-bar" aria-hidden="true">
                            <div class="brief-progress-fill" id="briefProgressFill"></div>
                        </div>
                        <div class="brief-error" id="briefError" role="alert" hidden></div>
                    </div>

                    <form class="brief-form" id="briefForm" novalidate>
                        <div class="brief-step is-active" data-step="1">
                            <div class="brief-step-title">Kebutuhan utama</div>
                            <div class="brief-options">
                                <label class="brief-option">
                                    <input type="radio" name="need" value="Website bisnis/UMKM/organisasi" required>
                                    <span>Website bisnis/UMKM/organisasi</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="need" value="Landing page (event/promo/tugas)" required>
                                    <span>Landing page (event/promo/tugas)</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="need" value="Portfolio pribadi / CV / magang" required>
                                    <span>Portfolio pribadi / CV / magang</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="need" value="Redesign / revamp website" required>
                                    <span>Redesign / revamp website</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="need" value="Tugas kuliah / project kampus" required>
                                    <span>Tugas kuliah / project kampus</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="need" value="__other__" required>
                                    <span>Lainnya (isi sendiri)</span>
                                </label>
                            </div>
                            <div class="brief-other" data-other-for="need">
                                <label class="brief-label" for="briefNeedOther">Tuliskan kebutuhan Anda</label>
                                <input class="brief-input" id="briefNeedOther" name="need_other" type="text" placeholder="Contoh: website event kampus, portfolio desain, landing page lomba...">
                            </div>
                        </div>

                        <div class="brief-step" data-step="2">
                            <div class="brief-step-title">Tujuan utama</div>
                            <div class="brief-options">
                                <label class="brief-option">
                                    <input type="radio" name="goal" value="Cari klien / lead / inquiry" required>
                                    <span>Cari klien / lead / inquiry</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="goal" value="Personal branding / portfolio" required>
                                    <span>Personal branding / portfolio</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="goal" value="Kredibilitas & trust" required>
                                    <span>Kredibilitas & trust</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="goal" value="Sales / pendaftaran" required>
                                    <span>Sales / pendaftaran</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="goal" value="Tugas kuliah / nilai / presentasi" required>
                                    <span>Tugas kuliah / nilai / presentasi</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="goal" value="__other__" required>
                                    <span>Lainnya (isi sendiri)</span>
                                </label>
                            </div>
                            <div class="brief-other" data-other-for="goal">
                                <label class="brief-label" for="briefGoalOther">Tuliskan tujuan Anda</label>
                                <input class="brief-input" id="briefGoalOther" name="goal_other" type="text" placeholder="Contoh: daftar magang, kumpulkan leads, pendaftaran event, presentasi tugas...">
                            </div>
                        </div>

                        <div class="brief-step" data-step="3">
                            <div class="brief-step-title">Budget range (perkiraan)</div>
                            <div class="brief-options">
                                <label class="brief-option">
                                    <input type="radio" name="budget" value="< 1 juta" required>
                                    <span>&lt; 1 juta</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="budget" value="1–3 juta" required>
                                    <span>1–3 juta</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="budget" value="3–6 juta" required>
                                    <span>3–6 juta</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="budget" value="6–12 juta" required>
                                    <span>6–12 juta</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="budget" value="12 juta+" required>
                                    <span>12 juta+</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="budget" value="Belum yakin" required>
                                    <span>Belum yakin</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="budget" value="__other__" required>
                                    <span>Lainnya (isi sendiri)</span>
                                </label>
                            </div>
                            <div class="brief-other" data-other-for="budget">
                                <label class="brief-label" for="briefBudgetOther">Tuliskan budget (jika ada)</label>
                                <input class="brief-input" id="briefBudgetOther" name="budget_other" type="text" placeholder="Contoh: 800 ribu, 2.5 juta, atau kisaran...">
                            </div>
                        </div>

                        <div class="brief-step" data-step="4">
                            <div class="brief-step-title">Timeline target</div>
                            <div class="brief-options">
                                <label class="brief-option">
                                    <input type="radio" name="timeline" value="Deadline dekat (<= 2 minggu)" required>
                                    <span>Deadline dekat (&lt;= 2 minggu)</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="timeline" value="3–4 minggu" required>
                                    <span>3–4 minggu</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="timeline" value="1–2 bulan" required>
                                    <span>1–2 bulan</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="timeline" value="Flexible" required>
                                    <span>Flexible</span>
                                </label>
                                <label class="brief-option">
                                    <input type="radio" name="timeline" value="__other__" required>
                                    <span>Lainnya (isi sendiri)</span>
                                </label>
                            </div>
                            <div class="brief-other" data-other-for="timeline">
                                <label class="brief-label" for="briefTimelineOther">Tuliskan timeline Anda</label>
                                <input class="brief-input" id="briefTimelineOther" name="timeline_other" type="text" placeholder="Contoh: sebelum 20 Jan, minggu depan, akhir semester...">
                            </div>
                        </div>

                        <div class="brief-step" data-step="5">
                            <div class="brief-step-title">Fitur yang dibutuhkan (opsional)</div>
                            <div class="brief-options brief-options-multi">
                                <label class="brief-option">
                                    <input type="checkbox" name="features[]" value="Portfolio / Work" />
                                    <span>Portfolio / Work</span>
                                </label>
                                <label class="brief-option">
                                    <input type="checkbox" name="features[]" value="Pricing" />
                                    <span>Pricing</span>
                                </label>
                                <label class="brief-option">
                                    <input type="checkbox" name="features[]" value="Form Contact" />
                                    <span>Form Contact</span>
                                </label>
                                <label class="brief-option">
                                    <input type="checkbox" name="features[]" value="CMS Admin" />
                                    <span>CMS Admin</span>
                                </label>
                                <label class="brief-option">
                                    <input type="checkbox" name="features[]" value="Blog" />
                                    <span>Blog</span>
                                </label>
                                <label class="brief-option">
                                    <input type="checkbox" name="features[]" value="Multi-language" />
                                    <span>Multi-language</span>
                                </label>
                            </div>
                        </div>

                        <div class="brief-step" data-step="6">
                            <div class="brief-step-title">Detail singkat</div>
                            <div class="brief-fields">
                                <div class="brief-field">
                                    <label class="brief-label" for="briefBrand">Nama / Brand / Organisasi</label>
                                    <input class="brief-input" id="briefBrand" name="brand" type="text" placeholder="Contoh: Rangga / Danova / HIMA ..." required>
                                </div>
                                <div class="brief-field">
                                    <label class="brief-label" for="briefRole">Role (opsional)</label>
                                    <input class="brief-input" id="briefRole" name="role" type="text" placeholder="Contoh: mahasiswa, owner, admin organisasi...">
                                </div>
                                <div class="brief-field">
                                    <label class="brief-label" for="briefUrl">Website / Sosmed (opsional)</label>
                                    <input class="brief-input" id="briefUrl" name="url" type="url" placeholder="https://...">
                                </div>
                                <div class="brief-field">
                                    <label class="brief-label" for="briefNotes">Catatan (opsional)</label>
                                    <textarea class="brief-textarea" id="briefNotes" name="notes" rows="4" placeholder="Scope singkat, referensi, atau kebutuhan khusus..."></textarea>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="brief-actions" id="briefActions">
                        <button type="button" class="brief-btn brief-btn-secondary" id="briefBack" disabled>Back</button>
                        <button type="button" class="brief-btn brief-btn-primary" id="briefNext">Next</button>
                    </div>

                    <div class="brief-result" id="briefResult" hidden>
                        <div class="brief-result-title">Ringkasan Brief</div>
                        <pre class="brief-result-box" id="briefSummary"></pre>
                        <div class="brief-result-actions">
                            <button type="button" class="brief-btn brief-btn-secondary" id="briefEdit">Edit</button>
                            <button type="button" class="brief-btn brief-btn-secondary" id="briefCopy">Copy</button>
                            <a class="brief-btn brief-btn-primary" id="briefSendWhatsapp" href="#" target="_blank" rel="noreferrer noopener">Send WhatsApp</a>
                            <a class="brief-btn brief-btn-secondary" id="briefSendEmail" href="#" target="_blank" rel="noreferrer noopener">Send Email</a>
                        </div>
                        <div class="brief-privacy">
                            Ringkasan dibuat di browser Anda dan tidak disimpan di server.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="pricing">
            <div class="container">
                <div class="pricing-header">
                    <h2 class="section-title">
                        Transparent pricing for
                        <span class="highlight">premium results</span>
                    </h2>
                    <p class="section-description">
                        Pilih paket yang sesuai kebutuhan. Harga final menyesuaikan scope, revisi, dan kompleksitas.
                    </p>
                </div>

                <div class="pricing-grid">
                    @forelse ($pricingPlans as $plan)
                    <article class="pricing-card {{ $plan->is_featured ? 'featured' : '' }}">
                        <div class="pricing-plan">{{ $plan->name }}</div>
                        <div class="pricing-price">{{ $plan->price }}</div>
                        <div class="pricing-sub">{{ $plan->subtitle }}</div>
                        <ul class="pricing-features">
                            @foreach (($plan->features ?? []) as $feature)
                            <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <a
                            href="#contact"
                            class="pricing-cta"
                            data-plan-id="{{ $plan->id }}"
                            data-package="{{ $plan->cta_package_name ?? $plan->name }}"
                            data-price="{{ $plan->cta_package_price ?? $plan->price }}">{{ $plan->cta_label ?? ('Choose ' . $plan->name) }}</a>
                    </article>
                    @empty
                    <div class="pricing-empty-state">
                        <div class="empty-state-icon-pricing">
                            <svg width="120" height="120" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="empty-state-title">Belum Ada Paket Pricing</h3>
                        <p class="empty-state-description">Paket harga layanan belum ditambahkan. Tambahkan pricing plan untuk menampilkan pilihan paket kepada calon klien.</p>
                        <a href="{{ route('admin.pricing-plans.index') }}" class="button-primary" style="display: inline-block; margin-top: 1.5rem;">
                            Kelola Pricing
                        </a>
                    </div>
                    @endforelse
                </div>

                <div class="pricing-note">
                    <div class="pricing-note-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </div>
                    <div class="pricing-note-content">
                        <div class="pricing-note-title">Catatan Penting</div>
                        <div class="pricing-note-text">
                            Angka di atas adalah <strong>starting price</strong>. Tidak termasuk: domain/hosting, foto/video produksi, konten copywriting penuh, integrasi payment gateway kompleks, atau maintenance bulanan (tersedia terpisah).
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Work Section -->
        <section id="work" class="work">
            <div class="container">
                <div class="work-header">
                    <h2 class="section-title">
                        Visual Excellence
                        <span class="highlight">In Every Pixel</span>
                    </h2>
                    <p class="section-description">
                        Beberapa showcase untuk menggambarkan kualitas, detail, dan arah estetika yang Danova bangun.
                    </p>
                </div>

                <div class="work-grid">
                    @forelse ($projects as $project)
                    @php
                    $workImage = null;
                    if ($project->hero_image) {
                    $workImage = asset('storage/' . $project->hero_image);
                    } elseif ($project->hero_image_url) {
                    $workImage = $project->hero_image_url;
                    }
                    @endphp
                    <a href="{{ route('work.detail', $project->slug) }}" class="work-card">
                        <div class="work-image" @if ($workImage) style="background-image: url('{{ $workImage }}');" @endif></div>
                        <div class="work-title">{{ $project->title }}</div>
                        <div class="work-description">{{ $project->subtitle }}</div>
                    </a>
                    @empty
                    <div class="work-empty-state">
                        <div class="empty-state-icon">
                            <svg width="120" height="120" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="empty-state-title">Portfolio Masih Kosong</h3>
                        <p class="empty-state-description">Project showcase belum tersedia. Tambahkan project pertama Anda dari admin panel untuk memamerkan karya terbaik.</p>
                        <a href="{{ route('admin.projects.index') }}" class="button-primary" style="display: inline-block; margin-top: 1.5rem;">
                            Kelola Projects
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials">
            <div class="container">
                <div class="testimonials-header">
                    <h2 class="section-title">
                        What our clients
                        <span class="highlight">experience</span>
                    </h2>
                    <p class="section-description">Dampak visual, transformasi, dan craftsmanship yang terasa.</p>
                </div>

                <div class="testimonials-grid">
                    @forelse ($testimonials as $t)
                    @php
                    $avatar = null;
                    if ($t->avatar_image) {
                    $avatar = asset('storage/' . $t->avatar_image);
                    } elseif ($t->avatar_url) {
                    $avatar = $t->avatar_url;
                    } else {
                    $avatar = 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=200&h=200&fit=crop';
                    }
                    @endphp
                    <article class="testimonial-card {{ $t->is_featured ? 'featured' : '' }}">
                        <div class="testimonial-author">
                            <img src="{{ $avatar }}" alt="{{ $t->name }}" class="author-avatar-img" loading="lazy" />
                            <div class="author-info">
                                <div class="author-name">{{ $t->name }}</div>
                                <div class="author-title">{{ $t->title }}</div>
                            </div>
                        </div>
                        <p class="testimonial-text">"{{ $t->quote }}"</p>
                    </article>
                    @empty
                    <div class="testimonial-empty-state">
                        <div class="empty-state-icon-testimonial">
                            <svg width="100" height="100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="empty-state-title">Belum Ada Testimonial</h3>
                        <p class="empty-state-description">Testimoni dari klien belum tersedia. Tambahkan feedback klien untuk menunjukkan kepercayaan dan pengalaman mereka.</p>
                        <a href="{{ route('admin.testimonials.index') }}" class="button-secondary" style="display: inline-block; margin-top: 1.5rem;">
                            Kelola Testimonials
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="faq">
            <div class="container">
                <div class="faq-header">
                    <h2 class="section-title">
                        Frequently Asked
                        <span class="highlight">Questions</span>
                    </h2>
                    <p class="section-description">
                        Jawaban untuk pertanyaan yang sering ditanyakan sebelum memulai project.
                    </p>
                </div>

                <div class="faq-list">
                    @forelse ($faqs as $faq)
                    <div class="faq-item">
                        <button class="faq-question" type="button">
                            <span>{{ $faq->question }}</span>
                            <span class="faq-icon">+</span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-content">{{ $faq->answer }}</div>
                        </div>
                    </div>
                    @empty
                    <div class="faq-empty-state">
                        <div class="empty-state-icon-faq">
                            <svg width="100" height="100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="empty-state-title">FAQ Belum Tersedia</h3>
                        <p class="empty-state-description">Pertanyaan yang sering ditanyakan belum ditambahkan. Kelola FAQ untuk membantu calon klien memahami layanan Anda.</p>
                        <a href="{{ route('admin.faqs.index') }}" class="button-primary" style="display: inline-block; margin-top: 1.5rem;">
                            Kelola FAQ
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="contact-card">
                    <div class="contact-content">
                        <h2 class="contact-title">Ready to craft your next masterpiece?</h2>
                        <p class="contact-description">
                            Ceritakan tujuan brand Anda—Danova akan bantu merancang estetika digital yang kuat dan premium.
                        </p>
                        <div class="contact-actions">
                            <a href="{{ route('out.whatsapp', ['context' => 'contact_section']) }}" target="_blank" rel="noreferrer noopener" class="button-white">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                {{ $setting('contact.whatsapp_label', 'WhatsApp Kami') }}
                            </a>
                            <a href="{{ route('out.email', ['context' => 'contact_section']) }}" target="_blank" rel="noreferrer noopener" class="button-outline">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                {{ $setting('contact.email_label', 'Email Danova') }}
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Floating WhatsApp Button -->
    <div class="floating-contacts">
        <a href="{{ route('out.whatsapp', ['context' => 'floating_whatsapp']) }}"
            target="_blank"
            rel="noreferrer noopener"
            class="contact-bubble bubble-whatsapp"
            aria-label="Chat via WhatsApp">
            <span class="contact-bubble-label">WhatsApp</span>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>
        </a>
    </div>

    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="footer-brand">
                    <a href="/" class="footer-logo">
                        @if($setting('branding.header_logo'))
                        <img src="{{ asset('storage/' . $setting('branding.header_logo')) }}" alt="Danova" style="max-height: 28px; display: block;" />
                        @else
                        <span class="logo-icon" aria-hidden="true">D</span>
                        <span>Danova</span>
                        @endif
                    </a>
                    <p class="footer-desc">
                        Danova adalah creative partner untuk web & visual system premium. Detail, hierarchy, dan craftsmanship yang terasa.
                    </p>
                </div>

                <div>
                    <div class="footer-heading">Quick Links</div>
                    <ul class="footer-links">
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#work">Work</a></li>
                    </ul>
                </div>

                <div>
                    <div class="footer-heading">Services</div>
                    <ul class="footer-links">
                        <li><a href="#services">Website Design</a></li>
                        <li><a href="#services">Landing Pages</a></li>
                        <li><a href="#services">Brand Visual System</a></li>
                    </ul>
                </div>

                <div>
                    <div class="footer-heading">Contact</div>
                    <ul class="footer-links">
                        <li><a href="{{ route('out.email', ['context' => 'footer']) }}" target="_blank" rel="noreferrer noopener">Email (Gmail)</a></li>
                        <li><a href="#contact">Start a Project</a></li>
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

        // Smooth scroll for anchor links
        const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerOffset = 88;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: prefersReducedMotion ? 'auto' : 'smooth'
                    });
                }
            });
        });

        // Pricing CTA - Open WhatsApp with package info
        document.querySelectorAll('.pricing-cta').forEach(button => {
            button.addEventListener('click', function(e) {
                const packageName = this.dataset.package;
                const packagePrice = this.dataset.price;
                const planId = this.dataset.planId;

                if (packageName && packagePrice) {
                    e.preventDefault();

                    const outboundUrl = `{{ route('out.pricing') }}?context=pricing_section&plan_id=${encodeURIComponent(planId || '')}&package=${encodeURIComponent(packageName)}&price=${encodeURIComponent(packagePrice)}`;
                    window.open(outboundUrl, '_blank');
                }
            });
        });

        // Brief Builder wizard
        (function() {
            const root = document.getElementById('briefBuilder');
            if (!root) return;

            const totalSteps = 6;
            let currentStep = 1;

            const form = document.getElementById('briefForm');
            const stepLabel = document.getElementById('briefStepLabel');
            const progressFill = document.getElementById('briefProgressFill');
            const errorEl = document.getElementById('briefError');
            const backBtn = document.getElementById('briefBack');
            const nextBtn = document.getElementById('briefNext');
            const actionsEl = document.getElementById('briefActions');

            const resultEl = document.getElementById('briefResult');
            const summaryEl = document.getElementById('briefSummary');
            const editBtn = document.getElementById('briefEdit');
            const copyBtn = document.getElementById('briefCopy');
            const waLink = document.getElementById('briefSendWhatsapp');
            const emailLink = document.getElementById('briefSendEmail');

            const whatsappBase = root.dataset.whatsappUrl || '';
            const emailBase = root.dataset.emailUrl || '';

            const otherMappings = [{
                    radio: 'need',
                    other: 'need_other'
                },
                {
                    radio: 'goal',
                    other: 'goal_other'
                },
                {
                    radio: 'budget',
                    other: 'budget_other'
                },
                {
                    radio: 'timeline',
                    other: 'timeline_other'
                },
            ];

            function setError(message) {
                if (!errorEl) return;
                if (message) {
                    errorEl.textContent = message;
                    errorEl.hidden = false;
                } else {
                    errorEl.textContent = '';
                    errorEl.hidden = true;
                }
            }

            function updateSelectedStyles() {
                root.querySelectorAll('.brief-option').forEach(label => {
                    const input = label.querySelector('input');
                    if (!input) return;
                    const isChecked = input.checked;
                    label.classList.toggle('is-selected', isChecked);
                });
            }

            function syncOtherVisibility() {
                otherMappings.forEach(({
                    radio,
                    other
                }) => {
                    const selected = getValue(radio);
                    const wrap = root.querySelector(`.brief-other[data-other-for="${radio}"]`);
                    const input = form.querySelector(`[name="${CSS.escape(other)}"]`);
                    const isActive = selected === '__other__';

                    if (wrap) wrap.classList.toggle('is-active', isActive);
                    if (input) {
                        input.required = isActive;
                        if (!isActive) {
                            input.value = '';
                        }
                    }
                });
            }

            function showStep(stepNumber) {
                currentStep = stepNumber;
                setError('');

                root.querySelectorAll('.brief-step').forEach(stepEl => {
                    stepEl.classList.toggle('is-active', Number(stepEl.dataset.step) === stepNumber);
                });

                if (stepLabel) stepLabel.textContent = `Step ${stepNumber}/${totalSteps}`;
                if (progressFill) progressFill.style.width = `${Math.round((stepNumber / totalSteps) * 100)}%`;

                if (backBtn) backBtn.disabled = stepNumber === 1;
                if (nextBtn) nextBtn.textContent = stepNumber === totalSteps ? 'Generate Brief' : 'Next';

                updateSelectedStyles();
                syncOtherVisibility();
            }

            function validateStep(stepNumber) {
                const stepEl = form.querySelector(`.brief-step[data-step="${stepNumber}"]`);
                if (!stepEl) return true;

                const required = Array.from(stepEl.querySelectorAll('[required]'));
                const requiredRadioNames = new Set(required.filter(i => i.type === 'radio').map(i => i.name));
                for (const name of requiredRadioNames) {
                    if (!form.querySelector(`input[name="${CSS.escape(name)}"]:checked`)) {
                        return false;
                    }
                }

                const requiredFields = required.filter(i => i.type !== 'radio' && i.type !== 'checkbox');
                for (const field of requiredFields) {
                    if (!String(field.value || '').trim()) {
                        return false;
                    }
                }

                return true;
            }

            function getValue(name) {
                const checked = form.querySelector(`input[name="${CSS.escape(name)}"]:checked`);
                return checked ? checked.value : '';
            }

            function getTextValue(name) {
                const el = form.querySelector(`[name="${CSS.escape(name)}"]`);
                return el ? String(el.value || '').trim() : '';
            }

            function getChoiceOrOther(radioName, otherName) {
                const value = getValue(radioName);
                if (value === '__other__') {
                    return getTextValue(otherName);
                }
                return value;
            }

            function getFeatures() {
                return Array.from(form.querySelectorAll('input[name="features[]"]:checked')).map(i => i.value);
            }

            function buildSummary() {
                const need = getChoiceOrOther('need', 'need_other');
                const goal = getChoiceOrOther('goal', 'goal_other');
                const budget = getChoiceOrOther('budget', 'budget_other');
                const timeline = getChoiceOrOther('timeline', 'timeline_other');
                const features = getFeatures();

                const brand = getTextValue('brand');
                const role = getTextValue('role');
                const url = getTextValue('url');
                const notes = getTextValue('notes');

                const lines = [];
                lines.push('Brief Builder — Danova');
                lines.push('');
                lines.push(`Nama/Brand/Organisasi: ${brand || '-'}`);
                if (role) {
                    lines.push(`Role: ${role}`);
                }
                lines.push(`Website/Sosmed: ${url || '-'}`);
                lines.push('');
                lines.push(`Kebutuhan: ${need || '-'}`);
                lines.push(`Tujuan: ${goal || '-'}`);
                lines.push(`Budget: ${budget || '-'}`);
                lines.push(`Timeline: ${timeline || '-'}`);
                lines.push(`Fitur: ${features.length ? features.join(', ') : '-'}`);
                lines.push('');
                lines.push('Catatan:');
                lines.push(notes || '-');
                return lines.join('\n');
            }

            function buildOutboundLinks(summary) {
                const brand = getTextValue('brand');
                const message = `Hi Danova, saya sudah isi Brief Builder (60 detik).\n\n${summary}\n\nTerima kasih!`;
                const subject = `Brief Builder — ${brand || 'Prospective Client'}`;

                if (waLink && whatsappBase) {
                    waLink.href = `${whatsappBase}?context=brief_builder&message=${encodeURIComponent(message)}`;
                }

                if (emailLink && emailBase) {
                    emailLink.href = `${emailBase}?context=brief_builder&subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(message)}`;
                }
            }

            function openResult() {
                const summary = buildSummary();
                if (summaryEl) summaryEl.textContent = summary;
                buildOutboundLinks(summary);

                if (form) form.hidden = true;
                if (actionsEl) actionsEl.hidden = true;
                if (resultEl) resultEl.hidden = false;
            }

            function closeResult() {
                if (resultEl) resultEl.hidden = true;
                if (form) form.hidden = false;
                if (actionsEl) actionsEl.hidden = false;
                showStep(totalSteps);
            }

            // initial
            showStep(1);
            updateSelectedStyles();
            syncOtherVisibility();

            root.addEventListener('change', (e) => {
                if (e.target && e.target.matches('input, textarea, select')) {
                    setError('');
                    updateSelectedStyles();
                    syncOtherVisibility();
                }
            });

            if (backBtn) {
                backBtn.addEventListener('click', () => {
                    if (currentStep > 1) {
                        showStep(currentStep - 1);
                    }
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    if (!validateStep(currentStep)) {
                        setError('Mohon lengkapi pilihan/field sebelum lanjut.');
                        return;
                    }

                    if (currentStep < totalSteps) {
                        showStep(currentStep + 1);
                        return;
                    }

                    // last step
                    openResult();
                });
            }

            if (editBtn) {
                editBtn.addEventListener('click', () => {
                    closeResult();
                });
            }

            if (copyBtn) {
                copyBtn.addEventListener('click', async () => {
                    const text = summaryEl ? summaryEl.textContent : '';
                    if (!text) return;

                    try {
                        await navigator.clipboard.writeText(text);
                        copyBtn.textContent = 'Copied';
                        setTimeout(() => {
                            copyBtn.textContent = 'Copy';
                        }, 1200);
                    } catch (err) {
                        // fallback
                        const temp = document.createElement('textarea');
                        temp.value = text;
                        temp.style.position = 'fixed';
                        temp.style.left = '-9999px';
                        document.body.appendChild(temp);
                        temp.select();
                        document.execCommand('copy');
                        document.body.removeChild(temp);
                        copyBtn.textContent = 'Copied';
                        setTimeout(() => {
                            copyBtn.textContent = 'Copy';
                        }, 1200);
                    }
                });
            }
        })();

        // Scroll reveal (IntersectionObserver)
        const observerOptions = {
            threshold: 0.12,
            rootMargin: '0px 0px -80px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            });
        }, observerOptions);

        document.querySelectorAll('section').forEach((section) => {
            observer.observe(section);
        });

        // FAQ accordion
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const faqItem = button.parentElement;
                const isActive = faqItem.classList.contains('active');

                // Close all other FAQ items
                document.querySelectorAll('.faq-item').forEach(item => {
                    item.classList.remove('active');
                });

                // Toggle current item
                if (!isActive) {
                    faqItem.classList.add('active');
                }
            });
        });

        // Mobile menu toggle (if needed in future - currently using nav-desktop only)
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', () => {
                // Add mobile menu functionality here if nav-mobile element is added
                console.log('Mobile menu clicked - add mobile nav element to enable');
            });
        }
    </script>
</body>

</html>