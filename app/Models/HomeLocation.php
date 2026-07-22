<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeLocation extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'highlighted_title',
        'description',

        'image',
        'image_alt',
        'image_caption',

        'location_one_name',
        'location_one_time',

        'location_two_name',
        'location_two_time',

        'location_three_name',
        'location_three_time',

        'location_four_name',
        'location_four_time',

        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
