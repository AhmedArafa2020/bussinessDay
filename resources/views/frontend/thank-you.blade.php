@php
    $thankYouImage = filled($thankYouContent?->background_image)
        ? asset('storage/' . $thankYouContent->background_image)
        : asset('frontend/assets/crescent-tower.jpg');

    $primaryButtonUrl = filled($thankYouContent?->primary_button_url)
        ? $thankYouContent->primary_button_url
        : route('home');

    $secondaryButtonUrl = filled($thankYouContent?->secondary_button_url)
        ? $thankYouContent->secondary_button_url
        : route('journal.index');
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Request Received — Meridian One
    </title>

    <meta
        name="description"
        content="Your request for the Meridian One private brief has been received. A senior advisor will reply within one business day."
    >

    <meta
        name="robots"
        content="noindex, nofollow"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&family=Playfair+Display:ital,wght@0,500;0,600;1,500&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('frontend/css/main.css') }}"
    >
</head>

<body>
<main>
    <section
        class="hero"
        style="min-height:100svh"
        aria-labelledby="thank-you-title"
    >
        <div class="hero-media">
            <img
                src="{{ $thankYouImage }}"
                alt="{{ $thankYouContent?->image_alt
                    ?? 'Meridian One residential tower against the Cairo skyline' }}"
                fetchpriority="high"
            >
        </div>

        <div class="hero-inner">
            <p class="hero-kicker" data-seq="1">
                {{ $thankYouContent?->eyebrow
                    ?? 'Thank you' }}
            </p>

            <h1
                id="thank-you-title"
                data-seq="2"
                style="max-width:12em"
            >
                {{ $thankYouContent?->title
                    ?? 'Your private brief is' }}

                @if (
                    filled($thankYouContent?->highlighted_title)
                    || ! $thankYouContent
                )
                    <em class="disp-em">
                        {{ $thankYouContent?->highlighted_title
                            ?? 'on its way.' }}
                    </em>
                @endif
            </h1>

            @if (
                filled($thankYouContent?->description)
                || ! $thankYouContent
            )
                <p class="lede" data-seq="3">
                    {{ $thankYouContent?->description
                        ?? 'A member of our advisory team will review your enquiry and contact you directly within one business day with the relevant Meridian One information.' }}
                </p>
            @endif

            <div class="hero-cta" data-seq="4">
                @if (
                    filled($thankYouContent?->primary_button_text)
                    || ! $thankYouContent
                )
                    <a
                        class="btn btn-crimson btn-arrow"
                        href="{{ $primaryButtonUrl }}"
                    >
                        {{ $thankYouContent?->primary_button_text
                            ?? 'Return to Meridian One' }}
                    </a>
                @endif

                @if (
                    filled($thankYouContent?->secondary_button_text)
                    || ! $thankYouContent
                )
                    <a
                        class="btn btn-ghost"
                        href="{{ $secondaryButtonUrl }}"
                    >
                        {{ $thankYouContent?->secondary_button_text
                            ?? 'Read the journal' }}
                    </a>
                @endif
            </div>

            @if (
                filled($siteSettings?->email)
                || filled($siteSettings?->cairo_phone)
            )
                <p class="form-note" data-seq="5">
                    Need immediate assistance?

                    @if (filled($siteSettings?->email))
                        <a href="mailto:{{ $siteSettings->email }}">
                            {{ $siteSettings->email }}
                        </a>
                    @endif

                    @if (
                        filled($siteSettings?->email)
                        && filled($siteSettings?->cairo_phone)
                    )
                        ·
                    @endif

                    @if (filled($siteSettings?->cairo_phone))
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $siteSettings->cairo_phone) }}">
                            {{ $siteSettings->cairo_phone }}
                        </a>
                    @endif
                </p>
            @endif
        </div>
    </section>
</main>

<footer class="site-footer">
    <div
        class="footer-base"
        style="
                margin-top: 0;
                border-top: 0;
            "
    >
            <span>
    © {{ date('Y') }}
                {{ $siteSettings?->site_name ?? 'Business Bay Developments' }}.
            </span>

        <span>
                From the heart of Dubai to the heart of Egypt.
            </span>
    </div>
</footer>
</body>
</html>
