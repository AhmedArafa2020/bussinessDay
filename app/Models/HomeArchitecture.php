<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeArchitecture extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'lead_text',
        'description',
        'interiors_text',
        'image',
        'image_alt',
        'image_caption',
        'button_text',
        'button_url',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
