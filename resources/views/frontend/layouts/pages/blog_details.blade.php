@extends('frontend.app')

{{-- SEO Meta Tags --}}
@section('title', $blog->meta_title ?? ($blog->title . ' | Boston Express Cab'))

@section('meta')
    <meta name="description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="keywords" content="{{ $blog->tags ?? 'blog, taxi service, Boston' }}">
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">

            {{-- Category or Label (Optional) --}}
            <div class="mb-2">
                <span class="text-primary fw-bold text-uppercase small">Latest Updates</span>
            </div>

            {{-- Title --}}
            <h1 class="mb-3" style="font-weight: 800; line-height: 1.2;">{{ $blog->title }}</h1>

            {{-- Post Info --}}
            <div class="text-muted mb-4 pb-3 border-bottom d-flex justify-content-between">
                <span>By Boston Express Cab</span>
                <span>{{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') : 'Published Recently' }}</span>
            </div>

            {{-- Image --}}
            @if($blog->thumbnail)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" class="img-fluid rounded shadow-sm">
                </div>
            @endif

            {{-- Main Body --}}
            <div class="blog-text" style="font-size: 1.1rem; line-height: 1.7; color: #333;">
                {!! $blog->content !!}
            </div>

            {{-- Bottom Section --}}
            <hr class="my-5">

            @if($blog->tags)
                <div class="mb-4">
                    <span class="me-2 text-muted">Tags:</span>
                    @foreach(explode(',', $blog->tags) as $tag)
                        <span class="badge bg-light text-dark border me-1">{{ trim($tag) }}</span>
                    @endforeach
                </div>
            @endif

            <a href="{{ route('blogs') }}" class="btn btn-dark">← Back to Blog List</a>

        </div>
    </div>
</div>

<style>
    /* Styling for the content coming from the editor */
    .blog-text p { margin-bottom: 1.5rem; }
    .blog-text h2, .blog-text h3 { margin-top: 2rem; margin-bottom: 1rem; font-weight: 700; }
    .blog-text img { max-width: 100%; height: auto; border-radius: 5px; }
    .blog-text ul, .blog-text ol { margin-bottom: 1.5rem; }
</style>
@endsection
