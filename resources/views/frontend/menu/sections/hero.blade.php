{{-- Menu Hero Section --}}
<section class="menu-hero" id="menu-hero">
    <div class="menu-hero-glow menu-hero-glow--1"></div>
    <div class="menu-hero-glow menu-hero-glow--2"></div>
    <div class="menu-hero-grid-overlay"></div>
    
    <div class="menu-hero-content container">
        <div class="menu-hero-badge">
            <span class="badge-dot"></span>
            <span>Made Fresh Daily</span>
        </div>
        <h1 class="menu-hero-title">
            Food That <br>
            <span class="menu-hero-title-accent">Hits Different</span>
        </h1>
        <p class="menu-hero-subtitle">
            Explore our curated menu of mountain favorites — crafted with local ingredients, priced for everyone.
        </p>
        
        {{-- Interactive Search Bar --}}
        <form action="{{ route('search') }}" method="GET" class="menu-search-form">
            <div class="menu-search-input-wrap">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" name="q" placeholder="Search momos, burgers, noodles..." required>
                <button type="submit" class="btn btn-primary menu-search-btn">Search</button>
            </div>
        </form>
    </div>
</section>
