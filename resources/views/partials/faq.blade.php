<section id="faq" class="border-b border-brand-border/60" aria-labelledby="faq-title">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="faq-layout">
            <div class="faq-intro">
                <div class="faq-art" aria-hidden="true"><span>?</span></div>
                <div class="faq-intro-copy">
                    <h2 id="faq-title">Pertanyaan sebelum mulai</h2>
                    <p>Jawaban jujur soal kenapa bermitra dengan Danova dibanding bikin sendiri pakai AI atau template.</p>
                    <a href="{{ route('out.whatsapp', ['context' => 'faq']) }}">
                        Tanya tim Danova <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>

            <div class="faq-library">
                @if ($faqs->isNotEmpty())
                    <div class="faq-search" id="faq-search" hidden>
                        <label for="faq-query">Cari pertanyaan</label>
                        <div class="faq-search-field">
                            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="10.5" cy="10.5" r="6.5" />
                                <path d="m15.5 15.5 5 5" stroke-linecap="round" />
                            </svg>
                            <input type="search" id="faq-query" placeholder="Contoh: pembayaran, revisi, domain">
                        </div>
                        <p class="sr-only" id="faq-search-status" role="status"></p>
                    </div>
                @endif

                <div class="faq-entries">
                    @forelse ($faqs as $faq)
                        <details class="faq-entry" name="project-faq">
                            <summary>
                                <span>{{ $faq->question }}</span>
                                <span class="faq-toggle-mark" aria-hidden="true"></span>
                            </summary>
                            <p class="faq-response">{{ $faq->answer }}</p>
                        </details>
                    @empty
                        <div class="empty-panel"><h3>Belum ada FAQ yang ditampilkan</h3></div>
                    @endforelse
                </div>
                @if ($faqs->isNotEmpty())
                    <div class="empty-panel" id="faq-no-results" hidden>
                        <h3>Pertanyaan belum ditemukan</h3>
                        <p>Coba kata kunci lain atau tanyakan langsung ke tim Danova.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
