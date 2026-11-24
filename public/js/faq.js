(() => {
    const search = document.getElementById('faq-search');
    if (!search) return;

    const query = document.getElementById('faq-query');
    const status = document.getElementById('faq-search-status');
    const noResults = document.getElementById('faq-no-results');
    const motion = window.matchMedia('(prefers-reduced-motion: no-preference)');
    const entries = Array.from(document.querySelectorAll('#faq .faq-entry'), entry => ({
        entry,
        text: entry.textContent.toLocaleLowerCase('id').replace(/\s+/g, ' '),
    }));

    query.addEventListener('input', () => {
        const terms = query.value.trim().toLocaleLowerCase('id').split(/\s+/).filter(Boolean);
        let matches = 0;

        for (const { entry, text } of entries) {
            const visible = terms.every(term => text.includes(term));
            entry.hidden = !visible;
            if (visible) matches++;
            else entry.open = false;
        }

        status.textContent = terms.length ? `${matches} pertanyaan ditemukan.` : '';
        noResults.hidden = matches > 0;
    });

    for (const { entry } of entries) {
        entry.addEventListener('toggle', () => {
            if (entry.open && motion.matches) {
                window.gsap?.fromTo(entry.querySelector('.faq-toggle-mark'), { scale: .8 }, {
                    scale: 1, duration: .36, ease: 'back.out(2)', overwrite: true,
                });
            }
        });
    }

    search.hidden = false;
})();
