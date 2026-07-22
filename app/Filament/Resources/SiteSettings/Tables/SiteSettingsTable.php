<?php

namespace App\Filament\Resources\SiteSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SiteSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')
                    ->label('Site Name')
                    ->searchable(),

                TextColumn::make('project_name')
                    ->label('Project Name'),

                TextColumn::make('email')
                    ->label('Contact Email')
                    ->placeholder('Not added'),

                TextColumn::make('cairo_phone')
                    ->label('Cairo Phone')
                    ->placeholder('Not added'),

                TextColumn::make('dubai_phone')
                    ->label('Dubai Phone')
                    ->placeholder('Not added'),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit Settings'),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
