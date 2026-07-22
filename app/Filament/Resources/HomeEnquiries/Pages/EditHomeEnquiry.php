<?php

namespace App\Filament\Resources\HomeEnquiries\Pages;

use App\Filament\Resources\HomeEnquiries\HomeEnquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeEnquiry extends EditRecord
{
    protected static string $resource = HomeEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
