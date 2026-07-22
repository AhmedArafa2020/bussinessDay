@php
    $lifestyleImage = filled($homeLifestyle?->image)
        ? asset('storage/' . $homeLifestyle->image)
        : asset('frontend/assets/lobby-interior.jpg');

    $lifestyleItems = [
        [
            'title' => $homeLifestyle?->item_one_title
                ?? 'The River Terrace',

            'description' => $homeLifestyle?->item_one_description
                ?? 'A 42-metre pool set along the Nile edge, with cabana service from the podium kitchen.',

            'label' => $homeLifestyle?->item_one_label
                ?? 'Level 05',
        ],
        [
            'title' => $homeLifestyle?->item_two_title
                ?? 'The Meridian Club',

            'description' => $homeLifestyle?->item_two_description
                ?? "Residents' lounge, library, and two private dining rooms with dedicated staff.",

            'label' => $homeLifestyle?->item_two_label
                ?? 'Level 06',
        ],
        [
            'title' => $homeLifestyle?->item_three_title
                ?? 'Spa & Thermal Suite',

            'description' => $homeLifestyle?->item_three_description
                ?? 'Hammam, sauna, treatment rooms, and a fitness floor overlooking the water.',

            'label' => $homeLifestyle?->item_three_label
                ?? 'Level 07',
        ],
    ];
@endphp

<section
    class="section"
    id="lifestyle"
    aria-labelledby="lifestyle-title"
>
    <div class="wrap">

        <div class="sec-head rv">
            <p class="eyebrow">
                {{ $homeLifestyle?->eyebrow
                    ?? 'The life of the house' }}
            </p>

            <h2 id="lifestyle-title">
                {{ $homeLifestyle?->title
                    ?? 'Three floors that belong to the residents.' }}
            </h2>

            @if (filled($homeLifestyle?->lead_text) || ! $homeLifestyle)
                <p class="lede">
                    {{ $homeLifestyle?->lead_text
                        ?? 'The podium is not an amenity list. It is a private hotel floor plan: a river-facing pool terrace, a spa and thermal suite, a screening room, and dining rooms that can be reserved as your own.' }}
                </p>
            @endif
        </div>

        <div class="duo flip">

            <div class="duo-copy rv">
                <div class="ledger">
                    @foreach ($lifestyleItems as $item)
                        @if (
                            filled($item['title'])
                            || filled($item['description'])
                            || filled($item['label'])
                        )
                            <div class="ledger-row">
                                <h3>
                                    {{ $item['title'] }}
                                </h3>

                                <p>
                                    {{ $item['description'] }}
                                </p>

                                <span class="ledger-num">
                                    {{ $item['label'] }}
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <figure class="duo-media rv rv-d1">
                <div class="frame">
                    <img
                        src="{{ $lifestyleImage }}"
                        alt="{{ $homeLifestyle?->image_alt
                            ?? 'Warmly lit hotel lounge with layered seating, brass details and stone finishes' }}"
                        loading="lazy"
                    >
                </div>

                @if (
                    filled($homeLifestyle?->image_caption)
                    || ! $homeLifestyle
                )
                    <figcaption>
                        {{ $homeLifestyle?->image_caption
                            ?? "The residents' lounge — Onyx & Brass palette" }}
                    </figcaption>
                @endif
            </figure>

        </div>

    </div>
</section>
