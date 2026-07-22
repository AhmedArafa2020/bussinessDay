<?php

namespace App\Filament\Resources\CampaignHeroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CampaignHeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Content')
                    ->description(
                        'The main heading and introduction displayed at the top of the campaign page.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The founding release')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Main Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Your place at')
                            ->columnSpanFull(),

                        TextInput::make('highlighted_title')
                            ->label('Highlighted Title')
                            ->maxLength(255)
                            ->placeholder('Meridian One.')
                            ->helperText(
                                'Displayed using the highlighted italic style.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->maxLength(2500)
                            ->columnSpanFull(),

                        TextInput::make('availability_text')
                            ->label('Availability Text')
                            ->maxLength(255)
                            ->placeholder(
                                'A limited number of residences are now available.'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Background Image')
                    ->schema([
                        FileUpload::make('background_image')
                            ->label('Background Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('campaign/hero')
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label('Image Alt Text')
                            ->maxLength(255)
                            ->placeholder(
                                'Meridian One tower overlooking Cairo'
                            )
                            ->helperText(
                                'Describe the background image for accessibility.'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Primary Button')
                    ->schema([
                        TextInput::make('primary_button_text')
                            ->label('Button Text')
                            ->maxLength(255)
                            ->placeholder('Request the private brief'),

                        TextInput::make('primary_button_url')
                            ->label('Button URL')
                            ->maxLength(255)
                            ->placeholder('#enquire'),
                    ])
                    ->columns(2),

                Section::make('Secondary Button')
                    ->schema([
                        TextInput::make('secondary_button_text')
                            ->label('Button Text')
                            ->maxLength(255)
                            ->placeholder('Explore Meridian One'),

                        TextInput::make('secondary_button_url')
                            ->label('Button URL')
                            ->maxLength(255)
                            ->placeholder(
                                route('home')
                            ),
                    ])
                    ->columns(2),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Campaign Hero content.'
                            ),
                    ]),
            ]);
    }
}
