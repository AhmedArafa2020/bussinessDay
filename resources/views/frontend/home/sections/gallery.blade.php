@php
    $defaultGalleryImages = [
        [
            'image' => 'frontend/assets/cairo-nile-dusk.jpg',
            'alt' => 'Wide dusk view over the Nile through Cairo',
            'caption' => 'The river at dusk',
            'layout' => 'wide',
            'storage' => false,
        ],
        [
            'image' => 'frontend/assets/crescent-tower.jpg',
            'alt' => 'The crescent-crowned tower',
            'caption' => 'The crescent crown',
            'layout' => 'tall',
            'storage' => false,
        ],
        [
            'image' => 'frontend/assets/lobby-interior.jpg',
            'alt' => "Residents' lounge interior",
            'caption' => "Residents' lounge",
            'layout' => 'standard',
            'storage' => false,
        ],
        [
            'image' => 'frontend/assets/dubai-skyline.jpg',
            'alt' => 'Dubai skyline at golden hour',
            'caption' => 'The Dubai standard',
            'layout' => 'standard',
            'storage' => false,
        ],
        [
            'image' => 'frontend/assets/capital-towers.jpg',
            'alt' => "Cairo's new district towers",
            'caption' => "The capital's new axis",
            'layout' => 'wide',
            'storage' => false,
        ],
    ];

    $galleryImages = filled($homeGallery?->images)
        ? collect($homeGallery->images)
            ->filter(
                fn ($image): bool =>
                    filled(data_get($image, 'image'))
            )
            ->map(function ($image): array {
                return [
                    'image' => data_get($image, 'image'),
                    'alt' => data_get($image, 'alt'),
                    'caption' => data_get($image, 'caption'),
                    'layout' => data_get($image, 'layout', 'standard'),
                    'storage' => true,
                ];
            })
            ->values()
            ->all()
        : $defaultGalleryImages;
@endphp

<section
    class="section light"
    id="gallery"
    aria-labelledby="gal-title"
>
    <div class="wrap">

        <div class="sec-head rv">
            <p class="eyebrow">
                {{ $homeGallery?->eyebrow
                    ?? 'The visual record' }}
            </p>

            <h2 id="gal-title">
                {{ $homeGallery?->title
                    ?? 'Seen before it is said.' }}
            </h2>
        </div>

        @if (count($galleryImages))
            <div class="gallery dynamic-gallery rv rv-d1">

                @foreach ($galleryImages as $image)
                    @php
                        $imageLayout = in_array(
                            $image['layout'],
                            ['standard', 'wide', 'tall'],
                            true
                        )
                            ? $image['layout']
                            : 'standard';

                        $imageUrl = $image['storage']
                            ? asset(
                                'storage/' . ltrim(
                                    $image['image'],
                                    '/'
                                )
                            )
                            : asset($image['image']);
                    @endphp

                    <figure
                        class="gallery-item gallery-{{ $imageLayout }}"
                    >
                        <img
                            src="{{ $imageUrl }}"
                            data-full="{{ $imageUrl }}"
                            alt="{{ $image['alt']
                                ?: 'Meridian One gallery image' }}"
                            loading="lazy"
                        >

                        @if (filled($image['caption']))
                            <figcaption>
                                {{ $image['caption'] }}
                            </figcaption>
                        @endif
                    </figure>
                @endforeach

            </div>
        @endif

        @if (filled($homeGallery?->description) || ! $homeGallery)
            <p
                class="small rv rv-d2"
                style="margin-top:26px;opacity:.75"
            >
                {{ $homeGallery?->description
                    ?? 'Project renders, model apartment photography, and the district masterplan will be added to this record as each is released.' }}
            </p>
        @endif

    </div>
</section>
