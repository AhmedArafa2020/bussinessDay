<?php

namespace App\Filament\Resources\ThankYouContents\Pages;

use App\Filament\Resources\ThankYouContents\ThankYouContentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditThankYouContent extends EditRecord
{
    protected static string $resource = ThankYouContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
