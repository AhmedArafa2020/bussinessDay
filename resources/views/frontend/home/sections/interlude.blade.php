@php
    $interludeImage = filled($homeInterlude?->background_image)
        ? asset('storage/' . $homeInterlude->background_image)
        : asset('frontend/assets/capital-towers.jpg');

    $interludeQuote = $homeInterlude?->quote
        ?? '"Luxury is not the marble. It is the certainty that someone is keeping the standard while you live your life."';

    $highlightedText = $homeInterlude?->highlighted_text
        ?? 'keeping the standard';

    $highlightPosition = filled($highlightedText)
        ? strripos($interludeQuote, $highlightedText)
        : false;

    if ($highlightPosition !== false) {
        $quoteBefore = substr(
            $interludeQuote,
            0,
            $highlightPosition
        );

        $quoteAfter = substr(
            $interludeQuote,
            $highlightPosition + strlen($highlightedText)
        );
    } else {
        $quoteBefore = $interludeQuote;
        $quoteAfter = '';
    }
@endphp

<section
    class="interlude"
    aria-label="Brand statement"
>
    <img
        src="{{ $interludeImage }}"
        alt="{{ $homeInterlude?->image_alt
            ?? 'New business district towers in Cairo rising under construction against a clear sky' }}"
        loading="lazy"
        data-parallax
    >

    <blockquote>
        <p class="rv">
            {{ $quoteBefore }}

            @if ($highlightPosition !== false)
                <em class="disp-em">
                    {{ $highlightedText }}
                </em>

                {{ $quoteAfter }}
            @endif
        </p>

        @if (filled($homeInterlude?->citation) || ! $homeInterlude)
            <cite class="rv rv-d1">
                {{ $homeInterlude?->citation
                    ?? 'Founding charter · Business Bay Developments' }}
            </cite>
        @endif
    </blockquote>
</section>
