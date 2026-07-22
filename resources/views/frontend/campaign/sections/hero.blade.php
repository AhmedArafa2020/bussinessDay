@php
    $campaignHeroImage = filled($campaignHero?->background_image)
        ? asset('storage/' . $campaignHero->background_image)
        : asset('frontend/assets/crescent-tower.jpg');

    $primaryButtonUrl = filled($campaignHero?->primary_button_url)
        ? $campaignHero->primary_button_url
        : '#enquire';
@endphp

<section
    class="hero"
    style="min-height:88svh"
    aria-label="Offer"
>
    <div class="hero-media">
        <img
            src="{{ $campaignHeroImage }}"
            alt="{{ $campaignHero?->image_alt
                ?? 'The crescent-crowned Meridian One tower against a bright sky' }}"
            fetchpriority="high"
        >
    </div>

    <div class="hero-inner">
        <p class="hero-kicker" data-seq="1">
            {{ $campaignHero?->eyebrow ?? 'Founding release' }}

            @if (
                filled($campaignHero?->availability_text)
                || ! $campaignHero
            )
                · {{ $campaignHero?->availability_text ?? 'Now open' }}
            @endif
        </p>

        <h1
            data-seq="2"
            style="max-width:11em"
        >
            {{ $campaignHero?->title
                ?? 'Nile-front residences,' }}

            @if (
                filled($campaignHero?->highlighted_title)
                || ! $campaignHero
            )
                <em class="disp-em">
                    {{ $campaignHero?->highlighted_title
                        ?? 'run like a five-star hotel.' }}
                </em>
            @endif
        </h1>

        @if (
            filled($campaignHero?->description)
            || ! $campaignHero
        )
            <p class="lede" data-seq="3">
                {{ $campaignHero?->description
                    ?? 'Meridian One, Cairo — by Business Bay Developments. Founding-release pricing and floor plans are available on request, before public launch.' }}
            </p>
        @endif

        <div class="hero-cta" data-seq="4">
            @if (
                filled($campaignHero?->primary_button_text)
                || ! $campaignHero
            )
                <a
                    class="btn btn-crimson btn-arrow"
                    href="{{ $primaryButtonUrl }}"
                >
                    {{ $campaignHero?->primary_button_text
                        ?? 'Request pricing & plans' }}
                </a>
            @endif

            @if (
                filled($campaignHero?->secondary_button_text)
                && filled($campaignHero?->secondary_button_url)
            )
                <a
                    class="btn btn-ghost"
                    href="{{ $campaignHero->secondary_button_url }}"
                >
                    {{ $campaignHero->secondary_button_text }}
                </a>
            @endif
        </div>

        <div class="hero-facts" data-seq="5">
            <div>
                <strong>212</strong>
                Residences only
            </div>

            <div>
                <strong>2028</strong>
                Serviced handover
            </div>

            <div>
                <strong>1 day</strong>
                Advisor response
            </div>
        </div>
    </div>
</section>
