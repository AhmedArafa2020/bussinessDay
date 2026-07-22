<?php

namespace App\Filament\Resources\CampaignFaqs\Pages;

use App\Filament\Resources\CampaignFaqs\CampaignFaqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCampaignFaq extends EditRecord
{
    protected static string $resource = CampaignFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
