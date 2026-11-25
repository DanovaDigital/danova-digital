@extends('admin.layout')

@section('title', 'Dashboard — Danova Admin')

@section('header-title', 'Dashboard')
@section('header-subtitle', 'Analytics & Statistik Website')

@section('content')
<!-- Analytics KPI Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin-bottom: 24px;">
    <div class="kpi-card">
        <div class="kpi-icon" style="background: #e0edff;">
            <svg width="24" height="24" fill="none" stroke="#2563eb" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label">Hari Ini</div>
            <div class="kpi-value">{{ number_format($todayViews) }}</div>
            <div class="kpi-sublabel">{{ number_format($todayVisitors) }} visitors</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon" style="background: #d1fae5;">
            <svg width="24" height="24" fill="none" stroke="#059669" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label">7 Hari Terakhir</div>
            <div class="kpi-value">{{ number_format($last7DaysViews) }}</div>
            <div class="kpi-sublabel">{{ number_format($last7DaysVisitors) }} unique</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon" style="background: #fef3c7;">
            <svg width="24" height="24" fill="none" stroke="#d97706" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label">Total Projects</div>
            <div class="kpi-value">{{ $totalProjects }}</div>
            <div class="kpi-sublabel">{{ $publishedProjects }} published</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon" style="background: #fee2e2;">
            <svg width="24" height="24" fill="none" stroke="#dc2626" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label">Testimonials</div>
            <div class="kpi-value">{{ $totalTestimonials }}</div>
            <div class="kpi-sublabel">client reviews</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon" style="background: var(--primary-light);">
            <svg width="24" height="24" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label">Brief Masuk</div>
            <div class="kpi-value">{{ number_format($totalLeads ?? 0) }}</div>
            <div class="kpi-sublabel">{{ number_format($last7DaysLeads ?? 0) }} dalam 7 hari</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon" style="background: #e0edff;">
            <svg width="24" height="24" fill="none" stroke="#2563eb" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 7l4-4m0 0h-4m4 0v4"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label">CTA Clicks</div>
            <div class="kpi-value">{{ number_format($last7DaysOutboundTotal ?? 0) }}</div>
            <div class="kpi-sublabel">7 hari — WA {{ number_format($last7DaysWhatsAppClicks ?? 0) }}, Email {{ number_format($last7DaysEmailClicks ?? 0) }}, Pricing {{ number_format($last7DaysPricingClicks ?? 0) }}</div>
        </div>
    </div>
</div>

<!-- Brief Masuk Terbaru (Operasional) -->
<div class="card" style="margin-bottom: 24px;">
    <div style="padding: 20px 24px; border-bottom: 1px solid var(--light-gray); display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap;">
        <div>
            <h3 class="dash-heading">
                <svg width="18" height="18" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                Brief Masuk Terbaru
            </h3>
            <p class="muted" style="font-size: 13px;">Prospek terbaru dari kalkulator proyek landing page</p>
        </div>
        <a href="{{ route('admin.leads.index') }}" class="btn btn-sm">Lihat Semua</a>
    </div>
    @if(($recentLeads ?? collect())->isNotEmpty())
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Brand / Usaha</th>
                    <th>Layanan & Paket</th>
                    <th>Estimasi</th>
                    <th>Waktu</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentLeads as $lead)
                <tr>
                    <td>
                        <div style="font-weight: 600; color: var(--black);">{{ $lead->brand }}</div>
                        <div class="muted" style="font-size: 12px;">+{{ $lead->phone }}</div>
                    </td>
                    <td>
                        <div style="font-weight: 500;">{{ $lead->service }}</div>
                        @if($lead->plan)
                        <div class="muted" style="font-size: 12px;">Paket {{ $lead->plan }}</div>
                        @endif
                    </td>
                    <td style="font-weight: 600; color: var(--primary);">{{ $lead->estimate ?: '—' }}</td>
                    <td class="muted" style="font-size: 12px; white-space: nowrap;">{{ $lead->updated_at->timezone(config('app.timezone'))->format('d/m/Y H:i') }}</td>
                    <td style="text-align: right;">
                        <a href="https://wa.me/{{ $lead->phone }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Hubungi WA</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        @include('admin.partials.empty-state', [
            'title' => 'Belum ada brief masuk',
            'description' => 'Data calon klien dari kalkulator proyek akan tampil di sini untuk langsung Anda tindak lanjuti.',
        ])
    @endif
