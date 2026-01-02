<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'sort_order',
        'is_published',
        'question',
        'answer',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
