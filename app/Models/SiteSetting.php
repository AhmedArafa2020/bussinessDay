<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        /*
        |--------------------------------------------------------------------------
        | General
        |--------------------------------------------------------------------------
        */

        'site_name',
        'project_name',
        'site_tagline',
        'default_language',
        'site_direction',

        /*
        |--------------------------------------------------------------------------
        | Branding
        |--------------------------------------------------------------------------
        */

        'logo_dark',
        'footer_logo',
        'favicon',

        /*
        |--------------------------------------------------------------------------
        | Contact
        |--------------------------------------------------------------------------
        */

        'email',
        'cairo_phone',
        'dubai_phone',
        'whatsapp',
        'working_hours',
        'google_map_url',

        /*
        |--------------------------------------------------------------------------
        | Social Links
        |--------------------------------------------------------------------------
        */

        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'twitter_url',
        'youtube_url',
        'tiktok_url',

        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */

        'footer_description',

        /*
        |--------------------------------------------------------------------------
        | Default SEO
        |--------------------------------------------------------------------------
        */

        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_robots',
        'canonical_url',

        /*
        |--------------------------------------------------------------------------
        | Open Graph
        |--------------------------------------------------------------------------
        */

        'og_title',
        'og_description',
        'og_image',

        /*
        |--------------------------------------------------------------------------
        | Twitter / X
        |--------------------------------------------------------------------------
        */

        'twitter_title',
        'twitter_description',
        'twitter_image',

        /*
        |--------------------------------------------------------------------------
        | Analytics
        |--------------------------------------------------------------------------
        */

        'google_analytics_id',
        'google_tag_manager_id',
        'facebook_pixel_id',
        'google_verification_code',
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
