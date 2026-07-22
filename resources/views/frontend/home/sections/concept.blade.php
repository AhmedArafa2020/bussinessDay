@php
    $conceptItems = [
        [
            'title' => $homeConcept?->item_one_title
                ?? 'Arrival & concierge',

            'description' => $homeConcept?->item_one_description
                ?? 'A staffed arrival court and a concierge desk that answers in under three minutes, day and night — trained and audited by our Dubai hospitality partners.',

            'label' => $homeConcept?->item_one_label
                ?? 'Daily',
        ],
        [
            'title' => $homeConcept?->item_two_title
                ?? 'Housekeeping & upkeep',

            'description' => $homeConcept?->item_two_description
                ?? 'Scheduled housekeeping, engineering, and preventative maintenance are included in the service charge, not sold back to you as extras.',

            'label' => $homeConcept?->item_two_label
                ?? 'Included',
        ],
        [
            'title' => $homeConcept?->item_three_title
                ?? 'Owner absence program',

            'description' => $homeConcept?->item_three_description
                ?? 'Travelling or resident abroad? Your home is aired, inspected, and reported on monthly — and can join the managed leasing pool at your instruction.',

            'label' => $homeConcept?->item_three_label
                ?? 'On request',
        ],
        [
            'title' => $homeConcept?->item_four_title
                ?? 'Table & club privileges',

            'description' => $homeConcept?->item_four_description
                ?? "Signing privileges across the podium restaurants, the residents' lounge, and reciprocal access at partner properties in Dubai.",

            'label' => $homeConcept?->item_four_label
                ?? 'Members',
        ],
    ];
@endphp

<section
    class="section light"
    aria-labelledby="concept-title"
>
    <div class="wrap">

        <div class="sec-head rv">
            <p class="eyebrow">
                {{ $homeConcept?->eyebrow ?? 'The concept' }}
            </p>

            <h2 id="concept-title">
                {{ $homeConcept?->title
                    ?? 'Not an address. A way of being' }}

                <em
                    class="disp-em"
                    style="color: var(--crimson)"
                >
                    {{ $homeConcept?->highlighted_title
                        ?? 'looked after.' }}
                </em>
            </h2>

            <p class="lede">
                {{ $homeConcept?->description
                    ?? 'Meridian One is conceived as a private hotel that happens to be yours. Residences are handed over finished, furnished to order, and enrolled in a service program that never lapses.' }}
            </p>
        </div>

        <div class="ledger rv rv-d1">

            @foreach ($conceptItems as $item)
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
</section>
