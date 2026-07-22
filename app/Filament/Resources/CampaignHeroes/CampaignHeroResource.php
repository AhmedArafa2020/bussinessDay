<?php

namespace App\Filament\Resources\CampaignHeroes;

use App\Filament\Resources\CampaignHeroes\Pages\CreateCampaignHero;
use App\Filament\Resources\CampaignHeroes\Pages\EditCampaignHero;
use App\Filament\Resources\CampaignHeroes\Pages\ListCampaignHeroes;
use App\Filament\Resources\CampaignHeroes\Schemas\CampaignHeroForm;
use App\Filament\Resources\CampaignHeroes\Tables\CampaignHeroesTable;
use App\Models\CampaignHero;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CampaignHeroResource extends Resource
{
    protected static ?string $model = CampaignHero::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CampaignHero';
    protected static string|\UnitEnum|null $navigationGroup = 'Campaign';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Hero';
    public static function form(Schema $schema): Schema
    {
        return CampaignHeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CampaignHeroesTable::configure($table);
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
            'index' => ListCampaignHeroes::route('/'),
            'create' => CreateCampaignHero::route('/create'),
            'edit' => EditCampaignHero::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
