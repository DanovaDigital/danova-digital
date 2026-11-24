        :root {
            --studio-sky: #DBEAFF;
            --studio-ice: #CEE5FC;
            --studio-mist: #D4EFFA;
            --studio-paper: #F7FAFF;
        }

        #content { padding-top: 76px; }
        .studio-hero { background: var(--studio-paper); overflow: clip; }
        .hero-title {
            max-width: 13ch;
            font-size: clamp(3rem, 5.3vw, 4.75rem);
            font-weight: 700;
            line-height: 1.07;
            letter-spacing: -.04em;
        }
        .hero-lead { max-width: 46ch; }
        .hero-cta { flex-wrap: wrap; }
        .hero-cta a { padding-inline: clamp(1rem, 2vw, 1.75rem); }
        .hero-cta a:first-child { background: var(--danova-blue); }
        .hero-cta a:first-child:hover { background: #193D7F; }
        .studio-stats .grid > div { padding-inline: .25rem; }
        #content > .studio-stats:not(:first-child) { padding-block: clamp(1.6rem, 3vw, 2.4rem); }
        .section-header h2 { font-size: clamp(2rem, 4vw, 3.375rem); }
        .section-header > span { text-transform: none; letter-spacing: normal; }
        .service-card p { font-size: .975rem; }
        .service-card, .pricing-card { border-width: 1px; }
        #compare, #workflow, #testimonials { background: var(--studio-paper); }
        .studio-featured { background: var(--studio-sky); }
        .cta-banner { background: var(--studio-sky); }
        .cta-banner h2 { font-size: clamp(2.15rem, 4.5vw, 4rem); }
        .cta-banner a:first-child { background: var(--danova-blue); }
        #header nav.mobile-nav a.bg-brand-primary { color: white; background: var(--danova-blue); }
        .mobile-menu-toggle { min-width: 46px; min-height: 46px; }
        .service-action {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            width: fit-content;
            min-height: 44px;
            margin-top: 1rem;
            color: var(--danova-blue);
            font-weight: 700;
        }
        .service-action:hover { text-decoration: underline; text-underline-offset: .2em; }
        #briefForm[hidden], #briefResult[hidden] { display: none; }
        .brief-field {
            display: grid;
            min-width: 0;
            gap: .45rem;
            color: var(--danova-ink);
            font-weight: 700;
        }
        .brief-field small { margin-left: .25rem; color: #475569; font-weight: 400; }
        .brief-field :is(input, select, textarea) {
            width: 100%;
            min-height: 48px;
            padding: .65rem .8rem;
            border: 1px solid #b4cbe8;
            border-radius: .75rem;
            background: var(--studio-paper);
            font-size: 1rem;
            font-weight: 400;
        }
        .brief-field textarea { resize: vertical; }
        #briefSummary { overflow-wrap: anywhere; }

        .studio-art {
            position: relative;
            isolation: isolate;
            aspect-ratio: 1.14;
            container-type: inline-size;
            margin: 0;
            border-radius: 11% 11% 11% 4%;
            background: var(--studio-sky);
        }
        .studio-art::before {
            content: "";
            position: absolute;
            inset: 5%;
            border-radius: inherit;
            border: 1px solid rgb(36 84 165 / .15);
        }
        .studio-browser, .studio-phone {
            position: absolute;
            background: #fff;
            border: 1px solid rgb(36 84 165 / .18);
            box-shadow: 0 4cqw 8cqw rgb(25 61 127 / .16);
        }
        .studio-browser { inset: 14% 12% 19% 7%; border-radius: 4cqw; overflow: hidden; }
        .studio-chrome {
            display: flex;
            gap: .9cqw;
            padding: 2.2cqw 3cqw;
            background: #F2F7FF;
            border-bottom: 1px solid #E3EDF9;
        }
        .studio-chrome i { width: 1.3cqw; aspect-ratio: 1; border-radius: 50%; background: #9CB9E0; }
        .studio-screen { padding: 2.75cqw 3cqw; }
        .studio-site-nav { display: flex; align-items: center; gap: 1.25cqw; margin-bottom: 2cqw; }
        .studio-site-nav b {
            margin-right: auto;
            display: grid;
            place-items: center;
            width: 4.5cqw;
            aspect-ratio: 1;
            border-radius: 1cqw;
            background: var(--danova-blue);
            color: white;
            font-size: 2.65cqw;
        }
        .studio-site-nav i, .studio-site-story i, .studio-phone-copy i {
            display: block;
            width: 8cqw;
            height: .7cqw;
            border-radius: 1cqw;
            background: #AAC5E7;
        }
        .studio-site-cover {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 27cqw;
            border-radius: 2.8cqw;
            overflow: hidden;
            background: #EFF6FF;
        }
        .studio-site-story { align-self: center; padding: 2.5cqw; }
        .studio-site-story b, .studio-phone-copy b {
            display: block;
            color: var(--danova-ink);
            font: 700 5.65cqw/.94 'Poppins', sans-serif;
            letter-spacing: -.04em;
        }
        .studio-site-story i, .studio-phone-copy i { margin-block: 2cqw 1.5cqw; width: 70%; }
        .studio-site-story span, .studio-phone-copy span {
            display: block;
            width: 38%;
            height: 2.7cqw;
            border-radius: 2cqw;
            background: var(--danova-blue);
        }
        .studio-shapes { position: relative; overflow: hidden; background: #C8DDFA; }
        .studio-shapes i { position: absolute; display: block; }
        .studio-shapes i:nth-child(1) {
            inset: 12% 12% 10% 30%;
            border-radius: 50% 50% 10% 10%;
            background: var(--studio-ice);
            rotate: -23deg;
        }
        .studio-shapes i:nth-child(2) {
            inset: 31% 42% 7% 9%;
            border-radius: 55% 8% 55% 8%;
            background: #78A6DD;
            rotate: 18deg;
        }
        .studio-shapes i:nth-child(3) {
            inset: 49% 8% 7% 49%;
            border-radius: 50%;
            background: var(--studio-mist);
        }
        .studio-site-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5cqw; margin-top: 2cqw; }
        .studio-site-grid i { height: 6cqw; border-radius: 1.5cqw; background: var(--studio-mist); }
        .studio-site-grid i:nth-child(2) { background: var(--studio-ice); }
        .studio-site-grid i:nth-child(3) { background: #E0EEFF; }
        .studio-phone {
            inset: 30% 6% 9% auto;
            width: 26%;
            padding: 2cqw;
            border: .85cqw solid #264A7C;
            border-radius: 5cqw;
            rotate: 8deg;
            overflow: hidden;
        }
        .studio-phone-camera { width: 5cqw; height: 1cqw; margin: 0 auto 2cqw; border-radius: 1cqw; background: #264A7C; }
        .studio-phone-cover { height: 44%; }
        .studio-phone-cover .studio-shapes { height: 100%; border-radius: 2cqw; }
        .studio-phone-copy { padding-top: 2cqw; }
        .studio-phone-copy b { font-size: 3.6cqw; }
        .studio-phone-copy span { height: 2cqw; }
        .studio-badge {
            position: absolute;
            left: 4%;
            bottom: 8%;
            display: flex;
            align-items: center;
            gap: 1.5cqw;
            padding: 1.6cqw 2.7cqw 1.6cqw 1.75cqw;
            border-radius: 5cqw;
            background: #F1FAFF;
            color: #1D4C77;
            box-shadow: 0 2cqw 5cqw rgb(25 61 127 / .12);
            font-size: clamp(.72rem, 2.65cqw, .95rem);
            font-weight: 700;
        }
        .studio-badge span {
            display: grid;
            place-items: center;
            width: 4.7cqw;
            aspect-ratio: 1;
            border-radius: 50%;
            background: var(--studio-mist);
        }

        .studio-motion-controls {
            display: flex;
            justify-content: flex-end;
            margin-top: .4rem;
        }
        .studio-motion-controls[hidden] { display: none; }
        .studio-motion-toggle {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            min-height: 44px;
            padding: .25rem .65rem;
            border-radius: .65rem;
            color: #234577;
            font-size: .85rem;
            font-weight: 700;
        }
        .studio-motion-toggle:hover { background: var(--studio-sky); }
        .studio-motion-icon {
            width: .6rem;
            height: .65rem;
            border-inline: 2px solid currentColor;
        }
        .studio-motion-toggle.is-paused .studio-motion-icon {
            width: 0;
            height: 0;
            border: .33rem solid transparent;
            border-left: .5rem solid currentColor;
            border-right: 0;
        }

        @keyframes studio-phone-bob {
            0%, 100% { translate: 0 0; }
            45% { translate: 0 -3cqw; }
            70% { translate: 0 -.85cqw; }
            84% { translate: 0 -1.25cqw; }
        }
        @keyframes studio-badge-bob {
            50% { translate: 0 1.6cqw; }
        }
        @keyframes studio-shape-drift {
            50% { translate: 12% -12%; scale: 1.08; }
        }
        @media (prefers-reduced-motion: no-preference) {
            .studio-art:not(.has-gsap-motion) .studio-phone { animation: studio-phone-bob 4.8s ease-in-out .9s infinite paused; }
            .studio-art:not(.has-gsap-motion) .studio-badge { animation: studio-badge-bob 4.8s ease-in-out .9s infinite paused; }
            .studio-art:not(.has-gsap-motion) .studio-shapes i:nth-child(3) { animation: studio-shape-drift 5.6s ease-in-out .9s infinite paused; }
            .studio-art.is-moving:not(.has-gsap-motion) :is(.studio-phone, .studio-badge, .studio-shapes i:nth-child(3)) { animation-play-state: running; }
            .studio-art.has-gsap-motion {
                --studio-phone-lift: 0;
                --studio-badge-lift: 0;
                --studio-shape-drift: 0;
            }
            .has-gsap-motion .studio-phone { translate: 0 calc(var(--studio-phone-lift) * 1cqw); }
            .has-gsap-motion .studio-badge { translate: 0 calc(var(--studio-badge-lift) * 1cqw); }
            .has-gsap-motion .studio-shapes i:nth-child(3) {
                translate: calc(var(--studio-shape-drift) * 1%) calc(var(--studio-shape-drift) * -1%);
            }
        }

        @media (min-width: 1024px) and (max-width: 1199px) {
            #header .project-status { display: none; }
            #header nav { gap: 1rem; }
        }
        @media (max-width: 1023px) {
            #content { padding-top: 68px; }
            #header .mobile-nav { max-height: calc(100dvh - 68px); overflow-y: auto; }
            .hero-title { max-width: 15ch; }
        }
        @media (min-width: 640px) and (max-width: 1023px) {
            .hero-title { margin-inline: auto; }
        }
        @media (max-width: 639px) {
            #content > section > .container { padding-inline: 1.125rem; }
            #content > #contact > .container { padding-inline: 0; }
            .hero-title { font-size: clamp(2.55rem, 10vw, 3.75rem); }
            .hero-lead { margin-bottom: 1.5rem; }
            .hero-cta { gap: .65rem; }
            .studio-stats .grid > div:nth-child(even) { border-right: 0; }
            .service-card, .pricing-card { padding: 1.25rem; }
            .pricing-card { min-width: 0; }
            .pricing-card .text-3xl { overflow-wrap: anywhere; }
        }
        @media (hover: none), (prefers-reduced-motion: reduce) {
            .apple-spring:hover, .apple-card-hover:hover { transform: none; }
        }
