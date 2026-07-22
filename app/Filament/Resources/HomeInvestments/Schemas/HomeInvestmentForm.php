<?php

namespace App\Filament\Resources\HomeInvestments\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeInvestmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Investment Introduction')
                    ->description(
                        'The heading and content displayed in the homepage Investment section.'
                    )
                    ->schema([
                        TextInput::make('eyebrow')
                            ->label('Eyebrow')
                            ->maxLength(255)
                            ->placeholder('The investment case')
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder(
                                'An asset designed to stay relevant.'
                            )
                            ->columnSpanFull(),

                        Textarea::make('lead_text')
                            ->label('Lead Text')
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->maxLength(2500)
                            ->columnSpanFull(),
                    ]),

                Section::make('Investment Statistics')
                    ->schema([
                        TextInput::make('stat_one_value')
                            ->label('Stat 1 Value')
                            ->maxLength(100)
                            ->placeholder('6–8%'),

                        TextInput::make('stat_one_label')
                            ->label('Stat 1 Label')
                            ->maxLength(255)
                            ->placeholder('Target net rental yield'),

                        TextInput::make('stat_two_value')
                            ->label('Stat 2 Value')
                            ->maxLength(100)
                            ->placeholder('60%'),

                        TextInput::make('stat_two_label')
                            ->label('Stat 2 Label')
                            ->maxLength(255)
                            ->placeholder('Managed leasing pool'),

                        TextInput::make('stat_three_value')
                            ->label('Stat 3 Value')
                            ->maxLength(100)
                            ->placeholder('Q4 2029'),

                        TextInput::make('stat_three_label')
                            ->label('Stat 3 Label')
                            ->maxLength(255)
                            ->placeholder('Target completion'),
                    ])
                    ->columns(2),

                Section::make('Investment Button')
                    ->schema([
                        TextInput::make('button_text')
                            ->label('Button Text')
                            ->maxLength(255)
                            ->placeholder('Request the investment brief'),

                        TextInput::make('button_url')
                            ->label('Button URL')
                            ->maxLength(255)
                            ->placeholder('#enquire'),
                    ])
                    ->columns(2),

                Section::make('Frequently Asked Question 1')
                    ->schema([
                        TextInput::make('faq_one_question')
                            ->label('Question')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('faq_one_answer')
                            ->label('Answer')
                            ->rows(5)
                            ->maxLength(2500)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Frequently Asked Question 2')
                    ->schema([
                        TextInput::make('faq_two_question')
                            ->label('Question')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('faq_two_answer')
                            ->label('Answer')
                            ->rows(5)
                            ->maxLength(2500)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Frequently Asked Question 3')
                    ->schema([
                        TextInput::make('faq_three_question')
                            ->label('Question')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('faq_three_answer')
                            ->label('Answer')
                            ->rows(5)
                            ->maxLength(2500)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Visibility')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText(
                                'Disable this to use the default Investment content.'
                            ),
                    ]),
            ]);
    }
}
