{{-- ── MAIN GRID ── --}}
<section class="fgp-grid-section">
    <div class="fgp-container">

        @if($activeItem)
            <span class="fgp-section-label">Full Gallery</span>
            <h2 class="fgp-section-title">
                All Our <span style="color:var(--clr-accent)">Dishes</span>
            </h2>
            <p class="fgp-section-sub">Click any item to explore it in detail</p>
        @else
            <span class="fgp-section-label">Food Gallery</span>
            <h2 class="fgp-section-title">
                Everything We <span style="color:var(--clr-accent)">Serve</span>
            </h2>
            <p class="fgp-section-sub">Click on any dish to see more details</p>
        @endif

        <div class="fgp-grid">
            @foreach($allItems as $item)
                @php $isActive = $activeItem && $activeItem['slug'] === $item['slug']; @endphp

                <a href="{{ route('food_gallery', ['category' => $item['slug']]) }}"
                   class="fgp-card {{ $isActive ? 'is-active' : '' }}"
                   id="card-{{ $item['slug'] }}">

                    <div class="fgp-card-img">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" loading="lazy">
                        <div class="fgp-card-overlay"></div>
                        @if($item['badge'])
                            <span class="fgp-card-badge">{{ $item['badge'] }}</span>
                        @endif
                        <span class="fgp-card-active-label">&#10003; Selected</span>
                    </div>

                    <div class="fgp-card-active-ring"></div>

                    <div class="fgp-card-body">
                        <div class="fgp-card-name">{{ $item['name'] }}</div>
                        <div class="fgp-card-desc">{{ $item['desc'] }}</div>
                        <div class="fgp-card-footer">
                            <span class="fgp-card-tag {{ $item['tag_type'] === 'fire' ? 'fire' : '' }}">
                                {{ $item['tag'] }}
                            </span>
                            <span class="fgp-card-price">{!! $item['price'] !!}</span>
                        </div>
                    </div>

                </a>
            @endforeach
        </div>

    </div>
</section>
