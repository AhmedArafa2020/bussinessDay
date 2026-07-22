<?php

namespace App\Filament\Resources\HomeStories;

use App\Filament\Resources\HomeStories\Pages\CreateHomeStory;
use App\Filament\Resources\HomeStories\Pages\EditHomeStory;
use App\Filament\Resources\HomeStories\Pages\ListHomeStories;
use App\Filament\Resources\HomeStories\Schemas\HomeStoryForm;
use App\Filament\Resources\HomeStories\Tables\HomeStoriesTable;
use App\Models\HomeStory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeStoryResource extends Resource
{
    protected static ?string $model = HomeStory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HomeStory';
    protected static string|\UnitEnum|null $navigationGroup = 'Homepage';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Story';

    public static function form(Schema $schema): Schema
    {
        return HomeStoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeStoriesTable::configure($table);
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
            'index' => ListHomeStories::route('/'),
            'create' => CreateHomeStory::route('/create'),
            'edit' => EditHomeStory::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return ! static::getModel()::query()->exists();
    }
}
