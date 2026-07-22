@if ($posts->isNotEmpty())
    <div class="post-list">

        @foreach ($posts as $post)
            <article
                class="post-card rv {{ match ($loop->index % 3) {
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
                                : asset('frontend/assets/capital-towers.jpg') }}"
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
            margin-top: 50px;
            opacity: .75;
        "
    >
        No additional articles are currently available.
    </p>
@endif
