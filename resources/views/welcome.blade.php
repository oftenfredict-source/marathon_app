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
            /* content: "Register" !important; */ /* Controlled via JS, but this is a hint for me */
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
            .canvas-trigger,
            .header-button~* {
                display: none !important;
                visibility: hidden !important;
                width: 0 !important;
                height: 0 !important;
                padding: 0 !important;
                margin: 0 !important;
                overflow: hidden !important;
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


        /* Fix "Get A Quote" and Logo */
        .header-button .theme-btn span {
            visibility: hidden !important;
            position: relative !important;
        }

        .header-button .theme-btn span::after {
            content: "Login \f30b" !important;
            font-family: "Outfit", "Font Awesome 6 Free" !important;
            font-weight: 900 !important;
            visibility: visible !important;
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            white-space: nowrap !important;
            color: #000 !important;
        }

        /* Text fix for dark text on light backgrounds */
        .hero-content p,
        .hero-content h1 {
            color: white !important;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
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
            padding-top: 30px !important;
            padding-bottom: 0 !important;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), url('/img/header/header-3.jpeg') !important;
            background-size: cover !important;
            background-position: center !important;
            background-attachment: fixed !important;
        }

        .single-footer-widget,
        .footer-widget {
            margin-bottom: 10px !important;
            padding-bottom: 0 !important;
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
            padding: 12px 0 !important;
            margin-top: 10px !important;
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
    </style>


    <script>
        window.appConfig = {
            basename: "{{ rtrim(parse_url(url('/'), PHP_URL_PATH), '/') }}"
        };
    </script>

    @viteReactRefresh
    @vite(['resources/js/sungo/main.tsx'])
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
                let html = box.innerHTML;

                // Email replacement
                if (html.includes('info@example.com') || html.includes('example.com')) {
                    box.innerHTML = box.innerHTML.replace(/info@example\.com|example\.com/gi, 'info@swahilimarathon.com');
                }

                // Phone replacement (ensuring correct numbers show)
                if (html.includes('123-456-7890') || html.includes('000') || !html.includes('165 284')) {
                    // Try to catch the common placeholder phone pattern
                    box.innerHTML = box.innerHTML.replace(/\+?\d{1,4}[-.\s]?\d{1,12}[-.\s]?\d{1,12}/g, (match) => {
                        if (match.length > 7 && !match.includes('165 284')) return '+255 755 165 284 | +255 654 507 505';
                        return match;
                    });
                }

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

            // KM Statistics Injection (Below About Section)
            document.querySelectorAll('.about-section, #about, .about-area').forEach(section => {
                section.style.paddingBottom = '20px'; // Reduce bottom padding of the about section
                if (!document.getElementById('km-stats-section')) {
                    const statsHtml = `
                        <div id="km-stats-section" class="stats-section fix" style="background: #111; padding: 40px 0; color: white; width: 100%;">
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

            // Latest Projects Injection (Below Stats Section)
            if (!document.getElementById('latest-projects-section')) {
                const statsSection = document.getElementById('km-stats-section');
                if (statsSection) {
                    const projectNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                    // Duplicate for seamless scroll
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
                                                    <div class="project-image">
                                                        <img src="/img/project/0${num}.jpg" alt="Project ${num}" style="width: 100%; height: 350px; object-fit: cover; transition: transform 0.5s; display: block;">
                                                    </div>
                                                    <div class="project-content" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 25px; background: linear-gradient(to top, rgba(0,0,0,0.95), transparent); opacity: 0; transition: 0.4s; transform: translateY(20px);">
                                                        <p style="color: #ffcc00; margin-bottom: 5px; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;">Marathon Event</p>
                                                        <h4 style="color: white; font-size: 18px; font-weight: 700;">Swahili Marathon 2024</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        `).join('')}
                                    </div>
                                    <div style="position: absolute; top: 0; left: 0; width: 200px; height: 100%; background: linear-gradient(to right, rgba(0,0,0,0.9), transparent); z-index: 2;"></div>
                                    <div style="position: absolute; top: 0; right: 0; width: 200px; height: 100%; background: linear-gradient(to left, rgba(0,0,0,0.9), transparent); z-index: 2;"></div>
                                </div>
                            </div>
                        </div>
                        <style>
                            @keyframes scrollMarquee {
                                0% { transform: translateX(0); }
                                100% { transform: translateX(-50%); }
                            }
                            .project-marquee-inner:hover { animation-play-state: paused; }
                            .project-item:hover .project-image img { transform: scale(1.1); }
                            .project-item:hover .project-content { opacity: 1 !important; transform: translateY(0) !important; }
                        </style>
                    `;
                    statsSection.insertAdjacentHTML('afterend', projectsHtml);
                }
            }

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
                    while(node = walker.nextNode()) {
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
            // Strategy: Find h3 headings by text, walk up to column parent, replace content
            const allFooterH3 = document.querySelectorAll('h3');
            allFooterH3.forEach(h3 => {
                const text = h3.innerText.trim();
                // Find the column container (parent with 'col' in class)
                let col = h3.closest('[class*="col-"]');
                if (!col) col = h3.parentElement?.parentElement;

                // Style all footer headings yellow
                if (['Quick Links', 'Services', 'Race Category', 'Recent Posts'].some(s => text.includes(s))) {
                    h3.style.setProperty('color', '#ffcc00', 'important');
                }

                // QUICK LINKS: Replace Solar links with marathon links
                if (text.includes('Quick Links') && col) {
                    const ul = col.querySelector('ul');
                    if (ul && (ul.innerHTML.includes('Solar') || ul.innerHTML.includes('FAQ') || ul.innerHTML.includes('Our Services') || ul.innerHTML.includes('Blogs'))) {
                        ul.innerHTML = `
                            <li><a href="{{ url("/") }}"><i class="fa-solid fa-chevron-right"></i>Home</a></li>
                            <li><a href="#about"><i class="fa-solid fa-chevron-right"></i>About</a></li>
                            <li><a href="#km-stats-section"><i class="fa-solid fa-chevron-right"></i>Race Category</a></li>
                            <li><a href="{{ url("/register") }}"><i class="fa-solid fa-chevron-right"></i>Register</a></li>
                            <li><a href="#contact"><i class="fa-solid fa-chevron-right"></i>Contact</a></li>
                        `;
                    }
                }

                // SERVICES → RACE CATEGORY: Replace Solar services with race distances
                if ((text.includes('Service') || text.includes('Race Categor')) && col) {
                    h3.innerText = 'Race Category';
                    h3.style.setProperty('color', '#ffcc00', 'important');
                    const ul = col.querySelector('ul');
                    if (ul && (ul.innerHTML.includes('Consultancy') || ul.innerHTML.includes('Solar') || ul.innerHTML.includes('License') || ul.innerHTML.includes('Style Guide'))) {
                        ul.innerHTML = `
                            <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right"></i>2.5 KM Fun Run</a></li>
                            <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right"></i>5 KM Classic</a></li>
                            <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right"></i>10 KM Challenge</a></li>
                            <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right"></i>21 KM Half</a></li>
                            <li><a href="{{ url("/") }}#registration"><i class="fa-solid fa-chevron-right"></i>42 KM Full</a></li>
                        `;
                    }
                }

                // RECENT POSTS → Replace with Contact Us
                if (text.includes('Recent Post') && col) {
                    h3.innerText = 'Contact Us';
                    h3.style.setProperty('color', '#ffcc00', 'important');
                    // Remove old content (images, dates, etc.)
                    const oldContent = col.querySelector('.single-footer-widget, [class*="widget"]');
                    if (oldContent) {
                        oldContent.innerHTML = `
                            <div class="widget-head"><h3 style="color: #ffcc00 !important;">Contact Us</h3></div>
                            <ul class="list-area" style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                                    <i class="fa-solid fa-phone" style="color: #ffcc00; font-size: 16px;"></i>
                                    <a href="tel:+255755165284" style="color: #ddd;">+255 755 165 284</a>
                                </li>
                                <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                                    <i class="fa-solid fa-envelope" style="color: #ffcc00; font-size: 16px;"></i>
                                    <a href="mailto:info@swahilimarathon.com" style="color: #ddd;">info@swahilimarathon.com</a>
                                </li>
                                <li style="margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                                    <i class="fa-solid fa-location-dot" style="color: #ffcc00; font-size: 16px;"></i>
                                    <span style="color: #ddd;">Dar es Salaam, Tanzania</span>
                                </li>
                            </ul>
                        `;
                    }
                }
            });

            // Footer about text replacement
            document.querySelectorAll('p').forEach(p => {
                const t = p.innerText.toLowerCase();
                if ((t.includes('phasellus') || t.includes('ultricies') || t.includes('curabitur')) && p.closest('[class*="col-"]')) {
                    p.innerText = 'The Swahili Marathon is a premier athletic event celebrating culture, health, and endurance. Join us for an unforgettable experience through scenic routes.';
                }
            });

            // Footer logo
            document.querySelectorAll('[class*="footer"] img, footer img').forEach(img => {
                if (!img.src.includes('asa-logo') && !img.src.includes('news') && img.closest('[class*="col-"]')) {
                    const isInFirstCol = !img.closest('[class*="col-"]')?.querySelector('h3');
                    if (isInFirstCol || img.alt?.toLowerCase().includes('logo')) {
                        img.src = '/img/logo/asa-logo.png';
                        img.style.maxWidth = '180px';
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

            const safeUpdate = () => {
                try {
                    updateBranding();
                } catch (e) {
                    console.error("Branding update failed:", e);
                }
            };

            safeUpdate();
            // Initial burst for first few seconds to win against React
            for (let i = 1; i <= 20; i++) {
                setTimeout(safeUpdate, i * 400);
            }

            // Long term observer
            const observer = new MutationObserver((mutations) => {
                observer.disconnect();
                safeUpdate();
                observer.observe(targetNode, { childList: true, subtree: true });
            });
            observer.observe(targetNode, { childList: true, subtree: true });
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
                        while(node = walker.nextNode()) {
                            if (node.nodeValue.includes('Login')) {
                                node.nodeValue = node.nodeValue.replace(/Login/g, 'Register');
                            }
                        }
                    }
                });
            }

            // Run immediately and then periodic
            globalColorNuke();
            setInterval(globalColorNuke, 2000);

            // ULTRA-AGGRESSIVE LOGIN TEXT KILLER (Runs every 500ms)
            function killLogin() {
                const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, null, false);
                let node;
                while(node = walker.nextNode()) {
                    if (node.nodeValue.includes('Login')) {
                        const parent = node.parentElement;
                        // Avoid script/style tags and already processed nodes
                        if (parent && !['SCRIPT', 'STYLE'].includes(parent.tagName)) {
                            node.nodeValue = node.nodeValue.replace(/Login/gi, 'Register');
                        }
                    }
                }
            }
            setInterval(killLogin, 500);
            killLogin();
        });
    </script>
</body>

</html>