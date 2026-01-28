@extends('frontend.app')
@section('title', "Term Conditions")

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
        padding: 60px 0;
        text-align: center;
        margin-bottom: 50px;
    }
    .hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 10px;
    }
    .hero-subtitle {
        font-size: 1.1rem;
        color: #D1D5DB;
        max-width: 800px;
        margin: 0 auto;
    }

    /* --- CONTENT LAYOUT --- */
    .policy-container {
        max-width: 900px;
        margin: 0 auto;
        padding-bottom: 80px;
    }

    .policy-card {
        background: var(--bg-white);
        padding: 40px;
        border-radius: var(--radius);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-light);
        margin-bottom: 30px;
    }

    .section-header {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #F3F4F6;
        display: flex;
        align-items: center;
    }
    .section-header i {
        color: var(--accent);
        margin-right: 12px;
        font-size: 1.1rem;
    }

    /* --- LIST STYLES --- */
    .custom-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .custom-list li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
        font-size: 1rem;
        color: var(--text-main);
    }
    .custom-list li::before {
        content: "\f058"; /* FontAwesome check-circle */
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: var(--accent);
        position: absolute;
        left: 0;
        top: 3px;
        font-size: 0.9rem;
    }

    .list-warning li::before {
        content: "\f071"; /* Exclamation triangle */
        color: #D97706; /* Amber */
    }

    /* --- HIGHLIGHT BOXES --- */
    .info-box {
        background: #EFF6FF;
        border-left: 4px solid var(--accent);
        padding: 20px;
        border-radius: 6px;
        margin: 20px 0;
    }

    .warning-box {
        background: #FFFBEB;
        border-left: 4px solid #D97706;
        padding: 20px;
        border-radius: 6px;
        margin: 20px 0;
    }

    .alert-box {
        background: #FEF2F2;
        border-left: 4px solid #EF4444;
        padding: 20px;
        border-radius: 6px;
        margin: 20px 0;
    }

    /* --- CONTACT INFO --- */
    .contact-info a {
        color: var(--accent);
        text-decoration: none;
        font-weight: 600;
    }
    .contact-info a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .policy-card { padding: 25px; }
        .hero-title { font-size: 2rem; }
    }
</style>

<div class="page-hero">
    <div class="container">
        <h1 class="hero-title">Terms & Conditions</h1>
        <p class="hero-subtitle">Please read these rules to ensure a safe, fair, and comfortable ride.</p>
    </div>
</div>

