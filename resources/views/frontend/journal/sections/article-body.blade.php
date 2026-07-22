<article class="section">
    <div class="wrap">
        <div class="article-body">

            @if (filled($post->content))
                {!! $post->content !!}
            @else
                <p>
                    Article content is currently unavailable.
                </p>
            @endif

            <aside class="article-cta">
                <div>
                    <h3>
                        Read the service charter itself
                    </h3>

                    <p>
                        The Meridian One private brief includes the
                        full operator mandate and charge schedule.
                    </p>
                </div>

                <a
                    class="btn btn-crimson btn-arrow"
                    href="{{ route('home') }}#enquire"
                >
                    Request the brief
                </a>
            </aside>

            <p
                class="small"
                style="opacity: .7"
            >
                The Journal is published by Business Bay
                Developments for general information. It is not
                investment advice; speak to your own advisors
                before purchasing.
            </p>

        </div>
    </div>
</article>
