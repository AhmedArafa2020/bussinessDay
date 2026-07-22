<?php

namespace App\Filament\Resources\HomeEnquiries\Pages;

use App\Filament\Resources\HomeEnquiries\HomeEnquiryResource;
use App\Models\HomeEnquiry;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeEnquiries extends ListRecords
{
    protected static string $resource = HomeEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeEnquiry::query()->exists()
                ),
        ];
    }
}
