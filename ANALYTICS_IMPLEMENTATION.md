# Analytics Dashboard Implementation Guide

## ✅ Fitur yang Sudah Diimplementasikan

### 1. **Database Schema** (`analytics_tables` migration)

-   `analytics_visitors`: Tracking unique visitors dengan token, device type, first/last seen
-   `analytics_page_views`: Event tracking setiap pageview dengan detail lengkap (referrer, UTM, IP hash)
-   `analytics_daily_aggregates`: Agregasi harian untuk query cepat (opsional, belum digunakan)

### 2. **Models**

-   `Visitor`: Model untuk visitor tracking dengan helper methods
-   `PageView`: Model dengan scopes & helper untuk analytics queries (today, last7days, last30days, dll)
-   Static methods untuk KPI: `getTodayViews()`, `getTopProjects()`, `getTopReferrers()`, dll

### 3. **Middleware Tracking** (`TrackPageView`)

-   Auto-tracking semua GET requests ke halaman publik
-   Exclude admin routes, assets, dan non-GET requests
-   Set cookie `visitor_id` untuk unique visitor tracking (1 tahun)
-   Device detection (mobile, desktop, tablet, bot)
-   Privacy-focused: hash IP address, tidak simpan IP mentah
-   UTM parameter tracking (source, medium, campaign, term, content)
-   Route categorization: `landing` dan `work_detail` dengan project_id

### 4. **Dashboard Analytics UI**

-   **KPI Cards** (4 cards):

    -   Hari Ini: Total views + unique visitors
    -   7 Hari Terakhir: Total views + unique visitors
    -   Total Projects + published count
    -   Total Testimonials

-   **Chart** (Chart.js):

    -   Line chart pageview trend 7 hari terakhir
    -   Dual dataset: Total Views vs Unique Visitors
    -   Responsive & interactive tooltips

-   **Top Referrers Widget**:

    -   List 10 referrer domains teratas (30 hari)
    -   Sorted by visit count

-   **Top Projects Table**:

    -   5 project teratas dengan views & unique visitors (30 hari)
    -   Link ke edit project

-   **Quick Actions**:
    -   Shortcut ke Projects, Pricing Plans, Testimonials, Settings

### 5. **Controller** (`DashboardController`)

-   Fetch semua data analytics dari PageView model
-   Pass ke view untuk rendering
-   Combine analytics data + CMS stats

## 🎯 Cara Menggunakan

### Akses Dashboard Analytics

1. Login ke admin: `http://127.0.0.1:8000/admin/login`
2. Dashboard otomatis menampilkan analytics

### Tracking Dimulai Otomatis

-   Setiap kunjungan ke halaman publik (landing `/` dan work detail `/work/{slug}`) akan tercatat
-   Middleware `TrackPageView` sudah terdaftar di web middleware group
-   Cookie `visitor_id` di-set otomatis untuk unique visitor tracking

### Query Analytics Manual (via Tinker)

```php
use App\Models\PageView;
use App\Models\Visitor;

// Total views hari ini
PageView::getTodayViews();

// Unique visitors 7 hari terakhir
PageView::getLast7DaysUniqueVisitors();

// Top 5 projects
PageView::getTopProjects(5);

// Trend 30 hari
PageView::getDailyTrend(30);

// Top referrers
PageView::getTopReferrers(10);
```

## 📊 Data Yang Dicatat

### Setiap Pageview:

-   **When**: `occurred_at` timestamp
-   **Who**: `visitor_id`, `visitor_token`, `session_id_hash`
-   **What**: `path`, `route_name`, `page_type` (landing/work_detail), `project_id`
-   **Where From**: `referrer`, `referrer_domain`
-   **Marketing**: `utm_source`, `utm_medium`, `utm_campaign`, `utm_term`, `utm_content`
-   **Privacy**: `ip_hash` (SHA256 hash), `user_agent`, `device_type`

### Setiap Visitor (first time):

-   Unique `visitor_token` (UUID)
-   First/last seen timestamps
-   First referrer & domain
-   User agent & device type

## 🔒 Privacy & Security

-   **No Raw IP**: IP di-hash dengan SHA256 + app key (tidak reversible)
-   **Cookie-based**: Visitor ID di-set via cookie (bisa di-opt-out user)
-   **Minimal Data**: Tidak simpan PII (personally identifiable information)
-   **Retention**: Bisa tambahkan job untuk purge old data (90+ hari)

