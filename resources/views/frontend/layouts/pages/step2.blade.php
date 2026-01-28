@extends('frontend.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    /* --- SCOPED STYLES (Only affects this page) --- */
    .booking-wrapper {
        /* Apply font ONLY to this wrapper, not the whole body/header */
        font-family: 'Inter', sans-serif;
        color: #1F2937;
        background-color: #F9FAFB;

        /* Layout & Spacing */
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px; /* Padding ensures content doesn't touch edges */

        /* Fix for Fixed Header overlap (adjust 100px if needed) */
        margin-top: 20px;
        border-radius: 12px;
    }

    /* --- VARIABLES (Local Scope) --- */
    .booking-wrapper {
        --primary-brand: #2D9CDB;
        --primary-brand-hover: #1b85bd;
        --primary-dark: #1F2937;
        --secondary-text: #6B7280;
        --price-red: #DC2626;
        --card-bg-dark: #2C3E50;
        --sidebar-bg: #FFFBEB;
        --sidebar-border: #FCD34D;
        --radius: 12px;
    }

    /* HEADER */
    .booking-wrapper .breadcrumb-nav {
        font-size: 0.9rem;
        color: var(--secondary-text);
        margin-bottom: 25px;
        font-weight: 500;
    }
    .booking-wrapper .breadcrumb-nav span {
        color: var(--primary-brand);
        font-weight: 700;
    }

    .booking-wrapper .page-title {
        font-weight: 800;
        font-size: 2rem;
        margin-bottom: 10px;
        color: var(--primary-dark);
        letter-spacing: -0.5px;
    }
    .booking-wrapper .page-sub {
        font-size: 1rem;
        color: var(--secondary-text);
        margin-bottom: 50px;
    }

    /* LEFT COL: VEHICLE CARD */
    .vehicle-card-dark {
        background: linear-gradient(145deg, #2C3E50, #1a252f);
        border-radius: var(--radius);
        color: white;
        padding: 30px;
        text-align: center;
        margin-bottom: 25px;
        position: relative;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .vehicle-card-dark:hover { transform: translateY(-2px); }

    .v-img-main {
        max-width: 100%;
        height: auto;
        max-height: 220px;
        object-fit: contain;
        margin-bottom: 20px;
        filter: drop-shadow(0 15px 25px rgba(0,0,0,0.4));
        transition: transform 0.5s ease;
    }
    .vehicle-card-dark:hover .v-img-main { transform: scale(1.05); }

    .v-title-main {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 25px;
        color: #fff;
    }

    .v-icons-row {
        display: flex;
        justify-content: center;
        gap: 30px;
        border-top: 1px solid rgba(255,255,255,0.15);
        padding-top: 20px;
        margin-top: 15px;
    }
    .v-icon-box {
        text-align: center;
        font-size: 0.85rem;
        opacity: 0.9;
    }
    .v-icon-box i {
        font-size: 1.6rem;
        display: block;
        margin-bottom: 8px;
        color: var(--primary-brand);
    }

    /* PAYMENT TOGGLE */
    .pay-box-container {
        display: flex;
        border: 1px solid #E5E7EB;
        background: #fff;
        border-radius: var(--radius);
        position: relative;
        margin-bottom: 15px;
        overflow: hidden;
    }
    .discount-badge {
        position: absolute;
        top: -12px;
        left: -12px;
        background: var(--price-red);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 0.75rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        transform: rotate(-15deg);
    }
    .pay-col {
        flex: 1;
        padding: 20px;
        text-align: center;
        transition: background 0.2s;
    }
    .pay-col:first-child { border-right: 1px solid #E5E7EB; }
    .pay-col:hover { background-color: #F9FAFB; }

    .pay-lbl {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        display: block;
        color: var(--secondary-text);
        margin-bottom: 5px;
    }
    .pay-amt {
        font-size: 1.4rem;
        font-weight: 800;
        display: block;
        margin: 5px 0;
        color: var(--primary-dark);
    }
    .text-red { color: var(--price-red); }
    .pay-note { font-size: 0.75rem; color: #9CA3AF; font-weight: 500; }

    .bottom-note {
        font-size: 0.8rem;
        color: var(--secondary-text);
        line-height: 1.5;
        margin-bottom: 40px;
        background: #F3F4F6;
        padding: 12px;
        border-radius: 8px;
        border-left: 4px solid var(--primary-brand);
    }

    /* PRICING TABLE */
    .pricing-card {
        background: white;
        border-radius: var(--radius);
        padding: 25px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid #E5E7EB;
        height: 100%;
    }
    .pricing-header {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--primary-dark);
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #F3F4F6;
    }
    .pricing-table { width: 100%; font-size: 0.95rem; color: var(--primary-dark); }
    .pricing-table td { padding: 8px 0; vertical-align: top; }
    .pricing-table td:nth-child(2) { width: 25px; text-align: center; color: #D1D5DB; }
    .pricing-table td:last-child { text-align: right; font-weight: 700; }

    .extra-lug-box {
        background: var(--sidebar-bg);
        border: 1px dashed var(--sidebar-border);
        padding: 15px;
        margin-top: 25px;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #92400E;
    }

    /* SIDEBAR */
    .btn-book-primary {
        display: block; width: 100%;
        background: var(--primary-brand);
        color: white;
        text-align: center;
        font-weight: 700;
        padding: 18px;
        border-radius: var(--radius);
        border: none;
        text-decoration: none;
        margin-bottom: 15px;
        transition: background 0.3s ease;
        font-size: 1.1rem;
        box-shadow: 0 4px 6px -1px rgba(45, 156, 219, 0.4);
    }
    .btn-book-primary:hover {
        background-color: var(--primary-brand-hover);
        color: white;
        transform: translateY(-2px);
    }

    .summary-box {
        background: var(--sidebar-bg);
        border: 1px solid var(--sidebar-border);
        padding: 25px;
        border-radius: var(--radius);
    }
    .sum-header {
        font-weight: 800;
        font-size: 1.1rem;
        margin-bottom: 20px;
        color: #92400E;
        text-transform: uppercase;
        border-bottom: 1px dashed #FCD34D;
        padding-bottom: 10px;
    }
    .sum-table { width: 100%; font-size: 0.9rem; color: #4B5563; }
    .sum-table td { padding: 6px 0; vertical-align: top; }
    .sum-table td:first-child { font-weight: 600; width: 100px; color: #92400E; }
    .sum-val { color: #1F2937; font-weight: 600; }

    /* MORE OPTIONS */
    .more-opt-title {
        text-align: center;
        margin: 60px 0 40px;
        font-weight: 800;
        color: var(--primary-dark);
        font-size: 1.5rem;
        position: relative;
    }
    .more-opt-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: var(--primary-brand);
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .veh-row {
        background: white;
        border: 1px solid #E5E7EB;
        border-radius: var(--radius);
        padding: 25px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    .veh-row:hover {
        border-color: var(--primary-brand);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        transform: translateY(-3px);
    }

    .vr-img-box {
        width: 180px;
        margin-right: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .vr-img {
        width: 100%;
        height: auto;
        object-fit: contain;
        transition: transform 0.3s;
    }
    .veh-row:hover .vr-img { transform: scale(1.05); }

    .vr-info h5 {
        margin: 0 0 8px;
        font-weight: 800;
        font-size: 1.2rem;
        color: var(--primary-dark);
    }
    .vr-meta {
        font-size: 0.9rem;
        color: var(--secondary-text);
        margin-bottom: 8px;
        display: flex;
        gap: 15px;
    }
    .vr-meta i { color: var(--primary-brand); margin-right: 5px; }

    .vr-action { margin-left: auto; text-align: right; min-width: 160px; }
    .vr-price {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary-brand);
        display: block;
        margin-bottom: 10px;
    }

    .btn-select {
        border: 2px solid var(--primary-brand);
        background: transparent;
        color: var(--primary-brand);
        padding: 8px 20px;
        font-weight: 700;
        font-size: 0.9rem;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-select:hover {
        background: var(--primary-brand);
        color: white;
    }

    .d-none-custom { display: none !important; }

    @media(max-width: 768px) {
        .veh-row { flex-direction: column; text-align: center; }
        .vr-img-box { width: 100%; margin: 0 0 20px 0; }
        .vr-action { margin-top: 20px; margin-left: 0; width: 100%; }
        .vr-meta { justify-content: center; }
        .pay-box-container { flex-direction: row; }
        .pricing-card { margin-bottom: 25px; }
    }
</style>

<div class="booking-wrapper animate__animated animate__fadeIn">

    <div class="breadcrumb-nav">
        Home &raquo; Reservation &raquo; <span>Choose vehicle ( Step 2 of 4 )</span>
    </div>

    <h1 class="page-title">Select Vehicle & Confirm Ride</h1>
    <p class="page-sub">Review your selection and choose the best option for your journey.</p>

    <form id="bookingForm" action="{{ route('step3') }}" method="GET">

        {{-- Hidden Inputs (Data Passing) --}}
        @foreach($request as $key => $value)
            @if(!is_array($value) && $key != 'fare')
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
        <input type="hidden" name="distance_miles" value="{{ $distance_miles }}">
        <input type="hidden" name="trip_type" value="{{ $trip_type }}">
        <input type="hidden" name="pickup" value="{{ $pickup }}">
        <input type="hidden" name="dropoff" value="{{ $dropoff }}">
        <input type="hidden" name="vehicles_used" value="1">
        <input type="hidden" name="reqPassengers" value="{{ $reqPassengers }}">
        {{-- Dynamic Inputs --}}
        <input type="hidden" name="vehicle_id" id="inp_vid" value="{{ $defaultVehicle['vehicle_id'] }}">
        <input type="hidden" name="fare[name]" id="inp_vname" value="{{ $defaultVehicle['name'] }}">
        <input type="hidden" name="fare[estimatedFare]" id="inp_base" value="{{ $defaultVehicle['estimated_fare'] }}">
        <input type="hidden" name="fare[gratuity]" id="inp_grat" value="{{ $defaultVehicle['gratuity_fee'] }}">
        <input type="hidden" name="fare[surcharge_fee]" id="inp_sur" value="{{ $defaultVehicle['surcharge_fee'] }}">
        <input type="hidden" name="fare[extra_luggage_fee]" id="inp_elug" value="{{ $defaultVehicle['extra_luggage_fee'] }}">
        <input type="hidden" name="fare[total]" id="inp_total" value="{{ $defaultVehicle['total_fare'] }}">
        <input type="hidden" name="pay_cash" id="inp_cash" value="{{ $defaultVehicle['pay_cash'] }}">


        {{-- Static Fees --}}
        <input type="hidden" name="fare[pickup_tax]" value="{{ $defaultVehicle['pickup_tax'] }}">
        <input type="hidden" name="fare[dropoff_tax]" value="{{ $defaultVehicle['dropoff_tax'] }}">
        <input type="hidden" name="fare[parking_fee]" value="{{ $defaultVehicle['parking_fee'] }}">
        <input type="hidden" name="fare[stopover_fee]" value="{{ $defaultVehicle['stopover_fee'] }}">
        <input type="hidden" name="fare[pet_fee]" value="{{ $defaultVehicle['pet_fee'] }}">
        <input type="hidden" name="fare[child_seat_fee]" value="{{ $defaultVehicle['child_seat_fee'] }}">
        <input type="hidden" name="fare[booster_seat_fee]" value="{{ $defaultVehicle['booster_seat_fee'] }}">
        <input type="hidden" name="fare[front_seat_fee]" value="{{ $defaultVehicle['front_seat_fee'] }}">
        <input type="hidden" name="fare[extra_charges]" value="{{ $defaultVehicle['extra_charges'] }}">
        <input type="hidden" name="fare[toll_fee]" value="{{ $defaultVehicle['toll_fee'] }}">


        <div class="row">

            {{-- COLUMN 1: Vehicle Card --}}
            <div class="col-lg-4">
                <div class="vehicle-card-dark">
                    <img src="{{ $defaultVehicle['image'] ? asset($defaultVehicle['image']) :  asset("images/home1.jpeg") }}" id="disp_img" class="v-img-main">

                    <div class="v-title-main">
                        <span id="disp_pax">{{ $defaultVehicle['capacity_passenger'] }}</span> Passenger
                        <span id="disp_name">{{ $defaultVehicle['name'] }}</span>
                        <span id="disp_lug">{{ $defaultVehicle['capacity_luggage'] }}</span> Bags
                    </div>

                    <div class="v-icons-row">
                        <div class="v-icon-box" title="Passengers">
                            <i class="fas fa-user-friends"></i>
                            <div>{{ $reqPassengers }} Pax</div>
                        </div>
                        <div class="v-icon-box" title="Luggage">
                            <i class="fas fa-suitcase-rolling"></i>
                            <div>{{ $request['luggage'] }} Bags</div>
                        </div>
                        <div class="v-icon-box" title="Child Seat">
                            <i class="fas fa-baby-carriage"></i>
                            <div>{{ $child_seat ?? 0 }} Seats</div>
                        </div>
                    </div>
                </div>

                <div class="pay-box-container">
                    <div class="discount-badge">-10%</div>
                    <div class="pay-col">
                        <span class="pay-lbl">Pay Cash</span>
                        <span class="pay-amt text-red">$<span id="disp_cash">{{ number_format($defaultVehicle['pay_cash'], 2) }}</span></span>
                        <div class="pay-note">Pay $1 Reservation Fee</div>
                    </div>
                    <div class="pay-col">
                        <span class="pay-lbl">Pay Card</span>
                        <span class="pay-amt">$<span id="disp_card">{{ number_format($defaultVehicle['total_fare'], 2) }}</span></span>
                        <div class="pay-note">Full Online Payment</div>
                    </div>
                </div>
                <div class="bottom-note">
                    <i class="fas fa-info-circle me-1"></i> <strong>Note:</strong> Pay only $1.00 now to confirm your reservation. Balance is payable after service.
                </div>
            </div>

            {{-- COLUMN 2: Pricing Details --}}
            <div class="col-lg-4">
                <div class="pricing-card">
                    <div class="pricing-header">Price Breakdown</div>
                    <table class="pricing-table">
                        <tr><td>Distance Covered</td><td>:</td><td>{{ $distance_miles }} Miles</td></tr>
                        <tr><td>Estimated Fare</td><td>:</td><td>$<span id="tbl_base">{{ number_format($defaultVehicle['estimated_fare'], 2) }}</span></td></tr>
                        <tr><td>Gratuity (20%)</td><td>:</td><td>$<span id="tbl_grat">{{ number_format($defaultVehicle['gratuity_fee'], 2) }}</span></td></tr>

                        @if($defaultVehicle['pickup_tax'] > 0) <tr><td>Airport Pickup Toll</td><td>:</td><td>${{ number_format($defaultVehicle['pickup_tax'], 2) }}</td></tr> @endif
                        @if($defaultVehicle['dropoff_tax'] > 0) <tr><td>Airport Dropoff Toll</td><td>:</td><td>${{ number_format($defaultVehicle['dropoff_tax'], 2) }}</td></tr> @endif
                        @if($defaultVehicle['stopover_fee'] > 0) <tr><td>Stopover Fee</td><td>:</td><td>${{ number_format($defaultVehicle['stopover_fee'], 2) }}</td></tr> @endif
                        @if($defaultVehicle['pet_fee'] > 0) <tr><td>Pets Fee</td><td>:</td><td>${{ number_format($defaultVehicle['pet_fee'], 2) }}</td></tr> @endif
                        @if($defaultVehicle['child_seat_fee'] > 0) <tr><td>Infant Seat Fee</td><td>:</td><td>${{ number_format($defaultVehicle['child_seat_fee'], 2) }}</td></tr> @endif
                        @if($defaultVehicle['booster_seat_fee'] > 0) <tr><td>Booster Seat Fee</td><td>:</td><td>${{ number_format($defaultVehicle['booster_seat_fee'], 2) }}</td></tr> @endif
                        @if($defaultVehicle['front_seat_fee'] > 0) <tr><td>Front Seat Fee</td><td>:</td><td>${{ number_format($defaultVehicle['front_seat_fee'], 2) }}</td></tr> @endif
                        @if($defaultVehicle['toll_fee'] > 0) <tr><td>Toll Fee</td><td>:</td><td>${{ number_format($defaultVehicle['toll_fee'], 2) }}</td></tr> @endif
                        @if($defaultVehicle['extra_charges'] > 0) <tr><td>Zip Charges</td><td>:</td><td>${{ number_format($defaultVehicle['extra_charges'], 2) }}</td></tr> @endif

                        <tr id="row_sur" style="{{ $defaultVehicle['surcharge_fee'] > 0 ? '' : 'display:none;' }}">
                            <td>Surcharge / Night</td><td>:</td><td>$<span id="tbl_sur">{{ number_format($defaultVehicle['surcharge_fee'], 2) }}</span></td>
                        </tr>

                        <tr>
                            <td class="pt-3 border-top fw-bold text-dark">Total Payable</td>
                            <td class="pt-3 border-top">:</td>
                            <td class="pt-3 border-top fw-bold text-dark fs-5">$<span id="tbl_total">{{ number_format($defaultVehicle['total_fare'], 2) }}</span></td>
                        </tr>
                    </table>

                    <div id="box_elug" class="extra-lug-box" style="{{ $defaultVehicle['extra_luggage_fee'] > 0 ? '' : 'display:none;' }}">
                        <span class="fw-bold"><i class="fas fa-luggage-cart me-2"></i>Extra Luggage Fee</span>
                        <span class="fw-bold fs-5">$<span id="disp_elug">{{ number_format($defaultVehicle['extra_luggage_fee'], 2) }}</span></span>
                    </div>
                </div>
            </div>

            {{-- COLUMN 3: Sidebar Summary --}}
            <div class="col-lg-4">
                <button type="submit" class="btn-book-primary">
                    Book Now <i class="fas fa-arrow-right ms-2"></i>
                </button>
                <div class="btn-pay-note text-muted">Secure your ride instantly</div>

                <div class="summary-box">
                    <div class="sum-header">Trip Summary</div>
                    <table class="sum-table">
                        <tr><td>Service</td><td>:</td><td class="sum-val">{{ $trip_type == 'fromAirport' ? 'From Airport' : ($trip_type == 'toAirport' ? 'To Airport' : 'Door-to-Door') }}</td></tr>
                        <tr><td>Date</td><td>:</td><td class="sum-val">{{ $formattedDate ?? $request['date'] }}</td></tr>
                        <tr><td>Time</td><td>:</td><td class="sum-val">{{ $formattedTime ?? $request['time'] }}</td></tr>
                        <tr><td>Pick up</td><td>:</td><td class="sum-val">{{ Str::limit($pickup, 28) }}</td></tr>
                        <tr><td>Drop off</td><td>:</td><td class="sum-val">{{ Str::limit($dropoff, 28) }}</td></tr>

                        <tr><td colspan="3"><hr style="border-color:#E5E7EB; margin:15px 0;"></td></tr>

                        <tr>
                            <td colspan="3" style="font-weight:700; margin-bottom:10px; color:#B45309; text-transform:uppercase; font-size:0.8rem;">Vehicle Info</td>
                        </tr>
                        <tr><td>Selected</td><td>:</td><td class="sum-val"><span id="sum_vname">{{ $defaultVehicle['name'] }}</span></td></tr>
                        <tr><td>Capacity</td><td>:</td><td class="sum-val"><span id="sum_vpax">{{ $defaultVehicle['capacity_passenger'] }}</span> Pax, <span id="sum_vlug">{{ $defaultVehicle['capacity_luggage'] }}</span> Bags</td></tr>

                        <tr><td colspan="3"><hr style="border-color:#E5E7EB; margin:15px 0;"></td></tr>

                        <tr>
                            <td class="fw-bold fs-6 text-dark">ESTIMATED TOTAL</td>
                            <td class="fw-bold fs-6">:</td>
                            <td class="fw-bold fs-5" style="color:#2D9CDB;">$<span id="sum_total">{{ number_format($defaultVehicle['total_fare'], 2) }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </form>

    {{-- BOTTOM: MORE VEHICLE OPTIONS --}}
    <div class="more-opt-title">More Vehicle Options</div>

    <div id="vehicle_list_container">
        @foreach($vehicleOptions as $option)
            <div class="veh-row {{ $option['vehicle_id'] == $defaultVehicle['vehicle_id'] ? 'd-none-custom' : '' }}"
                 id="vrow_{{ $option['vehicle_id'] }}">

                <div class="vr-img-box">
                    <img src="{{ asset($option['image']) }}" class="vr-img">
                </div>

                <div class="vr-info flex-grow-1">
                    <h5>{{ $option['name'] }}</h5>
                    <div class="vr-meta">
                        <span><i class="fas fa-user-group"></i> {{ $option['capacity_passenger'] }} Pax</span>
                        <span><i class="fas fa-suitcase"></i> {{ $option['capacity_luggage'] }} Bags</span>
                        <span><i class="fas fa-star"></i> Luxury Class</span>
                    </div>
                    <div class="text-muted" style="font-size:0.8rem">
                        Base Fare: ${{ number_format($option['estimated_fare'], 2) }} &bull; Gratuity: ${{ number_format($option['gratuity_fee'], 2) }}
                    </div>
                </div>

                <div class="vr-action">
                    <span class="vr-price">${{ number_format($option['total_fare'], 2) }}</span>
                    <button type="button" class="btn-select" onclick="updateVehicle({{ json_encode($option) }})">
                        Select This <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
    function formatMoney(amount) {
        return Number(amount).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function updateVehicle(data) {
        // Animation for smooth transition
        const mainCard = document.querySelector('.vehicle-card-dark');
        mainCard.classList.add('animate__animated', 'animate__pulse');
        setTimeout(() => mainCard.classList.remove('animate__animated', 'animate__pulse'), 500);

        // 1. Reset all rows to visible
        document.querySelectorAll('.veh-row').forEach(row => row.classList.remove('d-none-custom'));

        // 2. Hide selected row
        document.getElementById('vrow_' + data.vehicle_id).classList.add('d-none-custom');

        // 3. Update Left Col (Card & Payment)
        document.getElementById('disp_img').src = "{{ asset('') }}" + data.image;
        document.getElementById('disp_name').innerText = data.name;
        document.getElementById('disp_pax').innerText = data.capacity_passenger;
        document.getElementById('disp_lug').innerText = data.capacity_luggage;

        document.getElementById('disp_cash').innerText = formatMoney(data.pay_cash);
        document.getElementById('disp_card').innerText = formatMoney(data.total_fare);

        // 4. Update Middle Col (Table)
        document.getElementById('tbl_base').innerText = formatMoney(data.estimated_fare);
        document.getElementById('tbl_grat').innerText = formatMoney(data.gratuity_fee);

        // Toggle Surcharge Row
        const rowSur = document.getElementById('row_sur');
        if(data.surcharge_fee > 0) {
            rowSur.style.display = 'table-row';
            document.getElementById('tbl_sur').innerText = formatMoney(data.surcharge_fee);
        } else {
            rowSur.style.display = 'none';
        }

        // Toggle Extra Luggage Box
        const boxElug = document.getElementById('box_elug');
        if(data.extra_luggage_fee > 0) {
            boxElug.style.display = 'flex';
            document.getElementById('disp_elug').innerText = formatMoney(data.extra_luggage_fee);
        } else {
            boxElug.style.display = 'none';
        }

        document.getElementById('tbl_total').innerText = formatMoney(data.total_fare);

        // 5. Update Sidebar Summary
        document.getElementById('sum_vname').innerText = data.name;
        document.getElementById('sum_vpax').innerText = data.capacity_passenger;
        document.getElementById('sum_vlug').innerText = data.capacity_luggage;
        document.getElementById('sum_total').innerText = formatMoney(data.total_fare);

        // 6. Update Hidden Inputs
        document.getElementById('inp_vid').value = data.vehicle_id;
        document.getElementById('inp_vname').value = data.name;
        document.getElementById('inp_base').value = data.estimated_fare;
        document.getElementById('inp_grat').value = data.gratuity_fee;
        document.getElementById('inp_sur').value = data.surcharge_fee;
        document.getElementById('inp_elug').value = data.extra_luggage_fee;
        document.getElementById('inp_total').value = data.total_fare;
        document.getElementById('inp_cash').value = data.pay_cash;

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

@endsection
