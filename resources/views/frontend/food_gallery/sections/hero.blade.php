{{-- ── HERO BANNER ── --}}
<section class="fgp-hero" id="fgp-hero">
    @if($activeItem)
        <div class="fgp-hero-bg" id="heroBg"
             style="background-image: url('{{ asset($activeItem['image']) }}')"></div>
    @else
        <div class="fgp-hero-bg" id="heroBg"
             style="background-image: url('{{ asset('images/gallery/momos_kurkure.png') }}')"></div>
    @endif

    <div class="fgp-hero-overlay"></div>

    <div class="fgp-hero-content">
        <nav class="fgp-hero-crumb" aria-label="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
            @if($activeItem)
                <a href="{{ route('food_gallery') }}">Food Gallery</a>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
                <span>{{ $activeItem['name'] }}</span>
            @else
                <span>Food Gallery</span>
            @endif
        </nav>

        <div class="fgp-hero-badge">
            {{ $activeItem ? ($categoryLabels[$activeItem['category']] ?? 'Food Gallery') : 'Food Gallery' }}
        </div>

        <h1 class="fgp-hero-title">
            @if($activeItem)
                {{ $activeItem['name'] }}
            @else
                Looks As Good As <span class="accent">It Tastes</span>
            @endif
        </h1>

        <div class="fgp-hero-meta">
            @if($activeItem)
                <div class="fgp-hero-pill">
                    <span class="dot"></span>
                    {{ $activeItem['calories'] }}
                </div>
                <div class="fgp-hero-pill">
                    <span class="dot"></span>
                    Serves: {{ $activeItem['serves'] }}
                </div>
                <div class="fgp-hero-pill">
                    <span class="dot"></span>
                    Spice: {{ $activeItem['spice'] }}
                </div>
            @else
                <div class="fgp-hero-pill">
                    <span class="dot"></span>
                    {{ count($allItems) }} Dishes
                </div>
                <div class="fgp-hero-pill">
                    <span class="dot"></span>
                    Fresh Daily
                </div>
                <div class="fgp-hero-pill">
                    <span class="dot"></span>
                    Rohru, Himachal
                </div>
            @endif
        </div>
    </div>
</section>
