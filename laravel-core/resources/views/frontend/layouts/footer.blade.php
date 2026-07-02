    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="navbar-logo" style="text-decoration:none;">
                    <span class="navbar-logo-dot"></span>
                    The Urban Thopcha
                </a>
                <p>Rohru's coziest cafe corner — serving Momos, Burgers, Sandwiches and more at the most affordable prices in Himachal Pradesh. Come visit us, you won't regret it!</p>
            </div>
            <div>
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}#hero">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('menu') }}">Our Menu</a></li>
                    <li><a href="{{ url('/') }}#creator">For Creators</a></li>
                    <li><a href="{{ url('/') }}#contact">Find Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="footer-heading">Visit Us</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}#contact">📍 Rohru, Himachal Pradesh</a></li>
                    <li><a href="{{ url('/') }}#contact">Next to Amartex Building</a></li>
                    <li>
                        <a href="https://www.instagram.com/thopchahp10" target="_blank" rel="noopener">
                            📸 @thopchahp10
                        </a>
                    </li>
                </ul>
                <div style="margin-top:20px; background: rgba(245,158,11,0.08); border:1px solid rgba(245,158,11,0.2); border-radius:12px; padding:14px 16px;">
                    <div style="font-size:0.75rem; color:var(--clr-accent); font-weight:700; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:6px;">Tuesday Special</div>
                    <div style="font-size:0.88rem; color:var(--clr-text-muted);">Sandwich + Burger + Fries</div>
                    <div style="font-size:1.2rem; font-weight:800; color:var(--clr-accent);">Only ₹150!</div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} The Urban Thopcha Rohru. All rights reserved.</p>
            <a href="https://www.instagram.com/thopchahp10" target="_blank" rel="noopener" class="footer-insta">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                Follow us on Instagram
            </a>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
