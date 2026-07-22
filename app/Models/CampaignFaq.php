<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignFaq extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'description',
        'questions',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'questions' => 'array',
            'is_active' => 'boolean',
        ];
    }
}
