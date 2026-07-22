<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LeadStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make(
                'Total Leads',
                Lead::query()->count()
            )
                ->description('All received enquiries')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make(
                'New Leads',
                Lead::query()
                    ->where('status', 'new')
                    ->count()
            )
                ->description('Awaiting first response')
                ->descriptionIcon('heroicon-m-bell-alert')
                ->color('warning'),

            Stat::make(
                'Contacted',
                Lead::query()
                    ->where('status', 'contacted')
                    ->count()
            )
                ->description('Follow-up started')
                ->descriptionIcon('heroicon-m-phone')
                ->color('info'),

            Stat::make(
                'Qualified',
                Lead::query()
                    ->where('status', 'qualified')
                    ->count()
            )
                ->description('Potential opportunities')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),

            Stat::make(
                'Homepage Leads',
                Lead::query()
                    ->where('source', 'homepage')
                    ->count()
            )
                ->description('Enquiries from the main website')
                ->descriptionIcon('heroicon-m-home')
                ->color('info'),

            Stat::make(
                'Campaign Leads',
                Lead::query()
                    ->where('source', 'campaign-short')
                    ->count()
            )
                ->description('Enquiries from the founding release')
                ->descriptionIcon('heroicon-m-megaphone')
                ->color('success'),
        ];
    }
}
