<?php

namespace App\Filament\Resources\ThankYouContents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ThankYouContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Thank You Content')
                    ->description(
                        'The message displayed after a visitor successfully submits an enquiry.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('Thank you')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Main Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Your private brief is')
                            ->columnSpanFull(),

                        TextInput::make('highlighted_title')
                            ->label('Highlighted Title')
                            ->maxLength(255)
                            ->placeholder('on its way.')
                            ->helperText(
                                'Displayed using the highlighted italic style.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->maxLength(2500)
                            ->columnSpanFull(),
                    ]),

                Section::make('Background Image')
                    ->schema([
                        FileUpload::make('background_image')
                            ->label('Background Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('thank-you')
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
                            ->placeholder('Return to Meridian One'),

                        TextInput::make('primary_button_url')
                            ->label('Button URL')
                            ->maxLength(255)
                            ->placeholder('/'),
                    ])
                    ->columns(2),

                Section::make('Secondary Button')
                    ->schema([
                        TextInput::make('secondary_button_text')
                            ->label('Button Text')
                            ->maxLength(255)
                            ->placeholder('Read the journal'),

                        TextInput::make('secondary_button_url')
                            ->label('Button URL')
                            ->maxLength(255)
                            ->placeholder('/journal'),
                    ])
                    ->columns(2),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Thank You page content.'
                            ),
                    ]),
            ]);
    }
}
