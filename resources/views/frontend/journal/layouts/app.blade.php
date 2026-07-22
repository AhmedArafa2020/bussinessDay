<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'The Journal — Business Bay Developments')
    </title>

    <meta
        name="description"
        content="@yield(
            'meta_description',
            'Market readings, design notes, and investment insight from Business Bay Developments.'
        )"
    >

    <meta
        property="og:type"
        content="@yield('og_type', 'website')"
    >

    <meta
        property="og:title"
        content="@yield('og_title', 'The Journal — Business Bay Developments')"
    >

    <meta
        property="og:description"
        content="@yield(
            'og_description',
            'Market readings, design notes, and investment insight from an Emirati–Egyptian house.'
        )"
    >

    <meta
        property="og:image"
        content="@yield(
            'og_image',
            asset('frontend/assets/capital-towers.jpg')
        )"
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

    @stack('styles')
</head>

<body>
<a
    class="skip-link"
    href="#main"
>
    Skip to content
</a>

<header class="site-header">
    <a
        class="brand"
        href="{{ route('home') }}"
        aria-label="Business Bay Developments — home"
    >
        <img
            src="{{ asset('frontend/assets/bbd-logo.png') }}"
            alt="Business Bay Developments logo"
            width="120"
            height="46"
        >
    </a>

    <button
        class="nav-toggle"
        type="button"
        aria-expanded="false"
        aria-label="Open menu"
    >
        <span></span>
        <span></span>
        <span></span>
    </button>

    <nav
        class="nav"
        aria-label="Primary"
    >
        <a href="{{ route('home') }}#story">
            The Project
        </a>

        <a href="{{ route('home') }}#residences">
            Residences
        </a>

        <a
            href="{{ route('journal.index') }}"
            aria-current="page"
        >
            Journal
        </a>

        <a
            class="btn btn-crimson header-cta"
            href="{{ route('home') }}#enquire"
        >
            Request the brief
        </a>
    </nav>
</header>

<main id="main">
    @yield('content')
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

        <a
            href="{{ route('home') }}"
            class="link-gold"
            style="
                    text-transform: none;
                    letter-spacing: .06em;
                "
        >
            Back to {{ $siteSettings?->project_name ?? 'Meridian One' }}
        </a>
    </div>
</footer>

<script
    src="{{ asset('frontend/js/main.js') }}"
    defer
></script>

@stack('scripts')
</body>
</html>
