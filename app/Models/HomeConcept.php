<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeConcept extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'highlighted_title',
        'description',

        'item_one_title',
        'item_one_description',
        'item_one_label',

        'item_two_title',
        'item_two_description',
        'item_two_label',

        'item_three_title',
        'item_three_description',
        'item_three_label',

        'item_four_title',
        'item_four_description',
        'item_four_label',

        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
