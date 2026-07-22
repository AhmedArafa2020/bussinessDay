<?php

namespace App\Filament\Resources\HomeLocations\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeLocationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->label('Main Title')
                    ->searchable()
                    ->limit(45),

                TextColumn::make('highlighted_title')
                    ->label('Highlighted Title')
                    ->placeholder('Not added')
                    ->limit(35),

                TextColumn::make('location_one_name')
                    ->label('First Location')
                    ->placeholder('Not added')
                    ->limit(35),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit Location'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
