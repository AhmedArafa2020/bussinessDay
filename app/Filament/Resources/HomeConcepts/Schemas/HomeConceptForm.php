<?php

namespace App\Filament\Resources\HomeConcepts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeConceptForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Concept Introduction')
                    ->description(
                        'The title and introduction displayed at the beginning of the Concept section.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The concept')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Main Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'Not an address. A way of being'
                            )
                            ->columnSpanFull(),

                        TextInput::make('highlighted_title')
                            ->label('Highlighted Title')
                            ->maxLength(255)
                            ->placeholder('looked after.')
                            ->helperText(
                                'Displayed using the highlighted italic style.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->maxLength(2000)
                            ->placeholder(
                                'Meridian One is conceived as a private hotel that happens to be yours.'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Concept Item 1')
                    ->schema([
                        TextInput::make('item_one_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder(
                                'Arrival & concierge'
                            )
                            ->columnSpanFull(),

                        Textarea::make('item_one_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_one_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('Daily')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Concept Item 2')
                    ->schema([
                        TextInput::make('item_two_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder(
                                'Housekeeping & upkeep'
                            )
                            ->columnSpanFull(),

                        Textarea::make('item_two_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_two_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('Included')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Concept Item 3')
                    ->schema([
                        TextInput::make('item_three_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder(
                                'Owner absence program'
                            )
                            ->columnSpanFull(),

                        Textarea::make('item_three_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_three_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('On request')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Concept Item 4')
                    ->schema([
                        TextInput::make('item_four_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder(
                                'Table & club privileges'
                            )
                            ->columnSpanFull(),

                        Textarea::make('item_four_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_four_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('Members')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Concept content.'
                            ),
                    ]),
            ]);
    }
}
