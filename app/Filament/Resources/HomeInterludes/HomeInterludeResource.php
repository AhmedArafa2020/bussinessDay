<?php

namespace App\Filament\Resources\HomeInterludes;

use App\Filament\Resources\HomeInterludes\Pages\CreateHomeInterlude;
use App\Filament\Resources\HomeInterludes\Pages\EditHomeInterlude;
use App\Filament\Resources\HomeInterludes\Pages\ListHomeInterludes;
use App\Filament\Resources\HomeInterludes\Schemas\HomeInterludeForm;
use App\Filament\Resources\HomeInterludes\Tables\HomeInterludesTable;
use App\Models\HomeInterlude;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeInterludeResource extends Resource
{
    protected static ?string $model = HomeInterlude::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeInterlude';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Interlude';
    public static function form(Schema $schema): Schema
    {
        return HomeInterludeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeInterludesTable::configure($table);
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
            'index' => ListHomeInterludes::route('/'),
            'create' => CreateHomeInterlude::route('/create'),
            'edit' => EditHomeInterlude::route('/{record}/edit'),
        ];
    }
    //امنع إنشاء أكثر من Interlude
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
