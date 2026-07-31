<?php

namespace App\Filament\Resources\AboutPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AboutPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page Content')
                    ->description('Main content displayed on the About page.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Page title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (?string $state, callable $set): void {
                                if (filled($state)) {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('The page URL, for example: about.'),

                        TextInput::make('hero_title')
                            ->label('Hero title')
                            ->maxLength(255),

                        Textarea::make('hero_description')
                            ->label('Hero description')
                            ->rows(4)
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->label('Main image')
                            ->image()
                            ->imageEditor()
                            ->directory('about')
                            ->disk('public'),

                        RichEditor::make('content')
                            ->label('Page content')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('SEO Settings')
                    ->description('Search engine information for the About page.')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta title')
                            ->maxLength(60)
                            ->helperText('Recommended maximum: 60 characters.'),

                        Select::make('meta_robots')
                            ->label('Search engine visibility')
                            ->options([
                                'index, follow' => 'Index and follow links',
                                'index, nofollow' => 'Index but do not follow links',
                                'noindex, follow' => 'Do not index, but follow links',
                                'noindex, nofollow' => 'Do not index or follow links',
                            ])
                            ->default('index, follow')
                            ->required(),

                        Textarea::make('meta_description')
                            ->label('Meta description')
                            ->rows(4)
                            ->maxLength(160)
                            ->helperText('Recommended maximum: 160 characters.')
                            ->columnSpanFull(),

                        TagsInput::make('meta_keywords')
                            ->label('Meta keywords')
                            ->helperText('Press Enter after every keyword.')
                            ->columnSpanFull(),

                        TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://example.com/about')
                            ->helperText('Leave empty to use the normal About page URL.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Social Sharing')
                    ->description('Content shown when the page is shared on social media.')
                    ->schema([
                        TextInput::make('og_title')
                            ->label('Social title')
                            ->maxLength(95),

                        Textarea::make('og_description')
                            ->label('Social description')
                            ->rows(4)
                            ->columnSpanFull(),

                        FileUpload::make('og_image')
                            ->label('Social sharing image')
                            ->image()
                            ->imageEditor()
                            ->directory('seo/about')
                            ->disk('public')
                            ->helperText('Recommended size: 1200 × 630 pixels.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Publishing')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Page active')
                            ->default(true)
                            ->helperText('Disable this to hide the About page.'),
                    ]),
            ]);
    }
}
