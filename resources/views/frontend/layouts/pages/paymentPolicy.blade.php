@extends('frontend.app')
@section('title', "Payment Policy")
@section('meta_description')

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
        font-size: 1.5rem;
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
        font-size: 1.2rem;
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
        content: "\f00c"; /* FontAwesome check */
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: var(--accent);
        position: absolute;
        left: 0;
        top: 2px;
        font-size: 0.9rem;
    }

    /* --- HIGHLIGHT BOXES --- */
    .highlight-box {
        background: #EFF6FF;
        border-left: 4px solid var(--accent);
        padding: 20px;
        border-radius: 6px;
        margin: 20px 0;
    }

    .discount-box {
        background: #ECFDF5;
        border-left: 4px solid #10B981;
        padding: 20px;
        border-radius: 6px;
        margin: 20px 0;
        color: #065F46;
    }

    .alert-box {
        background: #FEF2F2;
        border-left: 4px solid #EF4444;
        padding: 20px;
        border-radius: 6px;
        margin: 20px 0;
        color: #991B1B;
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
        <h1 class="hero-title">Payment Policy</h1>
        <p class="hero-subtitle">Secure, Convenient, and Flexible Payment Options for Your Journey.</p>
    </div>
</div>

<div class="container">
    <div class="policy-container">

        <div class="policy-card">
            <p class="mb-0">
                At <strong>Boston Express Cab</strong>, we are committed to making your ride with us not only comfortable and convenient to book but also easy to pay for! Whether you prefer cash or digital payments, we have you covered with safe and convenient options. We also offer a <strong>10% cash discount</strong>, so we incur a fee on all credit card transactions.
            </p>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-wallet"></i> Accepted Payment Methods</h2>
            <p>We receive payment by the following methods:</p>
            <ul class="custom-list">
                <li><strong>Cash:</strong> 10% discount available if paid by cash (no discount on tax).</li>
                <li><strong>Major Credit Cards:</strong> Visa, MasterCard, American Express, and Discover.</li>
                <li><strong>PayPal:</strong> Available for prepaid online bookings.</li>
                <li><strong>Digital Wallets:</strong> Apple Pay & Google Pay (where available).</li>
            </ul>
            <p class="text-muted small mt-2"><i class="fas fa-lock"></i> Payments are secure and converted in USD.</p>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-shield-alt"></i> Secure Transactions & Booking Deposits</h2>

            <div class="highlight-box">
                <strong>Secure Encryption:</strong> We use Authorize.net and PayPal with 256-bit SSL encryption to safeguard your personal and financial information. We do not retain credit card information.
            </div>

            <h5 class="font-weight-bold mt-4">Booking Deposits & Final Payment</h5>
            <ul class="custom-list">
                <li><strong>$1 Deposit:</strong> Required at the time of booking to secure your ride.</li>
                <li><strong>Remaining Balance:</strong> Paid directly to the driver at the end of your trip.</li>
            </ul>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-tags"></i> Discounts & Fare Structure</h2>

            <div class="discount-box">
                <h5 class="font-weight-bold mb-2"><i class="fas fa-percentage"></i> Enjoy a 10% Cash Discount</h5>
                <p class="mb-0">Opt for cash payment after your ride and get <strong>10% off</strong>. There are <strong>no card fees or surcharges</strong> for cash transactions.</p>
            </div>

            <h5 class="font-weight-bold mt-4">Fare Structure & Additional Charges</h5>
            <p>Depending on your trip, your final fare could be calculated based on <strong>mileage</strong> or <strong>hourly rates</strong>.</p>

            <p class="mb-2"><strong>Additional costs that may apply include:</strong></p>
            <ul class="custom-list">
                <li>Bridge or tunnel tolls</li>
                <li>Airport parking fees (if needed)</li>
                <li>Child seat or minivans requests</li>
                <li>Late night or holiday surcharges</li>
                <li>Driver gratuity</li>
            </ul>
            <p class="text-muted small mt-2"><em>All other extras are to be paid directly to the driver on the day in cash.</em></p>
        </div>

        <div class="policy-card">
            <h2 class="section-header"><i class="fas fa-globe"></i> International & Cancellations</h2>

            <h5 class="font-weight-bold">International Card Payments</h5>
            <p>We accept international credit/debit cards. However, your bank may deduct a commission for currency conversion or apply an international transaction fee. Please check with your card issuer.</p>

            <div class="alert-box mt-4">
                <h5 class="font-weight-bold"><i class="fas fa-exclamation-circle"></i> Cancellation & Refund Policy</h5>
                <ul class="custom-list" style="color: #991B1B;">
                    <li style="color: #991B1B;"><strong>Free Cancellation:</strong> Available up to 4 hours before pickup.</li>
                    <li style="color: #991B1B;"><strong>No Refunds:</strong> For cancellations made less than 4 hours before scheduled pickup.</li>
                    <li style="color: #991B1B;"><strong>No-Shows:</strong> Charged the full fare.</li>
                </ul>
                <p class="mb-0 mt-2 small">If your return is accepted, it will be returned to your original payment method within 3-5 business days.</p>
            </div>
        </div>

        <div class="policy-card text-center contact-info">
            <h2 class="section-header justify-content-center border-0 mb-2">Need Help?</h2>
            <p>If you have any questions regarding billing or payment, or if you would like to dispute a charge, don't hesitate to get in touch with us.</p>

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
        </div>

    </div>
</div>

@endsection
