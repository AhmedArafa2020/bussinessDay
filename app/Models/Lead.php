<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'interest',
        'budget',
        'contact_method',
        'message',
        'source',
        'status',
        'ip_address',
        'user_agent',
        'country',
        'enquiry_type',
        'launch_list',
        'consent_at',
    ];
    protected function casts(): array
    {
        return [
            'launch_list' => 'boolean',
            'consent_at' => 'datetime',
        ];
    }
}

