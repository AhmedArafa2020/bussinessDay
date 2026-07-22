<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeResidence extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'lead_text',
        'table_caption',

        'collection_one_name',
        'collection_one_layout',
        'collection_one_area',
        'collection_one_outlook',
        'collection_one_availability',

        'collection_two_name',
        'collection_two_layout',
        'collection_two_area',
        'collection_two_outlook',
        'collection_two_availability',

        'collection_three_name',
        'collection_three_layout',
        'collection_three_area',
        'collection_three_outlook',
        'collection_three_availability',

        'collection_four_name',
        'collection_four_layout',
        'collection_four_area',
        'collection_four_outlook',
        'collection_four_availability',

        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
