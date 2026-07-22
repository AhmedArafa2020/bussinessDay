<?php

namespace App\Filament\Resources\HomeInterludes\Pages;

use App\Filament\Resources\HomeInterludes\HomeInterludeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeInterludes extends ListRecords
{
    protected static string $resource = HomeInterludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeInterludeResource::getModel()
                        ::query()
                        ->exists()
                ),
        ];
    }
}
