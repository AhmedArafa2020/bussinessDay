<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'project_name',
        'email',
        'cairo_phone',
        'dubai_phone',
        'whatsapp',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'footer_description',
    ];
    protected static function booted(): void
    {
        static::saved(function (): void {
            Cache::forget('site_settings_data');
        });

        static::deleted(function (): void {
            Cache::forget('site_settings_data');
        });
    }
}
