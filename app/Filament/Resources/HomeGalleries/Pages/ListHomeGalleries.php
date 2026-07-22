<?php

namespace App\Filament\Resources\HomeGalleries\Pages;

use App\Filament\Resources\HomeGalleries\HomeGalleryResource;
use App\Models\HomeGallery;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeGalleries extends ListRecords
{
    protected static string $resource = HomeGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeGallery::query()->exists()
                ),
        ];
    }
}
