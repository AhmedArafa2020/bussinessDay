<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Founding Release — Meridian One, Nile-front Serviced Residences
    </title>

    <meta
        name="description"
        content="The founding release of Meridian One is open: fully serviced Nile-front residences in Cairo by Business Bay Developments. Request pricing and floor plans today."
    >

    <meta
        name="robots"
        content="noindex, nofollow"
    >

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:title"
        content="Meridian One — Founding Release Now Open"
    >

    <meta
        property="og:description"
        content="Fully serviced Nile-front residences. Founding-release pricing available on request."
    >

    <meta
        property="og:image"
        content="{{ asset('frontend/assets/crescent-tower.jpg') }}"
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
<a
    class="skip-link"
    href="#main"
>
    Skip to content
</a>

<header
    class="site-header scrolled"
    style="position: absolute"
>
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

    <a
        class="btn btn-crimson"
        href="#enquire"
    >
        Get pricing
    </a>
</header>

<main id="main">
    @include('frontend.campaign.sections.hero')
    @include('frontend.campaign.sections.benefits')
    @include('frontend.campaign.sections.trust')
    @include('frontend.campaign.sections.enquiry')
    @include('frontend.campaign.sections.faq')
</main>
@include('frontend.campaign.components.footer')
<script
    src="{{ asset('frontend/js/main.js') }}"
    defer
></script>
<script
    src="{{ asset('frontend/js/leads.js') }}?v=2"
    defer
></script>
</body>
</html>
