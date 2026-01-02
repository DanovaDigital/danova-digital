# Admin Settings Guide

## Mengelola Konten Landing Page

Semua konten dinamis di landing page sekarang bisa dikelola melalui **Admin → Settings**.

### 📊 Hero Statistics

Kelola angka-angka yang ditampilkan di hero section:

-   **Projects**: Jumlah project yang diselesaikan (default: `100+`)
-   **Average Rating**: Rating rata-rata (default: `4.9`)
-   **On-time Delivery**: Persentase on-time (default: `95%`)

### ✨ Hero Feature Boxes

Kelola dua feature box di hero visual:

**Feature 1:**

-   Title (default: `UI/UX Design`)
-   Description (default: `Interface yang clean, jelas, dan premium.`)

**Feature 2:**

-   Title (default: `Web Development`)
-   Description (default: `Blade SSR + performa yang ringan.`)

### 💬 Contact CTA Buttons

Kelola label dan konten tombol kontak:

**WhatsApp:**

-   Button Label (default: `WhatsApp Kami`)
-   WhatsApp Number (format: `62xxx` tanpa tanda +)
-   Prefill Message (pesan default saat membuka WhatsApp)

**Email:**

-   Button Label (default: `Email Danova`)
-   Email Address
-   Email Subject
-   Email Body Template

### Cara Update Settings

1. Login ke admin panel (`/admin`)
2. Klik menu **Settings** di sidebar
3. Edit field yang ingin diubah
4. Klik tombol **Simpan Semua** di kanan atas
5. Refresh landing page untuk melihat perubahan

### ⚙️ Advanced Settings

Untuk custom key-value pairs, gunakan section **Advanced Settings** di bawah.

Klik **Add Custom Setting** untuk menambahkan setting baru dengan format:

-   **Key**: `group.setting_name` (contoh: `footer.copyright_text`)
-   **Value**: Nilai dari setting
-   **Group**: Kategori/grup setting (auto-generated dari key)

### Tips

-   Gunakan format key yang konsisten: `group.setting_name`
-   Group membantu mengorganisir settings (contact, stats, hero, footer, dll)
-   Settings langsung tersinkronisasi ke landing page
-   Tidak perlu restart server setelah update

### Default Values

Jika setting dihapus, aplikasi akan menggunakan default values yang sudah di-hardcode di template.

---

**Dibuat untuk:** Danova CMS  
**Dokumentasi terakhir diupdate:** 1 Januari 2026
