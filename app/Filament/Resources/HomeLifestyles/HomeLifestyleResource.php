<?php

namespace App\Filament\Resources\HomeLifestyles;

use App\Filament\Resources\HomeLifestyles\Pages\CreateHomeLifestyle;
use App\Filament\Resources\HomeLifestyles\Pages\EditHomeLifestyle;
use App\Filament\Resources\HomeLifestyles\Pages\ListHomeLifestyles;
use App\Filament\Resources\HomeLifestyles\Schemas\HomeLifestyleForm;
use App\Filament\Resources\HomeLifestyles\Tables\HomeLifestylesTable;
use App\Models\HomeLifestyle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeLifestyleResource extends Resource
{
    protected static ?string $model = HomeLifestyle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeLifestyle';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'Lifestyle';
    public static function form(Schema $schema): Schema
    {
        return HomeLifestyleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeLifestylesTable::configure($table);
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
            'index' => ListHomeLifestyles::route('/'),
            'create' => CreateHomeLifestyle::route('/create'),
            'edit' => EditHomeLifestyle::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
