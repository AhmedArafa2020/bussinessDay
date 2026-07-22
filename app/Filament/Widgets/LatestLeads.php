<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Leads\LeadResource;
use App\Models\Lead;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestLeads extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Latest Leads')
            ->description('The five most recently received enquiries.')
            ->query(
                Lead::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->url(
                        fn (?string $state): ?string =>
                        filled($state)
                            ? 'tel:' . preg_replace(
                                '/[^0-9+]/',
                                '',
                                $state
                            )
                            : null
                    )
                    ->color('primary'),

                TextColumn::make('interest')
                    ->label('Interest')
                    ->formatStateUsing(
                        fn (?string $state): string => match ($state) {
                            'river-suites' =>
                            'River Suites',

                            'corniche-residences' =>
                            'Corniche Residences',

                            'sky-residences' =>
                            'Sky Residences',

                            'crescent-penthouses' =>
                            'Crescent Penthouses',

                            'other' =>
                            'Other',

                            default =>
                            $state
                                ? ucfirst($state)
                                : '—',
                        }
                    ),
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
                    ),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(
                        fn (string $state): string => match ($state) {
                            'new' => 'New',
                            'contacted' => 'Contacted',
                            'qualified' => 'Qualified',
                            'closed' => 'Closed',
                            default => ucfirst($state),
                        }
                    )
                    ->color(
                        fn (string $state): string => match ($state) {
                            'new' => 'info',
                            'contacted' => 'warning',
                            'qualified' => 'success',
                            'closed' => 'gray',
                            default => 'gray',
                        }
                    ),

                TextColumn::make('created_at')
                    ->label('Received At')
                    ->dateTime('d M Y, h:i A'),
            ])
            ->recordActions([
                Action::make('open')
                    ->label('Open')
                    ->icon('heroicon-m-pencil-square')
                    ->url(
                        fn (Lead $record): string => LeadResource::getUrl(
                            'edit',
                            ['record' => $record]
                        )
                    ),
            ])
            ->paginated(false);
    }
}
