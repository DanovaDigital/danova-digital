@extends('admin.layout')

@section('title', 'Dashboard — Danova Admin')

@section('header-title', 'Dashboard')
@section('header-subtitle', 'Analytics & Operasional Website — ' . ($rangeLabel ?? '7 Hari Terakhir'))

@section('header-actions')
<div style="display: inline-flex; flex-wrap: wrap; gap: 6px; padding: 4px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);" id="rangeFilterGroup">
    @foreach(['7d' => '7 Hari', '30d' => '30 Hari', 'month' => 'Bulan Ini', '90d' => '90 Hari'] as $key => $label)
        <a href="{{ route('admin.dashboard', ['range' => $key]) }}"
           data-range="{{ $key }}"
           class="btn btn-sm range-filter-btn {{ ($range ?? '7d') === $key ? 'btn-primary' : '' }}"
           style="{{ ($range ?? '7d') === $key ? '' : 'border-color: transparent; background: transparent;' }}">
            {{ $label }}
        </a>
    @endforeach
</div>
@endsection

@section('content')
@if($isDummyWhatsapp ?? false)
<div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; padding: 14px 18px; margin-bottom: 20px; border-radius: var(--radius-sm); background: #FEF3C7; border: 1px solid #FDE68A; color: #92400E;">
    <div style="display: flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 500;">
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink: 0;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
        <span>Nomor WhatsApp bisnis masih menggunakan default dummy (<strong>6281234567890</strong>). Segera perbarui sebelum traffic masuk.</span>
    </div>
    <a href="{{ route('admin.settings.index') }}" class="btn btn-sm" style="border-color: #F59E0B; color: #92400E;">Atur Sekarang</a>
</div>
@endif

<!-- Analytics KPI Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-bottom: 24px;">
    <div class="kpi-card">
        <div class="kpi-icon" style="background: var(--primary-light);">
            <svg width="24" height="24" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label">Hari Ini</div>
            <div class="kpi-value">{{ number_format($todayViews) }}</div>
            <div class="kpi-sublabel">{{ number_format($todayVisitors) }} unique visitors</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon" style="background: #d1fae5;">
            <svg width="24" height="24" fill="none" stroke="#059669" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label" id="kpiPeriodLabel">{{ $rangeLabel ?? '7 Hari Terakhir' }}</div>
            <div class="kpi-value" id="kpiPeriodViews">{{ number_format($periodViews) }}</div>
            <div class="kpi-sublabel" id="kpiPeriodVisitors">{{ number_format($periodVisitors) }} unique visitors</div>
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
            <div class="kpi-value" id="kpiPeriodLeads">{{ number_format($periodLeads ?? 0) }}</div>
            <div class="kpi-sublabel" id="kpiLeadSub">Total {{ number_format($totalLeads ?? 0) }} · {{ $leadConversionRate ?? 0 }}% conv.</div>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-icon" style="background: #fef3c7;">
            <svg width="24" height="24" fill="none" stroke="#d97706" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
            </svg>
        </div>
        <div>
            <div class="kpi-label">CTA Clicks</div>
            <div class="kpi-value" id="kpiPeriodCta">{{ number_format($periodOutboundTotal ?? 0) }}</div>
            <div class="kpi-sublabel" id="kpiCtaSub">{{ $ctaClickRate ?? 0 }}% klik · WA {{ number_format($periodWhatsAppClicks ?? 0) }}, Email {{ number_format($periodEmailClicks ?? 0) }}</div>
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
            <p class="muted" style="font-size: 13px;">{{ $rangeLabel ?? '7 Hari Terakhir' }}</p>
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
            <p class="muted" style="font-size: 13px;">{{ $rangeLabel ?? '7 Hari Terakhir' }}</p>
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
        <p class="muted" style="font-size: 13px;">Klik WhatsApp/Email/Pricing ({{ $rangeLabel ?? '7 Hari Terakhir' }})</p>
    </div>
    <div style="padding: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px;">
        <div style="padding: 14px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);">
            <div class="muted" style="font-size: 12px; margin-bottom: 6px;">WhatsApp</div>
            <div style="font-size: 22px; font-weight: 700; color: var(--black);">{{ number_format($periodWhatsAppClicks ?? 0) }}</div>
        </div>
        <div style="padding: 14px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);">
            <div class="muted" style="font-size: 12px; margin-bottom: 6px;">Email (Gmail)</div>
            <div style="font-size: 22px; font-weight: 700; color: var(--black);">{{ number_format($periodEmailClicks ?? 0) }}</div>
        </div>
        <div style="padding: 14px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);">
            <div class="muted" style="font-size: 12px; margin-bottom: 6px;">Pricing CTA</div>
            <div style="font-size: 22px; font-weight: 700; color: var(--black);">{{ number_format($periodPricingClicks ?? 0) }}</div>
        </div>
    </div>

    <div style="padding: 0 20px 20px;">
        <div style="font-weight: 600; font-size: 13px; margin-bottom: 10px;">Top pricing (by clicks)</div>
        @forelse($topPricingPackages ?? [] as $row)
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid var(--light-gray);">
            <div style="min-width: 0;">
                <div style="font-size: 13px; font-weight: 600; color: var(--black); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $row['package_name'] ?? 'Unknown' }}</div>
                <div class="muted" style="font-size: 12px;">{{ $row['package_price'] ?? '' }}</div>
            </div>
            <div style="font-size: 13px; color: var(--primary); font-weight: 700; padding-left: 12px;">{{ number_format($row['clicks'] ?? 0) }}</div>
        </div>
        @empty
        <div class="muted" style="text-align: center; padding: 18px; font-size: 13px;">
            Belum ada data klik pricing
        </div>
        @endforelse
    </div>
