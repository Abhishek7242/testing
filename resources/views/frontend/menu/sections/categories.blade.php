{{-- Menu Category Navigation --}}
<section class="menu-categories" id="menu-categories">
    <div class="container">
        <div class="category-nav-scroll">
            <div class="category-chips">
                @php
                    $catMeta = [
                        'momos'    => ['label' => 'Momos', 'emoji' => '🥟'],
                        'burger'   => ['label' => 'Burgers', 'emoji' => '🍔'],
                        'sandwich' => ['label' => 'Sandwiches', 'emoji' => '🥪'],
                        'fries'    => ['label' => 'Fries', 'emoji' => '🍟'],
                        'noodles'  => ['label' => 'Noodles', 'emoji' => '🍜'],
                        'shake'    => ['label' => 'Shakes', 'emoji' => '🥤'],
                    ];
                @endphp
                
                @foreach($groupedItems as $category => $items)
                    @if(isset($catMeta[$category]))
                        <a href="#cat-{{ $category }}" class="category-chip">
                            <span class="chip-emoji">{{ $catMeta[$category]['emoji'] }}</span>
                            <span class="chip-label">{{ $catMeta[$category]['label'] }}</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
