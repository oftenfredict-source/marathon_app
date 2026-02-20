@extends('layouts.app')

@section('title', 'About Us - SMRMS')

@section('content')
    <x-page-title title="About Us" currentPage="About Us" />

    <!-- ABOUT SECTION -->
    <section id="about" class="about-section fix bg-cover"
        style="padding-top: 100px; padding-bottom: 20px; background-image: url('/img/service/service-bg-2.jpg')">
        <div class="container">
            <div class="about-wrapper style-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-image-items p-0">
                            <div class="video-item wow slideLeft" data-delay=".3"
                                style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                <video autoplay muted loop playsinline style="width: 100%; height: auto; display: block;">
                                    <source src="/img/about/about-us.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="sub-title wow slideUp">About Us</span>
                                <h2 class="wow slideUp" data-delay=".3">Welcome To <span>Swahili Marathon</span>
                                </h2>
                            </div>
                            <p class="mt-3 mt-md-0 wow slideUp" data-delay=".5">
                                It is a long established fact that a reader will be distracted the readable <br /> content
                                of a
                                page when looking at layout the point.
                            </p>
                            <div class="about-icon-items d-flex align-items-start gap-4">
                                <div class="icon-items wow slideUp" data-delay=".7" style="flex: 1; margin: 0;">
                                    <div class="icon" style="min-width: 40px;">
                                        <i class="fa-solid fa-gauge-high" style="font-size: 24px; color: #ffcc00;"></i>
                                    </div>
                                    <div class="content">
                                        <h4 style="font-size: 16px; margin-bottom: 5px;">Reliability & Performance</h4>
                                        <p style="font-size: 13px; line-height: 1.4;">
                                            Optimized for accuracy and speed in tracking.
                                        </p>
                                    </div>
                                </div>
                                <div class="icon-items wow slideUp" data-delay=".9" style="flex: 1; margin: 0;">
                                    <div class="icon" style="min-width: 40px;">
                                        <i class="fa-solid fa-headset" style="font-size: 24px; color: #ffcc00;"></i>
                                    </div>
                                    <div class="content">
                                        <h4 style="font-size: 16px; margin-bottom: 5px;">App Support</h4>
                                        <p style="font-size: 13px; line-height: 1.4;">
                                            24/7 assistance for all your queries.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="about-author">
                                <!-- Explore more button removed as requested -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTICS SECTION -->
    <section class="stats-section fix" style="background: #111; padding: 40px 0; color: white;">
        <div class="container">
            <div class="row text-center">
                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-person-walking"
                            style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                        <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">1000</h2>
                        <p
                            style="text-transform: uppercase; font-size: 11px; letter-spacing: 2px; color: #888; margin-top: 5px;">
                            2.5 KM Fun Run</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-person-running"
                            style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                        <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">1000</h2>
                        <p
                            style="text-transform: uppercase; font-size: 11px; letter-spacing: 2px; color: #888; margin-top: 5px;">
                            5 KM Classic</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-medal" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                        <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">1250</h2>
                        <p
                            style="text-transform: uppercase; font-size: 11px; letter-spacing: 2px; color: #888; margin-top: 5px;">
                            10 KM Challenge</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-person-running-fast"
                            style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                        <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">1250</h2>
                        <p
                            style="text-transform: uppercase; font-size: 11px; letter-spacing: 2px; color: #888; margin-top: 5px;">
                            21 KM Half</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-trophy" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                        <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">500</h2>
                        <p
                            style="text-transform: uppercase; font-size: 11px; letter-spacing: 2px; color: #888; margin-top: 5px;">
                            42 KM Full</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-users" style="font-size: 32px; color: #ffcc00; margin-bottom: 15px;"></i>
                        <h2 style="font-weight: 800; font-size: 32px; margin: 0; color: white;">5000</h2>
                        <p
                            style="text-transform: uppercase; font-size: 11px; letter-spacing: 2px; color: #888; margin-top: 5px;">
                            Total Participants</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OFFER SECTION -->
    <section class="offer-section fix section-bg-2 section-padding">
        <div class="line-shape">
            <img src="/img/team/line-shape.png" alt="shape-img">
        </div>
        <div class="mask-shape">
            <img src="/img/team/mask-shape.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title">Our offering</span>
                <h2 class="text-white">Harnessing The Sun The Bright <br />Choice For Future</h2>
            </div>
            <div class="row">
                @php
                    $offerItems = [
                        ['id' => 1, 'icon_class' => 'fa-solid fa-globe', 'title' => 'Website', 'isActive' => false, 'delay' => '.2'],
                        ['id' => 2, 'icon_class' => 'fa-solid fa-bolt', 'title' => 'Power', 'isActive' => false, 'delay' => '.4'],
                        ['id' => 3, 'icon_class' => 'fa-solid fa-sun', 'title' => 'Pane', 'isActive' => true, 'delay' => '.6'],
                        ['id' => 4, 'icon_class' => 'fa-solid fa-clock', 'title' => 'Solar Watch', 'isActive' => false, 'delay' => '.8'],
                        ['id' => 5, 'icon_class' => 'fa-solid fa-tv', 'title' => 'Solar Tv', 'isActive' => false, 'delay' => '.9'],
                        ['id' => 6, 'icon_class' => 'fa-solid fa-rss', 'title' => 'IOT', 'isActive' => false, 'delay' => '.9'],
                    ];
                @endphp
                @foreach ($offerItems as $item)
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 wow slideUp" data-delay="{{ $item['delay'] }}">
                        <div class="offer-items {{ $item['isActive'] ? 'active' : '' }}">
                            <div class="shape-top">
                                <img src="/img/shape/offer-top.png" alt="shape-img">
                            </div>
                            <div class="shape-bottom">
                                <img src="/img/shape/offer-bottom.png" alt="shape-img">
                            </div>
                            <div class="icon"><i class="{{ $item['icon_class'] }}"></i></div>
                            <div class="content">
                                <h5>{{ $item['title'] }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection