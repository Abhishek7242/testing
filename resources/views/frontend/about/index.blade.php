@extends('frontend.layouts.main')

@section('title', 'About Us — The Urban Thopcha Rohru')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/about/about.css') }}">
@endpush

@section('content')
    @include('frontend.about.sections.hero')
    @include('frontend.about.sections.story')
    @include('frontend.about.sections.values')
    @include('frontend.about.sections.stats')
    @include('frontend.about.sections.team')
    @include('frontend.about.sections.cta')
@endsection
