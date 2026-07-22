<?php

namespace App\Filament\Resources\HomeArchitectures\Pages;

use App\Filament\Resources\HomeArchitectures\HomeArchitectureResource;
use App\Models\HomeArchitecture;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeArchitectures extends ListRecords
{
    protected static string $resource = HomeArchitectureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeArchitecture::query()->exists()
                ),
        ];
    }
}
