@extends('frontend.app')

@section('content')
<style>
    /* --- PAGE VARIABLES --- */
    :root {
        --brand-blue: #2D9CDB;
        --brand-dark: #1a2b3c;
        --light-bg: #f8f9fa;
        --receipt-bg: #fffbf0; /* Light yellow/beige for receipt */
        --border-color: #e0e0e0;
    }

    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
    }

    .booking-container {
        padding: 40px 0;
    }

    /* --- PAGE HEADER --- */
    .page-header {
        margin-bottom: 30px;
    }
    .page-title {
        font-weight: 800;
        color: var(--brand-dark);
        font-size: 2rem;
        margin-bottom: 5px;
    }
    .step-indicator {
        color: #777;
        font-size: 0.95rem;
    }

    /* --- COLUMN 1: VEHICLE CARD --- */
    .vehicle-display-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid var(--border-color);
        height: 100%;
    }

    .vehicle-img-box {
        background: radial-gradient(circle, #2c3e50 0%, #1a2b3c 100%); /* Dark background like image */
        padding: 30px 10px;
        text-align: center;
        color: #fff;
    }

    .vehicle-img-box img {
        max-width: 100%;
        height: auto;
        filter: drop-shadow(0 10px 15px rgba(0,0,0,0.3));
        transition: transform 0.3s;
    }
    .vehicle-img-box img:hover {
        transform: scale(1.05);
    }

    .vehicle-name {
        font-weight: 700;
        font-size: 1.1rem;
        margin-top: 15px;
        display: block;
    }

    .capacity-icons {
        display: flex;
        justify-content: center;
        gap: 25px;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    .cap-item {
        text-align: center;
        font-size: 0.85rem;
        color: #ccc;
    }
    .cap-item i {
        font-size: 1.4rem;
        color: #fff;
        display: block;
        margin-bottom: 5px;
    }

    /* Payment Options */
    .payment-options {
        display: flex;
        border-top: 1px solid var(--border-color);
    }

    .pay-option {
        flex: 1;
        padding: 20px 10px;
        text-align: center;
        border-right: 1px solid var(--border-color);
        position: relative;
    }
    .pay-option:last-child { border-right: none; }

    .pay-label {
        font-size: 0.9rem;
        color: #555;
        display: block;
        margin-bottom: 5px;
    }
    .pay-amount {
        font-size: 1.4rem;
        font-weight: 800;
        display: block;
    }
    .pay-cash .pay-amount { color: #e74c3c; } /* Red for Cash */
    .pay-card .pay-amount { color: var(--brand-dark); }

    .discount-badge {
        position: absolute;
        top: -10px;
        left: 10px;
        background: #e74c3c;
        color: #fff;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: bold;
    }

    .pay-note {
        font-size: 0.75rem;
        color: #888;
        margin-top: 5px;
        display: block;
    }

    /* --- COLUMN 2: FARE BREAKDOWN --- */
    .breakdown-card {
        background: #fff;
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid var(--border-color);
        height: 100%;
    }

    .breakdown-title {
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 20px;
        color: var(--brand-dark);
        border-bottom: 2px solid var(--brand-blue);
        padding-bottom: 10px;
        display: inline-block;
    }

    .fare-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 0.95rem;
        color: #555;
    }
    .fare-row.total {
        border-top: 1px solid #eee;
        padding-top: 15px;
        margin-top: 15px;
        font-weight: 800;
        font-size: 1.2rem;
        color: var(--brand-dark);
    }

    .extra-luggage-box {
        background: #fdfdfd;
        border: 1px solid #eee;
        padding: 15px;
        border-radius: 6px;
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* --- COLUMN 3: SUMMARY & RECEIPT --- */
    .btn-book-now {
        width: 100%;
        background-color: var(--brand-blue); /* Logo Color */
        color: white;
        font-weight: 700;
        padding: 15px;
        font-size: 1.1rem;
        border: none;
        border-radius: 6px;
        text-transform: uppercase;
        box-shadow: 0 4px 10px rgba(45, 156, 219, 0.3);
        transition: all 0.3s;
        margin-bottom: 10px;
    }
    .btn-book-now:hover {
        background-color: #1a88c3;
        transform: translateY(-2px);
    }

    .booking-note {
        font-size: 0.8rem;
        text-align: center;
        color: #666;
        margin-bottom: 20px;
    }

    .receipt-card {
        background-color: var(--receipt-bg); /* Beige background */
        border: 1px solid #f0e6ce;
        border-radius: 8px;
        padding: 20px;
    }

    .receipt-title {
        font-weight: 700;
        color: #8a6d3b;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }

    .receipt-row {
        display: flex;
        margin-bottom: 10px;
        font-size: 0.9rem;
        line-height: 1.5;
    }
    .receipt-label {
        width: 35%;
        font-weight: 600;
        color: #555;
    }
    .receipt-value {
        width: 65%;
        color: #333;
    }

    .vehicle-details-section {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eaddc5;
    }

    /* --- BOTTOM: MORE VEHICLES --- */
    .more-vehicles-section {
        margin-top: 60px;
    }
    .more-veh-row {
        background: #fff;
        border: 1px solid #eee;
        padding: 20px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
        transition: box-shadow 0.3s;
    }
    .more-veh-row:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
</style>

<div class="booking-container">
    <div class="container">

        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Reservation</a></li>
                    <li class="breadcrumb-item active">Choose Vehicle</li>
                </ol>
            </nav>
            <h1 class="page-title">Select Vehicle & Confirm Ride Details</h1>
            <span class="step-indicator">Your Current Selection ( Step 2 of 4 )</span>
        </div>

        <div class="row">

            <div class="col-lg-4 mb-4">
                <div class="vehicle-display-card">
                    <div class="vehicle-img-box">
                        <img src="https://placehold.co/400x200/png?text=Toyota+Sienna+Silver" alt="Vehicle">
                        <span class="vehicle-name">4 Passenger Luxury Vehicle 10 Bags Capacity</span>

                        <div class="capacity-icons">
                            <div class="cap-item">
                                <i class="fas fa-user"></i> 4 Pax
                            </div>
                            <div class="cap-item">
                                <i class="fas fa-suitcase"></i> 10 Bags
                            </div>
                            <div class="cap-item">
                                <i class="fas fa-baby"></i> 1 Child Seat
                            </div>
                        </div>
                    </div>

                    <div class="payment-options">
                        <div class="pay-option pay-cash">
                            <div class="discount-badge">%</div>
                            <span class="pay-label">Pay Cash</span>
                            <span class="pay-amount">$1,257.28</span>
                            <span class="pay-note">$1 Reservation Fee</span>
                        </div>
                        <div class="pay-option pay-card">
                            <span class="pay-label">Pay By Card</span>
                            <span class="pay-amount">$1,396.98</span>
                            <span class="pay-note">Pay full online</span>
                        </div>
                    </div>
                    <div class="p-3 bg-light text-center small text-muted border-top">
                        Pay only $1 & confirm your reservation. Balance payable after service by cash or card.
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="breakdown-card">
                    <h4 class="breakdown-title">Booking Details</h4>

                    <div class="fare-row">
                        <span>Distance Covered</span>
                        <span>286.90 Miles</span>
                    </div>
                    <div class="fare-row">
                        <span>Estimated Fare</span>
                        <span>$1,064.15</span>
                    </div>
                    <div class="fare-row">
                        <span>Gratuity (20% fee)</span>
                        <span>$212.83</span>
                    </div>
                    <div class="fare-row">
                        <span>Airport Pickup Toll</span>
                        <span>$15.00</span>
                    </div>
                    <div class="fare-row">
                        <span>Stopover Fee</span>
                        <span>$10.00</span>
                    </div>
                    <div class="fare-row">
                        <span>Pets Fee</span>
                        <span>$10.00</span>
                    </div>
                    <div class="fare-row">
                        <span>Infant Seat Fee</span>
                        <span>$10.00</span>
                    </div>
                    <div class="fare-row">
                        <span>Booster Seat Fee</span>
                        <span>$5.00</span>
                    </div>
                    <div class="fare-row">
                        <span>Front Seat Fee</span>
                        <span>$10.00</span>
                    </div>

                    <div class="fare-row total">
                        <span>Total Payable</span>
                        <span>$1,396.98</span>
                    </div>

                    <div class="extra-luggage-box">
                        <span style="font-weight: 600;">Extra Luggage Fee</span>
                        <div class="text-right">
                            <strong style="display:block; font-size: 1.1rem;">$60.00</strong>
                            <span style="font-size: 0.8rem; color:#888;">($10.00/Bag)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">

                <button class="btn-book-now">Book Now</button>
                <p class="booking-note">Pay only $1 & confirm your reservation. Balance is payable after service.</p>

                <div class="receipt-card">
                    <h5 class="receipt-title">Booking Details</h5>

                    <div class="receipt-row">
                        <span class="receipt-label">Service</span>
                        <span class="receipt-value">: Ride From Airport</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Date</span>
                        <span class="receipt-value">: Thursday, January 22, 2026</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Time</span>
                        <span class="receipt-value">: 2:00 AM</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Pick up</span>
                        <span class="receipt-value">: East Boston, MA 02128, United...</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Drop off</span>
                        <span class="receipt-value">: New Jersey, USA</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Passengers</span>
                        <span class="receipt-value">: 4 (3 Adults + 1 Children)</span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Luggage</span>
                        <span class="receipt-value">: 10</span>
                    </div>

                    <div class="vehicle-details-section">
                        <h6 class="receipt-title" style="font-size: 0.95rem; color: #333;">Vehicle Details</h6>
                        <div class="receipt-row">
                            <span class="receipt-label">Vehicle</span>
                            <span class="receipt-value">: Luxury Vehicle</span>
                        </div>
                        <div class="receipt-row">
                            <span class="receipt-label">Max Pax</span>
                            <span class="receipt-value">: 4</span>
                        </div>
                        <div class="receipt-row">
                            <span class="receipt-label">Max Bags</span>
                            <span class="receipt-value">: 10</span>
                        </div>
                    </div>

                    <div class="fare-row total mt-3 pt-3 border-top border-dark">
                        <span>Total</span>
                        <span style="color: var(--brand-blue);">$1,396.98</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="more-vehicles-section">
            <div class="text-center mb-4">
                <h3 style="font-weight: 700; color: #333;">More Vehicle Option</h3>
                <p class="text-muted">Select another vehicle that suits your needs</p>
            </div>

            <div class="more-veh-row">
                <div class="d-flex align-items-center">
                    <img src="https://placehold.co/120x60?text=Sedan" alt="Sedan" class="mr-4 rounded">
                    <div>
                        <h5 style="font-weight: 700; margin-bottom: 5px;">2 Passenger Luxury Sedan</h5>
                        <div class="text-muted small">
                            <i class="fas fa-suitcase"></i> 10 Bags Capacity &nbsp;|&nbsp; <i class="fas fa-car"></i> Luxury
                        </div>
                        <div class="text-muted small mt-1">
                            Estimated: $1,044.15, Gratuity: $208.83, Extra Luggage: $60.00
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <h4 class="mb-2 text-dark font-weight-bold" style="color: var(--brand-dark);">Total Fare : <span style="color: var(--brand-blue);">$1,372.98</span></h4>
                    <button class="btn btn-outline-primary" style="border-color: var(--brand-blue); color: var(--brand-blue); font-weight: bold;">
                        Book Now <i class="fas fa-check-circle ml-1"></i>
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
