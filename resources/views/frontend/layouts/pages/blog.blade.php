@extends('frontend.app')

@section('title', "Blogs | Boston Express Cab")

@section('meta_description')
<style>
    /* --- FONTS & GLOBAL --- */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');

    .blog-section {
        padding: 80px 0;
        background-color: #f8fafc;
        font-family: 'Inter', sans-serif;
    }

    /* --- HEADER --- */
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 15px;
    }

    .title-line {
        width: 60px;
        height: 4px;
        background-color: #2D9CDB;
        margin: 0 auto;
        border-radius: 2px;
    }

    /* --- RESPONSIVE GRID --- */
    .blog-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
    }

    @media (min-width: 992px) {
        .blog-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* --- CARD DESIGN --- */
    .blog-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
    }

    .blog-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        border-color: #2D9CDB;
    }

    .blog-img-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: #e2e8f0;
    }

    .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-img {
        transform: scale(1.1);
    }

    .blog-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #2D9CDB;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 2;
    }

    .blog-content {
        padding: 25px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .blog-date {
        font-size: 0.85rem;
        color: #94a3b8;
        margin-bottom: 10px;
    }

    .blog-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        text-decoration: none;
        margin-bottom: 12px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-excerpt {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .blog-footer {
        padding-top: 15px;
        border-top: 1px solid #f1f5f9;
    }

    .read-more {
        color: #2D9CDB;
        font-weight: 700;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .pagination-wrapper {
        margin-top: 50px;
        display: flex;
        justify-content: center;
    }
</style>

<section class="blog-section">
    <div class="container">

        {{-- Section Header --}}
        <div class="section-header">
            <h2 class="section-title">Latest News & Blog</h2>
            <div class="title-line"></div>
            <p class="text-muted mt-3">Travel tips, airport updates, and stories from Boston Express Cab.</p>
        </div>

        {{-- Blog Grid --}}
        <div class="blog-grid">
            @forelse($blogs as $blog)
                <article class="blog-card">
                    <div class="blog-img-wrapper">
                        {{-- FIXED TAGS LOGIC --}}
                        @php
                            $tags = $blog->tags;
                            if (!is_array($tags)) {
                                $tags = !empty($tags) ? explode(',', $tags) : [];
                            }
                            $firstTag = count($tags) > 0 ? trim($tags[0]) : 'News';
                        @endphp

                        <span class="blog-badge">{{ $firstTag }}</span>

                        <img src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : asset('images/blog-default.jpg') }}"
                             alt="{{ $blog->title }}"
                             class="blog-img">
                    </div>

                    <div class="blog-content">
                        <div class="blog-date">
                            <i class="far fa-calendar-alt me-1"></i>
                            {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') : $blog->created_at->format('M d, Y') }}
                        </div>

                        <a href="{{ route('dynamic.route', $blog->slug) }}" class="blog-title">
                            {{ $blog->title }}
                        </a>

                        <p class="blog-excerpt">
                            {{ Str::limit(strip_tags($blog->content), 100) }}
                        </p>

                        <div class="blog-footer">
                            <a href="{{ route('dynamic.route', $blog->slug) }}" class="read-more">
                                Read Article <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="text-center py-5" style="grid-column: 1 / -1;">
                    <h4 class="text-muted">No blog posts available at the moment.</h4>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="pagination-wrapper">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>
@endsection
