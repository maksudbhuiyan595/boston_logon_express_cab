@extends('frontend.app')

@section('content')

<style>
    /* --- FONTS & BASICS --- */
    body {
        font-family: 'Inter', sans-serif;
    }

    .section-padding {
        padding: 80px 0;
        background-color: #f8fafc; /* BG Light */
    }

    /* --- SECTION HEADER --- */
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1e293b; /* Brand Dark */
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    .title-line {
        width: 60px;
        height: 4px;
        background-color: #2D9CDB; /* Brand Blue */
        margin: 0 auto;
        border-radius: 2px;
    }

    /* --- BLOG GRID --- */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
    }

    /* --- BLOG CARD --- */
    .blog-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        border-color: #bfdbfe; /* Light Blue Border on Hover */
    }

    /* Image Area */
    .blog-img-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-img {
        transform: scale(1.08); /* Zoom effect */
    }

    /* Category Badge */
    .blog-cat-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background-color: #2D9CDB; /* Brand Blue */
        color: #fff;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
    }

    /* Content Area */
    .blog-content {
        padding: 25px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .blog-meta-date {
        font-size: 0.85rem;
        color: #94a3b8;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .blog-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b; /* Brand Dark */
        margin-bottom: 12px;
        text-decoration: none;
        line-height: 1.4;
        transition: color 0.2s;
    }

    .blog-title:hover {
        color: #2D9CDB; /* Brand Blue */
    }

    .blog-excerpt {
        font-size: 0.95rem;
        color: #64748b; /* Text Gray */
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    /* Footer / Button */
    .blog-footer {
        padding-top: 15px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .read-more-btn {
        color: #2D9CDB; /* Brand Blue */
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: gap 0.2s;
    }

    .read-more-btn:hover {
        gap: 8px;
        color: #1a7bb0; /* Darker Blue for hover interaction */
    }

    @media (max-width: 768px) {
        .section-title { font-size: 2rem; }
    }
</style>

<section class="section-padding">
    <div class="container">

        {{-- HEADER --}}
        <div class="section-header">
            <h2 class="section-title">Latest News & Blog</h2>
            <div class="title-line"></div>
        </div>

        {{-- BLOG GRID --}}
        <div class="blog-grid">

            {{-- PHP Array --}}
            @php
                $posts = [
                    [
                        'image' => 'https://images.unsplash.com/photo-1517604931442-710c27ed0cb4?q=80&w=800&auto=format&fit=crop',
                        'category' => 'Entertainment',
                        'title' => 'Discover the Best Heywood Gardner MA Cinema',
                        'excerpt' => 'If you are searching for the perfect movie night experience, explore the top cinemas in Heywood Gardner...',
                        'date' => 'Nov 4, 2025'
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?q=80&w=800&auto=format&fit=crop',
                        'category' => 'Health',
                        'title' => 'How to Get a Reliable Ride to Heywood Hospital',
                        'excerpt' => 'Accessibility matters. Learn how to book stress-free medical transportation for appointments...',
                        'date' => 'Oct 30, 2025'
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800&auto=format&fit=crop',
                        'category' => 'Travel',
                        'title' => 'Top Hotels in Fitchburg MA – Best Stays Guide',
                        'excerpt' => 'Fitchburg is full of surprises. Check out our curated list of the best places to stay for comfort and luxury...',
                        'date' => 'Oct 28, 2025'
                    ]
                ];
            @endphp

            @foreach($posts as $post)
            <div class="blog-card">
                <div class="blog-img-wrapper">
                    <span class="blog-cat-badge">{{ $post['category'] }}</span>
                    <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="blog-img">
                </div>
                <div class="blog-content">
                    <div class="blog-meta-date">
                        <i class="far fa-calendar-alt"></i> {{ $post['date'] }}
                    </div>
                    <a href="#" class="blog-title">{{ $post['title'] }}</a>
                    <p class="blog-excerpt">{{ $post['excerpt'] }}</p>

                    <div class="blog-footer">
                        <a href="#" class="read-more-btn">
                            Read Article <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
