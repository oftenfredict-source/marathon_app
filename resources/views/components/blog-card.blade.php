@props(['news', 'className' => ''])

<div class="news-card-items {{ $className }}">
    <div class="news-image">
        <img src="{{ $news['image'] }}" alt="news-img">
        <div class="post-date">
            <h3>
                {{ $news['date']['day'] }} <br>
                <span>{{ $news['date']['month'] }}</span>
            </h3>
        </div>
    </div>
    <div class="news-content">
        <ul>
            <li>
                <i class="fa-regular fa-user"></i>
                By {{ $news['author'] }}
            </li>
            <li>
                <i class="fa-solid fa-tag"></i>
                {{ $news['category'] }}
            </li>
        </ul>
        <h3>
            <a href="{{ url($news['link']) }}">{{ $news['title'] }}</a>
        </h3>
        <a href="{{ url($news['link']) }}" class="theme-btn-2 mt-3">
            read More
            <i class="fa-solid fa-arrow-right-long"></i>
        </a>
    </div>
</div>