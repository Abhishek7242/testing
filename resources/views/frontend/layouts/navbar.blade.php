<nav class="navbar" id="mainNavbar">
    <div class="navbar-inner">
        <a href="{{ url('/') }}" class="navbar-logo">
            <span class="navbar-logo-dot"></span>
            Thopcha
        </a>

        <ul class="navbar-links">
            <li><a href="{{ url('/') }}#hero" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'active' : '' }}">Menu</a></li>
            <li><a href="{{ url('/') }}#creator">For Creators</a></li>
            <li><a href="{{ url('/') }}#contact" class="navbar-cta">Find Us</a></li>
        </ul>

        <button class="navbar-toggle" id="navToggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 40) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Mobile toggle (basic)
    document.getElementById('navToggle').addEventListener('click', function () {
        const links = document.querySelector('.navbar-links');
        const isVisible = links.style.display === 'flex';
        links.style.display = isVisible ? '' : 'flex';
        links.style.flexDirection = 'column';
        links.style.position = 'absolute';
        links.style.top = '72px';
        links.style.left = '0';
        links.style.right = '0';
        links.style.background = 'rgba(13,13,13,0.98)';
        links.style.padding = '16px 24px 24px';
        links.style.borderBottom = '1px solid rgba(255,255,255,0.08)';
        if (isVisible) {
            links.style.display = '';
        }
    });
</script>
