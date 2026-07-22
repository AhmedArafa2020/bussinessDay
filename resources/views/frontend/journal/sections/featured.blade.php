<article class="post-feature rv rv-d1">
    <a
        href="{{ route('journal.show', $post) }}"
        class="frame"
        aria-hidden="true"
        tabindex="-1"
    >
        <img
            src="{{ $post->featured_image
                ? asset('storage/' . $post->featured_image)
                : asset('frontend/assets/lobby-interior.jpg') }}"
            alt="{{ $post->title }}"
        >
    </a>

    <div>
        <div class="post-meta">
            <span class="cat">
                {{ $post->category }}
            </span>

            <span aria-hidden="true">·</span>

            <time datetime="{{ $post->published_at?->toDateString() }}">
                {{ $post->published_at?->format('d F Y') }}
            </time>

            <span aria-hidden="true">·</span>

            <span class="rt">
                {{ $post->reading_time }} min read
            </span>
        </div>

        <h2
            style="
                font-size: var(--fs-title);
                margin-top: 14px;
            "
        >
            <a href="{{ route('journal.show', $post) }}">
                {{ $post->title }}
            </a>
        </h2>

        <p
            style="
                margin-top: 14px;
                max-width: 34em;
            "
        >
            {{ $post->excerpt }}
        </p>

        <a
            class="link-gold"
            href="{{ route('journal.show', $post) }}"
            style="
                display: inline-block;
                margin-top: 26px;
            "
        >
            Read the article
        </a>
    </div>
</article>
