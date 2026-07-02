{{-- ── MORE IN THIS CATEGORY ── --}}
@if($activeItem && count($categoryItems) > 1)
<section class="fgp-catitems">
    <div class="fgp-container">

        <div class="fgp-catitems-header">
            <div>
                <span class="fgp-section-label">Full Range</span>
                <h2 class="fgp-section-title" style="margin-bottom:4px;">
                    All <span style="color:var(--clr-accent)">{{ $categoryLabels[$activeItem['category']] ?? ucfirst($activeItem['category']) }}</span> We Serve
                </h2>
                <p class="fgp-catitems-sub">
                    {{ count($categoryItems) }} varieties &mdash; pick your favourite
                </p>
            </div>
            <a href="{{ route('food_gallery') }}" class="fgp-catitems-browse">
                Browse All Dishes
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
            </a>
        </div>

        <div class="fgp-catitems-grid">
            @foreach($categoryItems as $ci)
                @php $isCurrent = $ci['slug'] === $activeItem['slug']; @endphp
                <a href="{{ route('food_gallery', ['category' => $ci['slug']]) }}"
                   class="fgp-ci-card {{ $isCurrent ? 'fgp-ci-card--active' : '' }}">

                    {{-- Image --}}
                    <div class="fgp-ci-img">
                        <img src="{{ asset($ci['image']) }}" alt="{{ $ci['name'] }}" loading="lazy">
                        <div class="fgp-ci-img-overlay"></div>

                        @if($ci['badge'])
                            <span class="fgp-ci-badge">{{ $ci['badge'] }}</span>
                        @endif

                        @if($isCurrent)
                            <span class="fgp-ci-current-label">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="3"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                Viewing
                            </span>
                        @endif

                        {{-- Spice indicator dots --}}
                        <div class="fgp-ci-spice">
                            @php
                                $spiceLevel = match($ci['spice']) {
                                    'Extra Hot' => 4,
                                    'Hot'       => 3,
                                    'Medium'    => 2,
                                    default     => 1,
                                };
                            @endphp
                            @for($s = 1; $s <= 4; $s++)
                                <span class="fgp-ci-spice-dot {{ $s <= $spiceLevel ? 'filled' : '' }}"></span>
                            @endfor
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="fgp-ci-body">
                        <div class="fgp-ci-top">
                            <h3 class="fgp-ci-name">{{ $ci['name'] }}</h3>
                            <span class="fgp-ci-price">{!! $ci['price'] !!}</span>
                        </div>
                        <p class="fgp-ci-desc">{{ $ci['desc'] }}</p>
                        <div class="fgp-ci-foot">
                            <span class="fgp-ci-tag {{ $ci['tag_type'] === 'fire' ? 'fire' : '' }}">{{ $ci['tag'] }}</span>
                            <div class="fgp-ci-meta">
                                <span>{{ $ci['serves'] }}</span>
                                <span class="fgp-ci-dot-sep">&bull;</span>
                                <span>{{ $ci['calories'] }}</span>
                            </div>
                        </div>
                    </div>

                </a>
            @endforeach
        </div>

    </div>
</section>
@endif
