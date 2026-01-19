
    <style>
        /* HERO SECTION */
        .hero-section {
            margin-top: 20px;
            padding-bottom: 40px;
            height: 500px;
            position: relative;
        }

        /* --- MAGIC CSS: FLOATING CARD --- */
        .reservation-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-top: 3px solid var(--brand-blue);
            width: 100%;
            z-index: 100;
        }

        /* Desktop Floating Effect */
        @media (min-width: 992px) {
            .form-column { position: relative; }
            .reservation-card {
                position: absolute;
                top: 0;
                left: 12px;
                width: calc(100% - 24px);
            }
        }

        .form-header {
            background: var(--brand-blue);
            color: white;
            padding: 8px;
            text-align: center;
            border-radius: 6px 6px 0 0;
        }
        .form-header h3 { margin: 0; font-size: 1.2rem; font-weight: 700; }
        .form-header p { margin: 0; font-size: 0.75rem; opacity: 0.9; }

        /* INPUTS */
        .form-control, .form-select, .input-group-text {
            height: var(--input-height);
            font-size: 0.85rem;
            padding: 5px 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .input-group-text { width: 38px; justify-content: center; background: #f8f9fa; color: var(--brand-blue); }
        .form-control:focus, .form-select:focus { border-color: var(--brand-blue); box-shadow: none; }

        /* TRIP TYPE */
        .trip-type-container { display: flex; gap: 5px; margin: 8px 0; }
        .trip-option { flex: 1; }
        .trip-option input { display: none; }
        .trip-card {
            display: flex; flex-direction: row; align-items: center; justify-content: center;
            padding: 5px; border: 1px solid #eee; border-radius: 4px;
            cursor: pointer; transition: 0.2s; height: 100%; background: #fff; gap: 5px;
        }
        .trip-option input:checked+.trip-card { background-color: var(--brand-light); border-color: var(--brand-blue); }
        .trip-option input:checked+.trip-card i, .trip-option input:checked+.trip-card span { color: var(--brand-blue); }
        .mini-label { font-size: 0.7rem; color: #777; margin-left: 2px; font-weight: 600; display: block; margin-bottom: 2px; }

        /* EXTRAS TOGGLE */
        .extras-toggle {
            color: var(--brand-blue);
            font-weight: 600;
            cursor: pointer;
            padding: 8px 0 4px 0;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .extras-toggle:hover { text-decoration: underline; }

        /* EXTRAS SECTION */
        #extrasSection {
            display: none;
            background: #fdfdfd;
            padding: 8px 10px;
            border-radius: 4px;
            border: 1px solid #eee;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        .extra-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px; padding-bottom: 4px; border-bottom: 1px solid #f8f8f8; }
        .extra-label { font-size: 0.8rem; color: #333; }
        .extra-price-tag { background: var(--brand-blue); color: white; padding: 0px 4px; border-radius: 3px; font-size: 0.65rem; margin-left: 4px; }
        .total-price-display { font-weight: bold; color: var(--brand-blue); margin-left: 8px; font-size: 0.85rem; min-width: 25px; text-align: right; }

        .btn-get-fare {
            width: 100%;
            background: var(--brand-blue);
            color: white;
            border: none;
            padding: 10px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 4px;
            text-transform: uppercase;
            transition: 0.3s;
            margin-top: 5px;
        }
        .btn-get-fare:hover { background: var(--brand-dark); box-shadow: 0 4px 10px rgba(30, 136, 229, 0.3); }
        .footer-note { text-align: center; font-size: 0.7rem; color: #888; margin-top: 5px; margin-bottom: 0; }
        .hero-img { width: 100%; height: 425px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); }
        .pac-container { z-index: 10000 !important; }

        /* --- MOBILE OPTIMIZATION FOR TRIP TYPE --- */
@media (max-width: 576px) {
    .trip-type-container {
        display: flex;
        flex-wrap: nowrap; /* এক লাইনে রাখবে */
        overflow-x: auto;   /* যদি খুব ছোট স্ক্রিন হয় তবে স্ক্রল করা যাবে */
        gap: 4px;           /* গ্যাপ কমিয়ে আনা হয়েছে */
        padding-bottom: 5px;
    }

    .trip-option {
        flex: 1 0 auto;    /* ফ্লেক্সিবল সাইজ */
        min-width: 0;      /* কন্টেন্ট অনুযায়ী ছোট হবে */
    }

    .trip-card {
        padding: 6px 4px;   /* প্যাডিং কমানো হয়েছে */
        font-size: 0.7rem;  /* ফন্ট সাইজ ছোট করা হয়েছে যেন এক লাইনে ধরে */
        white-space: nowrap; /* টেক্সট ভেঙে নিচে যাবে না */
        flex-direction: row; /* আইকন এবং লেখা পাশাপাশি থাকবে */
        justify-content: center;
        gap: 3px;
    }

    .trip-card i {
        font-size: 0.75rem; /* আইকন সাইজ এডজাস্ট */
    }

    /* স্ক্রলবার হাইড করার জন্য (ঐচ্ছিক) */
    .trip-type-container::-webkit-scrollbar {
        display: none;
    }
}
@media (max-width: 991px) {
    /* হিরো সেকশনের হাইট মোবাইলে অটো থাকবে যেন কন্টেন্ট না কাটে */
    .hero-section {
        height: auto;
        padding-bottom: 20px;
    }

    /* ফর্মের পর ডেসক্রিপশন সেকশনে গ্যাপ তৈরি করা */
    .description-column {
        margin-top: 30px;
        text-align: center; /* মোবাইলে লেখাগুলো সেন্টারে সুন্দর দেখাবে */
    }

    .description-text {
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    /* মোবাইলে ইমেজের সাইজ এডজাস্ট করা */
    .hero-img {
        height: auto;
        max-height: 250px;
        object-fit: contain;
    }

    /* ডেস্কটপের জন্য থাকা absolute পজিশন মোবাইলে নরমাল করা */
    .reservation-card {
        position: static !important;
        width: 100% !important;
    }
}
    </style>

<section class="hero-section">
    <div class="container">
        <h2 class="mb-3 text-primary fw-bold d-flex justify-content-center">
            BOSTON LOGAN AIRPORT TAXI
        </h2>

        <div class="row hero-row justify-content-center">
            {{-- FORM COLUMN --}}
            <div class="col-lg-5 form-column mb-4 mb-lg-0">
                <div class="reservation-card" id="floatingCard">
                    <div class="form-header">
                        <h3>Booking Reservation</h3>
                        <p>Instant EMAIL Confirmation</p>
                    </div>

                    <form id="reservationForm" action="{{ route('step2') }}" method="GET" novalidate>
                        <input type="hidden" name="extras_total" id="extrasTotalInput" value="0">

                        <div class="p-2 px-3 pb-3">
                            {{-- DATE & TIME --}}
                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="text" id="date" name="date" class="form-control flatpickr-input" placeholder="Date" readonly required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        <select id="time" name="time" class="form-select" required>
                                            <option value="">Time</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- TRIP TYPE --}}
                            <div class="trip-type-container">
                                <div class="trip-option">
                                    <input type="radio" name="tripType" id="type_from" value="fromAirport" checked>
                                    <label class="trip-card" for="type_from"><i class="fas fa-plane-arrival"></i><span>From Airport</span></label>
                                </div>
                                <div class="trip-option">
                                    <input type="radio" name="tripType" id="type_to" value="toAirport">
                                    <label class="trip-card" for="type_to"><i class="fas fa-plane-departure"></i><span>To Airport</span></label>
                                </div>
                                <div class="trip-option">
                                    <input type="radio" name="tripType" id="type_ptp" value="doorToDoor">
                                    <label class="trip-card" for="type_ptp"><i class="fas fa-map-marker-alt"></i><span>Door-to-Door</span></label>
                                </div>
                            </div>

                            {{-- LOCATIONS --}}
                            <div class="mb-2" id="fromLocation"></div>
                            <div class="mb-2" id="toLocation"></div>

                            {{-- PASSENGERS --}}
                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <span class="mini-label">Adults (8+)</span>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        <select name="adults" id="adults" class="form-select" required>
                                            <option value="">Select</option>
                                            @for ($i = 1; $i <= 14; $i++) <option value="{{ $i }}">{{ $i }}</option> @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span class="mini-label">Children (<7)</span>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-child"></i></span>
                                        <select name="children" id="children" class="form-select">
                                            <option value="">Select</option>
                                            @for ($i = 0; $i <= 4; $i++) <option value="{{ $i }}">{{ $i }}</option> @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- LUGGAGE --}}
                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <span class="mini-label">Luggage</span>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-suitcase"></i></span>
                                        <select name="luggage" id="luggage" class="form-select" required>
                                            <option value="">Select</option>
                                            @for ($i = 0; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option> @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span class="mini-label">Child Seats</span>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-chair"></i></span>
                                        <select name="seats_dummy" id="childSeatsTrigger" class="form-select">
                                            <option value="0">Select</option>
                                            @for ($i = 1; $i <= 4; $i++) <option value="{{ $i }}">{{ $i }}</option> @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- EXTRAS SECTION --}}
                            <div>
                                <div class="extras-toggle" id="toggleExtrasBtn">
                                    <i class="fas fa-plus-circle"></i> Add Stops & Specific Seats
                                </div>

                                <div id="extrasSection">
                                    <div class="extra-row">
                                        <div class="extra-label">Stopover <span class="extra-price-tag">{{ $settings->stopover_fee ?? 0 }}</span></div>
                                        <div class="d-flex align-items-center">
                                            <select id="stopover" name="stopover" data-price="{{ $settings->stopover_fee ?? 0 }}" class="form-select form-select-sm" style="width:50px; height:28px; font-size:0.75rem;">
                                                <option value="0">0</option><option value="1">1</option><option value="2">2</option>
                                            </select>
                                            <div id="stopoverDisplay" class="total-price-display">$0</div>
                                        </div>
                                    </div>
                                    <div class="extra-row">
                                        <div class="extra-label">Pets <span class="extra-price-tag">{{ $settings->pet_fee ?? 0 }}</span></div>
                                        <div class="d-flex align-items-center">
                                            <select id="pets" name="pets" data-price="{{ $settings->pet_fee ?? 0 }}" class="form-select form-select-sm" style="width:50px; height:28px; font-size:0.75rem;">
                                                <option value="0">0</option><option value="1">1</option><option value="2">2</option>
                                            </select>
                                            <div id="petsDisplay" class="total-price-display">$0</div>
                                        </div>
                                    </div>
                                    <div class="extra-row">
                                        <div class="extra-label">Infant Seat <span class="extra-price-tag">{{ $settings->child_seat_fee ?? 0 }}</span></div>
                                        <div class="d-flex align-items-center">
                                            <select id="infantSeat" name="infant_seat" data-price="{{ $settings->child_seat_fee ?? 0 }}" class="form-select form-select-sm" style="width:50px; height:28px; font-size:0.75rem;">
                                                <option value="0">0</option><option value="1">1</option><option value="2">2</option>
                                            </select>
                                            <div id="infantSeatDisplay" class="total-price-display">$0</div>
                                        </div>
                                    </div>
                                    <div class="extra-row">
                                        <div class="extra-label">Front Facing <span class="extra-price-tag">{{ $settings->regular_Seat_rules ?? 0 }}</span></div>
                                        <div class="d-flex align-items-center">
                                            <select id="frontSeat" name="front_seat" data-price="{{ $settings->regular_Seat_rules ?? 0 }}" class="form-select form-select-sm" style="width:50px; height:28px; font-size:0.75rem;">
                                                <option value="0">0</option><option value="1">1</option><option value="2">2</option>
                                            </select>
                                            <div id="frontSeatDisplay" class="total-price-display">$0</div>
                                        </div>
                                    </div>
                                    <div class="extra-row">
                                        <div class="extra-label">Booster Seat <span class="extra-price-tag">{{ $settings->booster_seat_fee ?? 0 }}</span></div>
                                        <div class="d-flex align-items-center">
                                            <select id="boosterSeat" name="booster_seat" data-price="{{ $settings->booster_seat_fee ?? 0 }}" class="form-select form-select-sm" style="width:50px; height:28px; font-size:0.75rem;">
                                                <option value="0">0</option><option value="1">1</option><option value="2">2</option>
                                            </select>
                                            <div id="boosterSeatDisplay" class="total-price-display">$0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn-get-fare">Get Fare & Reserve</button>
                            <p class="footer-note">Pay $1 to confirm. Balance after service.</p>
                        </div>
                    </form>
                </div>
            </div>

            {{-- DESCRIPTION / IMAGE --}}
            <div class="col-lg-7 ">
                <div class="description-column">
                    <p class="description-text">
                        One stop solutions for Boston Airport Transfer, Logan Ground Transportation, City Rides, Long
                        Distance Car Services from/to Boston, Door to Door transfers and Chauffeured Cars.
                    </p>
                    <div class="hero-img-wrapper">
                        @if (isset($defaultVehicle['image']) && !empty($defaultVehicle['image']))
                            <img src="{{ asset($defaultVehicle['image']) }}" alt="Vehicle" class="hero-img">
                        @else
                            <img src="{{ asset('images/cap.jpeg') }}" alt="Default Car" class="hero-img">
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- SCRIPTS --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const bostonNow = {
        year: {{ now()->setTimezone('America/New_York')->year }},
        month: {{ now()->setTimezone('America/New_York')->month }} - 1,
        day: {{ now()->setTimezone('America/New_York')->day }},
        hour: {{ now()->setTimezone('America/New_York')->hour }},
        minute: {{ now()->setTimezone('America/New_York')->minute }}
    };
</script>

{{-- LOGIC SCRIPT --}}
<script>
    let mapInitialized = false;
    let placesLib = null;

    async function initMap() {
        try {
            placesLib = await google.maps.importLibrary("places");
            mapInitialized = true;
            if (typeof window.updateTrip === 'function') { window.updateTrip(); }
        } catch (error) { console.error("Google Maps Error:", error); }
    }

    async function initAutocomplete(id) {
        if (!placesLib) { setTimeout(() => initAutocomplete(id), 500); return; }
        const input = document.getElementById(id);
        if (!input) return;
        new placesLib.Autocomplete(input, { types: ["geocode"], componentRestrictions: { country: "us" }, fields: ["address_components", "geometry", "icon", "name"] });
        input.addEventListener('keydown', (e) => { if(e.key === "Enter") e.preventDefault(); });
    }

    document.addEventListener("DOMContentLoaded", () => {
        flatpickr("#date", { minDate: "today", dateFormat: "Y-m-d", disableMobile: true, theme: "light", allowInput: true });

        const adultsSelect = document.getElementById('adults');
        const childrenSelect = document.getElementById('children');
        const luggageSelect = document.getElementById('luggage');

        function updateLuggageOption() {
            const valAdults = parseInt(adultsSelect.value) || 0;
            const valChildren = parseInt(childrenSelect.value) || 0;
            const totalPax = valAdults + valChildren;
            const currentSelectedLuggage = luggageSelect.value;
            if (totalPax === 0) return;
            $.ajax({
                url: "/capacity-luggage", type: "GET", data: { passenger: totalPax }, dataType: "json",
                success: function(response) {
                    const maxLuggage = (response && response.capacity_luggage !== undefined) ? parseInt(response.capacity_luggage) : 12;
                    let html = '<option value="">Select</option>';
                    for (let i = 0; i <= maxLuggage; i++) {
                        let isSelected = (currentSelectedLuggage == i) ? 'selected' : '';
                        html += `<option value="${i}" ${isSelected}>${i}</option>`;
                    }
                    luggageSelect.innerHTML = html;
                },
                error: function() {
                    let html = '<option value="">Select</option>';
                    for (let i = 0; i <= 12; i++) { html += `<option value="${i}">${i}</option>`; }
                    luggageSelect.innerHTML = html;
                }
            });
        }
        if (adultsSelect) adultsSelect.addEventListener('change', updateLuggageOption);
        if (childrenSelect) childrenSelect.addEventListener('change', updateLuggageOption);

        const fromLoc = document.getElementById("fromLocation");
        const toLoc = document.getElementById("toLocation");
        let airports = [];
        $.ajax({ url: "/airports", type: "GET", dataType: "json", success: function(data) { if(Array.isArray(data)) { airports = data; window.updateTrip(); } } });

        function buildAirportSelect(name) {
            let html = `<select name="${name}" class="form-select" required><option value="">Select Airport</option>`;
            airports.forEach(airport => {
                let isSelected = (airport.name.trim() === "Boston Logan International Airport") ? "selected" : "";
                html += `<option value="${airport.id}" data-address="${airport.address}" ${isSelected}>${airport.name}</option>`;
            });
            html += `</select>`;
            return html;
        }

        window.updateTrip = function() {
            const tEl = document.querySelector('input[name="tripType"]:checked');
            if (!tEl) return;
            const t = tEl.value;
            if (t === 'fromAirport') {
                fromLoc.innerHTML = buildAirportSelect("from_airport");
                toLoc.innerHTML = `<input type="text" name="to_address" id="toAddress" class="form-control" placeholder="Drop Off Address" required>`;
                initAutocomplete("toAddress");
                attachAirportSelectEvent("from_airport", "fromAddress");
            } else if (t === 'toAirport') {
                fromLoc.innerHTML = `<input type="text" name="from_address" id="fromAddress" class="form-control" placeholder="Pick Up Address" required>`;
                toLoc.innerHTML = buildAirportSelect("to_airport");
                initAutocomplete("fromAddress");
                attachAirportSelectEvent("to_airport", "toAddress");
            } else {
                fromLoc.innerHTML = `<input type="text" name="from_address" id="fromAddress" class="form-control" placeholder="Pick Up Address" required>`;
                toLoc.innerHTML = `<input type="text" name="to_address" id="toAddress" class="form-control" placeholder="Drop Off Address" required>`;
                initAutocomplete("fromAddress");
                initAutocomplete("toAddress");
            }
        }

        function attachAirportSelectEvent(selectName, inputId) {
            const sel = document.querySelector(`select[name="${selectName}"]`);
            if (!sel) return;
            sel.addEventListener("change", () => {
                const selectedOption = sel.options[sel.selectedIndex];
                if (!selectedOption || !selectedOption.value) return;
                const address = selectedOption.getAttribute("data-address") || "";
                let input = document.getElementById(inputId);
                if (!input) { input = document.createElement("input"); input.type = "hidden"; input.id = inputId; input.name = inputId; sel.parentElement.appendChild(input); }
                input.value = address;
            });
            if (sel.value) sel.dispatchEvent(new Event('change'));
        }
        document.querySelectorAll('input[name="tripType"]').forEach(r => r.addEventListener('change', window.updateTrip));

        const timeSelect = document.getElementById("time");
        for (let h = 0; h < 24; h++) {
            for (let m = 0; m < 60; m += 15) {
                let hh = String(h).padStart(2, '0'); let mmStr = String(m).padStart(2, '0'); let ampm = h < 12 ? 'AM' : 'PM'; let dH = h % 12 || 12;
                timeSelect.innerHTML += `<option value="${hh}:${mmStr}">${dH}:${mmStr} ${ampm}</option>`;
            }
        }

        // ==========================================
        // EXTRAS & VALIDATION
        // ==========================================
        const section = $("#extrasSection");
        const toggleBtn = $("#toggleExtrasBtn");
        const childTrigger = $("#childSeatsTrigger");

        toggleBtn.on("click", function() { section.slideToggle(); });
        childTrigger.on("change", function() {
            if ($(this).val() !== "0") {
                if (section.is(":hidden")) section.slideDown();
            }
        });

        const items = [
            { id: 'stopover', price: {{ $settings->stopover_fee ?? 0 }} },
            { id: 'pets', price: {{ $settings->pet_fee ?? 0 }} },
            { id: 'infantSeat', price: {{ $settings->child_seat_fee ?? 0 }} },
            { id: 'frontSeat', price: {{ $settings->regular_Seat_rules ?? 0 }} },
            { id: 'boosterSeat', price: {{ $settings->booster_seat_fee ?? 0 }} }
        ];

        items.forEach(item => {
            const el = document.getElementById(item.id);
            if (el) {
                el.addEventListener("change", () => {
                    const total = (parseInt(el.value) || 0) * item.price;
                    document.getElementById(item.id + "Display").innerText = "$" + total;
                    calculateTotalExtras();
                });
            }
        });

        function calculateTotalExtras() {
            let total = 0;
            items.forEach(item => { const el = document.getElementById(item.id); if (el) total += (parseInt(el.value) || 0) * item.price; });
            document.getElementById("extrasTotalInput").value = total;
        }

        const form = document.getElementById("reservationForm");
        form.addEventListener("submit", function(e) {
            e.preventDefault();
            let missing = false;
            ["date", "time", "adults", "luggage"].forEach(name => { const el = document.querySelector(`[name="${name}"]`); if (!el || !el.value) missing = true; });
            const fromVal = document.querySelector('[name="from_airport"]')?.value || document.querySelector('[name="from_address"]')?.value;
            const toVal = document.querySelector('[name="to_airport"]')?.value || document.querySelector('[name="to_address"]')?.value;
            if (!fromVal || !toVal) missing = true;

            if (missing) { Swal.fire({ icon: 'warning', title: 'Missing Details', text: 'Please fill in all required fields.', confirmButtonColor: '#d33' }); return; }

            const requiredSeats = parseInt(childTrigger.val()) || 0;
            const vInfant = parseInt(document.getElementById("infantSeat").value) || 0;
            const vFront = parseInt(document.getElementById("frontSeat").value) || 0;
            const vBooster = parseInt(document.getElementById("boosterSeat").value) || 0;

            if (requiredSeats !== (vInfant + vFront + vBooster)) {
                Swal.fire({ icon: 'error', title: 'Selection Mismatch', html: `Selected <b>${requiredSeats}</b> seats but defined <b>${vInfant + vFront + vBooster}</b>.`, confirmButtonColor: '#d33' }); return;
            }

            const dateVal = document.getElementById("date").value;
            const timeVal = document.getElementById("time").value;
            const [selYear, selMonth, selDay] = dateVal.split('-').map(Number);
            const [selHour, selMin] = timeVal.split(':').map(Number);
            const selectedDateTime = new Date(selYear, selMonth - 1, selDay, selHour, selMin);
            const nowBostonDate = new Date(bostonNow.year, bostonNow.month, bostonNow.day, bostonNow.hour, bostonNow.minute);

            if (selectedDateTime < nowBostonDate) { Swal.fire({ icon: 'error', title: 'Invalid Time', text: 'Past date selected.', confirmButtonColor: '#d33' }); return; }

            const minBookingTime = new Date(nowBostonDate.getTime() + 2 * 60 * 60 * 1000);
            if (selectedDateTime < minBookingTime) { Swal.fire({ icon: 'warning', title: 'Time Restriction', text: 'Must book 2 hours in advance.', confirmButtonColor: '#d33' }); return; }

            Swal.fire({ title: 'Processing...', text: 'Checking availability', icon: 'success', timer: 1000, showConfirmButton: false, willClose: () => { form.submit(); } });
        });
    });
</script>

{{-- GOOGLE MAPS API (Loaded LAST to ensure initMap is defined) --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8jlhc5ZRDUU1SHHpxuwFh4dM0Ggq4n2Q&libraries=places&loading=async&callback=initMap" async defer></script>
