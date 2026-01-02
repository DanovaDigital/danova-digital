{{-- Page-specific styles untuk welcome.blade.php --}}
@section('styles')
<style>
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

    .hero p {
        font-size: var(--font-body);
        color: var(--medium-gray);
        line-height: var(--lh-body);
        margin-bottom: var(--space-xl);
        max-width: 600px;
        animation: fadeInUp 1s ease-out 0.6s backwards;
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

    /* ... Tambahkan semua styles lainnya di sini untuk sections: about, services, work, testimonials, FAQ, pricing, contact, floating contacts ... */
    /* Saya akan continue dengan styles yang lebih compact */
</style>
@endsection