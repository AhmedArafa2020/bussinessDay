<?php

namespace App\Filament\Resources\CampaignBenefits\Pages;

use App\Filament\Resources\CampaignBenefits\CampaignBenefitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCampaignBenefit extends EditRecord
{
    protected static string $resource = CampaignBenefitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
