@extends('frontend.app')
@section('title', "Step4")

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>

    {{-- PHP Logic --}}
    @php
        use Carbon\Carbon;
        $rawDate = request('date') ?? now()->toDateString();
        $rawTime = request('time') ?? '12:00';
        try {
            $bostonDateTime = Carbon::createFromFormat('Y-m-d H:i', $rawDate . ' ' . $rawTime, 'America/New_York');
        } catch (\Exception $e) {
            $bostonDateTime = Carbon::now('America/New_York');
        }
        $formattedDate = $bostonDateTime->format('l, F j, Y');
        $formattedTime = $bostonDateTime->format('g:i A');

        $fare = request('fare', []);
        $totalFare = $fare['total'] ?? 0;
        $cashFare  = request('pay_cash') ?? 0;
    @endphp

    <style>
        /* --- WRAPPER --- */
        .payment-wrapper {
            font-family: 'Inter', sans-serif;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 60px;
            padding: 0 15px;
            position: relative;
            z-index: 1;
        }

        .payment-wrapper .page-title {
            font-weight: 800;
            font-size: 1.8rem;
            color: #1F2937;
            margin-bottom: 5px;
        }
        .payment-wrapper .step-text { color: #6B7280; font-size: 0.95rem; margin-bottom: 30px; }

        /* --- CARD DESIGN --- */
        .payment-toggles {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 10px;
        }
        .payment-toggles::-webkit-scrollbar { height: 4px; }
        .payment-toggles::-webkit-scrollbar-thumb { background: #ccc; border-radius: 4px; }

        .toggle-card {
            flex: 1;
            min-width: 150px;
            background: #fff;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            text-align: center;
            padding: 15px 10px;
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 160px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.03);
        }

        .toggle-card:hover { border-color: #9CA3AF; transform: translateY(-2px); }

        .toggle-card.active {
            border: 2px solid #059669;
            background-color: #ECFDF5;
        }
        .toggle-card.active::after {
            content: '\f00c';
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            top: 8px; right: 8px;
            background: #059669;
            color: #fff;
            width: 20px; height: 20px;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex; align-items: center; justify-content: center;
        }

        .t-center-text { font-size: 1rem; font-weight: 800; color: #111827; margin: auto 0; }
        .t-price { font-size: 1.4rem; font-weight: 800; color: #1F2937; margin-top: 10px; }
        .t-sub { font-size: 0.7rem; color: #6B7280; font-weight: 600; margin-bottom: 10px; }

        .card-btn {
            width: 100%; padding: 10px 0; border-radius: 6px;
            font-weight: 700; font-size: 0.8rem; border: none; margin-top: auto;
        }
        .btn-blue-card { background-color: #3B82F6; color: #fff; }
        .btn-yellow-card { background-color: #EAB308; color: #000; }

        /* --- SIDEBAR (UPDATED: Left Aligned) --- */
        .sidebar-yellow { background-color: #fdf5d3; padding: 20px; border-radius: 4px; border: 1px solid #FCD34D; }
        .sidebar-header { border-bottom: 1px dashed #D97706; padding-bottom: 10px; margin-bottom: 15px; }
        .sidebar-title { font-size: 1.1rem; font-weight: 700; color: #92400E; margin: 0; }

        .summary-table { width: 100%; font-size: 0.85rem; color: #333; }
        .summary-table td { padding: 4px 0; vertical-align: top; }

        /* Updated: Left align values */
        .summary-table tr td:last-child {
            text-align: left; /* Changed from right to left */
            font-weight: 600;
            padding-left: 5px;
            color: #111;
        }
        /* Make label column slightly bolder/colored */
        .summary-table tr td:first-child {
            color: #92400E;
            font-weight: 700;
            white-space: nowrap;
            width: 1%; /* Shrink to fit content */
            padding-right: 5px;
        }

        /* --- FORMS --- */
        .payment-alert {
            padding: 15px; border-radius: 8px; margin-bottom: 20px;
            background: #fee2e2; color: #991b1b; border: 1px solid #f87171; text-align: center;
        }
        .form-label { font-size: 0.85rem; font-weight: 600; color: #4B5563; margin-bottom: 5px; display: block; }
        .form-control { width: 100%; padding: 12px; border-radius: 6px; margin-bottom: 15px; border: 1px solid #D1D5DB; font-size: 0.95rem; }
        .btn-pay-main {
            background: #2563eb; color: #fff; width: 100%; padding: 16px; font-weight: 700; border: none; border-radius: 8px; font-size: 1.1rem; transition: 0.3s; cursor: pointer;
        }
        .btn-pay-main:hover { background: #1d4ed8; }
        .StripeElement { height: 50px; padding: 12px 15px; border: 1px solid #ced4da; border-radius: 6px; background: white; }
        #card-errors { color: #fa755a; margin-top: 10px; font-size: 0.875rem; }

        @media(max-width: 768px) {
            .payment-toggles { gap: 10px; }
            .toggle-card { min-width: 40%; height: 150px; padding: 10px 5px; }
            .t-price { font-size: 1.1rem; }
            .card-btn { font-size: 0.7rem; padding: 8px 0; }
        }
    </style>

    <div class="payment-wrapper">
        <h1 class="page-title">Payment Information</h1>
        <p class="step-text">Final Step ( 4 of 4 )</p>

        <form action="{{ route('book.confirm') }}" method="POST" id="payment-form">
            @csrf

            @php
                $renderHiddenInputs = function($data, $prefix = '') use (&$renderHiddenInputs) {
                    foreach ($data as $key => $value) {
                        $name = $prefix === '' ? $key : $prefix . '[' . $key . ']';
                        if (is_array($value)) {
                            $renderHiddenInputs($value, $name);
                        } else {
                            echo '<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars((string)$value) . '">' . PHP_EOL;
                        }
                    }
                };
                $renderHiddenInputs(request()->except(['_token', 'payment_method', 'stripe_token', 'amount_charged', 'card_holder_name', 'billing_phone', 'billing_address', 'billing_city', 'billing_state', 'billing_zip']));
            @endphp

            <input type="hidden" name="payment_method" id="selectedPaymentMethod" value="cash">
            <input type="hidden" name="stripe_token" id="stripe-token">
            <input type="hidden" name="amount_charged" id="amountCharged" value="1.00">

            <div class="row">

                {{-- LEFT COLUMN --}}
                <div class="col-lg-8">
                    <div class="payment-toggles">
                        <div class="toggle-card active" onclick="selectPayment('cash')" id="box-cash">
                            <div class="t-center-text">1$ for reservation</div>
                        </div>
                        <div class="toggle-card" onclick="selectPayment('deposit')" id="box-deposit">
                            <div class="t-price">${{ number_format($cashFare, 2) }}</div>
                            <div class="t-sub">1$ for reservation</div>
                            <button type="button" class="card-btn btn-blue-card">Pay Cash</button>
                        </div>
                        <div class="toggle-card" onclick="selectPayment('card')" id="box-card">
                            <div class="t-price">${{ number_format($totalFare, 2) }}</div>
                            <div class="t-sub">Pay Full</div>
                            <button type="button" class="card-btn btn-yellow-card">Pay Full Card</button>
                        </div>
                    </div>

                    <div id="paymentAlert" class="payment-alert">
                        Pay <strong>$1.00</strong> Reservation Fee now via Stripe to confirm. Balance is payable by cash.
                    </div>

                    <div style="background:#fff; padding:25px; border-radius:8px; border:1px solid #E5E7EB;">
                        <h5 class="fw-bold mb-3" style="color:#333;">Billing & Card Details</h5>
                        <div class="mb-4">
                            <label class="form-label">Credit or Debit Card</label>
                            <div id="card-element" class="StripeElement"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <div class="row" style="margin:0 -10px;">
                            <div class="col-md-6" style="padding:0 10px;">
                                <label class="form-label">Card Holder Name</label>
                                <input type="text" class="form-control" id="cardholder-name" name="card_holder_name" value="{{ request('passenger_name') }}" required>
                            </div>
                            <div class="col-md-6" style="padding:0 10px;">
                                <label class="form-label">Billing Phone</label>
                                <input type="tel" class="form-control" name="billing_phone" value="{{ request('phone_number') }}" required>
                            </div>
                            <div class="col-12" style="padding:0 10px;">
                                <label class="form-label">Billing Address</label>
                                <input type="text" class="form-control" id="billing-address" name="billing_address" value="{{ request('mailing_address') }}" required>
                            </div>
                            <div class="col-md-4" style="padding:0 10px;">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" id="billing-city" name="billing_city" required>
                            </div>
                            <div class="col-md-4" style="padding:0 10px;">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" id="billing-state" name="billing_state" required>
                            </div>
                            <div class="col-md-4" style="padding:0 10px;">
                                <label class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="billing-zip" name="billing_zip" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div style="margin-bottom:15px;">
                                <input type="checkbox" id="terms" checked>
                                <label for="terms" style="font-size:0.85rem; color:#555;">I agree to Terms & Conditions</label>
                            </div>
                            <button type="submit" class="btn-pay-main" id="card-button">Confirm Booking & Pay $1.00</button>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: SIDEBAR --}}
                <div class="col-lg-4">
                    <div class="sidebar-yellow">
                        <div class="sidebar-header"><h3 class="sidebar-title">Personal Information</h3></div>
                        <table class="summary-table mb-3">
                            <tr><td>Name</td><td>:</td><td>{{ request('passenger_name') }}</td></tr>
                            <tr><td>Email</td><td>:</td><td style="word-break: break-all;">{{ request('passenger_email') }}</td></tr>
                            <tr><td>Phone</td><td>:</td><td>{{ request('phone_number') }}</td></tr>
                            @if(request('airline_name'))
                            <tr><td>Airline</td><td>:</td><td>{{ request('airline_name') }}</td></tr>
                            @endif
                            @if(request('flight_number'))
                            <tr><td>Flight #</td><td>:</td><td>{{ request('flight_number') }}</td></tr>
                            @endif
                        </table>

                        <div class="sidebar-header"><h3 class="sidebar-title">Booking Details</h3></div>
                        <table class="summary-table">
                            <tr><td>Service</td><td>:</td><td>{{ request('tripType') == 'fromAirport' ? 'Ride From Airport' : ucfirst(request('tripType')) }}</td></tr>
                            <tr><td>Date</td><td>:</td><td>{{ $formattedDate }}</td></tr>
                            <tr><td>Time</td><td>:</td><td>{{ $formattedTime }}</td></tr>
                            <tr><td>Pickup</td><td>:</td><td>{{ Str::limit(request('pickup'), 20) }}</td></tr>
                            <tr><td>Dropoff</td><td>:</td><td>{{ Str::limit(request('dropoff'), 20) }}</td></tr>
                            <tr><td>Passengers</td><td>:</td><td>{{ request('adults') }} Ad, {{ request('children') ?? 0 }} Ch</td></tr>
                            <tr><td>Luggage</td><td>:</td><td>{{ request('luggage') }}</td></tr>

                            <tr><td colspan="3"><hr style="border-top:1px dashed #D97706; margin:10px 0;"></td></tr>

                            {{-- FEES --}}
                            <tr><td>Vehicle</td><td>:</td><td>{{ $fare['name'] ?? 'Sedan' }}</td></tr>
                            <tr><td>Base Fare</td><td>:</td><td>${{ number_format($fare['estimatedFare'] ?? 0, 2) }}</td></tr>
                            @if(($fare['gratuity'] ?? 0) > 0) <tr><td>Gratuity</td><td>:</td><td>${{ number_format($fare['gratuity'], 2) }}</td></tr> @endif
                            @if(($fare['surcharge_fee'] ?? 0) > 0) <tr><td>Surcharge</td><td>:</td><td>${{ number_format($fare['surcharge_fee'], 2) }}</td></tr> @endif
                            @if(($fare['pickup_tax'] ?? 0) > 0) <tr><td>Pickup Tax</td><td>:</td><td>${{ number_format($fare['pickup_tax'], 2) }}</td></tr> @endif
                            @if(($fare['dropoff_tax'] ?? 0) > 0) <tr><td>Dropoff Tax</td><td>:</td><td>${{ number_format($fare['dropoff_tax'], 2) }}</td></tr> @endif
                            @if(($fare['parking_fee'] ?? 0) > 0) <tr><td>Parking Fee</td><td>:</td><td>${{ number_format($fare['parking_fee'], 2) }}</td></tr> @endif
                            @if(($fare['stopover_fee'] ?? 0) > 0) <tr><td>Stopover Fee</td><td>:</td><td>${{ number_format($fare['stopover_fee'], 2) }}</td></tr> @endif
                            @if(($fare['pet_fee'] ?? 0) > 0) <tr><td>Pet Fee</td><td>:</td><td>${{ number_format($fare['pet_fee'], 2) }}</td></tr> @endif
                            @if(($fare['child_seat_fee'] ?? 0) > 0) <tr><td>Child Seat</td><td>:</td><td>${{ number_format($fare['child_seat_fee'], 2) }}</td></tr> @endif
                            @if(($fare['booster_seat_fee'] ?? 0) > 0) <tr><td>Booster Seat</td><td>:</td><td>${{ number_format($fare['booster_seat_fee'], 2) }}</td></tr> @endif
                            @if(($fare['front_seat_fee'] ?? 0) > 0) <tr><td>Front Seat</td><td>:</td><td>${{ number_format($fare['front_seat_fee'], 2) }}</td></tr> @endif
                            @if(($fare['extra_luggage_fee'] ?? 0) > 0) <tr><td>Ex. Luggage</td><td>:</td><td>${{ number_format($fare['extra_luggage_fee'], 2) }}</td></tr> @endif
                            @if(($fare['toll_fee'] ?? 0) > 0) <tr><td>Toll Fee</td><td>:</td><td>${{ number_format($fare['toll_fee'], 2) }}</td></tr> @endif

                            <tr><td colspan="3"><hr style="border-top:1px dashed #D97706; margin:10px 0;"></td></tr>

                            <tr><td>Total</td><td>:</td><td style="font-weight:800; color:#000;">${{ number_format($totalFare, 2) }}</td></tr>
                            @if(request('pay_cash'))
                            <tr><td>Cash Price</td><td>:</td><td style="font-weight:800; color:#2563eb;">${{ number_format(request('pay_cash'), 2) }}</td></tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();
        const card = elements.create('card', {
            style: { base: { color: '#32325d', fontFamily: '"Inter", sans-serif', fontSize: '16px' }, invalid: { color: '#fa755a' } },
            hidePostalCode: true
        });
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            document.getElementById('card-errors').textContent = event.error ? event.error.message : '';
        });

        const cardButton = document.getElementById('card-button');
        const form = document.getElementById('payment-form');
        const fullTotal = parseFloat("{{ $totalFare }}").toFixed(2);

        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();
            if (!form.checkValidity()) { form.reportValidity(); return; }
            cardButton.disabled = true; cardButton.innerText = "Processing...";
            const {token, error} = await stripe.createToken(card, {
                name: document.getElementById('cardholder-name').value,
                address_line1: document.getElementById('billing-address').value,
                address_city: document.getElementById('billing-city').value,
                address_state: document.getElementById('billing-state').value,
                address_zip: document.getElementById('billing-zip').value,
            });
            if (error) {
                document.getElementById('card-errors').textContent = error.message;
                cardButton.disabled = false; cardButton.innerText = "Confirm Booking";
            } else {
                document.getElementById('stripe-token').value = token.id;
                form.submit();
            }
        });

        function selectPayment(method) {
            document.getElementById('selectedPaymentMethod').value = method;
            ['box-cash', 'box-deposit', 'box-card'].forEach(id => document.getElementById(id).classList.remove('active'));
            document.getElementById('box-' + method).classList.add('active');
            const alertBox = document.getElementById('paymentAlert');
            const amountInput = document.getElementById('amountCharged');

            if (method === 'card') {
                alertBox.innerHTML = `You are paying the <strong>Full Amount $${fullTotal}</strong> now via Card.`;
                amountInput.value = fullTotal;
            } else {
                let text = method === 'deposit' ? "Discounted Balance payable by Cash/Card later." : "Balance is payable by cash.";
                alertBox.innerHTML = `Pay <strong>$1.00</strong> Reservation Fee Now. ${text}`;
                amountInput.value = "1.00";
            }
            document.getElementById('card-button').innerText = `Confirm Booking & Pay $${amountInput.value}`;
        }
        selectPayment('cash');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('notify'))
    <script>Swal.fire({ toast: true, position: 'top-center', icon: "{{ session('notify.type') }}", title: "{{ session('notify.message') }}", showConfirmButton: false, timer: 3000, timerProgressBar: true });</script>
    @endif
@endsection
