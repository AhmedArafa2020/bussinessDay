@extends('frontend.journal.layouts.app')

@section(
    'title',
    'The Journal — Business Bay Developments'
)

@section(
    'meta_description',
    'Perspective on building what lasts: market readings, design notes, and investment insight from Business Bay Developments.'
)

@section('content')
    <section
        class="section"
        style="padding-top: calc(var(--pad-sec) + 40px)"
        aria-labelledby="jr-title"
    >
        <div class="wrap">

            <div class="sec-head rv">
                <p class="eyebrow">
                    The journal
                </p>

                <h1
                    id="jr-title"
                    style="
                        font-size: var(--fs-disp);
                        margin-top: 20px;
                    "
                >
                    Perspective on building what
                    <em class="disp-em">
                        lasts.
                    </em>
                </h1>

                <p
                    class="lede"
                    style="margin-top: 18px"
                >
                    Market readings, design notes, and investment
                    insight from an Emirati–Egyptian house.
                    Published when there is something worth saying.
                </p>
            </div>

            @if ($featuredPost)
                @include(
                    'frontend.journal.sections.featured',
                    ['post' => $featuredPost]
                )
            @else
                <p class="small">
                    No featured article is currently available.
                </p>
            @endif
            @include(
                'frontend.journal.sections.posts',
                ['posts' => $posts]
            )
        </div>
    </section>
@endsection
