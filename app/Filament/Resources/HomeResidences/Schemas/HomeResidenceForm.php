<?php

namespace App\Filament\Resources\HomeResidences\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeResidenceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Residences Introduction')
                    ->description(
                        'The heading and introduction displayed above the residences table.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The residences')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'Four collections. One standard.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('lead_text')
                            ->label('Lead Text')
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        Textarea::make('table_caption')
                            ->label('Table Caption')
                            ->rows(3)
                            ->maxLength(1000)
                            ->helperText(
                                'Displayed below or alongside the residences table.'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Collection 1')
                    ->schema([
                        TextInput::make('collection_one_name')
                            ->label('Collection Name')
                            ->maxLength(255)
                            ->placeholder('The River Collection'),

                        TextInput::make('collection_one_layout')
                            ->label('Layout')
                            ->maxLength(255)
                            ->placeholder('1–2 bedrooms'),

                        TextInput::make('collection_one_area')
                            ->label('Area')
                            ->maxLength(255)
                            ->placeholder('95–165 m²'),

                        TextInput::make('collection_one_outlook')
                            ->label('Outlook')
                            ->maxLength(255)
                            ->placeholder('Nile'),

                        TextInput::make('collection_one_availability')
                            ->label('Availability')
                            ->maxLength(255)
                            ->placeholder('Available'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Collection 2')
                    ->schema([
                        TextInput::make('collection_two_name')
                            ->label('Collection Name')
                            ->maxLength(255)
                            ->placeholder('The Skyline Collection'),

                        TextInput::make('collection_two_layout')
                            ->label('Layout')
                            ->maxLength(255)
                            ->placeholder('2–3 bedrooms'),

                        TextInput::make('collection_two_area')
                            ->label('Area')
                            ->maxLength(255)
                            ->placeholder('160–240 m²'),

                        TextInput::make('collection_two_outlook')
                            ->label('Outlook')
                            ->maxLength(255)
                            ->placeholder('City & river'),

                        TextInput::make('collection_two_availability')
                            ->label('Availability')
                            ->maxLength(255)
                            ->placeholder('Limited'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Collection 3')
                    ->schema([
                        TextInput::make('collection_three_name')
                            ->label('Collection Name')
                            ->maxLength(255)
                            ->placeholder('The Crescent Collection'),

                        TextInput::make('collection_three_layout')
                            ->label('Layout')
                            ->maxLength(255)
                            ->placeholder('3–4 bedrooms'),

                        TextInput::make('collection_three_area')
                            ->label('Area')
                            ->maxLength(255)
                            ->placeholder('245–390 m²'),

                        TextInput::make('collection_three_outlook')
                            ->label('Outlook')
                            ->maxLength(255)
                            ->placeholder('Panoramic Nile'),

                        TextInput::make('collection_three_availability')
                            ->label('Availability')
                            ->maxLength(255)
                            ->placeholder('By application'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Collection 4')
                    ->schema([
                        TextInput::make('collection_four_name')
                            ->label('Collection Name')
                            ->maxLength(255)
                            ->placeholder('The Crown Residence'),

                        TextInput::make('collection_four_layout')
                            ->label('Layout')
                            ->maxLength(255)
                            ->placeholder('Penthouse'),

                        TextInput::make('collection_four_area')
                            ->label('Area')
                            ->maxLength(255)
                            ->placeholder('620 m²'),

                        TextInput::make('collection_four_outlook')
                            ->label('Outlook')
                            ->maxLength(255)
                            ->placeholder('360° panorama'),

                        TextInput::make('collection_four_availability')
                            ->label('Availability')
                            ->maxLength(255)
                            ->placeholder('Private release'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Residences content.'
                            ),
                    ]),
            ]);
    }
}
