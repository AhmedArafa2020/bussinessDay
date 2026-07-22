<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeGallery extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'description',
        'images',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'is_active' => 'boolean',
        ];
    }
}
