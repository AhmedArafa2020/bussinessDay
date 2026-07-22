<?php

namespace App\Filament\Resources\CampaignTrusts\Pages;

use App\Filament\Resources\CampaignTrusts\CampaignTrustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCampaignTrust extends EditRecord
{
    protected static string $resource = CampaignTrustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
