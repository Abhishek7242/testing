{{-- ── FILTER BAR ── --}}
<div class="fgp-filter-bar" id="fgp-filters">
    <div class="fgp-container">
        <div class="fgp-filter-inner">

            <span class="fgp-filter-label">Browse:</span>

            {{-- All button --}}
            <a href="{{ route('food_gallery') }}"
               class="fgp-filter-btn {{ !$activeCategory ? 'active' : '' }}">
                All
                <span class="fgp-filter-count">{{ count($allItems) }}</span>
            </a>

            {{-- Category buttons --}}
            @foreach($categoryCounts as $cat => $count)
                @php
                    $firstItem = collect($allItems)->firstWhere('category', $cat);
                @endphp
                <a href="{{ route('food_gallery', ['category' => $firstItem['slug']]) }}"
                   class="fgp-filter-btn {{ $activeItem && $activeItem['category'] === $cat ? 'active' : '' }}">
                    {{ $categoryLabels[$cat] ?? ucfirst($cat) }}
                    <span class="fgp-filter-count">{{ $count }}</span>
                </a>
            @endforeach

        </div>
    </div>
</div>
