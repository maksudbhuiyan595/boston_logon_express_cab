<style>

    /* --- HERO SECTION --- */
    .hero {
        padding: 80px 0;
        background-color: #f9fbfd; /* খুব হালকা ব্যাকগ্রাউন্ড */
        overflow: hidden; /* এনিমেশন স্ক্রিনের বাইরে গেলে হাইড করবে */
    }

    .hero-grid {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
    }

    /* --- LEFT SIDE: TEXT --- */
    .hero-text {
        flex: 1;
        opacity: 0; /* এনিমেশনের জন্য শুরুতে হাইড */
        animation: slideInLeft 1s ease-out forwards;
    }

    .eyebrow-text {
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--brand-blue);
        margin-bottom: 15px;
        display: inline-block;
        background: rgba(0, 123, 255, 0.1);
        padding: 5px 10px;
        border-radius: 4px;
    }

    .hero-text h1 {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.2;
        color: #222;
        margin-bottom: 25px;
    }

    /* --- BUTTON STYLE --- */
    .nav-btn {
        display: inline-block;
        background: var(--brand-blue);
        color: #fff;
        padding: 15px 35px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        box-shadow: 0 10px 20px rgba(0, 123, 255, 0.2);
        transition: all 0.3s ease;
    }

    .nav-btn:hover {
        background: var(--brand-dark);
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0, 123, 255, 0.3);
        color: #fff;
    }

    .nav-btn i { margin-left: 8px; transition: transform 0.3s; }
    .nav-btn:hover i { transform: translateX(5px); } /* অ্যারো আইকন মুভ করবে */

    /* --- BADGES (TRUST SIGNALS) --- */
    .hero-badges {
        margin-top: 40px;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .badge-img {
        height: 45px; /* লোগোগুলোর সাইজ ফিক্সড */
        width: auto;
        object-fit: contain;
        transition: transform 0.3s ease, filter 0.3s;
        filter: grayscale(100%); /* শুরুতে সাদা-কালো */
        opacity: 0.7;
    }

    .badge-img:hover {
        transform: scale(1.1);
        filter: grayscale(0%); /* হোভার করলে কালারফুল */
        opacity: 1;
    }

    /* --- RIGHT SIDE: IMAGE --- */
    .hero-image {
        flex: 1;
        position: relative;
        opacity: 0;
        animation: slideInRight 1s ease-out 0.3s forwards; /* একটু দেরিতে আসবে */
    }

    .hero-image img {
        width: 100%;
        max-width: 600px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        animation: floatImage 4s ease-in-out infinite; /* গাড়িটি ভাসমান মনে হবে */
    }

    /* --- ANIMATIONS KEYFRAMES --- */
    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes floatImage {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* --- MOBILE RESPONSIVE --- */
    @media (max-width: 991px) {
        .hero { padding: 40px 0; }
        .hero-grid { flex-direction: column-reverse; text-align: center; gap: 30px; }
        .hero-text h1 { font-size: 2rem; }
        .hero-badges { justify-content: center; }
        .badge-img { height: 35px; }
    }
</style>

<section class="hero">
    <div class="container hero-grid">

        {{-- Left Content --}}
        <div class="hero-text">
            <span class="eyebrow-text">Looking for a Cab? You're at the right place.</span>

            <h1>Need a Logan Airport Car & Boston Taxi? <br> <span style="color: var(--brand-blue);">Book Boston Express Cab!</span></h1>

            <a href="{{ route("home") }}" class="nav-btn">
                Book Now <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        {{-- Right Image --}}
        <div class="hero-image">
            <img src="{{ asset('images/hero.jpeg') }}" alt="Boston Cab SUV">
        </div>

    </div>
</section>
