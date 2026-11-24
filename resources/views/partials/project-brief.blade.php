<section id="brief" class="border-b border-brand-border/60">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="mx-auto grid max-w-6xl gap-8 lg:grid-cols-[.75fr_1.25fr] lg:gap-16">
            <div class="section-header">
                <span class="text-xs font-bold text-brand-primary uppercase tracking-wider block mb-2">Kalkulator Biaya & Brief Proyek</span>
                <h2 id="briefHeading" tabindex="-1" class="font-extrabold text-slate-900">Hitung estimasi & mulai brief Anda.</h2>
                <p class="mt-4 max-w-md leading-relaxed text-slate-600">Pilih layanan dan fitur yang Anda butuhkan untuk melihat perkiraan investasi langsung secara transparan sebelum konsultasi.</p>

                <!-- Reassurance Micro-List -->
                <ul class="mt-6 space-y-2.5 text-xs text-slate-600 border-t border-brand-border/80 pt-5">
                    <li class="flex items-center gap-2">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Domain & Cloud Hosting 1 Thn Gratis</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Skema 50% DP, 50% Pasca Approval Staging</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Garansi Anti-Gaptek & Video Panduan Singkat</span>
                    </li>
                </ul>

                <a href="{{ route('out.whatsapp', ['context' => 'brief_direct']) }}" class="service-action mt-6">Tanya langsung via WhatsApp <span aria-hidden="true">→</span></a>
            </div>
            <div id="briefBuilder" data-whatsapp-url="https://wa.me/{{ $danovaWhatsappNumberDigits }}" class="min-w-0 rounded-3xl border border-brand-border bg-white p-5 shadow-apple-card sm:p-8">
                <form id="briefForm" class="grid gap-5">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="brief-field">
                            <span>Nama atau nama usaha</span>
                            <input name="brand" placeholder="Contoh: Kedai Kopi Aruna" maxlength="100" required>
                        </label>
                        <label class="brief-field">
                            <span>Layanan</span>
                            <select name="service" required>
                                <option value="">Pilih layanan</option>
                                @foreach ($serviceOptions as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    @if ($pricingPlans->isNotEmpty())
                        <label class="brief-field">
                            <span>Paket Pilihan <small>Opsional</small></span>
                            <select name="plan">
                                <option value="">Belum memilih paket</option>
                                @foreach ($pricingPlans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }} ({{ $plan->price }})</option>
                                @endforeach
                            </select>
                        </label>
                    @endif

                    <!-- KALKULATOR FITUR TAMBAHAN (ADD-ONS) -->
                    <div class="brief-field">
                        <span class="flex items-center justify-between">
                            <span>Pilihan Fitur & Kebutuhan</span>
                            <small class="text-slate-500 font-normal">Pilih sesuai kebutuhan</small>
                        </span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 pt-1">
                            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 bg-slate-50 cursor-pointer hover:border-brand-primary transition-colors text-xs text-slate-800">
                                <input type="checkbox" name="addons[]" value="hosting" data-price="0" data-label="Domain & Cloud Hosting 1 Tahun" checked class="w-4 h-4 text-brand-primary rounded focus:ring-brand-primary">
                                <span class="font-medium">Domain & Hosting 1 Thn <strong class="text-emerald-700 block font-bold text-[11px]">(Gratis Termasuk)</strong></span>
                            </label>

                            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 bg-slate-50 cursor-pointer hover:border-brand-primary transition-colors text-xs text-slate-800">
                                <input type="checkbox" name="addons[]" value="cms" data-price="500000" data-label="Panel Admin CMS Kelola Mandiri" checked class="w-4 h-4 text-brand-primary rounded focus:ring-brand-primary">
                                <span class="font-medium">Panel Admin CMS Mandiri <strong class="text-brand-primary block font-bold text-[11px]">+Rp 500.000</strong></span>
                            </label>

                            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 bg-slate-50 cursor-pointer hover:border-brand-primary transition-colors text-xs text-slate-800">
                                <input type="checkbox" name="addons[]" value="wa_rotator" data-price="300000" data-label="Integrasi Multi-Admin WA Rotator" class="w-4 h-4 text-brand-primary rounded focus:ring-brand-primary">
                                <span class="font-medium">Multi-Admin WA Rotator <strong class="text-brand-primary block font-bold text-[11px]">+Rp 300.000</strong></span>
                            </label>

                            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 bg-slate-50 cursor-pointer hover:border-brand-primary transition-colors text-xs text-slate-800">
                                <input type="checkbox" name="addons[]" value="tracking" data-price="350000" data-label="Setup Pixel Meta Ads & GA4" class="w-4 h-4 text-brand-primary rounded focus:ring-brand-primary">
                                <span class="font-medium">Setup Pixel Meta & GA4 <strong class="text-brand-primary block font-bold text-[11px]">+Rp 350.000</strong></span>
                            </label>

                            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 bg-slate-50 cursor-pointer hover:border-brand-primary transition-colors text-xs text-slate-800">
                                <input type="checkbox" name="addons[]" value="copywriting" data-price="450000" data-label="Copywriting Penjualan & Konten" class="w-4 h-4 text-brand-primary rounded focus:ring-brand-primary">
                                <span class="font-medium">Copywriting Penjualan <strong class="text-brand-primary block font-bold text-[11px]">+Rp 450.000</strong></span>
                            </label>

                            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 bg-slate-50 cursor-pointer hover:border-brand-primary transition-colors text-xs text-slate-800">
                                <input type="checkbox" name="addons[]" value="multilingual" data-price="600000" data-label="Fitur Multibahasa (ID / EN)" class="w-4 h-4 text-brand-primary rounded focus:ring-brand-primary">
                                <span class="font-medium">Fitur Multibahasa (ID/EN) <strong class="text-brand-primary block font-bold text-[11px]">+Rp 600.000</strong></span>
                            </label>
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="brief-field">
                            <span>Anggaran Klien <small>Opsional</small></span>
                            <input name="budget" placeholder="Contoh: Rp3–6 juta" maxlength="80">
                        </label>
                        <label class="brief-field">
                            <span>Target Peluncuran <small>Opsional</small></span>
                            <input name="timeline" placeholder="Contoh: 1–2 minggu lagi" maxlength="80">
                        </label>
                    </div>

                    <label class="brief-field">
                        <span>Tujuan Proyek / Catatan Tambahan <small>Opsional</small></span>
                        <textarea name="notes" rows="3" maxlength="600" placeholder="Ceritakan tujuan bisnis Anda atau sertakan link website referensi yang disukai."></textarea>
                    </label>

                    <!-- LIVE ESTIMASI INVESTASI WIDGET -->
                    <div class="rounded-2xl border-2 border-brand-border bg-brand-surface p-4 sm:p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-primary block mb-1">Perkiraan Investasi Transparan</span>
                            <div id="costEstimateDisplay" class="text-2xl font-extrabold text-slate-900 tracking-tight">
                                Rp 3.500.000 – Rp 4.000.000
                            </div>
                            <span class="text-[11px] text-slate-500 block mt-0.5">*Estimasi otomatis. Angka pasti disesuaikan dengan detail kebutuhan Anda.</span>
                        </div>
                        <div class="sm:text-right shrink-0">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold border border-emerald-200">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>DP 50% Saat Mulai</span>
                            </span>
                        </div>
                    </div>

                    <button id="briefPreview" type="submit" disabled class="apple-spring min-h-12 justify-self-start rounded-xl bg-brand-primary px-6 py-3 text-sm font-bold text-white hover:bg-brand-dark flex items-center gap-2">
                        <span>Tinjau Ringkasan Brief</span>
                        <span aria-hidden="true">→</span>
                    </button>
                </form>
                <div id="briefResult" hidden>
                    <h3 id="briefResultHeading" tabindex="-1" class="mb-3 text-xl font-bold text-slate-900">Pratinjau brief Anda</h3>
                    <pre id="briefSummary" class="mb-4 whitespace-pre-wrap rounded-xl bg-brand-surface p-4 font-sans text-sm leading-relaxed text-slate-700 border border-brand-border"></pre>
                    <p class="mb-5 text-sm text-slate-600">Periksa ringkasannya, lalu klik tombol di bawah untuk langsung terhubung dengan tim Danova di WhatsApp.</p>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <button id="briefEdit" type="button" class="min-h-12 rounded-xl border border-brand-border px-5 py-3 text-sm font-bold text-brand-dark hover:bg-slate-50">Ubah brief</button>
                        <a id="briefSendWhatsapp" target="_blank" rel="noopener noreferrer" class="apple-spring min-h-12 rounded-xl bg-brand-primary px-6 py-3 text-center text-sm font-bold text-white hover:bg-brand-dark flex items-center justify-center gap-2">
                            <span>Kirim ke WhatsApp Danova</span>
                            <span aria-hidden="true">↗</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
