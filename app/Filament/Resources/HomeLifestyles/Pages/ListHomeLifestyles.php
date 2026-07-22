<?php

namespace App\Filament\Resources\HomeLifestyles\Pages;

use App\Filament\Resources\HomeLifestyles\HomeLifestyleResource;
use App\Models\HomeLifestyle;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeLifestyles extends ListRecords
{
    protected static string $resource = HomeLifestyleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeLifestyle::query()->exists()
                ),
        ];
    }
}
