@php
    $investmentStats = [
        [
            'value' => $homeInvestment?->stat_one_value ?? '6–8%',
            'label' => $homeInvestment?->stat_one_label
                ?? 'Target net rental yield',
        ],
        [
            'value' => $homeInvestment?->stat_two_value ?? '60%',
            'label' => $homeInvestment?->stat_two_label
                ?? 'Managed leasing pool',
        ],
        [
            'value' => $homeInvestment?->stat_three_value ?? 'Q4 2029',
            'label' => $homeInvestment?->stat_three_label
                ?? 'Target completion',
        ],
    ];

    $investmentFaqs = [
        [
            'question' => $homeInvestment?->faq_one_question
                ?? 'Can owners place their residence into a managed rental program?',

            'answer' => $homeInvestment?->faq_one_answer
                ?? 'Yes. Owners may join the managed leasing pool and instruct the operating team to market, service, and report on their residence during approved periods of absence.',
        ],
        [
            'question' => $homeInvestment?->faq_two_question
                ?? 'Are the residences delivered fully finished?',

            'answer' => $homeInvestment?->faq_two_answer
                ?? 'Yes. Every residence is delivered fully finished, with optional furnishing packages developed to match the approved interior palettes.',
        ],
        [
            'question' => $homeInvestment?->faq_three_question
                ?? 'How is the building managed after handover?',

            'answer' => $homeInvestment?->faq_three_answer
                ?? 'The building is operated through a permanent hospitality and property-management structure covering concierge, housekeeping, engineering, preventative maintenance, and owner reporting.',
        ],
    ];

    $investmentButtonUrl = filled($homeInvestment?->button_url)
        ? $homeInvestment->button_url
        : '#enquire';
@endphp

<section
    class="section"
    id="investment"
    aria-labelledby="investment-title"
>
    <div class="wrap">

        <div class="duo">

            <div class="duo-copy rv">
                <p class="eyebrow">
                    {{ $homeInvestment?->eyebrow
                        ?? 'The investment case' }}
                </p>

                <h2 id="investment-title">
                    {{ $homeInvestment?->title
                        ?? 'An asset designed to stay relevant.' }}
                </h2>

                @if (
                    filled($homeInvestment?->lead_text)
                    || ! $homeInvestment
                )
                    <p class="lede">
                        {{ $homeInvestment?->lead_text
                            ?? 'Meridian One combines a scarce waterfront position with hotel-level management, creating a residence designed for both long-term ownership and managed income.' }}
                    </p>
                @endif

                @if (
                    filled($homeInvestment?->description)
                    || ! $homeInvestment
                )
                    <p>
                        {{ $homeInvestment?->description
                            ?? 'Owners may place their residence into the managed leasing pool while away, supported by professional housekeeping, maintenance, guest services, and regular reporting.' }}
                    </p>
                @endif

                <div class="stat-row">
                    @foreach ($investmentStats as $stat)
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

                @if (
                    filled($homeInvestment?->button_text)
                    || ! $homeInvestment
                )
                    <a
                        class="link-gold"
                        href="{{ $investmentButtonUrl }}"
                    >
                        {{ $homeInvestment?->button_text
                            ?? 'Request the investment brief' }}
                    </a>
                @endif
            </div>

            <div class="faq rv rv-d1">
                @foreach ($investmentFaqs as $faq)
                    @if (
                        filled($faq['question'])
                        || filled($faq['answer'])
                    )
                        <details>
                            <summary>
                                {{ $faq['question'] }}
                            </summary>

                            <div>
                                <p>
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        </details>
                    @endif
                @endforeach
            </div>

        </div>

    </div>
</section>