</div>

<!-- Charts Section -->
<div class="dashboard-charts-grid">
    <div class="card">
        <div style="padding: 20px 24px; border-bottom: 1px solid var(--light-gray);">
            <h3 class="dash-heading">
                <svg width="18" height="18" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                </svg>
                Pageview Trend
            </h3>
            <p class="muted" style="font-size: 13px;">7 hari terakhir</p>
        </div>
        <div style="padding: 24px;">
            <canvas id="trendChart" height="80"></canvas>
        </div>
    </div>

    <div class="card">
        <div style="padding: 20px 24px; border-bottom: 1px solid var(--light-gray);">
            <h3 class="dash-heading">
                <svg width="18" height="18" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                </svg>
                Top Referrers
            </h3>
            <p class="muted" style="font-size: 13px;">30 hari terakhir</p>
        </div>
        <div style="padding: 20px 24px;">
            @forelse($topReferrers as $referrer)
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid var(--light-gray);">
                <div style="font-size: 13px; color: var(--black); font-weight: 500; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $referrer['referrer_domain'] ?? 'Direct/None' }}
                </div>
                <div style="font-size: 13px; color: var(--medium-gray); font-weight: 600;">
                    {{ number_format($referrer['visits']) }}
                </div>
            </div>
            @empty
            @include('admin.partials.empty-state', [
                'title' => 'Belum ada data referrer',
                'description' => 'Sumber trafik pengunjung akan muncul setelah ada kunjungan.',
            ])
            @endforelse
        </div>
    </div>
</div>

<!-- CTA Events Widget -->
<div class="card" style="margin-bottom: 24px;">
    <div style="padding: 20px 24px; border-bottom: 1px solid var(--light-gray);">
        <h3 class="dash-heading">
            <svg width="18" height="18" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
            </svg>
            CTA Performance
        </h3>
        <p class="muted" style="font-size: 13px;">Klik WhatsApp/Email/Pricing (7 hari terakhir)</p>
    </div>
    <div style="padding: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
        <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 10px; background: #f9fafb;">
            <div class="muted" style="font-size: 12px; margin-bottom: 6px;">WhatsApp</div>
            <div style="font-size: 22px; font-weight: 700; color: #1f2937;">{{ number_format($last7DaysWhatsAppClicks ?? 0) }}</div>
        </div>
        <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 10px; background: #f9fafb;">
            <div class="muted" style="font-size: 12px; margin-bottom: 6px;">Email (Gmail)</div>
            <div style="font-size: 22px; font-weight: 700; color: #1f2937;">{{ number_format($last7DaysEmailClicks ?? 0) }}</div>
        </div>
        <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 10px; background: #f9fafb;">
            <div class="muted" style="font-size: 12px; margin-bottom: 6px;">Pricing CTA</div>
            <div style="font-size: 22px; font-weight: 700; color: #1f2937;">{{ number_format($last7DaysPricingClicks ?? 0) }}</div>
        </div>
    </div>

    <div style="padding: 0 20px 20px;">
        <div style="font-weight: 600; font-size: 13px; margin-bottom: 10px;">Top pricing (by clicks)</div>
        @forelse($topPricingPackages7Days ?? [] as $row)
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
            <div style="min-width: 0;">
                <div style="font-size: 13px; font-weight: 600; color: #1f2937; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $row['package_name'] ?? 'Unknown' }}</div>
                <div class="muted" style="font-size: 12px;">{{ $row['package_price'] ?? '' }}</div>
            </div>
            <div style="font-size: 13px; color: #2563eb; font-weight: 700; padding-left: 12px;">{{ number_format($row['clicks'] ?? 0) }}</div>
        </div>
        @empty
        <div class="muted" style="text-align: center; padding: 18px; font-size: 13px;">
            Belum ada data klik pricing
        </div>
        @endforelse
    </div>
</div>

