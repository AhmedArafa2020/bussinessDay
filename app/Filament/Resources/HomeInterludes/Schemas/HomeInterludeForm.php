<?php

namespace App\Filament\Resources\HomeInterludes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeInterludeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Interlude Content')
                    ->description(
                        'The large brand statement displayed between homepage sections.'
                    )
                    ->schema([
                        Textarea::make('quote')
                            ->label('Quote')
                            ->required()
                            ->rows(6)
                            ->maxLength(2500)
                            ->placeholder(
                                'A residence should not merely be delivered. It should be looked after.'
                            )
                            ->columnSpanFull(),

                        TextInput::make('highlighted_text')
                            ->label('Highlighted Text')
                            ->maxLength(255)
                            ->placeholder('looked after.')
                            ->helperText(
                                'This part can be displayed using the highlighted style.'
                            )
                            ->columnSpanFull(),

                        TextInput::make('citation')
                            ->label('Citation')
                            ->maxLength(255)
                            ->placeholder(
                                'Business Bay Developments'
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
                            ->directory('home/interlude')
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label('Image Alt Text')
                            ->maxLength(255)
                            ->placeholder(
                                'Luxury residential architecture'
                            )
                            ->helperText(
                                'Describe the image for accessibility.'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Interlude content.'
                            ),
                    ]),
            ]);
    }
}
