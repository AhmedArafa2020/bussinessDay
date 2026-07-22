<?php

namespace App\Filament\Resources\HomeLifestyles\Pages;

use App\Filament\Resources\HomeLifestyles\HomeLifestyleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeLifestyle extends EditRecord
{
    protected static string $resource = HomeLifestyleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
