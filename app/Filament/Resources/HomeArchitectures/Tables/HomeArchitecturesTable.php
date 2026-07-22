<?php

namespace App\Filament\Resources\HomeArchitectures\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeArchitecturesTable
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
                        asset('frontend/assets/crescent-tower.jpg')
                    ),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(55),

                TextColumn::make('eyebrow')
                    ->label('Eyebrow')
                    ->placeholder('Not added')
                    ->limit(30),

                TextColumn::make('button_text')
                    ->label('Button')
                    ->placeholder('Not added')
                    ->limit(30),

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
                    ->label('Edit Architecture'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
