<?php

namespace App\Filament\Resources\HomeEnquiries\Pages;

use App\Filament\Resources\HomeEnquiries\HomeEnquiryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeEnquiry extends CreateRecord
{
    protected static string $resource = HomeEnquiryResource::class;
}
