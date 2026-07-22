@php
    $campaignBenefits = [
        [
            'title' => $campaignBenefit?->item_one_title
                ?? 'Founding-release pricing',

            'description' => $campaignBenefit?->item_one_description
                ?? 'First-tranche pricing with construction-linked payments — repriced upward at each public release.',

            'label' => $campaignBenefit?->item_one_label
                ?? 'Tranche 1',
        ],
        [
            'title' => $campaignBenefit?->item_two_title
                ?? 'Fully serviced from day one',

            'description' => $campaignBenefit?->item_two_description
                ?? 'Concierge, housekeeping, and maintenance under a 15-year operator mandate. Delivered finished.',

            'label' => $campaignBenefit?->item_two_label
                ?? 'Included',
        ],
        [
            'title' => $campaignBenefit?->item_three_title
                ?? 'First choice of Nile frontage',

            'description' => $campaignBenefit?->item_three_description
                ?? 'Founding buyers select river-facing stacks before allocation opens to the waitlist.',

            'label' => $campaignBenefit?->item_three_label
                ?? 'Priority',
        ],
        [
            'title' => $campaignBenefit?->item_four_title
                ?? 'Optional managed leasing',

            'description' => $campaignBenefit?->item_four_description
                ?? "Enrol your residence in the operator's leasing pool with quarterly statements — or don't. Your call.",

            'label' => $campaignBenefit?->item_four_label
                ?? 'Optional',
        ],
    ];
@endphp

<section
    class="section light"
    aria-labelledby="campaign-benefits-title"
>
    <div class="wrap">

        <div class="sec-head rv">
            <p class="eyebrow">
                {{ $campaignBenefit?->eyebrow
                    ?? 'Why buyers move early' }}
            </p>

            <h2 id="campaign-benefits-title">
                {{ $campaignBenefit?->title
                    ?? 'What the founding release includes.' }}
            </h2>
        </div>

        <div class="ledger rv rv-d1">
            @foreach ($campaignBenefits as $benefit)
                @if (
                    filled($benefit['title'])
                    || filled($benefit['description'])
                    || filled($benefit['label'])
                )
                    <div class="ledger-row">
                        <h3>
                            {{ $benefit['title'] }}
                        </h3>

                        <p>
                            {{ $benefit['description'] }}
                        </p>

                        <span class="ledger-num">
                            {{ $benefit['label'] }}
                        </span>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
</section>
