<?php

namespace App\Filament\Resources\HomeResidences;

use App\Filament\Resources\HomeResidences\Pages\CreateHomeResidence;
use App\Filament\Resources\HomeResidences\Pages\EditHomeResidence;
use App\Filament\Resources\HomeResidences\Pages\ListHomeResidences;
use App\Filament\Resources\HomeResidences\Schemas\HomeResidenceForm;
use App\Filament\Resources\HomeResidences\Tables\HomeResidencesTable;
use App\Models\HomeResidence;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeResidenceResource extends Resource
{
    protected static ?string $model = HomeResidence::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeResidence';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationLabel = 'Residences';
    public static function form(Schema $schema): Schema
    {
        return HomeResidenceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeResidencesTable::configure($table);
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
            'index' => ListHomeResidences::route('/'),
            'create' => CreateHomeResidence::route('/create'),
            'edit' => EditHomeResidence::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
