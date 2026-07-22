<?php

namespace App\Filament\Resources\HomeResidences\Pages;

use App\Filament\Resources\HomeResidences\HomeResidenceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeResidence extends EditRecord
{
    protected static string $resource = HomeResidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
