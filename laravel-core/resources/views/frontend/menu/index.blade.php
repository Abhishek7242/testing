@extends('frontend.layouts.main')

@section('title', 'Our Menu — The Urban Thopcha Rohru')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/menu/menu.css') }}">
@endpush

@section('content')
    @include('frontend.menu.sections.hero')
    @include('frontend.menu.sections.categories')
    @include('frontend.menu.sections.items')
    @include('frontend.menu.sections.offers')
@endsection
