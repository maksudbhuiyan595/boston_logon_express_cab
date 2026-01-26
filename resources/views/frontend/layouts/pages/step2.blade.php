@extends('frontend.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    /* --- VARIABLES & GLOBAL THEME --- */
    :root {
        --primary: #111827;       /* Dark Black/Blue for Luxury feel */
        --accent: #2563EB;        /* Action Blue */
        --accent-hover: #1D4ED8;
        --green-success: #059669;
        --bg-body: #F3F4F6;
        --bg-white: #FFFFFF;
        --text-main: #1F2937;
        --text-muted: #6B7280;
        --border-light: #E5E7EB;
        --radius: 12px;
        --shadow-card: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    body {
        background-color: var(--bg-body);
        font-family: 'Inter', sans-serif;
        color: var(--text-main);
    }

    .booking-section {
        padding: 50px 0 80px;
    }

    /* --- TITLES --- */
    .page-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 5px;
    }
    .page-subtitle {
        color: var(--text-muted);
        font-size: 0.95rem;
        margin-bottom: 40px;
    }

    /* --- CARDS --- */
    .modern-card {
        background: var(--bg-white);
        border-radius: var(--radius);
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-card);
        overflow: hidden;
        height: 100%;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    /* --- LEFT COL: VEHICLE --- */
    .vehicle-hero {
        background: linear-gradient(180deg, #F9FAFB 0%, #fff 100%);
        padding: 30px;
        text-align: center;
        border-bottom: 1px solid var(--border-light);
    }
    .vehicle-image-main {
        width: 100%;
        max-width: 320px;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 10px 15px rgba(0,0,0,0.15));
        transition: transform 0.3s;
    }
    .vehicle-image-main:hover { transform: scale(1.05); }

    .veh-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-top: 15px;
        color: var(--primary);
    }

    .icon-specs {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 10px;
    }
    .spec-badge {
        font-size: 0.8rem;
        color: var(--text-muted);
        background: #F3F4F6;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 600;
    }
    .spec-badge i { color: var(--accent); margin-right: 4px; }

    /* --- PAYMENT SELECTOR --- */
    .payment-options {
        padding: 20px;
    }
    .pay-toggle-row {
        display: flex;
        gap: 15px;
    }
    .pay-card {
        flex: 1;
        border: 2px solid var(--border-light);
        border-radius: 10px;
        padding: 15px 10px;
        text-align: center;
        cursor: pointer;
        position: relative;
        transition: all 0.2s;
    }
    .pay-card.active {
        border-color: var(--accent);
        background: #EFF6FF;
    }
    .pay-card.active::after {
        content: "\f00c";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        top: -10px;
        right: -10px;
        background: var(--accent);
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .pay-label { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); font-weight: 700; display: block; margin-bottom: 5px; }
    .pay-price { font-size: 1.1rem; font-weight: 800; color: var(--primary); display: block; }

    .discount-badge {
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: #DC2626;
        color: white;
        font-size: 0.65rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 4px;
    }
    .pay-card.active .pay-price { color: var(--accent); }
    .pay-card:hover { border-color: #93C5FD; }

    /* --- MIDDLE COL: BREAKDOWN --- */
    .breakdown-list { padding: 25px; }
    .line-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 0.9rem;
        color: var(--text-muted);
    }
    .line-row strong { color: var(--text-main); font-weight: 600; }

    .luggage-box {
        background: #FFFBEB;
        border: 1px dashed #FCD34D;
        padding: 12px;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 15px 0;
    }

    .total-separator {
        border-top: 2px solid var(--border-light);
        margin-top: 15px;
        padding-top: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .total-title { font-size: 1.1rem; font-weight: 800; color: var(--primary); }
    .total-val { font-size: 1.4rem; font-weight: 800; color: var(--accent); }

    /* --- RIGHT COL: SUMMARY & ACTION --- */
    .btn-book-now {
        display: block;
        width: 100%;
        text-align: center;
        text-decoration: none;
        background-color: var(--green-success);
        color: white;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 16px;
        border: none;
        border-radius: var(--radius);
        box-shadow: 0 4px 10px rgba(5, 150, 105, 0.3);
        cursor: pointer;
        transition: all 0.2s;
        margin-bottom: 20px;
    }
    .btn-book-now:hover {
        background-color: #047857;
        color: white;
        transform: translateY(-2px);
    }

    .summary-receipt {
        background: #fff;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        padding: 20px;
    }
    .receipt-header {
        font-size: 0.85rem;
        font-weight: 700;
        color: #9CA3AF;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
        border-bottom: 1px solid var(--border-light);
        padding-bottom: 10px;
    }
    .summ-row {
        display: flex;
        margin-bottom: 10px;
        font-size: 0.9rem;
    }
    .summ-label { width: 35%; color: var(--text-muted); font-weight: 500; }
    .summ-val { width: 65%; color: var(--text-main); font-weight: 600; text-align: right; }

    /* --- BOTTOM: MORE OPTIONS --- */
    .more-options-header {
        text-align: center;
        margin: 60px 0 30px;
        position: relative;
    }
    .more-options-header h3 {
        background: var(--bg-body);
        display: inline-block;
        padding: 0 20px;
        position: relative;
        z-index: 1;
        color: var(--text-muted);
        font-weight: 700;
    }
    .more-options-header::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 1px;
        background: var(--border-light);
        z-index: 0;
    }

    .option-row {
        background: white;
        border: 1px solid var(--border-light);
        border-radius: var(--radius);
        padding: 20px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        transition: all 0.2s;
    }
    .option-row:hover {
        border-color: var(--accent);
        box-shadow: var(--shadow-hover);
    }
    .opt-img-wrap {
        width: 150px;
        margin-right: 25px;
    }
    .opt-img {
        width: 100%;
        height: auto;
        border-radius: 6px;
    }
    .opt-details { flex: 1; }
    .opt-title { font-size: 1.1rem; font-weight: 700; margin-bottom: 5px; color: var(--primary); }
    .opt-meta { font-size: 0.85rem; color: var(--text-muted); }

    .opt-price-action {
        text-align: right;
        min-width: 150px;
    }
    .opt-price {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--green-success);
        margin-bottom: 8px;
        display: block;
    }
    .btn-select-sm {
        background: white;
        border: 2px solid var(--accent);
        color: var(--accent);
        font-weight: 700;
        padding: 8px 20px;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: all 0.2s;
    }
    .btn-select-sm:hover {
        background: var(--accent);
        color: white;
    }

    @media (max-width: 768px) {
        .option-row { flex-direction: column; text-align: center; }
        .opt-img-wrap { margin: 0 auto 15px; }
        .opt-price-action { text-align: center; margin-top: 15px; }
        .summ-val { text-align: left; }
    }
