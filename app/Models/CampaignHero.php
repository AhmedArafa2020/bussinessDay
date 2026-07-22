<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignHero extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'highlighted_title',
        'description',
        'background_image',
        'image_alt',
        'primary_button_text',
        'primary_button_url',
        'secondary_button_text',
        'secondary_button_url',
        'availability_text',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
