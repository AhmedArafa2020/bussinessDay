<?php

namespace App\Filament\Resources\HomeInterludes\Pages;

use App\Filament\Resources\HomeInterludes\HomeInterludeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeInterlude extends EditRecord
{
    protected static string $resource = HomeInterludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