</div>

<!-- Top Projects & Device Breakdown -->
<div class="card" style="margin-bottom: 24px;">
    <div style="padding: 20px 24px; border-bottom: 1px solid var(--light-gray);">
        <h3 class="dash-heading">
            <svg width="18" height="18" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
            </svg>
            Perangkat Pengunjung
        </h3>
        <p class="muted" style="font-size: 13px;">Distribusi device pengunjung ({{ $rangeLabel ?? '7 Hari Terakhir' }})</p>
    </div>
    <div style="padding: 20px 24px;">
        @php
            $deviceTotal = array_sum($deviceBreakdown ?? []);
        @endphp
        @if($deviceTotal > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 16px;">
                @foreach($deviceBreakdown as $device => $count)
                    @php
                        $pct = round(($count / $deviceTotal) * 100, 1);
                    @endphp
                    <div style="padding: 14px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);">
                        <div class="muted" style="font-size: 12px; text-transform: capitalize; margin-bottom: 4px;">{{ $device }}</div>
                        <div style="font-family: 'Poppins', sans-serif; font-size: 20px; font-weight: 700; color: var(--black);">{{ number_format($count) }} <span style="font-size: 13px; color: var(--primary); font-weight: 600;">({{ $pct }}%)</span></div>
                    </div>
                @endforeach
            </div>
        @else
            @include('admin.partials.empty-state', [
                'title' => 'Belum ada data perangkat',
                'description' => 'Proporsi Mobile vs Desktop pengunjung akan muncul setelah ada kunjungan.',
            ])
        @endif
    </div>
</div>

<!-- Top Projects Table -->
<div class="card">
    <div style="padding: 20px 24px; border-bottom: 1px solid var(--light-gray);">
        <h3 class="dash-heading">
            <svg width="18" height="18" fill="none" stroke="var(--primary)" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Top Projects
        </h3>
        <p class="muted" style="font-size: 13px;">Project paling banyak dilihat ({{ $rangeLabel ?? '7 Hari Terakhir' }})</p>
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

<!-- Top Projects End -->

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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    $(function () {
        function formatNum(n) {
            return Number(n || 0).toLocaleString('id-ID');
        }

        function formatLabels(trendData) {
            return (trendData || []).map(function (d) {
                var date = new Date(d.date);
                return date.toLocaleDateString('id-ID', { month: 'short', day: 'numeric' });
            });
        }

        var initialTrend = @json($dailyTrend);
        var ctx = document.getElementById('trendChart').getContext('2d');
        var trendChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: formatLabels(initialTrend),
                datasets: [{
                    label: 'Total Views',
                    data: initialTrend.map(function (d) { return d.views; }),
                    borderColor: '#2454A5',
                    backgroundColor: 'rgba(36, 84, 165, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Unique Visitors',
                    data: initialTrend.map(function (d) { return d.unique_visitors; }),
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
                        labels: { usePointStyle: true, padding: 15, font: { size: 12, weight: '600' } }
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
                    y: { beginAtZero: true, ticks: { precision: 0, font: { size: 11 } }, grid: { color: '#f3f4f6' } },
                    x: { ticks: { font: { size: 11 } }, grid: { display: false } }
                }
            }
        });

        $('.range-filter-btn').on('click', function (e) {
            e.preventDefault();
            var $btn = $(this);
            var url = $btn.attr('href');
            var range = $btn.data('range');

            $('.range-filter-btn')
                .removeClass('btn-primary')
                .css({ borderColor: 'transparent', background: 'transparent' });
            $btn
                .addClass('btn-primary')
                .css({ borderColor: '', background: '' });

            $.getJSON(url, { format: 'json' }).done(function (res) {
                $('#kpiPeriodLabel').text(res.rangeLabel);
                $('#kpiPeriodViews').text(formatNum(res.periodViews));
                $('#kpiPeriodVisitors').text(formatNum(res.periodVisitors) + ' unique visitors');
                $('#kpiPeriodLeads').text(formatNum(res.periodLeads));
                $('#kpiLeadSub').text('Total ' + formatNum(res.totalLeads) + ' · ' + res.leadConversionRate + '% conv.');
                $('#kpiPeriodCta').text(formatNum(res.periodOutboundTotal));
                $('#kpiCtaSub').text(res.ctaClickRate + '% klik · WA ' + formatNum(res.periodWhatsAppClicks) + ', Email ' + formatNum(res.periodEmailClicks));
                $('.header-subtitle').text('Analytics & Operasional Website — ' + res.rangeLabel);

                trendChart.data.labels = formatLabels(res.dailyTrend);
                trendChart.data.datasets[0].data = (res.dailyTrend || []).map(function (d) { return d.views; });
                trendChart.data.datasets[1].data = (res.dailyTrend || []).map(function (d) { return d.unique_visitors; });
                trendChart.update();

                if (window.history && window.history.replaceState) {
                    window.history.replaceState(null, '', url);
                }
            });
        });
    });
</script>
@endsection