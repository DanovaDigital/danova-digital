<section id="brief" class="border-b border-brand-border/60" aria-labelledby="briefHeading">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="section-header mb-8">
            <h2 id="briefHeading" tabindex="-1" class="font-extrabold text-slate-900">Hitung estimasi &amp; mulai brief Anda.</h2>
        </div>

        <div id="briefBuilder" data-whatsapp-url="https://wa.me/{{ $danovaWhatsappNumberDigits }}">
            <form id="briefForm" class="brief-calculator" method="post" action="{{ route('brief.store', [], false) }}">
                @csrf
                <input type="hidden" name="draft_id" value="{{ Illuminate\Support\Str::uuid() }}">
                <div class="brief-config">
                    <fieldset>
                        <legend>Proyek Anda</legend>
                        <div class="brief-field-grid">
                            <label class="brief-field">
                                <span>Nama atau nama usaha</span>
                                <input name="brand" placeholder="Contoh: Kedai Kopi Aruna" maxlength="100" required>
                            </label>
                            <label class="brief-field">
                                <span>Nomor WhatsApp</span>
                                <input type="tel" name="phone" autocomplete="tel" maxlength="32" placeholder="Contoh: 0812 3456 7890" required>
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
                            @if ($pricingPlans->isNotEmpty())
                                <label class="brief-field">
                                    <span>Paket pilihan <small>Opsional</small></span>
                                    <select name="plan">
                                        <option value="">Belum memilih paket</option>
                                        @foreach ($pricingPlans as $plan)
                                            <option value="{{ $plan->id }}">{{ $plan->name }} ({{ $plan->price }})</option>
                                        @endforeach
                                    </select>
                                </label>
                            @endif
                        </div>
                    </fieldset>

                    <details class="brief-disclosure">
                        <summary>Atur fitur <span id="briefAddonCount" class="brief-disclosure-count"></span></summary>
                        <div class="brief-addon-grid">
                            @foreach (config('brief.addons') as $key => [$title, $price, $selected])
                                <label class="brief-addon">
                                    <input type="checkbox" name="addons[]" value="{{ $key }}" data-price="{{ $price }}" data-label="{{ $title }}" @checked($selected)>
                                    <span>{{ $title }}</span>
                                    <span class="brief-addon-price">{{ $price ? '+Rp ' . number_format($price, 0, ',', '.') : 'Rp 0' }}</span>
                                </label>
                            @endforeach
                        </div>
                    </details>

                    <details class="brief-disclosure">
                        <summary>Detail tambahan <small>Opsional</small></summary>
                        <div class="brief-field-grid">
                            <label class="brief-field">
                                <span>Anggaran</span>
                                <input name="budget" placeholder="Contoh: Rp3–6 juta" maxlength="80">
                            </label>
                            <label class="brief-field">
                                <span>Target peluncuran</span>
                                <input name="timeline" placeholder="Contoh: Akhir Januari" maxlength="80">
                            </label>
                            <label class="brief-field brief-wide-field">
                                <span>Tujuan proyek</span>
                                <textarea name="notes" rows="3" maxlength="600" placeholder="Ceritakan tujuan bisnis atau sertakan tautan referensi."></textarea>
                            </label>
                        </div>
                    </details>
                </div>

                <aside class="brief-estimate" aria-label="Ringkasan estimasi">
                    <p>Perkiraan biaya proyek</p>
                    <output id="costEstimateDisplay" aria-live="polite">Rp 3.500.000 – Rp 4.000.000</output>
                    <p class="brief-estimate-note">Harga final dikonfirmasi setelah brief ditinjau.</p>
                    <p id="briefSaveNotice" class="brief-save-notice">Kami menyimpan brief dan nomor WhatsApp Anda saat ditinjau, agar tim Danova bisa menindaklanjuti proyek ini.</p>
                    <button id="briefPreview" type="submit" disabled>
                        Tinjau ringkasan brief <span aria-hidden="true">→</span>
                    </button>
                    <p id="briefSaveStatus" class="brief-save-status" role="status" hidden></p>
                    <a href="{{ route('out.whatsapp', ['context' => 'brief_direct']) }}">Tanya via WhatsApp <span aria-hidden="true">↗</span></a>
                </aside>
            </form>

            <div id="briefResult" class="brief-result" hidden>
                <div class="brief-review-header">
                    <h3 id="briefResultHeading" tabindex="-1">Pratinjau brief</h3>
                    <div class="brief-review-estimate">
                        <span>Perkiraan biaya proyek</span>
                        <strong id="briefReviewEstimate"></strong>
                    </div>
                </div>
                <div class="brief-review-body">
                    <dl id="briefSummary" class="brief-review-details"></dl>
                    <div id="briefReviewFeatures" class="brief-review-features" hidden>
                        <h4>Fitur yang dipilih</h4>
                        <ul id="briefReviewFeatureList"></ul>
                    </div>
                </div>
                <div class="brief-review-footer">
                    <p>Brief tersimpan. Buka WhatsApp untuk melanjutkan diskusi.</p>
                    <div class="brief-review-actions">
                        <button id="briefEdit" type="button">Ubah brief</button>
                        <a id="briefSendWhatsapp" target="_blank" rel="noopener noreferrer">
                            Buka WhatsApp <span aria-hidden="true">↗</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
