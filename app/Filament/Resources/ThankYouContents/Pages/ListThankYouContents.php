<?php

namespace App\Filament\Resources\ThankYouContents\Pages;

use App\Filament\Resources\ThankYouContents\ThankYouContentResource;
use App\Models\ThankYouContent;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListThankYouContents extends ListRecords
{
    protected static string $resource = ThankYouContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! ThankYouContent::query()->exists()
                ),
        ];
    }
}
