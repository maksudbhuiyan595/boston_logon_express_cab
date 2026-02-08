<style>
    /* --- SECTION STYLES --- */
    .cities-section {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    /* --- CUSTOM TITLE DESIGN --- */
    .custom-title {
        color: #007bff;
        font-weight: 800;
        font-size: 2.2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 50px;
        text-align: center;
    }

    .custom-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background-color: #007bff;
        border-radius: 2px;
    }

    /* --- CITIES GRID (Desktop to Mobile ২ কলাম) --- */
    .cities-grid {
        display: grid;
        gap: 20px;
        grid-template-columns: repeat(4, 1fr);
    }

    /* --- Tablet (991px to 769px) --- */
    @media (max-width: 991px) {
        .cities-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
    }

    /* --- Mobile (768px and below) --- */
    @media (max-width: 768px) {
        .cities-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .custom-title {
            font-size: 1.6rem;
            margin-bottom: 35px;
        }

        .city-card {
            padding: 10px 12px !important; 
            gap: 10px !important;
        }

        .icon-box {
            width: 30px !important;
            height: 30px !important;
        }

        .city-name {
            font-size: 0.85rem !important;
        }
    }

    /* --- CITY CARD DESIGN --- */
    .city-link {
        text-decoration: none !important;
        color: inherit;
        display: block;
    }

    .city-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        padding: 15px 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        border-left: 4px solid #007bff;
        transition: all 0.3s ease;
        height: 100%;
    }

    .city-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.15);
        background-color: #ffffff;
    }

    .icon-box {
        width: 35px;
        height: 35px;
        background-color: #e3f2fd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .icon-box i {
        color: #007bff;
        font-size: 0.9rem;
    }

    .city-name {
        font-size: 1rem;
        font-weight: 600;
        color: #333;
        margin: 0;
        word-wrap: break-word;
    }

    /* --- BUTTON STYLES --- */
    .btn-wrapper {
        text-align: center;
        margin-top: 40px;
    }

    .show-more-btn {
        display: inline-block;
        padding: 12px 35px;
        border: 2px solid #007bff;
        border-radius: 50px;
        color: #007bff;
        font-weight: 700;
        text-decoration: none;
        transition: 0.3s;
    }

    .show-more-btn:hover {
        background: #007bff;
        color: #fff;
    }
</style>
<section class="cities-section">
    <div class="container">
        <h2 class="custom-title">Popular Cities We Serve</h2>
        <div class="cities-grid">
            @foreach ($cities as $city)
                <a href="{{ route('dynamic.route', $city->url) }}" class="city-link">
                    <div class="city-card">
                        <div class="icon-box">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <p class="city-name">{{ $city->name }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        @if ($cities->count() >= 8)
            <div class="btn-wrapper">
                <a href="{{ route('area.we.serve') }}" class="show-more-btn">
                    Show More <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
        @endif
    </div>
</section>
