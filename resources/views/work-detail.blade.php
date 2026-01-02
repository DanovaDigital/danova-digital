@extends('layouts.app')

@section('title'){{ $project['title'] }} — Danova @endsection
@section('description'){{ $project['subtitle'] }} — Case Study by Danova @endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
<style>
    /* ==========================================================================
       BASE & VARIABLES
       ========================================================================== */

    :root {
        --content-width: 1400px;
        --wide-width: 1400px;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg);
        }

        50% {
            transform: translate(-24px, 24px) rotate(4deg);
        }
    }

    .work-detail [data-reveal] {
        opacity: 0;
        transform: translateY(18px);
        transition: opacity 0.7s ease, transform 0.7s ease;
        will-change: transform, opacity;
    }

    .work-detail [data-reveal].in {
        opacity: 1;
        transform: translateY(0);
    }

    @media (prefers-reduced-motion: reduce) {
        .work-detail [data-reveal] {
            opacity: 1;
            transform: none;
            transition: none;
        }
    }

    /* ==========================================================================
       HERO SECTION
       ========================================================================== */

    .project-hero {
        position: relative;
        padding: calc(5.5rem + 96px) 0 72px;
        background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
    }

    .project-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 80%;
        height: 150%;
        background: radial-gradient(circle, rgba(47, 111, 237, 0.06) 0%, transparent 70%);
        animation: float 18s ease-in-out infinite;
        pointer-events: none;
    }

    .hero-container {
        max-width: var(--content-width);
        margin: 0 auto;
        padding: 0 48px;
        position: relative;
        z-index: 1;
        animation: fadeInUp 0.9s ease-out;
    }

    .project-meta {
        display: inline-flex;
        gap: 32px;
        padding: 12px 24px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 100px;
        margin-bottom: 48px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .meta-label {
        font-size: 13px;
        font-weight: 500;
        color: #6b7280;
    }

    .meta-value {
        font-size: 13px;
        font-weight: 600;
        color: #111827;
    }

    .project-title {
        font-size: 72px;
        font-weight: 700;
        line-height: 1.1;
        letter-spacing: -0.02em;
        color: #111827;
        margin-bottom: 24px;
        max-width: 1200px;
    }

    .project-subtitle {
        font-size: 20px;
        line-height: 1.6;
        color: #6b7280;
        max-width: 700px;
        margin-bottom: 64px;
    }

    .hero-image-wrapper {
        max-width: var(--wide-width);
        margin: 0 auto;
        padding: 0 48px;
        position: relative;
        z-index: 1;
        animation: fadeInUp 0.9s ease-out 0.12s both;
    }

    .project-image {
        width: 100%;
        aspect-ratio: 16 / 9;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        background: #f3f4f6;
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ==========================================================================
       CONTENT SECTIONS
       ========================================================================== */

    .project-content {
        padding: 96px 0;
    }

    .content-container {
        max-width: var(--content-width);
        margin: 0 auto;
        padding: 0 48px;
    }

    .content-section {
        margin-bottom: 120px;
    }

    .content-section:last-child {
        margin-bottom: 0;
    }

    .section-label {
        display: inline-block;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--primary);
        margin-bottom: 16px;
    }

    .section-heading {
        font-size: 48px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -0.01em;
        color: #111827;
        margin-bottom: 24px;
    }

    .section-text {
        font-size: 18px;
        line-height: 1.7;
        color: #4b5563;
    }

    /* ==========================================================================
       CHALLENGE & SOLUTION
       ========================================================================== */

    .challenge-solution-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 64px;
        margin-bottom: 120px;
    }

    .cs-card {
        position: relative;
        padding: 48px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        transition: all 0.3s ease;
        will-change: transform;
    }

    .cs-card:hover {
        border-color: var(--primary);
        box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.08);
        transform: translateY(-4px) scale(1.01) rotate(-0.25deg);
    }

    .cs-icon {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary) 0%, #2563eb 100%);
        color: white;
        border-radius: 12px;
        font-size: 24px;
        margin-bottom: 24px;
    }

    .cs-heading {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 16px;
    }

    .cs-text {
        font-size: 16px;
        line-height: 1.7;
        color: #6b7280;
    }

    /* ==========================================================================
       RESULTS SECTION
       ========================================================================== */

    .results-section {
        background: linear-gradient(135deg, var(--primary) 0%, #2563eb 100%);
        border-radius: 0;
        margin-bottom: 120px;
        width: 100vw;
        margin-left: calc(50% - 50vw);
    }

    .results-inner {
        max-width: var(--wide-width);
        margin: 0 auto;
        padding: 72px 48px;
    }

    .results-header {
        text-align: center;
        margin-bottom: 64px;
    }

    .results-header .section-label {
        color: rgba(255, 255, 255, 0.8);
    }

    .results-header .section-heading {
        color: white;
    }

    .results-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: stretch;
        gap: 32px;
        max-width: none;
        margin: 0 auto;
        padding: 0;
    }

    .result-card {
        text-align: center;
        padding: 24px 20px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        will-change: transform;
        flex: 0 0 auto;
        min-width: 240px;
    }

    .result-card:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-4px) scale(1.02) rotate(0.25deg);
    }

    .result-metric {
        font-size: 48px;
        font-weight: 700;
        line-height: 1.1;
        color: white;
        margin-bottom: 12px;
        max-width: none;
        overflow: visible;
        white-space: nowrap;
    }

    .result-label {
        font-size: 13px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.9);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* ==========================================================================
       FEATURES SECTION
       ========================================================================== */

    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        margin-top: 40px;
    }

    .feature-card {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 32px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        transition: all 0.3s ease;
        will-change: transform;
    }

    .feature-card:hover {
        border-color: var(--primary);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px) scale(1.01) rotate(0.15deg);
    }

    .feature-icon {
        width: 24px;
        height: 24px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary) 0%, #2563eb 100%);
        color: white;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 700;
    }

    .feature-text {
        font-size: 16px;
        line-height: 1.6;
        color: #374151;
    }

    /* ==========================================================================
       TECH STACK SECTION
       ========================================================================== */

    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 16px;
        margin-top: 40px;
    }

    .tech-card {
        padding: 24px 20px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        text-align: center;
        font-size: 15px;
        font-weight: 600;
        color: #111827;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .tech-card:hover {
        border-color: var(--primary);
        background: linear-gradient(135deg, var(--primary) 0%, #2563eb 100%);
        color: white;
        transform: translateY(-2px) scale(1.03) rotate(-0.5deg);
    }

    .tech-icon {
        font-size: 28px;
        line-height: 1;
        opacity: 1;
    }

    .tech-card:hover .tech-icon {
        filter: brightness(0) invert(1);
    }

    .tech-name {
        display: block;
        line-height: 1.2;
    }

    /* ==========================================================================
       TESTIMONIAL SECTION
       ========================================================================== */

    .testimonial-wrapper {
        margin-top: 40px;
    }

    .testimonial-card {
        position: relative;
        padding: 64px;
        background: #111827;
        border-radius: 20px;
        overflow: hidden;
    }

    .testimonial-card::before {
        content: '"';
        position: absolute;
        top: 40px;
        left: 40px;
        font-size: 120px;
        font-family: Georgia, serif;
        color: rgba(255, 255, 255, 0.1);
        line-height: 1;
    }

    .testimonial-content {
        position: relative;
        z-index: 1;
    }

    .testimonial-text {
        font-size: 22px;
        line-height: 1.6;
        color: white;
        margin-bottom: 40px;
        font-weight: 400;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .author-avatar {
        width: 64px;
        height: 64px;
        background: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 700;
        color: white;
        flex-shrink: 0;
    }

    .author-name {
        font-size: 18px;
        font-weight: 600;
        color: white;
        margin-bottom: 4px;
    }

    .author-role {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.6);
    }

    /* ==========================================================================
       CTA SECTION
       ========================================================================== */

    .cta-wrapper {
        margin-top: 120px;
        display: flex;
        justify-content: center;
    }

    .cta-card {
        position: relative;
        padding: 80px 64px;
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        border-radius: 24px;
        text-align: center;
        overflow: hidden;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .cta-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), #2563eb);
    }

    .cta-content {
        position: relative;
        z-index: 1;
        max-width: 920px;
        margin: 0 auto;
        text-align: center;
    }

    .cta-heading {
        font-size: 48px;
        font-weight: 700;
        line-height: 1.2;
        color: white;
        margin-bottom: 20px;
    }

    @media (min-width: 769px) {
        .cta-heading {
            white-space: nowrap;
        }
    }

    .cta-text {
        font-size: 18px;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 40px;
    }

    .work-detail .cta-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 18px 40px;
        background: linear-gradient(135deg, var(--primary) 0%, #2563eb 100%);
        color: white;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px -10px rgba(59, 130, 246, 0.5);
    }

    .work-detail .cta-button:hover {
        background: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 20px 40px -10px rgba(59, 130, 246, 0.6);
    }

    .work-detail .cta-button::after {
        content: '→';
        font-size: 20px;
        transition: transform 0.3s ease;
    }

    .work-detail .cta-button:hover::after {
        transform: translateX(4px);
    }

    /* ==========================================================================
       RESPONSIVE DESIGN
       ========================================================================== */

    @media (max-width: 1024px) {
        .challenge-solution-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {

        .hero-container,
        .hero-image-wrapper,
        .content-container {
            padding: 0 24px;
        }

        .project-hero {
            padding: calc(5.5rem + 56px) 0 56px;
        }

        .project-meta {
            flex-wrap: wrap;
            gap: 16px;
            padding: 12px 20px;
        }

        .meta-item {
            font-size: 12px;
        }

        .project-title {
            font-size: 40px;
        }

        .project-subtitle {
            font-size: 17px;
            margin-bottom: 48px;
        }

        .project-image {
            border-radius: 16px;
        }

        .project-content {
            padding: 72px 0;
        }

        .content-section {
            margin-bottom: 80px;
        }

        .section-heading {
            font-size: 36px;
        }

        .section-text {
            font-size: 16px;
        }

        .cs-card {
            padding: 32px;
        }

        .cs-heading {
            font-size: 24px;
        }

        .results-section {
            margin-bottom: 80px;
        }

        .results-grid {
            grid-template-columns: 1fr;
            gap: 24px;
            padding: 0;
        }

        .results-inner {
            padding: 56px 24px;
        }

        .result-metric {
            font-size: 48px;
        }

        .tech-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .testimonial-card {
            padding: 40px 32px;
        }

        .testimonial-card::before {
            font-size: 80px;
            top: 24px;
            left: 24px;
        }

        .testimonial-text {
            font-size: 18px;
        }

        .author-avatar {
            width: 56px;
            height: 56px;
            font-size: 20px;
        }

        .cta-card {
            padding: 48px 32px;
        }

        .cta-heading {
            font-size: 32px;
        }

        .cta-text {
            font-size: 16px;
        }

        .cta-wrapper {
            margin-top: 80px;
        }
    }
</style>
@endsection

@section('content')
<main class="work-detail">
    <!-- Hero Section -->
    <section class="project-hero">
        <div class="hero-container" data-reveal>
            <div class="project-meta">
                <div class="meta-item">
                    <span class="meta-label">Client:</span>
                    <span class="meta-value">{{ $project['client'] }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Industry:</span>
                    <span class="meta-value">{{ $project['industry'] }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Year:</span>
                    <span class="meta-value">{{ $project['year'] }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Duration:</span>
                    <span class="meta-value">{{ $project['duration'] }}</span>
                </div>
            </div>

            <h1 class="project-title">{{ $project['title'] }}</h1>
            <p class="project-subtitle">{{ $project['subtitle'] }}</p>
        </div>

        <div class="hero-image-wrapper" data-reveal>
            <div class="project-image">
                <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" loading="lazy" decoding="async">
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="project-content">
        <div class="content-container">
            <!-- Challenge & Solution -->
            <div class="challenge-solution-grid">
                <div class="cs-card" data-reveal>
                    <div class="cs-icon">🎯</div>
                    <h2 class="cs-heading">The Challenge</h2>
                    <p class="cs-text">{{ $project['challenge'] }}</p>
                </div>

                <div class="cs-card" data-reveal>
                    <div class="cs-icon">💡</div>
                    <h2 class="cs-heading">Our Solution</h2>
                    <p class="cs-text">{{ $project['solution'] }}</p>
                </div>
            </div>

            <!-- Results -->
            <div class="results-section" data-reveal>
                <div class="results-inner">
                    <div class="results-header">
                        <span class="section-label">Impact</span>
                        <h2 class="section-heading">Results & Achievements</h2>
                    </div>
                    <div class="results-grid">
                        @if(is_array($project['results']) && count($project['results']) > 0)
                        @foreach($project['results'] as $result)
                        <div class="result-card" data-reveal>
                            <div class="result-metric">{{ $result['metric'] ?? '' }}</div>
                            <div class="result-label">{{ $result['label'] ?? '' }}</div>
                        </div>
                        @endforeach
                        @else
                        <p class="muted" style="text-align: center; padding: 40px 0;">No results data available.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="content-section">
                <span class="section-label">Features</span>
                <h2 class="section-heading">Key Features</h2>
                <div class="features-grid">
                    @if(is_array($project['features']) && count($project['features']) > 0)
                    @foreach($project['features'] as $feature)
                    <div class="feature-card" data-reveal>
                        <div class="feature-icon">✓</div>
                        <p class="feature-text">{{ $feature }}</p>
                    </div>
                    @endforeach
                    @else
                    <p class="muted" style="text-align: center; padding: 40px 0;">No features data available.</p>
                    @endif
                </div>
            </div>

            <!-- Tech Stack -->
            <div class="content-section">
                <span class="section-label">Technology</span>
                <h2 class="section-heading">Tech Stack</h2>
                <div class="tech-grid">
                    @php
                    $techIconMap = [
                    'next.js' => 'devicon-nextjs-original',
                    'nextjs' => 'devicon-nextjs-original',
                    'typescript' => 'devicon-typescript-plain',
                    'framer motion' => 'devicon-framermotion-original',
                    'framermotion' => 'devicon-framermotion-original',
                    'tailwind css' => 'devicon-tailwindcss-plain',
                    'tailwind' => 'devicon-tailwindcss-plain',
                    'vercel' => 'devicon-vercel-original',
                    'laravel' => 'devicon-laravel-plain',
                    'php' => 'devicon-php-plain',
                    'javascript' => 'devicon-javascript-plain',
                    'node.js' => 'devicon-nodejs-plain',
                    'nodejs' => 'devicon-nodejs-plain',
                    'vue' => 'devicon-vuejs-plain',
                    'vue.js' => 'devicon-vuejs-plain',
                    'react' => 'devicon-react-original',
                    ];
                    @endphp
                    @if(is_array($project['tech']) && count($project['tech']) > 0)
                    @foreach($project['tech'] as $tech)
                    @php
                    $techKey = strtolower(trim($tech));
                    $iconClass = $techIconMap[$techKey] ?? null;
                    @endphp
                    <div class="tech-card" data-reveal>
                        <i class="tech-icon {{ $iconClass ?? 'devicon-devicon-plain' }} colored" aria-hidden="true"></i>
                        <span class="tech-name">{{ $tech }}</span>
                    </div>
                    @endforeach
                    @else
                    <p class="muted" style="text-align: center; padding: 40px 0;">No tech stack data available.</p>
                    @endif
                </div>
            </div>

            <!-- Testimonial -->
            @if(is_array($project['testimonial']) && !empty($project['testimonial']['text']))
            <div class="content-section">
                <span class="section-label">Testimonial</span>
                <h2 class="section-heading">What Our Client Says</h2>
                <div class="testimonial-wrapper">
                    <div class="testimonial-card" data-reveal>
                        <div class="testimonial-content">
                            <p class="testimonial-text">{{ $project['testimonial']['text'] ?? '' }}</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">{{ !empty($project['testimonial']['author']) ? substr($project['testimonial']['author'], 0, 1) : '?' }}</div>
                                <div class="author-info">
                                    <div class="author-name">{{ $project['testimonial']['author'] ?? 'Anonymous' }}</div>
                                    <div class="author-role">{{ $project['testimonial']['role'] ?? 'Client' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- CTA -->
            <div class="cta-wrapper">
                <div class="cta-card" data-reveal>
                    <div class="cta-content">
                        <h2 class="cta-heading">Siap untuk transformasi serupa?</h2>
                        <p class="cta-text">Mari diskusi bagaimana Danova bisa bantu elevate brand Anda dengan design yang premium dan hasil yang terukur.</p>
                        <a href="{{ route('out.whatsapp', ['context' => 'work_detail', 'project_id' => $project['id'] ?? null, 'project_title' => $project['title'] ?? null]) }}" target="_blank" rel="noreferrer noopener" class="cta-button">
                            Mulai Project Anda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@section('scripts')
(() => {
const nodes = document.querySelectorAll('.work-detail [data-reveal]');
if (!nodes.length) return;

const reducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
if (reducedMotion) {
nodes.forEach((el) => el.classList.add('in'));
return;
}

const io = new IntersectionObserver(
(entries, observer) => {
entries.forEach((entry) => {
if (!entry.isIntersecting) return;
entry.target.classList.add('in');
observer.unobserve(entry.target);
});
},
{ threshold: 0.15, rootMargin: '0px 0px -10% 0px' }
);

nodes.forEach((el) => io.observe(el));
})();
@endsection