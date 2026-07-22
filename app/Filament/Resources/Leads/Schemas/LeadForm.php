<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(150),

                TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->required()
                    ->maxLength(50),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(190),

                Select::make('interest')
                    ->label('Interested In')
                    ->options([
                        'river-suites' => 'River Suites — 1BR',
                        'corniche-residences' => 'Corniche Residences — 2–3BR',
                        'sky-residences' => 'Sky Residences — 3–4BR',
                        'crescent-penthouses' => 'The Crescent Penthouses',
                        'other' => 'Advising a client / other',
                    ])
                    ->required(),

                Select::make('budget')
                    ->label('Budget Range')
                    ->options([
                        '15-30m' => 'EGP 15 – 30M',
                        '30-60m' => 'EGP 30 – 60M',
                        '60m-plus' => 'EGP 60M +',
                        'usd-equivalent' => 'USD equivalent',
                    ])
                    ->placeholder('Prefer not to say'),

                Select::make('contact_method')
                    ->label('Preferred Contact')
                    ->options([
                        'phone' => 'Phone call',
                        'whatsapp' => 'WhatsApp',
                        'email' => 'Email',
                    ])
                    ->required(),

                Select::make('status')
                    ->label('Lead Status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'qualified' => 'Qualified',
                        'closed' => 'Closed',
                    ])
                    ->required(),

                Textarea::make('message')
                    ->label('Message')
                    ->rows(5)
                    ->columnSpanFull(),

                TextInput::make('source')
                    ->label('Source')
                    ->disabled(),

                TextInput::make('ip_address')
                    ->label('IP Address')
                    ->disabled(),
            ])
            ->columns(2);
    }
}
