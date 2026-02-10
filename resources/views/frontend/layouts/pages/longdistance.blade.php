@extends('frontend.app')
@section('title', "Long Distance")
@section('content')
<style>
    /* --- FULL WIDTH FIX --- */
    .full-width-section {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        overflow: hidden;
    }

    /* --- HERO SECTION UPDATED FOR FULL IMAGE --- */
    .long-dist-hero {
        position: relative;
        /* ইমেজ না কেটে পূর্ণাঙ্গ দেখানোর জন্য 100% 100% ব্যবহার করা হয়েছে */
        background: url('{{ asset("images/airportareacab.jpeg") }}') no-repeat center center;
        background-size: 100% 100% !important;
        height: 450px; /* ডেস্কটপে স্ট্যান্ডার্ড উচ্চতা */
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4); /* টেক্সট স্পষ্ট করার জন্য হালকা ওভারলে */
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 0 15px;
        width: 100%;
    }

    .hero-subtitle {
        color: #2D9CDB;
        font-size: clamp(1rem, 2vw, 1.2rem);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 15px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.8);
    }

    .hero-title {
        font-weight: 800;
        font-size: clamp(1.8rem, 5vw, 3rem); /* ফ্লুইড টাইপোগ্রাফি */
        margin-bottom: 25px;
        text-shadow: 0 4px 8px rgba(0,0,0,0.8);
        text-transform: capitalize;
        line-height: 1.2;
    }

    /* --- MOBILE RESPONSIVE FIX --- */
    @media (max-width: 991px) {
        .long-dist-hero {
            height: 350px;
            background-size: 100% 100% !important;
        }
    }

    @media (max-width: 576px) {
        .long-dist-hero {
            height: 150px; /* ছোট মোবাইলে ইমেজ যাতে চ্যাপ্টা না লাগে */
            background-size: 100% 100% !important;
        }
    }

    /* --- CONTENT STYLES --- */
    .content-section {
        padding: 60px 0;
        background-color: #ffffff;
        font-family: 'Segoe UI', sans-serif;
        color: #555;
    }

    .lead-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #444;
        margin-bottom: 40px;
    }

    .section-heading {
        color: #2D9CDB;
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
        display: inline-block;
    }

    .section-heading::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background-color: #2D9CDB;
    }

    .destination-card {
        background: #f9f9f9;
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s;
        height: 100%;
    }

    .destination-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-top: 3px solid #2D9CDB;
    }

    .dest-title {
        color: #2D9CDB;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .travel-time {
        font-size: 0.9rem;
        font-weight: 700;
        color: #555;
        margin-top: 10px;
        display: block;
    }

    .feature-image {
        width: 100%;
        border-radius: 12px;
        margin: 30px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        object-fit: cover;
        height: 400px;
    }

    /* Sidebar */
    .sidebar-box {
        text-align: center;
        background: #fff;
        padding: 30px 20px;
        border-radius: 12px;
        border: 1px solid #f0f0f0;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }

    .trust-img {
        max-width: 150px;
        height: auto;
        margin-bottom: 15px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        transition: transform 0.3s;
    }
</style>

<div class="full-width-section long-dist-hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        {{-- <h2 class="hero-subtitle">Reliable & Comfortable</h2> --}}
        {{-- <h1 class="hero-title">Long Distance Car Service</h1> --}}
    </div>
</div>

@include('frontend.layouts.includes.booking')

<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pr-lg-5">
                <p class="lead-text">
                    At <strong>Boston Express Cab</strong>, we pride ourselves on offering reliable and comfortable long distance car services from Logan Airport to several major cities across Massachusetts and Rhode Island.
                </p>

                <h2 class="section-heading">Popular Destinations</h2>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="destination-card">
                            <h4 class="dest-title">Hyannis Car Service</h4>
                            <p>Travel comfortably to Hyannis. Stops: Cape Cod Mall, JFK Hyannis Museum, Harbor.</p>
                            <span class="travel-time"><i class="far fa-clock"></i> Travel time: 1.5 - 2 hours</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="destination-card">
                            <h4 class="dest-title">Worcester</h4>
                            <p>Known for its bustling arts scene. Don’t miss the Worcester Art Museum and Elm Park.</p>
                            <span class="travel-time"><i class="far fa-clock"></i> Travel time: ~1 hour</span>
                        </div>
                    </div>
                </div>

                <img src="{{ asset('images/car Services 4.png') }}" alt="Luxury Car Service" class="feature-image">

                <h2 class="section-heading mt-5">Recommended Hotels</h2>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><strong>Worcester:</strong> Beechwood Hotel</li>
                            <li><strong>Springfield:</strong> Sheraton Monarch Place</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><strong>Hyannis:</strong> Anchor In Distinctive Waterfront</li>
                            <li><strong>Newport:</strong> The Chanler at Cliff Walk</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-box p-0 border-0" style="background: transparent; box-shadow: none;">
                    <div style="background: #2D9CDB; color: white; padding: 30px; border-radius: 12px; text-align: center;">
                        <h4 style="font-weight: 700; margin-bottom: 10px;">Book Your Ride</h4>
                        <a href="tel:6172306362" style="color: white; font-weight: 800; font-size: 1.4rem; text-decoration: none;">
                            <i class="fas fa-phone-alt"></i> 617-230-6362
                        </a>
                    </div>
                </div>

                <div class="sidebar-box sticky-top" style="top: 100px;">
                    <h5>Top Rated Service</h5>
                    <img src="{{ asset('images/Google-Rating-1.jpeg') }}" class="trust-img">
                    <img src="{{ asset('images/Trustpilot.jpeg') }}" class="trust-img">
                    <img src="{{ asset('images/Limotrust-1.webp') }}" class="trust-img">
                    <img src="{{ asset('images/Tripadvisor.webp') }}" class="trust-img">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
