<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Swahili Marathon - Registration & Management</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

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
            /* Yellow from logo */
            --secondary-color: #ff8c42 !important;
            /* Orange from logo */
            --theme-color: #ffcc00 !important;
            --main-color: #ffcc00 !important;
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

        .submenu,
        .megamenu {
            display: none !important;
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
            #custom-top-bar .top-bar-right {
                display: none !important;
            }

            #custom-top-bar .top-bar-left {
                gap: 15px;
                justify-content: center;
                width: 100%;
            }

            #custom-top-bar .top-bar-left a {
                font-size: 11.5px;
                font-weight: 600;
            }
        }

        /* ================================================
           FLOATING NAVIGATION PILL - Polished Premium Design
        ================================================ */
        #custom-floating-header {
            display: none;
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
                padding: 8px 10px 8px 16px;
                top: 48px;
                border-radius: 20px;
            }

            #custom-floating-header .nav-links-pill {
                display: none;
            }

            #custom-floating-header .logo-box-pill img {
                height: 36px;
            }

            #mobile-menu-toggle {
                display: flex !important;
            }

            #custom-floating-header .register-btn {
                padding: 8px 18px;
                font-size: 11px;
                margin-right: 10px;
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
        @media (max-width: 991px) {
            #custom-hero-section {
                height: 80vh;
                text-align: center;
            }

            #custom-hero-section .hero-container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            #custom-hero-section h1 {
                font-size: 3.5rem !important;
            }

            #custom-hero-section p {
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

        /* Force hide any template hero/sliders */
        .hero-section,
        .slider-area,
        .hero-1,
        .hero-2,
        .hero-3,
        .banner-area,
        .tp-hero-area,
        .hero-content {
            display: none !important;
            visibility: hidden !important;
            height: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* PARTNERS SECTION */
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

    <script>
        // EMERGENCY OVERRIDE JS - Runs after React mounts
        function updateBranding() {
            // Find and replace "Marathon App" or "SMRMS" in titles/hero
            const replaceText = (node) => {
                if (node.nodeType === 3) { // Text node
                    const oldText = node.nodeValue;
                    const newText = oldText
                        .replace(/Marathon App/gi, 'Swahili Marathon')
                        .replace(/SMRMS/gi, 'Swahili Marathon')
                        .replace(/info@example\.com|example\.com/gi, 'info@swahilimarathon.com')
                        .replace(/123-456-7890|000-000-0000/gi, '+255 755 165 284 | +255 654 507 505')
                        .replace(/#1d8f2c/gi, '#ffffff')
                        .replace(/\bLogin\b/g, 'Register');
                    if (oldText !== newText) node.nodeValue = newText;
                } else {
                    node.childNodes.forEach(replaceText);
                }
            };
            // Replace in critical areas
            document.querySelectorAll('.hero-content, .header, .logo, .navbar, .breadcrumb, h1, h2, h3, h4, h5, p, span, a').forEach(node => {
                if (node.childNodes.length > 0) {
                    replaceText(node);
                }
            });

            // Specific Top Bar Contact Fixes
            document.querySelectorAll('.header-top, .top-bar, .top-left, .header-top-left, .top-bar-left, .header-top-right, .top-right, .header-social, [class*="top-right"]').forEach(box => {
                // STOP using innerHTML.replace on parents as it causes re-renders and duplication
                // Instead, find and update specific text nodes or elements
                box.querySelectorAll('*').forEach(el => {
                    const html = el.innerHTML;
                    if (html.includes('info@example.com') || html.includes('example.com')) {
                        el.innerHTML = html.replace(/info@example\.com|example\.com/gi, 'info@swahilimarathon.com');
                    }
                    if (html.includes('123-456-7890') || html.includes('000-000-0000')) {
                        el.innerHTML = html.replace(/123-456-7890|000-000-0000/g, '+255 755 165 284 | +255 654 507 505');
                    }
                });

                // Force individual element styles too
                box.querySelectorAll('a, span, p, li, div').forEach(el => {
                    // If it contains "Follow Us" or social icons, force dark background
                    if (el.innerText.includes('Follow Us') || el.querySelector('i[class*="fa-"]')) {
                        el.style.setProperty('background-color', '#1a222a', 'important');
                        el.style.setProperty('background', '#1a222a', 'important');
                    }

                    // Force white if it matches the user's specific green hex
                    const style = window.getComputedStyle(el);
                    const isTargetGreen = (str) => {
                        return str && (
                            str.includes('29, 143, 44') ||
                            str.includes('1d8f2c') ||
                            str.includes('1D8F2C')
                        );
                    };

                    if (isTargetGreen(style.backgroundColor) || isTargetGreen(el.style.backgroundColor)) {
                        el.style.setProperty('background-color', '#ffffff', 'important');
                        el.style.setProperty('color', '#000000', 'important');
                    }
                    if (isTargetGreen(style.color) || isTargetGreen(el.style.color)) {
                        el.style.setProperty('color', '#ffffff', 'important');
                    }

                    el.style.setProperty('color', '#ffffff', 'important');
                    if (el.innerText.includes('example.com')) {
                        el.innerText = 'info@swahilimarathon.com';
                        if (el.tagName === 'A') el.href = 'mailto:info@swahilimarathon.com';
                    }
                });

                // Also force the container itself
                box.style.setProperty('background-color', '#1a222a', 'important');
                box.style.setProperty('background', '#1a222a', 'important');
            });

            // About Us Video Injection & Styling
            document.querySelectorAll('.about-section, #about, .about-area').forEach(section => {
                if (!section.id) section.id = 'about';
                // Remove section-wide overrides
                section.style.backgroundColor = '';
                section.style.color = '';

                // Target the "About Us" sub-title specifically to be yellow
                section.querySelectorAll('.sub-title, span[class*="subtitle"], span, b, i').forEach(el => {
                    if (el.innerText.toUpperCase().trim() === 'ABOUT US') {
                        el.style.setProperty('color', '#ffcc00', 'important');
                        el.style.textTransform = 'uppercase';
                        el.style.fontWeight = '700';
                        el.style.letterSpacing = '2px';
                    }
                });

                // Target green icon circles in About Us
                section.querySelectorAll('.icon, .icon-items .icon, [class*="icon"]').forEach(icon => {
                    const style = window.getComputedStyle(icon);
                    if (style.backgroundColor.includes('rgb(63, 171, 48)') || style.backgroundColor.includes('green')) {
                        icon.style.setProperty('background-color', '#ffcc00', 'important');
                        icon.style.setProperty('background', '#ffcc00', 'important');
                    }
                    const i = icon.querySelector('i');
                    if (i) i.style.setProperty('color', '#000', 'important');
                });

                // Update about-img mask/shadow if needed
                const imgContainer = section.querySelector('.about-image-items, .about-img, .about-image');
                if (imgContainer && !section.querySelector('video')) {
                    imgContainer.innerHTML = `
                        <div class="video-item wow slideLeft" data-delay=".3" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                            <video autoplay muted loop playsinline style="width: 100%; height: auto; display: block;">
                                <source src="/img/about/about-us.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    `;
                    imgContainer.style.background = 'none';
                    imgContainer.classList.add('p-0');
                }
            });

            // Moved KM Statistics and Latest Projects below updateBranding for correct scope


            // Swahili Marathon Background Injection
            if (!document.getElementById('marathon-background-section')) {
                const projectSection = document.getElementById('latest-projects-section');
                if (projectSection) {
                    const backgroundHtml = `
                        <div id="marathon-background-section" class="section-padding" style="background: #fff; padding: 100px 0; color: #333;">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 text-center">
                                        <h2 style="color: #2c3e50; font-weight: 800; font-size: 36px; margin-bottom: 5px;">Swahili Marathon: A Cultural & Athletic Celebration</h2>
                                        <div style="width: 50px; height: 3px; background: #ffcc00; margin: 15px auto 20px;"></div>
                                        <p style="color: #5d6d7e; text-transform: uppercase; font-weight: 700; letter-spacing: 2px; font-size: 14px; margin-bottom: 40px;">PROJECT BACKGROUND</p>
                                        
                                        <div class="text-content" style="font-size: 16px; line-height: 1.8; color: #555; text-align: left; max-width: 900px; margin: 0 auto;">
                                            <p style="margin-bottom: 25px;">The Swahili Marathon is a unique celebration that brings together fitness enthusiasts, professional athletes, and cultural seekers from across Tanzania, Africa, and beyond. Set against the vibrant backdrop of coastal heritage and local spirit, this event combines athletic excellence with community empowerment.</p>
                                            
                                            <p style="margin-bottom: 25px;">Marathons hold a timeless charm in Tanzania, representing endurance, health milestones, and nostalgic memories of shared local triumphs. The Swahili Marathon offers a platform not only to challenge physical limits but also to inspire younger generations to appreciate the value of health and sportsmanship.</p>
                                            
                                            <p>Alongside the race, the marathon experience allows participants and visitors to embark on scenic routes, cultural tours, and wildlife excursions in the surrounding regions, making the event both an athletic spectacle and an unforgettable travel experience.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    projectSection.insertAdjacentHTML('afterend', backgroundHtml);
                }
            }

            // China Marathon Announcement Injection
            if (!document.getElementById('china-announcement-section')) {
                const backgroundSection = document.getElementById('marathon-background-section');
                if (backgroundSection) {
                    const announcementHtml = `
                        <div id="china-announcement-section" class="section-padding" style="background: #fff; padding: 20px 0 100px;">
                            <div class="container">
                                <div class="announcement-box" style="background: #1a1a1a; border: 2px solid #940000; border-radius: 20px; padding: 40px; color: #fff; position: relative; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                    <button type="button" style="position: absolute; top: 20px; right: 20px; background: none; border: none; color: #777; font-size: 24px; cursor: pointer; transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#777'" onclick="document.getElementById('china-announcement-section').style.display='none'">&times;</button>
                                    
                                    <div class="badge-container" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(148, 0, 0, 0.2); border: 1px solid #940000; padding: 6px 16px; border-radius: 50px; margin-bottom: 25px;">
                                        <i class="fa-solid fa-earth-africa" style="color: #ffcc00;"></i>
                                        <span style="color: #ffcc00; font-weight: 800; font-size: 11px; text-transform: uppercase; letter-spacing: 1.5px;">COMING SOON · INTERNATIONAL EVENT</span>
                                    </div>
                                    
                                    <h2 style="color: #fff; font-weight: 800; font-size: 32px; margin-bottom: 20px;">China International Marathon</h2>
                                    
                                    <p style="font-size: 18px; line-height: 1.6; color: rgba(255,255,255,0.8); margin-bottom: 30px;">
                                        We are excited to announce that an <span style="color: #ffcc00; font-weight: 700;">international marathon event in China</span> is being organised for our runners! 
                                        Registration will officially open once the event date is confirmed. <span style="color: #ffcc00; font-weight: 700;">Stay tuned for updates.</span>
                                    </p>
                                    
                                    <div class="announcement-footer" style="display: flex; flex-wrap: wrap; gap: 20px 40px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 25px;">
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <i class="fa-solid fa-location-dot" style="color: #940000; font-size: 18px;"></i>
                                            <span style="font-size: 15px; color: rgba(255,255,255,0.7); font-weight: 500;">China</span>
                                        </div>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <i class="fa-solid fa-calendar-days" style="color: #940000; font-size: 18px;"></i>
                                            <span style="font-size: 15px; color: rgba(255,255,255,0.7); font-weight: 500;">Date: To Be Announced</span>
                                        </div>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <i class="fa-solid fa-users" style="color: #940000; font-size: 18px;"></i>
                                            <span style="font-size: 15px; color: rgba(255,255,255,0.7); font-weight: 500;">Open to All Categories</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    backgroundSection.insertAdjacentHTML('afterend', announcementHtml);
                }
            }

            // Pricing Section Injection
            if (!document.getElementById('race-pricing-section')) {
                const announcementSection = document.getElementById('china-announcement-section');
                if (announcementSection) {
                    const pricingHtml = `
                        <div id="race-pricing-section" class="section-padding" style="background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), url('/img/header/header-4.jpeg'); background-size: cover; background-position: center; background-attachment: fixed; padding: 100px 0; color: #fff; border-top: 1px solid #333;">
                            <div class="container">
                                <div class="section-title text-center mb-5">
                                    <span class="sub-title" style="color: #ffcc00; text-transform: uppercase; font-weight: 700; letter-spacing: 2px; font-size: 14px;">Registration Packages</span>
                                    <h2 style="color: #fff; font-weight: 800; font-size: 36px; margin-top: 10px;">Race Fees</h2>
                                    <p style="margin-top: 15px; color: #ccc;">Choose your category and join the movement.</p>
                                    
                                    <!-- Currency Toggle -->
                                    <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin-top: 30px;">
                                        <span style="font-weight: 700; color: #fff; font-size: 14px;">TZS</span>
                                        <label class="currency-switch" style="position: relative; display: inline-block; width: 50px; height: 26px; margin: 0;">
                                            <input type="checkbox" id="currency-toggle" style="opacity: 0; width: 0; height: 0;">
                                            <span class="slider round" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 34px;"></span>
                                        </label>
                                        <span style="font-weight: 700; color: #2c3e50; font-size: 14px;">USD</span>
                                    </div>
                                </div>
                                
                                <div class="row g-4 justify-content-center">
                                    <!-- Adult Card -->
                                    <div class="col-lg-5 col-md-6">
                                        <div class="pricing-card" style="background: #fff; border-radius: 20px; padding: 50px 40px; text-align: center; border: 1px solid #eee; transition: all 0.4s ease; position: relative; overflow: hidden; height: 100%; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                                            <div style="background: #940000; color: #fff; transform: rotate(45deg); position: absolute; top: 20px; right: -35px; width: 150px; padding: 5px; font-weight: 700; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; z-index: 2;">Popular</div>
                                            <h3 style="font-weight: 800; color: #2c3e50; margin-bottom: 20px; font-size: 24px;">ADULT</h3>
                                            <div class="price-box" style="margin-bottom: 30px; display: flex; align-items: center; justify-content: center;">
                                                <span class="amount" id="adult-price" style="font-size: 48px; font-weight: 900; color: #940000; transition: all 0.3s;">40,000</span>
                                                <span class="currency" id="adult-currency" style="font-size: 18px; font-weight: 700; color: #940000; margin-left: 8px;">TZS</span>
                                            </div>
                                            <ul style="list-style: none; padding: 0; margin-bottom: 40px; text-align: left; display: inline-block; width: 100%;">
                                                <li style="margin-bottom: 15px; display: flex; align-items: center; font-size: 15px; color: #555;"><i class="fa-solid fa-circle-check" style="color: #ffcc00; margin-right: 12px;"></i> Official Race T-Shirt</li>
                                                <li style="margin-bottom: 15px; display: flex; align-items: center; font-size: 15px; color: #555;"><i class="fa-solid fa-circle-check" style="color: #ffcc00; margin-right: 12px;"></i> Finisher's Medal</li>
                                                <li style="margin-bottom: 15px; display: flex; align-items: center; font-size: 15px; color: #555;"><i class="fa-solid fa-circle-check" style="color: #ffcc00; margin-right: 12px;"></i> Digital Certificate</li>
                                                <li style="margin-bottom: 15px; display: flex; align-items: center; font-size: 15px; color: #555;"><i class="fa-solid fa-circle-check" style="color: #ffcc00; margin-right: 12px;"></i> Refreshments & Goodie Bag</li>
                                            </ul>
                                            <a href="/register" class="btn" style="background: #111; color: #fff; border-radius: 50px; padding: 16px 40px; font-weight: 700; width: 100%; display: block; border: none; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s;">Register Now</a>
                                        </div>
                                    </div>
                                    
                                    <!-- Student Card -->
                                    <div class="col-lg-5 col-md-6">
                                        <div class="pricing-card" style="background: #fff; border-radius: 20px; padding: 50px 40px; text-align: center; border: 1px solid #eee; transition: all 0.4s ease; height: 100%; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                                            <h3 style="font-weight: 800; color: #2c3e50; margin-bottom: 20px; font-size: 24px;">STUDENT</h3>
                                            <div class="price-box" style="margin-bottom: 30px; display: flex; align-items: center; justify-content: center;">
                                                <span class="amount" id="student-price" style="font-size: 48px; font-weight: 900; color: #2c3e50; transition: all 0.3s;">20,000</span>
                                                <span class="currency" id="student-currency" style="font-size: 18px; font-weight: 700; color: #2c3e50; margin-left: 8px;">TZS</span>
                                            </div>
                                            <ul style="list-style: none; padding: 0; margin-bottom: 40px; text-align: left; display: inline-block; width: 100%;">
                                                <li style="margin-bottom: 15px; display: flex; align-items: center; font-size: 15px; color: #555;"><i class="fa-solid fa-circle-check" style="color: #ffcc00; margin-right: 12px;"></i> Official Race T-Shirt</li>
                                                <li style="margin-bottom: 15px; display: flex; align-items: center; font-size: 15px; color: #555;"><i class="fa-solid fa-circle-check" style="color: #ffcc00; margin-right: 12px;"></i> Finisher's Medal</li>
                                                <li style="margin-bottom: 15px; display: flex; align-items: center; font-size: 15px; color: #555;"><i class="fa-solid fa-circle-check" style="color: #ffcc00; margin-right: 12px;"></i> Digital Certificate</li>
                                                <li style="margin-bottom: 15px; display: flex; align-items: center; font-size: 15px; color: #555;"><i class="fa-solid fa-circle-check" style="color: #ffcc00; margin-right: 12px;"></i> Student ID Required</li>
                                            </ul>
                                            <a href="/register" class="btn" style="background: #f8f9fa; color: #111; border: 2px solid #111; border-radius: 50px; padding: 14px 40px; font-weight: 700; width: 100%; display: block; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s;">Register Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <style>
                            .pricing-card:hover { transform: translateY(-12px); box-shadow: 0 25px 50px rgba(0,0,0,0.1); border-color: #940000; }
                            .pricing-card:hover .btn { background: #940000 !important; color: #fff !important; border-color: #940000 !important; }
                            .currency-switch input:checked + .slider { background-color: #940000; }
                            .currency-switch input:checked + .slider:before { transform: translateX(24px); }
                            .slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 4px; bottom: 4px; background-color: white; transition: .4s; border-radius: 50%; }
                        </style>
                    `;
                    announcementSection.insertAdjacentHTML('afterend', pricingHtml);

                    // Toggle Logic
                    const toggle = document.getElementById('currency-toggle');
                    if (toggle) {
                        let pricingData = {
                            adult: { tzs: '40,000', usd: '16' }, // Fallback
                            student: { tzs: '20,000', usd: '8' }  // Fallback
                        };

                        // Fetch real rate from API
                        fetch('/api/exchange-rate')
                            .then(response => response.json())
                            .then(data => {
                                if (data.rate) {
                                    const rate = parseFloat(data.rate);
                                    pricingData.adult.usd = (40000 / rate).toFixed(2);
                                    pricingData.student.usd = (20000 / rate).toFixed(2);
                                    console.log("Real-time exchange rate applied:", rate);
                                }
                            })
                            .catch(err => console.error("Could not fetch exchange rate:", err));

                        toggle.addEventListener('change', function () {
                            const isUsd = this.checked;
                            const adultPrice = document.getElementById('adult-price');
                            const studentPrice = document.getElementById('student-price');
                            const adultCurr = document.getElementById('adult-currency');
                            const studentCurr = document.getElementById('student-currency');

                            if (adultPrice && studentPrice) {
                                adultPrice.style.opacity = '0';
                                studentPrice.style.opacity = '0';

                                setTimeout(() => {
                                    adultPrice.innerText = isUsd ? pricingData.adult.usd : pricingData.adult.tzs;
                                    studentPrice.innerText = isUsd ? pricingData.student.usd : pricingData.student.tzs;
                                    adultCurr.innerText = isUsd ? 'USD' : 'TZS';
                                    studentCurr.innerText = isUsd ? 'USD' : 'TZS';
                                    adultPrice.style.opacity = '1';
                                    studentPrice.style.opacity = '1';
                                }, 200);
                            }
                        });
                    }
                }
            }

            // Fix About Us Icons and Buttons (Catching React renders)
            document.querySelectorAll('.about-icon-items').forEach(container => {
                container.classList.add('d-flex', 'align-items-start', 'gap-3');
                container.style.display = 'flex';
                container.style.gap = '20px';
                container.style.alignItems = 'flex-start';
                container.style.marginTop = '20px';
            });

            document.querySelectorAll('.icon-items, .about-icon-items .icon-items').forEach(item => {
                item.style.flex = '1';
                item.style.margin = '0';

                const h4 = item.querySelector('h4');
                const p = item.querySelector('p');
                if (h4) {
                    h4.style.fontSize = '16px';
                    h4.style.marginBottom = '5px';
                    if (p) p.style.fontSize = '13px';

                    if (h4.innerText.includes('Reliability') || h4.innerText.includes('Performance')) {
                        const iconDiv = item.querySelector('.icon');
                        if (iconDiv) {
                            iconDiv.innerHTML = '<i class="fa-solid fa-gauge-high" style="font-size: 24px; color: #000;"></i>';
                            iconDiv.style.minWidth = '40px';
                        }
                        if (p) p.innerText = 'Optimized for accuracy and speed.';
                    } else if (h4.innerText.includes('Support') || h4.innerText.includes('assistance')) {
                        const iconDiv = item.querySelector('.icon');
                        if (iconDiv) {
                            iconDiv.innerHTML = '<i class="fa-solid fa-headset" style="font-size: 24px; color: #000;"></i>';
                            iconDiv.style.minWidth = '40px';
                        }
                        if (p) p.innerText = '24/7 assistance for all queries.';
                    }
                }
            });

            // Remove Explore More button
            document.querySelectorAll('.theme-btn, .about-button, a').forEach(btn => {
                if (btn.innerText && btn.innerText.includes('Explore More')) {
                    btn.remove();
                }
            });

            // Remove dropdown icons
            document.querySelectorAll('.fa-angle-down, .fas.fa-angle-down').forEach(el => el.remove());

            // === MENU MANAGEMENT: Idempotent rebuild ===
            const navUl = document.querySelector('.main-menu nav > ul');
            if (navUl) {
                const wantedLabels = ['Home', 'About', 'Race Category', 'Contact'];
                const currentLabels = Array.from(navUl.querySelectorAll(':scope > li a'))
                    .map(a => a.innerText.replace(/\s+/g, ' ').trim());

                // Only rebuild if nav doesn't already match our desired links
                if (JSON.stringify(currentLabels) !== JSON.stringify(wantedLabels)) {
                    navUl.innerHTML = '';
                    const menuLinks = [
                        { label: 'Home', href: '{{ url("/") }}' },
                        { label: 'About', href: '#about' },
                        { label: 'Race Category', href: '#km-stats-section' },
                        { label: 'Contact', href: '#contact' },
                    ];
                    menuLinks.forEach(item => {
                        const li = document.createElement('li');
                        const a = document.createElement('a');
                        a.href = item.href;
                        a.innerText = item.label;

                        // Fix for multi-click issue: Intercept anchor clicks
                        if (item.href.startsWith('#')) {
                            a.onclick = (e) => {
                                e.preventDefault();
                                const target = document.querySelector(item.href);
                                if (target) {
                                    // No offset for footer/contact to ensure it doesn't land on the section above
                                    const isContact = item.href === '#contact';
                                    const headerOffset = isContact ? 0 : 100;
                                    const elementPosition = target.getBoundingClientRect().top;
                                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                                    window.scrollTo({
                                        top: offsetPosition,
                                        behavior: "smooth"
                                    });
                                }
                                window.history.pushState(null, null, item.href);
                            };
                        }

                        li.appendChild(a);
                        navUl.appendChild(li);
                    });

                    // Force hover color via JS as final fallback
                    navUl.querySelectorAll('li a').forEach(a => {
                        a.style.transition = 'color 0.3s ease';
                        a.onmouseenter = () => a.style.setProperty('color', '#ffcc00', 'important');
                        a.onmouseleave = () => a.style.setProperty('color', '#000000', 'important');
                    });
                }
            }

            // Update Button Link and Text (Login into Register)
            const registerUrl = "{{ url('/register') }}";
            document.querySelectorAll('.header-button a, .login-btn, a[href*="login"], a[href*="register"], .slider-btn, .hero-btn, a').forEach(btn => {
                const text = btn.innerText.trim();

                // Convert Login into Register
                if (text.includes('Login') || btn.href.includes('/login') || text.includes('Register') || btn.href.includes('/register') || btn.classList.contains('login-btn')) {
                    btn.href = registerUrl;
                    btn.onclick = (e) => { e.preventDefault(); window.location.href = registerUrl; };

                    // Kill all child text nodes that say Login
                    const walker = document.createTreeWalker(btn, NodeFilter.SHOW_TEXT, null, false);
                    let node;
                    while (node = walker.nextNode()) {
                        if (node.nodeValue.includes('Login')) node.nodeValue = 'Register';
                    }

                    const span = btn.querySelector('span');
                    if (span && span.innerText.includes('Login')) span.innerText = 'Register';

                    if (btn.innerText.includes('Login')) {
                        btn.innerHTML = btn.innerHTML.replace(/Login/g, 'Register');
                    }
                }

                if (text.includes('Learn More') || text.includes('Explore More')) {
                    btn.href = registerUrl;
                    btn.onclick = (e) => { e.preventDefault(); window.location.href = registerUrl; };
                    const span = btn.querySelector('span');
                    if (span) span.innerText = 'Register';
                    else btn.innerHTML = '<span>Register <i class="fa-solid fa-arrow-right-long"></i></span>';
                }
            });

            // Cleanup search-related elements that might be injected
            document.querySelectorAll('[class*="search"], [id*="search"]').forEach(el => {
                if (!el.innerText.includes('Home') && !el.innerText.includes('Login')) {
                    el.remove();
                }
            });

            // Update Logo
            document.querySelectorAll('.logo img, .header-logo img, .navbar-brand img').forEach(img => {
                if (!img.src.includes('asa-logo.png')) {
                    img.src = '/img/logo/asa-logo.png';
                    img.style.maxWidth = '150px';
                    img.style.maxHeight = '60px';
                    img.style.display = 'inline-block';
                }
            });

            // Mobile Toggle Cleanup (Desktop only)
            if (window.innerWidth >= 1200) {
                document.querySelectorAll('.mobile-menu-trigger, .offcanvas__trigger, .sidebar-trigger, .offcanvas-trigger, .hamburger-menu, .menu-trigger, .menu-tigger, .nav-toggler').forEach(el => {
                    el.style.display = 'none';
                    el.style.visibility = 'hidden';
                });
            }

            // === FOOTER CUSTOMIZATION ===
            // Clear existing contact ID to avoid conflicts
            document.querySelectorAll('#contact').forEach(el => el.id = '');

            // Target the actual contact bar more precisely
            let contactTarget = document.querySelector('.contact-info-area, [class*="contact-info"]');
            if (!contactTarget) {
                // Fallback: search for unique contact text
                document.querySelectorAll('span, p, a, div').forEach(el => {
                    if (el.innerText.includes('+255') || el.innerText.includes('info@')) {
                        const parent = el.closest('.container')?.parentElement || el.closest('section') || el.closest('div');
                        if (parent && !contactTarget) contactTarget = parent;
                    }
                });
            }
            if (contactTarget) contactTarget.id = 'contact';
            else {
                const footerFallback = document.querySelector('footer, .footer-area');
                if (footerFallback) footerFallback.id = 'contact';
            }
            // Strategy: Find headings by text (case-insensitive), walk up to column parent, replace content
            // Targeting h3, h4, and h5 to be safe
            const footerHeadings = document.querySelectorAll('footer h3, footer h4, footer h5, .footer-area h3, .footer-area h4, .footer-area h5, .footer-section h3, .footer-section h4, .footer-section h5');

            footerHeadings.forEach(h => {
                const text = h.innerText.trim().toUpperCase();
                // Find the column container (parent with 'col' in class)
                let col = h.closest('[class*="col-"]');
                if (!col) col = h.parentElement?.parentElement;

                // QUICK LINKS: Replace marathon links
                if (text.includes('QUICK LINKS') && col) {
                    h.innerText = 'Quick Links';
                    h.style.setProperty('color', '#ffcc00', 'important');
                    const ul = col.querySelector('ul');
                    if (ul) {
                        ul.innerHTML = `
                                <li style="white-space: nowrap;"><a href="{{ url("/") }}"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> Home</a></li>
                                <li style="white-space: nowrap;"><a href="#about"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> About</a></li>
                                <li style="white-space: nowrap;"><a href="#km-stats-section"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> Race Category</a></li>
                                <li style="white-space: nowrap;"><a href="#contact"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> Contact</a></li>
                            `;
                    }
                }

                // SERVICES → RACE CATEGORY
                if ((text.includes('SERVICES') || text.includes('SERVICE') || text.includes('RACE CATEGORY')) && col) {
                    h.innerText = 'Race Category';
                    h.style.setProperty('color', '#ffcc00', 'important');
                    const ul = col.querySelector('ul');
                    if (ul) {
                        ul.innerHTML = `
                                <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> 2.5 KM Fun Run</a></li>
                                <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> 5 KM Classic</a></li>
                                <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> 10 KM Challenge</a></li>
                                <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> 21 KM Half</a></li>
                                <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right" style="color:#ffcc00;"></i> 42 KM Full</a></li>
                            `;
                    }
                }

                // RECENT POSTS → Replace with Contact
                if ((text.includes('RECENT POST') || text.includes('CONTACT')) && col) {
                    // h.innerText = 'Contact'; // We'll set it inside the innerHTML below
                    h.style.setProperty('color', '#ffcc00', 'important');
                    // Remove old content (images, dates, etc.)
                    const oldContent = col.querySelector('.single-footer-widget, [class*="widget"]');
                    if (oldContent) {
                        oldContent.innerHTML = `
                                <h3 class="widget-title" style="color: #ffcc00 !important; margin-bottom: 30px;">Contact</h3>
                                <ul class="list-area" style="list-style: none; padding: 0; margin-top: 25px;">
                                    <li style="margin-bottom: 20px; display: flex; align-items: flex-start; gap: 15px;">
                                        <i class="fa-solid fa-phone" style="color: #ffcc00 !important; font-size: 20px !important; margin-top: 4px;"></i>
                                        <div>
                                            <a href="tel:+255755165284" style="color: #ccc !important; display: block; font-size: 16px !important; text-decoration: none !important;">+255 755 165 284</a>
                                            <a href="tel:+255757979611" style="color: #ccc !important; display: block; font-size: 16px !important; text-decoration: none !important; margin-top: 6px;">+255 757 979 611</a>
                                        </div>
                                    </li>
                                    <li style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                                        <i class="fa-solid fa-envelope" style="color: #ffcc00 !important; font-size: 20px !important;"></i>
                                        <a href="mailto:info@swahilimarathon.com" style="color: #ccc !important; font-size: 16px !important; text-decoration: none !important;">info@swahilimarathon.com</a>
                                    </li>
                                    <li style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                                        <i class="fa-solid fa-location-dot" style="color: #ffcc00 !important; font-size: 20px !important;"></i>
                                        <span style="color: #ccc !important; font-size: 16px !important;">Dar es Salaam, Tanzania</span>
                                    </li>
                                </ul>
                            `;
                    }
                }
            });

            // Footer about text replacement
            document.querySelectorAll('p').forEach(p => {
                const t = p.innerText.toLowerCase();
                const isFooter = p.closest('footer') || p.closest('.footer-area') || p.closest('.footer-section');
                if (isFooter && (t.includes('phasellus') || t.includes('ultricies') || t.includes('curabitur') || t.includes('solar energy'))) {
                    p.innerText = 'The Swahili Marathon is a premier athletic event celebrating culture, health, and endurance. Join us for an unforgettable experience through scenic routes.';
                    p.style.lineHeight = '1.8';
                    p.style.color = '#ccc';
                    p.style.marginTop = '20px';
                }
            });

            // Footer logo
            document.querySelectorAll('[class*="footer"] img, footer img').forEach(img => {
                if (!img.src.includes('swahili Marathon') && !img.src.includes('news') && img.closest('[class*="col-"]')) {
                    const isInFirstCol = !img.closest('[class*="col-"]')?.querySelector('h3');
                    if (isInFirstCol || img.alt?.toLowerCase().includes('logo')) {
                        img.src = '/img/logo/swahili Marathon.jpeg';
                        img.style.maxWidth = '180px';
                        img.style.height = 'auto';
                        img.style.borderRadius = '8px';
                    }
                }
            });

            // Footer copyright & terms - complete rebuild of footer-bottom
            const footerBottom = document.querySelector('.footer-bottom, [class*="footer-bottom"], [class*="copyright"]');
            if (footerBottom) {
                footerBottom.style.setProperty('background', '#111', 'important');
                footerBottom.style.setProperty('padding', '15px 0', 'important');
                footerBottom.style.setProperty('margin-top', '10px', 'important');
                const innerContainer = footerBottom.querySelector('.container') || footerBottom;
                innerContainer.innerHTML = `
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; color: #999; font-size: 14px;">
                        <p style="margin: 0;">© All Copyright 2026 by <strong style="color: #fff;">Swahili Marathon</strong></p>
                        <a href="https://www.emca.tech" target="_blank" style="color: #ddd; text-decoration: none; font-size: 14px;">Powered by <span style="color: #940000; font-weight: 700;">EmCa Technologies</span></a>
                    </div>
                `;
            } else {
                // Fallback: target text directly
                document.querySelectorAll('p, span, div').forEach(el => {
                    if (el.innerText.includes('Copyright') && el.innerText.includes('Solar')) {
                        el.innerHTML = '© All Copyright 2026 by <strong>Swahili Marathon</strong>';
                    }
                });
                document.querySelectorAll('a').forEach(a => {
                    const t = a.innerText.trim();
                    if (t === 'Terms & Condition' || t === 'Terms & Conditions') {
                        a.innerHTML = 'Powered by <span style="color: #940000; font-weight: 700;">EmCa Technologies</span>';
                        a.href = 'https://www.emca.tech';
                        a.target = '_blank';
                    }
                    if (t === 'Privacy Policy') a.style.display = 'none';

                    // Extra fix for footer links to ensure instant scroll
                    if (a.getAttribute('href')?.startsWith('#')) {
                        a.onclick = (e) => {
                            const href = a.getAttribute('href');
                            if (href && href !== '#') {
                                try {
                                    const target = document.querySelector(href);
                                    if (target) {
                                        e.preventDefault();
                                        target.scrollIntoView({ behavior: 'smooth' });
                                        window.history.pushState(null, null, href);
                                    }
                                } catch (e) { console.warn("Invalid scroll target:", href); }
                            }
                        };
                    }
                });
            }
        }

        window.addEventListener('load', function () {
            const targetNode = document.getElementById('root') || document.body;

            function injectCustomHero() {
                if (document.getElementById('custom-hero-section')) return;

                const heroHTML = `
                    <section id="custom-hero-section">
                        <div class="hero-slider-container">
                            <div class="hero-slide active" style="background-image: url('/img/header/header-1.jpeg');"></div>
                            <div class="hero-slide" style="background-image: url('/img/header/header-2.jpeg');"></div>
                            <div class="hero-slide" style="background-image: url('/img/header/header-3.jpeg');"></div>
                            <div class="hero-slide" style="background-image: url('/img/header/header-4.jpeg');"></div>
                            <div class="hero-slide" style="background-image: url('/img/header/header-5.jpeg');"></div>
                        </div>
                        <div class="hero-overlay"></div>
                        <div class="hero-container" style="position: relative; z-index: 10;">
                            <!-- Top spacer to guarantee clearance of floating menu on real devices -->
                            <div class="hero-mobile-spacer" style="height: 150px; display: none;"></div>
                            <div class="hero-badges-wrapper" style="display: flex; gap: 15px; flex-wrap: wrap;">
                                <span class="hero-badge">JOIN THE COMMUNITY</span>
                                <span class="hero-badge" style="background: #fff; color: #000; box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);">27th June 2026</span>
                            </div>
                            <h1>More Than Just A <br>Running Tracker</h1>
                            <p>Connect with fellow marathoners and share your journey towards peak performance. The ultimate platform for registration and community engagement.</p>
                            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                                <a href="{{ url("/register") }}" class="hero-cta">
                                    REGISTER NOW <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a href="#about" class="hero-cta" style="background: rgba(255,255,255,0.1) !important; color: #fff !important; backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.3); box-shadow: none;">
                                    LEARN MORE
                                </a>
                            </div>
                        </div>
                    </section>
                `;

                // Only hide the main slider/hero area to avoid hiding content sections
                document.querySelectorAll('.slider-area, .tp-slider-area, .hero-section-area').forEach(el => {
                    if (el.getBoundingClientRect().top < 400) {
                        el.style.setProperty('display', 'none', 'important');
                    }
                });

                // Inject before #root
                const root = document.getElementById('root');
                if (root) {
                    root.insertAdjacentHTML('beforebegin', heroHTML);
                }

                // Start image slider auto-rotation
                let currentSlide = 0;
                const slides = document.querySelectorAll('#custom-hero-section .hero-slide');
                if (slides.length > 1) {
                    setInterval(() => {
                        slides[currentSlide].classList.remove('active');
                        currentSlide = (currentSlide + 1) % slides.length;
                        slides[currentSlide].classList.add('active');
                    }, 5000); // Change every 5 seconds
                }
            }

            function injectPartnersSection() {
                if (document.getElementById('custom-partners-section')) return;

                const partners = [
                    { img: '/img/logo/nenbo ya taifa.png', name: 'Serikali ya Tanzania' },
                    { img: '/img/logo/Bakita.jpeg', name: 'BAKITA' },
                    { img: '/img/logo/Asa.png', name: 'ASA' },
                    { img: '/img/logo/EmCa.png', name: 'EmCa Techonologies' },
                ];

                const cards = partners.map(p => `
                    <div class="partner-card">
                        <img src="${p.img}" alt="${p.name}">
                        <span>${p.name}</span>
                    </div>
                `).join('');

                const section = document.createElement('section');
                section.id = 'custom-partners-section';
                section.innerHTML = `
                    <p class="partners-label">Our Partners & Supporters</p>
                    <h2>Proudly <span>Supported By</span></h2>
                    <div class="partners-grid">${cards}</div>
                `;

                // Insert after the hero section, before the rest of page content
                const hero = document.getElementById('custom-hero-section');
                if (hero) {
                    hero.insertAdjacentElement('afterend', section);
                } else {
                    const root = document.getElementById('root');
                    if (root) root.insertAdjacentElement('beforebegin', section);
                }
            }

            function cleanTemplateConflicts() {
                // Remove (don't just hide) ANY template bar that isn't ours
                // This stops the duplication dead in its tracks
                const conflictingSelectors = [
                    '.header-top', '.header-top-1', '.header-top-2', '.top-bar-area',
                    '.header-top-area', '.tp-header-top-area', '.top-bar', '.header-top-left',
                    '.top-left', '.header-top-right', '.top-right', '.header-social'
                ];

                conflictingSelectors.forEach(sel => {
                    document.querySelectorAll(sel).forEach(el => {
                        // Crucial: Don't remove our OWN custom top bar which shares these keywords sometimes
                        if (!el.closest('#custom-top-bar') && el.id !== 'custom-top-bar') {
                            el.remove();
                        }
                    });
                });
            }

            // ONE-TIME INJECTIONS - Correct Global Scope
            function performOneTimeInjections() {
                if (window.oneTimeInjectionsDone) return;
                
                // KM Statistics Injection
                document.querySelectorAll('.about-section, #about, .about-area').forEach(section => {
                    section.style.paddingBottom = '20px';
                    if (!document.getElementById('km-stats-section')) {
                        const statsHtml = `
                            <div id="km-stats-section" class="stats-section fix" style="background: #111; padding: 40px 0; color: white; width: 100%; position: relative;">
                                <div id="race-category-anchor" style="position: absolute; top: -100px;"></div>
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="col-xl-2 col-lg-4 col-md-6 mb-4 mb-xl-0">
                                            <div class="stat-item">
                                                <i class="fa-solid fa-person-walking" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                                                <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">1000</h2>
                                                <p style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; color: #888; margin-top: 5px;">2.5 KM Fun Run</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-6 mb-4 mb-xl-0">
                                            <div class="stat-item">
                                                <i class="fa-solid fa-person-running" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                                                <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">1000</h2>
                                                <p style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; color: #888; margin-top: 5px;">5 KM Classic</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-6 mb-4 mb-xl-0">
                                            <div class="stat-item">
                                                <i class="fa-solid fa-medal" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                                                <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">1250</h2>
                                                <p style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; color: #888; margin-top: 5px;">10 KM Challenge</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-6 mb-4 mb-xl-0">
                                            <div class="stat-item">
                                                <i class="fa-solid fa-person-running" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                                                <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">1250</h2>
                                                <p style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; color: #888; margin-top: 5px;">21 KM Half</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-6 mb-4 mb-xl-0">
                                            <div class="stat-item">
                                                <i class="fa-solid fa-trophy" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                                                <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">500</h2>
                                                <p style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; color: #888; margin-top: 5px;">42 KM Full</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-6">
                                            <div class="stat-item">
                                                <i class="fa-solid fa-users" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                                                <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">5000</h2>
                                                <p style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; color: #888; margin-top: 5px;">Total Participants</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        section.insertAdjacentHTML('afterend', statsHtml);
                    }
                });

                // Latest Projects Injection
                if (!document.getElementById('latest-projects-section')) {
                    const statsSection = document.getElementById('km-stats-section');
                    if (statsSection) {
                        const projectNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                        const allProjects = [...projectNumbers, ...projectNumbers];
                        const projectsHtml = `
                            <div id="latest-projects-section" class="project-section section-padding" style="background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), url('/img/header/header-2.jpeg'); background-size: cover; background-position: center; background-attachment: fixed; padding: 80px 0; color: white; overflow: hidden; position: relative;">
                                <div class="container-fluid p-0" style="position: relative; z-index: 3;">
                                    <div class="section-title text-center mb-4">
                                        <span class="sub-title" style="color: #ffcc00; text-transform: uppercase; font-weight: 700; letter-spacing: 2px; font-size: 14px;">Portfolio</span>
                                        <h2 style="color: white; font-weight: 800; font-size: 32px; margin-top: 5px;">LATEST PROJECT</h2>
                                    </div>
                                    <div class="project-marquee-container" style="overflow: hidden; padding: 20px 0; position: relative;">
                                        <div class="project-marquee-inner" style="display: flex; gap: 20px; width: max-content; animation: scrollMarquee 40s linear infinite;">
                                            ${allProjects.map((num, index) => `
                                                <div class="project-marquee-item" style="flex: 0 0 350px;">
                                                    <div class="project-item" style="position: relative; overflow: hidden; border-radius: 15px; background: rgba(17, 17, 17, 0.4); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.1);">
                                                        <div class="project-image"><img src="/img/project/0${num}.jpg" alt="Project ${num}" style="width: 100%; height: 350px; object-fit: cover; transition: transform 0.5s; display: block;"></div>
                                                        <div class="project-content" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 25px; background: linear-gradient(to top, rgba(0,0,0,0.95), transparent); opacity: 0; transition: 0.4s; transform: translateY(20px);">
                                                            <p style="color: #ffcc00; margin-bottom: 5px; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;">Marathon Event</p>
                                                            <h4 style="color: white; font-size: 18px; font-weight: 700;">Swahili Marathon 2024</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            `).join('')}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        statsSection.insertAdjacentHTML('afterend', projectsHtml);
                    }
                }
                
                window.oneTimeInjectionsDone = true;
            }

            const safeUpdate = () => {
                if (window.safeUpdateRunning) return;
                window.safeUpdateRunning = true;
                try {
                    cleanTemplateConflicts();
                    injectCustomHero();
                    injectPartnersSection();
                    injectTopInfoBar();
                    injectCustomHeader();
                    performOneTimeInjections();
                    updateBranding();
                } catch (e) {
                    console.error("Updates failed:", e);
                } finally {
                    window.safeUpdateRunning = false;
                }
            };

            // Run ONCE on load, then strictly interval
            safeUpdate();
            setInterval(safeUpdate, 3000);

            // Global Nuke for any remaining #1d8f2c green
            function globalColorNuke() {
                const isTargetGreen = (str) => {
                    return str && (
                        str.includes('29, 143, 44') ||
                        str.includes('1d8f2c') ||
                        str.includes('1D8F2C')
                    );
                };

                document.querySelectorAll('*').forEach(el => {
                    const style = window.getComputedStyle(el);

                    // Kill background green
                    if (isTargetGreen(style.backgroundColor) || isTargetGreen(el.style.backgroundColor)) {
                        el.style.setProperty('background-color', '#ffffff', 'important');
                        el.style.setProperty('background', '#ffffff', 'important');
                        el.style.setProperty('color', '#111111', 'important');
                    }

                    // Kill text green
                    if (isTargetGreen(style.color) || isTargetGreen(el.style.color)) {
                        el.style.setProperty('color', '#ffffff', 'important');
                    }

                    // Also catch the #3fab30 green just in case
                    if (style.backgroundColor.includes('63, 171, 48') || el.style.backgroundColor.includes('#3fab30')) {
                        el.style.setProperty('background-color', '#ffcc00', 'important');
                        el.style.setProperty('color', '#000000', 'important');
                    }

                    // KILL LOGIN TEXT persistently
                    if (el.innerText && el.innerText.includes('Login')) {
                        const walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT, null, false);
                        let node;
                        while (node = walker.nextNode()) {
                            if (node.nodeValue.includes('Login')) {
                                node.nodeValue = node.nodeValue.replace(/Login/g, 'Register');
                            }
                        }
                    }

                    // Force Visibility for Header Button
                    const isHeaderButton = el.classList.contains('header-button') ||
                        (el.className && typeof el.className === 'string' && el.className.includes('header-button')) ||
                        (el.innerText && el.innerText.trim() === 'Register' && el.tagName === 'A');

                    if (isHeaderButton) {
                        el.style.setProperty('display', 'inline-flex', 'important');
                        el.style.setProperty('visibility', 'visible', 'important');
                        el.style.setProperty('opacity', '1', 'important');
                        el.style.setProperty('order', '99', 'important');

                        // Force parent to be a flex row container
                        let current = el.parentElement;
                        let depth = 0;
                        while (current && depth < 3) {
                            if (current.tagName === 'DIV' || current.tagName === 'HEADER') {
                                current.style.setProperty('display', 'flex', 'important');
                                current.style.setProperty('flex-direction', 'row', 'important');
                                current.style.setProperty('flex-wrap', 'nowrap', 'important');
                                current.style.setProperty('align-items', 'center', 'important');
                            }
                            current = current.parentElement;
                            depth++;
                        }
                    }
                });
            }

            // Run immediately and then periodic
            // Disable heavy global color nuke as it might be breaking React performance
            // globalColorNuke();
            // setInterval(globalColorNuke, 2000);

            // Disable destructive loops that might be crashing React
            // killLogin(); 
            // setInterval(killLogin, 500);

            // INJECT TOP INFO BAR
            function injectTopInfoBar() {
                if (document.getElementById('custom-top-bar')) return;
                document.body.classList.add('has-custom-header');
                const bar = document.createElement('div');
                bar.id = 'custom-top-bar';
                bar.innerHTML = `
                    <div class="top-bar-left">
                        <a href="tel:+255755165284">
                            <i class="fa-solid fa-phone-volume"></i> +255 755 165 284
                        </a>
                        <div class="top-bar-divider"></div>
                        <a href="tel:+255757979611">
                            <i class="fa-solid fa-phone-volume"></i> +255 757 979 611
                        </a>
                        <div class="top-bar-divider"></div>
                        <a href="mailto:info@swahilimarathon.com" class="email-link">
                            <i class="fa-solid fa-envelope"></i> info@swahilimarathon.com
                        </a>
                    </div>
                    <div class="top-bar-right">
                        <a href="https://www.facebook.com" target="_blank" title="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.twitter.com" target="_blank" title="Twitter / X">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank" title="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com" target="_blank" title="YouTube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                `;
                document.body.insertAdjacentElement('afterbegin', bar);
            }

            // INJECT NEW FLOATING HEADER
            function injectCustomHeader() {
                if (document.getElementById('custom-floating-header')) return;

                const header = document.createElement('div');
                header.id = 'custom-floating-header';
                header.innerHTML = `
                    <div class="pill-inner">
                        <div class="logo-box-pill">
                            <a href="{{ url('/') }}"><img src="/img/logo/swahili Marathon.jpeg" alt="Swahili Marathon Logo" style="height:48px; width:auto; border-radius:6px;"></a>
                        </div>
                        <ul class="nav-links-pill">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#race-category-anchor">Race Category</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <a href="{{ url('/register') }}" class="register-btn">
                                Register <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <button id="mobile-menu-toggle">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                    </div>
                `;

                // INJECT MOBILE SIDE MENU
                const mobileMenuHTML = `
                    <div id="mobile-menu-overlay"></div>
                    <div id="mobile-side-menu">
                        <div class="mobile-header-close">
                            <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <ul class="mobile-nav-list">
                            <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Home</a></li>
                            <li><a href="#about"><i class="fa-solid fa-circle-info"></i> About</a></li>
                            <li><a href="#km-stats-section"><i class="fa-solid fa-person-running"></i> Race Category</a></li>
                            <li><a href="#contact"><i class="fa-solid fa-envelope"></i> Contact</a></li>
                        </ul>
                    </div>
                `;

                document.body.insertAdjacentHTML('beforeend', mobileMenuHTML);
                document.body.appendChild(header);

                // Handle Mobile Menu Logic
                const toggle = header.querySelector('#mobile-menu-toggle');
                const sideMenu = document.getElementById('mobile-side-menu');
                const overlay = document.getElementById('mobile-menu-overlay');
                const closeBtn = sideMenu.querySelector('.close-btn');

                const toggleMenu = (open) => {
                    sideMenu.classList.toggle('active', open);
                    overlay.classList.toggle('active', open);
                    document.body.style.overflow = open ? 'hidden' : '';
                };

                if (toggle) toggle.onclick = () => toggleMenu(true);
                if (closeBtn) closeBtn.onclick = () => toggleMenu(false);
                if (overlay) overlay.onclick = () => toggleMenu(false);

                // Close menu when clicking links
                sideMenu.querySelectorAll('a').forEach(link => {
                    link.onclick = () => toggleMenu(false);
                });

                // Show after injection
                setTimeout(() => {
                    header.style.display = 'block';
                }, 100);

                //Smooth scroll for internal links
                header.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href');
                        const target = document.querySelector(targetId);
                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth' });
                        }
                    });
                });
            }

            // injectTopInfoBar();
            // injectCustomHeader();

            // BACK TO TOP BUTTON INJECTION
            if (!document.getElementById('back-to-top')) {
                const btt = document.createElement('div');
                btt.id = 'back-to-top';
                btt.innerHTML = '<i class="fa-solid fa-arrow-up"></i>';
                document.body.appendChild(btt);

                btt.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });

                window.addEventListener('scroll', () => {
                    if (window.scrollY > 400) btt.classList.add('visible');
                    else btt.classList.remove('visible');
                });
            }

            // MOBILE REFINEMENT: Ensure section padding is consistent
            if (window.innerWidth < 768) {
                document.querySelectorAll('section, .area, [class*="-area"]').forEach(section => {
                    const style = window.getComputedStyle(section);
                    if (parseInt(style.paddingTop) > 60) {
                        section.style.setProperty('padding-top', '50px', 'important');
                        section.style.setProperty('padding-bottom', '50px', 'important');
                    }
                });
            }

            // Ensure both survive React updates
            // Handled via safeUpdate
            // setInterval(() => { injectTopInfoBar(); injectCustomHeader(); }, 2000);

            // Handle scroll effect — nav always stays below the top info bar
            const TOP_BAR_HEIGHT = 42; // height of #custom-top-bar
            const NAV_GAP = 8;         // breathing room between top bar and pill
            const NAV_TOP_DEFAULT = TOP_BAR_HEIGHT + NAV_GAP; // 50px

            window.addEventListener('scroll', () => {
                const header = document.getElementById('custom-floating-header');
                if (header) {
                    if (window.scrollY > 50) {
                        // Scrolled down: slightly darker + full width, but STILL below top bar
                        header.style.background = 'rgba(5, 5, 5, 0.97)';
                        header.style.top = NAV_TOP_DEFAULT + 'px';
                        header.style.width = '94%';
                        header.style.boxShadow = '0 8px 32px rgba(0,0,0,0.8), 0 0 0 1px rgba(255,204,0,0.2)';
                    } else {
                        // Near top: subtle glass style
                        header.style.background = 'rgba(10, 10, 10, 0.9)';
                        header.style.top = NAV_TOP_DEFAULT + 'px';
                        header.style.width = '92%';
                        header.style.boxShadow = '0 8px 32px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,204,0,0.15)';
                    }
                }
            });
        });
    </script>
</body>

</html>