@extends('frontend.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    /* --- THEME VARIABLES (Same as Step 2) --- */
    :root {
        --primary: #111827;
        --accent: #2563EB;
        --green-success: #059669;
        --bg-body: #F3F4F6;
        --bg-white: #FFFFFF;
        --text-main: #1F2937;
        --text-muted: #6B7280;
        --border-light: #E5E7EB;
        --radius: 12px;
        --shadow-card: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    body {
        background-color: var(--bg-body);
        font-family: 'Inter', sans-serif;
        color: var(--text-main);
    }

    .booking-section {
        padding: 50px 0 80px;
    }

    /* --- PAGE HEADER --- */
    .page-header { text-align: center; margin-bottom: 40px; }
    .page-title { font-size: 1.75rem; font-weight: 800; color: var(--primary); margin-bottom: 5px; }
    .step-indicator { font-size: 0.9rem; color: var(--accent); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }

    /* --- CARDS --- */
    .modern-card {
        background: var(--bg-white);
        border-radius: var(--radius);
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-card);
        padding: 30px;
        height: 100%;
    }

    /* --- FORM STYLES --- */
    .form-group { margin-bottom: 20px; }

    .form-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 8px;
        display: block;
    }
    .form-label span.required { color: #DC2626; }

    .form-control-custom {
        width: 100%;
        padding: 12px 15px;
        font-size: 0.95rem;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        transition: all 0.2s;
        color: var(--primary);
        background-color: #FAFAFA;
    }
    .form-control-custom:focus {
        border-color: var(--accent);
        background-color: #fff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    /* Toggle Switch for "Are you the traveler?" */
    .traveler-toggle {
        display: flex;
        background: #F3F4F6;
        padding: 4px;
        border-radius: 8px;
        margin-bottom: 25px;
        width: fit-content;
    }
    .toggle-opt {
        padding: 8px 20px;
        font-size: 0.9rem;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        color: var(--text-muted);
        transition: all 0.2s;
    }
    .toggle-opt.active {
        background: white;
        color: var(--accent);
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    /* Section Headers in Form */
    .form-section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px dashed var(--border-light);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* --- SIDEBAR SUMMARY --- */
    .summary-box {
        background: #FFFBEB; /* Slight yellow tint for "receipt" feel */
        border: 1px solid #FEF3C7;
        border-radius: var(--radius);
        overflow: hidden;
    }
    .summary-header {
        background: #FDE68A;
        padding: 15px 20px;
        font-weight: 700;
        color: #92400E;
        font-size: 1rem;
    }

    .summary-content { padding: 20px; }

    .summ-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 0.9rem;
    }
    .summ-label { color: #78350F; font-weight: 500; }
    .summ-val { color: #451A03; font-weight: 700; text-align: right; max-width: 60%; }

    .price-block {
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 8px;
        padding: 15px;
        margin-top: 20px;
    }
    .price-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 0.85rem;
        color: #78350F;
    }
    .total-row {
        border-top: 1px dashed #D97706;
        margin-top: 10px;
        padding-top: 10px;
        display: flex;
        justify-content: space-between;
        font-size: 1.2rem;
        font-weight: 800;
        color: #B45309;
    }

    /* Payment Mode Display (Bottom Right) */
    .pay-mode-display {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    .pay-mode-card {
        flex: 1;
        border: 1px solid #E5E7EB;
        background: white;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        opacity: 0.6;
    }
    .pay-mode-card.selected {
        border-color: #DC2626; /* Red accent from screenshot */
        background: #FEF2F2;
        opacity: 1;
        position: relative;
    }
    .pay-mode-card.selected::before {
        content: "\f00c";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        top: -8px;
        right: -8px;
        background: #DC2626;
        color: white;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        font-size: 0.6rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-next {
        width: 100%;
        background-color: var(--green-success);
        color: white;
        font-size: 1.1rem;
        font-weight: 700;
        padding: 15px;
        border: none;
        border-radius: 8px;
        margin-top: 30px;
        cursor: pointer;
        transition: transform 0.2s;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
    }
    .btn-next:hover { transform: translateY(-2px); background-color: #047857; }

    /* Responsive */
    @media (max-width: 992px) {
        .col-lg-4 { margin-top: 40px; }
    }
</style>

<div class="booking-section">
    <div class="container">

        <div class="page-header">
            <div class="step-indicator">Step 3 of 4</div>
            <h1 class="page-title">Passenger Information</h1>
        </div>

        <div class="row">

            <div class="col-lg-8">
                <div class="modern-card">

                    <div class="d-flex align-items-center mb-3">
                        <span class="mr-3 font-weight-bold text-dark">Are you also the traveler?</span>
                        <div class="traveler-toggle">
                            <div class="toggle-opt active">Yes</div>
                            <div class="toggle-opt">No</div>
                        </div>
                    </div>

                    <div class="form-section-title"><i class="fas fa-user-circle"></i> Personal Details</div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label">Full Name <span class="required">*</span></label>
                            <input type="text" class="form-control-custom" placeholder="e.g. John Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Email Address <span class="required">*</span></label>
                            <input type="email" class="form-control-custom" placeholder="name@example.com">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label">Mobile Number <span class="required">*</span></label>
                            <div class="d-flex">
                                <select class="form-control-custom" style="width: 80px; border-top-right-radius: 0; border-bottom-right-radius: 0; border-right: 0; background: #eee;">
                                    <option>+1</option>
                                    <option>+44</option>
                                </select>
                                <input type="tel" class="form-control-custom" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" placeholder="(555) 000-0000">
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Alternate Number</label>
                            <input type="tel" class="form-control-custom" placeholder="Optional">
                        </div>
                    </div>

                    <div class="form-section-title mt-4"><i class="fas fa-plane"></i> Flight Details</div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label">Airline Name <span class="required">*</span></label>
                            <input type="text" class="form-control-custom" placeholder="e.g. Delta Airlines">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Flight Number <span class="required">*</span></label>
                            <input type="text" class="form-control-custom" placeholder="e.g. DL123">
                        </div>
                    </div>

                    <div class="form-section-title mt-4"><i class="fas fa-comment-alt"></i> Preferences</div>
                    <div class="form-group">
                        <label class="form-label">Mailing Address</label>
                        <textarea class="form-control-custom" rows="2" placeholder="Enter full address"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Special Needs / Notes</label>
                        <textarea class="form-control-custom" rows="3" placeholder="Child seat request, extra stops, etc."></textarea>
                    </div>

                  <a href="{{ route('step4') }}" class="btn-next" style="display: block; text-align: center; text-decoration: none;">
                        Continue to Payment <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <p class="text-center mt-3 small text-muted">
                        <i class="fas fa-lock"></i> Pay only $1.00 now to confirm your reservation.
                    </p>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="summary-box">
                    <div class="summary-header">
                        <i class="fas fa-receipt mr-2"></i> Booking Summary
                    </div>
                    <div class="summary-content">

                        <div class="summ-row">
                            <span class="summ-label">Service</span>
                            <span class="summ-val">Airport Transfer</span>
                        </div>
                        <div class="summ-row">
                            <span class="summ-label">Date & Time</span>
                            <span class="summ-val">Jan 28, 2026<br>02:00 AM</span>
                        </div>
                        <div class="summ-row">
                            <span class="summ-label">Pickup</span>
                            <span class="summ-val text-truncate">East Boston, MA</span>
                        </div>
                        <div class="summ-row">
                            <span class="summ-label">Dropoff</span>
                            <span class="summ-val text-truncate">New Orleans, LA</span>
                        </div>
                        <hr style="border-top: 1px dashed #FEF3C7;">

                        <div class="d-flex align-items-center mb-3">
                            <img src="https://placehold.co/80x40/png?text=Van" style="border-radius:4px; margin-right:10px;">
                            <div>
                                <div style="font-weight:700; color:#451A03; font-size:0.9rem;">Luxury Van</div>
                                <div style="font-size:0.75rem; color:#92400E;">10 Pax • 11 Bags</div>
                            </div>
                        </div>

                        <div class="price-block">
                            <div class="price-row">
                                <span>Base Fare</span>
                                <span>$12,367.92</span>
                            </div>
                            <div class="price-row">
                                <span>Gratuity (20%)</span>
                                <span>$2,473.58</span>
                            </div>
                            <div class="price-row">
                                <span>Taxes & Fees</span>
                                <span>$25.00</span>
                            </div>
                            <div class="total-row">
                                <span>Total Value</span>
                                <span>$14,866.50</span>
                            </div>
                        </div>

                        <div class="pay-mode-display">
                            <div class="pay-mode-card selected">
                                <div style="font-size:0.65rem; color:#DC2626; font-weight:700; text-transform:uppercase;">Pay Cash</div>
                                <div style="font-size:0.9rem; font-weight:800; color:#1F2937;">$13,379</div>
                                <div style="font-size:0.6rem; color:#6B7280;">$1 Reserve</div>
                            </div>
                            <div class="pay-mode-card">
                                <div style="font-size:0.65rem; color:#6B7280; font-weight:700; text-transform:uppercase;">Pay Card</div>
                                <div style="font-size:0.9rem; font-weight:800; color:#1F2937;">$14,866</div>
                                <div style="font-size:0.6rem; color:#6B7280;">Full Prepay</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
