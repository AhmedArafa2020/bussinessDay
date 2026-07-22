<?php

namespace App\Filament\Resources\HomeLocations\Pages;

use App\Filament\Resources\HomeLocations\HomeLocationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeLocation extends EditRecord
{
    protected static string $resource = HomeLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
