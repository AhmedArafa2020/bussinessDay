<?php

namespace App\Filament\Resources\CampaignTrusts;

use App\Filament\Resources\CampaignTrusts\Pages\CreateCampaignTrust;
use App\Filament\Resources\CampaignTrusts\Pages\EditCampaignTrust;
use App\Filament\Resources\CampaignTrusts\Pages\ListCampaignTrusts;
use App\Filament\Resources\CampaignTrusts\Schemas\CampaignTrustForm;
use App\Filament\Resources\CampaignTrusts\Tables\CampaignTrustsTable;
use App\Models\CampaignTrust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CampaignTrustResource extends Resource
{
    protected static ?string $model = CampaignTrust::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CampaignTrust';
    protected static string|\UnitEnum|null $navigationGroup = 'Campaign';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Trust';
    public static function form(Schema $schema): Schema
    {
        return CampaignTrustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CampaignTrustsTable::configure($table);
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
            'index' => ListCampaignTrusts::route('/'),
            'create' => CreateCampaignTrust::route('/create'),
            'edit' => EditCampaignTrust::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
