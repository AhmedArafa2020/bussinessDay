<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignEnquiry extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'highlighted_title',
        'description',
        'form_title',
        'submit_button_text',
        'privacy_text',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
