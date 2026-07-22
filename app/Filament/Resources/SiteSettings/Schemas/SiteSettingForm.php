<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Information')
                    ->description(
                        'The main website and project information.'
                    )
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Site Name')
                            ->required()
                            ->maxLength(255)
                            ->default('Business Bay Developments'),

                        TextInput::make('project_name')
                            ->label('Project Name')
                            ->required()
                            ->maxLength(255)
                            ->default('Meridian One'),
                    ])
                    ->columns(2),

                Section::make('Contact Information')
                    ->description(
                        'Contact details displayed across the website.'
                    )
                    ->schema([
                        TextInput::make('email')
                            ->label('Contact Email')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('enquiries@example.com'),

                        TextInput::make('cairo_phone')
                            ->label('Cairo Phone')
                            ->tel()
                            ->maxLength(50)
                            ->placeholder('+20 2 0000 0000'),

                        TextInput::make('dubai_phone')
                            ->label('Dubai Phone')
                            ->tel()
                            ->maxLength(50)
                            ->placeholder('+971 4 000 0000'),

                        TextInput::make('whatsapp')
                            ->label('WhatsApp Number')
                            ->tel()
                            ->maxLength(50)
                            ->placeholder('+20 100 000 0000'),
                    ])
                    ->columns(2),

                Section::make('Social Media')
                    ->description(
                        'Leave any unused social media link empty.'
                    )
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('Facebook URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder(
                                'https://facebook.com/businessbay'
                            ),

                        TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder(
                                'https://instagram.com/businessbay'
                            ),

                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder(
                                'https://linkedin.com/company/businessbay'
                            ),
                    ])
                    ->columns(2),

                Section::make('Footer')
                    ->schema([
                        Textarea::make('footer_description')
                            ->label('Footer Description')
                            ->rows(4)
                            ->maxLength(1000)
                            ->placeholder(
                                'Business Bay Developments builds and operates hospitality-grade real estate.'
                            )
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
