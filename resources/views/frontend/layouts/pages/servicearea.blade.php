@extends('frontend.app')
@section('title', "Service Area")
@section('content')

<style>
    /* =========================================
        HERO SECTION STYLES
       ========================================= */
    .service-hero {
        position: relative;
        width: 100%;
        height: 450px;
        background-color: #000;
        overflow: hidden;
        display: flex;
        align-items: flex-end;
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
        margin-bottom: 270px; /* Desktop distance from bottom */
    }

    .hero-title {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        text-transform: uppercase;
        text-shadow: 0 4px 15px rgba(0,0,0,0.6);
        margin: 0;
    }

    /* =========================================
        SERVICE AREA CARDS (2-LINE FIX)
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
        height: 100%;
        min-height: 85px; /* Ensures all cards stay the same size */
    }

    .location-card::before {
        content: "";
        position: absolute;
        left: 0; top: 0;
        height: 100%;
        width: 0;
        background-color: #2D9CDB;
        transition: width 0.3s ease;
    }

    .location-card:hover::before { width: 4px; }

    .location-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(45, 156, 219, 0.15);
        border-color: #2D9CDB;
        color: #2D9CDB;
    }

    .icon-box {
        width: 40px;
        height: 40px;
        background-color: rgba(45, 156, 219, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: #2D9CDB;
        transition: all 0.3s ease;
        flex-shrink: 0; /* Prevents icon from squishing */
    }

    .location-card:hover .icon-box {
        background-color: #2D9CDB;
        color: white;
    }

    /* --- CITY TEXT 2-LINE ELLIPSIS --- */
    .city-text {
        font-weight: 600;
        font-size: 1rem;
        line-height: 1.4;
        flex: 1;
        color: #334155;
        word-break: break-all; /* Breaks long strings like "boston-to-provincetown" */

        /* 2-Line Clamping logic */
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Limits to exactly 2 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis; /* Adds the "..." at the end */

        /* Force container height to 2 lines for symmetry */
        min-height: 2.8em;
        display: flex;
        align-items: center;
    }

    /* =========================================
        RESPONSIVE FIXES
       ========================================= */
    @media (max-width: 768px) {
        .service-hero {
            height: 150px !important;
        }
        .hero-content {
            margin-bottom: 90px; /* Mobile distance from bottom */
        }
        .hero-title {
            font-size: 1.6rem !important;
        }
    }

    @media (max-width: 576px) {
        .section-padding { padding: 40px 0; }
        .location-card {
            padding: 10px;
            min-height: 75px;
            margin-bottom: 15px;
        }
        .icon-box {
            width: 32px;
            height: 32px;
            margin-right: 8px;
        }
        .city-text {
            font-size: 0.85rem;
            min-height: 2.6em;
        }
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
