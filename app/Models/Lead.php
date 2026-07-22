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
    ];
}
