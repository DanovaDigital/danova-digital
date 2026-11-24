<section id="brief" class="border-b border-brand-border/60">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="mx-auto grid max-w-6xl gap-8 lg:grid-cols-[.75fr_1.25fr] lg:gap-16">
            <div class="section-header">
                <h2 id="briefHeading" tabindex="-1" class="font-extrabold text-slate-900">Ceritakan proyek Anda.</h2>
                <p class="mt-4 max-w-md leading-relaxed text-slate-600">Brief singkat membantu tim Danova menyiapkan saran layanan, perkiraan biaya, dan jadwal sebelum diskusi.</p>
                <a href="{{ route('out.whatsapp', ['context' => 'brief_direct']) }}" class="service-action">Tanya langsung lewat WhatsApp <span aria-hidden="true">→</span></a>
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
                            <span>Paket <small>Opsional</small></span>
                            <select name="plan">
                                <option value="">Belum memilih paket</option>
                                @foreach ($pricingPlans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    @endif
                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="brief-field">
                            <span>Anggaran <small>Opsional</small></span>
                            <input name="budget" placeholder="Contoh: Rp5–8 juta" maxlength="80">
                        </label>
                        <label class="brief-field">
                            <span>Target peluncuran <small>Opsional</small></span>
                            <input name="timeline" placeholder="Contoh: Akhir Januari" maxlength="80">
                        </label>
                    </div>
                    <label class="brief-field">
                        <span>Tujuan proyek <small>Opsional</small></span>
                        <textarea name="notes" rows="3" maxlength="600" placeholder="Ceritakan tujuan Anda atau sertakan tautan referensi."></textarea>
                    </label>
                    <button id="briefPreview" type="submit" disabled class="apple-spring min-h-12 justify-self-start rounded-xl bg-brand-primary px-5 py-3 text-sm font-bold text-white hover:bg-brand-dark">Tinjau brief</button>
                </form>
                <div id="briefResult" hidden>
                    <h3 id="briefResultHeading" tabindex="-1" class="mb-3 text-xl font-bold">Pratinjau brief</h3>
                    <pre id="briefSummary" class="mb-4 whitespace-pre-wrap rounded-xl bg-brand-surface p-4 font-sans text-sm leading-relaxed text-slate-700"></pre>
                    <p class="mb-5 text-sm text-slate-600">Periksa ringkasannya, lalu buka WhatsApp dan kirim pesan ke tim Danova.</p>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <button id="briefEdit" type="button" class="min-h-12 rounded-xl border border-brand-border px-5 py-3 text-sm font-bold text-brand-dark">Ubah brief</button>
                        <a id="briefSendWhatsapp" target="_blank" rel="noopener noreferrer" class="apple-spring min-h-12 rounded-xl bg-brand-primary px-5 py-3 text-center text-sm font-bold text-white hover:bg-brand-dark">Buka WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
