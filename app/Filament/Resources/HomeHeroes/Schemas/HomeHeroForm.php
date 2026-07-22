<?php

namespace App\Filament\Resources\HomeHeroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeHeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Content')
                    ->description(
                        'The main heading and introduction displayed at the top of the homepage.'
                    )
                    ->schema([
                        TextInput::make('kicker')
                            ->label('Kicker')
                            ->maxLength(255)
                            ->placeholder(
                                'Business Bay Developments · Cairo'
                            )
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Main Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'A residence held to the standard of a'
                            )
                            ->columnSpanFull(),

                        TextInput::make('highlighted_title')
                            ->label('Highlighted Title')
                            ->maxLength(255)
                            ->placeholder('great hotel.')
                            ->helperText(
                                'Displayed using the italic highlighted style.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        FileUpload::make('background_image')
                            ->label('Background Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('home/hero')
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),
                    ]),

                Section::make('Buttons')
                    ->schema([
                        TextInput::make('primary_button_text')
                            ->label('Primary Button Text')
                            ->maxLength(100)
                            ->placeholder(
                                'Request the private brief'
                            ),

                        TextInput::make('primary_button_url')
                            ->label('Primary Button URL')
                            ->maxLength(255)
                            ->placeholder('#enquire')
                            ->helperText(
                                'You can use an anchor such as #enquire.'
                            ),

                        TextInput::make('secondary_button_text')
                            ->label('Secondary Button Text')
                            ->maxLength(100)
                            ->placeholder(
                                'Discover the project'
                            ),

                        TextInput::make('secondary_button_url')
                            ->label('Secondary Button URL')
                            ->maxLength(255)
                            ->placeholder('#story'),
                    ])
                    ->columns(2),

                Section::make('Hero Facts')
                    ->description(
                        'The four statistics displayed below the Hero buttons.'
                    )
                    ->schema([
                        TextInput::make('fact_one_value')
                            ->label('Fact 1 Value')
                            ->maxLength(50)
                            ->placeholder('212'),

                        TextInput::make('fact_one_label')
                            ->label('Fact 1 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Residences & suites'
                            ),

                        TextInput::make('fact_two_value')
                            ->label('Fact 2 Value')
                            ->maxLength(50)
                            ->placeholder('48'),

                        TextInput::make('fact_two_label')
                            ->label('Fact 2 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Floors above the Nile'
                            ),

                        TextInput::make('fact_three_value')
                            ->label('Fact 3 Value')
                            ->maxLength(50)
                            ->placeholder('2028'),

                        TextInput::make('fact_three_label')
                            ->label('Fact 3 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Handover, fully serviced'
                            ),

                        TextInput::make('fact_four_value')
                            ->label('Fact 4 Value')
                            ->maxLength(50)
                            ->placeholder('Q4'),

                        TextInput::make('fact_four_label')
                            ->label('Fact 4 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Founding release open'
                            ),
                    ])
                    ->columns(2),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Hero content.'
                            ),
                    ]),
            ]);
    }
}
