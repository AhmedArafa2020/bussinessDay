<?php

namespace App\Filament\Resources\HomeConcepts;

use App\Filament\Resources\HomeConcepts\Pages\CreateHomeConcept;
use App\Filament\Resources\HomeConcepts\Pages\EditHomeConcept;
use App\Filament\Resources\HomeConcepts\Pages\ListHomeConcepts;
use App\Filament\Resources\HomeConcepts\Schemas\HomeConceptForm;
use App\Filament\Resources\HomeConcepts\Tables\HomeConceptsTable;
use App\Models\HomeConcept;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeConceptResource extends Resource
{
    protected static ?string $model = HomeConcept::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeConcept';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Concept';

    public static function form(Schema $schema): Schema
    {
        return HomeConceptForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeConceptsTable::configure($table);
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
            'index' => ListHomeConcepts::route('/'),
            'create' => CreateHomeConcept::route('/create'),
            'edit' => EditHomeConcept::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
