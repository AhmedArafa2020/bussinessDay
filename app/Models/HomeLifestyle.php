<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeLifestyle extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'lead_text',

        'image',
        'image_alt',
        'image_caption',

        'item_one_title',
        'item_one_description',
        'item_one_label',

        'item_two_title',
        'item_two_description',
        'item_two_label',

        'item_three_title',
        'item_three_description',
        'item_three_label',

        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
