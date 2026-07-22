<?php

namespace App\Filament\Resources\HomeEnquiries;

use App\Filament\Resources\HomeEnquiries\Pages\CreateHomeEnquiry;
use App\Filament\Resources\HomeEnquiries\Pages\EditHomeEnquiry;
use App\Filament\Resources\HomeEnquiries\Pages\ListHomeEnquiries;
use App\Filament\Resources\HomeEnquiries\Schemas\HomeEnquiryForm;
use App\Filament\Resources\HomeEnquiries\Tables\HomeEnquiriesTable;
use App\Models\HomeEnquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeEnquiryResource extends Resource
{
    protected static ?string $model = HomeEnquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeEnquiry';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 11;
    protected static ?string $navigationLabel = 'Enquiry';

    public static function form(Schema $schema): Schema
    {
        return HomeEnquiryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeEnquiriesTable::configure($table);
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
            'index' => ListHomeEnquiries::route('/'),
            'create' => CreateHomeEnquiry::route('/create'),
            'edit' => EditHomeEnquiry::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
