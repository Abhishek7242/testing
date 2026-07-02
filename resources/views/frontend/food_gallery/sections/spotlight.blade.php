{{-- ── SPOTLIGHT (shown only when a specific item is clicked) ── --}}
@if($activeItem)
<section class="fgp-spotlight">
    <div class="fgp-container">
        <div class="fgp-spotlight-card">

            {{-- Left: Image --}}
            <div class="fgp-spotlight-img">
                <img src="{{ asset($activeItem['image']) }}" alt="{{ $activeItem['name'] }}" loading="lazy">
                @if($activeItem['badge'])
                    <div class="fgp-spotlight-badge">{{ $activeItem['badge'] }}</div>
                @endif
            </div>

            {{-- Right: Info --}}
            <div class="fgp-spotlight-info">
                <div class="fgp-spotlight-tag">
                    {{ $categoryLabels[$activeItem['category']] ?? ucfirst($activeItem['category']) }}
                </div>

                <h2 class="fgp-spotlight-name">{{ $activeItem['name'] }}</h2>

                <p class="fgp-spotlight-desc">{{ $activeItem['desc'] }}</p>

                <div class="fgp-spotlight-stats">
                    <div class="fgp-stat">
                        <span class="fgp-stat-label">Calories</span>
                        <span class="fgp-stat-value">{{ $activeItem['calories'] }}</span>
                    </div>
                    <div class="fgp-stat">
                        <span class="fgp-stat-label">Serves</span>
                        <span class="fgp-stat-value">{{ $activeItem['serves'] }}</span>
                    </div>
                    <div class="fgp-stat">
                        <span class="fgp-stat-label">Spice Level</span>
                        <span class="fgp-stat-value">{{ $activeItem['spice'] }}</span>
                    </div>
                </div>

                <div style="display:flex; align-items:center; gap:24px; flex-wrap:wrap;">
                    <div class="fgp-spotlight-price">{!! $activeItem['price'] !!}</div>
                    <a href="{{ route('home') }}#contact" class="fgp-spotlight-cta">
                        Order Now
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.5">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endif
