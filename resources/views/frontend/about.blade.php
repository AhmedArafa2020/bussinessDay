@extends('frontend.layouts.app')

@section('lang', 'en')
@section('dir', 'ltr')

@section(
    'meta_title',
    $aboutPage->meta_title ?: $aboutPage->title
)

@section(
    'meta_description',
    $aboutPage->meta_description
        ?: $aboutPage->hero_description
)

@section(
    'meta_keywords',
    is_array($aboutPage->meta_keywords)
        ? implode(', ', $aboutPage->meta_keywords)
        : ($aboutPage->meta_keywords ?? '')
)

@section(
    'meta_robots',
    $aboutPage->meta_robots ?: 'index, follow'
)

@section(
    'canonical_url',
    $aboutPage->canonical_url ?: route('about')
)

@section(
    'og_title',
    $aboutPage->og_title
        ?: $aboutPage->meta_title
        ?: $aboutPage->title
)

@section(
    'og_description',
    $aboutPage->og_description
        ?: $aboutPage->meta_description
        ?: $aboutPage->hero_description
)

@if ($aboutPage->og_image)
    @section(
        'og_image',
        asset('storage/' . $aboutPage->og_image)
    )
@elseif ($aboutPage->image)
    @section(
        'og_image',
        asset('storage/' . $aboutPage->image)
    )
@endif

@push('styles')
    <style>
        .about-page {
            background: #f8f7f3;
        }

        .about-hero {
            position: relative;
            display: flex;
            min-height: 520px;
            align-items: center;
            overflow: hidden;
            background: #17201c;
            color: #ffffff;
        }

        .about-hero__background {
            position: absolute;
            inset: 0;
        }

        .about-hero__background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-hero__overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    90deg,
                    rgba(10, 18, 15, 0.9) 0%,
                    rgba(10, 18, 15, 0.7) 48%,
                    rgba(10, 18, 15, 0.3) 100%
                );
        }

        .about-container {
            position: relative;
            width: min(1180px, calc(100% - 40px));
            margin-inline: auto;
        }

        .about-hero__content {
            position: relative;
            z-index: 2;
            max-width: 720px;
            padding-block: 110px;
        }

        .about-hero__label {
            display: inline-block;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #d4b978;
        }

        .about-hero h1 {
            max-width: 780px;
            margin: 0;
            font-family: "Playfair Display", serif;
            font-size: clamp(42px, 6vw, 76px);
            font-weight: 500;
            line-height: 1.08;
        }

        .about-hero p {
            max-width: 650px;
            margin: 28px 0 0;
            font-size: 18px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.78);
        }

        .about-content {
            padding-block: 100px;
        }

        .about-content__grid {
            display: grid;
            grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
            gap: 80px;
            align-items: start;
        }

        .about-content__image {
            position: sticky;
            top: 110px;
        }

        .about-content__image img {
            display: block;
            width: 100%;
            min-height: 520px;
            border-radius: 4px;
            object-fit: cover;
        }

        .about-content__body {
            color: #323b36;
            font-size: 17px;
            line-height: 1.9;
        }

        .about-content__body h2,
        .about-content__body h3 {
            margin-top: 0;
            margin-bottom: 22px;
            font-family: "Playfair Display", serif;
            color: #17201c;
        }

        .about-content__body h2 {
            font-size: clamp(34px, 4vw, 50px);
            line-height: 1.2;
        }

        .about-content__body h3 {
            margin-top: 38px;
            font-size: 28px;
        }

        .about-content__body p {
            margin: 0 0 22px;
        }

        .about-content__body ul,
        .about-content__body ol {
            margin: 0 0 24px;
            padding-inline-start: 22px;
        }

        .about-content__body img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 900px) {
            .about-hero {
                min-height: 440px;
            }

            .about-hero__content {
                padding-block: 80px;
            }

            .about-content {
                padding-block: 70px;
            }

            .about-content__grid {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .about-content__image {
                position: static;
            }

            .about-content__image img {
                min-height: 360px;
            }
        }

        @media (max-width: 600px) {
            .about-container {
                width: min(100% - 28px, 1180px);
            }

            .about-hero h1 {
                font-size: 42px;
            }

            .about-hero p {
                font-size: 16px;
            }

            .about-content {
                padding-block: 55px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="about-page">
        <section class="about-hero">
            @if ($aboutPage->image)
                <div class="about-hero__background">
                    <img
                        src="{{ asset('storage/' . $aboutPage->image) }}"
                        alt="{{ $aboutPage->hero_title ?: $aboutPage->title }}"
                    >

                    <div class="about-hero__overlay"></div>
                </div>
            @endif

            <div class="about-container">
                <div class="about-hero__content">
                    <span class="about-hero__label">
                        About Business Bay
                    </span>

                    <h1>
                        {{ $aboutPage->hero_title ?: $aboutPage->title }}
                    </h1>

                    @if ($aboutPage->hero_description)
                        <p>
                            {{ $aboutPage->hero_description }}
                        </p>
                    @endif
                </div>
            </div>
        </section>

        <section class="about-content">
            <div class="about-container">
                <div class="about-content__grid">
                    @if ($aboutPage->image)
                        <div class="about-content__image">
                            <img
                                src="{{ asset('storage/' . $aboutPage->image) }}"
                                alt="{{ $aboutPage->title }}"
                                loading="lazy"
                            >
                        </div>
                    @endif

                    <article class="about-content__body">
                        {!! $aboutPage->content !!}
                    </article>
                </div>
            </div>
        </section>
    </div>
@endsection
