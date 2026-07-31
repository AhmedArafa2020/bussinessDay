<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table): void {
            /*
            |--------------------------------------------------------------------------
            | General
            |--------------------------------------------------------------------------
            */

            if (! Schema::hasColumn('site_settings', 'site_tagline')) {
                $table->string('site_tagline')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'default_language')) {
                $table->string('default_language', 10)
                    ->default('en');
            }

            if (! Schema::hasColumn('site_settings', 'site_direction')) {
                $table->string('site_direction', 10)
                    ->default('ltr');
            }

            /*
            |--------------------------------------------------------------------------
            | Branding
            |--------------------------------------------------------------------------
            */

            if (! Schema::hasColumn('site_settings', 'logo_dark')) {
                $table->string('logo_dark')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'footer_logo')) {
                $table->string('footer_logo')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'favicon')) {
                $table->string('favicon')
                    ->nullable();
            }

            /*
            |--------------------------------------------------------------------------
            | Contact
            |--------------------------------------------------------------------------
            */

            if (! Schema::hasColumn('site_settings', 'whatsapp')) {
                $table->string('whatsapp', 100)
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'working_hours')) {
                $table->string('working_hours')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'google_map_url')) {
                $table->text('google_map_url')
                    ->nullable();
            }

            /*
            |--------------------------------------------------------------------------
            | Social Links
            |--------------------------------------------------------------------------
            */

            if (! Schema::hasColumn('site_settings', 'facebook_url')) {
                $table->text('facebook_url')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'instagram_url')) {
                $table->text('instagram_url')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'linkedin_url')) {
                $table->text('linkedin_url')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'twitter_url')) {
                $table->text('twitter_url')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'youtube_url')) {
                $table->text('youtube_url')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'tiktok_url')) {
                $table->text('tiktok_url')
                    ->nullable();
            }

            /*
            |--------------------------------------------------------------------------
            | Default SEO
            |--------------------------------------------------------------------------
            */

            if (! Schema::hasColumn('site_settings', 'meta_title')) {
                $table->string('meta_title')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'meta_description')) {
                $table->text('meta_description')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'meta_keywords')) {
                $table->text('meta_keywords')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'meta_robots')) {
                $table->string('meta_robots')
                    ->default('index, follow');
            }

            if (! Schema::hasColumn('site_settings', 'canonical_url')) {
                $table->text('canonical_url')
                    ->nullable();
            }

            /*
            |--------------------------------------------------------------------------
            | Open Graph
            |--------------------------------------------------------------------------
            */

            if (! Schema::hasColumn('site_settings', 'og_title')) {
                $table->string('og_title')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'og_description')) {
                $table->text('og_description')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'og_image')) {
                $table->string('og_image')
                    ->nullable();
            }

            /*
            |--------------------------------------------------------------------------
            | Twitter / X
            |--------------------------------------------------------------------------
            */

            if (! Schema::hasColumn('site_settings', 'twitter_title')) {
                $table->string('twitter_title')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'twitter_description')) {
                $table->text('twitter_description')
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'twitter_image')) {
                $table->string('twitter_image')
                    ->nullable();
            }

            /*
            |--------------------------------------------------------------------------
            | Analytics
            |--------------------------------------------------------------------------
            */

            if (! Schema::hasColumn('site_settings', 'google_analytics_id')) {
                $table->string('google_analytics_id', 100)
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'google_tag_manager_id')) {
                $table->string('google_tag_manager_id', 100)
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'facebook_pixel_id')) {
                $table->string('facebook_pixel_id', 100)
                    ->nullable();
            }

            if (! Schema::hasColumn('site_settings', 'google_verification_code')) {
                $table->string('google_verification_code')
                    ->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table): void {
            $columns = [
                'site_tagline',
                'default_language',
                'site_direction',

                'logo_dark',
                'footer_logo',
                'favicon',

                'whatsapp',
                'working_hours',
                'google_map_url',

                'facebook_url',
                'instagram_url',
                'linkedin_url',
                'twitter_url',
                'youtube_url',
                'tiktok_url',

                'meta_title',
                'meta_description',
                'meta_keywords',
                'meta_robots',
                'canonical_url',

                'og_title',
                'og_description',
                'og_image',

                'twitter_title',
                'twitter_description',
                'twitter_image',

                'google_analytics_id',
                'google_tag_manager_id',
                'facebook_pixel_id',
                'google_verification_code',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('site_settings', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
