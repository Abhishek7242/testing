@extends('frontend.layouts.main')

@section('title', $query ? 'Search: ' . ucfirst($query) . ' — The Urban Thopcha' : 'Search — The Urban Thopcha')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endpush

@section('content')
<div class="sp-page">

    {{-- ═══════════════════════════
         HERO / SEARCH BAR
    ═══════════════════════════ --}}
    <div class="sp-hero">
        {{-- Decorative glow orbs --}}
        <div class="sp-hero-orb sp-hero-orb--1"></div>
        <div class="sp-hero-orb sp-hero-orb--2"></div>

        <div class="sp-hero-inner">

            {{-- Breadcrumb --}}
            <a href="{{ route('home') }}" class="sp-back">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"/>
                    <polyline points="12 5 5 12 12 19"/>
                </svg>
                Back to Home
            </a>

            {{-- Heading --}}
            <div class="sp-hero-label">Thopcha Menu</div>
            <h1 class="sp-hero-title">
                @if($query)
                    Results for <span class="sp-accent">"{{ ucfirst($query) }}"</span>
                @else
                    Search our <span class="sp-accent">Menu</span>
                @endif
            </h1>

            @if($query && count($results) > 0)
                <p class="sp-hero-sub">
                    Found <strong>{{ count($results) }}</strong> {{ Str::plural('item', count($results)) }} — here's what we have for you
                </p>
            @else
                <p class="sp-hero-sub">Type anything — momos, burgers, shakes &amp; more</p>
            @endif

            {{-- Search Bar --}}
            <form action="{{ route('search') }}" method="GET" class="sp-form" id="searchForm">
                <div class="sp-input-wrap">
                    <svg class="sp-input-icon" width="20" height="20" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input
                        type="text"
                        name="q"
                        id="searchInput"
                        class="sp-input"
                        placeholder="e.g. Momos, Burger, Shake..."
                        value="{{ $query }}"
                        autocomplete="off"
                        autofocus
                    >
                    @if($query)
                        <a href="{{ route('search') }}" class="sp-clear" title="Clear search" aria-label="Clear">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"/>
                                <line x1="6" y1="6" x2="18" y2="18"/>
                            </svg>
                        </a>
                    @endif
                </div>
                <button type="submit" class="sp-submit">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    Search
                </button>
            </form>

            {{-- Quick Category Chips --}}
            <div class="sp-chips-wrap">
                <span class="sp-chips-label">Popular:</span>
                <div class="sp-chips">
                    @foreach([
                        ['label' => 'Momos',        'emoji' => '🥟'],
                        ['label' => 'Kurkure Momos', 'emoji' => '🔥'],
                        ['label' => 'Burger',        'emoji' => '🍔'],
                        ['label' => 'Sandwich',      'emoji' => '🥪'],
                        ['label' => 'Noodles',       'emoji' => '🍜'],
                        ['label' => 'Fries',         'emoji' => '🍟'],
                        ['label' => 'Shake',         'emoji' => '🥤'],
                    ] as $chip)
                        <a href="{{ route('search', ['q' => $chip['label']]) }}"
                           class="sp-chip {{ strtolower($query ?? '') === strtolower($chip['label']) ? 'active' : '' }}">
                            <span class="sp-chip-emoji">{{ $chip['emoji'] }}</span>
                            {{ $chip['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    {{-- ═══════════════════════════
         RESULTS AREA
    ═══════════════════════════ --}}
    <div class="sp-results-wrap">

        {{-- ── No results state ── --}}
        @if($query && count($results) === 0)
            <div class="sp-empty">
                <div class="sp-empty-graphic">
                    <div class="sp-empty-circle">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.5"
                             stroke-linecap="round" stroke-linejoin="round"
                             style="color:rgba(245,158,11,0.5)">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                    </div>
                </div>
                <h2 class="sp-empty-title">
                    Nothing found for <span>"{{ $query }}"</span>
                </h2>
                <p class="sp-empty-sub">
                    We couldn't find a match. Try searching for Momos, Burger, Sandwich, Fries, Noodles, or Shake.
                </p>
                <div class="sp-empty-actions">
                    <a href="{{ route('search') }}" class="sp-btn sp-btn--ghost">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.5"
                             stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"/>
                            <polyline points="12 5 5 12 12 19"/>
                        </svg>
                        Clear &amp; Start Over
                    </a>
                </div>
                {{-- Suggestions --}}
                <div class="sp-suggestions">
                    <p class="sp-suggestions-label">Try these instead:</p>
                    <div class="sp-chips" style="justify-content:center;">
                        @foreach(['Momos', 'Burger', 'Fries', 'Shake'] as $s)
                            <a href="{{ route('search', ['q' => $s]) }}" class="sp-chip">{{ $s }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

        {{-- ── No query yet — landing prompt ── --}}
        @elseif(!$query)
            <div class="sp-landing">

                {{-- Animated prompt --}}
                <div class="sp-landing-prompt">
                    <div class="sp-landing-icon">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.5"
                             stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                    </div>
                    <h2 class="sp-landing-title">What are you craving?</h2>
                    <p class="sp-landing-sub">
                        Type in the search bar or pick a category above to explore our menu.
                    </p>
                </div>

                {{-- Trending cards --}}
                <div class="sp-trending">
                    <div class="sp-trending-header">
                        <span class="sp-trending-label">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                                <polyline points="17 6 23 6 23 12"/>
                            </svg>
                            Trending Right Now
                        </span>
                    </div>
                    <div class="sp-trending-grid">
                        @foreach([
                            ['name' => 'Kurkure Momos', 'desc' => 'Crispy fried momos in Schezwan glaze',   'emoji' => '🔥', 'q' => 'Kurkure Momos', 'badge' => 'Bestseller'],
                            ['name' => 'Steamed Momos', 'desc' => 'Classic pillowy dumplings with chutney', 'emoji' => '🥟', 'q' => 'Momos',         'badge' => null],
                            ['name' => 'Loaded Burger', 'desc' => 'Stacked patty in a sesame bun',          'emoji' => '🍔', 'q' => 'Burger',         'badge' => null],
                            ['name' => 'Bucket Fries',  'desc' => 'Golden crispy fries to share',           'emoji' => '🍟', 'q' => 'Fries',          'badge' => 'Fan Fav'],
                        ] as $t)
                            <a href="{{ route('search', ['q' => $t['q']]) }}" class="sp-trend-card">
                                <div class="sp-trend-emoji">{{ $t['emoji'] }}</div>
                                @if($t['badge'])
                                    <span class="sp-trend-badge">{{ $t['badge'] }}</span>
                                @endif
                                <div class="sp-trend-name">{{ $t['name'] }}</div>
                                <div class="sp-trend-desc">{{ $t['desc'] }}</div>
                                <div class="sp-trend-arrow">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2.5"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"/>
                                        <polyline points="12 5 19 12 12 19"/>
                                    </svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

        {{-- ── Results grid ── --}}
        @else
            <div class="sp-results-header">
                <div class="sp-results-meta">
                    <span class="sp-results-count">
                        <strong>{{ count($results) }}</strong> {{ Str::plural('result', count($results)) }}
                    </span>
                    <span class="sp-results-for">for "{{ $query }}"</span>
                </div>
                <a href="{{ route('search') }}" class="sp-results-clear">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                    Clear
                </a>
            </div>

            <div class="sp-grid">
                @foreach($results as $index => $item)
                    <div class="sp-card" style="animation-delay: {{ $index * 60 }}ms">

                        {{-- Card top: emoji / image area --}}
                        <div class="sp-card-visual">
                            <div class="sp-card-emoji">{{ $item->emoji ?? '🍴' }}</div>
                            @if($item->badge ?? false)
                                <span class="sp-card-badge sp-card-badge--{{ $item->badge_type ?? 'default' }}">
                                    {{ $item->badge }}
                                </span>
                            @endif
                        </div>

                        {{-- Card body --}}
                        <div class="sp-card-body">
                            <div class="sp-card-cat">{{ ucfirst($item->category) }}</div>
                            <h3 class="sp-card-name">{{ $item->name }}</h3>
                            @if($item->description ?? false)
                                <p class="sp-card-desc">{{ $item->description }}</p>
                            @endif
                        </div>

                        {{-- Card footer --}}
                        <div class="sp-card-foot">
                            <div class="sp-card-tags">
                                @if($item->tags ?? false)
                                    @foreach($item->tags as $tag)
                                        <span class="sp-card-tag">{{ $tag }}</span>
                                    @endforeach
                                @endif
                            </div>
                            @if($item->price ?? false)
                                <div class="sp-card-price">&#8377;{{ number_format($item->price, 0) }}</div>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-submit on chip click is handled by the link hrefs.
    // Add a subtle entrance animation on grid cards.
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.sp-card').forEach((card, i) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(24px)';
            setTimeout(() => {
                card.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, i * 60 + 80);
        });
    });
</script>
@endpush
