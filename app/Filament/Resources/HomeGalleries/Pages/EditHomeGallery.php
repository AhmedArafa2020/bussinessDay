<?php

namespace App\Filament\Resources\HomeGalleries\Pages;

use App\Filament\Resources\HomeGalleries\HomeGalleryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeGallery extends EditRecord
{
    protected static string $resource = HomeGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
