<?php

namespace App\Filament\Resources\HomeArchitectures;

use App\Filament\Resources\HomeArchitectures\Pages\CreateHomeArchitecture;
use App\Filament\Resources\HomeArchitectures\Pages\EditHomeArchitecture;
use App\Filament\Resources\HomeArchitectures\Pages\ListHomeArchitectures;
use App\Filament\Resources\HomeArchitectures\Schemas\HomeArchitectureForm;
use App\Filament\Resources\HomeArchitectures\Tables\HomeArchitecturesTable;
use App\Models\HomeArchitecture;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeArchitectureResource extends Resource
{
    protected static ?string $model = HomeArchitecture::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeArchitecture';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'Architecture';

    public static function form(Schema $schema): Schema
    {
        return HomeArchitectureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeArchitecturesTable::configure($table);
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
            'index' => ListHomeArchitectures::route('/'),
            'create' => CreateHomeArchitecture::route('/create'),
            'edit' => EditHomeArchitecture::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
