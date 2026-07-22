<?php

namespace App\Filament\Resources\HomeStories\Pages;

use App\Filament\Resources\HomeStories\HomeStoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeStories extends ListRecords
{
    protected static string $resource = HomeStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeStoryResource::getModel()::query()->exists()
                ),
        ];
    }
}
