<style>
    /* --- SECTION STYLES --- */
    .cities-section {
        padding: 80px 0;
        background-color: #f8f9fa; /* হালকা ব্যাকগ্রাউন্ড */
    }

    /* --- CUSTOM TITLE DESIGN --- */
    .custom-title {
        color: var(--brand-blue, #007bff);
        font-weight: 800;
        font-size: 2.2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 50px;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }

    .custom-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background-color: var(--brand-blue, #007bff);
        border-radius: 2px;
    }

    /* --- CITIES GRID --- */
    .cities-grid {
        display: grid;
        gap: 20px;
        margin-bottom: 40px;
        grid-template-columns: repeat(4, 1fr); /* Desktop: 4 Columns */
    }

    /* Tablet: 3 Columns */
    @media (max-width: 991px) {
        .cities-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Mobile: 2 Columns */
    @media (max-width: 576px) {
        .cities-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .custom-title {
            font-size: 1.8rem;
        }
    }

    /* --- CITY CARD DESIGN --- */
    .city-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        padding: 15px;
        display: flex;
        align-items: center;
        gap: 15px;
        border-left: 5px solid var(--brand-blue, #007bff); /* বামে নীল বর্ডার */
        transition: all 0.3s ease;
        cursor: pointer;
        overflow: hidden;
    }

    .city-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 123, 255, 0.15);
    }

    /* ICON BOX */
    .icon-box {
        width: 40px;
        height: 40px;
        background-color: #e3f2fd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .icon-box i {
        color: var(--brand-blue, #007bff);
        font-size: 1rem;
    }

    /* CITY NAME TEXT */
    .city-name {
        font-size: 0.95rem;
        font-weight: 600;
        color: #333;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* --- SHOW MORE BUTTON --- */
    .btn-wrapper {
        text-align: center;
        margin-top: 20px;
    }

    .show-more-btn {
        display: inline-block;
        background: transparent;
        color: var(--brand-blue, #007bff);
        border: 2px solid var(--brand-blue, #007bff);
        padding: 10px 35px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .show-more-btn:hover {
        background: var(--brand-blue, #007bff);
        color: #fff;
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2);
    }
</style>

<section class="cities-section">
    <div class="container">

        {{-- Title Centered with d-flex --}}
        <h2 class="d-flex justify-content-center custom-title">
            Popular Cities We Serve
        </h2>

        <div class="cities-grid">
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Medford MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Acton MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Waltham MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Haverhill MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Wilmington MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Nashua</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Belmont MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Burlington</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Worcester MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Bedford MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Winchester MA</span>
            </div>
            <div class="city-card">
                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                <span class="city-name">Andover MA</span>
            </div>
        </div>

        {{-- Button Centered --}}
        <div class="btn-wrapper">
            <a href="#" class="show-more-btn">Show More <i class="fa-solid fa-arrow-right ms-2"></i></a>
        </div>

    </div>
</section>
