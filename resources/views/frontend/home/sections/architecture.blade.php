@php
    $architectureImage = filled($homeArchitecture?->image)
        ? asset('storage/' . $homeArchitecture->image)
        : asset('frontend/assets/crescent-tower.jpg');

    $architectureButtonUrl = filled($homeArchitecture?->button_url)
        ? $homeArchitecture->button_url
        : '#gallery';
@endphp

<section
    class="section light"
    id="architecture"
    aria-labelledby="architecture-title"
>
    <div class="wrap duo">

        <figure class="duo-media rv">
            <div class="frame">
                <img
                    src="{{ $architectureImage }}"
                    alt="{{ $homeArchitecture?->image_alt
                        ?? 'Contemporary tower with a sculpted crescent crown against a bright sky' }}"
                    loading="lazy"
                >
            </div>

            @if (
                filled($homeArchitecture?->image_caption)
                || ! $homeArchitecture
            )
                <figcaption>
                    {{ $homeArchitecture?->image_caption
                        ?? 'The crescent crown — visible along the river' }}
                </figcaption>
            @endif
        </figure>

        <div class="duo-copy rv rv-d1">
            <p class="eyebrow">
                {{ $homeArchitecture?->eyebrow
                    ?? 'The architecture' }}
            </p>

            <h2 id="architecture-title">
                {{ $homeArchitecture?->title
                    ?? 'A quiet tower with one unforgettable gesture.' }}
            </h2>

            @if (filled($homeArchitecture?->lead_text) || ! $homeArchitecture)
                <p class="lede">
                    {{ $homeArchitecture?->lead_text
                        ?? 'The elevation is disciplined — pale stone, deep loggias, glass that reads as shadow — so that the single move, the crescent crown, carries the skyline.' }}
                </p>
            @endif

            @if (filled($homeArchitecture?->description) || ! $homeArchitecture)
                <p>
                    {{ $homeArchitecture?->description
                        ?? 'Inside, ceilings run to 3.2 metres, every principal room faces the water, and the servicing core is separated from the residential lifts so the hotel works around you, never through you.' }}
                </p>
            @endif

            @if (filled($homeArchitecture?->interiors_text) || ! $homeArchitecture)
                <p>
                    {{ $homeArchitecture?->interiors_text
                        ?? 'Interiors are delivered in two palettes — River Stone and Onyx & Brass — developed with the same ateliers that fit out our Dubai properties.' }}
                </p>
            @endif

            @if (
                filled($homeArchitecture?->button_text)
                || ! $homeArchitecture
            )
                <a
                    class="link-gold"
                    href="{{ $architectureButtonUrl }}"
                >
                    {{ $homeArchitecture?->button_text
                        ?? 'See the visual record' }}
                </a>
            @endif
        </div>

    </div>
</section>
