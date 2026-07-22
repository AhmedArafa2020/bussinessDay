<?php

namespace App\Filament\Resources\HomeInvestments\Pages;

use App\Filament\Resources\HomeInvestments\HomeInvestmentResource;
use App\Models\HomeInvestment;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeInvestments extends ListRecords
{
    protected static string $resource = HomeInvestmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn (): bool =>
                    ! HomeInvestment::query()->exists()
                ),
        ];
    }
}
