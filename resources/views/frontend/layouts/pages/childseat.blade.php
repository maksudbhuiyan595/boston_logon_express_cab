@extends('frontend.app')
@section('title', "Child Seat Service - Boston Express Cab")
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

    /* --- HERO SECTION --- */
    .service-hero {
        position: relative;
        background: url('{{ asset("images/cab8.png") }}') no-repeat center center;
        background-size: cover !important;
        height: 400px;
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
        background: rgba(0, 0, 0, 0.5);
    }
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 20px;
    }
    .hero-title {
        font-size: clamp(1.5rem, 5vw, 3.5rem);
        font-weight: 800;
        text-shadow: 0 2px 10px rgba(0,0,0,0.5);
    }

    /* --- CONTENT ALIGNMENT FIX --- */
    .content-section {
        padding: 60px 0;
        background: var(--bg-white);
    }
    .content-block {
        margin-bottom: 50px;
    }

    /* টাইটেল এবং টেক্সট বাম দিকে এলাইন করা হয়েছে এবং জাস্টিফাই করা হয়েছে */
    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: left !important; /* Force Left Alignment */
    }

    .section-text {
        font-size: 1.05rem;
        color: var(--text-main);
        margin-bottom: 20px;
        text-align: left !important; /* Left Alignment for desktop */
        text-align: justify; /* প্যারাগ্রাফের দুই পাশ সমান রাখবে */
        display: block;
    }

    .feature-list {
        list-style: none;
        padding: 0;
        margin-top: 15px;
        text-align: left !important;
    }
    .feature-list li {
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        font-size: 1.05rem;
        text-align: left !important;
    }
    .feature-list li::before {
        content: "\f058";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: var(--accent);
        position: absolute;
        left: 0;
        top: 3px;
        font-size: 1.2rem;
    }

    .highlight-card {
        background: #F8FAFC;
        border-left: 6px solid var(--accent);
        padding: 30px;
        border-radius: 8px;
        margin: 30px 0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        text-align: left !important;
    }

    .content-img {
        width: 100%;
        height: auto;
        border-radius: var(--radius);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    /* CTA Section */
    .cta-box {
        background: #EFF6FF;
        border: 1px solid #BFDBFE;
        border-radius: var(--radius);
        padding: 50px 30px;
        text-align: center;
        margin-top: 50px;
    }

    .btn-cta {
        display: inline-block;
        background: var(--accent);
        color: white !important;
        padding: 18px 45px;
        font-weight: 700;
        border-radius: 8px;
        text-decoration: none;
        margin-top: 25px;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    /* --- MOBILE RESPONSIVE FIXES --- */
    @media (max-width: 991px) {
        .service-hero { height: 300px; }
        .section-title, .section-text, .feature-list li {
            text-align: left !important; /* মোবাইলেও সেন্টারিং বন্ধ করা হলো */
        }
        .content-img { margin-top: 30px; display: block; }
    }

    @media (max-width: 576px) {
        .service-hero {
            height: 150px; /* আপনার রিকোয়ারমেন্ট অনুযায়ী ১৫০ পিক্সেল */
        }
        .hero-title { font-size: 1.4rem; }
        .section-title { font-size: 1.5rem; text-align: left !important; }
        .section-text { font-size: 1rem; text-align: left !important; }
        .content-section { padding: 40px 0; }
    }
</style>

<div class="service-hero">
    <div class="hero-content">
        <h1 class="hero-title">Child Seat Service</h1>
    </div>
</div>

@include('frontend.layouts.includes.booking')

<div class="content-section">
    <div class="container">

        <div class="row align-items-center content-block">
            <div class="col-lg-7">
                <h2 class="section-title">Professional Family Travel in Boston</h2>
                <p class="section-text">
                    A trip with children takes more planning than an ordinary one. Parents need comfort, convenience and, above all, peace of mind. At <strong>Boston Express Cab</strong>, our Child Seat Service is one of our initiatives to improve family travel in Boston providing child seats and booster seats for children of <strong>0-7 years old</strong>.
                </p>
                <p class="section-text">
                    Whether heading to Logan Airport, a hotel, a family home, a medical appointment, or just about anywhere in Boston, families can book the proper seating option ahead of time and travel with renewed confidence.
                </p>
                <p class="section-text">
                    Our goal is straightforward: offer a more family-friendly travel experience for parents who want to avoid lugging heavy seats around, sourcing last-minute transportation, and risking whether the appropriate seating selection will be available at dispatch.
                </p>
            </div>
            <div class="col-lg-5 text-center">
                <img src="{{ asset('images/Taxi-with-Infant-Car-seat-Boston.webp') }}" class="content-img" alt="Safe Child Seat Taxi">
            </div>
        </div>

        <div class="content-block">
            <p class="section-text">
                The goal of Boston Express Cab is to ensure that families can go ahead and book a ride with peace of mind knowing that there has been consideration for their transportation needs before the journey even begins.
            </p>
        </div>

        <div class="highlight-card">
            <h2 class="section-title">Child Seat and Booster Seat Options</h2>
            <p class="section-text">
                Boston Express Cab provides seating options for younger passengers through different stages of early childhood. We provide:
            </p>
            <ul class="feature-list">
                <li><strong>Child Seats:</strong> For babies and toddlers.</li>
                <li><strong>Booster Seats:</strong> For older kids up to age 7.</li>
                <li><strong>Versatile Services:</strong> Pre-arranged seating requests for transportation to and from the airport, local transportation, or family travel.</li>
            </ul>
        </div>

        <div class="content-block">
            <h2 class="section-title">A Better Travel Option for Families</h2>
            <p class="section-text">
                Traveling with kids usually involves wrangling luggage, strollers, snacks, altered schedules, and tired little travelers. In those moments, every little detail matters. Transport services that already know about family needs are able to make the whole trip much smoother from start to finish.
            </p>
            <p class="section-text">
                Boston Express Cab’s child seat service is intended to relieve stress for parents while providing a more comfortable ride for kids. Instead of having another thing to manage - a child seat in a busy airport transfer or city pickup, families can request whatever they need at the time of booking and concentrate on the journey itself.
            </p>
        </div>

        <div class="content-block">
            <h3 class="section-title" style="font-size: 1.4rem;">Our service is useful for:</h3>
            <ul class="feature-list">
                <li>Families arriving at, or departing from, Logan Airport</li>
                <li>Travelling with children to hotels, homes or short-term stays</li>
                <li>Local rides throughout Boston and surrounding areas</li>
                <li>Visiting with family, trips, and day-long outings</li>
            </ul>
        </div>

        <div class="row align-items-center content-block">
            <div class="col-lg-5 text-center order-lg-1 order-2">
                <img src="{{ asset('images/Airport-Taxi-with-Car-Seat.webp') }}" class="content-img" alt="Logan Airport Family Travel">
            </div>
            <div class="col-lg-7 order-lg-2 order-1">
                <h2 class="section-title">Ideal for Logan Airport Transfers</h2>
                <p class="section-text">
                    Airport travel can be one of the most challenging aspects of travelling with kids. Long flights and baggage collection, unfamiliar surroundings, and keeping kids calm upon arrival - transportation often feels like the toughest part of a day. That is one reason many families prefer arranging their ride in advance rather than relying on finding something available once they land.
                </p>
                <p class="section-text">
                    Boston Express Cab simplifies that with child seat and booster seat options for airport pickups and drop-offs.
                </p>
            </div>
        </div>

        <div class="content-block">
            <h2 class="section-title">Why Families Choose Us</h2>
            <p class="section-text">
                Families choosing child seat transportation usually want more than just a ride. They want preparation and reliability, a service that understands the needs of tiny passengers.
            </p>
            <ul class="feature-list">
                <li>Increased ease of travelling with children</li>
                <li>Reduced suitcase weight during hotel and airport transfers</li>
                <li>A more prepared and organized pickup experience</li>
                <li>Children more comfortably riding in better conditions</li>
            </ul>
        </div>

        <div class="highlight-card">
            <h2 class="section-title">Easy to Request When Booking</h2>
            <p class="section-text">
                It's easy to book a ride with a child seat or booster seat. When booking, all you need to do with Boston Express Cab is let us know that a child seat would be necessary as well as the age range of the child. Advance notice is always recommended for airport travel and holidays.
            </p>
        </div>

        <div class="cta-box">
            <h2 class="section-title" style="text-align: center !important;">Travel with More Confidence</h2>
            <p class="section-text" style="text-align: center !important;">
                Request a child seat or booster seat at the time of booking and travel Boston with greater comfort and confidence.
            </p>
            <a href="{{ url('/') }}" class="btn-cta">Book Now</a>
        </div>

    </div>
</div>

@endsection
