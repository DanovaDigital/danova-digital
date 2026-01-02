<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class AnalyticsEvent extends Model
{
    protected $table = 'analytics_events';

    protected $fillable = [
        'occurred_at',
        'visitor_id',
        'visitor_token',
        'session_id_hash',
        'event_type',
        'event_name',
        'context',
        'project_id',
        'pricing_plan_id',
        'package_name',
        'package_price',
        'referrer',
        'referrer_domain',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'ip_hash',
        'user_agent',
    ];

    protected $casts = [
        'occurred_at' => 'datetime',
    ];

    public function visitor(): BelongsTo
    {
        return $this->belongsTo(Visitor::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function pricingPlan(): BelongsTo
    {
        return $this->belongsTo(PricingPlan::class);
    }

    public function scopeLast7Days(Builder $query): Builder
    {
        return $query->where('occurred_at', '>=', now()->subDays(7));
    }

    public static function getLast7DaysOutboundCounts(): array
    {
        return static::select(
            'event_name',
            DB::raw('COUNT(*) as clicks')
        )
            ->where('event_type', 'outbound')
            ->last7Days()
            ->groupBy('event_name')
            ->orderByDesc('clicks')
            ->get()
            ->pluck('clicks', 'event_name')
            ->toArray();
    }

    public static function getLast7DaysOutboundTotal(): int
    {
        return static::where('event_type', 'outbound')->last7Days()->count();
    }

    public static function getTopPricingPackagesLast7Days(int $limit = 5): array
    {
        return static::select(
            'package_name',
            'package_price',
            DB::raw('COUNT(*) as clicks')
        )
            ->where('event_type', 'outbound')
            ->where('event_name', 'pricing')
            ->whereNotNull('package_name')
            ->last7Days()
            ->groupBy('package_name', 'package_price')
            ->orderByDesc('clicks')
            ->limit($limit)
            ->get()
            ->toArray();
    }
}
