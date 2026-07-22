<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeHero extends Model
{
    protected $fillable = [
        'kicker',
        'title',
        'highlighted_title',
        'description',
        'background_image',
        'primary_button_text',
        'primary_button_url',
        'secondary_button_text',
        'secondary_button_url',
        'fact_one_value',
        'fact_one_label',
        'fact_two_value',
        'fact_two_label',
        'fact_three_value',
        'fact_three_label',
        'fact_four_value',
        'fact_four_label',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
