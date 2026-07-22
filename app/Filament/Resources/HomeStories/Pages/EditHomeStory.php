<?php

namespace App\Filament\Resources\HomeStories\Pages;

use App\Filament\Resources\HomeStories\HomeStoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeStory extends EditRecord
{
    protected static string $resource = HomeStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
