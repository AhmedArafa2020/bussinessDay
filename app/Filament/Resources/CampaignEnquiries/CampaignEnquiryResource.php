<?php

namespace App\Filament\Resources\CampaignEnquiries;

use App\Filament\Resources\CampaignEnquiries\Pages\CreateCampaignEnquiry;
use App\Filament\Resources\CampaignEnquiries\Pages\EditCampaignEnquiry;
use App\Filament\Resources\CampaignEnquiries\Pages\ListCampaignEnquiries;
use App\Filament\Resources\CampaignEnquiries\Schemas\CampaignEnquiryForm;
use App\Filament\Resources\CampaignEnquiries\Tables\CampaignEnquiriesTable;
use App\Models\CampaignEnquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CampaignEnquiryResource extends Resource
{
    protected static ?string $model = CampaignEnquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CampaignEnquiry';
    protected static string|\UnitEnum|null $navigationGroup = 'Campaign';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Enquiry';
    public static function form(Schema $schema): Schema
    {
        return CampaignEnquiryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CampaignEnquiriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCampaignEnquiries::route('/'),
            'create' => CreateCampaignEnquiry::route('/create'),
            'edit' => EditCampaignEnquiry::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
