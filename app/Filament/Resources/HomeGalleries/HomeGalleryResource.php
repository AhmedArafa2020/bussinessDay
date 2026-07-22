<?php

namespace App\Filament\Resources\HomeGalleries;

use App\Filament\Resources\HomeGalleries\Pages\CreateHomeGallery;
use App\Filament\Resources\HomeGalleries\Pages\EditHomeGallery;
use App\Filament\Resources\HomeGalleries\Pages\ListHomeGalleries;
use App\Filament\Resources\HomeGalleries\Schemas\HomeGalleryForm;
use App\Filament\Resources\HomeGalleries\Tables\HomeGalleriesTable;
use App\Models\HomeGallery;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeGalleryResource extends Resource
{
    protected static ?string $model = HomeGallery::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeGallery';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 10;
    protected static ?string $navigationLabel = 'Gallery';

    public static function form(Schema $schema): Schema
    {
        return HomeGalleryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeGalleriesTable::configure($table);
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
            'index' => ListHomeGalleries::route('/'),
            'create' => CreateHomeGallery::route('/create'),
            'edit' => EditHomeGallery::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
