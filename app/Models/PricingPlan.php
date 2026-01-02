<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = [
        'sort_order',
        'is_featured',
        'is_published',
        'name',
        'price',
        'subtitle',
        'features',
        'cta_label',
        'cta_package_name',
        'cta_package_price',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];
}
