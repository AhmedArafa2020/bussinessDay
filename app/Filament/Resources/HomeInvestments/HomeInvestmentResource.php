<?php

namespace App\Filament\Resources\HomeInvestments;

use App\Filament\Resources\HomeInvestments\Pages\CreateHomeInvestment;
use App\Filament\Resources\HomeInvestments\Pages\EditHomeInvestment;
use App\Filament\Resources\HomeInvestments\Pages\ListHomeInvestments;
use App\Filament\Resources\HomeInvestments\Schemas\HomeInvestmentForm;
use App\Filament\Resources\HomeInvestments\Tables\HomeInvestmentsTable;
use App\Models\HomeInvestment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeInvestmentResource extends Resource
{
    protected static ?string $model = HomeInvestment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeInvestment';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationLabel = 'Investment';
    public static function form(Schema $schema): Schema
    {
        return HomeInvestmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeInvestmentsTable::configure($table);
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
            'index' => ListHomeInvestments::route('/'),
            'create' => CreateHomeInvestment::route('/create'),
            'edit' => EditHomeInvestment::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
