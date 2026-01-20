<style>
    /* --- SECTION STYLES --- */
    .section-padding {
        padding: 80px 0;
        background-color: #fff;
    }

    /* --- TITLES (LEFT ALIGNED) --- */
    .info-main-title {
        text-align: left; /* বামে */
        color: var(--brand-blue, #007bff);
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 50px;
        position: relative;
        line-height: 1.3;
    }

    /* আন্ডারলাইন বামে */
    .info-main-title::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background: var(--brand-blue, #007bff);
        margin: 15px 0 0 0; /* বামে ফিক্সড */
        border-radius: 2px;
    }

    .info-subtitle {
        color: #333;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 25px;
        margin-top: 40px;
        display: flex;
        align-items: center;
        justify-content: flex-start; /* বামে */
        gap: 12px;
    }

    .info-subtitle i { color: var(--brand-blue, #007bff); font-size: 1.4rem; }
    .info-text { color: #555; line-height: 1.7; margin-bottom: 25px; font-size: 1rem; text-align: left; }

    /* --- FEATURE CARDS GRID --- */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .feature-card {
        background: #f8f9fa;
        padding: 25px 20px;
        border-radius: 12px;
        border-bottom: 4px solid var(--brand-blue, #007bff);
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        text-align: left; /* বামে */
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        background: #fff;
    }

    .feature-title { font-weight: 700; color: #222; margin-bottom: 10px; font-size: 1.1rem; display: flex; align-items: center; }
    .feature-desc { font-size: 0.95rem; color: #666; margin: 0; line-height: 1.5; }

    /* --- CITY TAGS GRID (LEFT ALIGNED & NO DOTS) --- */
    .city-list-compact {
        display: grid;
        gap: 10px;
        padding: 0;
        margin-top: 20px;
        list-style: none; /* ডট রিমুভ */
        margin-left: 0;
    }

    /* Responsive Columns */
    @media (min-width: 1200px) { .city-list-compact { grid-template-columns: repeat(6, 1fr); } }
    @media (min-width: 768px) and (max-width: 1199px) { .city-list-compact { grid-template-columns: repeat(4, 1fr); } }
    @media (max-width: 767px) { .city-list-compact { grid-template-columns: repeat(2, 1fr); } }

    .city-item {
        background: #eef7ff;
        color: var(--brand-blue, #007bff);
        padding: 10px 15px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        text-align: left; /* বামে */
        border: 1px solid transparent;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: flex-start; /* কন্টেন্ট বাম থেকে শুরু */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .city-item i { margin-right: 8px; font-size: 0.85rem; opacity: 0.9; }

    .city-item:hover {
        background: var(--brand-blue, #007bff);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
    }

    .city-item:hover i { color: #fff; opacity: 1; }

    /* --- CTA BOX (LEFT ALIGNED) --- */
    .cta-box {
        background: linear-gradient(135deg, #ffffff 0%, #f4f7f6 100%);
        padding: 40px;
        border-radius: 16px;
        margin-top: 50px;
        text-align: left; /* বামে */
        border: 1px solid #e0e0e0;
        box-shadow: 0 10px 25px rgba(0,0,0,0.03);
    }

    .cta-list {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: flex-start; /* বামে */
        gap: 40px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .cta-item { font-size: 1.1rem; color: #444; display: flex; align-items: center; gap: 8px; }
    .phone-link { color: var(--brand-blue, #007bff); font-weight: 800; text-decoration: none; font-size: 1.2rem; }
    .phone-link:hover { text-decoration: underline; color: #0056b3; }

    /* --- MOBILE FIXES --- */
    @media (max-width: 768px) {
        .section-padding { padding: 40px 0; }
        .info-main-title { font-size: 1.6rem; margin-bottom: 30px; }
        .features-grid { grid-template-columns: 1fr; gap: 15px; }
        .cta-list { flex-direction: column; gap: 15px; }
    }
</style>

<section class="section-padding info-section">
    <div class="container">

        <h2 class="info-main-title">Efficient and Reliable Boston Airport Taxi Services</h2>

        {{-- Features Section --}}
        <h3 class="info-subtitle" style="margin-top: 0;">
            <i class="fas fa-car-side"></i> Stress-Free Airport Transportation
        </h3>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-shuttle-van text-primary me-2"></i> Relaxing Minivan Rides</div>
                <p class="feature-desc">Travel comfortably with spacious minivans tailored for groups and luggage.</p>
            </div>
            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-baby-carriage text-primary me-2"></i> Child Seat Safety</div>
                <p class="feature-desc">Secure child seats available for all ages to ensure maximum safety for your little ones.</p>
            </div>
            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-door-open text-primary me-2"></i> Seamless Pick-Up</div>
                <p class="feature-desc">Convenient door-to-door service without any delays. We track your flight.</p>
            </div>
            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-clock text-primary me-2"></i> 24/7 Availability</div>
                <p class="feature-desc">We’re here whenever you need a ride, day or night, rain or shine.</p>
            </div>
        </div>

        {{-- Cities Section --}}
        <h3 class="info-subtitle">
            <i class="fas fa-map-marked-alt"></i> Serving the Greater Boston Area
        </h3>
        <p class="info-text">We offer reliable transportation throughout the Boston metro area, including:</p>

        {{-- City Grid with Location Icons --}}
        <ul class="city-list-compact">
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Arlington</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Belmont</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Bedford</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Haverhill</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Worcester</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Greenfield</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Somerville</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Medford</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Methuen</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Gloucester</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Boston</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Lexington</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Waltham</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Nashua</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Beverly</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Stoneham</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Brookline</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Jamaica Plain</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Keene</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> West Roxbury</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Burlington</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Woburn</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Andover</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Winchester</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Lowell</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Reading</li>
            <li class="city-item"><i class="fas fa-map-marker-alt"></i> Fitchburg MA</li>
        </ul>

        {{-- CTA Section --}}
        <div class="cta-box">
            <h3 class="info-subtitle" style="margin-top:0; margin-bottom: 10px;">Book Your Ride Today!</h3>
            <ul class="cta-list">
                <li class="cta-item">
                    <i class="fas fa-check-circle text-success"></i>
                    <span>Hassle-Free Booking: Reserve online or call <a href="tel:6172306362" class="phone-link">617-230-6362</a></span>
                </li>
                <li class="cta-item">
                    <i class="fas fa-user-shield text-success"></i>
                    <span>Experienced Drivers: Safe and comfortable rides.</span>
                </li>
            </ul>
        </div>

    </div>
</section>
