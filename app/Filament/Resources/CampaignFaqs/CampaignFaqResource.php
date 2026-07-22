<?php

namespace App\Filament\Resources\CampaignFaqs;

use App\Filament\Resources\CampaignFaqs\Pages\CreateCampaignFaq;
use App\Filament\Resources\CampaignFaqs\Pages\EditCampaignFaq;
use App\Filament\Resources\CampaignFaqs\Pages\ListCampaignFaqs;
use App\Filament\Resources\CampaignFaqs\Schemas\CampaignFaqForm;
use App\Filament\Resources\CampaignFaqs\Tables\CampaignFaqsTable;
use App\Models\CampaignFaq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CampaignFaqResource extends Resource
{
    protected static ?string $model = CampaignFaq::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CampaignFaq';
    protected static string|\UnitEnum|null $navigationGroup = 'Campaign';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'FAQ';
    public static function form(Schema $schema): Schema
    {
        return CampaignFaqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CampaignFaqsTable::configure($table);
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
            'index' => ListCampaignFaqs::route('/'),
            'create' => CreateCampaignFaq::route('/create'),
            'edit' => EditCampaignFaq::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
