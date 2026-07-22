<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostStatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make(
                'Total Articles',
                Post::query()->count()
            )
                ->description('All journal articles')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make(
                'Published',
                Post::query()
                    ->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now())
                    ->count()
            )
                ->description('Visible on the website')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make(
                'Drafts',
                Post::query()
                    ->where('is_published', false)
                    ->count()
            )
                ->description('Awaiting publication')
                ->descriptionIcon('heroicon-m-pencil-square')
                ->color('warning'),

            Stat::make(
                'Scheduled',
                Post::query()
                    ->where('is_published', true)
                    ->where('published_at', '>', now())
                    ->count()
            )
                ->description('Publishing in the future')
                ->descriptionIcon('heroicon-m-clock')
                ->color('info'),
        ];
    }
}
