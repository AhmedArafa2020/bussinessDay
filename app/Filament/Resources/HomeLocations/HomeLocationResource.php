<?php

namespace App\Filament\Resources\HomeLocations;

use App\Filament\Resources\HomeLocations\Pages\CreateHomeLocation;
use App\Filament\Resources\HomeLocations\Pages\EditHomeLocation;
use App\Filament\Resources\HomeLocations\Pages\ListHomeLocations;
use App\Filament\Resources\HomeLocations\Schemas\HomeLocationForm;
use App\Filament\Resources\HomeLocations\Tables\HomeLocationsTable;
use App\Models\HomeLocation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeLocationResource extends Resource
{
    protected static ?string $model = HomeLocation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeLocation';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Location';

    public static function form(Schema $schema): Schema
    {
        return HomeLocationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeLocationsTable::configure($table);
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
            'index' => ListHomeLocations::route('/'),
            'create' => CreateHomeLocation::route('/create'),
            'edit' => EditHomeLocation::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
