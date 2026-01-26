@extends('frontend.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #111827;       /* Dark Navy/Black */
        --accent: #2563EB;        /* Brand Blue */
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
    .page-hero {
        background: linear-gradient(135deg, var(--primary) 0%, #1F2937 100%);
        color: white;
        padding: 80px 0;
        text-align: center;
        margin-bottom: 50px;
    }
    .hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
    }
    .hero-subtitle {
        font-size: 1.1rem;
        color: #D1D5DB;
        max-width: 700px;
        margin: 0 auto;
    }

    /* --- CONTENT SECTIONS --- */
    .section-block {
        margin-bottom: 60px;
    }
    .section-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }
    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: var(--accent);
        margin-top: 8px;
        border-radius: 2px;
    }

    .text-content {
        font-size: 1.05rem;
        color: var(--text-main);
    }

    /* --- CARDS & FEATURES --- */
    .mission-card {
        background: white;
        padding: 40px;
        border-radius: var(--radius);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        border-left: 5px solid var(--accent);
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }
    .feature-box {
        background: white;
        padding: 30px;
        border-radius: var(--radius);
        border: 1px solid var(--border-light);
        transition: transform 0.2s;
    }
    .feature-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        border-color: var(--accent);
    }
    .feature-icon {
        font-size: 2rem;
        color: var(--accent);
        margin-bottom: 20px;
        display: block;
    }
    .feature-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 10px;
    }

    /* --- CTA SECTION --- */
    .cta-box {
        background: #EFF6FF;
        border: 1px solid #BFDBFE;
        border-radius: var(--radius);
        padding: 40px;
        text-align: center;
        margin-top: 50px;
    }
    .btn-cta {
        display: inline-block;
        background: var(--accent);
        color: white;
        padding: 15px 35px;
        font-weight: 700;
        border-radius: 8px;
        text-decoration: none;
        margin-top: 20px;
        transition: background 0.2s;
        box-shadow: 0 4px 6px rgba(37, 99, 235, 0.3);
    }
    .btn-cta:hover {
        background: var(--accent-hover);
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
        .section-block { padding: 0 15px; }
    }
</style>

<div class="page-hero">
    <div class="container">
        <h1 class="hero-title">About Us</h1>
        <p class="hero-subtitle">Reliable, Safe, and Professional Transportation for the Greater Boston Area.</p>
    </div>
</div>

<div class="container">

    <div class="row justify-content-center section-block">
        <div class="col-lg-10">
            <h2 class="section-title">Who We Are</h2>
            <p class="text-content">
                We at <strong>Boston Express Cab</strong> believe transportation is not just about going from one place to another. It's about trust, convenience, and reliability. Whether you are on your way to a business meeting, the airport, the city, or commuting, we will ensure you experience a smooth, comfortable ride every time.
            </p>
            <p class="text-content mt-3">
                Whether you are travelling alone, for work, with your family, or as a senior, our service is catered to our passengers' individual needs. When you're riding with Boston Express Cab, you will always know what to expect: clean vehicles, safe drivers, and a speedy reach to your destination!
            </p>
        </div>
    </div>

    <div class="row justify-content-center section-block">
        <div class="col-lg-10">
            <div class="mission-card">
                <h3 class="section-title" style="margin-top:0;">Our Mission</h3>
                <p class="text-content mb-0">
                    Our priority is to provide safe, fast, and affordable cab services throughout Boston and surrounding areas. We believe in delivering a high-quality transportation service that is supported by honest pricing, a professional work ethic, and a customer-first attitude. Our mission is straightforward: To bring you peace of mind and comfort on your journey, wherever your destination.
                </p>
            </div>
        </div>
    </div>

    <div class="section-block">
        <h2 class="section-title text-center d-block">Why Choose Boston Express Cab?</h2>
        <p class="text-center text-muted mb-5">We’re not your average ride-share or run-of-the-mill cab firm.</p>

        <div class="feature-grid">

            <div class="feature-box">
                <i class="fas fa-user-tie feature-icon"></i>
                <h4 class="feature-title">Professional Service</h4>
                <p class="small text-muted">
                    We specialize in professional ground transportation that is fully scalable to meet your needs and schedule. Whether local or out of town, we have the scoop on Boston's roads—indispensable for any commuter.
                </p>
            </div>

            <div class="feature-box">
                <i class="fas fa-child feature-icon"></i>
                <h4 class="feature-title">Family-Friendly</h4>
                <p class="small text-muted">
                    Going in a group or with kids? No problem. We provide options such as <strong>child and booster seats</strong> and minivans with room for extra luggage. Drivers are happy to help with bags.
                </p>
            </div>

            <div class="feature-box">
                <i class="fas fa-tag feature-icon"></i>
                <h4 class="feature-title">Transparent Pricing</h4>
                <p class="small text-muted">
                    We offer <strong>flat-rate pricing</strong>, no surge charges, and no mystery fees. You can trust that all our cab rides are safe and honest.
                </p>
            </div>

            <div class="feature-box">
                <i class="fas fa-shield-alt feature-icon"></i>
                <h4 class="feature-title">Clean & Safe Rides</h4>
                <p class="small text-muted">
                    All drivers pass background checks and are customer-care trained. All vehicles are well kept and disinfected after every ride for your safety and health.
                </p>
            </div>

        </div>
    </div>

    <div class="cta-box section-block">
        <h3 class="font-weight-bold text-dark">Serving the Greater Boston Area</h3>
        <p class="mt-3 text-muted">
            Proudly serving all of Boston and adjacent cities, such as Somerville, Quincy, Medford, Malden, Revere, Everett, Chelsea, and others. Whether you're headed to Logan airport, a doctor appointment, or your company party, we are the perfect way to get there.
        </p>

        <h5 class="mt-4 font-italic text-primary">"Ride with Boston Express Cab, where reliability meets peace of mind!"</h5>

        <a href="{{ url('/') }}" class="btn-cta">
            Book Your Ride Now <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>

</div>

@endsection
