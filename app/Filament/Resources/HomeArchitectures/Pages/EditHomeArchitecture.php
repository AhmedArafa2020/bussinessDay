<?php

namespace App\Filament\Resources\HomeArchitectures\Pages;

use App\Filament\Resources\HomeArchitectures\HomeArchitectureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeArchitecture extends EditRecord
{
    protected static string $resource = HomeArchitectureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
