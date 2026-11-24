@extends('layouts.app')

@section('title'){{ $project['title'] }} · Danova @endsection
@section('description'){{ $project['subtitle'] ?: $project['title'] }} · Portofolio Danova @endsection

@section('styles')
<style>
    @include('partials.portfolio-styles')

    :root { --primary: #2454a5; }
    .header-content { height: 4.75rem; }
    #header.scrolled { box-shadow: 0 4px 16px rgb(20 39 70 / .06); }
    .work-detail { padding-top: 4.75rem; color: #142746; overflow-wrap: anywhere; }
    .work-detail h1, .work-detail h2 {
        font-family: 'Poppins', sans-serif;
        line-height: 1.06;
        letter-spacing: -.035em;
        text-wrap: balance;
    }
    .work-detail a:focus-visible { outline: 3px solid #2454a5; outline-offset: 4px; }
    .case-wrap { width: min(calc(100% - clamp(2rem, 8vw, 7rem)), 74rem); margin-inline: auto; }
    .case-hero { background: #f1f7ff; border-bottom: 1px solid #dbe8f8; padding: clamp(1.5rem, 5vw, 4rem) 0; }
    .case-back { display: inline-flex; align-items: center; min-height: 44px; gap: .55rem; color: #2454a5; font-weight: 700; }
    .case-back:hover { text-decoration: underline; text-underline-offset: .2em; }
    .case-intro { display: grid; grid-template-columns: minmax(0, 1fr) minmax(13rem, .4fr); align-items: end; gap: 1.5rem 3rem; margin-top: 1.5rem; }
    .case-intro:not(:has(.case-meta)) { grid-template-columns: 1fr; }
    .case-title { font-size: clamp(2.5rem, 6vw, 5rem); font-weight: 700; max-width: 18ch; }
    .case-subtitle { max-width: 60ch; margin-top: .9rem; color: #475569; font-size: clamp(1.05rem, 2vw, 1.3rem); }
    .case-meta { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .85rem; }
    .case-meta > div { padding-top: .55rem; border-top: 1px solid #ccddf2; }
    .case-meta dt { color: #526071; font-size: .82rem; }
    .case-meta dd { font-weight: 700; margin: .1rem 0 0; }
    .case-media { margin-top: clamp(1.5rem, 4vw, 2.6rem); padding: clamp(.45rem, 1.3vw, .85rem); background: #dbeaff; border-radius: clamp(1rem, 3vw, 1.75rem); }
    .case-media > * { border-radius: clamp(.65rem, 2vw, 1.1rem); }
    .case-media .project-preview-image { height: auto; max-height: 70vh; object-fit: contain; background: #eaf3ff; }
    .case-media .project-preview-empty { min-height: clamp(10rem, 23vw, 17rem); }
    .case-media:has(.project-preview-image[hidden]), .case-media:not(:has(img)) { background: #e5e7eb; }
    .case-body { display: grid; gap: clamp(2.4rem, 6vw, 5rem); padding-block: clamp(2.5rem, 7vw, 6rem); }
    .case-section { display: grid; grid-template-columns: minmax(0, .44fr) minmax(0, 1fr); gap: 1rem 2.5rem; padding-top: 1.5rem; border-top: 1px solid #dbe8f8; }
    .work-detail h2 { font-size: clamp(1.7rem, 4vw, 2.65rem); font-weight: 700; }
    .case-copy { color: #475569; font-size: 1.06rem; line-height: 1.75; white-space: pre-line; }
    .case-results { background: #eaf3ff; border-radius: 1.25rem; padding: clamp(1.25rem, 4vw, 2.5rem); }
    .case-results ul { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(14rem, 100%), 1fr)); gap: 1.25rem; margin-top: 1.3rem; list-style: none; }
    .case-results li { border-top: 1px solid #bed5f2; padding-top: .75rem; color: #234577; font-weight: 600; }
    .case-results strong { display: block; color: #193d7f; font: 700 clamp(1.4rem, 3vw, 2.25rem)/1.15 'Poppins', sans-serif; }
    .case-features { list-style: none; color: #475569; }
    .case-features li { padding: .65rem 0; border-bottom: 1px solid #dbe8f8; }
    .case-features li:first-child { padding-top: 0; }
    .case-tech { display: flex; flex-wrap: wrap; gap: .55rem; list-style: none; }
    .case-tech li { padding: .35rem .75rem; border: 1px solid #dbe8f8; border-radius: .5rem; background: #f4f8fe; color: #234577; }
    .case-quote { display: grid; gap: 1rem; padding-left: 1.25rem; border-left: 3px solid #b5d1f5; }
    .case-quote blockquote { color: #253954; font: 600 clamp(1.3rem, 3.4vw, 2.15rem)/1.3 'Poppins', sans-serif; }
    .case-quote figcaption { color: #475569; font-size: .9rem; }
    .case-cta { display: flex; align-items: center; justify-content: space-between; gap: 1rem 2rem; border: 1px solid #dbe8f8; border-radius: 1.25rem; background: #f1f7ff; padding: clamp(1.25rem, 4vw, 2.5rem); }
    .case-cta p { margin-top: .5rem; color: #475569; }
    .case-cta a { flex-shrink: 0; display: inline-grid; place-items: center; min-height: 48px; padding: .65rem 1.15rem; border-radius: .75rem; background: #2454a5; color: #fff; font-weight: 700; }
    .case-cta a:hover { background: #193d7f; }
    @media (max-width: 768px) {
        .header-content { height: 4rem; }
        .work-detail { padding-top: 4rem; }
        .case-intro, .case-section { grid-template-columns: 1fr; }
        .case-cta { flex-direction: column; align-items: start; }
    }
</style>
@endsection

@section('content')
<main class="work-detail">
    <section class="case-hero">
        <div class="case-wrap">
            <a class="case-back" href="{{ route('landing') }}#work"><span aria-hidden="true">←</span> Kembali ke portofolio</a>
            <div class="case-intro">
                <div>
                    <h1 class="case-title">{{ $project['title'] }}</h1>
                    @if ($project['subtitle'])
                        <p class="case-subtitle">{{ $project['subtitle'] }}</p>
                    @endif
                </div>
                @php
                    $metadata = array_filter(
                        ['client' => 'Klien', 'industry' => 'Industri', 'year' => 'Tahun', 'duration' => 'Durasi'],
                        fn ($field) => filled($project[$field]),
                        ARRAY_FILTER_USE_KEY
                    );
                @endphp
                @if ($metadata)
                    <dl class="case-meta">
                        @foreach ($metadata as $field => $label)
                            <div><dt>{{ $label }}</dt><dd>{{ $project[$field] }}</dd></div>
                        @endforeach
                    </dl>
                @endif
            </div>
            <div class="case-media">
                @include('partials.project-preview', ['image' => $project['image'], 'title' => $project['title'], 'loading' => 'eager'])
            </div>
        </div>
    </section>

    <div class="case-wrap case-body">
        @foreach (['challenge' => 'Tantangan proyek', 'solution' => 'Pendekatan Danova'] as $field => $label)
            @if (filled($project[$field]))
                <section class="case-section">
                    <h2>{{ $label }}</h2>
                    <p class="case-copy">{{ $project[$field] }}</p>
                </section>
            @endif
        @endforeach

        <section class="{{ $project['results'] ? 'case-results' : 'case-section' }}">
            <h2>Hasil proyek</h2>
            @if ($project['results'])
                <ul>
                    @foreach ($project['results'] as $result)
                        @if (is_array($result))
                            <li>
                                @if (!empty($result['metric']))<strong>{{ $result['metric'] }}</strong>@endif
                                {{ $result['label'] ?? '' }}
                            </li>
                        @else
                            <li>{{ $result }}</li>
                        @endif
                    @endforeach
                </ul>
            @else
                <div class="empty-panel">Hasil proyek belum dipublikasikan.</div>
            @endif
        </section>

        @foreach (['features' => 'Fitur utama', 'tech' => 'Teknologi'] as $field => $label)
            <section class="case-section">
                <h2>{{ $label }}</h2>
                @if ($project[$field])
                    <ul class="{{ $field === 'tech' ? 'case-tech' : 'case-features' }}">
                        @foreach ($project[$field] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @else
                    <div class="empty-panel">Informasi belum tersedia.</div>
                @endif
            </section>
        @endforeach

        @if (!empty($project['testimonial']['text']))
            <section class="case-section">
                <h2>Kata klien</h2>
                <figure class="case-quote">
                    <blockquote>“{{ $project['testimonial']['text'] }}”</blockquote>
                    @if (filled($project['testimonial']['author'] ?? null) || filled($project['testimonial']['role'] ?? null))
                        <figcaption>
                            @if (filled($project['testimonial']['author'] ?? null))
                                <strong>{{ $project['testimonial']['author'] }}</strong>
                            @endif
                            @if (filled($project['testimonial']['author'] ?? null) && filled($project['testimonial']['role'] ?? null)) · @endif
                            {{ $project['testimonial']['role'] ?? '' }}
                        </figcaption>
                    @endif
                </figure>
            </section>
        @endif

        <section class="case-cta">
            <div>
                <h2>Punya proyek serupa?</h2>
                <p>Diskusikan kebutuhan Anda dengan tim Danova.</p>
            </div>
            <a href="{{ route('out.whatsapp', ['context' => 'work_detail', 'project_id' => $project['id'], 'project_title' => $project['title']]) }}">Diskusikan via WhatsApp</a>
        </section>
    </div>
</main>
@endsection
