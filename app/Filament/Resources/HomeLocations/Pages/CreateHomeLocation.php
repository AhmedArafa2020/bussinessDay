<?php

namespace App\Filament\Resources\HomeLocations\Pages;

use App\Filament\Resources\HomeLocations\HomeLocationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeLocation extends CreateRecord
{
    protected static string $resource = HomeLocationResource::class;
}
