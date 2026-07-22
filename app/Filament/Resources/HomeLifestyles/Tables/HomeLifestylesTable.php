<?php

namespace App\Filament\Resources\HomeLifestyles\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeLifestylesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->square()
                    ->defaultImageUrl(
                        asset('frontend/assets/lobby-interior.jpg')
                    ),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(55),

                TextColumn::make('eyebrow')
                    ->label('Eyebrow')
                    ->placeholder('Not added')
                    ->limit(35),

                TextColumn::make('item_one_title')
                    ->label('First Item')
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
                    ->label('Edit Lifestyle'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
