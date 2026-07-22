<?php

namespace App\Filament\Resources\HomeInterludes\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeInterludesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('background_image')
                    ->label('Background')
                    ->disk('public')
                    ->square(),

                TextColumn::make('quote')
                    ->label('Quote')
                    ->searchable()
                    ->limit(65),

                TextColumn::make('citation')
                    ->label('Citation')
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
                    ->label('Edit Interlude'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