## 🚀 Fitur Lanjutan (Belum Diimplementasikan)

### MVP Done ✅ - Sudah Selesai!

### Next Steps (Opsional):

1. **Event Tracking** (Conversion Funnel):

    - Track klik WhatsApp button
    - Track klik Email button
    - Track klik CTA pricing
    - Add `analytics_events` table + Event model

2. **UTM Campaign Reporting**:

    - Dashboard section untuk UTM breakdown
    - Campaign performance table
    - Chart by source/medium

3. **Device & Browser Breakdown**:

    - Pie chart device distribution (mobile vs desktop vs tablet)
    - Browser family detection (parse UA)
    - OS detection

4. **Bot Filtering**:

    - Improved bot detection
    - Exclude bot traffic from analytics
    - Separate "bot views" metric

5. **Admin Activity Log** (Audit Trail):

    - Install `spatie/laravel-activitylog`
    - Track CRUD operations (who changed what when)
    - Dashboard widget "Recent Admin Activity"

6. **Daily Aggregation Job**:

    - Scheduler untuk populate `analytics_daily_aggregates`
    - Improve query performance untuk historical data
    - Retention policy: keep raw data 90 days, aggregates forever

7. **Export & Reports**:

    - Export analytics data ke CSV/Excel
    - PDF report generation
    - Email weekly summary to admin

8. **Google Analytics Integration**:

    - Install `spatie/laravel-analytics`
    - Fetch GA data via API
    - Display GA metrics di dashboard (kombinasi internal + GA)

9. **Real-time Dashboard**:

    - WebSocket (Laravel Echo + Pusher/Soketi)
    - Live visitor count
    - Real-time pageview updates

10. **Performance Monitoring**:
    - Install `laravel/pulse`
    - Track slow queries, exceptions, jobs
    - Performance metrics di dashboard

## 🛠️ Troubleshooting

### Dashboard Kosong / No Data?

1. Pastikan migration sudah run: `php artisan migrate`
2. Akses halaman publik untuk generate views: `http://127.0.0.1:8000/`
3. Refresh dashboard admin
4. Check terminal untuk errors dari middleware

### Cookie Tidak Tersimpan?

-   Check browser allow cookies
-   Pastikan middleware terdaftar di `bootstrap/app.php`

### Tracking Tidak Jalan?

1. Check middleware registration di `bootstrap/app.php`
2. Verify route name di `routes/web.php` (harus `landing` dan `work.detail`)
3. Check logs: `storage/logs/laravel.log`

### Chart Tidak Muncul?

-   Check browser console untuk JS errors
-   Verify Chart.js CDN loaded (inspect network tab)
-   Check `$dailyTrend7Days` data ada di view

## 📁 File Structure

```
app/
├── Http/
│   ├── Controllers/Admin/
│   │   └── DashboardController.php (✅ Updated with analytics)
│   └── Middleware/
│       └── TrackPageView.php (✅ New)
├── Models/
│   ├── PageView.php (✅ New)
│   └── Visitor.php (✅ New)
bootstrap/
└── app.php (✅ Updated - middleware registered)
database/
└── migrations/
    └── 2026_01_01_142759_create_analytics_tables.php (✅ New)
resources/
└── views/
    └── admin/
        └── dashboard.blade.php (✅ Completely rebuilt)
```

## 🎨 UI Design Consistency

Dashboard mengikuti design system admin yang ada:

-   Color palette: `#2563eb` (royal blue), `#059669` (green), `#d97706` (amber), `#dc2626` (red)
-   Typography: System font dengan weight hierarchy
-   Cards: Border radius 12px, subtle shadows
-   Icons: Feather icons via inline SVG
-   Chart: Chart.js dengan tema yang konsisten
-   Spacing: Consistent 16px/20px/24px grid

---

**Status**: ✅ **MVP Complete & Ready for Production**

Semua fitur dasar analytics sudah berfungsi. Data tracking sudah aktif sejak migration run. Dashboard menampilkan insights real-time dari traffic website.

Next: Test dengan real traffic, lalu pilih fitur lanjutan yang mau diimplementasikan dari list di atas.
