<?php

namespace App\Filament\Resources\HomeConcepts\Pages;

use App\Filament\Resources\HomeConcepts\HomeConceptResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeConcepts extends ListRecords
{
    protected static string $resource = HomeConceptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeConceptResource::getModel()
                        ::query()
                        ->exists()
                ),
        ];
    }
}
