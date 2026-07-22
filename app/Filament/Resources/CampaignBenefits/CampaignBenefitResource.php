<?php

namespace App\Filament\Resources\CampaignBenefits;

use App\Filament\Resources\CampaignBenefits\Pages\CreateCampaignBenefit;
use App\Filament\Resources\CampaignBenefits\Pages\EditCampaignBenefit;
use App\Filament\Resources\CampaignBenefits\Pages\ListCampaignBenefits;
use App\Filament\Resources\CampaignBenefits\Schemas\CampaignBenefitForm;
use App\Filament\Resources\CampaignBenefits\Tables\CampaignBenefitsTable;
use App\Models\CampaignBenefit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CampaignBenefitResource extends Resource
{
    protected static ?string $model = CampaignBenefit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CampaignBenefit';
    protected static string|\UnitEnum|null $navigationGroup = 'Campaign';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Benefits';
    public static function form(Schema $schema): Schema
    {
        return CampaignBenefitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CampaignBenefitsTable::configure($table);
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
            'index' => ListCampaignBenefits::route('/'),
            'create' => CreateCampaignBenefit::route('/create'),
            'edit' => EditCampaignBenefit::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
