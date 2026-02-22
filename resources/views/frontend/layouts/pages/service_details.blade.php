@extends('frontend.app')

{{-- 1. SEO SECTION --}}
@section('title', $page->meta_title ?? ($page->route_name . ' | Boston Express Cab'))
@section('meta_description', "$page->meta_description")

    <meta name="keywords" content="{{ is_array($page->tags) ? implode(', ', $page->tags) : ($page->tags ?? 'Boston Express Cab, taxi, airport transfer') }}">
    <meta property="og:image" content="{{ $page->cover_image ? asset('storage/' . $page->cover_image) : asset('images/home3.jpeg') }}">

@section('schema')
    @php
        $schemaData = [
            "@context" => "https://schema.org",
            "@type" => "WebPage",
            "name" => "$page->meta_title",
            "url" => url()->current() .'/',
            "image" => asset('storage/' . $page->cover_image),
            "description" => "$page->meta_description)",
            "telephone" => "617-230-6362",
            "priceRange" => "$$",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Boston Express Cab",
                "address" => [
                    "@type" => "PostalAddress",
                    "addressLocality" => "Boston",
                    "addressRegion" => "MA",
                    "addressCountry" => "US"
                ]
            ],
            "areaServed" => [
                ["@type" => "City", "name" => "Boston"],
                ["@type" => "Airport", "name" => "Logan International Airport"],
                ["@type" => "City", "name" => "Cambridge"]
            ],
            "author" => [
                "@type" => "Person",
                "name" => "Omar Khan"
            ]
        ];
    @endphp

@section('schema')
<script type="application/ld+json">
    {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')

    <style>
        /* --- COVER SECTION --- */
        .page-cover-wrapper {
            position: relative;
            width: 100%;
            height: 400px; /* ডেস্কটপে হাইট */
            background-color: #000;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .responsive-cover-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            opacity: 0.6;
        }

        /* টেক্সট ওভারলে */
        .cover-text-overlay {
            position: absolute;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 0 20px;
            width: 100%;
        }

        .cover-text-overlay h1 {
            font-size: 3.5rem;
            font-weight: 800;
            text-transform: uppercase;
            text-shadow: 2px 4px 15px rgba(0, 0, 0, 0.7);
            margin: 0;
        }

        /* --- CONTENT STYLES --- */
        .page-content-wrapper {
            padding: 60px 0;
            background-color: #fff;
        }

        .page-content {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #334155;
        }

        .page-content h2, .page-content h3 {
            color: #1e293b;
            font-weight: 700;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        /* --- TAGS --- */
        .tag-badge {
            background-color: #e2e8f0;
            color: #475569;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin: 5px;
            transition: all 0.3s;
        }
        .tag-badge:hover {
            background-color: #2D9CDB;
            color: #fff;
        }

        /* --- MOBILE RESPONSIVE --- */
        @media (max-width: 768px) {
            .page-cover-wrapper {
                height: 150px;
            }
            .responsive-cover-img {
                object-fit: cover;
            }

            .cover-text-overlay h1 {
                font-size: 1.8rem;
            }

            .page-content-wrapper {
                padding: 30px 0;
            }
        }
    </style>

    {{-- 1. COVER IMAGE SECTION --}}
    <div class="page-cover-wrapper">
        @php
            $imagePath = ($page->cover_image && file_exists(public_path('storage/' . $page->cover_image)))
                ? asset('storage/' . $page->cover_image)
                : asset('images/home3.jpeg');
        @endphp
        <img src="{{ $imagePath }}" alt="{{ $page->route_name }}" class="responsive-cover-img">

        <div class="cover-text-overlay">
            <h1>{{ $page->route_name }}</h1>
        </div>
    </div>

    {{-- 2. BOOKING SECTION --}}
    <section class="booking-section-wrapper">
        @include('frontend.layouts.includes.booking')
    </section>

    {{-- 3. MAIN CONTENT SECTION --}}
    <div class="page-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="page-content">
                        {!! $page->content !!}
                    </div>

                    {{-- Tags Section --}}
                    @if($page->tags)
                        <div class="mt-5 pt-4 border-top">
                            @php $tags = is_array($page->tags) ? $page->tags : explode(',', $page->tags); @endphp
                            @foreach($tags as $tag)
                                <span class="tag-badge">#{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    @endif

                    {{-- FAQ Section --}}
                    @php
                        $faqItems = [];
                        if (!empty($page->faqs)) {
                            $faqItems = is_string($page->faqs) ? json_decode($page->faqs, true) : $page->faqs;
                        }
                    @endphp

                    @if(!empty($faqItems) && count($faqItems) > 0)
                        <div class="mt-5">
                            <h3 class="mb-4 text-center" style="font-weight: 800;">Frequently Asked Questions</h3>
                            <div class="accordion accordion-flush shadow-sm border rounded" id="faqAccordion">
                                @foreach($faqItems as $index => $faq)
                                    @if(!empty($faq['question']) || !empty($faq['title']))
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" style="font-weight: 600;">
                                                    {{ $faq['question'] ?? ($faq['title'] ?? 'Question') }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body text-secondary">
                                                    {!! $faq['answer'] ?? ($faq['description'] ?? 'No answer provided.') !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
