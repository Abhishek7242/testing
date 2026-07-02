@extends('frontend.layouts.main')

@section('title', 'The Urban Thopcha Rohru — Cafe in Himachal Pradesh')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/quickpick.css') }}">
@endpush

@section('content')
    @include('frontend.home.hero')
    @include('frontend.home.quickpick')
    @include('frontend.home.gallery')
    @include('frontend.home.features')
    @include('frontend.home.about')
    @include('frontend.home.offers')
    @include('frontend.home.menu')
    @include('frontend.home.testimonials')
    @include('frontend.home.creator')
    @include('frontend.home.contact')
@endsection