</style>

<div class="booking-section">
    <div class="container">

        <div class="text-center">
            <h1 class="page-title">Select Vehicle & Confirm</h1>
            <p class="page-subtitle">Step 2 of 4: Review your ride details</p>
        </div>

        <div class="row">

            <div class="col-lg-4 mb-4">
                <div class="modern-card">
                    <div class="vehicle-hero">
                        <img src="https://placehold.co/400x200/png?text=Luxury+Van" alt="Vehicle" class="vehicle-image-main">
                        <div class="veh-title">15 Passenger Luxury Van</div>
                        <div class="icon-specs">
                            <span class="spec-badge"><i class="fas fa-users"></i> 15 Pax</span>
                            <span class="spec-badge"><i class="fas fa-suitcase"></i> 14 Bags</span>
                        </div>
                    </div>

                    <div class="payment-options">
                        <div class="pay-toggle-row">
                            <div class="pay-card active">
                                <div class="discount-badge">SAVE 10%</div>
                                <span class="pay-label">Pay Cash</span>
                                <span class="pay-price" style="color:#DC2626;">$13,379.05</span>
                                <small class="text-muted d-block mt-1">$1.00 Reservation</small>
                            </div>

                            <div class="pay-card">
                                <span class="pay-label">Pay by Card</span>
                                <span class="pay-price">$14,866.50</span>
                                <small class="text-muted d-block mt-1">Full Payment</small>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted"><i class="fas fa-info-circle"></i> Balance payable to driver after service.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="modern-card">
                    <div class="breakdown-list">
                        <h5 class="font-weight-bold mb-4">Booking Details</h5>

                        <div class="line-row">
                            <span>Distance</span>
                            <strong>1,026.00 Miles</strong>
                        </div>
                        <div class="line-row">
                            <span>Base Fare</span>
                            <strong>$12,387.02</strong>
                        </div>
                        <div class="line-row">
                            <span>Gratuity (20%)</span>
                            <strong>$2,473.45</strong>
                        </div>
                        <div class="line-row">
                            <span>Airport Pickup</span>
                            <strong>$15.00</strong>
                        </div>

                        <div class="luggage-box">
                            <div>
                                <strong class="d-block text-dark">Extra Luggage Fee</strong>
                                <small class="text-muted">Over limit charge</small>
                            </div>
                            <strong class="text-dark">$10.00</strong>
                        </div>

                        <div class="total-separator">
                            <span class="total-title">Total Payable</span>
                            <span class="total-val">$14,885.05</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">

                <a href="{{ route('step3') }}" class="btn-book-now">
                    Book Now <i class="fas fa-check-circle ml-2"></i>
                </a>

                <div class="summary-receipt">
                    <div class="receipt-header">Booking Summary</div>

                    <div class="summ-row">
                        <span class="summ-label">Service:</span>
                        <span class="summ-val">Ride From Airport</span>
                    </div>
                    <div class="summ-row">
                        <span class="summ-label">Date:</span>
                        <span class="summ-val">Wed, Jan 28, 2026</span>
                    </div>
                    <div class="summ-row">
                        <span class="summ-label">Time:</span>
                        <span class="summ-val">02:00 AM</span>
                    </div>
                    <div class="summ-row">
                        <span class="summ-label">Pick Up:</span>
                        <span class="summ-val text-truncate">East Boston, MA 02128</span>
                    </div>
                    <div class="summ-row">
                        <span class="summ-label">Drop Off:</span>
                        <span class="summ-val text-truncate">New Orleans, LA, USA</span>
                    </div>
                    <div class="summ-row mt-3 pt-2 border-top">
                        <span class="summ-label">Vehicle:</span>
                        <span class="summ-val">Luxury Vehicle</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="more-options-header">
            <h3>More Vehicle Options</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="option-row">
                    <div class="opt-img-wrap">
                        <img src="https://placehold.co/150x80?text=Sedan" class="opt-img" alt="Sedan">
                    </div>
                    <div class="opt-details">
                        <div class="opt-title">2 Passenger Luxury Sedan</div>
                        <div class="opt-meta">
                            <span class="mr-3"><i class="fas fa-suitcase"></i> 10 Bags</span>
                            <span class="mr-3"><i class="fas fa-star"></i> Luxury Class</span>
                        </div>
                        <div class="text-muted small mt-1">Estimated Base Fare + 20% Gratuity</div>
                    </div>
                    <div class="opt-price-action">
                        <span class="opt-price">$6,482.16</span>
                        <button class="btn-select-sm">Book This</button>
                    </div>
                </div>

                <div class="option-row">
                    <div class="opt-img-wrap">
                        <img src="https://placehold.co/150x80?text=SUV" class="opt-img" alt="SUV">
                    </div>
                    <div class="opt-details">
                        <div class="opt-title">4 Passenger Luxury SUV</div>
                        <div class="opt-meta">
                            <span class="mr-3"><i class="fas fa-suitcase"></i> 10 Bags</span>
                            <span class="mr-3"><i class="fas fa-star"></i> Luxury Class</span>
                        </div>
                        <div class="text-muted small mt-1">Estimated Base Fare + 20% Gratuity</div>
                    </div>
                    <div class="opt-price-action">
                        <span class="opt-price">$6,506.18</span>
                        <button class="btn-select-sm">Book This</button>
                    </div>
                </div>

                <div class="option-row">
                    <div class="opt-img-wrap">
                        <img src="https://placehold.co/150x80?text=Van" class="opt-img" alt="Van">
                    </div>
                    <div class="opt-details">
                        <div class="opt-title">7 Passenger Luxury Van</div>
                        <div class="opt-meta">
                            <span class="mr-3"><i class="fas fa-suitcase"></i> 8 Bags</span>
                            <span class="mr-3"><i class="fas fa-star"></i> Business Class</span>
                        </div>
                        <div class="text-muted small mt-1">Estimated Base Fare + 20% Gratuity</div>
                    </div>
                    <div class="opt-price-action">
                        <span class="opt-price">$7,469.75</span>
                        <button class="btn-select-sm">Book This</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
