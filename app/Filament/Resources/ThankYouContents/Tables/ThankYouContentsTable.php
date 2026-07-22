<?php

namespace App\Filament\Resources\ThankYouContents\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ThankYouContentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('background_image')
                    ->label('Background')
                    ->disk('public')
                    ->square()
                    ->defaultImageUrl(
                        asset('frontend/assets/crescent-tower.jpg')
                    ),

                TextColumn::make('title')
                    ->label('Main Title')
                    ->searchable()
                    ->limit(45),

                TextColumn::make('highlighted_title')
                    ->label('Highlighted Title')
                    ->placeholder('Not added')
                    ->limit(35),

                TextColumn::make('primary_button_text')
                    ->label('Primary Button')
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
                    ->label('Edit Thank You Page'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
