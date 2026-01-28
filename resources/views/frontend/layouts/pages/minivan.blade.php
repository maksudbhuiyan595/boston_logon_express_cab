@extends('frontend.app')
@section('title', "Minivan")

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
    }

    /* --- HERO SECTION --- */
    .minivan-hero {
        /* Your specific car image */
        background-image: url('images/cab6.jpeg');
        background-size: cover;
        background-position: center;
        height: 500px;
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
        background: rgba(0, 0, 0, 0.5); /* Overlay for text readability */
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-weight: 800;
        font-size: 3.5rem;
        margin-bottom: 20px;
        text-shadow: 0 4px 8px rgba(0,0,0,0.6);
        text-transform: capitalize;
    }

    /* Call Button - Logo Color */
    .btn-hero-call {
        background-color: #2D9CDB;
        color: white;
        padding: 14px 40px;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(45, 156, 219, 0.4);
        transition: transform 0.3s, background-color 0.3s;
        border: 2px solid #2D9CDB;
    }

    .btn-hero-call:hover {
        background-color: #1a88c3;
        border-color: #1a88c3;
        color: white;
        transform: translateY(-3px);
        text-decoration: none;
    }

    /* --- MAIN CONTENT --- */
    .minivan-content-section {
        padding: 60px 0;
        background-color: #ffffff;
        font-family: 'Segoe UI', sans-serif;
        color: #555;
    }

    .lead-text {
        font-size: 1.15rem;
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

    /* Custom List */
    .custom-list {
        list-style: none;
        padding-left: 0;
    }

    .custom-list li {
        margin-bottom: 18px;
        position: relative;
        padding-left: 35px;
        line-height: 1.6;
        font-size: 1rem;
    }

    .custom-list li::before {
        content: '\2713'; /* Checkmark */
        position: absolute;
        left: 0;
        top: 0;
        width: 24px;
        height: 24px;
        background-color: rgba(45, 156, 219, 0.1);
        color: #2D9CDB;
        border-radius: 50%;
        text-align: center;
        line-height: 24px;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .list-title {
        font-weight: 700;
        color: #222;
        margin-right: 5px;
    }

    /* Feature Image */
    .feature-image {
        width: 100%;
        border-radius: 12px;
        margin: 30px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        object-fit: cover;
        height: 400px; /* Adjusted height for better aspect ratio */
    }

    /* Sidebar */
    .trust-badges-box {
        text-align: center;
        background: #fff;
        padding: 30px 20px;
        border-radius: 12px;
        border: 1px solid #f0f0f0;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        position: sticky;
        top: 100px;
    }

    .trust-badges-box h5 {
        color: #333;
        margin-bottom: 25px;
    }

    .trust-img {
        max-width: 150px;
        height: auto;
        margin-bottom: 15px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        transition: transform 0.3s ease;
    }

    /* Hover effect for badges */
    .trust-img:hover {
        transform: scale(1.05);
    }
</style>

<div class="full-width-section minivan-hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="hero-title">Minivan Taxi Cab Service</h1>
        <a href="tel:6172306362" class="btn-hero-call">
            <i class="fas fa-phone-alt"></i> Call: 617-230-6362
        </a>
    </div>
</div>

<section class="minivan-content-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 pr-lg-5">

                <p class="lead-text">
                    Whether you're traveling with family, friends, or a small group, <strong>Boston Express Cab</strong> offers a reliable and comfortable Minivan Taxi Service to meet your needs. Our spacious vehicles provide ample room for passengers and luggage, ensuring a pleasant and stress-free journey.
                </p>

                <h2 class="section-heading">Why Choose Our Minivan Taxi Service?</h2>
                <ul class="custom-list mb-5">
                    <li><span class="list-title">Spacious and Comfortable:</span> Our minivans accommodate up to seven passengers with generous legroom and storage space.</li>
                    <li><span class="list-title">Ideal for Groups:</span> Perfect for family outings, corporate groups, airport transfers with extra luggage, and special events.</li>
                    <li><span class="list-title">Professional Drivers:</span> Experienced drivers who know Boston's routes intimately to get you to your destination efficiently.</li>
                    <li><span class="list-title">Child Seat Facility:</span> Safety first. We offer secure, sanitized child seats upon request for families.</li>
                    <li><span class="list-title">24/7 Availability:</span> Whether it's an early morning flight or a late-night return, we are available around the clock.</li>
                    <li><span class="list-title">Easy Booking:</span> Reserve quickly via our online system or phone. Instant confirmation ensures peace of mind.</li>
                </ul>

                <img src="{{ asset('images/cab7.jpeg') }}" alt="Comfortable Minivan Interior" class="feature-image">

                <h2 class="section-heading mt-5">Popular Destinations</h2>
                <ul class="custom-list mb-5">
                    <li><span class="list-title">Logan Airport (BOS):</span> Hassle-free transfers with plenty of room for bags.</li>
                    <li><span class="list-title">Family Adventures:</span> Trips to New England Aquarium, Museum of Science, or Franklin Park Zoo.</li>
                    <li><span class="list-title">Corporate Events:</span> Arrive at conferences or team dinners together.</li>
                    <li><span class="list-title">Wedding & Events:</span> Reliable shuttle service for guests or bridal parties.</li>
                </ul>

                <div class="row mt-5">
                    <div class="col-md-6 mb-4">
                        <h3 class="section-heading" style="font-size: 1.4rem;">Key Amenities</h3>
                        <ul class="custom-list">
                            <li>Plush seating for 7.</li>
                            <li>Huge luggage capacity.</li>
                            <li>Air-conditioned comfort.</li>
                            <li>Child seats (pre-book).</li>
                        </ul>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h3 class="section-heading" style="font-size: 1.4rem;">How to Book</h3>
                        <ul class="custom-list">
                            <li>Visit our <strong>Reservation</strong> page.</li>
                            <li>Select <strong>"Minivan/SUV"</strong>.</li>
                            <li>Enter pickup details.</li>
                            <li>Receive instant confirmation.</li>
                        </ul>
                        <a href="#" class="btn-hero-call" style="padding: 10px 25px; font-size: 1rem;">Book Now</a>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                <div class="trust-badges-box">
                    <h5 class="font-weight-bold" style="color: #333;">Top Rated Service</h5>

                    <img src="{{ asset('images/Google-Rating-1.webp') }}" alt="Google Reviews" class="trust-img">

                    <a href="https://www.tripadvisor.com/Attraction_Review-g60745-d33371741-Reviews-Boston_Logan_Airport_Taxi-Boston_Massachusetts.html" target="_blank">
                        <img src="{{ asset('images/Tripadvisor.webp') }}" alt="Tripadvisor" class="trust-img">
                    </a>

                    <a href="https://trustpilot.com/review/bostonloganairporttaxi.com" target="_blank">
                        <img src="{{ asset('images/Trustpilot.webp') }}" alt="Trustpilot" class="trust-img">
                    </a>

                    <a href="https://biz.yelp.com/r2r/qBKa9HpNhb7tt4h8bCsoqA" target="_blank">
                        <img src="{{ asset('images/Flux_Dev_highresolution_stock_photo_of_Create_an_image_with_th_1.webp') }}" alt="Yelp / LimoTrust" class="trust-img">
                    </a>

                    <p class="text-muted small mt-3">Trusted by thousands of travelers in Boston.</p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
