<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignTrust extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'lead_text',

        'image',
        'image_alt',
        'image_caption',

        'stat_one_value',
        'stat_one_label',

        'stat_two_value',
        'stat_two_label',

        'stat_three_value',
        'stat_three_label',

        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
