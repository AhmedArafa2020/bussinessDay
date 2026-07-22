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

{{ $siteSettings?->project_name ?? 'Meridian One' }}
is marketed subject to final approvals.
        </span>

        <a
            href="{{ route('home') }}"
            class="link-gold"
            style="
                text-transform: none;
                letter-spacing: .06em;
            "
        >
            Visit the full site
        </a>
    </div>
</footer>
