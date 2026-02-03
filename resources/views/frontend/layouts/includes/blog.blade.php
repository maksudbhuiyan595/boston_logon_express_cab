<style>
    /* --- SECTION BASE --- */
    .section-padding { padding: 80px 0; background-color: #f9f9f9; }
    .section-title { color: var(--brand-blue, #1a2a6c); font-weight: 800; font-size: 2.2rem; margin-bottom: 15px; text-align: center; }

    /* --- BLOG GRID --- */
    .blog-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-top: 20px; }

    /* --- BLOG CARD --- */
    .blog-card { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; border: 1px solid #eee; display: flex; flex-direction: column; height: 100%; }
    .blog-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); }

    .blog-img-box { overflow: hidden; height: 220px; position: relative; background: #e2e8f0; }
    .blog-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .blog-card:hover .blog-img { transform: scale(1.1); }

    .blog-content { padding: 25px; flex-grow: 1; display: flex; flex-direction: column; }
    .blog-cat { display: inline-block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #1a2a6c; background: rgba(26, 42, 108, 0.1); padding: 4px 12px; border-radius: 20px; margin-bottom: 12px; width: fit-content; }

    .blog-title { font-size: 1.25rem; font-weight: 700; color: #222; text-decoration: none; margin-bottom: 12px; line-height: 1.4; transition: color 0.3s; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .blog-title:hover { color: #1a2a6c; }

    .blog-excerpt { color: #64748b; font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }

    .blog-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f0f0f0; padding-top: 15px; margin-top: auto; }
    .read-more { font-size: 0.9rem; font-weight: 700; color: #1a2a6c; text-decoration: none; transition: all 0.3s; }
    .read-more:hover { color: #b38728; padding-left: 5px; }
    .blog-date { font-size: 0.85rem; color: #94a3b8; display: flex; align-items: center; gap: 5px; }

    /* --- RESPONSIVE --- */
    @media (max-width: 991px) { .blog-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 768px) { .blog-grid { grid-template-columns: 1fr; } .section-title { font-size: 1.8rem; } }
</style>

@if(isset($blogs) && $blogs->count() > 0)
<section class="section-padding">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Latest Blog</h2>
            <div style="width: 60px; height: 4px; background: #b38728; margin: 0 auto 50px; border-radius: 2px;"></div>
        </div>

        <div class="blog-grid">
            @foreach($blogs as $blog)
                <div class="blog-card">
                    <div class="blog-img-box">
                        @if($blog->thumbnail)
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" class="blog-img">
                        @else
                            <img src="{{ asset('images/default-blog.jpg') }}" alt="Default" class="blog-img">
                        @endif
                    </div>

                    <div class="blog-content">
                        {{-- FIXED TAGS LOGIC: Prevents explode() error on array --}}
                        @if($blog->tags)
                            @php
                                $tagData = is_array($blog->tags) ? $blog->tags : explode(',', $blog->tags);
                                $displayTag = !empty($tagData[0]) ? trim($tagData[0]) : null;
                            @endphp
                            @if($displayTag)
                                <span class="blog-cat">{{ $displayTag }}</span>
                            @endif
                        @endif

                        <a href="{{ route('dynamic.route', $blog->slug) }}" class="blog-title">
                            {{ $blog->title }}
                        </a>

                        <p class="blog-excerpt">
                            {{ Str::limit(strip_tags($blog->content), 100) }}
                        </p>

                        <div class="blog-footer">
                            <a href="{{ route('dynamic.route', $blog->slug) }}" class="read-more">Read More »</a>
                            <span class="blog-date">
                                <i class="far fa-clock"></i>
                                {{ \Carbon\Carbon::parse($blog->published_at ?? $blog->created_at)->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
