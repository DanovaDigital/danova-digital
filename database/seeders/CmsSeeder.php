<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\PricingPlan;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        // Site settings - Contact
        $this->upsertSetting('contact.email', 'danovaagency@gmail.com', 'contact');
        $this->upsertSetting('contact.email_subject', 'Project Inquiry — Danova', 'contact');
        $this->upsertSetting('contact.email_body', "Hi Danova Team,\n\nNama:\nBrand/Usaha:\nWebsite/Sosmed:\nLayanan yang dibutuhkan: (Website / Landing Page / Brand System)\nBudget range:\nTimeline:\nTujuan:\n\nThanks,", 'contact');
        $this->upsertSetting('contact.whatsapp', '6281234567890', 'contact');
        $this->upsertSetting('contact.whatsapp_prefill', 'Hi Danova, saya tertarik diskusi project website.', 'contact');
        $this->upsertSetting('contact.whatsapp_label', 'WhatsApp Kami', 'contact');
        $this->upsertSetting('contact.email_label', 'Email Danova', 'contact');

        // Site settings - Stats
        $this->upsertSetting('stats.projects', '100+', 'stats');
        $this->upsertSetting('stats.rating', '4.9', 'stats');
        $this->upsertSetting('stats.on_time', '95%', 'stats');

        // Site settings - Hero Features
        $this->upsertSetting('hero.feature1_title', 'UI/UX Design', 'hero');
        $this->upsertSetting('hero.feature1_description', 'Interface yang clean, jelas, dan premium.', 'hero');
        $this->upsertSetting('hero.feature2_title', 'Web Development', 'hero');
        $this->upsertSetting('hero.feature2_description', 'Blade SSR + performa yang ringan.', 'hero');

        // Pricing
        PricingPlan::query()->updateOrCreate(
            ['name' => 'Starter'],
            [
                'sort_order' => 1,
                'is_featured' => false,
                'is_published' => true,
                'price' => 'Rp 3jt+',
                'subtitle' => 'Landing page 1 halaman, cepat & rapi.',
                'features' => [
                    '1 page (Hero, Services, CTA)',
                    'Responsive design (mobile + desktop)',
                    'Basic SEO + performance',
                    '1–2 revisi desain',
                    'Estimasi: 10–14 hari kerja',
                    'Deliverables: HTML/CSS/JS final + assets',
                    'Pembayaran: 50% DP, 50% sebelum launch',
                ],
                'cta_label' => 'Choose Starter',
                'cta_package_name' => 'Starter',
                'cta_package_price' => 'Rp 3jt+',
            ]
        );

        PricingPlan::query()->updateOrCreate(
            ['name' => 'Growth'],
            [
                'sort_order' => 2,
                'is_featured' => true,
                'is_published' => true,
                'price' => 'Rp 7.5jt+',
                'subtitle' => 'Paket paling ideal untuk agency/business.',
                'features' => [
                    'Multi-section landing (5–7 sections)',
                    'Design system mini + komponen reusable',
                    'CMS integration (optional)',
                    'Performance + accessibility audit',
                    '3–4 revisi desain + 2 revisi konten',
                    'Estimasi: 3–4 minggu',
                    'Deliverables: Source code + dokumentasi',
                    'Pembayaran: 40% DP, 40% mid, 20% launch',
                ],
                'cta_label' => 'Choose Growth',
                'cta_package_name' => 'Growth',
                'cta_package_price' => 'Rp 7.5jt+',
            ]
        );

        PricingPlan::query()->updateOrCreate(
            ['name' => 'Premium'],
            [
                'sort_order' => 3,
                'is_featured' => false,
                'is_published' => true,
                'price' => 'Custom',
                'subtitle' => 'Untuk brand yang butuh full visual system.',
                'features' => [
                    'Discovery workshop + competitive analysis',
                    'Full website (multi-page) + brand system',
                    'Advanced interactions & animations',
                    'Content strategy + copywriting support',
                    'Unlimited revisions (dalam scope)',
                    'Estimasi: 6–10 minggu (project-based)',
                    'Deliverables: Full source + design files',
                    'Pembayaran: Milestone-based (custom)',
                ],
                'cta_label' => 'Request a Quote',
                'cta_package_name' => 'Premium',
                'cta_package_price' => 'Custom',
            ]
        );

        // Work projects
        Project::query()->updateOrCreate(
            ['slug' => 'ecommerce-brand-redesign'],
            [
                'sort_order' => 1,
                'is_published' => true,
                'title' => 'E-commerce Brand Redesign',
                'subtitle' => 'Transformasi total brand fashion e-commerce menjadi luxury experience. Konversi meningkat 65% dalam 3 bulan pertama.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80',
                'challenge' => 'Tampilan brand terasa generik dan kurang premium.',
                'solution' => 'Membangun design system yang konsisten, micro-interactions yang halus, dan visual hierarchy yang kuat.',
                'results' => ['Konversi +65% dalam 3 bulan', 'Brand perception lebih premium'],
                'features' => ['Design system', 'Micro-interactions', 'Optimized checkout flow'],
                'tech' => ['Laravel', 'Blade', 'Vite'],
                'testimonial' => [
                    'text' => 'Transformasinya terasa sekali — lebih premium dan lebih meyakinkan.',
                    'author' => 'Client',
                    'role' => 'E-commerce Brand',
                ],
            ]
        );

        Project::query()->updateOrCreate(
            ['slug' => 'saas-landing-page'],
            [
                'sort_order' => 2,
                'is_published' => true,
                'title' => 'SaaS Landing Page',
                'subtitle' => 'Landing page modern dengan fokus pada clarity dan trust. Trial signup meningkat 320% dalam 2 bulan.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&q=80',
                'challenge' => 'Value proposition kurang jelas dan trust rendah.',
                'solution' => 'Data storytelling yang kuat, social proof strategis, dan CTA placement yang conversion-focused.',
                'results' => ['Trial signup +320% dalam 2 bulan', 'Bounce rate turun'],
                'features' => ['Hero messaging', 'Social proof', 'CTA funnel'],
                'tech' => ['Laravel', 'Blade', 'CSS'],
                'testimonial' => [
                    'text' => 'Visual dan struktur halamannya bikin produk kami jauh lebih meyakinkan.',
                    'author' => 'Client',
                    'role' => 'SaaS Team',
                ],
            ]
        );

        Project::query()->updateOrCreate(
            ['slug' => 'agency-portfolio-site'],
            [
                'sort_order' => 3,
                'is_published' => true,
                'title' => 'Agency Portfolio Site',
                'subtitle' => 'Portfolio visual-first dengan project showcase yang kuat. Inquiry rate meningkat 80% dan project value naik 2x.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1200&q=80',
                'challenge' => 'Portfolio kurang mencerminkan kualitas agency.',
                'solution' => 'Full-screen showcases, interaksi custom, dan layout yang menonjolkan outcome.',
                'results' => ['Inquiry rate +80%', 'Average project value 2x'],
                'features' => ['Project showcase', 'Interaction detail', 'Responsive layout'],
                'tech' => ['Laravel', 'Blade', 'Vite'],
                'testimonial' => [
                    'text' => 'Portfolio kami akhirnya tampil setara agency internasional.',
                    'author' => 'Client',
                    'role' => 'Creative Agency',
                ],
            ]
        );

        // Testimonials
        Testimonial::query()->updateOrCreate(
            ['name' => 'Rizky Ananda'],
            [
                'sort_order' => 1,
                'is_featured' => false,
                'is_published' => true,
                'title' => 'Founder, FreshBite (F&B)',
                'quote' => 'Website kami sekarang terlihat premium dan profesional. Dalam 2 bulan, online orders naik 120% dan brand awareness meningkat tajam. Worth every rupiah!',
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop',
            ]
        );

        Testimonial::query()->updateOrCreate(
            ['name' => 'Maya Kusuma'],
            [
                'sort_order' => 2,
                'is_featured' => true,
                'is_published' => true,
                'title' => 'Marketing Lead, TechHub Indonesia',
                'quote' => 'Perhatian Danova pada detail piksel benar-benar terlihat. Bounce rate turun 40%, dan kami dapat feedback luar biasa tentang visual dari klien enterprise.',
                'avatar_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&h=200&fit=crop',
            ]
        );

        Testimonial::query()->updateOrCreate(
            ['name' => 'Arief Hidayat'],
            [
                'sort_order' => 3,
                'is_featured' => false,
                'is_published' => true,
                'title' => 'CEO, Kreativa Studio (Design Agency)',
                'quote' => 'Akhirnya portfolio kami tampil setara dengan agency internasional. Inquiry rate naik 3x dan rata-rata project value meningkat signifikan. Highly recommended!',
                'avatar_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&h=200&fit=crop',
            ]
        );

        // FAQs
        $faqs = [
            [
                'sort_order' => 1,
                'question' => 'Berapa lama waktu pengerjaan project?',
                'answer' => 'Starter: 10–14 hari kerja. Growth: 3–4 minggu. Premium: 6–10 minggu (tergantung scope). Timeline mulai setelah DP dan brief final diterima.',
            ],
            [
                'sort_order' => 2,
                'question' => 'Berapa kali revisi yang didapat?',
                'answer' => 'Starter: 1–2 revisi desain. Growth: 3–4 revisi desain + 2 revisi konten. Premium: unlimited revisions dalam scope yang disepakati. Revisi major di luar scope akan dikenakan biaya tambahan.',
            ],
            [
                'sort_order' => 3,
                'question' => 'Bagaimana sistem pembayaran?',
                'answer' => 'Skema pembayaran bertahap (milestone) 50% DP saat brief disepakati untuk memulai riset dan pengerjaan, lalu sisa 50% hanya dibayarkan setelah Anda menguji website di link staging preview dan menyetujui seluruh fungsinya. Kami juga menyediakan invoice resmi dan bukti transfer sah untuk pembukuan.',
            ],
            [
                'sort_order' => 4,
                'question' => 'Apakah termasuk domain dan hosting?',
                'answer' => 'Ya! Setiap paket pembuatan website Danova sudah termasuk domain resmi (.com / .id) dan Cloud Hosting SSD NVMe berkecepatan tinggi gratis untuk 1 tahun pertama, lengkap dengan sertifikat keamanan SSL HTTPS dan email bisnis profesional.',
            ],
            [
                'sort_order' => 5,
                'question' => 'Siapa yang pegang file source code?',
                'answer' => '100% Hak Milik untuk Anda tanpa vendor lock-in. Setelah pelunasan, kami serahkan semua akses cPanel, database, file source code, dan aset desain. Anda bebas memindahkan atau mengembangkannya kapan saja tanpa ikatan biaya sewa.',
            ],
            [
                'sort_order' => 6,
                'question' => 'Apakah ada maintenance atau support setelah launch?',
                'answer' => 'Tentu. Setiap proyek dilindungi garansi teknis 30–60 hari gratis untuk perbaikan jika ditemukan bug atau error. Kami juga menyediakan paket pemeliharaan berkala jika Anda membutuhkan tim teknis standby.',
            ],
            [
                'sort_order' => 7,
                'question' => 'Bagaimana jika saya gaptek atau belum pernah kelola website?',
                'answer' => 'Anda tidak perlu khawatir. Kami memberikan Garansi Anti-Gaptek berupa video tutorial singkat 1–2 menit cara mengedit harga produk, menambah artikel, dan mengubah nomor WhatsApp, ditambah sesi konsultasi walkthrough 1-on-1 via video call.',
            ],
            [
                'sort_order' => 8,
                'question' => 'Berapa biaya perpanjangan di tahun ke-2?',
                'answer' => 'Biaya perpanjangan sangat transparan: Anda hanya perlu memperpanjang sewa domain dan cloud hosting standar (sekitar Rp450.000 – Rp850.000 per tahun tergantung spesifikasi traffic). Tidak ada biaya lisensi sistem software tahunan.',
            ],
            [
                'sort_order' => 9,
                'question' => 'Apakah Danova handle SEO dan copywriting?',
                'answer' => 'Ya, kami membantu menyusun struktur headline persuasif, merapikan deskripsi layanan, dan mengoptimalkan on-page SEO (meta tag, Google Search Console, kecepatan muat halaman) agar website Anda langsung siap terindeks di Google.',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::query()->updateOrCreate(
                ['question' => $faq['question']],
                [
                    'sort_order' => $faq['sort_order'],
                    'is_published' => true,
                    'answer' => $faq['answer'],
                ]
            );
        }
    }

    private function upsertSetting(string $key, string $value, ?string $group = null): void
    {
        SiteSetting::query()->updateOrCreate(
            ['key' => $key],
            [
                'group' => $group,
                'value' => $value,
            ]
        );
    }
}
