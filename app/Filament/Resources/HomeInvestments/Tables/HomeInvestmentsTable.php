<?php

namespace App\Filament\Resources\HomeInvestments\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeInvestmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(55),

                TextColumn::make('stat_one_value')
                    ->label('First Stat')
                    ->placeholder('Not added'),

                TextColumn::make('button_text')
                    ->label('Button')
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
                    ->label('Edit Investment'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
