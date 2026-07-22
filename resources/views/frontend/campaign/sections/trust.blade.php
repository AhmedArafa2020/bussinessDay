@php
    $trustImage = filled($campaignTrust?->image)
        ? asset('storage/' . $campaignTrust->image)
        : asset('frontend/assets/dubai-skyline.jpg');

    $trustStats = [
        [
            'value' => $campaignTrust?->stat_one_value
                ?? '19 yrs',

            'label' => $campaignTrust?->stat_one_label
                ?? 'Delivering in the Gulf',
        ],
        [
            'value' => $campaignTrust?->stat_two_value
                ?? 'EGP 9.4B',

            'label' => $campaignTrust?->stat_two_label
                ?? 'Committed to Egypt',
        ],
        [
            'value' => $campaignTrust?->stat_three_value
                ?? '15 yrs',

            'label' => $campaignTrust?->stat_three_label
                ?? 'Operator mandate',
        ],
    ];
@endphp

<section
    class="section"
    aria-labelledby="campaign-trust-title"
>
    <div class="wrap duo">

        <figure class="duo-media rv">
            <div class="frame">
                <img
                    src="{{ $trustImage }}"
                    alt="{{ $campaignTrust?->image_alt
                        ?? 'Dubai skyline representing the company hospitality and operating experience' }}"
                    loading="lazy"
                >
            </div>

            @if (
                filled($campaignTrust?->image_caption)
                || ! $campaignTrust
            )
                <figcaption>
                    {{ $campaignTrust?->image_caption
                        ?? 'Dubai — where the operating standard was established' }}
                </figcaption>
            @endif
        </figure>

        <div class="duo-copy rv rv-d1">
            <p class="eyebrow">
                {{ $campaignTrust?->eyebrow
                    ?? 'The people behind it' }}
            </p>

            <h2 id="campaign-trust-title">
                {{ $campaignTrust?->title
                    ?? 'A Dubai operating standard, committed to Cairo.' }}
            </h2>

            @if (
                filled($campaignTrust?->lead_text)
                || ! $campaignTrust
            )
                <p class="lede">
                    {{ $campaignTrust?->lead_text
                        ?? 'Business Bay Developments brings nearly two decades of Gulf hospitality and property experience to Meridian One, backed by a long-term commitment to operating and protecting the standard after handover.' }}
                </p>
            @endif

            <div class="stat-row">
                @foreach ($trustStats as $stat)
                    @if (
                        filled($stat['value'])
                        || filled($stat['label'])
                    )
                        <div>
                            <strong>
                                {{ $stat['value'] }}
                            </strong>

                            <span>
                                {{ $stat['label'] }}
                            </span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</section>