<!-- Top Projects Table -->
<div class="card" style="margin-bottom: 24px;">
    <div style="padding: 20px 24px; border-bottom: 1px solid var(--light-gray);">
        <h3 class="dash-heading">
            <svg width="18" height="18" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Top Projects
        </h3>
        <p class="muted" style="font-size: 13px;">Project paling banyak dilihat (30 hari)</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Project</th>
                <th style="text-align: center;">Views</th>
                <th style="text-align: center;">Unique Visitors</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($topProjects as $project)
            <tr>
                <td>
                    <div style="font-weight: 600; font-size: 14px; margin-bottom: 2px;">{{ $project['title'] }}</div>
                    <div class="muted" style="font-size: 12px;">/work/{{ $project['slug'] }}</div>
                </td>
                <td style="text-align: center; font-weight: 600; color: #2563eb;">
                    {{ number_format($project['views']) }}
                </td>
                <td style="text-align: center; font-weight: 600; color: #059669;">
                    {{ number_format($project['unique_visitors']) }}
                </td>
                <td style="text-align: right;">
                    <a href="{{ route('admin.projects.edit', $project['id']) }}" class="btn btn-sm">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="muted" style="text-align: center; padding: 32px; font-size: 13px;">
                    Belum ada data views project
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Quick Actions -->
<div class="card">
    <div style="padding: 20px 24px; border-bottom: 1px solid var(--light-gray);">
        <h3 class="dash-heading">
            <svg width="18" height="18" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            Quick Actions
        </h3>
        <p class="muted" style="font-size: 13px;">Kelola konten & operasional harian</p>
    </div>
    <div style="padding: 20px 24px; display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 16px;">
        <a href="{{ route('admin.leads.index') }}" class="quick-action-card">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <div style="font-weight: 600; font-size: 14px;">Brief Masuk</div>
        </a>

        <a href="{{ route('admin.projects.index') }}" class="quick-action-card">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <div style="font-weight: 600; font-size: 14px;">Projects</div>
        </a>

        <a href="{{ route('admin.pricing-plans.index') }}" class="quick-action-card">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div style="font-weight: 600; font-size: 14px;">Pricing Plans</div>
        </a>

        <a href="{{ route('admin.testimonials.index') }}" class="quick-action-card">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
            <div style="font-weight: 600; font-size: 14px;">Testimonials</div>
        </a>

        <a href="{{ route('admin.settings.index') }}" class="quick-action-card">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <div style="font-weight: 600; font-size: 14px;">Settings</div>
        </a>
    </div>
</div>

<style>
    .dash-heading {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .dashboard-charts-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-bottom: 24px;
    }

    @media (max-width: 960px) {
        .dashboard-charts-grid {
            grid-template-columns: 1fr;
        }
    }

    .kpi-card {
        background: var(--white);
        border: 1px solid var(--light-gray);
        border-radius: var(--radius);
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .kpi-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .kpi-label {
        font-size: 12px;
        color: var(--medium-gray);
        font-weight: 600;
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .kpi-value {
        font-family: 'Poppins', sans-serif;
        font-size: 28px;
        font-weight: 700;
        color: var(--black);
        line-height: 1;
        margin-bottom: 4px;
    }

    .kpi-sublabel {
        font-size: 12px;
        color: var(--medium-gray);
    }

    .quick-action-card {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px;
        background: var(--surface);
        border: 1px solid var(--light-gray);
        border-radius: var(--radius-sm);
        text-decoration: none;
        color: var(--black);
        transition: all 0.2s ease;
    }

    .quick-action-card:hover {
        background: var(--white);
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    .quick-action-card svg {
        color: var(--primary);
        flex-shrink: 0;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prepare data for trend chart
        const trendData = @json($dailyTrend7Days);
        const labels = trendData.map(d => {
            const date = new Date(d.date);
            return date.toLocaleDateString('id-ID', {
                month: 'short',
                day: 'numeric'
            });
        });
        const views = trendData.map(d => d.views);
        const uniqueVisitors = trendData.map(d => d.unique_visitors);

        // Trend Chart
        const ctx = document.getElementById('trendChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Views',
                    data: views,
                    borderColor: '#2454A5',
                    backgroundColor: 'rgba(36, 84, 165, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Unique Visitors',
                    data: uniqueVisitors,
                    borderColor: '#059669',
                    backgroundColor: 'rgba(5, 150, 105, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 15,
                            font: {
                                size: 12,
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        padding: 12,
                        titleColor: '#ffffff',
                        bodyColor: '#e5e7eb',
                        borderColor: '#374151',
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            color: '#f3f4f6'
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endsection