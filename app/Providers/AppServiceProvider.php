<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $siteSettings = null;

        if (Schema::hasTable('site_settings')) {
            $settingsData = Cache::rememberForever(
                'site_settings_data',
                fn (): ?array => SiteSetting::query()
                    ->first()
                    ?->toArray()
            );

            $siteSettings = $settingsData
                ? (object) $settingsData
                : null;
        }

        View::share('siteSettings', $siteSettings);
    }
}
