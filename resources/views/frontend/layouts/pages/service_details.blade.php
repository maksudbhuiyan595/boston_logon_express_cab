@extends('frontend.app')

{{-- 1. SEO SECTION --}}
@section('title', $page->meta_title ?? ($page->route_name . ' | Boston Express Cab'))

@section('meta')
    <meta name="description" content="{{ $page->meta_description ?? Str::limit(strip_tags($page->content), 160) }}">
    <meta name="keywords"
        content="{{ is_array($page->tags) ? implode(', ', $page->tags) : ($page->tags ?? 'Boston Express Cab, taxi, airport transfer') }}">
    <meta property="og:image"
        content="{{ $page->cover_image ? asset('storage/' . $page->cover_image) : asset('images/home3.jpeg') }}">
@endsection

@section('content')

    <style>
        .page-cover-wrapper {
            position: relative;
            /* টেক্সট ওভারলে করার জন্য */
            width: 100%;
            height: 400px;
            /* পিসির জন্য ফিক্সড হাইট */
            background-color: #000;
            overflow: hidden;
        }

        .responsive-cover-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* ইমেজ ফুল উইডথ জুড়ে থাকবে এবং কেটে যাবে না (zoom fill) */
            display: block;
            opacity: 0.7;
            /* টেক্সট ক্লিয়ার দেখানোর জন্য ইমেজ কিছুটা ডার্ক করা হয়েছে */
        }

        /* ইমেজের ওপরের টেক্সট ডিজাইন */
        .cover-text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            text-align: center;
            color: white;
            padding: 0 15px;
        }

        .cover-text-overlay h1 {
            font-size: 3rem;
            font-weight: 800;
            text-transform: uppercase;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
        }

        /* মোবাইল রেসপনসিভ */
        @media (max-width: 768px) {
            .page-cover-wrapper {
                height: 250px;
                /* মোবাইলে হাইট কিছুটা কম */
            }

            .cover-text-overlay h1 {
                font-size: 1.8rem;
            }
        }
    </style>

    {{-- 1. COVER IMAGE SECTION WITH TEXT OVERLAY --}}
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
    @include('frontend.layouts.includes.booking')

    {{-- 3. MAIN CONTENT SECTION --}}
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                {{-- কন্টেন্ট এরিয়া --}}
                <div class="page-content" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                    {!! $page->content !!}
                </div>

                @if($page->tags)
                    <div class="mt-4">
                        @php $tags = is_array($page->tags) ? $page->tags : explode(',', $page->tags); @endphp
                        @foreach($tags as $tag)
                            <span class="badge bg-primary me-1 px-3 py-2">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>


        {{-- FAQ Section Start --}}
        @php

            $faqItems = [];
            if (!empty($page->faqs)) {

                $faqItems = is_string($page->faqs) ? json_decode($page->faqs, true) : $page->faqs;
            }
        @endphp

        @if(!empty($faqItems) && count($faqItems) > 0)
            <div class="row mt-5">
                <div class="col-md-12">


                    <h3 class="mb-4 text-center">Frequently Asked Questions</h3>

                    <div class="accordion shadow-sm" id="faqAccordion">
                        @foreach($faqItems as $index => $faq)
                            @if(!empty($faq['question']) || !empty($faq['title']))
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}">
                                            <strong>{{ $faq['question'] ?? ($faq['title'] ?? 'Question') }}</strong>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            {!! $faq['answer'] ?? ($faq['description'] ?? 'No answer provided.') !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
