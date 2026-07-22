<?php

namespace App\Filament\Resources\HomeEnquiries\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeEnquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Main Title')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('highlighted_title')
                    ->label('Highlighted Title')
                    ->placeholder('Not added')
                    ->limit(35),

                TextColumn::make('form_title')
                    ->label('Form Title')
                    ->placeholder('Not added')
                    ->limit(40),

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
                    ->label('Edit Enquiry'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
