<?php

namespace App\Filament\Resources\ThankYouContents;

use App\Filament\Resources\ThankYouContents\Pages\CreateThankYouContent;
use App\Filament\Resources\ThankYouContents\Pages\EditThankYouContent;
use App\Filament\Resources\ThankYouContents\Pages\ListThankYouContents;
use App\Filament\Resources\ThankYouContents\Schemas\ThankYouContentForm;
use App\Filament\Resources\ThankYouContents\Tables\ThankYouContentsTable;
use App\Models\ThankYouContent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ThankYouContentResource extends Resource
{
    protected static ?string $model = ThankYouContent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'ThankYouContent';
    protected static string|\UnitEnum|null $navigationGroup = 'Pages';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Thank You Page';
    public static function form(Schema $schema): Schema
    {
        return ThankYouContentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ThankYouContentsTable::configure($table);
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
            'index' => ListThankYouContents::route('/'),
            'create' => CreateThankYouContent::route('/create'),
            'edit' => EditThankYouContent::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
