document.addEventListener('DOMContentLoaded', () => {
    const brief = document.getElementById('briefBuilder');
    const form = document.getElementById('briefForm');
    const result = document.getElementById('briefResult');
    if (!brief || !form || !result) return;
    const fields = form.elements;
    const addonCount = document.getElementById('briefAddonCount');
    const summaryList = document.getElementById('briefSummary');
    const reviewEstimate = document.getElementById('briefReviewEstimate');
    const reviewFeatures = document.getElementById('briefReviewFeatures');
    const featureList = document.getElementById('briefReviewFeatureList');
    const previewBtn = document.getElementById('briefPreview');
    const saveStatus = document.getElementById('briefSaveStatus');
    const formConfig = form.querySelector('.brief-config');
    let reviewMotion;
    let saving = false;

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
        if (addonCount) addonCount.textContent = checkedAddons.length + ' dipilih';

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
        reviewMotion?.revert();
        reviewMotion = undefined;
        result.hidden = true;
        form.hidden = false;
    }

    document.querySelectorAll('[data-brief-service], [data-brief-plan], [data-brief-start]').forEach(link => {
        link.addEventListener('click', () => {
            if (saving) return;
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

    form.addEventListener('submit', async event => {
        event.preventDefault();
        if (saving) return;
        const brand = fields.brand.value.trim();
        if (!brand) {
            fields.brand.setCustomValidity('Masukkan nama atau nama usaha Anda.');
            fields.brand.reportValidity();
            return;
        }

        const estimate = updateCostEstimate();
        const projectDetails = [
            ['Nama/usaha', brand],
            ['WhatsApp', fields.phone.value.trim()],
            ['Layanan', fields.service?.value ? fields.service.selectedOptions[0].textContent : 'Belum memilih'],
            ['Paket', fields.plan?.value ? fields.plan.selectedOptions[0].textContent : ''],
        ];
        const optionalDetails = [
            ['Anggaran klien', fields.budget?.value.trim() || ''],
            ['Target peluncuran', fields.timeline?.value.trim() || ''],
            ['Tujuan proyek', fields.notes?.value.trim() || ''],
        ];
        const features = estimate?.selectedAddons ?? [];
        const messageDetails = [
            ...projectDetails,
            ['Fitur tambahan', features.join(', ')],
            ['Estimasi kalkulator', estimate?.formattedRange],
            ...optionalDetails,
        ];

        const summary = [
            'Brief Proyek Danova Digital',
            '==========================',
            ...messageDetails
                .filter(([, value]) => Boolean(value))
                .map(([label, value]) => label + ': ' + value)
        ].join('\n');

        const whatsapp = new URL(brief.dataset.whatsappUrl);
        whatsapp.searchParams.set('text', summary);
        const payload = new FormData(form);
        payload.set('estimate', estimate?.formattedRange ?? '');
        saving = true;
        previewBtn.disabled = true;
        formConfig.inert = true;
        saveStatus.textContent = 'Menyimpan brief…';
        saveStatus.hidden = false;
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: { Accept: 'application/json' },
                body: payload,
                signal: AbortSignal.timeout(12000),
            });
            if (response.status === 422) {
                const { errors } = await response.json();
                saveStatus.textContent = errors?.phone
                    ? 'Periksa nomor WhatsApp Anda, lalu coba lagi.'
                    : 'Periksa isian brief, lalu coba lagi.';
                return;
            }
            if (!response.ok || !(await response.json()).saved) throw new Error('Brief was not saved');
        } catch {
            saveStatus.textContent = 'Brief belum tersimpan. Coba lagi atau hubungi kami langsung via WhatsApp.';
            return;
        } finally {
            saving = false;
            previewBtn.disabled = false;
            formConfig.inert = false;
        }
        saveStatus.hidden = true;
        const visibleDetails = [...projectDetails, ...optionalDetails].filter(([, value]) => value);
        summaryList.replaceChildren(...visibleDetails.map(([label, value]) => {
            const row = document.createElement('div');
            const term = document.createElement('dt');
            const description = document.createElement('dd');
            term.textContent = label;
            description.textContent = value;
            row.append(term, description);
            return row;
        }));
        reviewEstimate.textContent = estimate?.formattedRange ?? 'Dikonfirmasi setelah konsultasi';
        featureList.replaceChildren(...features.map(feature => {
            const item = document.createElement('li');
            item.textContent = feature;
            return item;
        }));
        reviewFeatures.hidden = !features.length;
        document.getElementById('briefSendWhatsapp').href = whatsapp.href;
        form.hidden = true;
        result.hidden = false;
        document.getElementById('briefResultHeading')?.focus();
        if (window.gsap && window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
            reviewMotion = window.gsap.context(() => {
                const timeline = window.gsap.timeline({ defaults: { duration: .45, ease: 'power3.out' } })
                    .from('.brief-review-estimate strong', { y: 12, scale: .9, opacity: .6, ease: 'back.out(1.8)' })
                    .from('.brief-review-details > div', { y: 12, opacity: .55, stagger: .045 }, '<.08');
                if (features.length) {
                    timeline.from('.brief-review-features li', { y: 8, scale: .93, stagger: .05, ease: 'back.out(1.6)' }, '<.12');
                }
            }, result);
        }
    });

    document.getElementById('briefEdit')?.addEventListener('click', () => {
        showForm();
        fields.brand?.focus();
    });
    if (previewBtn) previewBtn.disabled = false;
});
