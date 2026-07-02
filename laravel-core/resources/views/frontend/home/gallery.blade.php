{{-- Gallery Section --}}
<section class="gallery-section" id="gallery">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Food Gallery</div>
            <h2 class="section-title">Looks As Good As <span class="text-accent">It Tastes</span></h2>
            <p class="section-subtitle">A peek at our most loved dishes - follow us on Instagram for more!</p>
        </div>

        <div class="gallery-grid">

            {{-- Steamed Momos - Large --}}
            <a href="{{ route('food_gallery', ['category' => 'steamed-momos']) }}" class="gallery-item gallery-item--large"
                 style="background-image: url('{{ asset('images/gallery/momos_steamed.png') }}')">
                <div class="gallery-img-overlay"></div>
                <div class="gallery-item-content">
                    <div class="gallery-item-info">
                        <span class="gallery-item-name">Steamed Momos</span>
                        <span class="gallery-item-tag">Classic &bull; Fresh Daily</span>
                    </div>
                </div>
                <div class="gallery-hover-overlay">
                    <span class="gallery-overlay-text">Soft, Flavourful &amp; Fresh</span>
                </div>
            </a>

            {{-- Kurkure Momos --}}
            <a href="{{ route('food_gallery', ['category' => 'kurkure-momos']) }}" class="gallery-item"
                 style="background-image: url('{{ asset('images/gallery/momos_kurkure.png') }}')">
                <div class="gallery-img-overlay"></div>
                <div class="gallery-item-content">
                    <div class="gallery-item-info">
                        <span class="gallery-item-name">Kurkure Momos</span>
                        <span class="gallery-item-tag gallery-item-tag--fire">#viral &#128293;</span>
                    </div>
                </div>
                <div class="gallery-hover-overlay">
                    <span class="gallery-overlay-text">Crispy &amp; Addictive</span>
                </div>
            </a>

            {{-- Burgers --}}
            <a href="{{ route('food_gallery', ['category' => 'burgers']) }}" class="gallery-item"
                 style="background-image: url('{{ asset('images/gallery/burger.png') }}')">
                <div class="gallery-img-overlay"></div>
                <div class="gallery-item-content">
                    <div class="gallery-item-info">
                        <span class="gallery-item-name">Burgers</span>
                        <span class="gallery-item-tag">Loaded &amp; Juicy</span>
                    </div>
                </div>
                <div class="gallery-hover-overlay">
                    <span class="gallery-overlay-text">Fresh Made to Order</span>
                </div>
            </a>

            {{-- Sandwiches --}}
            <a href="{{ route('food_gallery', ['category' => 'sandwiches']) }}" class="gallery-item"
                 style="background-image: url('{{ asset('images/gallery/sandwich.png') }}')">
                <div class="gallery-img-overlay"></div>
                <div class="gallery-item-content">
                    <div class="gallery-item-info">
                        <span class="gallery-item-name">Sandwiches</span>
                        <span class="gallery-item-tag">Crunchy &amp; Stacked</span>
                    </div>
                </div>
                <div class="gallery-hover-overlay">
                    <span class="gallery-overlay-text">Stacked &amp; Satisfying</span>
                </div>
            </a>

            {{-- Bucket Fries --}}
            <a href="{{ route('food_gallery', ['category' => 'bucket-fries']) }}" class="gallery-item"
                 style="background-image: url('{{ asset('images/gallery/fries.png') }}')">
                <div class="gallery-img-overlay"></div>
                <div class="gallery-item-content">
                    <div class="gallery-item-info">
                        <span class="gallery-item-name">Bucket Fries</span>
                        <span class="gallery-item-tag">Shareable</span>
                    </div>
                </div>
                <div class="gallery-hover-overlay">
                    <span class="gallery-overlay-text">Golden &amp; Crispy</span>
                </div>
            </a>

            {{-- Instagram CTA --}}
            <div class="gallery-item gallery-cta-card">
                <div class="gallery-insta-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    <span class="gallery-insta-handle">@thopchahp10</span>
                    <span class="gallery-insta-sub">See more on Instagram</span>
                    <a href="https://www.instagram.com/thopchahp10" target="_blank" rel="noopener" class="gallery-insta-btn">Follow Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Styles: resources/css/home/ --}}
