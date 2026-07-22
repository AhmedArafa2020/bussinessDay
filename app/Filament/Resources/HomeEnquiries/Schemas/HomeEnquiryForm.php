<?php

namespace App\Filament\Resources\HomeEnquiries\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeEnquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Enquiry Introduction')
                    ->description(
                        'The heading and introduction displayed beside the homepage enquiry form.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('Private enquiries')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Main Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Begin a private')
                            ->columnSpanFull(),

                        TextInput::make('highlighted_title')
                            ->label('Highlighted Title')
                            ->maxLength(255)
                            ->placeholder('conversation.')
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

                Section::make('Form Content')
                    ->description(
                        'Text displayed inside and below the enquiry form.'
                    )
                    ->schema([
                        TextInput::make('form_title')
                            ->label('Form Title')
                            ->maxLength(255)
                            ->placeholder('Request the private brief')
                            ->columnSpanFull(),

                        TextInput::make('submit_button_text')
                            ->label('Submit Button Text')
                            ->maxLength(255)
                            ->placeholder('Send enquiry')
                            ->columnSpanFull(),

                        Textarea::make('privacy_text')
                            ->label('Privacy Text')
                            ->rows(4)
                            ->maxLength(1500)
                            ->placeholder(
                                'Your details will only be used to respond to your enquiry.'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Enquiry content.'
                            ),
                    ]),
            ]);
    }
}
