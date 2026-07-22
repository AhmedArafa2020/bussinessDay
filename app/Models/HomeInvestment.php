<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeInvestment extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'lead_text',
        'description',

        'stat_one_value',
        'stat_one_label',

        'stat_two_value',
        'stat_two_label',

        'stat_three_value',
        'stat_three_label',

        'button_text',
        'button_url',

        'faq_one_question',
        'faq_one_answer',

        'faq_two_question',
        'faq_two_answer',

        'faq_three_question',
        'faq_three_answer',

        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
