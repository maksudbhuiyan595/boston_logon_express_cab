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
        height: 400px;
        background: url('images/Boston Express Cab Background.png') no-repeat center center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Gradient using your Logo Blue (#2D9CDB) */
        background: linear-gradient(135deg, rgba(45, 156, 219, 0.85) 0%, rgba(26, 43, 60, 0.9) 100%);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 0 20px;
    }

    .hero-title {
        color: #ffffff;
        font-weight: 800;
        font-size: 3rem;
        margin-bottom: 10px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .hero-subtitle {
        color: #e0e0e0;
        font-size: 1.2rem;
        font-weight: 400;
        max-width: 700px;
        margin: 0 auto;
    }

    /* --- CONTENT AREA --- */
    .content-wrapper {
        padding: 60px 0;
        background-color: #f8f9fa; /* Light gray background for this section */
    }

    .section-header {
        margin-bottom: 40px;
    }

    .section-title {
        color: #1a2b3c; /* Dark text */
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #2D9CDB; /* Logo Blue */
        margin-top: 10px;
        border-radius: 2px;
    }

    /* --- TERMINAL CARDS --- */
    .terminal-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-top: 4px solid #2D9CDB; /* Logo Blue */
        height: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .terminal-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(45, 156, 219, 0.15);
    }

    .card-icon {
        width: 50px;
        height: 50px;
        background: #f4f9fc; /* Very light blue */
        color: #2D9CDB; /* Logo Blue */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-bottom: 15px;
    }

    .terminal-title {
        font-weight: 700;
        font-size: 1.2rem;
        color: #1a2b3c;
        margin-bottom: 12px;
    }

    .terminal-text {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #666;
    }

    /* Highlight Key Words */
    .highlight {
        color: #2D9CDB;
        font-weight: 700;
    }

    /* --- INFO & CTA CARD --- */
    .cta-card {
        background: linear-gradient(to right, #ffffff, #f8fbff);
        border: 1px solid #e1e8ed;
        border-radius: 15px;
        padding: 40px;
        text-align: center;
        margin-top: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    }

    .cta-image {
        max-width: 100%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin: 25px 0;
        border: 4px solid #fff;
    }

    .btn-call {
        background-color: #2D9CDB;
        color: #fff;
        padding: 14px 40px;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(45, 156, 219, 0.4);
    }

    .btn-call:hover {
        background-color: #1a88c3;
        color: #fff;
        transform: scale(1.05);
        text-decoration: none;
    }

    /* --- SIDEBAR --- */
    .sidebar-box {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        margin-bottom: 30px;
        text-align: center;
        border: 1px solid #f1f1f1;
    }

    .sidebar-title {
        font-weight: 700;
        color: #1a2b3c;
        margin-bottom: 20px;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .trust-img {
        max-width: 140px;
        margin: 0 auto 15px;
        display: block;
        opacity: 0.9;
        transition: opacity 0.3s;
    }

    .trust-img:hover { opacity: 1; }

    .contact-widget {
        background: #2D9CDB;
        color: white;
        border-radius: 8px;
        padding: 20px;
    }

    .contact-widget i { font-size: 2rem; margin-bottom: 10px; }
    .contact-widget a { color: white; font-weight: bold; font-size: 1.2rem; text-decoration: none; }
</style>

<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">Logan Airport Pick Up</h1>
        <p class="hero-subtitle">Step-by-step instructions to find your driver quickly & easily at every terminal.</p>
    </div>
</div>

<section class="content-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <div class="section-header">
                    <h2 class="section-title">Where to Meet Your Driver</h2>
                    <p class="mt-3 text-muted">Navigate Logan Airport like a pro. Find your specific terminal below to see exactly where our limo stand is located.</p>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon"><i class="fas fa-plane-arrival"></i></div>
                            <h4 class="terminal-title">Terminals A & E</h4>
                            <p class="terminal-text">
                                Collect your bags, head outside, and turn <strong>LEFT</strong> after crossing two traffic lanes. Meet at the designated <span class="highlight">Limo Stand</span>.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon"><i class="fas fa-suitcase-rolling"></i></div>
                            <h4 class="terminal-title">Terminal B (Main)</h4>
                            <p class="terminal-text">
                                <em>American, United, Virgin America:</em><br>
                                Go downstairs to the <strong>Ground Floor</strong> parking garage. Walk to the pickup area and find the <span class="highlight">Limo Stand</span>.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon"><i class="fas fa-ticket-alt"></i></div>
                            <h4 class="terminal-title">Terminal B (Others)</h4>
                            <p class="terminal-text">
                                <em>Spirit, Air Canada:</em><br>
                                Same as above. Head to the <strong>Ground Floor</strong> parking garage and look for the designated Limo Stand area.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="terminal-card">
                            <div class="card-icon"><i class="fas fa-level-up-alt"></i></div>
                            <h4 class="terminal-title">Terminal C</h4>
                            <p class="terminal-text">
                                <em>JetBlue, Alaska:</em><br>
                                Take the escalator <strong>UP</strong> after baggage claim. Exit past the drop-off zone to meet at the <span class="highlight">Departure Level Limo Stand</span>.
                            </p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="terminal-card" style="border-top-color: #333;">
                            <div class="card-icon" style="color: #333; background-color: #f1f1f1;"><i class="fas fa-subway"></i></div>
                            <h4 class="terminal-title">Boston South Station</h4>
                            <p class="terminal-text">
                                Exit via <strong>Atlantic Ave</strong>. Walk left towards the taxi stand. Your driver will be waiting there for a seamless transfer.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="cta-card">
                    <h3 style="font-weight: 800; color: #1a2b3c;">Enjoy a Stress-Free Ride</h3>
                    <p class="text-muted">Professional drivers, clean vehicles, and punctual service.</p>

                    <img src="{{ asset("images/cab4.jpeg") }}" alt="Luxury Minivan" class="cta-image">


                </div>

            </div>

            <div class="col-lg-4">

                <div class="sidebar-box">
                    <div class="contact-widget">
                        <i class="fas fa-headset"></i>
                        <h5>Need Help Finding Us?</h5>
                        <p class="small mb-2">Call us immediately:</p>
                        <a href="tel:6172306362">617-230-6362</a>
                    </div>
                </div>

                <div class="sidebar-box">
                    <h5 class="sidebar-title">Top Rated Service</h5>
                    <img src="{{ asset('images/Google-Rating-1.webp') }}" alt="Google" class="trust-img">
                      <a href="https://www.tripadvisor.com/Attraction_Review-g60745-d33371741-Reviews-Boston_Logan_Airport_Taxi-Boston_Massachusetts.html" target="_blank">
                        <img src="{{ asset('images/Tripadvisor.webp') }}" alt="Trustpilot" class="trust-img">
                    </a>
                     <a href="https://trustpilot.com/review/bostonloganairporttaxi.com" target="_blank">
                        <img src="{{ asset('images/Trustpilot.webp') }}" alt="Tripadvisor" class="trust-img">
                    </a>
                    <a href="https://biz.yelp.com/r2r/qBKa9HpNhb7tt4h8bCsoqA" target="_blank">
                        <img src="{{ asset('images/Flux_Dev_highresolution_stock_photo_of_Create_an_image_with_th_1.webp') }}" alt="LimoTrust" class="trust-img">
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
