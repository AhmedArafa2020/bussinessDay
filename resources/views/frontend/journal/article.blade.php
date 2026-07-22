@extends('frontend.journal.layouts.app')

@section(
    'title',
    ($post->meta_title ?: $post->title) . ' — The Journal'
)

@section(
    'meta_description',
    $post->meta_description ?: $post->excerpt
)

@section('og_type', 'article')

@section(
    'og_title',
    $post->meta_title ?: $post->title
)

@section(
    'og_description',
    $post->meta_description ?: $post->excerpt
)

@section(
    'og_image',
    $post->featured_image
        ? asset('storage/' . $post->featured_image)
        : asset('frontend/assets/lobby-interior.jpg')
)

@section('content')
    <section class="article-hero">
        <img
            src="{{ $post->featured_image
                ? asset('storage/' . $post->featured_image)
                : asset('frontend/assets/lobby-interior.jpg') }}"
            alt="{{ $post->title }}"
            fetchpriority="high"
        >

        <div class="wrap">
            <nav
                class="crumbs"
                aria-label="Breadcrumb"
            >
                <a href="{{ route('home') }}">
                    Meridian One
                </a>

                <span aria-hidden="true">
                    /
                </span>

                <a href="{{ route('journal.index') }}">
                    Journal
                </a>

                <span aria-hidden="true">
                    /
                </span>

                <span aria-current="page">
                    {{ $post->category }}
                </span>
            </nav>

            <h1
                class="rv in"
                style="
                    font-size: var(--fs-disp);
                    max-width: 15em;
                    margin-top: 22px;
                "
            >
                {{ $post->title }}
            </h1>

            <div
                class="post-meta"
                style="margin-top: 20px"
            >
                <span class="cat">
                    {{ $post->category }}
                </span>

                <span aria-hidden="true">
                    ·
                </span>

                <time
                    datetime="{{ $post->published_at?->toDateString() }}"
                >
                    {{ $post->published_at?->format('d F Y') }}
                </time>

                <span aria-hidden="true">
                    ·
                </span>

                <span class="rt">
                    {{ $post->reading_time }} min read
                </span>

                <span aria-hidden="true">
                    ·
                </span>

                <span style="color: var(--stone)">
                    By {{ $post->author }}
                </span>
            </div>
        </div>
    </section>

    @include(
        'frontend.journal.sections.article-body',
        ['post' => $post]
    )
@endsection
