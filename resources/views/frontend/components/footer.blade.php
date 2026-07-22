<footer class="site-footer">
    <div class="footer-grid">

        <div class="footer-brand">
            <a
                href="{{ route('home') }}"
                aria-label="Business Bay Developments — home"
            >
                <img
                    src="{{ asset('frontend/assets/bbd-logo.png') }}"
                    alt="Business Bay Developments"
                >
            </a>

            <p>
                {{ $siteSettings?->footer_description
                    ?? 'Business Bay Developments builds and operates hospitality-grade real estate — from the heart of Dubai to the heart of Egypt.' }}
            </p>
        </div>

        <div>
            <h4>Project</h4>

            <ul>
                <li>
                    <a href="{{ route('home') }}#story">
                        The project
                    </a>
                </li>

                <li>
                    <a href="{{ route('home') }}#location">
                        Location
                    </a>
                </li>

                <li>
                    <a href="{{ route('home') }}#residences">
                        Residences
                    </a>
                </li>

                <li>
                    <a href="{{ route('home') }}#gallery">
                        Gallery
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h4>Company</h4>

            <ul>
                <li>
                    <a href="{{ route('journal.index') }}">
                        Journal
                    </a>
                </li>

                <li>
                    <a href="{{ route('campaign') }}">
                        Founding release
                    </a>
                </li>

                <li>
                    <a href="{{ route('home') }}#enquire">
                        Enquiries
                    </a>
                </li>
            </ul>
        </div>
        @if (
            filled($siteSettings?->facebook_url)
            || filled($siteSettings?->instagram_url)
            || filled($siteSettings?->linkedin_url)
        )
            <div>
                <h4>Follow</h4>

                <ul>
                    @if (filled($siteSettings?->facebook_url))
                        <li>
                            <a
                                href="{{ $siteSettings->facebook_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Facebook
                            </a>
                        </li>
                    @endif

                    @if (filled($siteSettings?->instagram_url))
                        <li>
                            <a
                                href="{{ $siteSettings->instagram_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Instagram
                            </a>
                        </li>
                    @endif

                    @if (filled($siteSettings?->linkedin_url))
                        <li>
                            <a
                                href="{{ $siteSettings->linkedin_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                LinkedIn
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        @endif
        <div>
            <h4>Desks</h4>

            <ul>
                @if (filled($siteSettings?->cairo_phone))
                    <li>
                        <a
                            href="tel:{{ preg_replace(
                        '/[^0-9+]/',
                        '',
                        $siteSettings->cairo_phone
                    ) }}"
                        >
                            Cairo {{ $siteSettings->cairo_phone }}
                        </a>
                    </li>
                @endif

                @if (filled($siteSettings?->dubai_phone))
                    <li>
                        <a
                            href="tel:{{ preg_replace(
                        '/[^0-9+]/',
                        '',
                        $siteSettings->dubai_phone
                    ) }}"
                        >
                            Dubai {{ $siteSettings->dubai_phone }}
                        </a>
                    </li>
                @endif

                @if (filled($siteSettings?->email))
                    <li>
                        <a href="mailto:{{ $siteSettings->email }}">
                            {{ $siteSettings->email }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>

    </div>

    <div class="footer-base">
        <span>
           © {{ date('Y') }}
            {{ $siteSettings?->site_name ?? 'Business Bay Developments' }}.
                All rights reserved.
        </span>

        <span>
            Meridian One is marketed subject to final approvals.
            Imagery is indicative.
        </span>
    </div>
</footer>
