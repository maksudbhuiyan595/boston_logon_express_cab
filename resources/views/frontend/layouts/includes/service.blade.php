<style>
    /* --- SECTION PADDING & BG --- */
    .section-padding {
        padding: 80px 0;
        background-color: #f8f9fa; /* হালকা ধূসর ব্যাকগ্রাউন্ড */
    }

    /* --- SECTION HEADINGS --- */
    .section-title {
        color: var(--brand-blue, #007bff);
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: var(--brand-blue, #007bff);
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .section-subtitle {
        color: #555;
        font-size: 1.05rem;
        max-width: 700px;
        margin: 0 auto 50px;
        line-height: 1.6;
    }

    /* --- SERVICES GRID --- */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* ডেস্কটপে ৪টি কলাম */
        gap: 30px;
    }

    /* --- SERVICE CARD STYLE --- */
    .service-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #eee;
        height: 100%; /* কার্ডগুলো সমান উচ্চতার হবে */
        display: flex;
        flex-direction: column;
    }

    .service-card:hover {
        transform: translateY(-10px); /* হোভার করলে উপরে উঠবে */
        box-shadow: 0 20px 40px rgba(0, 123, 255, 0.15);
        border-color: rgba(0, 123, 255, 0.2);
    }

    /* --- CARD IMAGE --- */
    .service-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    /* ইমেজে জুম ইফেক্ট */
    .service-card:hover .service-img {
        transform: scale(1.05);
    }

    /* --- CARD CONTENT --- */
    .service-content {
        padding: 25px;
        text-align: center;
        flex-grow: 1; /* কন্টেন্ট এরিয়া ফ্লেক্সিবল হবে */
        display: flex;
        flex-direction: column;
    }

    .service-content h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 15px;
        position: relative;
        padding-bottom: 15px;
    }

    /* টাইটেলের নিচে ছোট লাইন */
    .service-content h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 3px;
        background: var(--brand-blue, #007bff);
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .service-card:hover .service-content h3::after {
        width: 60px; /* হোভারে লাইন বড় হবে */
    }

    .service-content p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* =========================================
       RESPONSIVE DESIGN
    ========================================= */

    /* Laptop/Tablet (Medium Screens): 2 Columns */
    @media (max-width: 991px) {
        .services-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
        .section-title { font-size: 2rem; }
    }

    /* Mobile (Small Screens): 1 Column */
   /* Mobile (Small Screens): 1 Column */
    @media (max-width: 576px) {
        .services-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .section-padding { padding: 50px 0; }
        .section-title { font-size: 1.8rem; }

        /* CHANGE: Set height to auto so the full image shows without cropping */
        .service-img {
            height: 220px;
            aspect-ratio: 16 / 9; /* Optional: Keeps a nice rectangular shape */
        }

        .service-content { padding: 20px; }
    }
</style>

<section class="section-padding">
    <div class="container">

        <div class="text-center">
            <h2 class="section-title">Our Services - What We Do at Boston Express Cab</h2>
            <p class="section-subtitle">
                Experience unmatched convenience, safety, and personalized service with Boston Express Cab. We ensure unforgettable journeys and seamless transportation solutions.
            </p>
        </div>

        <div class="services-grid">

            {{-- Service 1 --}}
            <div class="service-card">
                <div style="overflow: hidden;"> <img src="{{ asset("images/home3.jpeg") }}" alt="Pickup Location" class="service-img">
                </div>
                <div class="service-content">
                    <h3>Pickup Location</h3>
                    <p>Meeting Your Driver at Logan Airport. Find your designated ‘Taxi Cab stand’ right outside every airport exit.</p>
                </div>
            </div>

            {{-- Service 2 --}}
            <div class="service-card">
                <div style="overflow: hidden;">
                    <img src="{{ asset("images/home7.jpeg") }}" alt="Airport Car Service" class="service-img">
                </div>
                <div class="service-content">
                    <h3>Airport Car Service</h3>
                    <p>Enjoy punctual, comfortable airport transfers. Our professional drivers ensure a seamless, stress-free journey.</p>
                </div>
            </div>

            {{-- Service 3 --}}
            <div class="service-card">
                <div style="overflow: hidden;">
                    <img src="{{ asset("images/home4.jpeg") }}" alt="Minivan Taxi" class="service-img">
                </div>
                <div class="service-content">
                    <h3>Minivan Taxi</h3>
                    <p>For families and student groups, minivans are the best choice of transport. We also provide child-friendly options.</p>
                </div>
            </div>

            {{-- Service 4 --}}
            <div class="service-card">
                <div style="overflow: hidden;">
                    <img src="{{ asset("images/home5.jpeg") }}" alt="Long Distance" class="service-img">
                </div>
                <div class="service-content">
                    <h3>Long Distance</h3>
                    <p>Travel from Boston to major Massachusetts cities with ease. Our long-distance rides ensure comfort and convenience.</p>
                </div>
            </div>

        </div>
    </div>
</section>
