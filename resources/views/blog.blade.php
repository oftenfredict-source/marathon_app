@extends('layouts.app')

@section('title', 'Blog - SMRMS')

@section('content')
    <x-page-title title="Blog Grid" currentPage="Blog Grid" />

    <section class="news-section-4 fix section-padding">
        <div class="container">
            <div class="row g-4">
                @php
                    $blogPosts = [
                        [
                            'id' => 1,
                            'date' => ['day' => '17', 'month' => 'Feb', 'year' => '2025'],
                            'image' => '/img/news/04.jpg',
                            'author' => 'Admin',
                            'category' => 'IT Services',
                            'title' => 'Growth of Clean Energy Part of Solution',
                            'link' => '/news-details',
                            'delay' => '.3',
                        ],
                        [
                            'id' => 2,
                            'date' => ['day' => '20', 'month' => 'May', 'year' => '2025'],
                            'image' => '/img/news/07.jpg',
                            'author' => 'Admin',
                            'category' => 'UI/UX Design',
                            'title' => 'Metal Roofing: The Best for Solar Panels',
                            'link' => '/news-details',
                            'delay' => '.3',
                        ],
                        [
                            'id' => 3,
                            'date' => ['day' => '10', 'month' => 'Feb', 'year' => '2025'],
                            'image' => '/img/news/08.jpg',
                            'author' => 'Admin',
                            'category' => 'Cyber Security',
                            'title' => 'Bill Gates Launches Clean Energy Panels',
                            'link' => '/news-details',
                            'delay' => '.3',
                        ],
                        [
                            'id' => 4,
                            'date' => ['day' => '20', 'month' => 'May', 'year' => '2025'],
                            'image' => '/img/news/07.jpg',
                            'author' => 'Admin',
                            'category' => 'UI/UX Design',
                            'title' => 'Metal Roofing: The Best for Solar Panels',
                            'link' => '/news-details',
                            'delay' => '.3',
                        ],
                        [
                            'id' => 5,
                            'date' => ['day' => '10', 'month' => 'Feb', 'year' => '2025'],
                            'image' => '/img/news/05.jpg',
                            'author' => 'Admin',
                            'category' => 'Cyber Security',
                            'title' => 'Exploring the Latest Innovations in Solar',
                            'link' => '/news-details',
                            'delay' => '.3',
                        ],
                        [
                            'id' => 6,
                            'date' => ['day' => '20', 'month' => 'May', 'year' => '2025'],
                            'image' => '/img/news/06.jpg',
                            'author' => 'Admin',
                            'category' => 'Cyber Security',
                            'title' => 'Investing in a Sustainable Energy Future',
                            'link' => '/news-details',
                            'delay' => '.3',
                        ],
                    ];
                @endphp

                @foreach ($blogPosts as $post)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow slideUp" data-delay="{{ $post['delay'] }}">
                        <x-blog-card :news="$post" className="style-2 mt-0 pb-0" />
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="pagination text-center mt-5">
                <ul class="d-flex justify-content-center align-items-center gap-2">
                    <li><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection