<?php

namespace App\Filament\Resources\CampaignBenefits\Pages;

use App\Filament\Resources\CampaignBenefits\CampaignBenefitResource;
use App\Models\CampaignBenefit;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCampaignBenefits extends ListRecords
{
    protected static string $resource = CampaignBenefitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! CampaignBenefit::query()->exists()
                ),
        ];
    }
}
