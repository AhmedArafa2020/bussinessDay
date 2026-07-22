<?php

namespace App\Filament\Resources\CampaignTrusts\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CampaignTrustsTable
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
                        asset('frontend/assets/dubai-skyline.jpg')
                    ),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(55),

                TextColumn::make('stat_one_value')
                    ->label('First Stat')
                    ->placeholder('Not added'),

                TextColumn::make('stat_two_value')
                    ->label('Second Stat')
                    ->placeholder('Not added'),

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
                    ->label('Edit Trust'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
