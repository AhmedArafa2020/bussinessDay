@php
    $heroImage = filled($homeHero?->background_image)
        ? asset('storage/' . $homeHero->background_image)
        : asset('frontend/assets/cairo-nile-dusk.jpg');
@endphp

<section class="hero" aria-label="Introduction">
    <div class="hero-media">
        <img
            src="{{ $heroImage }}"
            alt="{{ $homeHero?->title ?? 'Meridian One Nile-front residences' }}"
            fetchpriority="high"
        >
    </div>

    <div class="hero-inner">
        <p class="hero-kicker" data-seq="1">
            {{ $homeHero?->kicker
                ?? 'Business Bay Developments · Cairo' }}
        </p>

        <h1 data-seq="2">
            {{ $homeHero?->title
                ?? 'A residence held to the standard of a' }}

            @if (filled($homeHero?->highlighted_title))
                <em class="disp-em">
                    {{ $homeHero->highlighted_title }}
                </em>
            @else
                <em class="disp-em">
                    great hotel.
                </em>
            @endif
        </h1>

        <p class="lede" data-seq="3">
            {{ $homeHero?->description
                ?? 'Meridian One is a collection of fully serviced Nile-front residences — designed in Dubai, built in Cairo, and run to a single hospitality standard from the day you receive your keys.' }}
        </p>

        <div class="hero-cta" data-seq="4">
            @if (filled($homeHero?->primary_button_text))
                <a
                    class="btn btn-crimson btn-arrow"
                    href="{{ $homeHero->primary_button_url ?: '#enquire' }}"
                >
                    {{ $homeHero->primary_button_text }}
                </a>
            @endif

            @if (filled($homeHero?->secondary_button_text))
                <a
                    class="btn btn-ghost"
                    href="{{ $homeHero->secondary_button_url ?: '#story' }}"
                >
                    {{ $homeHero->secondary_button_text }}
                </a>
            @endif
        </div>

        <div class="hero-facts" data-seq="5">
            @if (
                filled($homeHero?->fact_one_value)
                || filled($homeHero?->fact_one_label)
            )
                <div>
                    <strong>
                        {{ $homeHero->fact_one_value }}
                    </strong>

                    {{ $homeHero->fact_one_label }}
                </div>
            @endif

            @if (
                filled($homeHero?->fact_two_value)
                || filled($homeHero?->fact_two_label)
            )
                <div>
                    <strong>
                        {{ $homeHero->fact_two_value }}
                    </strong>

                    {{ $homeHero->fact_two_label }}
                </div>
            @endif

            @if (
                filled($homeHero?->fact_three_value)
                || filled($homeHero?->fact_three_label)
            )
                <div>
                    <strong>
                        {{ $homeHero->fact_three_value }}
                    </strong>

                    {{ $homeHero->fact_three_label }}
                </div>
            @endif

            @if (
                filled($homeHero?->fact_four_value)
                || filled($homeHero?->fact_four_label)
            )
                <div>
                    <strong>
                        {{ $homeHero->fact_four_value }}
                    </strong>

                    {{ $homeHero->fact_four_label }}
                </div>
            @endif
        </div>
    </div>

    <div
        class="scroll-cue"
        aria-hidden="true"
    ></div>
</section>
