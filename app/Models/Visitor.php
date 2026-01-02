<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Visitor extends Model
{
    protected $table = 'analytics_visitors';

    protected $fillable = [
        'visitor_token',
        'first_seen_at',
        'last_seen_at',
        'first_referrer',
        'first_referrer_domain',
        'user_agent',
        'device_type',
    ];

    protected $casts = [
        'first_seen_at' => 'datetime',
        'last_seen_at' => 'datetime',
    ];

    public function pageViews(): HasMany
    {
        return $this->hasMany(PageView::class);
    }

    public static function findOrCreateByToken(string $token): self
    {
        return static::firstOrCreate(
            ['visitor_token' => $token],
            [
                'first_seen_at' => now(),
                'last_seen_at' => now(),
            ]
        );
    }

    public function updateLastSeen(): void
    {
        $this->update(['last_seen_at' => now()]);
    }
}
