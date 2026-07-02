{{-- Quick Pick Section --}}
<section class="quickpick-section" id="quickpick">

    {{-- Top Banner --}}
    <div class="qp-banner">
        <div class="qp-banner-text">
            <span class="qp-banner-tag">🍽️ Now Serving</span>
            <h2 class="qp-banner-headline">Fresh food. Real taste. <br><span>Only at Thopcha!</span></h2>
        </div>
        <div class="qp-banner-mascot">🛵</div>
    </div>

    {{-- Promo Cards --}}
    <div class="qp-cards-wrapper">

        <div class="qp-card qp-card--dinein">
            <div class="qp-card-body">
                <span class="qp-card-eyebrow">Dine In</span>
                <h3 class="qp-card-title">EAT WITH US<br><small>AT THE CAFE</small></h3>
                <div class="qp-card-badge">Cozy Vibes ✨</div>
            </div>
            <div class="qp-card-img">
                <img src="{{ asset('images/quickpick/dinein.png') }}" alt="Dine In at Thopcha" loading="lazy">
            </div>
        </div>

        <div class="qp-card qp-card--takeaway">
            <div class="qp-card-body">
                <span class="qp-card-eyebrow">Takeaway</span>
                <h3 class="qp-card-title">GRAB &amp; GO<br><small>PACKED FRESH</small></h3>
                <div class="qp-card-badge">Quick &amp; Easy 📦</div>
            </div>
            <div class="qp-card-img">
                <img src="{{ asset('images/quickpick/takeaway.png') }}" alt="Takeaway from Thopcha" loading="lazy">
            </div>
        </div>

    </div>

    {{-- Food Category Grid --}}
    <div class="qp-categories">
        <h2 class="qp-categories-title">Order our best <span>food options</span></h2>
        <div class="qp-categories-grid">

            <a href="{{ route('search', ['q' => 'Momos']) }}" class="qp-cat-item">
                <div class="qp-cat-img-wrap">
                    <img src="{{ asset('images/quickpick/momos.png') }}" alt="Momos" loading="lazy">
                </div>
                <span>Momos</span>
            </a>

            <a href="{{ route('search', ['q' => 'Kurkure Momos']) }}" class="qp-cat-item">
                <div class="qp-cat-img-wrap qp-cat-img-wrap--hot">
                    <img src="{{ asset('images/quickpick/kurkure_momos.png') }}" alt="Kurkure Momos" loading="lazy">
                </div>
                <span>Kurkure Momos</span>
            </a>

            <a href="{{ route('search', ['q' => 'Burger']) }}" class="qp-cat-item">
                <div class="qp-cat-img-wrap">
                    <img src="{{ asset('images/quickpick/burger.png') }}" alt="Burger" loading="lazy">
                </div>
                <span>Burger</span>
            </a>

            <a href="{{ route('search', ['q' => 'Sandwich']) }}" class="qp-cat-item">
                <div class="qp-cat-img-wrap">
                    <img src="{{ asset('images/quickpick/sandwich.png') }}" alt="Sandwich" loading="lazy">
                </div>
                <span>Sandwich</span>
            </a>

            <a href="{{ route('search', ['q' => 'Noodles']) }}" class="qp-cat-item">
                <div class="qp-cat-img-wrap">
                    <img src="{{ asset('images/quickpick/noodles.png') }}" alt="Noodles" loading="lazy">
                </div>
                <span>Noodles</span>
            </a>

            <a href="{{ route('search', ['q' => 'Fries']) }}" class="qp-cat-item">
                <div class="qp-cat-img-wrap">
                    <img src="{{ asset('images/quickpick/fries.png') }}" alt="Fries" loading="lazy">
                </div>
                <span>Fries</span>
            </a>

            <a href="{{ route('search', ['q' => 'Shake']) }}" class="qp-cat-item">
                <div class="qp-cat-img-wrap">
                    <img src="{{ asset('images/quickpick/shake.png') }}" alt="Shake" loading="lazy">
                </div>
                <span>Shake</span>
            </a>

        </div>
    </div>

</section>
