@php
    $residenceCollections = [
        [
            'name' => $homeResidence?->collection_one_name
                ?? 'River Suites',

            'layout' => $homeResidence?->collection_one_layout
                ?? '1 bedroom + study',

            'area' => $homeResidence?->collection_one_area
                ?? '92 – 118 m²',

            'outlook' => $homeResidence?->collection_one_outlook
                ?? 'Nile, north',

            'availability' => $homeResidence?->collection_one_availability
                ?? 'Founding release',

            'highlight' => false,
        ],
        [
            'name' => $homeResidence?->collection_two_name
                ?? 'Corniche Residences',

            'layout' => $homeResidence?->collection_two_layout
                ?? '2 – 3 bedrooms',

            'area' => $homeResidence?->collection_two_area
                ?? '146 – 224 m²',

            'outlook' => $homeResidence?->collection_two_outlook
                ?? 'Full river frontage',

            'availability' => $homeResidence?->collection_two_availability
                ?? 'Founding release',

            'highlight' => false,
        ],
        [
            'name' => $homeResidence?->collection_three_name
                ?? 'Sky Residences',

            'layout' => $homeResidence?->collection_three_layout
                ?? '3 – 4 bedrooms, floors 36+',

            'area' => $homeResidence?->collection_three_area
                ?? '238 – 310 m²',

            'outlook' => $homeResidence?->collection_three_outlook
                ?? 'River & citadel',

            'availability' => $homeResidence?->collection_three_availability
                ?? 'Limited',

            'highlight' => false,
        ],
        [
            'name' => $homeResidence?->collection_four_name
                ?? 'The Crescent Penthouses',

            'layout' => $homeResidence?->collection_four_layout
                ?? 'Full & half floor',

            'area' => $homeResidence?->collection_four_area
                ?? '420 – 780 m²',

            'outlook' => $homeResidence?->collection_four_outlook
                ?? '360° crown level',

            'availability' => $homeResidence?->collection_four_availability
                ?? 'By invitation',

            'highlight' => true,
        ],
    ];
@endphp

<section
    class="section light"
    id="residences"
    aria-labelledby="res-title"
>
    <div class="wrap">

        <div class="sec-head rv">
            <p class="eyebrow">
                {{ $homeResidence?->eyebrow
                    ?? 'The residences' }}
            </p>

            <h2 id="res-title">
                {{ $homeResidence?->title
                    ?? 'Two hundred and twelve homes. Four ways to live here.' }}
            </h2>

            @if (filled($homeResidence?->lead_text) || ! $homeResidence)
                <p class="lede">
                    {{ $homeResidence?->lead_text
                        ?? 'Every plan was drawn around the water: principal rooms face the Nile, service spaces face the city. Handover is fully finished; furnishing is optional and made to order.' }}
                </p>
            @endif
        </div>

        <div class="units rv rv-d1">
            <table>
                @if (
                    filled($homeResidence?->table_caption)
                    || ! $homeResidence
                )
                    <caption
                        class="small"
                        style="
                            caption-side: bottom;
                            text-align: left;
                            padding-top: 18px;
                            opacity: .75;
                        "
                    >
                        {{ $homeResidence?->table_caption
                            ?? 'Areas are indicative pending final survey. Pricing is released in the private brief only.' }}
                    </caption>
                @endif

                <thead>
                <tr>
                    <th scope="col">Collection</th>
                    <th scope="col">Layout</th>
                    <th scope="col">Internal area</th>
                    <th scope="col">Outlook</th>
                    <th scope="col">Availability</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($residenceCollections as $collection)
                    @if (
                        filled($collection['name'])
                        || filled($collection['layout'])
                        || filled($collection['area'])
                        || filled($collection['outlook'])
                        || filled($collection['availability'])
                    )
                        <tr>
                            <td>
                                {{ $collection['name'] }}
                            </td>

                            <td>
                                {{ $collection['layout'] }}
                            </td>

                            <td>
                                {{ $collection['area'] }}
                            </td>

                            <td>
                                {{ $collection['outlook'] }}
                            </td>

                            <td>
                                @if ($collection['highlight'])
                                    <span class="tag-soon">
                                            {{ $collection['availability'] }}
                                        </span>
                                @else
                                    {{ $collection['availability'] }}
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
