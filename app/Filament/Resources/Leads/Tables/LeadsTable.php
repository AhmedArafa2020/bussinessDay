<?php

namespace App\Filament\Resources\Leads\Tables;

use App\Models\Lead;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->url(
                        fn (?string $state): ?string =>
                        filled($state)
                            ? 'tel:' . preg_replace('/[^0-9+]/', '', $state)
                            : null
                    )
                    ->color('primary'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->url(
                        fn (?string $state): ?string =>
                        filled($state)
                            ? 'mailto:' . $state
                            : null
                    )
                    ->color('primary'),

                TextColumn::make('interest')
                    ->label('Interest'),
                TextColumn::make('source')
                    ->label('Source')
                    ->badge()
                    ->formatStateUsing(
                        fn (?string $state): string => match ($state) {
                            'homepage' => 'Homepage',
                            'campaign-short' => 'Campaign',
                            default => $state
                                ? ucfirst(str_replace('-', ' ', $state))
                                : 'Unknown',
                        }
                    )
                    ->color(
                        fn (?string $state): string => match ($state) {
                            'homepage' => 'info',
                            'campaign-short' => 'success',
                            default => 'gray',
                        }
                    )
                    ->sortable(),

                TextColumn::make('contact_method')
                    ->label('Preferred Contact'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'qualified' => 'Qualified',
                        'closed' => 'Closed',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'info',
                        'contacted' => 'warning',
                        'qualified' => 'success',
                        'closed' => 'gray',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Received At')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', direction: 'desc')
            ->searchPlaceholder('Search by name, phone or email')
            ->filters([
                SelectFilter::make('status')
                    ->label('Lead Status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'qualified' => 'Qualified',
                        'closed' => 'Closed',
                    ]),
                SelectFilter::make('source')
                    ->label('Lead Source')
                    ->options([
                        'homepage' => 'Homepage',
                        'campaign-short' => 'Campaign',
                    ]),
            ])
            ->recordActions([
                Action::make('updateStatus')
                    ->label('Update Status')
                    ->icon('heroicon-m-arrow-path')
                    ->color('warning')
                    ->fillForm(
                        fn (Lead $record): array => [
                            'status' => $record->status,
                        ]
                    )
                    ->schema([
                        Select::make('status')
                            ->label('Lead Status')
                            ->options([
                                'new' => 'New',
                                'contacted' => 'Contacted',
                                'qualified' => 'Qualified',
                                'closed' => 'Closed',
                            ])
                            ->required()
                            ->selectablePlaceholder(false),
                    ])
                    ->action(
                        function (array $data, Lead $record): void {
                            $record->update([
                                'status' => $data['status'],
                            ]);
                        }
                    )
                    ->modalHeading('Update Lead Status')
                    ->modalSubmitActionLabel('Save Status'),

                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
