<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'draft_id', 'brand', 'phone', 'service', 'plan', 'addons',
        'budget', 'timeline', 'notes', 'estimate',
    ];

    protected $casts = ['addons' => 'array'];
}
