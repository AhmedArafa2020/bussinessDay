<?php

namespace App\Filament\Resources\CampaignFaqs\Pages;

use App\Filament\Resources\CampaignFaqs\CampaignFaqResource;
use App\Models\CampaignFaq;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCampaignFaqs extends ListRecords
{
    protected static string $resource = CampaignFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! CampaignFaq::query()->exists()
                ),
        ];
    }
}
