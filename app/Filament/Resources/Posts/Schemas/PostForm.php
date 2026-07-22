<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Article Details')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->live(debounce: 500)
                            ->afterStateUpdated(
                                fn (Set $set, ?string $state): mixed =>
                                $set('slug', Str::slug($state ?? ''))
                            )
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText(
                                'Used in the article URL.'
                            )
                            ->columnSpanFull(),

                        Select::make('category')
                            ->label('Category')
                            ->options([
                                'Living' => 'Living',
                                'Market' => 'Market',
                                'Design' => 'Design',
                                'Neighbourhood' => 'Neighbourhood',
                                'Investment' => 'Investment',
                                'Interiors' => 'Interiors',
                            ])
                            ->searchable()
                            ->required(),

                        TextInput::make('author')
                            ->label('Author')
                            ->default('BBD research desk')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('excerpt')
                            ->label('Excerpt')
                            ->required()
                            ->rows(4)
                            ->maxLength(600)
                            ->columnSpanFull(),

                        FileUpload::make('featured_image')
                            ->label('Featured Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('posts')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Article Content')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Content')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory(
                                'posts/attachments'
                            )
                            ->fileAttachmentsVisibility('public')
                            ->columnSpanFull(),
                    ]),

                Section::make('Publishing')
                    ->schema([
                        TextInput::make('reading_time')
                            ->label('Reading Time')
                            ->numeric()
                            ->integer()
                            ->minValue(1)
                            ->maxValue(60)
                            ->default(5)
                            ->suffix('minutes')
                            ->required(),

                        DateTimePicker::make('published_at')
                            ->label('Publish Date')
                            ->default(now())
                            ->seconds(false),

                        Toggle::make('is_featured')
                            ->label('Featured Article')
                            ->helperText(
                                'Show this article as the main Journal article.'
                            ),

                        Toggle::make('is_published')
                            ->label('Published')
                            ->helperText(
                                'Only published articles appear on the website.'
                            ),
                    ])
                    ->columns(2),

                Section::make('Search Engine Optimization')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255)
                            ->helperText(
                                'Leave empty to use the article title.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText(
                                'Leave empty to use the article excerpt.'
                            )
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }
}
