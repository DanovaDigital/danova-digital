        #deliverables { background: var(--studio-paper); }
        .deliverable-layout { display: grid; grid-template-columns: minmax(0, .88fr) minmax(0, 1.12fr); gap: clamp(1.5rem, 5vw, 4.5rem); }
        .deliverable-ownership {
            display: grid;
            align-content: center;
            padding: clamp(1.4rem, 4vw, 2.75rem);
            border-radius: 1.65rem;
            background: #173765;
            color: white;
        }
        .ownership-value { font: 700 clamp(3.3rem, 7vw, 5.5rem)/.95 Poppins, sans-serif; letter-spacing: -.075em; color: #cae3ff; }
        .deliverable-ownership h3 { margin: .75rem 0 .5rem; font-size: clamp(1.25rem, 2.7vw, 1.8rem); }
        .deliverable-ownership p:last-child { color: #e1edff; max-width: 42ch; line-height: 1.6; }
        .ownership-assets {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: .4rem;
            margin: 1rem 0;
        }
        .ownership-assets li {
            display: grid;
            justify-items: center;
            align-content: start;
            gap: .55rem;
            padding: .75rem .2rem .55rem;
            border: 1px solid #50739f;
            border-radius: .65rem;
            background: #204471;
            color: #ecf5ff;
            font-size: .9rem;
            text-align: center;
        }
        .asset-symbol { position: relative; display: grid; place-items: center; width: 1.6rem; height: 1.6rem; color: #d2e8ff; }
        .asset-host::before { content: ""; width: 1.3rem; height: .35rem; border: 1px solid currentColor; border-radius: .12rem; box-shadow: 0 .35rem 0 -.04rem #204471, 0 .35rem 0 currentColor; translate: 0 -.2rem; }
        .asset-code::before { content: "</>"; font: 700 .86rem/1 monospace; }
        .asset-data::before { content: ""; width: 1.05rem; height: 1.2rem; border: 1px solid currentColor; border-radius: 50% / 20%; }
        .asset-data::after { content: ""; position: absolute; width: 1.05rem; height: .45rem; border: 1px solid currentColor; border-radius: 50%; top: .2rem; }
        .deliverable-list { display: grid; align-content: center; }
        .deliverable-list article { display: grid; grid-template-columns: 2.25rem minmax(0, 1fr); gap: .85rem; padding: 1.15rem 0; border-top: 1px solid #d5e4f7; }
        .deliverable-list article:last-child { border-bottom: 1px solid #d5e4f7; }
        .deliverable-check { display: grid; place-items: center; width: 2.15rem; aspect-ratio: 1; border-radius: 50%; background: #e5efff; color: #2454a5; }
        .deliverable-list h3 { color: #142746; font-size: clamp(1.03rem, 2vw, 1.28rem); }
        .deliverable-list p { margin-top: .25rem; color: #475569; line-height: 1.6; }

        #transformation { background: #fff; }
        .transformation-board { padding: clamp(.85rem, 2.75vw, 2rem); border: 1px solid #d5e4f7; border-radius: 1.6rem; background: #f6faff; }
        .transformation-flow { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .7rem; margin-bottom: 1.2rem; }
        .flow-path { display: grid; justify-items: center; padding: clamp(.75rem, 2vw, 1.3rem); border-radius: 1rem; background: #eef1f5; color: #334963; text-align: center; }
        .flow-website { background: #deedff; color: #173765; }
        .flow-path h3 { margin-bottom: .75rem; font-size: .9rem; }
        .flow-nodes { display: flex; justify-content: center; gap: .35rem; width: 100%; }
        .flow-nodes span { padding: .32rem .52rem; border: 1px solid #c7d4e4; border-radius: .5rem; background: white; font-size: .875rem; font-weight: 700; }
        .flow-website .flow-nodes span { border-color: #adc9ed; }
        .flow-connector { width: min(55%, 7rem); height: .8rem; border: 1px solid #9fb2cb; border-top: 0; border-radius: 0 0 .45rem .45rem; }
        .flow-connector::after { content: ""; display: block; width: 1px; height: .7rem; margin: .75rem auto 0; background: #9fb2cb; }
        .flow-path p { margin-top: .7rem; font-size: .95rem; font-weight: 700; line-height: 1.35; }
        .transformation-row { display: grid; grid-template-columns: minmax(8rem, .6fr) minmax(0, 1fr) 2rem minmax(0, 1.25fr); align-items: stretch; gap: .65rem; }
        .transformation-row + .transformation-row { margin-top: .65rem; }
        .transformation-row h3 { align-self: center; padding: .25rem; color: #142746; font-size: 1.05rem; }
        .transformation-state { padding: clamp(.7rem, 1.8vw, 1.25rem); border-radius: .9rem; color: #334963; line-height: 1.5; }
        .transformation-state strong { display: block; margin-bottom: .25rem; font-size: .9rem; }
        .transformation-before { background: #eef1f5; }
        .transformation-after { background: #e0eeff; }
        .transformation-after strong { color: #2454a5; }
        .transformation-arrow { display: grid; place-items: center; align-self: center; height: 2rem; border-radius: 50%; background: white; color: #2454a5; }

        .payment-panel { max-width: 72rem; margin: clamp(2.5rem, 6vw, 4rem) auto 0; padding: clamp(1.15rem, 4vw, 2.75rem); border: 1px solid #d5e4f7; border-radius: 1.6rem; background: #f3f8ff; }
        .payment-heading h3 { max-width: 30ch; color: #142746; font-size: clamp(1.4rem, 3.15vw, 2.4rem); line-height: 1.15; letter-spacing: -.025em; }
        .payment-heading p { margin-top: .6rem; color: #475569; }
        .payment-steps { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 2px; margin-top: 1.3rem; overflow: hidden; border-radius: 1rem; }
        .payment-steps li { display: flex; align-items: start; gap: clamp(.65rem, 2vw, 1.3rem); padding: clamp(.95rem, 2.5vw, 1.65rem); background: #deebff; color: #173765; }
        .payment-steps li:last-child { background: #2454a5; color: #fff; }
        .payment-amount { flex: none; font: 700 clamp(1.55rem, 4vw, 3.3rem)/1 Poppins, sans-serif; letter-spacing: -.07em; }
        .payment-steps h4, .payment-support dt { font-weight: 700; }
        .payment-steps p, .payment-support dd { margin-top: .25rem; font-size: .92rem; line-height: 1.55; }
        .payment-support { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1rem; margin-top: 1.35rem; }
        .payment-support > div { padding-top: .75rem; border-top: 1px solid #d5e4f7; }
        .payment-support dt { color: #142746; }
        .payment-support dd { color: #475569; }

        #brief { background: #eef5ff; }
        .brief-calculator { display: grid; grid-template-columns: minmax(0, 1.65fr) minmax(15rem, 1fr); align-items: start; gap: clamp(1rem, 3vw, 2rem); }
        .brief-config, .brief-result {
            min-width: 0;
            padding: clamp(1rem, 3vw, 2rem);
            border: 1px solid #d5e4f7;
            border-radius: 1.5rem;
            background: #fff;
        }
        .brief-config fieldset { min-width: 0; }
        .brief-config legend, .brief-result h3 { width: 100%; margin-bottom: .85rem; padding-bottom: .65rem; border-bottom: 1px solid #dce8f7; color: #142746; font: 700 1.16rem/1.4 Poppins, sans-serif; }
        .brief-disclosure { margin-top: .75rem; border: 1px solid #d5e4f7; border-radius: .75rem; }
        .brief-disclosure:first-of-type { margin-top: 1.15rem; }
        .brief-disclosure summary { display: flex; min-height: 48px; align-items: center; gap: .55rem; padding: .55rem .85rem; border-radius: .75rem; color: #142746; font-weight: 700; list-style: none; cursor: pointer; }
        .brief-disclosure summary::-webkit-details-marker { display: none; }
        .brief-disclosure summary:hover { background: #edf5ff; }
        .brief-disclosure summary::after { content: "+"; color: #2454a5; margin-left: auto; font-size: 1.2rem; }
        .brief-disclosure[open] summary::after { content: "−"; }
        .brief-disclosure > div { padding: .65rem .8rem .8rem; }
        .brief-disclosure small, .brief-disclosure-count { color: #475569; font-size: .9rem; font-weight: 500; }
        .brief-disclosure-count:not(:empty) { padding: .13rem .45rem; border-radius: .4rem; background: #e8f2ff; }
        .brief-field-grid, .brief-addon-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .75rem; }
        .brief-wide-field { grid-column: 1 / -1; }
        .brief-addon { display: grid; grid-template-columns: 1.15rem minmax(0, 1fr); align-content: center; align-items: center; gap: .15rem .6rem; min-height: 64px; padding: .65rem .75rem; border: 1px solid #d5e4f7; border-radius: .75rem; color: #142746; font-size: .91rem; font-weight: 700; cursor: pointer; }
        .brief-addon:hover, .brief-addon:has(:checked) { background: #edf5ff; border-color: #a8c6ec; }
        .brief-addon input { grid-row: span 2; width: 1.05rem; height: 1.05rem; accent-color: #2454a5; }
        .brief-addon-price { grid-column: 2; color: #2454a5; font-size: .9rem; font-variant-numeric: tabular-nums; }
        .brief-estimate { position: sticky; top: 5.75rem; min-width: 0; padding: clamp(1.15rem, 3.5vw, 2rem); border-radius: 1.5rem; background: #173765; color: white; }
        .brief-estimate > p:first-child { font-weight: 700; }
        .brief-estimate output { display: block; margin: .6rem 0 .85rem; color: #d2e7ff; font: 700 clamp(1.35rem, 2.65vw, 2.3rem)/1.2 Poppins, sans-serif; letter-spacing: -.035em; overflow-wrap: anywhere; }
        .brief-estimate-note { color: #dceaff; font-size: .92rem; }
        .brief-save-notice, .brief-save-status { margin-top: .8rem; color: #e2eeff; font-size: .94rem; line-height: 1.5; }
        .brief-save-status { padding: .65rem .8rem; border-radius: .55rem; background: #264a7c; }
        .brief-save-status[hidden] { display: none; }
        .brief-estimate button, .brief-estimate a { display: flex; min-height: 44px; align-items: center; justify-content: center; gap: .55rem; width: 100%; border-radius: .7rem; font-weight: 700; text-align: center; }
        .brief-estimate button { margin-top: 1.25rem; padding: .65rem .8rem; background: #e4f0ff; color: #173765; }
        .brief-estimate button:hover { background: #fff; }
        .brief-estimate button:disabled { background: #dbe3ef; color: #526071; cursor: not-allowed; }
        .brief-estimate a { margin-top: .3rem; color: #fff; }
        .brief-estimate a:hover { text-decoration: underline; }
        .brief-estimate :focus-visible { outline-color: #dceaff; }
        .brief-result { max-width: 64rem; margin-inline: auto; padding: 0; overflow: hidden; }
        .brief-review-header, .brief-review-body, .brief-review-footer { padding: clamp(1.15rem, 3.5vw, 2.25rem); }
        .brief-review-header { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.2fr); align-items: center; gap: 1.25rem; background: #173765; color: #fff; }
        .brief-review-header h3 { margin: 0; border: 0; padding: 0; color: inherit; font-size: clamp(1.65rem, 3vw, 2.4rem); }
        .brief-review-estimate { padding-left: 1.3rem; border-left: 1px solid #849dc0; }
        .brief-review-estimate span { color: #dceaff; }
        .brief-review-estimate strong { display: block; margin-top: .35rem; color: #fff; font: 700 clamp(1.45rem, 2.9vw, 2.35rem)/1.16 Poppins, sans-serif; overflow-wrap: anywhere; }
        .brief-review-details { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); column-gap: 1.5rem; }
        .brief-review-details > div { padding: .85rem 0; border-bottom: 1px solid #dce8f7; }
        .brief-review-details dt { color: #475569; font-size: .94rem; }
        .brief-review-details dd { margin: .2rem 0 0; color: #142746; font-size: 1.08rem; font-weight: 700; white-space: pre-wrap; overflow-wrap: anywhere; }
        .brief-review-features { margin-top: 1.35rem; }
        .brief-review-features h4 { margin-bottom: .65rem; }
        .brief-review-features ul { display: flex; flex-wrap: wrap; gap: .5rem; }
        .brief-review-features li { padding: .35rem .7rem; border-radius: .5rem; background: #eaf3ff; color: #234577; font-size: .95rem; overflow-wrap: anywhere; }
        .brief-review-footer { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; border-top: 1px solid #dce8f7; background: #f5f9ff; color: #334963; }
        .brief-review-actions { display: flex; flex-wrap: wrap; gap: .65rem; }
        .brief-review-actions :is(button, a) { display: grid; place-items: center; min-height: 48px; padding: .65rem 1rem; border: 1px solid #c6d9f1; border-radius: .7rem; color: #173765; font-weight: 700; }
        .brief-review-actions a { display: flex; justify-content: center; gap: .5rem; background: #2454a5; border-color: #2454a5; color: #fff; }
        .brief-review-actions a:hover { background: #193d7f; }

        @media (max-width: 850px) {
            .deliverable-layout, .brief-calculator { grid-template-columns: 1fr; }
            .brief-estimate { position: static; }
            .transformation-row { grid-template-columns: minmax(0, 1fr) 1.6rem minmax(0, 1.19fr); }
            .transformation-row h3 { grid-column: 1 / -1; }
            .transformation-arrow { height: 1.6rem; }
            .transformation-row + .transformation-row { margin-top: 1rem; padding-top: .75rem; border-top: 1px solid #d5e4f7; }
        }
        @media (max-width: 540px) {
            .payment-support, .brief-field-grid, .brief-addon-grid { grid-template-columns: 1fr; }
            .payment-steps li { flex-direction: column; }
            .transformation-row { column-gap: .35rem; font-size: .95rem; }
            .flow-nodes { flex-wrap: wrap; }
            .flow-nodes span { padding-inline: .3rem; }
            .brief-review-header, .brief-review-details { grid-template-columns: 1fr; }
            .brief-review-estimate { padding: .85rem 0 0; border-left: 0; border-top: 1px solid #849dc0; }
            .brief-review-actions { display: grid; width: 100%; }
        }
