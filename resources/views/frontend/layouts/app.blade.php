<!DOCTYPE html>
<html
    lang="@yield('lang', 'en')"
    dir="@yield('dir', 'ltr')"
>
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @php
        $defaultSiteName = data_get(
            $siteSettings,
            'site_name',
            config('app.name')
        );

        $defaultMetaTitle = data_get(
            $siteSettings,
            'meta_title',
            $defaultSiteName
        );

        $defaultMetaDescription = data_get(
            $siteSettings,
            'meta_description',
            ''
        );

        $defaultMetaKeywords = data_get(
            $siteSettings,
            'meta_keywords',
            ''
        );

        $defaultMetaRobots = data_get(
            $siteSettings,
            'meta_robots',
            'index, follow'
        );

        $defaultCanonicalUrl = data_get(
            $siteSettings,
            'canonical_url',
            url()->current()
        );

        $defaultOgTitle = data_get(
            $siteSettings,
            'og_title',
            $defaultMetaTitle
        );

        $defaultOgDescription = data_get(
            $siteSettings,
            'og_description',
            $defaultMetaDescription
        );

        $defaultOgImagePath = data_get(
            $siteSettings,
            'og_image'
        );

        $defaultOgImage = $defaultOgImagePath
            ? asset('storage/' . $defaultOgImagePath)
            : '';

        $defaultTwitterTitle = data_get(
            $siteSettings,
            'twitter_title',
            $defaultOgTitle
        );

        $defaultTwitterDescription = data_get(
            $siteSettings,
            'twitter_description',
            $defaultOgDescription
        );

        $defaultTwitterImagePath = data_get(
            $siteSettings,
            'twitter_image'
        );

        $defaultTwitterImage = $defaultTwitterImagePath
            ? asset('storage/' . $defaultTwitterImagePath)
            : $defaultOgImage;

        $faviconPath = data_get(
            $siteSettings,
            'favicon'
        );

        $metaTitle = trim(
            $__env->yieldContent(
                'meta_title',
                $defaultMetaTitle
            )
        );

        $metaDescription = trim(
            $__env->yieldContent(
                'meta_description',
                $defaultMetaDescription
            )
        );

        $metaKeywords = trim(
            $__env->yieldContent(
                'meta_keywords',
                $defaultMetaKeywords
            )
        );

        $metaRobots = trim(
            $__env->yieldContent(
                'meta_robots',
                $defaultMetaRobots
            )
        );

        $canonicalUrl = trim(
            $__env->yieldContent(
                'canonical_url',
                url()->current()
            )
        );
        $ogType = trim(
            $__env->yieldContent(
                'og_type',
                'website'
            )
        );

        $ogTitle = trim(
            $__env->yieldContent(
                'og_title',
                $defaultOgTitle ?: $metaTitle
            )
        );

        $ogDescription = trim(
            $__env->yieldContent(
                'og_description',
                $defaultOgDescription ?: $metaDescription
            )
        );

        $ogImage = trim(
            $__env->yieldContent(
                'og_image',
                $defaultOgImage
            )
        );

        $twitterTitle = trim(
            $__env->yieldContent(
                'twitter_title',
                $defaultTwitterTitle ?: $ogTitle
            )
        );

        $twitterDescription = trim(
            $__env->yieldContent(
                'twitter_description',
                $defaultTwitterDescription ?: $ogDescription
            )
        );

        $twitterImage = trim(
            $__env->yieldContent(
                'twitter_image',
                $defaultTwitterImage ?: $ogImage
            )
        );
    @endphp

    {{-- Page title --}}
    <title>{{ $metaTitle }}</title>
    @if ($faviconPath)
        <link
            rel="icon"
            href="{{ asset('storage/' . $faviconPath) }}"
        >
    @endif
    {{-- Basic SEO --}}
    @if ($metaDescription)
        <meta
            name="description"
            content="{{ $metaDescription }}"
        >
    @endif

    @if ($metaKeywords)
        <meta
            name="keywords"
            content="{{ $metaKeywords }}"
        >
    @endif

    <meta
        name="robots"
        content="{{ $metaRobots }}"
    >

    <link
        rel="canonical"
        href="{{ $canonicalUrl }}"
    >

    {{-- Open Graph --}}
    <meta
        property="og:type"
        content="{{ $ogType }}"
    >

    <meta
        property="og:site_name"
        content="{{ $defaultSiteName }}"
    >

    <meta
        property="og:title"
        content="{{ $ogTitle }}"
    >

    @if ($ogDescription)
        <meta
            property="og:description"
            content="{{ $ogDescription }}"
        >
    @endif

    <meta
        property="og:url"
        content="{{ $canonicalUrl }}"
    >

    @if ($ogImage)
        <meta
            property="og:image"
            content="{{ $ogImage }}"
        >

        <meta
            property="og:image:alt"
            content="{{ $ogTitle }}"
        >
    @endif

    {{-- Twitter / X Cards --}}
    <meta
        name="twitter:card"
        content="{{ $twitterImage ? 'summary_large_image' : 'summary' }}"
    >

    <meta
        name="twitter:title"
        content="{{ $twitterTitle }}"
    >

    @if ($twitterDescription)
        <meta
            name="twitter:description"
            content="{{ $twitterDescription }}"
        >
    @endif

    @if ($twitterImage)
        <meta
            name="twitter:image"
            content="{{ $twitterImage }}"
        >
    @endif
    {{-- Extra meta tags for individual pages --}}
    @yield('meta')

    {{-- Fonts --}}
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

    {{-- Main stylesheet --}}
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

@include('frontend.components.header')

<main id="main">
    @yield('content')
</main>

@include('frontend.components.footer')

<script
    src="{{ asset('frontend/js/main.js') }}"
    defer
></script>

<script
    src="{{ asset('frontend/js/leads.js') }}"
    defer
></script>

@stack('scripts')
</body>
</html>
