@extends('frontend.layouts.main')

@section('title', ($activeItem ? $activeItem['name'] . ' — ' : '') . 'Food Gallery - Khopcha Cafe')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/food_gallery/food_gallery.css') }}">
@endpush

@php
    // Display labels for each category
    $categoryLabels = [
        'momos'      => 'Momos',
        'burgers'    => 'Burgers',
        'sandwiches' => 'Sandwiches',
        'sides'      => 'Sides',
    ];

    // Count items per category
    $categoryCounts = [];
    foreach ($allItems as $item) {
        $cat = $item['category'];
        $categoryCounts[$cat] = ($categoryCounts[$cat] ?? 0) + 1;
    }

    // Items to show in the "You Might Also Like" row (everything except the active item)
    $relatedItems = $activeItem
        ? array_filter($allItems, fn($i) => $i['slug'] !== $activeItem['slug'])
        : [];

    // All items in the same category as the active item (passed from route, but safe fallback)
    $categoryItems = $categoryItems ?? ($activeItem
        ? array_values(array_filter($allItems, fn($i) => $i['category'] === $activeItem['category']))
        : []);
@endphp

@section('content')

    @include('frontend.food_gallery.sections.hero')

    @include('frontend.food_gallery.sections.spotlight')

    @include('frontend.food_gallery.sections.category_items')

    @include('frontend.food_gallery.sections.filters')

    {{-- @include('frontend.food_gallery.sections.grid') --}}

    @include('frontend.food_gallery.sections.related')

    @include('frontend.food_gallery.sections.insta')

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Animate hero background (gentle zoom-out on load)
        const bg = document.getElementById('heroBg');
        if (bg) setTimeout(() => bg.classList.add('loaded'), 100);

        // Smooth-scroll to the spotlight card when an item is active
        @if($activeItem)
        const spotlight = document.querySelector('.fgp-spotlight');
        if (spotlight) {
            setTimeout(() => spotlight.scrollIntoView({ behavior: 'smooth', block: 'start' }), 400);
        }
        @endif
    });
</script>
@endpush
