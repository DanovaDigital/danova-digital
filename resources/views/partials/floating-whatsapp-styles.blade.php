    .mobile-whatsapp { display: none; }
    @media (max-width: 767px) {
        .mobile-whatsapp {
            position: fixed;
            z-index: 900;
            right: max(1rem, env(safe-area-inset-right));
            bottom: max(1rem, env(safe-area-inset-bottom));
            display: grid;
            place-items: center;
            width: 3.5rem;
            height: 3.5rem;
            border: 2px solid #fff;
            border-radius: 50%;
            box-shadow: 0 4px 14px rgb(15 23 42 / .22);
            background: #117047;
            color: #fff;
        }
        .mobile-whatsapp svg { width: 1.55rem; height: 1.55rem; }
        .mobile-whatsapp:focus-visible { outline: 3px solid #2454a5; outline-offset: 3px; }
        body:has(#briefForm :focus) .mobile-whatsapp,
        body:has(.mobile-nav.is-open) .mobile-whatsapp { display: none; }
        footer { padding-bottom: max(5rem, calc(4.5rem + env(safe-area-inset-bottom))); }
    }
