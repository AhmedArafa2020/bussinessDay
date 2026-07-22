<?php

namespace App\Filament\Resources\CampaignFaqs\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CampaignFaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(55),

                TextColumn::make('questions')
                    ->label('Questions')
                    ->formatStateUsing(
                        fn ($state): string =>
                            count(is_array($state) ? $state : []) . ' questions'
                    ),

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
                    ->label('Edit FAQ'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
