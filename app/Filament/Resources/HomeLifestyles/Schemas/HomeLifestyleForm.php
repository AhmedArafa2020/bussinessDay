<?php

namespace App\Filament\Resources\HomeLifestyles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeLifestyleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Lifestyle Introduction')
                    ->description(
                        'The heading and introduction displayed in the homepage Lifestyle section.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The lifestyle')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'Everything downstairs. Nothing ordinary.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('lead_text')
                            ->label('Lead Text')
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),

                Section::make('Lifestyle Image')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('home/lifestyle')
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label('Image Alt Text')
                            ->maxLength(255)
                            ->placeholder(
                                'Luxury residents lounge overlooking the city'
                            )
                            ->helperText(
                                'Describe the image for accessibility.'
                            )
                            ->columnSpanFull(),

                        TextInput::make('image_caption')
                            ->label('Image Caption')
                            ->maxLength(255)
                            ->placeholder(
                                'Private spaces designed around residents'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Lifestyle Item 1')
                    ->schema([
                        TextInput::make('item_one_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder('The River Terrace')
                            ->columnSpanFull(),

                        Textarea::make('item_one_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_one_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('Level 06')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Lifestyle Item 2')
                    ->schema([
                        TextInput::make('item_two_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder('The Meridian Club')
                            ->columnSpanFull(),

                        Textarea::make('item_two_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_two_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('Residents')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Lifestyle Item 3')
                    ->schema([
                        TextInput::make('item_three_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder('Spa & Thermal Suite')
                            ->columnSpanFull(),

                        Textarea::make('item_three_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_three_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('Daily')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Lifestyle content.'
                            ),
                    ]),
            ]);
    }
}
