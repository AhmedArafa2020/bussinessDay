@php
    $defaultCampaignFaqs = [
        [
            'question' => 'What is included in the founding release?',
            'answer' => 'The founding release provides access to first-tranche pricing, priority residence selection, construction-linked payment terms, and the private project documentation before the wider public launch.',
        ],
        [
            'question' => 'Are the residences delivered fully finished?',
            'answer' => 'Yes. Residences are delivered fully finished. Optional furnishing packages are also available based on the approved Meridian One interior palettes.',
        ],
        [
            'question' => 'Can I place my residence in the managed leasing pool?',
            'answer' => 'Yes. Owners may choose to enrol their residence in the managed leasing program during approved periods of absence, with professional servicing and regular owner reporting.',
        ],
        [
            'question' => 'How do I receive pricing and floor plans?',
            'answer' => 'Complete the enquiry form and a project advisor will contact you directly with current availability, floor plans, payment schedules, and founding-release terms.',
        ],
    ];

    $campaignFaqQuestions = filled($campaignFaq?->questions)
        ? collect($campaignFaq->questions)
            ->filter(
                fn ($item): bool =>
                    filled(data_get($item, 'question'))
                    || filled(data_get($item, 'answer'))
            )
            ->map(function ($item): array {
                return [
                    'question' => data_get($item, 'question'),
                    'answer' => data_get($item, 'answer'),
                ];
            })
            ->values()
            ->all()
        : $defaultCampaignFaqs;
@endphp

<section
    class="section light"
    id="faq"
    aria-labelledby="campaign-faq-title"
>
    <div class="wrap">

        <div class="sec-head rv">
            <p class="eyebrow">
                {{ $campaignFaq?->eyebrow
                    ?? 'Questions before you enquire' }}
            </p>

            <h2 id="campaign-faq-title">
                {{ $campaignFaq?->title
                    ?? 'What founding buyers ask first.' }}
            </h2>

            @if (
                filled($campaignFaq?->description)
                || ! $campaignFaq
            )
                <p class="lede">
                    {{ $campaignFaq?->description
                        ?? 'A clear summary of the founding release, residence delivery, payment process, and long-term building operation.' }}
                </p>
            @endif
        </div>

        @if (count($campaignFaqQuestions))
            <div class="faq rv rv-d1">
                @foreach ($campaignFaqQuestions as $faq)
                    <details>
                        <summary>
                            {{ $faq['question'] }}
                        </summary>

                        @if (filled($faq['answer']))
                            <div>
                                <p>
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        @endif
                    </details>
                @endforeach
            </div>
        @endif

    </div>
</section>
