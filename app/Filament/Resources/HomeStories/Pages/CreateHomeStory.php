<?php

namespace App\Filament\Resources\HomeStories\Pages;

use App\Filament\Resources\HomeStories\HomeStoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeStory extends CreateRecord
{
    protected static string $resource = HomeStoryResource::class;
}
