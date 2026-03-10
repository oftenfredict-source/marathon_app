@extends('layouts.app')

@section('title', 'Contact Us - Swahili Marathon')

@section('content')
    <x-page-title currentPage="Contact Us" title="Contact Us" />

    <section class="contact-section fix section-padding">
        <div class="container">
            <div class="contact-wrapper-2">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-left-items">
                            <div class="contact-info-area-2">
                                <div class="contact-info-items mb-4">
                                    <div class="icon">
                                        <i class="fa-solid fa-phone-volume" style="font-size: 24px; color: white;"></i>
                                    </div>
                                    <div class="content">
                                        <p>Call Us 7/24</p>
                                        <h3>
                                            <a href="tel:+255755165284">+255 755 165 284</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="contact-info-items mb-4">
                                    <div class="icon">
                                        <i class="fa-solid fa-envelope" style="font-size: 24px; color: white;"></i>
                                    </div>
                                    <div class="content">
                                        <p>Make a Quote</p>
                                        <h3>
                                            <a href="mailto:info@swahilimarathon.com">info@swahilimarathon.com</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="contact-info-items border-none">
                                    <div class="icon">
                                        <i class="fa-solid fa-location-dot" style="font-size: 24px; color: white;"></i>
                                    </div>
                                    <div class="content">
                                        <p>Location</p>
                                        <h3>Tanzania</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <h2>We'd Love to Hear From You!</h2>
                            <p>
                                Have questions about the marathon, registration, or sponsorship? Send us a message and we'll
                                get back to you as soon as possible.
                            </p>
                            <form action="#" id="contact-form" method="POST" class="contact-form-items">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6 wow slideUp" data-delay=".3">
                                        <div class="form-clt">
                                            <span>Your name*</span>
                                            <input type="text" name="name" id="name" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow slideUp" data-delay=".5">
                                        <div class="form-clt">
                                            <span>Your Email*</span>
                                            <input type="email" name="email" id="email" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow slideUp" data-delay=".7">
                                        <div class="form-clt">
                                            <span>Write Message*</span>
                                            <textarea name="message" id="message" placeholder="Write Message"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 wow slideUp" data-delay=".9">
                                        <button type="submit" class="theme-btn">
                                            Send Message <i class="fa-solid fa-arrow-right-long"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT MAP -->
    <div class="contact-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.2185542713437!2d39.2778!3d-6.8166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c490a6f8885b1%3A0x6bba529124238e21!2sDar%20es%20Salaam%2C%20Tanzania!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
@endsection