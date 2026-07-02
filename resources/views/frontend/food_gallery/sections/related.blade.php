{{-- ── YOU MIGHT ALSO LIKE ── --}}
@if($activeItem && count($relatedItems) > 0)
<section class="fgp-related">
    <div class="fgp-container">

        <span class="fgp-section-label">More From Us</span>
        <h2 class="fgp-section-title" style="margin-bottom:8px;">
            You Might Also <span style="color:var(--clr-accent)">Like</span>
        </h2>
        <p class="fgp-section-sub">Explore other crowd favourites at Thopcha</p>

        <div class="fgp-related-grid">
            @foreach($relatedItems as $rel)
                <a href="{{ route('food_gallery', ['category' => $rel['slug']]) }}"
                   class="fgp-related-card">
                    <div class="fgp-related-img">
                        <img src="{{ asset($rel['image']) }}" alt="{{ $rel['name'] }}" loading="lazy">
                    </div>
                    <div class="fgp-related-body">
                        <div class="fgp-related-name">{{ $rel['name'] }}</div>
                        <div class="fgp-related-price">{!! $rel['price'] !!}</div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</section>
@endif
