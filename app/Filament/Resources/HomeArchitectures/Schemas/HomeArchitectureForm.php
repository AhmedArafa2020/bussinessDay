<?php

namespace App\Filament\Resources\HomeArchitectures\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeArchitectureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Architecture Content')
                    ->description(
                        'The title and written content displayed in the homepage Architecture section.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The architecture')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'Designed to hold its presence.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('lead_text')
                            ->label('Lead Text')
                            ->rows(5)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        Textarea::make('interiors_text')
                            ->label('Interiors Text')
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),

                Section::make('Architecture Image')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('home/architecture')
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label('Image Alt Text')
                            ->maxLength(255)
                            ->placeholder(
                                'Meridian One residential tower exterior'
                            )
                            ->helperText(
                                'Describe the image for accessibility.'
                            )
                            ->columnSpanFull(),

                        TextInput::make('image_caption')
                            ->label('Image Caption')
                            ->maxLength(255)
                            ->placeholder(
                                'A composed silhouette on the Cairo skyline'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Gallery Button')
                    ->schema([
                        TextInput::make('button_text')
                            ->label('Button Text')
                            ->maxLength(255)
                            ->placeholder('View the gallery'),

                        TextInput::make('button_url')
                            ->label('Button URL')
                            ->maxLength(255)
                            ->placeholder('#gallery'),
                    ])
                    ->columns(2),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Architecture content.'
                            ),
                    ]),
            ]);
    }
}
