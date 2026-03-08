@extends('frontend.app')
@section('title', "Service Area")
@section('content')

<style>
    /* =========================================
        HERO SECTION - FULL WIDTH & COVER
       ========================================= */
    .service-hero {
        position: relative;
        width: 100%;
        height: 450px;
        background-color: #000;
        overflow: hidden;
        display: flex;
        align-items: flex-end; /* কন্টেন্ট নিচ থেকে পজিশন করার জন্য */
        justify-content: center;
        margin: 0;
        padding: 0;
    }

    .hero-bg-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover !important;
        object-position: center;
        z-index: 1;
    }

    .service-hero::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.45);
        z-index: 2;
    }

    .hero-content {
        position: relative;
        z-index: 3;
        color: white;
        text-align: center;
        width: 100%;
        padding: 0 15px;
        /* ডেস্কটপে নিচ থেকে ২৭০ পিক্সেল উপরে */
        margin-bottom: 270px;
    }

    .hero-title {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        text-transform: uppercase;
        text-shadow: 0 4px 15px rgba(0,0,0,0.6);
        margin: 0;
    }

    /* =========================================
        MOBILE FIX
       ========================================= */
    @media (max-width: 768px) {
        .service-hero {
            height: 150px !important;
        }
        .hero-content {
            /* মোবাইলে নিচ থেকে ৯০ পিক্সেল উপরে */
            margin-bottom: 90px;
        }
        .hero-title {
            font-size: 1.6rem !important;
        }
    }

    /* =========================================
        SERVICE AREA CARDS DESIGN (FIXED)
       ========================================= */
    .section-padding { padding: 80px 0; }
    .bg-light { background-color: #f8fafc; }

    .location-card {
        background: white;
        border-radius: 12px;
        padding: 15px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
        position: relative;
        overflow: hidden;
        margin-bottom: 25px;
        text-decoration: none !important;
        color: #1e293b;
        height: 100%; /* সব কার্ডের হাইট সমান রাখবে */
        min-height: 75px;
    }

    .location-card::before {
        content: ""; position: absolute; left: 0; top: 0; height: 100%;
        width: 0; background-color: #2D9CDB; transition: width 0.3s ease;
    }

    .location-card:hover::before { width: 4px; }

    .location-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(45, 156, 219, 0.15);
        border-color: #2D9CDB;
        color: #2D9CDB;
    }

    .icon-box {
        width: 40px; height: 40px;
        background-color: rgba(45, 156, 219, 0.1);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin-right: 12px; color: #2D9CDB;
        transition: all 0.3s ease;
        flex-shrink: 0; /* আইকন যাতে চ্যাপ্টা না হয় */
    }

    .location-card:hover .icon-box { background-color: #2D9CDB; color: white; }

    .city-text {
        font-weight: 600;
        font-size: 1rem;
        line-height: 1.3;
        flex: 1; /* টেক্সট যতটুকু জায়গা পায় তা দখল করবে */
        word-break: break-word; /* বড় শব্দ হলে ভেঙে দেবে */
        display: -webkit-box;
        -webkit-line-clamp: 2; /* ৩ লাইনের বেশি হলে ডট ডট দেখাবে */
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    @media (max-width: 576px) {
        .section-padding { padding: 40px 0; }
        .location-card { padding: 10px; gap: 8px; margin-bottom: 15px; }
        .city-text { font-size: 0.85rem; -webkit-line-clamp: 3; }
        .icon-box { width: 32px; height: 32px; margin-right: 8px; }
    }
</style>

{{-- 1. HERO SECTION --}}
<section class="service-hero">
    <img src="{{ asset('images/cab3.png') }}" alt="Service Area" class="hero-bg-img">
    <div class="hero-content">
        <h1 class="hero-title">Service Areas</h1>
    </div>
</section>

{{-- 2. LOCATION GRID SECTION --}}
<div class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-weight: 800; color: #1e293b; font-size: 2.5rem;">Areas We Cover</h2>
            <div style="width: 80px; height: 4px; background-color: #2D9CDB; margin: 15px auto; border-radius: 2px;"></div>
            <p class="text-muted">Reliable transportation across Massachusetts and New Hampshire</p>
        </div>

        <div class="row">
            @foreach($cities as $city)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 d-flex align-items-stretch">
                    <a href="{{ route('dynamic.route', $city->url) }}" class="location-card w-100">
                        <div class="icon-box">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="city-text">{{ $city->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $cities->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection
