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
        height: 450px; /* ডেস্কটপ হাইট */
        background-color: #000;
        overflow: hidden;
        display: flex;
        align-items: center;
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
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        text-transform: uppercase;
        text-shadow: 0 4px 15px rgba(0,0,0,0.6);
    }

    /* =========================================
        MOBILE FIX - 145px HEIGHT
       ========================================= */
    @media (max-width: 768px) {
        .service-hero {
            /* আপনার চাহিদামতো হাইট ১৪৫ পিক্সেল করা হলো */
            height: 150px !important;
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        .hero-bg-img {
            object-fit: cover !important;
            width: 100% !important;
            height: 100% !important;
            object-position: center center;
        }

        /* ১৪৫ পিক্সেল হাইটে টাইটেল একটু ছোট না করলে সুন্দর দেখাবে না */
        .hero-title {
            font-size: 1.6rem !important;
            margin-bottom: 0;
        }

        .badge {
            font-size: 0.7rem !important;
            margin-bottom: 5px !important;
            padding: 5px 10px !important;
        }
    }

    /* =========================================
        SERVICE AREA CARDS DESIGN
       ========================================= */
    .section-padding { padding: 80px 0; }
    .bg-light { background-color: #f8fafc; }

    .location-card {
        background: white;
        border-radius: 12px;
        padding: 15px 20px;
        display: block;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
        position: relative;
        overflow: hidden;
        margin-bottom: 25px;
        text-decoration: none !important;
        color: #1e293b;
    }

    .card-content-flex { display: flex; align-items: center; }

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
        width: 45px; height: 45px;
        background-color: rgba(45, 156, 219, 0.1);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin-right: 15px; color: #2D9CDB;
        transition: all 0.3s ease; flex-shrink: 0;
    }

    .location-card:hover .icon-box { background-color: #2D9CDB; color: white; }
    .city-text { font-weight: 600; font-size: 1.05rem; }

    @media (max-width: 576px) {
        .section-padding { padding: 40px 0; }
        .location-card { padding: 12px 10px; }
        .city-text { font-size: 0.9rem; }
    }
</style>

{{-- 1. HERO SECTION --}}
<section class="service-hero">
    <img src="{{ asset('images/carservicelogon.png') }}" alt="Service Area" class="hero-bg-img">
    <div class="hero-content">
        <span class="badge bg-primary px-3 py-2 mb-2" style="text-transform: uppercase;">Professional Service</span>
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

        <div class="row city-grid-row">
            @foreach($cities as $city)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <a href="{{ route('dynamic.route', $city->url) }}" class="location-card">
                        <div class="card-content-flex">
                            <div class="icon-box">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span class="city-text">{{ $city->name }}</span>
                        </div>
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
