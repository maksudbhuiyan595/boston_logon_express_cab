@extends('frontend.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #111827;
        --blue-btn: #2563EB;
        --yellow-btn: #F59E0B;
        --green-active: #10B981;
        --bg-body: #F9FAFB;
        --border-color: #E5E7EB;
        --sidebar-bg: #FFFBEB;
    }

    body {
        background-color: var(--bg-body);
        font-family: 'Inter', sans-serif;
        color: var(--primary);
    }

    .booking-section { padding: 30px 0 80px; }

    /* Page Title */
    .page-title { font-size: 1.8rem; font-weight: 800; margin-bottom: 5px; }
    .step-label { color: #6B7280; margin-bottom: 30px; font-size: 0.9rem; }

    /* --- 3 TABS SYSTEM --- */
    .payment-tabs {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        width: 100%;
    }

    .pay-tab {
        flex: 1;
        background: #fff;
        border: 1px solid #D1D5DB;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        position: relative;
        transition: all 0.2s;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 120px;
    }

    /* Tab 1: Active State */
    .pay-tab.active {
        border: 2px solid var(--green-active);
        background: #ECFDF5;
    }

    .tab-check-icon {
        position: absolute;
        top: 8px;
        right: 8px;
        color: var(--green-active);
        font-size: 1.2rem;
        display: none;
    }
    .pay-tab.active .tab-check-icon { display: block; }

    .tab-main-text {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--primary);
        line-height: 1.2;
    }

    .tab-price { font-size: 1.1rem; font-weight: 800; color: var(--primary); margin-bottom: 2px; }
    .tab-sub { font-size: 0.75rem; color: #6B7280; margin-bottom: 8px; font-weight: 600; }

    .tab-btn {
        width: 100%;
        padding: 8px;
        border: none;
        border-radius: 6px;
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        white-space: nowrap;
    }
    .btn-blue { background-color: var(--blue-btn); }
    .btn-yellow { background-color: var(--yellow-btn); color: #000; }

    /* Alert Box */
    .alert-box {
        background: #FEF2F2;
        border: 1px solid #FECACA;
        color: #B91C1C;
        padding: 15px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Form Styles */
    .billing-header { font-size: 1.1rem; font-weight: 700; margin-bottom: 15px; }
    .form-label { font-size: 0.85rem; font-weight: 600; color: #4B5563; margin-bottom: 5px; display: block; }
    .form-control { width: 100%; padding: 10px 12px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 0.95rem; }

    .input-group { position: relative; }
    .autofill-badge {
        position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
        background: #111827; color: #fff; font-size: 0.7rem; padding: 3px 8px; border-radius: 4px;
    }

    .main-submit-btn {
        width: 100%; background-color: var(--blue-btn); color: white; padding: 15px;
        font-size: 1.1rem; font-weight: 700; border: none; border-radius: 8px; margin-top: 20px; cursor: pointer;
    }

    /* Sidebar */
    .sidebar-container { background: var(--sidebar-bg); border: 1px solid #FEF3C7; border-radius: 8px; padding: 20px; }
    .sb-section { margin-bottom: 20px; }
    .sb-title { font-size: 1rem; font-weight: 700; color: #92400E; border-bottom: 1px solid #FCD34D; padding-bottom: 5px; margin-bottom: 10px; }
    .sb-row { display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 6px; color: #78350F; }
    .sb-val { font-weight: 600; color: #451A03; text-align: right; }
    .sb-total { font-size: 1.2rem; font-weight: 800; color: var(--primary); }

    .price-compare { display: flex; gap: 10px; margin-top: 15px; }
    .pc-box { flex: 1; background: #fff; padding: 10px; text-align: center; border: 1px solid #eee; border-radius: 4px; }
    .pc-price { font-weight: 800; font-size: 0.9rem; display: block; }
    .pc-lbl { font-size: 0.65rem; font-weight: 700; color: #666; display: block; margin-top: 2px; }
    .pc-sub { font-size: 0.6rem; color: #999; }
    .red-txt { color: #DC2626; }
    .red-icon { background: #DC2626; color: white; width: 20px; height: 20px; border-radius: 50%; font-size: 0.7rem; display: inline-flex; align-items: center; justify-content: center; margin-right: 5px;}

    /* Mobile Responsive Tweaks */
    @media (max-width: 768px) {
        .payment-tabs { gap: 6px; margin-bottom: 20px; }
        .pay-tab { padding: 10px 4px; min-height: 100px; }
        .tab-main-text { font-size: 0.8rem; }
        .tab-price { font-size: 0.85rem; }
        .tab-sub { font-size: 0.6rem; margin-bottom: 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .tab-btn { font-size: 0.65rem; padding: 5px 2px; }
        .page-title { font-size: 1.5rem; }
    }
</style>

<div class="booking-section">
    <div class="container">
        <h1 class="page-title">Payment Information</h1>
        <div class="step-label">Final Step (4 of 4)</div>

        <div class="row">
            <div class="col-lg-8">

                <div class="payment-tabs">

                    <div class="pay-tab active" id="tab-1" onclick="selectTab(1)">
                        <i class="fas fa-check-circle tab-check-icon"></i>
                        <div class="tab-main-text">1$ for reservation</div>
                    </div>

                    <div class="pay-tab" id="tab-2" onclick="selectTab(2)">
                        <div class="tab-price">$13,379.85</div>
                        <div class="tab-sub">1$ for reservation</div>
                        <button class="tab-btn btn-blue">Pay Cash</button>
                    </div>

                    <div class="pay-tab" id="tab-3" onclick="selectTab(3)">
                        <div class="tab-price">$14,866.50</div>
                        <div class="tab-sub">Pay Full</div>
                        <button class="tab-btn btn-yellow">Pay Full Card</button>
                    </div>

                </div>

                <div class="alert-box" id="dynamic-alert">
                    Pay <span class="text-danger">$1.00</span> Reservation Fee Now. Balance is payable by cash/card.
                </div>

                <div>
                    <h4 class="billing-header">Billing & Card Details</h4>
                    <p class="text-muted small mb-3">Credit or Debit Card</p>

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Card number" style="padding-left: 35px;">
                            <i class="far fa-credit-card" style="position:absolute; left:10px; top:12px; color:#9CA3AF;"></i>
                            <span class="autofill-badge">Autofill link</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label">Card Holder Name</label>
                            <input type="text" class="form-control" value="Jordan Hoffman">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Billing Phone</label>
                            <input type="text" class="form-control" value="+1 (515) 605-1459">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Billing Address</label>
                        <input type="text" class="form-control" value="Dolore eaque sunt qu">
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group"><input type="text" class="form-control" placeholder="City"></div>
                        <div class="col-md-4 form-group"><input type="text" class="form-control" placeholder="State"></div>
                        <div class="col-md-4 form-group"><input type="text" class="form-control" placeholder="Zip Code"></div>
                    </div>

                    <div class="mt-3">
                        <label class="d-flex align-items-center gap-2 mb-2" style="font-size:0.9rem; color:#4B5563;">
                            <input type="checkbox" checked> I agree to Terms & Conditions
                        </label>
                        <label class="d-flex align-items-center gap-2" style="font-size:0.9rem; color:#4B5563;">
                            <input type="checkbox" checked> I allow you to charge my card for the selected amount.
                        </label>
                    </div>

                    <button class="main-submit-btn">Confirm Booking & Pay $1.00</button>
                </div>

            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="sidebar-container">

                    <div class="sb-section">
                        <div class="sb-title">Personal Information</div>
                        <div class="sb-row"><span>Name</span><span class="sb-val">Jordan Hoffman</span></div>
                        <div class="sb-row"><span>Email</span><span class="sb-val text-truncate" style="max-width:140px;">fore@mailinator.com</span></div>
                        <div class="sb-row"><span>Phone</span><span class="sb-val">+880 1 (515) 605-1459</span></div>
                        <div class="sb-row"><span>Airline</span><span class="sb-val">Felix Richmond</span></div>
                        <div class="sb-row"><span>Flight No.</span><span class="sb-val">982</span></div>
                    </div>

                    <div class="sb-section">
                        <div class="sb-title">Booking Details</div>
                        <div class="sb-row"><span>Service</span><span class="sb-val">Ride From Airport</span></div>
                        <div class="sb-row"><span>Date</span><span class="sb-val">2026-01-28</span></div>
                        <div class="sb-row"><span>Time</span><span class="sb-val">02:00</span></div>
                        <div class="sb-row"><span>Pickup</span><span class="sb-val text-truncate" style="max-width:140px;">East Boston, MA</span></div>
                        <div class="sb-row"><span>Dropoff</span><span class="sb-val text-truncate" style="max-width:140px;">New Orleans, LA</span></div>
                        <div class="sb-row"><span>Passengers</span><span class="sb-val">10 (10 Adults)</span></div>
                        <div class="sb-row"><span>Luggage</span><span class="sb-val">11 Bags</span></div>
                    </div>

                    <div class="sb-section">
                        <div class="sb-title">Vehicle Details</div>
                        <div class="sb-row"><span>Vehicle</span><span class="sb-val">Luxury Vehicle</span></div>
                        <div class="sb-row"><span>Max Pax</span><span class="sb-val">10 Persons</span></div>
                        <div class="sb-row"><span>Max Bags</span><span class="sb-val">14 Bags</span></div>
                    </div>

                    <div class="sb-section">
                        <div class="sb-title">Price Breakdown</div>
                        <div class="sb-row"><span>Distance</span><span class="sb-val">1,525.99 Miles</span></div>
                        <div class="sb-row"><span>Base Fare</span><span class="sb-val">$12,367.92</span></div>
                        <div class="sb-row"><span>Gratuity</span><span class="sb-val">$2,473.58</span></div>
                        <div class="sb-row"><span>Pickup Tax</span><span class="sb-val">$15.00</span></div>
                        <div class="sb-row"><span>Extra Luggage</span><span class="sb-val">$10.00</span></div>
                        <hr style="border-top:1px dashed #D97706;">
                        <div class="sb-row mt-2">
                            <span class="font-weight-bold text-dark">Total</span>
                            <span class="sb-total">$14,866.50</span>
                        </div>
                    </div>

                    <div class="price-compare">
                        <div class="pc-box">
                            <div class="red-icon">%</div>
                            <span class="pc-price red-txt">$13,379.85</span>
                            <span class="pc-lbl">PAY CASH</span>
                            <span class="pc-sub">$1 reservation fee</span>
                        </div>
                        <div class="pc-box">
                            <span class="pc-price red-txt">$14,866.50</span>
                            <span class="pc-lbl">PAY CARD</span>
                            <span class="pc-sub">Full Price</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function selectTab(id) {
        // 1. Remove active class from all tabs
        document.querySelectorAll('.pay-tab').forEach(tab => {
            tab.classList.remove('active');
        });

        // 2. Add active class to clicked tab
        document.getElementById('tab-' + id).classList.add('active');

        // 3. Define Elements
        const alertBox = document.getElementById('dynamic-alert');
        const submitBtn = document.querySelector('.main-submit-btn');

        // 4. Update Text based on selection
        if(id === 1) {
            // Reservation Tab
            alertBox.innerHTML = 'Pay <span class="text-danger">$1.00</span> Reservation Fee Now. Balance is payable by cash/card.';
            submitBtn.innerText = "Confirm Booking & Pay $1.00";
        } else if (id === 2) {
            // Pay Cash Tab
            alertBox.innerHTML = 'Pay <span class="text-danger">$1.00</span> Reservation Fee Now. You will pay <strong>$13,379.85</strong> to the driver.';
            submitBtn.innerText = "Book with Cash (Pay $1.00 Now)";
        } else {
            // Pay Full Card Tab
            alertBox.innerHTML = 'Pay <span class="text-danger">$14,866.50</span> Full Amount Now. No future payments required.';
            submitBtn.innerText = "Pay Full Amount Now";
        }
    }
</script>

@endsection
