<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The Urban Thopcha — Rohru's coziest cafe. Momos, Burgers, Sandwiches & more at the most affordable prices in Himachal Pradesh.">
    <meta name="keywords" content="Thopcha cafe, rohru cafe, momos rohru, kurkure momos, himachal cafe, urban Thopcha, affordable cafe rohru">
    <meta property="og:title" content="@yield('title', 'The Urban Thopcha Rohru')">
    <meta property="og:description" content="Rohru's most loved cafe — Momos, Burgers & more at unbeatable prices.">
    <meta property="og:type" content="website">
    <title>@yield('title', 'The Urban Thopcha — Rohru, Himachal Pradesh')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

    <style>
        /* ===========================
           CSS RESET & ROOT VARIABLES
        =========================== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --clr-bg: #0d0d0d;
            --clr-surface: #141414;
            --clr-surface-2: #1c1c1c;
            --clr-surface-3: #242424;
            --clr-border: rgba(255,255,255,0.08);
            --clr-accent: #f59e0b;
            --clr-accent-2: #ef4444;
            --clr-accent-glow: rgba(245, 158, 11, 0.25);
            --clr-text: #f5f5f5;
            --clr-text-muted: #a3a3a3;
            --clr-text-faint: #525252;
            --font-sans: 'Outfit', sans-serif;
            --font-serif: 'Playfair Display', serif;
            --radius-sm: 8px;
            --radius-md: 16px;
            --radius-lg: 24px;
            --radius-xl: 32px;
            --shadow-card: 0 4px 24px rgba(0,0,0,0.4);
            --shadow-glow: 0 0 40px rgba(245, 158, 11, 0.15);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-sans);
            background-color: var(--clr-bg);
            color: var(--clr-text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ===========================
           UTILITY CLASSES
        =========================== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .text-accent { color: var(--clr-accent); }
        .text-muted { color: var(--clr-text-muted); }

        .section-label {
            display: inline-block;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--clr-accent);
            padding: 6px 14px;
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 100px;
            margin-bottom: 16px;
            background: rgba(245, 158, 11, 0.07);
        }

        .section-title {
            font-family: var(--font-serif);
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--clr-text-muted);
            max-width: 540px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        /* ===========================
           BUTTONS
        =========================== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: 100px;
            font-family: var(--font-sans);
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: var(--transition);
        }

        .btn-primary {
            background: var(--clr-accent);
            color: #0d0d0d;
        }

        .btn-primary:hover {
            background: #fbbf24;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(245, 158, 11, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: var(--clr-text);
            border: 1.5px solid var(--clr-border);
        }

        .btn-outline:hover {
            border-color: var(--clr-accent);
            color: var(--clr-accent);
            transform: translateY(-2px);
        }

        /* ===========================
           NAVBAR
        =========================== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 0 24px;
            transition: var(--transition);
        }

        .navbar.scrolled {
            background: rgba(13, 13, 13, 0.92);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--clr-border);
        }

        .navbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            font-family: var(--font-serif);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--clr-text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-logo-dot {
            width: 8px;
            height: 8px;
            background: var(--clr-accent);
            border-radius: 50%;
            display: inline-block;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
        }

        .navbar-links a {
            color: var(--clr-text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 100px;
            transition: var(--transition);
        }

        .navbar-links a:hover {
            color: var(--clr-text);
            background: var(--clr-surface-2);
        }

        .navbar-links a.active {
            color: var(--clr-text) !important;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--clr-border);
            font-weight: 600;
        }

        .navbar-cta {
            background: var(--clr-accent);
            color: #0d0d0d !important;
            font-weight: 600 !important;
        }

        .navbar-cta:hover {
            background: #fbbf24 !important;
            color: #0d0d0d !important;
        }

        .navbar-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 8px;
            border: none;
            background: transparent;
        }

        .navbar-toggle span {
            width: 24px;
            height: 2px;
            background: var(--clr-text);
            border-radius: 2px;
            transition: var(--transition);
            display: block;
        }

        /* ===========================
           HERO SECTION
        =========================== */
        .hero-section {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background: radial-gradient(ellipse 80% 60% at 50% 30%, rgba(245,158,11,0.12) 0%, transparent 70%),
                        radial-gradient(ellipse 60% 40% at 80% 80%, rgba(239,68,68,0.06) 0%, transparent 60%),
                        var(--clr-bg);
            text-align: center;
            padding: 120px 24px 80px;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 760px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(245,158,11,0.1);
            border: 1px solid rgba(245,158,11,0.25);
            border-radius: 100px;
            padding: 8px 18px;
            font-size: 0.85rem;
            color: var(--clr-accent);
            font-weight: 500;
            margin-bottom: 28px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            background: var(--clr-accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.3); }
        }

        .hero-title {
            font-family: var(--font-serif);
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.02em;
            margin-bottom: 24px;
        }

        .hero-highlight {
            color: var(--clr-accent);
            position: relative;
        }

        .hero-subtitle {
            font-size: 1.15rem;
            color: var(--clr-text-muted);
            line-height: 1.7;
            margin-bottom: 40px;
        }

        .hero-cta {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 56px;
        }

        .hero-stats {
            display: inline-flex;
            align-items: center;
            gap: 24px;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-lg);
            padding: 20px 32px;
        }

        .stat { text-align: center; }
        .stat-number {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--clr-accent);
            line-height: 1;
        }
        .stat-label {
            font-size: 0.78rem;
            color: var(--clr-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 500;
        }
        .stat-divider {
            width: 1px;
            height: 40px;
            background: var(--clr-border);
        }

        .hero-scroll-indicator {
            position: absolute;
            bottom: 36px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--clr-text-faint);
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .scroll-arrow {
            width: 20px;
            height: 20px;
            border-right: 2px solid var(--clr-text-faint);
            border-bottom: 2px solid var(--clr-text-faint);
            transform: rotate(45deg);
            animation: scrollBounce 1.6s infinite;
        }

        @keyframes scrollBounce {
            0%, 100% { transform: rotate(45deg) translateY(0); opacity: 1; }
            50% { transform: rotate(45deg) translateY(6px); opacity: 0.5; }
        }

        /* ===========================
           ABOUT SECTION
        =========================== */
        .about-section {
            padding: 100px 0;
            background: var(--clr-surface);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: center;
        }

        .about-image-block {
            position: relative;
        }

        .about-image-card--main {
            background: var(--clr-surface-2);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            aspect-ratio: 4/3;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .about-image-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            color: var(--clr-text-faint);
            font-size: 0.85rem;
        }

        .about-image-card--accent {
            position: absolute;
            bottom: -20px;
            right: -20px;
            background: var(--clr-accent);
            border-radius: var(--radius-md);
            padding: 16px 20px;
        }

        .about-badge-float {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .about-badge-icon { font-size: 1.8rem; }
        .about-badge-float strong { display: block; font-size: 0.75rem; color: rgba(0,0,0,0.6); text-transform: uppercase; letter-spacing: 0.08em; }
        .about-badge-float span { font-size: 1rem; font-weight: 700; color: #0d0d0d; }

        .about-description {
            color: var(--clr-text-muted);
            line-height: 1.8;
            margin-bottom: 16px;
        }

        .about-values {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin: 28px 0 32px;
        }

        .about-value {
            display: flex;
            align-items: center;
            gap: 16px;
            background: var(--clr-surface-2);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-sm);
            padding: 14px 18px;
            transition: var(--transition);
        }

        .about-value:hover {
            border-color: rgba(245, 158, 11, 0.3);
            background: rgba(245, 158, 11, 0.05);
        }

        .about-value-icon { font-size: 1.4rem; }
        .about-value strong { display: block; font-size: 0.9rem; margin-bottom: 2px; }
        .about-value span { font-size: 0.8rem; color: var(--clr-text-muted); }

        /* ===========================
           MENU SECTION
        =========================== */
        .menu-section {
            padding: 100px 0;
            background: var(--clr-bg);
        }

        .menu-tabs {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 48px;
        }

        .menu-tab {
            padding: 10px 22px;
            border-radius: 100px;
            border: 1px solid var(--clr-border);
            background: transparent;
            color: var(--clr-text-muted);
            font-family: var(--font-sans);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .menu-tab:hover, .menu-tab.active {
            background: var(--clr-accent);
            border-color: var(--clr-accent);
            color: #0d0d0d;
            font-weight: 600;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .menu-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-md);
            padding: 28px;
            position: relative;
            transition: var(--transition);
            opacity: 0;
            transform: translateY(10px);
        }

        .menu-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .menu-card:hover {
            border-color: rgba(245,158,11,0.3);
            transform: translateY(-4px);
            box-shadow: var(--shadow-glow);
        }

        .menu-card--highlight {
            background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(239,68,68,0.05));
            border-color: rgba(245,158,11,0.2);
        }

        .menu-card--offer {
            grid-column: span 1;
            background: linear-gradient(135deg, rgba(239,68,68,0.1), rgba(245,158,11,0.08));
            border-color: rgba(239,68,68,0.3);
        }

        .menu-card-emoji { font-size: 2.5rem; margin-bottom: 12px; display: block; }

        .menu-card-badge {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            background: rgba(245,158,11,0.15);
            color: var(--clr-accent);
            padding: 3px 10px;
            border-radius: 100px;
            margin-bottom: 10px;
        }

        .menu-card-badge--fire {
            background: rgba(239,68,68,0.15);
            color: #ef4444;
        }

        .menu-card-offer-tag {
            position: absolute;
            top: -1px;
            right: 20px;
            background: var(--clr-accent-2);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 0 0 8px 8px;
        }

        .menu-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .menu-card-desc {
            font-size: 0.88rem;
            color: var(--clr-text-muted);
            line-height: 1.65;
            margin-bottom: 16px;
        }

        .menu-card-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--clr-accent);
            margin-bottom: 12px;
        }
        .menu-card-price span { font-size: 0.9rem; color: var(--clr-text-muted); font-weight: 400; }

        .menu-card-footer { display: flex; gap: 8px; flex-wrap: wrap; }

        .menu-card-tag {
            font-size: 0.75rem;
            background: var(--clr-surface-2);
            border: 1px solid var(--clr-border);
            color: var(--clr-text-muted);
            padding: 3px 10px;
            border-radius: 100px;
        }

        .menu-card-tag--offer {
            background: rgba(239,68,68,0.1);
            border-color: rgba(239,68,68,0.2);
            color: #f87171;
        }

        /* ===========================
           CREATOR SECTION
        =========================== */
        .creator-section {
            padding: 100px 0;
            background: var(--clr-surface);
            position: relative;
            overflow: hidden;
        }

        .creator-bg-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245,158,11,0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .creator-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .creator-description {
            color: var(--clr-text-muted);
            line-height: 1.8;
            margin-bottom: 32px;
        }

        .creator-steps {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 32px;
        }

        .creator-step {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .creator-step-num {
            min-width: 40px;
            height: 40px;
            background: rgba(245,158,11,0.1);
            border: 1px solid rgba(245,158,11,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--clr-accent);
        }

        .creator-step strong { display: block; font-size: 0.9rem; margin-bottom: 2px; }
        .creator-step span { font-size: 0.82rem; color: var(--clr-text-muted); }

        .creator-card {
            background: var(--clr-surface-2);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        .creator-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--clr-border);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .creator-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--clr-accent), #ef4444);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.9rem;
            color: #0d0d0d;
        }

        .creator-card-header strong { display: block; font-size: 0.95rem; }
        .creator-card-header span { font-size: 0.8rem; color: var(--clr-text-muted); }

        .creator-card-body { padding: 20px 24px; border-bottom: 1px solid var(--clr-border); }

        .creator-hashtags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .creator-hashtags span {
            font-size: 0.82rem;
            color: var(--clr-accent);
            background: rgba(245,158,11,0.08);
            border: 1px solid rgba(245,158,11,0.15);
            padding: 4px 12px;
            border-radius: 100px;
        }

        .creator-card-stats {
            padding: 16px 24px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            text-align: center;
        }

        .creator-card-stats div { display: flex; flex-direction: column; gap: 2px; }
        .creator-card-stats strong { font-size: 1.1rem; font-weight: 700; }
        .creator-card-stats span { font-size: 0.75rem; color: var(--clr-text-muted); }

        /* ===========================
           CONTACT SECTION
        =========================== */
        .contact-section {
            padding: 100px 0;
            background: var(--clr-bg);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 32px;
        }

        .contact-info-block {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .contact-card {
            display: flex;
            gap: 16px;
            align-items: flex-start;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-md);
            padding: 20px;
            transition: var(--transition);
        }

        .contact-card:hover {
            border-color: rgba(245,158,11,0.25);
        }

        .contact-card--highlight {
            background: rgba(245,158,11,0.06);
            border-color: rgba(245,158,11,0.2);
        }

        .contact-icon { font-size: 1.5rem; }
        .contact-detail { display: flex; flex-direction: column; gap: 4px; }
        .contact-detail strong { font-size: 0.88rem; font-weight: 600; margin-bottom: 2px; }
        .contact-detail span { font-size: 0.85rem; color: var(--clr-text-muted); line-height: 1.6; }

        .contact-social-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--clr-accent);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .contact-social-link:hover { opacity: 0.8; }

        .contact-map-block {
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 1px solid var(--clr-border);
            min-height: 400px;
        }

        .contact-map-placeholder { width: 100%; height: 100%; min-height: 400px; background: var(--clr-surface); }

        /* ===========================
           FOOTER
        =========================== */
        .footer {
            background: var(--clr-surface);
            border-top: 1px solid var(--clr-border);
            padding: 48px 24px 32px;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 40px;
        }

        .footer-brand p {
            font-size: 0.88rem;
            color: var(--clr-text-muted);
            line-height: 1.7;
            margin-top: 14px;
            max-width: 320px;
        }

        .footer-heading {
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--clr-text-faint);
            margin-bottom: 16px;
        }

        .footer-links { list-style: none; display: flex; flex-direction: column; gap: 10px; }
        .footer-links a {
            color: var(--clr-text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition);
        }
        .footer-links a:hover { color: var(--clr-accent); }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 24px;
            border-top: 1px solid var(--clr-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-bottom p {
            font-size: 0.82rem;
            color: var(--clr-text-faint);
        }

        .footer-insta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.82rem;
            color: var(--clr-text-muted);
            text-decoration: none;
            transition: var(--transition);
        }
        .footer-insta:hover { color: var(--clr-accent); }

        /* ===========================
           RESPONSIVE
        =========================== */
        @media (max-width: 900px) {
            .about-grid, .creator-inner, .contact-grid { grid-template-columns: 1fr; gap: 40px; }
            .footer-inner { grid-template-columns: 1fr 1fr; }
            .menu-grid { grid-template-columns: repeat(2, 1fr); }
            .about-image-card--accent { bottom: -10px; right: -10px; }
        }

        @media (max-width: 640px) {
            .menu-grid { grid-template-columns: 1fr; }
            .footer-inner { grid-template-columns: 1fr; }
            .navbar-links { display: none; }
            .navbar-toggle { display: flex; }
            .hero-stats { flex-direction: column; gap: 14px; }
            .stat-divider { width: 60px; height: 1px; }
            .contact-grid { grid-template-columns: 1fr; }
        }
    </style>

    @stack('styles')
</head>
<body>
