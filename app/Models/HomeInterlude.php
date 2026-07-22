<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeInterlude extends Model
{
    protected $fillable = [
        'quote',
        'highlighted_text',
        'citation',
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
