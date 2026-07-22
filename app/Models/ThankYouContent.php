<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThankYouContent extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'highlighted_title',
        'description',
        'primary_button_text',
        'primary_button_url',
        'secondary_button_text',
        'secondary_button_url',
        'background_image',
        'image_alt',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
