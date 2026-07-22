<!DOCTYPE html>
<html lang="@yield('lang', 'en')" dir="@yield('dir', 'ltr')">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'Business Bay Developments')</title>

    <meta
        name="description"
        content="@yield('meta_description', 'Business Bay Developments')"
    >

    @yield('meta')

    <link rel="preconnect" href="https://fonts.googleapis.com">
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
<a class="skip-link" href="#main">
    Skip to content
</a>
@include('frontend.components.header')
@yield('content')
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
