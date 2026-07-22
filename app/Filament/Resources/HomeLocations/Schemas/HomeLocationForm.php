<?php

namespace App\Filament\Resources\HomeLocations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeLocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Location Introduction')
                    ->description(
                        'The heading and description displayed in the homepage Location section.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The location')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Main Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('At the centre of')
                            ->columnSpanFull(),

                        TextInput::make('highlighted_title')
                            ->label('Highlighted Title')
                            ->maxLength(255)
                            ->placeholder('what comes next.')
                            ->helperText(
                                'Displayed using the highlighted italic style.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),

                Section::make('Location Image')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('home/location')
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label('Image Alt Text')
                            ->maxLength(255)
                            ->placeholder(
                                'Modern towers in Cairo business district'
                            )
                            ->helperText(
                                'Describe the image for accessibility.'
                            )
                            ->columnSpanFull(),

                        TextInput::make('image_caption')
                            ->label('Image Caption')
                            ->maxLength(255)
                            ->placeholder(
                                'A new centre of business and living'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Nearby Location 1')
                    ->schema([
                        TextInput::make('location_one_name')
                            ->label('Location Name')
                            ->maxLength(255)
                            ->placeholder('New Administrative Capital'),

                        TextInput::make('location_one_time')
                            ->label('Travel Time')
                            ->maxLength(100)
                            ->placeholder('5 minutes'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Nearby Location 2')
                    ->schema([
                        TextInput::make('location_two_name')
                            ->label('Location Name')
                            ->maxLength(255)
                            ->placeholder('Cairo International Airport'),

                        TextInput::make('location_two_time')
                            ->label('Travel Time')
                            ->maxLength(100)
                            ->placeholder('35 minutes'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Nearby Location 3')
                    ->schema([
                        TextInput::make('location_three_name')
                            ->label('Location Name')
                            ->maxLength(255)
                            ->placeholder('New Cairo'),

                        TextInput::make('location_three_time')
                            ->label('Travel Time')
                            ->maxLength(100)
                            ->placeholder('25 minutes'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Nearby Location 4')
                    ->schema([
                        TextInput::make('location_four_name')
                            ->label('Location Name')
                            ->maxLength(255)
                            ->placeholder('Downtown Cairo'),

                        TextInput::make('location_four_time')
                            ->label('Travel Time')
                            ->maxLength(100)
                            ->placeholder('45 minutes'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Location content.'
                            ),
                    ]),
            ]);
    }
}
