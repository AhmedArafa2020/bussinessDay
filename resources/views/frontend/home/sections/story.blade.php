@php
    $storyImage = filled($homeStory?->image)
        ? asset('storage/' . $homeStory->image)
        : asset('frontend/assets/dubai-skyline.jpg');
@endphp

<section class="section" id="story">
    <div class="wrap duo">

        <figure class="duo-media rv">
            <div class="frame">
                <img
                    src="{{ $storyImage }}"
                    alt="{{ $homeStory?->image_alt
                        ?? 'Dubai skyline at golden hour with Burj Khalifa rising above the haze' }}"
                    loading="lazy"
                >
            </div>

            @if (
                filled($homeStory?->image_caption)
                || ! $homeStory
            )
                <figcaption>
                    {{ $homeStory?->image_caption
                        ?? 'Dubai — where the standard was set' }}
                </figcaption>
            @endif
        </figure>

        <div class="duo-copy rv rv-d1">
            <p class="eyebrow">
                {{ $homeStory?->eyebrow
                    ?? 'The house behind it' }}
            </p>

            <h2>
                {{ $homeStory?->title
                    ?? 'From the heart of Dubai to the heart of Egypt.' }}
            </h2>

            <p class="lede">
                {{ $homeStory?->lead_text
                    ?? "Business Bay Developments was formed by the partners behind some of Dubai's most exacting hospitality projects. Meridian One is their answer to a simple question: why should a residence be run less carefully than a hotel?" }}
            </p>

            <p>
                {{ $homeStory?->description
                    ?? 'Every decision — from the stone in the lobby to the response time of the concierge — is written into one operating standard, kept by the same team in both cities.' }}
            </p>

            <div class="stat-row">
                @if (
                    filled($homeStory?->stat_one_value)
                    || filled($homeStory?->stat_one_label)
                    || ! $homeStory
                )
                    <div>
                        <strong>
                            {{ $homeStory?->stat_one_value ?? '19 yrs' }}
                        </strong>

                        <span>
                            {{ $homeStory?->stat_one_label
                                ?? 'Delivering in the Gulf' }}
                        </span>
                    </div>
                @endif

                @if (
                    filled($homeStory?->stat_two_value)
                    || filled($homeStory?->stat_two_label)
                    || ! $homeStory
                )
                    <div>
                        <strong>
                            {{ $homeStory?->stat_two_value ?? 'EGP 9.4B' }}
                        </strong>

                        <span>
                            {{ $homeStory?->stat_two_label
                                ?? 'Committed to Egypt' }}
                        </span>
                    </div>
                @endif

                @if (
                    filled($homeStory?->stat_three_value)
                    || filled($homeStory?->stat_three_label)
                    || ! $homeStory
                )
                    <div>
                        <strong>
                            {{ $homeStory?->stat_three_value ?? '1' }}
                        </strong>

                        <span>
                            {{ $homeStory?->stat_three_label
                                ?? 'Standard, two capitals' }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>
