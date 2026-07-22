@extends('frontend.layouts.app')

@section(
    'title',
    'Meridian One — Nile-front Branded Residences by Business Bay Developments'
)

@section(
    'meta_description',
    'Meridian One brings Emirati hospitality standards to the Nile: fully serviced branded residences in Cairo by Business Bay Developments.'
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
