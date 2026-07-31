<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'hero_title',
        'hero_description',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'meta_robots',
        'og_title',
        'og_description',
        'og_image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'meta_keywords' => 'array',
            'is_active' => 'boolean',
        ];
    }
}
