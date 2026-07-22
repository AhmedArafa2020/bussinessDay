<?php

namespace App\Filament\Resources\CampaignHeroes\Pages;

use App\Filament\Resources\CampaignHeroes\CampaignHeroResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCampaignHero extends EditRecord
{
    protected static string $resource = CampaignHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
