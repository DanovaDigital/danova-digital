document.addEventListener('DOMContentLoaded', () => {
    const brief = document.getElementById('briefBuilder');
    const form = document.getElementById('briefForm');
    const result = document.getElementById('briefResult');
    if (!brief || !form || !result) return;
    const fields = form.elements;

    const serviceBasePrices = {
        'website': 3000000,
        'landing-page': 2500000,
        'visual': 2000000,
        'custom': 5000000,
        'unsure': 3000000
    };

    const planBasePrices = {
        '1': 3000000,
        '2': 7500000,
        '3': 12000000
    };

    function formatRupiah(amount) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
    }

    function updateCostEstimate() {
        const costDisplay = document.getElementById('costEstimateDisplay');
        if (!costDisplay) return null;

        let base = 3000000;
        const planVal = fields.plan?.value;
        const serviceVal = fields.service?.value;

        if (planVal && planBasePrices[planVal]) {
            base = planBasePrices[planVal];
        } else if (serviceVal && serviceBasePrices[serviceVal]) {
            base = serviceBasePrices[serviceVal];
        }

        let addonTotal = 0;
        const checkedAddons = form.querySelectorAll('input[name="addons[]"]:checked');
        checkedAddons.forEach(cb => {
            const p = parseInt(cb.dataset.price || '0', 10);
            if (!isNaN(p)) addonTotal += p;
        });

        const totalMin = base + addonTotal;
        const totalMax = totalMin + (totalMin >= 10000000 ? 2000000 : 500000);

        let formattedRange = '';
        if (planVal === '3' || serviceVal === 'custom') {
            formattedRange = formatRupiah(totalMin) + ' – Sesuai Kebutuhan';
        } else {
            formattedRange = formatRupiah(totalMin) + ' – ' + formatRupiah(totalMax);
        }

        costDisplay.textContent = formattedRange;

        return {
            formattedRange,
            selectedAddons: Array.from(checkedAddons).map(cb => cb.dataset.label || cb.value)
        };
    }

    // Bind event listeners for real-time cost calculation
    fields.service?.addEventListener('change', updateCostEstimate);
    fields.plan?.addEventListener('change', updateCostEstimate);
    form.querySelectorAll('input[name="addons[]"]').forEach(cb => {
        cb.addEventListener('change', updateCostEstimate);
    });

    // Run initial calculation
    updateCostEstimate();

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
            updateCostEstimate();
            showForm();
            document.getElementById('briefHeading')?.focus({ preventScroll: true });
            if (location.hash === '#brief') {
                document.getElementById('brief')?.scrollIntoView();
            }
        });
    });

    fields.brand?.addEventListener('input', () => fields.brand.setCustomValidity(''));

    form.addEventListener('submit', event => {
        event.preventDefault();
        const brand = fields.brand.value.trim();
        if (!brand) {
            fields.brand.setCustomValidity('Masukkan nama atau nama usaha Anda.');
            fields.brand.reportValidity();
            return;
        }

        const estimate = updateCostEstimate();
        const details = [
            ['Nama/usaha', brand],
            ['Layanan', fields.service?.value ? fields.service.selectedOptions[0].textContent : 'Belum memilih'],
            ['Paket', fields.plan?.value ? fields.plan.selectedOptions[0].textContent : ''],
            ['Fitur tambahan', estimate?.selectedAddons?.length ? estimate.selectedAddons.join(', ') : ''],
            ['Estimasi kalkulator', estimate?.formattedRange || ''],
            ['Anggaran klien', fields.budget?.value.trim() || ''],
            ['Target peluncuran', fields.timeline?.value.trim() || ''],
            ['Tujuan proyek', fields.notes?.value.trim() || ''],
        ];

        const summary = [
            'Brief Proyek Danova Digital',
            '==========================',
            ...details
                .filter(([, value]) => Boolean(value))
                .map(([label, value]) => label + ': ' + value)
        ].join('\n');

        const whatsapp = new URL(brief.dataset.whatsappUrl);
        whatsapp.searchParams.set('text', summary);
        document.getElementById('briefSummary').textContent = summary;
        document.getElementById('briefSendWhatsapp').href = whatsapp.href;
        form.hidden = true;
        result.hidden = false;
        document.getElementById('briefResultHeading')?.focus();
        if (window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
            window.gsap?.fromTo(result, { y: 10 }, { y: 0, duration: .4, ease: 'back.out(1.5)', overwrite: true });
        }
    });

    document.getElementById('briefEdit')?.addEventListener('click', () => {
        showForm();
        fields.brand?.focus();
    });
    const previewBtn = document.getElementById('briefPreview');
    if (previewBtn) previewBtn.disabled = false;
});
