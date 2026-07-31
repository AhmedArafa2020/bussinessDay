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

    <nav class="nav" aria-label="Primary">
        <a href="{{ route('home') }}#story">
            The Project
        </a>
        <a
            href="{{ route('about') }}"
            class="{{ request()->routeIs('about') ? 'active' : '' }}"
        >
            About Us
        </a>

        <a href="{{ route('home') }}#location">
            Location
        </a>

        <a href="{{ route('home') }}#residences">
            Residences
        </a>

        <a href="{{ route('home') }}#gallery">
            Gallery
        </a>

        <a href="{{ route('journal.index') }}">
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
