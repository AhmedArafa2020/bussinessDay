<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Site Settings')
                    ->tabs([
                        self::generalTab(),
                        self::brandingTab(),
                        self::contactTab(),
                        self::socialLinksTab(),
                        self::seoTab(),
                        self::openGraphTab(),
                        self::twitterTab(),
                        self::analyticsTab(),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),

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
    protected static function generalTab(): Tab
    {
        return Tab::make('General')
            ->icon('heroicon-o-cog-6-tooth')
            ->schema([
                Section::make('General Information')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Site Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('site_tagline')
                            ->label('Site Tagline')
                            ->maxLength(255),

                        Select::make('default_language')
                            ->label('Default Language')
                            ->options([
                                'en' => 'English',
                                'ar' => 'Arabic',
                            ])
                            ->default('en'),

                        Select::make('site_direction')
                            ->label('Default Direction')
                            ->options([
                                'ltr' => 'Left to Right',
                                'rtl' => 'Right to Left',
                            ])
                            ->default('ltr'),
                    ])
                    ->columns(2),
            ]);
    }
    protected static function brandingTab(): Tab
    {
        return Tab::make('Branding')
            ->icon('heroicon-o-photo')
            ->schema([
                Section::make('Website Branding')
                    ->schema([


                        FileUpload::make('logo_dark')
                            ->label('Dark Logo')
                            ->image()
                            ->disk('public')
                            ->directory('site/branding')
                            ->imageEditor(),

                        FileUpload::make('favicon')
                            ->label('Favicon')
                            ->image()
                            ->disk('public')
                            ->directory('site/branding')
                            ->acceptedFileTypes([
                                'image/png',
                                'image/x-icon',
                                'image/vnd.microsoft.icon',
                                'image/svg+xml',
                            ]),

                        FileUpload::make('footer_logo')
                            ->label('Footer Logo')
                            ->image()
                            ->disk('public')
                            ->directory('site/branding')
                            ->imageEditor(),
                    ])
                    ->columns(2),
            ]);
    }
    protected static function contactTab(): Tab
    {
        return Tab::make('Contact')
            ->icon('heroicon-o-phone')
            ->schema([
                Section::make('Contact Information')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('cairo_phone')
                            ->label('Cairo Phone')
                            ->tel()
                            ->maxLength(100),

                        TextInput::make('dubai_phone')
                            ->label('Dubai Phone')
                            ->tel()
                            ->maxLength(100),

                        TextInput::make('whatsapp')
                            ->label('WhatsApp Number')
                            ->tel()
                            ->maxLength(100),

                        TextInput::make('working_hours')
                            ->label('Working Hours')
                            ->maxLength(255),



                        TextInput::make('google_map_url')
                            ->label('Google Maps URL')
                            ->url()
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
    protected static function socialLinksTab(): Tab
    {
        return Tab::make('Social Links')
            ->icon('heroicon-o-share')
            ->schema([
                Section::make('Social Media Accounts')
                    ->description('Enter complete profile URLs.')
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('Facebook')
                            ->url()
                            ->maxLength(1000),

                        TextInput::make('instagram_url')
                            ->label('Instagram')
                            ->url()
                            ->maxLength(1000),

                        TextInput::make('linkedin_url')
                            ->label('LinkedIn')
                            ->url()
                            ->maxLength(1000),

                        TextInput::make('twitter_url')
                            ->label('X / Twitter')
                            ->url()
                            ->maxLength(1000),

                        TextInput::make('youtube_url')
                            ->label('YouTube')
                            ->url()
                            ->maxLength(1000),

                        TextInput::make('tiktok_url')
                            ->label('TikTok')
                            ->url()
                            ->maxLength(1000),
                    ])
                    ->columns(2),
            ]);
    }
    protected static function seoTab(): Tab
    {
        return Tab::make('SEO')
            ->icon('heroicon-o-magnifying-glass')
            ->schema([
                Section::make('Default Search Engine Settings')
                    ->description(
                        'These values are used when a page does not have its own SEO settings.'
                    )
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Default Meta Title')
                            ->maxLength(60)
                            ->live()
                            ->helperText(
                                fn (?string $state): string =>
                                    strlen($state ?? '') . '/60 characters'
                            ),

                        Select::make('meta_robots')
                            ->label('Default Robots')
                            ->options([
                                'index, follow' => 'Index and follow',
                                'index, nofollow' => 'Index and nofollow',
                                'noindex, follow' => 'Noindex and follow',
                                'noindex, nofollow' => 'Noindex and nofollow',
                            ])
                            ->default('index, follow')
                            ->required(),

                        Textarea::make('meta_description')
                            ->label('Default Meta Description')
                            ->rows(4)
                            ->maxLength(160)
                            ->live()
                            ->helperText(
                                fn (?string $state): string =>
                                    strlen($state ?? '') . '/160 characters'
                            )
                            ->columnSpanFull(),

                        Textarea::make('meta_keywords')
                            ->label('Default Keywords')
                            ->rows(3)
                            ->placeholder(
                                'Business Bay, Dubai real estate, property investment'
                            )
                            ->helperText('Separate keywords using commas.')
                            ->columnSpanFull(),

                        TextInput::make('canonical_url')
                            ->label('Main Website URL')
                            ->url()
                            ->placeholder('https://example.com')
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
    protected static function openGraphTab(): Tab
    {
        return Tab::make('Open Graph')
            ->icon('heroicon-o-globe-alt')
            ->schema([
                Section::make('Social Sharing Defaults')
                    ->description(
                        'Used when links are shared on Facebook, LinkedIn, WhatsApp, and other platforms.'
                    )
                    ->schema([
                        TextInput::make('og_title')
                            ->label('Default Social Title')
                            ->maxLength(95),

                        Textarea::make('og_description')
                            ->label('Default Social Description')
                            ->rows(4)
                            ->columnSpanFull(),

                        FileUpload::make('og_image')
                            ->label('Default Social Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('site/seo')
                            ->helperText('Recommended size: 1200 × 630 pixels.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
    protected static function twitterTab(): Tab
    {
        return Tab::make('Twitter / X')
            ->icon('heroicon-o-chat-bubble-left-right')
            ->schema([
                Section::make('Twitter Card Defaults')
                    ->description(
                        'Leave these fields empty to use the Open Graph values.'
                    )
                    ->schema([
                        TextInput::make('twitter_title')
                            ->label('Twitter / X Title')
                            ->maxLength(70),

                        Textarea::make('twitter_description')
                            ->label('Twitter / X Description')
                            ->rows(4)
                            ->columnSpanFull(),

                        FileUpload::make('twitter_image')
                            ->label('Twitter / X Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('site/seo/twitter')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
    protected static function analyticsTab(): Tab
    {
        return Tab::make('Analytics')
            ->icon('heroicon-o-chart-bar')
            ->schema([
                Section::make('Tracking Codes')
                    ->description(
                        'Only enter the identifier, not the complete JavaScript code.'
                    )
                    ->schema([
                        TextInput::make('google_analytics_id')
                            ->label('Google Analytics Measurement ID')
                            ->placeholder('G-XXXXXXXXXX')
                            ->maxLength(100),

                        TextInput::make('google_tag_manager_id')
                            ->label('Google Tag Manager ID')
                            ->placeholder('GTM-XXXXXXX')
                            ->maxLength(100),

                        TextInput::make('facebook_pixel_id')
                            ->label('Meta Pixel ID')
                            ->maxLength(100),

                        TextInput::make('google_verification_code')
                            ->label('Google Search Console Verification')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

}
