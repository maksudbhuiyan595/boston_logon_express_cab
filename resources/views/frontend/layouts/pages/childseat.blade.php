@extends('frontend.app')
@section('title', "Child Seat")
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #111827;
        --accent: #2563EB;
        --accent-hover: #1D4ED8;
        --bg-body: #F9FAFB;
        --bg-white: #FFFFFF;
        --text-main: #374151;
        --text-muted: #6B7280;
        --border-light: #E5E7EB;
        --radius: 12px;
    }

    body {
        background-color: var(--bg-body);
        font-family: 'Inter', sans-serif;
        color: var(--text-main);
        line-height: 1.7;
    }

    /* --- HERO SECTION UPDATED FOR FULL IMAGE --- */
    .service-hero {
        position: relative;
        background: url('{{ asset("images/seat.png") }}') no-repeat center center;
        background-size: 100% 100% !important;
        height: 450px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }
    .service-hero::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.5); /* Overlay opacity adjusted */
    }
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 20px;
    }
    .hero-title {
        font-size: clamp(1.8rem, 5vw, 3rem);
        font-weight: 800;
        margin-bottom: 10px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.5);
    }
    .hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.2rem);
        font-weight: 500;
        opacity: 0.95;
    }

    /* --- CONTENT SECTIONS --- */
    .content-section {
        padding: 60px 0;
        background: var(--bg-white);
    }
    .content-block {
        margin-bottom: 50px;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .section-text {
        font-size: 1.05rem;
        color: var(--text-main);
        margin-bottom: 20px;
    }

    /* Feature List */
    .feature-list {
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }
    .feature-list li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        font-size: 1rem;
    }
    .feature-list li::before {
        content: "\f00c";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: var(--accent);
        position: absolute;
        left: 0;
        top: 3px;
    }

    /* Image Styling */
    .content-img {
        width: 100%;
        height: auto;
        border-radius: var(--radius);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    /* CTA Section */
    .cta-box {
        background: #EFF6FF;
        border: 1px solid #BFDBFE;
        border-radius: var(--radius);
        padding: 40px;
        text-align: center;
        margin-top: 40px;
    }
    .btn-cta {
        display: inline-block;
        background: var(--accent);
        color: white !important;
        padding: 15px 35px;
        font-weight: 700;
        border-radius: 8px;
        text-decoration: none;
        margin-top: 20px;
        transition: 0.2s;
    }
    .btn-cta:hover {
        background: var(--accent-hover);
    }

    /* --- MOBILE RESPONSIVE UPDATES --- */
    @media (max-width: 991px) {
        .service-hero {
            height: 350px;
            background-size: 100% 100% !important; /* মোবাইলেও পূর্ণাঙ্গ ইমেজ */
        }
        .section-title {
            font-size: 1.5rem;
            text-align: center;
        }
        .section-text {
            text-align: center;
            font-size: 1rem;
        }
        .feature-list {
            display: inline-block;
            text-align: left;
            width: 100%;
        }
        .content-block {
            text-align: center;
        }
        .order-lg-2, .order-lg-1 {
            order: unset !important;
        }
        .content-img {
            margin-top: 20px;
            max-width: 90%;
        }
    }

    @media (max-width: 576px) {
        .service-hero {
            height: 150px; /* ছোট মোবাইলে ইমেজ যাতে চ্যাপ্টা না লাগে তাই উচ্চতা কিছুটা কমানো হয়েছে */
            background-size: 100% 100% !important;
        }
        .btn-cta {
            width: 100%;
            padding: 12px 20px;
        }
    }
</style>

<div class="service-hero">
    <div class="hero-content">
        <h1 class="hero-title">Child Seat Taxi Service</h1>
        <p class="hero-subtitle">Safe, Comfortable, and Reliable Transportation for Your Little Ones.</p>
    </div>
</div>

@include('frontend.layouts.includes.booking')

<div class="content-section">
    <div class="container">
        <div class="row align-items-center content-block">
            <div class="col-lg-7">
                <p class="section-text">
                    Traveling in a busy city like Boston with a child can be a challenge, especially when you need a safe and secure ride. At <strong>Boston Logan Airport Taxi</strong>, we provide specialized <strong>taxi with infant car seat services</strong> to accommodate your needs. Whether you're heading to Logan Airport or returning home from the hospital with a newborn, our services ensure safety and comfort for your family.
                </p>

                <h2 class="section-title mt-4">Why Choose Our Taxi With Infant Car Seat In Boston?</h2>
                <ul class="feature-list">
                    <li>Clean, sanitized infant, toddler & booster seats.</li>
                    <li>Options for rear-facing and forward-facing car seats.</li>
                    <li>Drivers are adequately trained in the installation of child seats.</li>
                    <li>24/7 support, including last-minute travel assistance.</li>
                    <li>Easy booking by phone or online.</li>
                </ul>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('images/Taxi-with-Infant-Car-seat-Boston.webp') }}" class="content-img" alt="Baby in Car Seat">
            </div>
        </div>

        <div class="content-block">
            <h2 class="section-title">Airport Taxi With Car Seat</h2>
            <p class="section-text">
                Traveling with children and flying in or out of Logan? We provide professional <strong>airport taxi with car seat</strong> for a hassle-free and safe ride.
            </p>
        </div>

        <div class="row align-items-center content-block">
            <div class="col-lg-5 order-lg-2">
                <img src="{{ asset('images/Airport-Taxi-with-Car-Seat.webp') }}" class="content-img" alt="Mother and Newborn">
            </div>
            <div class="col-lg-7 order-lg-1">
                <h2 class="section-title">Newborn Taxi For Your Baby's First Ride Home</h2>
                <p class="section-text">
                    Our <strong>newborn taxi</strong> is made just for new parents. We offer the highest quality car seats that are clean and safe.
                </p>
            </div>
        </div>

        <div class="cta-box">
            <h2 class="font-weight-bold text-dark mb-3">Conclusion</h2>
            <p class="text-muted mb-4">
                At <strong>Boston Logan Airport Taxi</strong>, we value nothing more than the safety of your child.
            </p>
            <a href="{{ url('/') }}" class="btn-cta">
                Book Now & Request a Car Seat
            </a>
        </div>
    </div>
</div>

@endsection
