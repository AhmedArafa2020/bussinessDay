<?php

namespace App\Filament\Resources\HomeLocations\Pages;

use App\Filament\Resources\HomeLocations\HomeLocationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeLocations extends ListRecords
{
    protected static string $resource = HomeLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeLocationResource::getModel()
                        ::query()
                        ->exists()
                ),
        ];
    }
}
