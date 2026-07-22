<?php

namespace App\Filament\Resources\HomeStories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeStoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Story Content')
                    ->description(
                        'The company story displayed below the homepage Hero.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The house behind it')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'From the heart of Dubai to the heart of Egypt.'
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
                    ]),

                Section::make('Story Image')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('home/story')
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label('Image Alt Text')
                            ->maxLength(255)
                            ->placeholder(
                                'Dubai skyline at golden hour'
                            )
                            ->helperText(
                                'Describe the image for accessibility.'
                            )
                            ->columnSpanFull(),

                        TextInput::make('image_caption')
                            ->label('Image Caption')
                            ->maxLength(255)
                            ->placeholder(
                                'Dubai — where the standard was set'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Story Statistics')
                    ->description(
                        'The three statistics displayed below the story text.'
                    )
                    ->schema([
                        TextInput::make('stat_one_value')
                            ->label('Stat 1 Value')
                            ->maxLength(50)
                            ->placeholder('19 yrs'),

                        TextInput::make('stat_one_label')
                            ->label('Stat 1 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Delivering in the Gulf'
                            ),

                        TextInput::make('stat_two_value')
                            ->label('Stat 2 Value')
                            ->maxLength(50)
                            ->placeholder('EGP 9.4B'),

                        TextInput::make('stat_two_label')
                            ->label('Stat 2 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Committed to Egypt'
                            ),

                        TextInput::make('stat_three_value')
                            ->label('Stat 3 Value')
                            ->maxLength(50)
                            ->placeholder('1'),

                        TextInput::make('stat_three_label')
                            ->label('Stat 3 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Standard, two capitals'
                            ),
                    ])
                    ->columns(2),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Story content.'
                            ),
                    ]),
            ]);
    }
}
