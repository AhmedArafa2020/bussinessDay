<?php

namespace App\Filament\Resources\CampaignBenefits\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CampaignBenefitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Benefits Introduction')
                    ->description(
                        'The heading displayed above the founding release benefits.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('Founding release advantages')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'Reserved for those who arrive first.'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Benefit 1')
                    ->schema([
                        TextInput::make('item_one_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder('Founding-release pricing')
                            ->columnSpanFull(),

                        Textarea::make('item_one_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_one_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('01')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Benefit 2')
                    ->schema([
                        TextInput::make('item_two_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder('Priority residence selection')
                            ->columnSpanFull(),

                        Textarea::make('item_two_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_two_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('02')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Benefit 3')
                    ->schema([
                        TextInput::make('item_three_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder('Extended payment terms')
                            ->columnSpanFull(),

                        Textarea::make('item_three_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_three_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('03')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Benefit 4')
                    ->schema([
                        TextInput::make('item_four_title')
                            ->label('Title')
                            ->maxLength(255)
                            ->placeholder('Direct advisory access')
                            ->columnSpanFull(),

                        Textarea::make('item_four_description')
                            ->label('Description')
                            ->rows(4)
                            ->maxLength(1500)
                            ->columnSpanFull(),

                        TextInput::make('item_four_label')
                            ->label('Side Label')
                            ->maxLength(100)
                            ->placeholder('04')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Campaign Benefits content.'
                            ),
                    ]),
            ]);
    }
}
