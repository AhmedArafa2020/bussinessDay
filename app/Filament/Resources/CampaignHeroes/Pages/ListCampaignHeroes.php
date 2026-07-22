<?php

namespace App\Filament\Resources\CampaignHeroes\Pages;

use App\Filament\Resources\CampaignHeroes\CampaignHeroResource;
use App\Models\CampaignHero;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCampaignHeroes extends ListRecords
{
    protected static string $resource = CampaignHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! CampaignHero::query()->exists()
                ),
        ];
    }
}
