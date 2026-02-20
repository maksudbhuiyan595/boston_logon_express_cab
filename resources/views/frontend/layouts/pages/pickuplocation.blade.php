@extends('frontend.app')
@section('title', "Logan Airport Pick Up - Find Your Driver Quickly and Easily")
@section('meta_description', "Landing at Logan Airport? No worries! This guide shows exactly where to meet your driver for a stress-free pick up at each Terminal and Boston South.")

@section('schema')
    @php
        $schemaData = [
            "@context" => "https://schema.org",
            "@type" => "TaxiService",
            "name" => "Logan Airport Pick Up - Find Your Driver Quickly and Easily",
            "url" => url()->current().'/',
            "image" => asset('images/cab22.png'),
            "description" => "Landing at Logan Airport? No worries! This guide shows exactly where to meet your driver for a stress-free pick up at each Terminal and Boston South.",
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
<script type="application/ld+json">
    {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
<style>
    /* --- HERO SECTION --- */
    .picuplocation-section {
        position: relative;
        width: 100vw;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        height: 400px;
        background: url('{{ asset('images/cab22.png') }}') no-repeat center center;
        background-size: cover !important;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 0 20px;
        width: 100%;
    }

    .hero-title {
        color: #ffffff;
        font-weight: 800;
        font-size: clamp(2rem, 5vw, 3.5rem);
        margin-bottom: 10px;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
    }

    .hero-subtitle {
        color: #e0e0e0;
        font-size: clamp(0.9rem, 2vw, 1.3rem);
        max-width: 750px;
        margin: 0 auto;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    }

    /* --- CONTENT AREA --- */
    .content-wrapper {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .section-title {
        color: #1a2b3c;
        font-weight: 700;
        font-size: 2.2rem;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #2D9CDB;
        margin-top: 10px;
        border-radius: 2px;
    }

    .terminal-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-top: 4px solid #2D9CDB;
        height: 100%;
        transition: transform 0.3s ease;
    }

    .terminal-card:hover { transform: translateY(-5px); }

    .highlight { color: #2D9CDB; font-weight: 700; }

    .sidebar-box {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        margin-bottom: 30px;
        text-align: center;
    }

    .contact-widget {
        background: #2D9CDB;
        color: white;
        border-radius: 8px;
        padding: 20px;
    }

    .trust-img {
        max-width: 140px;
        margin: 0 auto 15px;
        display: block;
        filter: grayscale(20%);
    }

    @media (max-width: 767px) {
        .picuplocation-section { height: 200px; }
        .hero-title { font-size: 1.8rem; }
        .hero-subtitle { font-size: 0.85rem; }
    }
</style>

<div class="picuplocation-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">Logan Airport Pick Up</h1>
        <p class="hero-subtitle">Step-by-step instructions to find your driver quickly & easily at every terminal.</p>
    </div>
</div>

<div class="booking-wrapper mt-5">
    @include('frontend.layouts.includes.booking')
</div>

<section class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-header mb-5">
                    <h2 class="section-title">Finding Your Ride at Logan Airport</h2>
                    <p class="mt-4 lead text-dark">Need a ride after your flight? We’ve got you covered! Here’s how to smoothly connect with your driver from <strong>Boston Express Cab</strong>:</p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon" style="color:#2D9CDB; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-plane-arrival"></i></div>
                            <h4 style="font-weight:700;">Terminals A & E</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                Once you’ve collected your baggage, head outside and turn <strong>LEFT</strong> after crossing the two traffic lanes. Your driver will be waiting at the <span class="highlight">Limo Stand</span>.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon" style="color:#2D9CDB; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-suitcase-rolling"></i></div>
                            <h4 style="font-weight:700;">Terminal B (Main)</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                <em>(American, Virgin America, United, USAir, Air Canada, Spirit)</em><br>
                                Go downstairs to the <strong>Ground Floor</strong> parking garage. Walk to the pickup area and find the <span class="highlight">Limo Stand</span>.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon" style="color:#2D9CDB; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-level-up-alt"></i></div>
                            <h4 style="font-weight:700;">Terminal C</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                <em>(JetBlue, Alaska)</em><br>
                                Take the escalator <strong>UP</strong> after baggage claim. Exit through the doors past the drop-off zone to meet at the <span class="highlight">Limo Stand</span>.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card" style="border-top-color: #333;">
                            <div class="card-icon" style="color:#333; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-subway"></i></div>
                            <h4 style="font-weight:700;">South Station</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                Exit via <strong>Atlantic Ave</strong> and walk left towards the taxi stand. Your driver will be waiting there for a seamless transition.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 p-4 bg-white rounded shadow-sm border-left border-primary">
                    <h4 style="font-weight:700;">Enjoy a Stress-Free Ride</h4>
                    <p class="mb-0 text-muted">With <strong>Boston Express Cab</strong>, your journey begins as soon as you land. Our professional drivers are dedicated to providing a comfortable travel experience. Sit back, relax, and enjoy the ride!</p>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="sidebar-box">
                    <div class="contact-widget">
                        <i class="fas fa-headset" style="font-size:2rem; margin-bottom:10px;"></i>
                        <h5>Need Help Finding Us?</h5>
                        <p class="small">Call or text your driver anytime</p>
                        <a href="tel:6172306362" style="color:white; font-weight:bold; font-size:1.2rem; text-decoration:none;">617-230-6362</a>
                    </div>
                </div>

                <div class="sidebar-box">
                    <h5 style="font-weight:700; color:#1a2b3c; margin-bottom:20px; text-transform:uppercase; font-size:0.9rem;">Our Trust Score</h5>
                    <img src="{{ asset('images/Google-Rating-1.jpeg') }}" class="trust-img" alt="Google Rating">
                    <img src="{{ asset('images/Trustpilot.jpeg') }}" class="trust-img" alt="Trustpilot">
                    <img src="{{ asset('images/Limotrust-1.webp') }}" class="trust-img" alt="Limo Trust">
                    <img src="{{ asset('images/Tripadvisor.webp') }}" class="trust-img" alt="Tripadvisor">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
