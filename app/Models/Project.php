<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'sort_order',
        'is_published',
        'slug',
        'hero_image',
        'title',
        'subtitle',
        'client',
        'industry',
        'year',
        'duration',
        'hero_image_url',
        'challenge',
        'solution',
        'results',
        'features',
        'tech',
        'testimonial',
    ];

    protected $casts = [
        'results' => 'array',
        'features' => 'array',
        'tech' => 'array',
        'testimonial' => 'array',
        'is_published' => 'boolean',
    ];
}
