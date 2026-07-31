@extends('frontend.layouts.app')

@section('meta_title', 'Business Bay Real Estate | Luxury Properties in Dubai')

@section(
    'meta_description',
    'Discover luxury apartments, villas, and investment opportunities in Business Bay and Dubai.'
)

@section(
    'meta_keywords',
    'Business Bay, Dubai real estate, apartments in Dubai, property investment'
)

@section('canonical_url', route('home'))

@section(
    'og_title',
    'Luxury Properties in Business Bay'
)

@section(
    'og_description',
    'Explore premium real estate and investment opportunities in Dubai.'
)

@section(
    'og_image',
    asset('frontend/images/home-social-share.jpg')
)

@section('content')
    <main id="main">

        @include('frontend.home.sections.hero')

        <div class="meridian">

            @include('frontend.home.sections.story')
            @include('frontend.home.sections.concept')
            @include('frontend.home.sections.interlude')
            @include('frontend.home.sections.location')
            @include('frontend.home.sections.architecture')
            @include('frontend.home.sections.lifestyle')
            @include('frontend.home.sections.residences')
            @include('frontend.home.sections.investment')
            @include('frontend.home.sections.gallery')
            @include('frontend.home.sections.journal')
            @include('frontend.home.sections.enquiry')

        </div>

    </main>
@endsection
