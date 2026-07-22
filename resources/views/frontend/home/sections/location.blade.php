@php
    $locationImage = filled($homeLocation?->image)
        ? asset('storage/' . $homeLocation->image)
        : asset('frontend/assets/cairo-nile-dusk.jpg');

    $nearbyLocations = [
        [
            'name' => $homeLocation?->location_one_name
                ?? 'New financial district',

            'time' => $homeLocation?->location_one_time
                ?? '7 min',
        ],
        [
            'name' => $homeLocation?->location_two_name
                ?? "Cairo Int'l Airport",

            'time' => $homeLocation?->location_two_time
                ?? '28 min',
        ],
        [
            'name' => $homeLocation?->location_three_name
                ?? 'Protected Nile frontage',

            'time' => $homeLocation?->location_three_time
                ?? '180°',
        ],
        [
            'name' => $homeLocation?->location_four_name,
            'time' => $homeLocation?->location_four_time,
        ],
    ];
@endphp

<section
    class="section"
    id="location"
    aria-labelledby="loc-title"
>
    <div class="wrap duo flip">

        <div class="duo-copy rv">
            <p class="eyebrow">
                {{ $homeLocation?->eyebrow ?? 'The setting' }}
            </p>

            <h2 id="loc-title">
                {{ $homeLocation?->title
                    ?? 'The Nile in front. The new capital behind.' }}

                @if (filled($homeLocation?->highlighted_title))
                    <em
                        class="disp-em"
                        style="color: var(--crimson)"
                    >
                        {{ $homeLocation->highlighted_title }}
                    </em>
                @endif
            </h2>

            <p class="lede">
                {{ $homeLocation?->description
                    ?? "Meridian One stands on the corniche where old Cairo's river meets the city's new axis of growth — minutes from the financial district, the airport road, and the museums that anchor the capital's next century." }}
            </p>

            <div class="stat-row">
                @foreach ($nearbyLocations as $location)
                    @if (
                        filled($location['name'])
                        || filled($location['time'])
                    )
                        <div>
                            <strong>
                                {{ $location['time'] }}
                            </strong>

                            <span>
                                {{ $location['name'] }}
                            </span>
                        </div>
                    @endif
                @endforeach
            </div>

            <a class="link-gold" href="#enquire">
                Request the location dossier
            </a>
        </div>

        <figure class="duo-media rv rv-d1">
            <div class="frame">
                <img
                    src="{{ $locationImage }}"
                    alt="{{ $homeLocation?->image_alt
                        ?? 'The Nile curving through Cairo at dusk with bridges and river traffic' }}"
                    loading="lazy"
                >
            </div>

            @if (
                filled($homeLocation?->image_caption)
                || ! $homeLocation
            )
                <figcaption>
                    {{ $homeLocation?->image_caption
                        ?? "The corniche at dusk — the project's front garden" }}
                </figcaption>
            @endif
        </figure>

    </div>
</section>
