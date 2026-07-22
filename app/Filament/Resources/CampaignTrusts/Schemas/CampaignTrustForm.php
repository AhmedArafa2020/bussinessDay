<?php

namespace App\Filament\Resources\CampaignTrusts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CampaignTrustForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Trust Content')
                    ->description(
                        'The credibility content displayed on the founding release page.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The people behind it')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'A Dubai operating standard, committed to Cairo.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('lead_text')
                            ->label('Lead Text')
                            ->rows(5)
                            ->maxLength(2500)
                            ->columnSpanFull(),
                    ]),

                Section::make('Trust Image')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('campaign/trust')
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),

                        TextInput::make('image_alt')
                            ->label('Image Alt Text')
                            ->maxLength(255)
                            ->placeholder(
                                'Dubai skyline representing the company operating standard'
                            )
                            ->helperText(
                                'Describe the image for accessibility.'
                            )
                            ->columnSpanFull(),

                        TextInput::make('image_caption')
                            ->label('Image Caption')
                            ->maxLength(255)
                            ->placeholder(
                                'Dubai — where the operating standard was established'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Trust Statistics')
                    ->schema([
                        TextInput::make('stat_one_value')
                            ->label('Stat 1 Value')
                            ->maxLength(100)
                            ->placeholder('19 yrs'),

                        TextInput::make('stat_one_label')
                            ->label('Stat 1 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Delivering in the Gulf'
                            ),

                        TextInput::make('stat_two_value')
                            ->label('Stat 2 Value')
                            ->maxLength(100)
                            ->placeholder('EGP 9.4B'),

                        TextInput::make('stat_two_label')
                            ->label('Stat 2 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Committed to Egypt'
                            ),

                        TextInput::make('stat_three_value')
                            ->label('Stat 3 Value')
                            ->maxLength(100)
                            ->placeholder('15 yrs'),

                        TextInput::make('stat_three_label')
                            ->label('Stat 3 Label')
                            ->maxLength(255)
                            ->placeholder(
                                'Operator mandate'
                            ),
                    ])
                    ->columns(2),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Campaign Trust content.'
                            ),
                    ]),
            ]);
    }
}
