{{-- Menu Items Grid Section --}}
<section class="menu-items-list" id="menu-items-list">
    <div class="container">
        @php
            $catMeta = [
                'momos'    => ['label' => 'Steamed & Fried Momos', 'desc' => 'Hand-folded dumplings steamed to perfection or fried for an addictive crunch.', 'emoji' => '🥟'],
                'burger'   => ['label' => 'Juicy Burgers', 'desc' => 'Loaded, flavor-packed patties served fresh in warm toasted buns.', 'emoji' => '🍔'],
                'sandwich' => ['label' => 'Toasted Sandwiches', 'desc' => 'Golden toasted sandwiches stacked with crunchy fresh veggies and premium spreads.', 'emoji' => '🥪'],
                'fries'    => ['label' => 'Crispy Fries & Sides', 'desc' => 'Perfectly salted golden fries served plain, spiced, or loaded with melted cheese.', 'emoji' => '🍟'],
                'noodles'  => ['label' => 'Stir-Fried Noodles', 'desc' => 'Sautéed Chinese-style noodles tossed with fresh vegetables and secret sauces.', 'emoji' => '🍜'],
                'shake'    => ['label' => 'Sweet Shakes & Beverages', 'desc' => 'Rich, creamy thick milkshakes topped with syrups — the ultimate dessert sip.', 'emoji' => '🥤'],
            ];

            // Curated food images from Unsplash mapped per item name
            $itemImages = [
                // Momos
                'Classic Steamed Momos'     => 'https://images.unsplash.com/photo-1626099613873-3df3ae2ba8ec?w=480&q=80',
                'Kurkure Momos'             => 'https://images.unsplash.com/photo-1637806930600-37b2213ab5a1?w=480&q=80',
                'Tandoori Momos'            => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=480&q=80',
                'Pan-Fried Momos'           => 'https://images.unsplash.com/photo-1496116218417-1a781b1c416c?w=480&q=80',
                'Kurkure Momos (Large)'     => 'https://images.unsplash.com/photo-1637806930600-37b2213ab5a1?w=480&q=80',
                // Burgers
                'Classic Veggie Burger'     => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=480&q=80',
                'Spicy Aloo Burger'         => 'https://images.unsplash.com/photo-1550950158-d0d960dff596?w=480&q=80',
                'Double Smash Burger'       => 'https://images.unsplash.com/photo-1553979459-d2229ba7433a?w=480&q=80',
                // Sandwiches
                'Grilled Veggie Sandwich'   => 'https://images.unsplash.com/photo-1528735602780-2552fd46c7af?w=480&q=80',
                'Special Tuesday Sandwich'  => 'https://images.unsplash.com/photo-1619096252214-ef06c45683e3?w=480&q=80',
                'Club Sandwich'             => 'https://images.unsplash.com/photo-1539252554453-80ab65ce3586?w=480&q=80',
                // Fries
                'Bucket of Fries'           => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=480&q=80',
                'Masala Fries'              => 'https://images.unsplash.com/photo-1576107232684-1279f390859f?w=480&q=80',
                'Cheese Fries'              => 'https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?w=480&q=80',
                // Noodles
                'Veg Chowmein'              => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=480&q=80',
                'Spicy Schezwan Noodles'    => 'https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=480&q=80',
                // Shakes
                'Chocolate Shake'           => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=480&q=80',
                'Vanilla Shake'             => 'https://images.unsplash.com/photo-1499638673689-79a0b5115d87?w=480&q=80',
                'Strawberry Shake'          => 'https://images.unsplash.com/photo-1553361371-9b22f78e8b1d?w=480&q=80',
            ];

            // Fallback per category
            $categoryFallbacks = [
                'momos'    => 'https://images.unsplash.com/photo-1496116218417-1a781b1c416c?w=480&q=80',
                'burger'   => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=480&q=80',
                'sandwich' => 'https://images.unsplash.com/photo-1528735602780-2552fd46c7af?w=480&q=80',
                'fries'    => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=480&q=80',
                'noodles'  => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=480&q=80',
                'shake'    => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=480&q=80',
            ];
        @endphp

        @foreach($groupedItems as $category => $items)
            @if(isset($catMeta[$category]))
                <div class="category-block" id="cat-{{ $category }}">
                    <div class="category-block-header">
                        <span class="category-block-emoji">{{ $catMeta[$category]['emoji'] }}</span>
                        <div>
                            <h2 class="category-block-title">{{ $catMeta[$category]['label'] }}</h2>
                            <p class="category-block-desc">{{ $catMeta[$category]['desc'] }}</p>
                        </div>
                    </div>

                    <div class="menu-items-grid">
                        @foreach($items as $item)
                            @php
                                $imgSrc = $itemImages[$item->name] ?? $categoryFallbacks[$category] ?? 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=480&q=80';
                            @endphp
                            <div class="menu-item-card {{ $item->is_featured ? 'featured' : '' }}">
                                @if($item->badge)
                                    <div class="item-badge badge-{{ $item->badge_type ?? 'default' }}">
                                        {{ $item->badge }}
                                    </div>
                                @endif

                                {{-- Food Image --}}
                                <div class="item-image-wrap">
                                    <img
                                        src="{{ $imgSrc }}"
                                        alt="{{ $item->name }}"
                                        class="item-image"
                                        loading="lazy"
                                    >
                                    <div class="item-image-overlay"></div>
                                    <span class="item-price-pill">₹{{ number_format($item->price, 0) }}</span>
                                </div>

                                {{-- Card Body --}}
                                <div class="item-content">
                                    <div class="item-name-row">
                                        <span class="item-emoji">{{ $item->emoji ?? '🍽️' }}</span>
                                        <h3 class="item-name">{{ $item->name }}</h3>
                                    </div>
                                    <p class="item-description">{{ $item->description }}</p>

                                    @if($item->tags && count($item->tags) > 0)
                                        <div class="item-tags">
                                            @foreach($item->tags as $tag)
                                                <span class="item-tag">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
