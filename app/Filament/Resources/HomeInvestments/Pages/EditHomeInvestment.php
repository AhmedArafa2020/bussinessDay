<?php

namespace App\Filament\Resources\HomeInvestments\Pages;

use App\Filament\Resources\HomeInvestments\HomeInvestmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeInvestment extends EditRecord
{
    protected static string $resource = HomeInvestmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
