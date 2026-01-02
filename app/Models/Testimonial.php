<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'sort_order',
        'is_featured',
        'is_published',
        'avatar_image',
        'name',
        'title',
        'quote',
        'avatar_url',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];
}
