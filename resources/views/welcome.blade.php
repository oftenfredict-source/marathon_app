<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Swahili Marathon - Registration & Management</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Theme Compiled CSS -->
    <link rel="stylesheet" href="{{ asset('css/sungo-compiled.css') }}">

    <!-- Pluto Template Styles -->
    <link rel="stylesheet" href="{{ asset('pluto/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('pluto/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('pluto/css/colors.css') }}" />

    <style>
        html {
            scroll-behavior: smooth;
        }

        /* EMERGENCY OVERRIDE CSS - Bypasses stale React build */

        /* SUPER AGGRESSIVE BRANDING OVERRIDES */
        :root {
            --primary-color: #ffcc00 !important;
            --secondary-color: #ff8c42 !important;
            --theme-color: #ffcc00 !important;
            --main-color: #ffcc00 !important;
            --font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif !important;
        }

        body {
            font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .section-title h2,
        .sub-title,
        .nav-links-pill li a,
        .register-btn,
        .footer-widget h4,
        .theme-btn,
        .stat-item h2,
        .price-display {
            font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif !important;
        }

        /* Kill all green and blue elements, replace with yellow/white as needed */
        [style*="background-color: #3fab30"],
        [style*="background: #3fab30"],
        [style*="background-color: #1d8f2c"],
        [style*="background: #1d8f2c"],
        .bg-theme,
        .theme-bg {
            background-color: #ffcc00 !important;
            color: #000 !important;
        }

        /* Specifically force white for #1d8f2c if it's used for text or backgrounds that should be white */
        [style*="color: #1d8f2c"],
        [style*="color:#1d8f2c"],
        [style*="background-color: #1d8f2c"],
        [style*="background-color:#1d8f2c"],
        [style*="background:#1d8f2c"],
        [style*="1d8f2c"],
        .text-green-specific {
            color: #ffffff !important;
            background-color: #ffffff !important;
        }

        /* FORCE REGISTER TEXT VIA CSS AS FALLBACK */
        [class*="login"]::after,
        a[href*="login"]::after {
            /* content: "Register" !important; */
            /* Controlled via JS, but this is a hint for me */
        }

        /* SPECIFIC FIX: Top Bar Social (Right side) - Change from Green to DARK THEME */
        .header-top-right,
        .header-top-2 .top-right,
        .top-bar-right,
        .header-social,
        .top-social-wrapper,
        .top-bar-right-side,
        [class*="top-right"],
        [class*="header-social"],
        [class*="social-wrapper"] {
            background-color: #1a222a !important;
            background: #1a222a !important;
        }

        .header-top-right *,
        .header-top-2 .top-right *,
        .top-bar-right *,
        .header-social *,
        .top-social-wrapper * {
            color: #333333 !important;
        }

        .header-top,
        .header-top-1,
        .header-top-left,
        .header-top-left *,
        .top-left,
        .top-left *,
        .top-bar-left,
        .top-bar-left *,
        .header-top-right *,
        .top-right * {
            background-color: #1a222a !important;
            color: #ffffff !important;
        }

        /* Ultimate force white for top bar links/spans */
        .header-top a,
        .header-top span,
        .header-top li,
        [class*="header-top"] a,
        [class*="header-top"] span,
        [class*="top-"] a,
        [class*="top-"] span {
            color: #ffffff !important;
        }

        /* Arrows and buttons */
        .array-prev,
        .array-next,
        .slick-arrow,
        .swiper-button-prev,
        .swiper-button-next {
            background-color: #ffcc00 !important;
            border-color: #ffcc00 !important;
            color: #000 !important;
        }

        .array-prev:hover,
        .array-next:hover,
        .theme-btn:hover {
            background-color: #ff8c42 !important;
            /* Orange on hover */
            border-color: #ff8c42 !important;
            color: #fff !important;
        }

        .theme-btn,
        .btn-primary,
        .header-button .theme-btn,
        .footer-widget .widget-title::after,
        .progress-bar-inner {
            background-color: #ffcc00 !important;
            border-color: #ffcc00 !important;
            color: #000 !important;
        }

        /* HEADER NAV BRANDING */
        header a,
        .header-area a,
        .main-menu nav ul li a,
        .main-menu nav>ul>li>a {
            color: #111111 !important;
            text-decoration: none !important;
            transition: color 0.3s ease !important;
            font-weight: 500 !important;
        }

        header a:hover,
        .header-area a:hover,
        .main-menu nav ul li a:hover,
        .main-menu nav>ul>li:hover>a,
        .main-menu nav>ul>li a:hover,
        .main-menu ul li a:hover,
        nav ul li a:hover,
        li:hover>a,
        a:hover span,
        .text-theme {
            color: #ffcc00 !important;
            background-color: transparent !important;
        }

        /* Specifically target the green that might be coming from React */
        a:hover [style*="color"],
        li:hover>a * {
            color: #ffcc00 !important;
        }

        /* Top Bar Line Fix */
        .header-top-1::after,
        .header-top-2::after,
        .header-top-3::after,
        .header-top-4::after {
            background-color: #ffcc00 !important;
        }

        /* Specific menu cleanup */
        .has-dropdown>a i.fa-angle-down,
        .has-dropdown>a i.fas.fa-angle-down {
            display: none !important;
        }

        /* Image Showcase Marquee */
        .showcase-marquee {
            overflow: hidden;
            user-select: none;
            display: flex;
            gap: 20px;
            padding: 40px 0;
            mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        }

        .marquee-content {
            display: flex;
            gap: 20px;
            animation: scroll 40s linear infinite;
            flex-shrink: 0;
        }

        .marquee-item {
            position: relative;
            height: 280px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 767px) {
            .marquee-item {
                height: 180px;
            }
        }

        .marquee-item img {
            height: 100%;
            width: auto;
            object-fit: cover;
            transition: transform 0.5s ease;
            display: block;
        }

        .marquee-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #ffcc00;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0;
            transition: opacity 0.4s ease;
            text-align: center;
            padding: 20px;
        }

        .marquee-item:hover .marquee-overlay {
            opacity: 1;
        }

        .marquee-item:hover img {
            transform: scale(1.1);
        }

        @keyframes scroll {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(calc(-100% - 20px));
            }
        }

        .showcase-marquee:hover .marquee-content {
            animation-play-state: paused;
        }

        .submenu,
        .megamenu {
            display: none !important;
        }

        /* Currency Toggle Switch */
        .currency-switch-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 5px;
        }

        /* PREMIUM FOOTER STYLING */
        .footer-area {
            background: #0f0f0f;
            color: #ffffff;
            padding: 80px 0 0;
            font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-top {
            padding-bottom: 50px;
        }

        .footer-widget h4 {
            color: #ffcc00;
            font-weight: 800;
            font-size: 20px;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-about p {
            color: #aaa;
            line-height: 1.8;
            margin-bottom: 25px;
            font-size: 15px;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border-radius: 50%;
            text-align: center;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .footer-social a:hover {
            background: #ffcc00;
            color: #000;
            transform: translateY(-3px);
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links ul li {
            margin-bottom: 12px;
        }

        .footer-links ul li a {
            color: #aaa;
            transition: all 0.3s ease;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-links ul li a i {
            font-size: 12px;
            color: #ffcc00;
        }

        .footer-links ul li a:hover {
            color: #ffcc00;
            padding-left: 5px;
        }

        .footer-contact-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-contact-info li {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            color: #aaa;
            font-size: 15px;
        }

        .footer-contact-info i {
            color: #ffcc00;
            font-size: 18px;
            margin-top: 3px;
        }

        .footer-bottom {
            background: #050505;
            padding: 25px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .footer-bottom p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }

        .footer-bottom .powered-by {
            color: #777;
            font-size: 14px;
        }

        .footer-bottom .powered-by a {
            color: #940000;
            font-weight: 700;
            transition: opacity 0.3s;
        }

        .footer-bottom .powered-by a:hover {
            opacity: 0.8;
        }

        @media (max-width: 991px) {
            .footer-widget {
                margin-bottom: 40px;
            }

            .footer-bottom-content {
                justify-content: center;
                text-align: center;
            }
        }

        .currency-label {
            font-weight: 700;
            font-size: 16px;
            color: #555;
            transition: color 0.3s;
        }

        .currency-label.active {
            color: #ffcc00;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .switch-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .switch-slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.switch-slider {
            background-color: #ffcc00;
        }

        input:focus+.switch-slider {
            box-shadow: 0 0 1px #ffcc00;
        }

        input:checked+.switch-slider:before {
            transform: translateX(26px);
        }

        /* Hide search icon / extra icons before Login button */
        .header-search,
        .header-icon,
        .search-btn,
        .icon-btn,
        .offcanvas-search,
        .sidebar-trigger-btn,
        .search-trigger,
        .search_btn,
        .search-toggle,
        .header-search-1,
        .search-overlay,
        .search-popup,
        .search-box-outer,
        .search-box-inline,
        .search-form-wrapper,
        .search-close,
        #search-overlay,
        #search-popup {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        /* Hide mobile-specific triggers on desktop to keep header clean */
        @media (min-width: 1200px) {

            .mobile-menu-trigger,
            .offcanvas__trigger,
            .sidebar-trigger,
            .offcanvas-trigger,
            .hamburger-menu,
            .nav-toggler,
            .navbar-toggler,
            .menu-tigger,
            .menu-trigger,
            .sidebar_toggle,
            .sidebar-toggle,
            .canvas-trigger {
                display: none !important;
                visibility: hidden !important;
            }
        }


        /* Completely hide any search related overlays */
        [class*="search-overlay"],
        [class*="search-popup"],
        [id*="search-overlay"],
        [id*="search-popup"],
        .search-wrap,
        .search-container {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }


        /* PERSISTENT HEADER REDESIGN - Completely replace template header */
        /* REFINED HEADER OVERRIDE - Hide everything that might conflict with our custom header */
        .header-top,
        .header-top-1,
        .header-top-2,
        .top-bar-area,
        .header-top-area,
        .tp-header-top-area,
        header:not(#custom-floating-header) {
            display: none !important;
            visibility: hidden !important;
            height: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow: hidden !important;
        }

        /* Ensure the main site content is ALWAYS visible */
        #root {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            position: relative !important;
            z-index: 1 !important;
        }

        /* ================================================
           TOP INFO BAR - Polished Premium Design
        ================================================ */
        #custom-top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10000000 !important;
            background: linear-gradient(90deg, #0a0a0a 0%, #1a1a1a 100%);
            color: #aaa;
            font-size: 13px;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            padding: 0 40px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #ffcc00;
            pointer-events: all !important;
            visibility: visible !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
        }

        #custom-top-bar .top-bar-left {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        #custom-top-bar .top-bar-left a {
            color: #bbb;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12.5px;
            font-weight: 500;
            transition: color 0.2s;
            letter-spacing: 0.3px;
        }

        #custom-top-bar .top-bar-left a:hover {
            color: #ffcc00;
        }

        #custom-top-bar .top-bar-left a i {
            color: #ffcc00;
            font-size: 13px;
        }

        #custom-top-bar .top-bar-divider {
            width: 1px;
            height: 18px;
            background: rgba(255, 255, 255, 0.15);
        }

        #custom-top-bar .top-bar-right {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        #custom-top-bar .top-bar-right a {
            color: #aaa;
            font-size: 14px;
            width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.25s ease;
        }

        #custom-top-bar .top-bar-right a:hover {
            color: #000;
            background: #ffcc00;
            transform: translateY(-2px);
        }

        @media (max-width: 767px) {
            #custom-top-bar {
                padding: 0 16px;
                height: 38px;
            }

            #custom-top-bar .top-bar-left {
                gap: 14px;
            }
        }

        @media (max-width: 480px) {
            #custom-top-bar {
                justify-content: center !important;
            }

            #custom-top-bar .top-bar-left .email-link,
            #custom-top-bar .top-bar-divider,
            #custom-top-bar .top-bar-right,
            #custom-top-bar .top-bar-left a:nth-child(3) {
                /* Hide second phone */
                display: none !important;
            }

            #custom-top-bar .top-bar-left {
                gap: 15px;
                justify-content: center;
                width: 100%;
            }

            #custom-top-bar .top-bar-left a {
                font-size: 11px;
                font-weight: 600;
            }
        }

        /* ================================================
           FLOATING NAVIGATION PILL - Polished Premium Design
        ================================================ */
        #custom-floating-header {
            display: block;
            position: fixed;
            top: 52px;
            left: 50%;
            transform: translateX(-50%);
            width: 92%;
            max-width: 1150px;
            background: rgba(10, 10, 10, 0.9);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 100px;
            padding: 8px 10px 8px 20px;
            z-index: 9999999 !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255, 204, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.06);
            transition: all 0.3s ease;
            pointer-events: all !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        #custom-floating-header .pill-inner {
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            align-items: center !important;
            width: 100%;
            visibility: visible !important;
            opacity: 1 !important;
        }

        #custom-floating-header .logo-box-pill img {
            height: 42px;
            width: auto;
            visibility: visible !important;
        }

        #custom-floating-header .nav-links-pill {
            display: flex;
            gap: 8px;
            list-style: none;
            margin: 0;
            padding: 0;
            visibility: visible !important;
        }

        #custom-floating-header .nav-links-pill a {
            color: rgba(255, 255, 255, 0.8) !important;
            text-decoration: none !important;
            font-weight: 500;
            font-size: 14.5px;
            padding: 8px 14px;
            border-radius: 50px;
            transition: all 0.25s ease;
            visibility: visible !important;
            letter-spacing: 0.2px;
        }

        #custom-floating-header .nav-links-pill a:hover {
            color: #ffcc00 !important;
            background: rgba(255, 204, 0, 0.08);
        }

        #custom-floating-header .register-btn {
            background: #ffcc00 !important;
            color: #000 !important;
            padding: 11px 28px;
            border-radius: 50px;
            font-weight: 800;
            text-decoration: none !important;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 20px rgba(255, 204, 0, 0.4);
            visibility: visible !important;
            opacity: 1 !important;
        }

        #custom-floating-header .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 204, 0, 0.5);
        }

        /* Mobile: hide nav links, keep logo + button */
        @media (max-width: 991px) {
            #custom-floating-header {
                width: 95%;
                padding: 6px 10px 6px 16px;
                top: 48px;
                border-radius: 20px;
            }

            #custom-floating-header .nav-links-pill {
                display: none;
            }

            #custom-floating-header .logo-box-pill img {
                height: 32px;
            }

            #mobile-menu-toggle {
                display: flex !important;
            }

            #custom-floating-header .register-btn {
                padding: 7px 14px;
                font-size: 10px;
                margin-right: 5px;
            }
        }

        #mobile-menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            background: rgba(255, 204, 0, 0.1);
            border: 1px solid rgba(255, 204, 0, 0.3);
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            color: #ffcc00;
            cursor: pointer;
            z-index: 100000;
            transition: all 0.2s;
        }

        #mobile-menu-toggle:hover {
            background: #ffcc00;
            color: #000;
        }

        /* MOBILE SIDE OVERLAY MENU */
        #mobile-side-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 300px;
            height: 100vh;
            background: #0a0a0a;
            z-index: 99999999 !important;
            transition: right 0.4s cubic-bezier(0.77, 0.2, 0.05, 1.0);
            padding: 40px 30px;
            box-shadow: -10px 0 40px rgba(0, 0, 0, 0.8);
            border-left: 2px solid #ffcc00;
        }

        #mobile-side-menu.active {
            right: 0;
        }

        #mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            z-index: 99999998 !important;
            display: none;
            opacity: 0;
            transition: opacity 0.3s;
        }

        #mobile-menu-overlay.active {
            display: block;
            opacity: 1;
        }

        .mobile-header-close {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 40px;
        }

        .close-btn {
            font-size: 28px;
            color: #ffcc00;
            background: none;
            border: none;
            cursor: pointer;
        }

        .mobile-nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mobile-nav-list li {
            margin-bottom: 25px;
            transform: translateX(20px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        #mobile-side-menu.active .mobile-nav-list li {
            transform: translateX(0);
            opacity: 1;
        }

        .mobile-nav-list li:nth-child(1) {
            transition-delay: 0.1s;
        }

        .mobile-nav-list li:nth-child(2) {
            transition-delay: 0.15s;
        }

        .mobile-nav-list li:nth-child(3) {
            transition-delay: 0.2s;
        }

        .mobile-nav-list li:nth-child(4) {
            transition-delay: 0.25s;
        }

        .mobile-nav-list a {
            color: #fff;
            text-decoration: none;
            font-size: 22px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .mobile-nav-list a i {
            color: #ffcc00;
            font-size: 16px;
        }

        .header-button .theme-btn,
        [class*="header-button"] a,
        .header-btn-wrapper a {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            visibility: visible !important;
            background-color: #ffcc00 !important;
            color: #000 !important;
            font-weight: 800 !important;
            padding: 8px 20px !important;
            border-radius: 50px !important;
            text-transform: uppercase !important;
            min-width: 130px !important;
            font-size: 14px !important;
            box-shadow: 0 4px 15px rgba(255, 204, 0, 0.3) !important;
            margin: 0 !important;
        }

        /* Ensure parent columns don't break flex */
        .header-button-column,
        [class*="col-"].header-button-container {
            display: flex !important;
            align-items: center !important;
            flex-shrink: 0 !important;
            width: auto !important;
        }

        /* Text fix for dark text on light backgrounds */
        .hero-content p,
        .hero-content h1 {
            color: white !important;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        /* PERSISTENT CUSTOM HERO SECTION - Completely replaces buggy template hero */
        #custom-hero-section {
            position: relative;
            height: 95vh;
            min-height: 650px;
            width: 100%;
            display: flex;
            align-items: center;
            background: #000;
            /* Fallback */
            color: white;
            z-index: 5 !important;
            margin-top: 0;
            padding-top: 140px;
            /* Increased from 100px to ensure clearance */
            overflow: hidden;
        }

        .hero-slider-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6));
            z-index: 2;
        }

        #custom-hero-section .hero-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        #custom-hero-section .hero-badge {
            display: inline-block;
            background: #ffcc00;
            color: #000;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 14px;
            margin-bottom: 25px;
            letter-spacing: 2px;
            box-shadow: 0 4px 15px rgba(255, 204, 0, 0.3);
            animation: fadeInDown 0.8s ease-out;
        }

        #custom-hero-section h1 {
            font-size: clamp(2.8rem, 8vw, 5.5rem) !important;
            line-height: 1.05 !important;
            font-weight: 900 !important;
            margin-bottom: 25px !important;
            text-transform: uppercase !important;
            max-width: 900px !important;
            color: white !important;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            animation: fadeInLeft 1s ease-out;
        }

        #custom-hero-section p {
            font-size: 1.3rem !important;
            max-width: 650px !important;
            line-height: 1.7 !important;
            margin-bottom: 45px !important;
            color: rgba(255, 255, 255, 0.95) !important;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
            animation: fadeInLeft 1.2s ease-out;
        }

        #custom-hero-section .hero-cta {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: #ffcc00 !important;
            color: #000 !important;
            padding: 18px 45px;
            border-radius: 100px;
            font-weight: 800;
            text-decoration: none !important;
            font-size: 18px;
            text-transform: uppercase;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(255, 204, 0, 0.4);
            animation: fadeInUp 1.4s ease-out;
        }

        #custom-hero-section .hero-cta:hover {
            background: #ffffff !important;
            color: #000 !important;
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(255, 255, 255, 0.3);
        }

        #custom-hero-section .hero-cta i {
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        #custom-hero-section .hero-cta:hover i {
            transform: translateX(5px);
        }

        /* Responsive Tweaks */
        .hero-slide-padding {
            padding: 220px 0 450px;
        }

        @media (max-width: 991px) {
            .hero-slide-padding {
                padding: 140px 0 160px;
            }

            #custom-hero-section {
                height: 80vh;
                text-align: center;
            }

            #custom-hero-section .hero-container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            #custom-hero-section h1,
            #custom-hero-slider h1 {
                font-size: 3.2rem !important;
            }

            #custom-hero-section p,
            #custom-hero-slider p {
                font-size: 1.1rem !important;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 575px) {
            #custom-hero-section {
                padding-top: 100px !important;
                /* Smaller padding because spacer is doing the work */
                height: auto !important;
                min-height: auto !important;
                /* Remove the extra 130vh height */
                padding-bottom: 60px !important;
                display: flex !important;
                align-items: flex-start !important;
                text-align: center !important;
            }

            .hero-mobile-spacer {
                display: block !important;
                height: 140px !important;
                /* Physical barrier for the navigation pill */
                width: 100%;
            }

            #custom-hero-section .hero-container {
                margin-top: 0px !important;
                width: 100% !important;
                padding: 0 15px !important;
            }

            #custom-hero-section .hero-badges-wrapper {
                justify-content: center !important;
                gap: 12px !important;
                margin-top: 0 !important;
                /* Aggressive push for the badges themselves */
                margin-bottom: 20px !important;
            }

            #custom-hero-section h1 {
                font-size: 2.1rem !important;
                margin-bottom: 25px !important;
                line-height: 1.2 !important;
            }

            #custom-hero-section p {
                font-size: 0.95rem !important;
                margin-bottom: 35px !important;
                padding: 0 10px;
            }

            #custom-hero-section .hero-cta {
                padding: 14px 28px;
                font-size: 15px;
                width: 100%;
                justify-content: center;
            }
        }

        /* BACK TO TOP BUTTON */
        #back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #ffcc00;
            color: #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            z-index: 999999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(255, 204, 0, 0.4);
            border: 2px solid #fff;
        }

        #back-to-top.visible {
            opacity: 1;
            visibility: visible;
            bottom: 40px;
        }

        #back-to-top:hover {
            background: #000;
            color: #ffcc00;
            transform: translateY(-5px);
        }

        /* Force back and visibility for template hero/sliders */
        .slider-area,
        .hero-section,
        .about-section {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        #custom-partners-section {
            background: #f9f9f9;
            padding: 60px 40px;
            text-align: center;
            position: relative;
            z-index: 1;
            border-top: 4px solid #ffcc00;
        }

        #custom-partners-section .partners-label {
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            color: #888;
            margin-bottom: 12px;
        }

        #custom-partners-section h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #111;
            margin-bottom: 50px;
        }

        #custom-partners-section h2 span {
            color: #ffcc00;
        }

        #custom-partners-section .partners-grid {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 50px;
        }

        #custom-partners-section .partner-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            transition: transform 0.3s ease;
        }

        #custom-partners-section .partner-card:hover {
            transform: translateY(-6px);
        }

        #custom-partners-section .partner-card img {
            height: 90px;
            width: auto;
            max-width: 180px;
            object-fit: contain;
            filter: grayscale(30%);
            transition: filter 0.3s ease;
            border-radius: 6px;
        }

        #custom-partners-section .partner-card:hover img {
            filter: grayscale(0%);
        }

        #custom-partners-section .partner-card span {
            font-size: 13px;
            font-weight: 600;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @media (max-width: 767px) {
            #custom-partners-section {
                padding: 40px 20px;
            }

            #custom-partners-section .partners-grid {
                gap: 30px;
            }

            #custom-partners-section .partner-card img {
                height: 65px;
            }
        }

        /* GLOBAL SUB-TITLE FIX - Target any sub-title or label that might be green */
        .sub-title,
        .subtitle,
        [class*="sub-title"],
        [class*="subtitle"],
        .section-title span,
        .about-content span {
            color: #ffcc00 !important;
        }

        /* Footer height reduction */
        .footer-section,
        .footer-area,
        footer {
            padding-top: 80px !important;
            padding-bottom: 20px !important;
            background: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.9)), url('/img/header/header-3.jpeg') !important;
            background-size: cover !important;
            background-position: center !important;
            background-attachment: fixed !important;
        }

        .single-footer-widget,
        .footer-widget {
            margin-bottom: 30px !important;
        }

        .single-footer-widget p {
            margin-bottom: 10px !important;
            font-size: 13px !important;
        }

        .single-footer-widget .list-area li,
        .footer-widget ul li {
            margin-bottom: 3px !important;
            padding: 3px 0 !important;
        }

        .footer-bottom,
        .footer-copyright,
        [class*="footer-bottom"] {
            padding: 20px 0 !important;
            margin-top: 40px !important;
            background: #050505 !important;
            border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
        }

        .contact-info-area,
        .footer-contact,
        [class*="contact-info"] {
            padding: 15px 0 !important;
        }

        /* Footer contact icons: green → yellow */
        .contact-info-items .icon {
            background-color: transparent !important;
            border-color: #ffcc00 !important;
        }

        .contact-info-items .icon svg path,
        .contact-info-items .icon svg {
            fill: #ffcc00 !important;
        }

        /* Footer link hover → yellow */
        .footer-section a:hover,
        footer a:hover,
        .single-footer-widget a:hover,
        .list-area a:hover,
        .footer-bottom a:hover {
            color: #ffcc00 !important;
        }

        /* PREMIUM FOOTER HEADINGS */
        .single-footer-widget h3,
        .footer-widget h3,
        .widget-title {
            color: #ffcc00 !important;
            font-size: 24px !important;
            font-weight: 800 !important;
            margin-bottom: 30px !important;
            position: relative !important;
            padding-bottom: 15px !important;
            display: inline-block !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
        }

        .single-footer-widget h3::after,
        .footer-widget h3::after,
        .widget-title::after {
            content: '' !important;
            position: absolute !important;
            left: 0 !important;
            bottom: 0 !important;
            width: 80% !important;
            height: 2px !important;
            background: rgba(255, 255, 255, 0.1) !important;
        }

        .single-footer-widget h3::before,
        .footer-widget h3::before,
        .widget-title::before {
            content: '' !important;
            position: absolute !important;
            left: 0 !important;
            bottom: 0 !important;
            width: 40px !important;
            height: 2px !important;
            background: #ffcc00 !important;
            z-index: 1 !important;
        }

        /* LIST ICONS */
        .single-footer-widget ul li i,
        .footer-widget ul li i {
            color: #ffcc00 !important;
            /* Changed to yellow for better accent */
            font-size: 13px !important;
            margin-right: 12px !important;
        }

        .single-footer-widget ul li a,
        .footer-widget ul li a {
            color: #ccc !important;
            font-size: 16px !important;
            transition: all 0.3s ease !important;
            display: inline-block !important;
            padding: 5px 0 !important;
        }

        .single-footer-widget ul li a:hover,
        .footer-widget ul li a:hover {
            color: #ffcc00 !important;
            transform: translateX(5px) !important;
        }

        /* Footer Column Spacing */
        .footer-section .col-lg-3,
        .footer-area .col-lg-3 {
            padding-right: 40px !important;
        }

        @media (max-width: 991px) {
            .section-padding {
                padding: 60px 0 !important;
            }

            .about-content p {
                font-size: 16px !important;
                line-height: 1.6 !important;
            }

            .footer-section .col-lg-3,
            .footer-area .col-lg-3,
            .footer-section .col-md-6,
            .footer-area .col-md-6 {
                padding-right: 15px !important;
                text-align: center !important;
            }

            .single-footer-widget h3::after,
            .footer-widget h3::after,
            .widget-title::after {
                left: 50% !important;
                transform: translateX(-50%) !important;
            }

            .single-footer-widget h3::before,
            .footer-widget h3::before,
            .widget-title::before {
                left: 50% !important;
                transform: translateX(-50%) !important;
            }

            .single-footer-widget ul li {
                display: flex !important;
                justify-content: center !important;
                text-align: center !important;
            }
        }

        @media (max-width: 575px) {
            #custom-hero-slider h1 {
                font-size: 2.2rem !important;
            }

            #custom-hero-slider p {
                font-size: 0.95rem !important;
            }

            .hero-btns {
                display: flex;
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }

            .hero-btns .theme-btn {
                width: 100%;
                margin: 0 !important;
            }

            .stat-item h2 {
                font-size: 24px !important;
            }

            .stat-item p {
                font-size: 10px !important;
            }

            .offer-items {
                padding: 20px !important;
            }

            .price-display {
                font-size: 26px !important;
            }
            
            #race-pricing-section .section-title h2 {
                font-size: 28px !important;
            }
        }
    </style>


    <script>
        window.appConfig = {
            basename: "{{ rtrim(parse_url(url('/'), PHP_URL_PATH), '/') }}"
        };
    </script>

    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div id="root">
    </div>

    <!-- UI Elements moved from JS to Blade for instant loading -->
    <div id="custom-top-bar">
        <div class="top-bar-left">
            <a href="tel:+255755165284"><i class="fa-solid fa-phone-volume"></i> +255 755 165 284</a>
            <div class="top-bar-divider"></div>
            <a href="tel:+255757979611"><i class="fa-solid fa-phone-volume"></i> +255 757 979 611</a>
            <div class="top-bar-divider"></div>
            <a href="mailto:info@swahilimarathon.com" class="email-link"><i class="fa-solid fa-envelope"></i>
                info@swahilimarathon.com</a>
        </div>
    </div>

    <div id="custom-floating-header">
        <div class="pill-inner">
            <div class="logo-box-pill"><a href="{{ url('/') }}"><img src="/img/logo/swahili Marathon.jpeg" alt="Logo"
                        style="height:48px; border-radius:6px;"></a></div>
            <ul class="nav-links-pill">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#marathon-background-section">About</a></li>
                <li><a href="#race-category-anchor">Race Category</a></li>
                <li><a href="#race-pricing-section">Price</a></li>
            </ul>
            <div style="display: flex; align-items: center; gap: 10px;">
                <a href="{{ url('/register') }}" class="register-btn">Register <i
                        class="fa-solid fa-arrow-right"></i></a>
                <button id="mobile-menu-toggle"><i class="fa-solid fa-bars"></i></button>
            </div>
        </div>
    </div>

    <div id="mobile-menu-overlay"></div>
    <div id="mobile-side-menu">
        <div class="mobile-header-close"><button class="close-btn"><i class="fa-solid fa-xmark"></i></button></div>
        <ul class="mobile-nav-list">
            <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="#marathon-background-section"><i class="fa-solid fa-circle-info"></i> About</a></li>
            <li><a href="#race-category-anchor"><i class="fa-solid fa-person-running"></i> Race Category</a></li>
            <li><a href="#race-pricing-section"><i class="fa-solid fa-tag"></i> Price</a></li>
        </ul>
    </div>

    <div id="custom-hero-slider" class="slider-area hero-section fix">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide bg-cover"
                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/img/header/header-1.jpeg');">
                    <div class="container hero-slide-padding">
                        <div class="hero-content text-center">
                            <span class="sub-title wow slideUp"
                                style="color: #ffcc00; font-weight: 700; letter-spacing: 3px; font-size: 18px;">JUNE 27,
                                2026 | SWAHILI
                                MARATHON</span>
                            <h1 class="text-white wow slideUp" data-delay=".3"
                                style="font-size: 80px; font-weight: 900; margin: 20px 0; line-height: 1.1;">Run For
                                <span style="color: #ffcc00;">Unity & Heritage</span></h1>
                            <p class="text-white wow slideUp" data-delay=".4"
                                style="font-size: 1.4rem; max-width: 850px; margin: 0 auto 30px; line-height: 1.7; text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                Experience the thrill of Tanzania's premier marathon event. Join thousands of runners to
                                celebrate culture, health, and the spirit of endurance in the heart of our community.
                            </p>
                            <div class="hero-btns mt-4 wow slideUp" data-delay=".5">
                                <a href="/register" class="theme-btn">Register Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                                <a href="#marathon-background-section" class="theme-btn style-2 ms-3">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide bg-cover"
                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/img/header/header-2.jpeg');">
                    <div class="container hero-slide-padding">
                        <div class="hero-content text-center">
                            <span class="sub-title wow slideUp"
                                style="color: #ffcc00; font-weight: 700; letter-spacing: 3px; font-size: 18px;">JUNE 27,
                                2026 |
                                CELEBRATING CULTURE</span>
                            <h1 class="text-white wow slideUp" data-delay=".3"
                                style="font-size: 80px; font-weight: 900; margin: 20px 0; line-height: 1.1;">Beyond The
                                <span style="color: #ffcc00;">Finish Line</span></h1>
                            <p class="text-white wow slideUp" data-delay=".4"
                                style="font-size: 1.4rem; max-width: 850px; margin: 0 auto 30px; line-height: 1.7; text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                It's not just a race; it's a milestone. Push your limits and discover the true meaning
                                of athletic excellence with every kilometer.
                            </p>
                            <div class="hero-btns mt-4 wow slideUp" data-delay=".5">
                                <a href="/register" class="theme-btn">Join Us Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide bg-cover"
                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/img/header/header-3.jpeg');">
                    <div class="container hero-slide-padding">
                        <div class="hero-content text-center">
                            <span class="sub-title wow slideUp"
                                style="color: #ffcc00; font-weight: 700; letter-spacing: 3px; font-size: 18px;">JUNE 27,
                                2026 | JOIN THE
                                CHALLENGE</span>
                            <h1 class="text-white wow slideUp" data-delay=".3"
                                style="font-size: 80px; font-weight: 900; margin: 20px 0; line-height: 1.1;">Connect &
                                <span style="color: #ffcc00;">Achieve</span></h1>
                            <p class="text-white wow slideUp" data-delay=".4"
                                style="font-size: 1.4rem; max-width: 850px; margin: 0 auto 30px; line-height: 1.7; text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                Build lasting connections with fellow runners and achieve your personal best. Swahili
                                Marathon is where community meets ambition.
                            </p>
                            <div class="hero-btns mt-4 wow slideUp" data-delay=".5">
                                <a href="/register" class="theme-btn">Start Your Journey <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="swiper-slide bg-cover"
                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/img/header/header-4.jpeg');">
                    <div class="container hero-slide-padding">
                        <div class="hero-content text-center">
                            <span class="sub-title wow slideUp"
                                style="color: #ffcc00; font-weight: 700; letter-spacing: 3px; font-size: 18px;">JUNE 27,
                                2026 | TRAIN &
                                RACE</span>
                            <h1 class="text-white wow slideUp" data-delay=".3"
                                style="font-size: 80px; font-weight: 900; margin: 20px 0; line-height: 1.1;">Train,
                                Race, <span style="color: #ffcc00;">Inspire</span></h1>
                            <p class="text-white wow slideUp" data-delay=".4"
                                style="font-size: 1.4rem; max-width: 850px; margin: 0 auto 30px; line-height: 1.7; text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                Push your limits and set new standards for yourself. Experience the thrill of
                                competition and the joy of reaching the finish line.
                            </p>
                            <div class="hero-btns mt-4 wow slideUp" data-delay=".5">
                                <a href="/register" class="theme-btn">Join Us Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 5 -->
                <div class="swiper-slide bg-cover"
                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/img/header/header-5.jpeg');">
                    <div class="container hero-slide-padding">
                        <div class="hero-content text-center">
                            <span class="sub-title wow slideUp"
                                style="color: #ffcc00; font-weight: 700; letter-spacing: 3px; font-size: 18px;">JUNE 27,
                                2026 |
                                EXCELLENCE AWAITS</span>
                            <h1 class="text-white wow slideUp" data-delay=".3"
                                style="font-size: 80px; font-weight: 900; margin: 20px 0; line-height: 1.1;">A Heritage
                                of <span style="color: #ffcc00;">Excellence</span></h1>
                            <p class="text-white wow slideUp" data-delay=".4"
                                style="font-size: 1.4rem; max-width: 850px; margin: 0 auto 30px; line-height: 1.7; text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                Be part of a tradition that spans generations. The Swahili Marathon is more than a race;
                                it's a celebration of where we come from and where we're going.
                            </p>
                            <div class="hero-btns mt-4 wow slideUp" data-delay=".5">
                                <a href="/register" class="theme-btn">Join Us Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <!-- About Us / Our Heritage Section -->
    <section id="marathon-background-section" class="about-section fix section-padding">
        <div class="container">
            <div class="about-wrapper">
                <div class="section-title text-center">
                    <span class="sub-title wow slideUp">About Us</span>
                    <h2 class="wow slideUp" data-delay=".3">Swahili Marathon: <span>A Cultural & Athletic
                            Celebration</span></h2>
                </div>
                <div class="row g-4 align-items-center mt-5">
                    <div class="col-lg-6">
                        <div class="about-image-item wow slideLeft" data-delay=".3"
                            style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                            <video autoplay muted loop playsinline style="width: 100%; height: auto; display: block;">
                                <source src="/img/about/about-us.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <p class="wow slideUp" data-delay=".5"
                                style="font-size: 18px; line-height: 1.8; color: #444;">
                                The Swahili Marathon is a unique celebration bringing together athletes and cultural
                                seekers.
                                Set against the coastal heritage, it empowers the community and inspires health.
                                Our vision is to create a world-class event that showcases the beauty of Tanzania
                                while promoting physical fitness and cultural unity.
                            </p>
                            <div class="about-info-list mt-4">
                                <ul style="list-style: none; padding: 0;">
                                    <li class="wow slideUp" data-delay=".6"
                                        style="margin-bottom: 15px; display: flex; align-items: center; gap: 15px; font-weight: 500;">
                                        <i class="fa-solid fa-check-circle"
                                            style="color: #ffcc00; font-size: 20px;"></i> Professional Race Management
                                    </li>
                                    <li class="wow slideUp" data-delay=".7"
                                        style="margin-bottom: 15px; display: flex; align-items: center; gap: 15px; font-weight: 500;">
                                        <i class="fa-solid fa-check-circle"
                                            style="color: #ffcc00; font-size: 20px;"></i> Cultural Exhibition & Displays
                                    </li>
                                    <li class="wow slideUp" data-delay=".8"
                                        style="margin-bottom: 15px; display: flex; align-items: center; gap: 15px; font-weight: 500;">
                                        <i class="fa-solid fa-check-circle"
                                            style="color: #ffcc00; font-size: 20px;"></i> Community Health Initiatives
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Race Category / Stats Section -->
    <section id="km-stats-section" class="stats-section fix"
        style="background: #111; padding: 60px 0; position: relative;">
        <div id="race-category-anchor" style="position: absolute; top: -100px;"></div>
        <div class="container">
            <div class="section-title text-center mb-4 wow slideUp">
                <span class="sub-title" style="color: #ffcc00 !important; font-size: 14px;">Event Highlights</span>
                <h2 class="text-white" style="font-weight: 800; font-size: 32px;">Race <span
                        style="color: #ffcc00;">Category</span></h2>
            </div>
            <div class="row text-center g-4">
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 wow slideUp" data-delay=".2">
                    <div class="stat-item">
                        <h2 class="text-white" style="font-weight: 800;">1000</h2>
                        <p
                            style="color: #ffcc00; text-transform: uppercase; letter-spacing: 1px; font-size: 12px; font-weight: 700;">
                            2.5 KM Fun Run</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 wow slideUp" data-delay=".3">
                    <div class="stat-item">
                        <h2 class="text-white" style="font-weight: 800;">1000</h2>
                        <p
                            style="color: #ffcc00; text-transform: uppercase; letter-spacing: 1px; font-size: 12px; font-weight: 700;">
                            5 KM Classic</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 wow slideUp" data-delay=".4">
                    <div class="stat-item">
                        <h2 class="text-white" style="font-weight: 800;">1250</h2>
                        <p
                            style="color: #ffcc00; text-transform: uppercase; letter-spacing: 1px; font-size: 12px; font-weight: 700;">
                            10 KM Challenge</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 wow slideUp" data-delay=".5">
                    <div class="stat-item">
                        <h2 class="text-white" style="font-weight: 800;">1250</h2>
                        <p
                            style="color: #ffcc00; text-transform: uppercase; letter-spacing: 1px; font-size: 12px; font-weight: 700;">
                            21 KM Half</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 wow slideUp" data-delay=".6">
                    <div class="stat-item">
                        <h2 class="text-white" style="font-weight: 800;">500</h2>
                        <p
                            style="color: #ffcc00; text-transform: uppercase; letter-spacing: 1px; font-size: 12px; font-weight: 700;">
                            42 KM Full</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 wow slideUp" data-delay=".7">
                    <div class="stat-item">
                        <h2 class="text-white" style="font-weight: 800;">5000</h2>
                        <p
                            style="color: #ffcc00; text-transform: uppercase; letter-spacing: 1px; font-size: 12px; font-weight: 700;">
                            Participants</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="custom-partners-section" class="brand-section section-padding fix"
        style="background: #f9f9f9; border-top: 1px solid #eee;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span class="sub-title">Our Partners</span>
                <h2>Proudly <span>Supported By</span></h2>
            </div>
            <div class="swiper brand-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-img"
                            style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 140px; padding: 10px;">
                            <img src="/img/logo/nenbo ya taifa.png" alt="Serikali ya Tanzania"
                                style="max-height: 80px; width: auto; transition: all 0.3s; object-fit: contain;">
                            <p style="font-size: 13px; margin-top: 15px; color: #666; font-weight: 500;">Serikali ya
                                Tanzania</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-img"
                            style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 140px; padding: 10px;">
                            <img src="/img/logo/Bakita.jpeg" alt="BAKITA"
                                style="max-height: 80px; width: auto; transition: all 0.3s; object-fit: contain;">
                            <p style="font-size: 13px; margin-top: 15px; color: #666; font-weight: 500;">BAKITA</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-img"
                            style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 140px; padding: 10px;">
                            <img src="/img/logo/Asa.png" alt="ASA"
                                style="max-height: 80px; width: auto; transition: all 0.3s; object-fit: contain;">
                            <p style="font-size: 13px; margin-top: 15px; color: #666; font-weight: 500;">ASA</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-img"
                            style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 140px; padding: 10px;">
                            <img src="/img/logo/EmCa.png" alt="EmCa Techonologies"
                                style="max-height: 80px; width: auto; transition: all 0.3s; object-fit: contain;">
                            <p style="font-size: 13px; margin-top: 15px; color: #666; font-weight: 500;">EmCa
                                Techonologies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Showcase Marquee -->
    <section class="showcase-section fix" style="background: #fff; border-bottom: 1px solid #eee; padding-top: 60px;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span class="sub-title">Gallery</span>
                <h2 style="font-weight: 800;">Latest <span>Events</span></h2>
            </div>
        </div>
        <div class="showcase-marquee">
            <div class="marquee-content">
                <div class="marquee-item">
                    <img src="/img/project/01.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/02.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/03.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/04.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/05.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/06.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/07.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/08.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/09.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
            </div>
            <!-- Duplicate content for seamless infinite loop -->
            <div class="marquee-content" aria-hidden="true">
                <div class="marquee-item">
                    <img src="/img/project/01.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/02.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/03.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/04.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/05.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/06.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/07.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/08.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
                <div class="marquee-item">
                    <img src="/img/project/09.jpg" alt="Showcase">
                    <div class="marquee-overlay">Swahili Marathon 2024</div>
                </div>
            </div>
        </div>
    </section>

    <!-- China International Marathon Announcement -->
    <section id="china-announcement-section" class="offer-section fix section-padding"
        style="background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('/img/header/header-1.jpeg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title"
                    style="color: #ffcc00 !important; font-weight: 700; letter-spacing: 2px;">INTERNATIONAL EVENT</span>
                <h2 class="text-white" style="font-weight: 900;">China International Marathon</h2>
                <div style="width: 80px; height: 4px; background: #ffcc00; margin: 20px auto;"></div>
                <p class="text-white mt-4"
                    style="font-size: 20px; max-width: 800px; margin: 0 auto; line-height: 1.6; opacity: 0.9;">
                    Exciting news! We are organizing an international marathon group for our top runners to compete in
                    China.
                    Be part of this global experience.
                </p>
                <div class="mt-5">
                    <span class="text-white"
                        style="font-weight: 700; text-transform: uppercase; background: rgba(255,204,0,0.2); padding: 12px 30px; border-radius: 50px; border: 1px solid #ffcc00;">Coming
                        Soon - Stay Tuned</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Race Fees Section -->
    <section id="race-pricing-section" class="offer-section fix"
        style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%); padding: 30px 0 60px;">
        <div class="container">
            <div class="section-title text-center mb-1">
                <span class="sub-title">Race Categories</span>
                <h2 style="font-weight: 800; color: #ffcc00; margin-bottom: 0;">Price</h2>
            </div>

            <!-- Currency Toggle -->
            <div class="currency-switch-wrapper wow slideUp">
                <span class="currency-label TZS active">TZS</span>
                <label class="switch">
                    <input type="checkbox" id="currency-toggle">
                    <span class="switch-slider"></span>
                </label>
                <span class="currency-label USD">USD</span>
            </div>

            <div class="row g-4 justify-content-center mt-0">
                <div class="col-xl-4 col-lg-6">
                    <div class="offer-items text-center p-4 wow slideUp" data-delay=".2"
                        style="border-radius: 20px; background: #fff; box-shadow: 0 15px 40px rgba(0,0,0,0.08); transition: all 0.4s ease; border: 1px solid #eee; border-top: 6px solid #ffcc00;">
                        <div class="icon"
                            style="width: 70px; height: 70px; line-height: 70px; margin: 0 auto 25px; background: #ffcc00; color: #000; border-radius: 50%; font-size: 26px; box-shadow: 0 5px 15px rgba(255,204,0,0.3);">
                            <i class="fa-solid fa-person-running"></i>
                        </div>
                        <h4 style="font-weight: 800; margin-bottom: 12px; font-size: 22px; color: #111;">Adult Category
                        </h4>
                        <p style="color: #666; margin-bottom: 25px; font-size: 15px; line-height: 1.6;">Full access to
                            the main event,
                            race kit, and participation medal.</p>
                        <h2 class="price-display"
                            style="font-weight: 900; color: #111; margin-bottom: 30px; font-size: 32px;"
                            data-tzs="40,000" data-usd="16.29">
                            <span class="price-value">40,000</span> <small class="currency-code"
                                style="font-size: 16px; color: #ffcc00; font-weight: 700; margin-left: 5px;">TZS</small>
                        </h2>
                        <a href="/register" class="theme-btn"
                            style="width: 100%; padding: 14px 30px; border-radius: 10px; font-weight: 700;">Register
                            Online
                            <i class="fa-solid fa-arrow-right-long" style="margin-left: 10px;"></i></a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="offer-items text-center p-4 wow slideUp" data-delay=".3"
                        style="border-radius: 20px; background: #fff; box-shadow: 0 15px 40px rgba(0,0,0,0.08); transition: all 0.4s ease; border: 1px solid #eee; border-top: 6px solid #ff8c42;">
                        <div class="icon"
                            style="width: 70px; height: 70px; line-height: 70px; margin: 0 auto 25px; background: #f8f9fa; color: #333; border-radius: 50%; font-size: 26px; border: 1px solid #eee;">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h4 style="font-weight: 800; margin-bottom: 12px; font-size: 22px; color: #111;">Student
                            Category</h4>
                        <p style="color: #666; margin-bottom: 25px; font-size: 15px; line-height: 1.6;">Special
                            discounted rate for
                            students with valid identification.</p>
                        <h2 class="price-display"
                            style="font-weight: 900; color: #111; margin-bottom: 30px; font-size: 32px;"
                            data-tzs="20,000" data-usd="8.15">
                            <span class="price-value">20,000</span> <small class="currency-code"
                                style="font-size: 16px; color: #ff8c42; font-weight: 700; margin-left: 5px;">TZS</small>
                        </h2>
                        <a href="/register" class="theme-btn style-2"
                            style="width: 100%; padding: 14px 30px; border-radius: 10px; font-weight: 700;">Register
                            Online <i class="fa-solid fa-arrow-right-long" style="margin-left: 10px;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Premium Footer Section -->
    <footer class="footer-area fix">
        <div class="footer-top">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow slideUp" data-delay=".2">
                        <div class="footer-widget footer-about">
                            <div class="footer-logo mb-4">
                                <img src="/img/logo/swahili Marathon.jpeg" alt="Logo"
                                    style="max-height: 70px; border-radius: 8px;">
                            </div>
                            <p>The Swahili Marathon is a premier athletic event celebrating culture, health, and
                                endurance. Join us for an unforgettable experience through scenic routes of Tanzania.
                            </p>
                            <div class="footer-social">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-6 wow slideUp" data-delay=".4">
                        <div class="footer-widget footer-links">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="{{ url('/') }}"><i class="fa-solid fa-chevron-right"></i> Home</a></li>
                                <li><a href="#marathon-background-section"><i class="fa-solid fa-chevron-right"></i>
                                        About Us</a></li>
                                <li><a href="#race-category-anchor"><i class="fa-solid fa-chevron-right"></i> Race
                                        Categories</a></li>
                                <li><a href="/register"><i class="fa-solid fa-chevron-right"></i> Register Now</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 wow slideUp" data-delay=".6">
                        <div class="footer-widget footer-links">
                            <h4>Race Categories</h4>
                            <ul>
                                <li><a href="#"><i class="fa-solid fa-chevron-right"></i> 2.5 KM Fun Run</a></li>
                                <li><a href="#"><i class="fa-solid fa-chevron-right"></i> 5 KM Classic</a></li>
                                <li><a href="#"><i class="fa-solid fa-chevron-right"></i> 10 KM Challenge</a></li>
                                <li><a href="#"><i class="fa-solid fa-chevron-right"></i> 21 KM Half Marathon</a></li>
                                <li><a href="#"><i class="fa-solid fa-chevron-right"></i> 42 KM Full Marathon</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 wow slideUp" data-delay=".8">
                        <div class="footer-widget footer-contact">
                            <h4>Contact Us</h4>
                            <ul class="footer-contact-info">
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <div>+255 755 165 284<br>+255 757 979 611</div>
                                </li>
                                <li>
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href="mailto:info@swahilimarathon.com"
                                        style="color: #aaa;">info@swahilimarathon.com</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-location-dot"></i>
                                    <div>Dar es Salaam, Tanzania</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <p>© 2026 <strong>Swahili Marathon</strong>. All Rights Reserved.</p>
                    <div class="powered-by">
                        Powered by <a href="https://emca.tech" target="_blank">EmCa Techonologies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back-to-top"><i class="fa-solid fa-arrow-up"></i></div>

    <script>
        // MASTER GUARD: Prevent multiple script executions or overlapping intervals
        (function () {
            if (window.SM_MASTER_INIT_DONE) {
                console.warn("Master initialization already running, skipping script execution.");
                return;
            }
            window.SM_MASTER_INIT_DONE = true;
            console.log("Starting Marathon Master Guard...");

            // State management
            const state = {
                heroInjected: false,
                partnersInjected: false,
                topBarInjected: false,
                headerInjected: false,
                oneTimeDone: false,
                updateRunning: false
            };

            function updateBranding() {
                const replaceText = (node) => {
                    if (node.nodeType === 3) {
                        const oldText = node.nodeValue;
                        const newText = oldText
                            .replace(/Marathon App/gi, 'Swahili Marathon')
                            .replace(/SMRMS/gi, 'Swahili Marathon')
                            .replace(/info@example\.com|example\.com/gi, 'info@swahilimarathon.com')
                            .replace(/123-456-7890|000-000-0000/gi, '+255 755 165 284 | +255 757 979 611')
                            .replace(/#1d8f2c/gi, '#ffffff')
                            .replace(/\bLogin\b/g, 'Register');
                        if (oldText !== newText) node.nodeValue = newText;
                    } else {
                        node.childNodes.forEach(replaceText);
                    }
                };

                document.querySelectorAll('h1, h2, h3, h4, h5, p, span, a').forEach(node => {
                    if (node.id === 'custom-top-bar' || node.closest('#custom-top-bar')) return;
                    if (node.childNodes.length > 0) replaceText(node);
                });

                // Update Logo
                document.querySelectorAll('.logo img, .header-logo img, .navbar-brand img, .footer-widget img').forEach(img => {
                    if (!img.src.includes('swahili Marathon.jpeg') && !img.closest('#custom-floating-header')) {
                        img.src = '/img/logo/swahili Marathon.jpeg';
                        img.style.maxHeight = '60px';
                        img.style.borderRadius = '5px';
                    }
                });
            }

            function injectPartners() {
                if (typeof Swiper !== 'undefined' && !window.brandSwiperInit) {
                    new Swiper('.brand-slider', {
                        slidesPerView: 2,
                        spaceBetween: 30,
                        loop: true,
                        autoplay: { delay: 3000 },
                        breakpoints: {
                            640: { slidesPerView: 2 },
                            768: { slidesPerView: 3 },
                            1024: { slidesPerView: 4 },
                        }
                    });
                    window.brandSwiperInit = true;
                }
            }

            function setupHeaderLogic() {
                const header = document.getElementById('custom-floating-header');
                const toggle = document.getElementById('mobile-menu-toggle');
                const sideMenu = document.getElementById('mobile-side-menu');
                const overlay = document.getElementById('mobile-menu-overlay');
                const closeBtn = sideMenu ? sideMenu.querySelector('.close-btn') : null;

                const toggleMenu = (open) => {
                    if (sideMenu) sideMenu.classList.toggle('active', open);
                    if (overlay) overlay.classList.toggle('active', open);
                    document.body.style.overflow = open ? 'hidden' : '';
                };

                if (toggle) toggle.onclick = () => toggleMenu(true);
                if (closeBtn) closeBtn.onclick = () => toggleMenu(false);
                if (overlay) overlay.onclick = () => toggleMenu(false);
                if (sideMenu) {
                    sideMenu.querySelectorAll('a').forEach(link => link.onclick = () => toggleMenu(false));
                }

                window.addEventListener('scroll', () => {
                    if (!header) return;
                    if (window.scrollY > 50) {
                        header.style.background = 'rgba(5, 5, 5, 0.97)';
                        header.style.width = '94%';
                    } else {
                        header.style.background = 'rgba(10, 10, 10, 0.9)';
                        header.style.width = '92%';
                    }
                });
            }

            function setupHeroSlider() {
                if (typeof Swiper !== 'undefined' && !window.heroSwiperInit) {
                    new Swiper('#custom-hero-slider .hero-slider', {
                        loop: true,
                        autoplay: { delay: 4000, disableOnInteraction: false },
                        pagination: { el: '.swiper-pagination', clickable: true },
                        speed: 1000,
                        slidesPerView: 1,
                        watchSlidesProgress: true
                    });
                    window.heroSwiperInit = true;
                }
            }

            function setupBackToTop() {
                const btt = document.getElementById('back-to-top');
                if (btt) {
                    btt.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
                    window.addEventListener('scroll', () => {
                        if (window.scrollY > 400) btt.classList.add('visible');
                        else btt.classList.remove('visible');
                    });
                }
            }


            function setupCurrencyToggle() {
                const toggle = document.getElementById('currency-toggle');
                const tzsLabel = document.querySelector('.currency-label.TZS');
                const usdLabel = document.querySelector('.currency-label.USD');
                if (!toggle) return;

                // Fetch live exchange rate from API
                fetch('/api/exchange-rate')
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.rate) {
                            const rate = data.rate;
                            document.querySelectorAll('.price-display').forEach(display => {
                                const tzsValue = parseFloat(display.dataset.tzs.replace(/,/g, ''));
                                if (!isNaN(tzsValue)) {
                                    // Calculate USD with 2 decimal places for precision as per user request
                                    const usdValue = (tzsValue / rate).toFixed(2);
                                    display.dataset.usd = usdValue;
                                }
                            });
                        }
                    })
                    .catch(err => console.error("Currency API Error:", err));

                toggle.addEventListener('change', function () {
                    const isUSD = this.checked;
                    document.querySelectorAll('.price-display').forEach(display => {
                        const priceValue = display.querySelector('.price-value');
                        const currencyCode = display.querySelector('.currency-code');
                        if (isUSD) {
                            priceValue.textContent = display.dataset.usd;
                            currencyCode.textContent = 'USD';
                        } else {
                            priceValue.textContent = display.dataset.tzs;
                            currencyCode.textContent = 'TZS';
                        }
                    });

                    if (isUSD) {
                        tzsLabel.classList.remove('active');
                        usdLabel.classList.add('active');
                    } else {
                        tzsLabel.classList.add('active');
                        usdLabel.classList.remove('active');
                    }
                });
            }


            function cleanTemplateConflicts() {
                const conflictingSelectors = ['.header-top', '.header-top-1', '.header-top-2', '.top-bar-area', '.header-top-area', '.tp-header-top-area', '.top-bar', '.header-top-left', '.top-left', '.header-top-right', '.top-right', '.header-social'];
                conflictingSelectors.forEach(sel => {
                    document.querySelectorAll(sel).forEach(el => {
                        if (!el.closest('#custom-top-bar') && el.id !== 'custom-top-bar') el.remove();
                    });
                });
            }

            const safeLoop = () => {
                if (state.updateRunning) return;
                state.updateRunning = true;
                try {
                    setupHeroSlider();
                    injectPartners();
                    setupHeaderLogic();
                    setupBackToTop();
                    setupCurrencyToggle();
                } catch (e) {
                    console.error("Marathon Error:", e);
                } finally {
                    state.updateRunning = false;
                    setTimeout(safeLoop, 3000);
                }
            };

            if (document.readyState === 'loading') {
                window.addEventListener('load', safeLoop);
            } else {
                safeLoop();
            }

            setInterval(() => {
                const bars = document.querySelectorAll('#custom-top-bar');
                if (bars.length > 1) {
                    for (let i = 1; i < bars.length; i++) bars[i].remove();
                }
            }, 500);
        })();
    </script>
</body>

</html>