<?php

namespace App\Filament\Resources\CampaignEnquiries\Pages;

use App\Filament\Resources\CampaignEnquiries\CampaignEnquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCampaignEnquiry extends EditRecord
{
    protected static string $resource = CampaignEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
