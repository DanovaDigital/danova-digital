<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    public const STATUSES = [
        'baru' => 'Baru',
        'dihubungi' => 'Sudah Dihubungi',
        'negosiasi' => 'Negosiasi',
        'deal' => 'Deal',
        'batal' => 'Batal',
    ];

    protected $fillable = [
        'draft_id', 'brand', 'phone', 'service', 'plan', 'addons',
        'budget', 'timeline', 'notes', 'estimate', 'status', 'admin_notes',
    ];

    protected $casts = ['addons' => 'array'];

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? 'Baru';
    }
}
