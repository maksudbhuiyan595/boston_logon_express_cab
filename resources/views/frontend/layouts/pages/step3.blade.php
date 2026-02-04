@extends('frontend.app')
@section('title', "Step3")
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- PHP Logic for Dates & Formatting --}}
    @php
        use Carbon\Carbon;
        // Handle Date/Time from your JSON keys (date, time)
        $rawDate = request('date') ?? now()->toDateString();
        $rawTime = request('time') ?? '12:00';

        try {
            $bostonDateTime = Carbon::createFromFormat('Y-m-d H:i', $rawDate . ' ' . $rawTime, 'America/New_York');
        } catch (\Exception $e) {
            $bostonDateTime = Carbon::now('America/New_York');
        }

        $formattedDate = $bostonDateTime->format('l, F j, Y');
        $formattedTime = $bostonDateTime->format('g:i A');

        // Access Fare Array Helper
        $fare = request('fare', []);
    @endphp

    <style>
        /* --- SCOPED STYLES --- */
     .passenger-wrapper {
            font-family: 'Inter', sans-serif;
            color: #1F2937;
            background-color: #F9FAFB;

            /* Layout */
            max-width: 1280px;
            margin: 20px auto; /* top-bottom | left-right */
            padding: 40px 20px;

            /* Styling */
            position: relative;
            z-index: 1;
            border-radius: 12px;
        }

        /* Page Titles */
        .passenger-wrapper .page-title {
            font-weight: 800;
            font-size: 1.8rem;
            color: #1F2937;
            margin-bottom: 5px;
        }
        .passenger-wrapper .step-text {
            color: #6B7280;
            font-size: 0.95rem;
            margin-bottom: 30px;
        }

        /* --- LEFT FORM --- */
        .passenger-wrapper .traveler-bar {
            background-color: #E5E7EB;
            padding: 12px 20px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            font-weight: 700;
            color: #374151;
        }

        .passenger-wrapper .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #4B5563;
            margin-bottom: 6px;
            display: block;
        }

        .passenger-wrapper .text-req { color: #DC2626; margin-left: 2px; }

        .passenger-wrapper .form-control,
        .passenger-wrapper .form-select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            font-size: 0.95rem;
            background: #fff;
        }
        .passenger-wrapper .form-control:focus {
            border-color: #2D9CDB;
            outline: none;
            box-shadow: 0 0 0 3px rgba(45, 156, 219, 0.1);
        }

        /* --- RIGHT SIDEBAR (Yellow) --- */
        .passenger-wrapper .sidebar-yellow {
            background-color: #FFFBEB;
            border: 1px solid #FCD34D;
            border-radius: 8px;
            padding: 25px;
        }

        .passenger-wrapper .sidebar-head {
            font-size: 1.1rem;
            font-weight: 800;
            color: #92400E;
            margin-bottom: 15px;
            border-bottom: 1px dashed #D97706;
            padding-bottom: 10px;
        }

        .passenger-wrapper .sum-table { width: 100%; font-size: 0.85rem; color: #4B5563; }
        .passenger-wrapper .sum-table td { padding: 6px 0; vertical-align: top; }

        /* ALIGNMENT FIX: Labels bold, Values Left Aligned */
        .passenger-wrapper .sum-lbl {
            font-weight: 700;
            width: 100px;
            color: #92400E;
        }
        .passenger-wrapper .sum-val {
            text-align: left;
            color: #1F2937;
            font-weight: 600;
            padding-left: 10px;
        }

        /* Button */
        .passenger-wrapper .btn-continue {
            background-color: #047857;
            color: white;
            font-weight: 700;
            padding: 14px;
            border: none;
            border-radius: 6px;
            width: 100%;
            display: block;
            margin-top: 20px;
            cursor: pointer;
            text-align: center;
            transition: 0.2s;
        }
        .passenger-wrapper .btn-continue:hover {
            background-color: #065F46;
        }

        .passenger-wrapper .note-text {
            font-size: 0.75rem;
            color: #6B7280;
            text-align: center;
            margin-top: 10px;
        }

        /* --- PRICE BOXES --- */
        .passenger-wrapper .price-row {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .passenger-wrapper .p-box {
            flex: 1;
            background: #fff;
            border: 1px solid #E5E7EB;
            padding: 10px;
            text-align: center;
            border-radius: 6px;
            position: relative;
        }
        .passenger-wrapper .p-badge {
            position: absolute; top: -10px; left: -5px;
            background: #DC2626; color: white; width: 26px; height: 26px;
            border-radius: 50%; font-size: 0.65rem; font-weight: 800;
            display: flex; align-items: center; justify-content: center;
        }
        .passenger-wrapper .p-amt { font-size: 1.1rem; font-weight: 800; display: block; }
        .passenger-wrapper .p-lbl { font-size: 0.7rem; font-weight: 700; color: #374151; display: block; }
        .passenger-wrapper .p-sub { font-size: 0.6rem; color: #9CA3AF; }

        /* Grid */
        .passenger-wrapper .row { display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px; }
        .passenger-wrapper .col-md-6 { flex: 0 0 50%; max-width: 50%; padding: 0 15px; margin-bottom: 15px; }
        .passenger-wrapper .col-12 { flex: 0 0 100%; max-width: 100%; padding: 0 15px; margin-bottom: 15px; }
        .passenger-wrapper .col-lg-8 { flex: 0 0 66.66%; max-width: 66.66%; padding: 0 15px; }
        .passenger-wrapper .col-lg-4 { flex: 0 0 33.33%; max-width: 33.33%; padding: 0 15px; }

        @media(max-width: 768px) {
            .passenger-wrapper .col-lg-8, .passenger-wrapper .col-lg-4, .passenger-wrapper .col-md-6 {
                flex: 0 0 100%; max-width: 100%;
            }
            .passenger-wrapper .traveler-bar { flex-direction: column; align-items: flex-start; }
        }


    </style>

    <div class="passenger-wrapper">

        <h1 class="page-title">Passenger Information</h1>
        <p class="step-text">Your Current Selection ( Step 3 Of 4 )</p>

        <form action="{{ route('step4') }}" method="GET">

            {{--
                ========================================================
                RECURSIVE HIDDEN INPUTS (Fixed for Nested Arrays)
                This takes the JSON structure (like 'fare') and creates:
                <input type="hidden" name="fare[pickup_tax]" value="42.00">
                ========================================================
            --}}
            @php
                $renderHiddenInputs = function($data, $prefix = '') use (&$renderHiddenInputs) {
                    foreach ($data as $key => $value) {
                        // Create the name attribute: parent[child] or just name
                        $name = $prefix === '' ? $key : $prefix . '[' . $key . ']';

                        if (is_array($value)) {
                            // Recursively call for nested arrays (like 'fare')
                            $renderHiddenInputs($value, $name);
                        } else {
                            // Render simple input
                            echo '<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars((string)$value) . '">' . PHP_EOL;
                        }
                    }
                };

                // Exclude current form fields to avoid duplication conflicts, but include all previous data
                $renderHiddenInputs(request()->except(['_token', 'passenger_name', 'passenger_email', 'phone_number']));
            @endphp

            <div class="row">

                {{-- LEFT: FORM --}}
                <div class="col-lg-8">

                    <div class="traveler-bar">
                        <span>Are you also the traveler ?</span>
                        <div style="display: flex; gap: 15px;">
                            <label style="display:flex; align-items:center; gap:5px; cursor:pointer;">
                                <input type="radio" name="is_traveler" value="yes" checked style="accent-color: #DC2626;">
                                Yes
                            </label>
                            <label style="display:flex; align-items:center; gap:5px; opacity:0.6;">
                                <input type="radio" name="is_traveler" value="no" disabled>
                                No
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Passenger Name <span class="text-req">*</span></label>
                            {{-- Added value="{{ request(...) }}" so data persists if user goes back/forth --}}
                            <input type="text" class="form-control" name="passenger_name" value="{{ request('passenger_name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Passenger Email <span class="text-req">*</span></label>
                            <input type="email" class="form-control" name="passenger_email" value="{{ request('passenger_email') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Airline Name <span class="text-req">*</span></label>
                            <input type="text" class="form-control" name="airline_name" value="{{ request('airline_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Flight No. <span class="text-req">*</span></label>
                            <input type="text" class="form-control" name="flight_number" value="{{ request('flight_number') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Passenger Phone <span class="text-req">*</span></label>
                            <div style="display: flex;">
                                <select class="form-select" style="width: 100px; border-radius: 6px 0 0 6px; background:#F3F4F6;">
                                    <option>USA (+1)</option>
                                </select>
                                <input type="tel" class="form-control" name="phone_number" value="{{ request('phone_number') }}" required style="border-radius: 0 6px 6px 0; border-left: 0;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Alternate Phone Number</label>
                            <input type="tel" class="form-control" name="alternate_phone" value="{{ request('alternate_phone') }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Mailing Address</label>
                            <textarea class="form-control" name="mailing_address" rows="2">{{ request('mailing_address') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Special Needs</label>
                            <textarea class="form-control" name="special_needs" rows="2">{{ request('special_needs') }}</textarea>
                        </div>

                        <div class="col-12" style="text-align: right;">
                            <button type="submit" class="btn-continue" style="width:auto; float:right;">
                                Continue to Payment <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                            <div style="clear:both;"></div>
                            <div class="note-text" style="text-align:right;">
                                Pay only $1 & confirm your reservation. Balance is payable after service.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: SIDEBAR --}}
                <div class="col-lg-4">
                    <div class="sidebar-yellow">
                        <div class="sidebar-head">Booking Details</div>
                        <table class="sum-table">
                            <tr>
                                <td class="sum-lbl">Service</td><td>:</td>
                                <td class="sum-val">{{ request('tripType') == 'fromAirport' ? 'Ride From Airport' : ucfirst(request('tripType')) }}</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Date</td><td>:</td>
                                <td class="sum-val">{{ $formattedDate }}</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Time</td><td>:</td>
                                <td class="sum-val">{{ $formattedTime }}</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Pick up</td><td>:</td>
                                <td class="sum-val">{{ Str::limit(request('pickup'), 25) }}</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Drop off</td><td>:</td>
                                <td class="sum-val">{{ Str::limit(request('dropoff'), 25) }}</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Passengers</td><td>:</td>
                                <td class="sum-val">{{ request('reqPassengers') }} <small class="text-muted">({{ request('adults') }} Ad, {{ request('children') ?? 0 }} Ch)</small></td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Luggage</td><td>:</td>
                                <td class="sum-val">{{ request('luggage') }}</td>
                            </tr>

                            {{-- Divider --}}
                            <tr><td colspan="3"><hr style="border-top:1px dashed #F59E0B; margin:15px 0;"></td></tr>

                            {{-- Vehicle Info & Fees --}}
                            <tr>
                                <td colspan="3" style="color:#B45309; font-weight:700; font-size:0.85rem; text-transform:uppercase; padding-bottom:5px;">Vehicle & Price</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Vehicle</td><td>:</td>
                                <td class="sum-val">{{ $fare['name'] ?? 'Luxury Sedan' }}</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Distance</td><td>:</td>
                                <td class="sum-val">{{ number_format(request('distance_miles', 0), 2) }} Miles</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Base Fare</td><td>:</td>
                                <td class="sum-val">${{ number_format($fare['estimatedFare'] ?? 0, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="sum-lbl">Gratuity</td><td>:</td>
                                <td class="sum-val">${{ number_format($fare['gratuity'] ?? 0, 2) }}</td>
                            </tr>

                            {{-- DYNAMIC FEES FROM JSON --}}
                            @if(($fare['pickup_tax'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Pickup Tax</td><td>:</td><td class="sum-val">${{ number_format($fare['pickup_tax'], 2) }}</td></tr>
                            @endif
                            @if(($fare['parking_fee'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Parking Fee</td><td>:</td><td class="sum-val">${{ number_format($fare['parking_fee'], 2) }}</td></tr>
                            @endif
                            @if(($fare['surcharge_fee'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Surcharge</td><td>:</td><td class="sum-val">${{ number_format($fare['surcharge_fee'], 2) }}</td></tr>
                            @endif
                            @if(($fare['extra_luggage_fee'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Extra Luggage</td><td>:</td><td class="sum-val">${{ number_format($fare['extra_luggage_fee'], 2) }}</td></tr>
                            @endif
                            @if(($fare['front_seat_fee'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Front Seat</td><td>:</td><td class="sum-val">${{ number_format($fare['front_seat_fee'], 2) }}</td></tr>
                            @endif

                            {{-- ADDED THESE BASED ON YOUR JSON DATA --}}
                            @if(($fare['stopover_fee'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Stopover</td><td>:</td><td class="sum-val">${{ number_format($fare['stopover_fee'], 2) }}</td></tr>
                            @endif
                            @if(($fare['pet_fee'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Pet Fee</td><td>:</td><td class="sum-val">${{ number_format($fare['pet_fee'], 2) }}</td></tr>
                            @endif
                            @if(($fare['child_seat_fee'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Child Seat</td><td>:</td><td class="sum-val">${{ number_format($fare['child_seat_fee'], 2) }}</td></tr>
                            @endif
                            @if(($fare['booster_seat_fee'] ?? 0) > 0)
                                <tr><td class="sum-lbl">Booster Seat</td><td>:</td><td class="sum-val">${{ number_format($fare['booster_seat_fee'], 2) }}</td></tr>
                            @endif

                            <tr><td colspan="3"><hr style="border-top: 1px dashed #F59E0B; margin: 15px 0;"></td></tr>

                            <tr>
                                <td class="sum-lbl" style="font-size:1.1rem; padding-top:10px;">Total</td>
                                <td style="padding-top:10px;">:</td>
                                <td class="sum-val" style="font-size:1.2rem; font-weight:800; color:#2D9CDB; padding-top:10px;">
                                    ${{ number_format($fare['total'] ?? 0, 2) }}
                                </td>
                            </tr>
                        </table>

                        {{-- Price Boxes --}}
                        <div class="price-row">
                            <div class="p-box">
                                <div class="p-badge">%</div>
                                <span class="p-amt" style="color:#DC2626;">${{ number_format(request('pay_cash', 0), 2) }}</span>
                                <span class="p-lbl">PAY CASH</span>
                                <span class="p-sub">$1 reservation fee</span>
                            </div>
                            <div class="p-box">
                                <span class="p-amt" style="color:#1F2937;">${{ number_format($fare['total'] ?? 0, 2) }}</span>
                                <span class="p-lbl">PAY CARD</span>
                                <span class="p-sub">Full Price</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
