@extends('frontend.app')
@section('title', "Pickup Location")

@section('content')

<style>
    /* --- HERO SECTION --- */
    .hero-section {
        position: relative;
        width: 100vw;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;

        /* উচ্চতা ৪শ পিক্সেল ফিক্সড */
        height: 400px;
        margin-top: 0px;
        top: 0;

        background: url('{{ asset('images/airportcab.jpeg') }}') no-repeat center center/cover;
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
        background: rgba(0, 0, 0, 0.4); /* ইমেজটির ওপর হালকা অন্ধকার আস্তরণ */
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
        font-size: 3.5rem;
        margin-bottom: 10px;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
    }

    .hero-subtitle {
        color: #e0e0e0;
        font-size: 1.3rem;
        max-width: 750px;
        margin: 0 auto;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    }

    /* --- BOOKING WRAPPER --- */
    .booking-wrapper {
        background-color: #fff;
        margin-top: 0;
    }

    .booking-wrapper .hero-section {
        background: transparent !important;
        background-image: none !important;
        height: auto !important;
        width: 100% !important;
        left: 0 !important;
        margin: 0 !important;
        display: block !important;
    }

    /* --- CONTENT AREA --- */
    .content-wrapper {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .section-title {
        color: #1a2b3c;
        font-weight: 700;
        font-size: 2rem;
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
    }

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
    }

    /* --- MOBILE RESPONSIVE --- */
    @media (max-width: 991px) {
        .hero-section {
            height: 350px; /* ট্যাবলেটের জন্য উচ্চতা সামান্য কমানো হয়েছে */
        }
        .hero-title {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 767px) {
        .hero-section {
            height: 300px; /* মোবাইলের জন্য উচ্চতা ৩০০ পিক্সেল */
        }
        .hero-title {
            font-size: 2rem;
            padding: 0 10px;
        }
        .hero-subtitle {
            font-size: 1rem;
            padding: 0 15px;
        }
        .content-wrapper {
            padding: 40px 0;
        }
        .section-title {
            font-size: 1.6rem;
        }
    }
</style>

<div class="hero-section">
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
                <div class="section-header mb-4">
                    <h2 class="section-title">Where to Meet Your Driver</h2>
                    <p class="mt-3 text-muted">Navigate Logan Airport like a pro. Find your specific terminal below to see exactly where our limo stand is located.</p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon" style="color:#2D9CDB; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-plane-arrival"></i></div>
                            <h4 style="font-weight:700;">Terminals A & E</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                Collect your bags, head outside, and turn <strong>LEFT</strong> after crossing two traffic lanes. Meet at the designated <span class="highlight">Limo Stand</span>.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon" style="color:#2D9CDB; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-suitcase-rolling"></i></div>
                            <h4 style="font-weight:700;">Terminal B (Main)</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                American, United, Virgin America: Go downstairs to the Ground Floor parking garage. Walk to the pickup area and find the Limo Stand.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon" style="color:#2D9CDB; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-ticket-alt"></i></div>
                            <h4 style="font-weight:700;">Terminal B (Others)</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                Spirit, Air Canada: Same as above. Head to the Ground Floor parking garage and look for the designated Limo Stand area.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon" style="color:#2D9CDB; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-level-up-alt"></i></div>
                            <h4 style="font-weight:700;">Terminal C</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                JetBlue, Alaska: Take the escalator UP after baggage claim. Exit past the drop-off zone to meet at the Departure Level Limo Stand.
                            </p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="terminal-card" style="border-top-color: #333;">
                            <div class="card-icon" style="color:#333; font-size: 1.5rem; margin-bottom:15px;"><i class="fas fa-subway"></i></div>
                            <h4 style="font-weight:700;">Boston South Station</h4>
                            <p style="color:#666; font-size:0.95rem;">
                                Exit via Atlantic Ave. Walk left towards the taxi stand. Your driver will be waiting there for a seamless transfer.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="cta-card" style="background:#fff; border-radius:15px; padding:40px; text-align:center; margin-top:20px; border: 1px solid #eee;">
                    <h3 style="font-weight: 800; color: #1a2b3c;">Enjoy a Stress-Free Ride</h3>
                    <p class="text-muted">Professional drivers, clean vehicles, and punctual service.</p>
                    <img src="{{ asset("images/cab4.jpeg") }}" alt="Vehicle" style="max-width:100%; border-radius:10px; margin-top:20px;">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-box">
                    <div class="contact-widget">
                        <i class="fas fa-headset" style="font-size:2rem; margin-bottom:10px;"></i>
                        <h5>Need Help Finding Us?</h5>
                        <a href="tel:6172306362" style="color:white; font-weight:bold; font-size:1.2rem; text-decoration:none;">617-230-6362</a>
                    </div>
                </div>

                <div class="sidebar-box">
                    <h5 style="font-weight:700; color:#1a2b3c; margin-bottom:20px; text-transform:uppercase; font-size:0.9rem;">Trusted By Travelers</h5>
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
