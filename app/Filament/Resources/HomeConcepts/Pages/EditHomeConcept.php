<?php

namespace App\Filament\Resources\HomeConcepts\Pages;

use App\Filament\Resources\HomeConcepts\HomeConceptResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeConcept extends EditRecord
{
    protected static string $resource = HomeConceptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
