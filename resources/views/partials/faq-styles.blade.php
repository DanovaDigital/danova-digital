        #faq { background: #eef5ff; }
        .faq-layout {
            display: grid;
            grid-template-columns: minmax(0, .72fr) minmax(0, 1.28fr);
            align-items: start;
            gap: clamp(1rem, 3.5vw, 3rem);
        }
        .faq-intro {
            display: grid;
            align-content: space-between;
            min-height: 32rem;
            padding: clamp(1.25rem, 3vw, 2.5rem);
            border-radius: 1.75rem;
            background: #173765;
            color: #fff;
        }
        .faq-art { position: relative; display: grid; place-items: center; width: min(100%, 16rem); aspect-ratio: 1.3; margin: 0 auto 1.5rem; isolation: isolate; }
        .faq-art::before, .faq-art::after {
            content: "";
            position: absolute;
            inset: 12% 2%;
            border: 1px solid rgb(213 234 255 / .32);
            border-radius: 50%;
            rotate: -24deg;
        }
        .faq-art::after { rotate: 22deg; inset: 16% 7%; }
        .faq-art span {
            z-index: 1;
            display: grid;
            place-items: center;
            width: 54%;
            aspect-ratio: 1;
            border-radius: 36% 36% 36% 14%;
            background: #cde4ff;
            color: #173765;
            font: 700 clamp(3rem, 7vw, 5.4rem)/1 Poppins, sans-serif;
            rotate: -9deg;
        }
        .faq-intro h2 { font-size: clamp(1.8rem, 3.3vw, 3.2rem); font-weight: 700; line-height: 1.1; letter-spacing: -.035em; }
        .faq-intro p { margin-top: .8rem; color: #dceafe; max-width: 33ch; }
        .faq-intro a { display: inline-flex; align-items: center; gap: .55rem; min-height: 44px; margin-top: .8rem; color: #fff; font-weight: 700; }
        .faq-intro a:hover { text-decoration: underline; text-underline-offset: .25em; }
        .faq-intro a:focus-visible { outline-color: #dceafe; }
        .faq-library { min-width: 0; padding: clamp(.85rem, 2.5vw, 1.8rem); border: 1px solid #d5e4f7; border-radius: 1.75rem; background: #fff; }
        .faq-search { margin-bottom: 1rem; }
        .faq-search label { display: block; margin-bottom: .45rem; color: #173765; font-weight: 700; }
        .faq-search-field { display: flex; align-items: center; padding-left: .85rem; color: #2454a5; background: #f1f6fe; border: 1px solid #c8dbf4; border-radius: .8rem; }
        .faq-search-field svg { flex: none; }
        .faq-search-field input { flex: 1; min-width: 0; min-height: 48px; padding: .55rem .8rem; background: transparent; border-radius: .75rem; color: #142746; font-size: 1rem; }
        .faq-search-field input::placeholder { color: #526071; }
        .faq-entries { display: grid; gap: .35rem; }
        .faq-entry { min-width: 0; border: 1px solid transparent; border-bottom-color: #e0eaf7; border-radius: .8rem; }
        .faq-entry:not([open]):last-child { border-bottom-color: transparent; }
        .faq-entry[open] { border-color: #c9ddf9; background: #edf5ff; }
        .faq-entry[hidden], .faq-search[hidden], #faq-no-results[hidden] { display: none; }
        .faq-entry summary { display: grid; grid-template-columns: minmax(0, 1fr) 2rem; align-items: center; gap: .75rem; min-height: 58px; padding: .7rem .85rem; list-style: none; border-radius: .75rem; color: #173765; cursor: pointer; font-weight: 700; }
        .faq-entry summary::-webkit-details-marker { display: none; }
        .faq-entry summary:hover { background: #f0f6ff; }
        .faq-entry summary:focus-visible { outline-offset: -3px; }
        .faq-toggle-mark { position: relative; display: grid; place-items: center; width: 2rem; height: 2rem; border-radius: 50%; background: #e4effe; color: #2454a5; }
        .faq-toggle-mark::before, .faq-toggle-mark::after { content: ""; position: absolute; width: .75rem; height: 2px; border-radius: 1px; background: currentColor; }
        .faq-toggle-mark::after { rotate: 90deg; }
        .faq-entry[open] .faq-toggle-mark { background: #2454a5; color: #fff; }
        .faq-entry[open] .faq-toggle-mark::after { display: none; }
        .faq-response { max-width: 66ch; padding: 0 .85rem 1rem; color: #3b516e; line-height: 1.7; white-space: pre-line; overflow-wrap: anywhere; }

        @media (max-width: 767px) {
            .faq-layout { grid-template-columns: 1fr; }
            .faq-intro { grid-template-columns: minmax(0, 1fr) minmax(4rem, .4fr); align-items: center; gap: .65rem; min-height: 0; }
            .faq-art { grid-column: 2; grid-row: 1; margin: 0; }
            .faq-art span { font-size: clamp(1.65rem, 6vw, 3rem); }
            .faq-intro-copy { grid-column: 1; grid-row: 1; }
            .faq-intro h2 { font-size: clamp(1.4rem, 6vw, 2.4rem); }
        }
