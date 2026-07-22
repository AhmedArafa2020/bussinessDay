<?php

namespace App\Filament\Resources\HomeResidences\Pages;

use App\Filament\Resources\HomeResidences\HomeResidenceResource;
use App\Models\HomeResidence;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeResidences extends ListRecords
{
    protected static string $resource = HomeResidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeResidence::query()->exists()
                ),
        ];
    }
}
