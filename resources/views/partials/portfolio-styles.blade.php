        .empty-panel {
            grid-column: 1 / -1;
            padding: clamp(1.5rem, 4vw, 3rem);
            border: 1px dashed #cbd5e1;
            border-radius: 1rem;
            background: #f4f5f7;
            color: #526071;
            text-align: center;
            font-size: .95rem;
        }
        .empty-panel h3 { font-weight: 700; color: #465260; }
        .empty-panel p { margin: .35rem 0 0; }
        .empty-panel a { color: inherit; text-decoration: underline; text-underline-offset: .2em; }
        .project-preview-image { display: block; width: 100%; height: 100%; object-fit: cover; }
        .project-preview-empty {
            display: grid;
            min-height: 9rem;
            height: 100%;
            place-items: center;
            padding: 1rem;
            background: #eef0f3;
            color: #526071;
            text-align: center;
            font-size: .9rem;
        }
        .project-preview-image[hidden], .project-preview-empty[hidden], .review-initial[hidden] { display: none; }
        .comparison-sheet { border: 1px solid #d8e5f5; border-radius: 1.5rem; overflow: hidden; background: #fff; }
        .comparison-row { display: grid; grid-template-columns: minmax(8rem, .65fr) repeat(2, minmax(0, 1fr)); }
        .comparison-row + .comparison-row { border-top: 1px solid #d8e5f5; }
        .comparison-row > * { padding: clamp(1rem, 2.5vw, 1.75rem); }
        .comparison-row dt { color: #142746; font-weight: 700; }
        .comparison-row dd { margin: 0; color: #475569; line-height: 1.55; }
        .comparison-row dd:last-child { color: #1b3b68; background: #eaf3ff; }
        .comparison-row dd span { display: block; margin-bottom: .35rem; font-size: .8rem; font-weight: 700; }

        .work-heading { display: flex; justify-content: space-between; align-items: end; gap: 1rem 2rem; }
        .work-heading .section-header { margin-bottom: 0; }
        .work-heading .service-action { margin: 0 0 -.4rem auto; flex-shrink: 0; }
        .work-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(17rem, 100%), 1fr)); gap: 2rem clamp(1rem, 2.5vw, 2.25rem); }
        .work-tile { min-width: 0; border-bottom: 1px solid #dbe8f8; }
        .work-tile-link { display: block; height: 100%; padding-bottom: 1.25rem; border-radius: 1.25rem 1.25rem 0 0; }
        .work-media { aspect-ratio: 1.55; overflow: hidden; border-radius: 1.25rem; background: #eef0f3; }
        .work-media .project-preview-image { transition: transform .35s ease; }
        .work-caption { display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-top: 1rem; }
        .work-caption h3 { color: #142746; font-size: clamp(1.35rem, 2.1vw, 1.8rem); font-weight: 750; line-height: 1.12; overflow-wrap: anywhere; }
        .work-industry { font-size: .82rem; color: #2454a5; font-weight: 700; margin-bottom: .3rem; }
        .work-arrow { display: grid; place-items: center; flex: 0 0 2.75rem; height: 2.75rem; border: 1px solid #dbe8f8; border-radius: 50%; color: #2454a5; font-size: 1.25rem; }
        .work-tile-link:is(:hover, :focus-visible) .work-arrow { background: #2454a5; color: #fff; }
        .work-description, .work-proof { margin-top: .65rem; color: #475569; overflow-wrap: anywhere; }
        .work-proof { width: fit-content; padding: .3rem .65rem; background: #eaf3ff; color: #193d7f; border-radius: .5rem; font-size: .86rem; font-weight: 700; }
        @media (hover: hover) and (prefers-reduced-motion: no-preference) {
            .work-tile-link:hover .project-preview-image { transform: scale(1.035); }
        }

        .studio-split { display: grid; grid-template-columns: minmax(0, .85fr) minmax(0, 1.15fr); gap: clamp(1.5rem, 5vw, 5rem); }
        .studio-timeline { counter-reset: stage; list-style: none; margin: 0 0 0 1.25rem; padding: 0; }
        .studio-timeline li { position: relative; counter-increment: stage; padding: 0 0 2rem 2.1rem; border-left: 1px solid #c5daf5; }
        .studio-timeline li:last-child { border-color: transparent; padding-bottom: 0; }
        .studio-timeline li::before { content: counter(stage, decimal-leading-zero); position: absolute; left: -1.25rem; top: 0; width: 2.5rem; height: 2.5rem; display: grid; place-items: center; border: 1px solid #ccdef5; border-radius: 50%; background: #eaf3ff; color: #193d7f; font-weight: 700; }
        .studio-timeline h3 { color: #142746; font-weight: 750; font-size: clamp(1.25rem, 2.3vw, 1.75rem); margin: 0 0 .35rem; padding-top: .25rem; }
        .studio-timeline p { margin: 0; color: #475569; line-height: 1.6; }
        .studio-timeline .timeline-output { margin-top: .65rem; color: #234577; font-weight: 700; }

        .studio-reviews { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.25rem; }
        .studio-review { display: flex; flex-direction: column; justify-content: space-between; gap: 1.2rem; margin: 0; padding: 1.4rem 0; border-top: 1px solid #cfdded; }
        .studio-review-featured { grid-column: 1 / -1; border: 0; border-radius: 1.5rem; padding: clamp(1.25rem, 4vw, 3rem); background: #e6f0ff; }
        .studio-review blockquote { margin: 0; color: #253954; font-size: 1.1rem; line-height: 1.55; overflow-wrap: anywhere; }
        .studio-review-featured blockquote { max-width: 42ch; font-size: clamp(1.4rem, 3vw, 2.45rem); font-family: 'Poppins', sans-serif; line-height: 1.2; letter-spacing: -.025em; }
        .studio-review figcaption { display: flex; align-items: center; gap: .75rem; color: #142746; }
        .studio-review img, .review-initial { width: 2.75rem; height: 2.75rem; flex-shrink: 0; border-radius: 50%; object-fit: cover; }
        .review-initial { display: grid; place-items: center; background: #e2e8f0; color: #465260; font-weight: 700; }
        .studio-review figcaption p { margin: .12rem 0 0; font-size: .86rem; color: #475569; }
        .cta-banner { box-shadow: none; border: 1px solid #d1e3fc; }
        .cta-banner a { box-shadow: none; }

        @media (max-width: 700px) {
            .work-heading { flex-direction: column; align-items: start; gap: .4rem; }
            .work-heading .service-action { align-self: end; margin: 0; }
            .studio-split, .studio-reviews { grid-template-columns: 1fr; }
        }
        @media (max-width: 580px) {
            .comparison-row { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .comparison-row dt { grid-column: 1 / -1; padding-bottom: .55rem; background: #f6f9fd; }
            .comparison-row dd { font-size: .9rem; padding: .8rem; }
        }
