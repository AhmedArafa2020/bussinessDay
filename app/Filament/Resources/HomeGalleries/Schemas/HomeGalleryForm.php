<?php

namespace App\Filament\Resources\HomeGalleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeGalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery Introduction')
                    ->description(
                        'The heading and introduction displayed above the homepage gallery.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The visual record')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'A closer look at Meridian One.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),

                Section::make('Gallery Images')
                    ->description(
                        'Add, remove, and drag images to change their display order.'
                    )
                    ->schema([
                        Repeater::make('images')
                            ->label('Images')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->required()
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->directory('home/gallery')
                                    ->visibility('public')
                                    ->maxSize(8192)
                                    ->columnSpanFull(),

                                TextInput::make('alt')
                                    ->label('Alt Text')
                                    ->maxLength(255)
                                    ->helperText(
                                        'Describe the image for accessibility.'
                                    )
                                    ->columnSpanFull(),

                                TextInput::make('caption')
                                    ->label('Caption')
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                Select::make('layout')
                                    ->label('Image Layout')
                                    ->options([
                                        'standard' => 'Standard',
                                        'wide' => 'Wide',
                                        'tall' => 'Tall',
                                    ])
                                    ->default('standard')
                                    ->required()
                                    ->native(false)
                                    ->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->defaultItems(1)
                            ->minItems(1)
                            ->addActionLabel('Add Gallery Image')
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->itemLabel(
                                fn (array $state): ?string =>
                                    $state['caption']
                                    ?? $state['alt']
                                    ?? 'Gallery Image'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Gallery content.'
                            ),
                    ]),
            ]);
    }
}
