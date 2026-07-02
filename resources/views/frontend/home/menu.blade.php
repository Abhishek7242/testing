{{-- Menu Section --}}
<section class="menu-section" id="menu">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Our Menu</div>
            <h2 class="section-title">Food That <span class="text-accent">Hits Different</span></h2>
            <p class="section-subtitle">Simple, fresh and irresistibly delicious — at prices that will surprise you.</p>
        </div>

        <div class="menu-tabs">
            <button class="menu-tab active" data-tab="all">All</button>
            <button class="menu-tab" data-tab="momos">Momos</button>
            <button class="menu-tab" data-tab="snacks">Snacks</button>
            <button class="menu-tab" data-tab="offers">Special Offers</button>
        </div>

        <div class="menu-grid" id="menuGrid">
            {{-- Momos --}}
            <div class="menu-card" data-category="momos">
                <div class="menu-card-emoji">🥟</div>
                <div class="menu-card-badge">Bestseller</div>
                <h3 class="menu-card-title">Classic Momos</h3>
                <p class="menu-card-desc">Soft steamed dumplings with a flavourful filling — the way they're meant to be.</p>
                <div class="menu-card-footer">
                    <span class="menu-card-tag">Steamed</span>
                    <span class="menu-card-tag">Vegetarian</span>
                </div>
            </div>

            <div class="menu-card menu-card--highlight" data-category="momos">
                <div class="menu-card-emoji">🔥</div>
                <div class="menu-card-badge menu-card-badge--fire">Fan Favourite</div>
                <h3 class="menu-card-title">Kurkure Momos</h3>
                <p class="menu-card-desc">Crispy fried momos with an addictive crunch — the crowd favourite you can't stop eating.</p>
                <div class="menu-card-footer">
                    <span class="menu-card-tag">Fried</span>
                    <span class="menu-card-tag">#viral</span>
                </div>
            </div>

            {{-- Snacks --}}
            <div class="menu-card" data-category="snacks">
                <div class="menu-card-emoji">🥪</div>
                <h3 class="menu-card-title">Sandwiches</h3>
                <p class="menu-card-desc">Freshly made sandwiches loaded with veggies and sauces — the perfect quick bite.</p>
                <div class="menu-card-footer">
                    <span class="menu-card-tag">Fresh</span>
                    <span class="menu-card-tag">Quick Bite</span>
                </div>
            </div>

            <div class="menu-card" data-category="snacks">
                <div class="menu-card-emoji">🍔</div>
                <h3 class="menu-card-title">Burgers</h3>
                <p class="menu-card-desc">Juicy, flavour-packed burgers made fresh to order. Simple, satisfying and affordable.</p>
                <div class="menu-card-footer">
                    <span class="menu-card-tag">Grilled</span>
                    <span class="menu-card-tag">Hearty</span>
                </div>
            </div>

            <div class="menu-card" data-category="snacks">
                <div class="menu-card-emoji">🍟</div>
                <h3 class="menu-card-title">Bucket of Fries</h3>
                <p class="menu-card-desc">Golden, crispy fries served by the bucket. Great to share, impossible to resist.</p>
                <div class="menu-card-footer">
                    <span class="menu-card-tag">Crispy</span>
                    <span class="menu-card-tag">Shareable</span>
                </div>
            </div>

            {{-- Special Offers --}}
            <div class="menu-card menu-card--offer" data-category="offers">
                <div class="menu-card-offer-tag">TUESDAY ONLY</div>
                <div class="menu-card-emoji">🎉</div>
                <h3 class="menu-card-title">Tuesday Mega Offer</h3>
                <p class="menu-card-desc">
                    Special Sandwich + Free Burger + Bucket of Fries<br>
                    <strong>All 3 items for just ₹150!</strong>
                </p>
                <div class="menu-card-price">₹150 <span>/ combo</span></div>
                <div class="menu-card-footer">
                    <span class="menu-card-tag menu-card-tag--offer">Limited</span>
                    <span class="menu-card-tag menu-card-tag--offer">Every Tuesday</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.menu-tab').forEach(tab => {
        tab.addEventListener('click', function () {
            document.querySelectorAll('.menu-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const filter = this.dataset.tab;
            document.querySelectorAll('.menu-card').forEach(card => {
                if (filter === 'all' || card.dataset.category === filter) {
                    card.style.display = '';
                    setTimeout(() => card.classList.add('visible'), 10);
                } else {
                    card.classList.remove('visible');
                    card.style.display = 'none';
                }
            });
        });
    });
    document.querySelectorAll('.menu-card').forEach(card => card.classList.add('visible'));
</script>
