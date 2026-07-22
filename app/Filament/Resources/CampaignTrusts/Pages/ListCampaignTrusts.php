<?php

namespace App\Filament\Resources\CampaignTrusts\Pages;

use App\Filament\Resources\CampaignTrusts\CampaignTrustResource;
use App\Models\CampaignTrust;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCampaignTrusts extends ListRecords
{
    protected static string $resource = CampaignTrustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! CampaignTrust::query()->exists()
                ),
        ];
    }
}
