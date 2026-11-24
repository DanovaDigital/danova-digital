document.addEventListener('DOMContentLoaded', () => {
    const brief = document.getElementById('briefBuilder');
    const form = document.getElementById('briefForm');
    const result = document.getElementById('briefResult');
    const fields = form.elements;

    function showForm() {
        result.hidden = true;
        form.hidden = false;
    }

    document.querySelectorAll('[data-brief-service], [data-brief-plan], [data-brief-start]').forEach(link => {
        link.addEventListener('click', () => {
            if (link.dataset.briefService) {
                fields.service.value = link.dataset.briefService;
                if (fields.plan) fields.plan.value = '';
            }
            if (link.dataset.briefPlan && fields.plan) {
                fields.plan.value = link.dataset.briefPlan;
                if (!fields.service.value) fields.service.value = 'unsure';
            }
            showForm();
            document.getElementById('briefHeading').focus({ preventScroll: true });
            if (location.hash === '#brief') {
                document.getElementById('brief').scrollIntoView();
            }
        });
    });

    fields.brand.addEventListener('input', () => fields.brand.setCustomValidity(''));
    form.addEventListener('submit', event => {
        event.preventDefault();
        const brand = fields.brand.value.trim();
        if (!brand) {
            fields.brand.setCustomValidity('Masukkan nama atau nama usaha Anda.');
            fields.brand.reportValidity();
            return;
        }

        const details = [
            ['Nama/usaha', brand],
            ['Layanan', fields.service.selectedOptions[0].textContent],
            ['Paket', fields.plan?.value && fields.plan.selectedOptions[0].textContent],
            ['Anggaran', fields.budget.value.trim()],
            ['Target peluncuran', fields.timeline.value.trim()],
            ['Tujuan proyek', fields.notes.value.trim()],
        ];
        const summary = ['Brief proyek Danova Digital', '', ...details
            .filter(([, value]) => value)
            .map(([label, value]) => label + ': ' + value)].join('\n');

        const whatsapp = new URL(brief.dataset.whatsappUrl);
        whatsapp.searchParams.set('text', summary);
        document.getElementById('briefSummary').textContent = summary;
        document.getElementById('briefSendWhatsapp').href = whatsapp.href;
        form.hidden = true;
        result.hidden = false;
        document.getElementById('briefResultHeading').focus();
        if (window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
            window.gsap?.fromTo(result, { y: 10 }, { y: 0, duration: .4, ease: 'back.out(1.5)', overwrite: true });
        }
    });

    document.getElementById('briefEdit').addEventListener('click', () => {
        showForm();
        fields.brand.focus();
    });
    document.getElementById('briefPreview').disabled = false;
});
