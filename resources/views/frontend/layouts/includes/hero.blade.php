<style>
    .hero {
        padding: 80px 0;
        background-color: #f9fbfd;
        overflow: hidden;
    }

    .hero-grid {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
    }
    .hero-text {
        flex: 1;
        opacity: 0;
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

    .hero-text h2 {
        /* font-size: 3rem; */
        font-weight: 800;
        line-height: 1.2;
        color: #222;
        margin-bottom: 25px;
    }

    .hero-badges {
        margin-top: 40px;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .badge-img {
        height: 45px;
        width: auto;
        object-fit: contain;
        transition: transform 0.3s ease, filter 0.3s;
        filter: grayscale(100%);
        opacity: 0.7;
    }

    .badge-img:hover {
        transform: scale(1.1);
        filter: grayscale(0%);
        opacity: 1;
    }
    .hero-image {
        flex: 1;
        position: relative;
        opacity: 0;
        animation: slideInRight 1s ease-out 0.3s forwards;
    }

    .hero-image img {
        width: 100%;
        max-width: 600px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        animation: floatImage 4s ease-in-out infinite;
    }
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
        <div class="hero-text">
            <span class="eyebrow-text">Looking for a Cab? You're at the right place.</span>
            <h2>Need a Logan Airport Car & Boston Taxi? <br> <span style="color: var(--brand-blue);">Book Boston Express Cab!</span></h2>
            <a href="{{ route("home") }}" class="btn-primary">
                Book Now <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/childseat.jpeg') }}" alt="Boston Logan Airport Car Service">
        </div>
    </div>
</section>
