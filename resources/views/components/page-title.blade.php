<div class="breadcrumb-wrapper bg-cover" style="background-image: url('/img/breadcrumb.jpg')">
    <div class="border-shape">
        <img src="/img/element.png" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="/img/line-element.png" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="wow slideUp" data-delay=".3">{{ $title }}</h1>
            <ul class="breadcrumb-items wow slideUp" data-delay=".5">
                <li>
                    <a href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                <li>
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li>
                    {{ $currentPage }}
                </li>
            </ul>
        </div>
    </div>
</div>