<div class="container">
    <div class="policy-container">

        <div class="policy-card">
            <p class="mb-0 text-muted">
                By making a reservation or riding with <strong>Boston Express Cab</strong>, you accept these terms. They are rules that help us keep your ride safe, fair, and comfortable. Before you make your travel plan, we recommend you read them.
            </p>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-map-marked-alt"></i> Service Overview & Booking</h2>

            <h5 class="font-weight-bold">Where We Serve</h5>
            <p>We provide transportation services to and from <strong>Logan International Airport</strong>, Cape Cod, Boston, nearby towns, and parts of Southern New Hampshire. rides that begin or end outside that zone may incur an additional fee.</p>

            <h5 class="font-weight-bold mt-4">Booking & Confirmation</h5>
            <p>You can book by:</p>
            <ul class="custom-list">
                <li>Website</li>
                <li>Phone</li>
            </ul>
            <div class="info-box">
                <strong>Note:</strong> Your ride is not booked until you receive a confirmation email or text. If the information is incorrect, unsafe, or against our policy, we have the right to cancel the booking.
            </div>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-money-bill-wave"></i> Payment & Fares</h2>
            <p>We provide hard pricing based on time, distance, and extra requirements.</p>

            <h5 class="font-weight-bold">We Accept:</h5>
            <ul class="custom-list">
                <li><strong>Cash:</strong> Pay cash and get <strong>10% off</strong>.</li>
                <li>Visa, MasterCard, AmEx, and Discover cards.</li>
                <li>PayPal (for online prepayment).</li>
                <li>Apple Pay / Google Pay (if the driver accepts it).</li>
            </ul>

            <p class="mt-3"><strong>A deposit of $1 is required at booking.</strong> The rest is paid after your trip.</p>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-hands-wash"></i> Clean Vehicles & Passenger Rules</h2>
            <p>Our cars are disinfected after each ride.</p>

            <div class="warning-box">
                <h5 class="font-weight-bold" style="color: #92400E;">Passengers Must:</h5>
                <ul class="custom-list list-warning">
                    <li>Not smoke or use drugs.</li>
                    <li>Stay respectful and calm.</li>
                    <li>Pay for any extra cleaning or damage as a result.</li>
                </ul>
                <p class="mb-0 mt-2 small">If these rules are violated, drivers have the right to discontinue the ride.</p>
            </div>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-calendar-times"></i> Cancellations & Changes</h2>

            <h5 class="font-weight-bold">Cancellation & Refunds</h5>
            <ul class="custom-list">
                <li>Cancel up to <strong>4 hours before</strong> your trip and get a full refund.</li>
                <li>Cancel within 4 hours or miss the ride = <strong>no refund</strong>.</li>
            </ul>
            <p class="small text-muted">Refunds are returned to the original payment method in 3-5 business days.</p>

            <h5 class="font-weight-bold mt-4">Changes to Booking</h5>
            <p>You can modify your pickup time or location up to 4 hours before your ride. Come at the last minute, and last minute changes are probably not going to be doable, and would likely cost extra.</p>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-clock"></i> Wait Time & Extra Charges</h2>

            <div class="alert-box" style="border-left-color: #D97706; background: #FFFBEB; color: #78350F;">
                <ul class="custom-list list-warning">
                    <li>You have <strong>10 free minutes</strong> to meet your driver.</li>
                    <li>After that, we charge <strong>$2 per minute</strong> for waiting time.</li>
                </ul>
            </div>

            <h5 class="font-weight-bold">Other Possible Charges:</h5>
            <ul class="custom-list">
                <li>Tolls or parking fees.</li>
                <li>Late night or holiday trips.</li>
                <li>Child seat or minivan request.</li>
                <li>Extra bags or heavy luggage.</li>
            </ul>
            <p class="small text-muted mt-2">These are fees paid straight to the driver, preferably in cash.</p>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-exclamation-circle"></i> Delays & Responsibility</h2>
            <p>We are not responsible for delays due to:</p>
            <ul class="custom-list" style="columns: 2;">
                <li>Traffic</li>
                <li>Bad Weather</li>
                <li>Flight Issues</li>
                <li>Vehicle Breakdown</li>
            </ul>
            <p class="mt-3">We only take responsibility for serious service issues caused by <strong>our own mistakes</strong>.</p>

            <hr class="my-4">

            <h5 class="font-weight-bold">Updates to These Terms</h5>
            <p class="small text-muted">We may update these terms. The latest version will be posted here. Using our service means you agree to the recent terms and conditions of Boston Express Cab.</p>
        </div>

        <div class="policy-card text-center contact-info">
            <h2 class="section-header justify-content-center border-0 mb-2">Need Help?</h2>

            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <div class="p-3 bg-light rounded">
                        <i class="fas fa-phone-alt fa-lg mb-2 text-primary"></i>
                        <br>
                        <a href="tel:+16172306362">+1 (617) 230-6362</a>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-3 bg-light rounded">
                        <i class="fas fa-envelope fa-lg mb-2 text-primary"></i>
                        <br>
                        <a href="mailto:info@bostonexpresscab.com">info@bostonexpresscab.com</a>
                    </div>
                </div>
            </div>
            <p class="small text-muted mt-3">You accept these Terms & Conditions when you book through Boston Express Cab.</p>
        </div>

    </div>
</div>

@endsection
