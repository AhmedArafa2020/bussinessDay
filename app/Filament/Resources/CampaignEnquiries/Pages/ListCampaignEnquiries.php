<?php

namespace App\Filament\Resources\CampaignEnquiries\Pages;

use App\Filament\Resources\CampaignEnquiries\CampaignEnquiryResource;
use App\Models\CampaignEnquiry;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCampaignEnquiries extends ListRecords
{
    protected static string $resource = CampaignEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! CampaignEnquiry::query()->exists()
                ),
        ];
    }
}
