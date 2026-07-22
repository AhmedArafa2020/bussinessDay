<section
    class="section"
    aria-labelledby="jr-title"
>
    <div class="wrap">

        <div
            class="sec-head rv"
            style="
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                max-width: none;
                gap: 24px;
                flex-wrap: wrap;
            "
        >
            <div>
                <p class="eyebrow">
                    The journal
                </p>

                <h2
                    id="jr-title"
                    style="margin-top: 20px"
                >
                    Perspective on building what lasts.
                </h2>
            </div>

            <a
                class="link-gold"
                href="{{ route('journal.index') }}"
            >
                Read the journal
            </a>
        </div>

        @if ($latestPosts->isNotEmpty())
            <div class="post-list">

                @foreach ($latestPosts as $post)
                    <article
                        class="post-card rv {{ match ($loop->index) {
                            1 => 'rv-d1',
                            2 => 'rv-d2',
                            default => '',
                        } }}"
                    >
                        <a href="{{ route('journal.show', $post) }}">
                            <div class="frame">
                                <img
                                    src="{{ $post->featured_image
                                        ? asset('storage/' . $post->featured_image)
                                        : asset('frontend/assets/lobby-interior.jpg') }}"
                                    alt="{{ $post->title }}"
                                    loading="lazy"
                                >
                            </div>

                            <div class="post-meta">
                                <span class="cat">
                                    {{ $post->category }}
                                </span>

                                <span aria-hidden="true">·</span>

                                <time
                                    datetime="{{ $post->published_at?->toDateString() }}"
                                >
                                    {{ $post->published_at?->format('F Y') }}
                                </time>

                                <span aria-hidden="true">·</span>

                                <span class="rt">
                                    {{ $post->reading_time }} min
                                </span>
                            </div>

                            <h3>
                                {{ $post->title }}
                            </h3>

                            <p>
                                {{ $post->excerpt }}
                            </p>
                        </a>
                    </article>
                @endforeach

            </div>
        @else
            <p
                class="small"
                style="
                    margin-top: 40px;
                    opacity: .75;
                "
            >
                No journal articles are currently available.
            </p>
        @endif

    </div>
</section>
