<?php

namespace App\Filament\Resources\CampaignBenefits\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CampaignBenefitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(55),

                TextColumn::make('item_one_title')
                    ->label('First Benefit')
                    ->placeholder('Not added')
                    ->limit(40),

                TextColumn::make('item_one_label')
                    ->label('First Label')
                    ->placeholder('Not added')
                    ->badge(),

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
                    ->label('Edit Benefits'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
