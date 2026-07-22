<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(55),

                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('author')
                    ->label('Author')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('reading_time')
                    ->label('Reading Time')
                    ->suffix(' min')
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                TextColumn::make('published_at')
                    ->label('Publish Date')
                    ->dateTime('d M Y, h:i A')
                    ->placeholder('Not scheduled')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('d M Y, h:i A')
                    ->sortable()
                    ->toggleable(
                        isToggledHiddenByDefault: true
                    ),
            ])
            ->defaultSort('created_at', 'desc')
            ->searchPlaceholder(
                'Search by title, category or author'
            )
            ->filters([
                SelectFilter::make('category')
                    ->label('Category')
                    ->options([
                        'Living' => 'Living',
                        'Market' => 'Market',
                        'Design' => 'Design',
                        'Neighbourhood' => 'Neighbourhood',
                        'Investment' => 'Investment',
                        'Interiors' => 'Interiors',
                    ]),

                TernaryFilter::make('is_published')
                    ->label('Published')
                    ->trueLabel('Published articles')
                    ->falseLabel('Draft articles')
                    ->placeholder('All articles'),

                TernaryFilter::make('is_featured')
                    ->label('Featured')
                    ->trueLabel('Featured articles')
                    ->falseLabel('Regular articles')
                    ->placeholder('All articles'),
            ])
            ->recordActions([
                Action::make('publish')
                    ->label('Publish')
                    ->icon('heroicon-m-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Publish Article')
                    ->modalDescription(
                        'This article will become visible on the website.'
                    )
                    ->visible(
                        fn (Post $record): bool => ! $record->is_published
                    )
                    ->action(function (Post $record): void {
                        $record->update([
                            'is_published' => true,
                            'published_at' => $record->published_at ?? now(),
                        ]);

                        Notification::make()
                            ->title('Article published')
                            ->success()
                            ->send();
                    }),

                Action::make('unpublish')
                    ->label('Unpublish')
                    ->icon('heroicon-m-x-circle')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading('Unpublish Article')
                    ->modalDescription(
                        'The article will be hidden from the website.'
                    )
                    ->visible(
                        fn (Post $record): bool => $record->is_published
                    )
                    ->action(function (Post $record): void {
                        $record->update([
                            'is_published' => false,
                        ]);

                        Notification::make()
                            ->title('Article moved to draft')
                            ->warning()
                            ->send();
                    }),
                Action::make('viewArticle')
                    ->label('View')
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->color('info')
                    ->url(
                        fn (Post $record): string =>
                        route('journal.show', $record)
                    )
                    ->openUrlInNewTab()
                    ->visible(
                        fn (Post $record): bool =>
                            $record->is_published
                            && filled($record->published_at)
                            && $record->published_at->lte(now())
                    ),

                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
