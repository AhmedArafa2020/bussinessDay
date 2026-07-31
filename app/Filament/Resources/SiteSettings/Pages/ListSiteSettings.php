<?php

namespace App\Filament\Resources\SiteSettings\Pages;

use App\Filament\Resources\SiteSettings\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Resources\Pages\ListRecords;

class ListSiteSettings extends ListRecords
{
    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
    public function mount(): void
    {
        parent::mount();

        $siteSetting = SiteSetting::query()->first();

        if ($siteSetting) {
            $this->redirect(
                static::getResource()::getUrl('edit', [
                    'record' => $siteSetting,
                ])
            );
        }
    }
}
