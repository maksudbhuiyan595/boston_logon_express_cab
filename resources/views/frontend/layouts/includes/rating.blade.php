<style>
    .content-section {
        background-color: #fff;
        padding: 50px 0;
        border-bottom: 1px solid #f0f0f0;
        overflow: hidden;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .rating-logo {
        height: 120px;
        width: auto;
        object-fit: contain;
        max-width: 100%;
        display: block;
        margin: 0 auto;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), filter 0.3s ease;
        filter: grayscale(15%) opacity(0.9);
    }

    .rating-logo:hover {
        transform: scale(1.15) translateY(-5px);
        filter: grayscale(0%) opacity(1) drop-shadow(0 10px 20px rgba(0,0,0,0.1));
    }
    .ratings-row > div {
        opacity: 0;
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .ratings-row > div:nth-child(1) { animation-delay: 0.1s; }
    .ratings-row > div:nth-child(2) { animation-delay: 0.3s; }
    .ratings-row > div:nth-child(3) { animation-delay: 0.5s; }
    .ratings-row > div:nth-child(4) { animation-delay: 0.7s; }

    @media (max-width: 768px) {
        .content-section {
            padding: 30px 5px;
        }

        .rating-logo {
            height: 95px !important;
            filter: none;
        }

        .ratings-row {
            display: flex !important;
            flex-wrap: nowrap !important;
            gap: 5px !important;
            justify-content: space-around !important;
        }

        .ratings-row > div {
            flex: 1;
            padding: 0 5px;
        }
    }

    @media (max-width: 480px) {
        .rating-logo {
            height: 46px !important;
            width: 68px !important;
        }
    }
</style>

<section class="content-section">
    <div class="container">
        <div class="d-flex flex-nowrap justify-content-between align-items-center ratings-row">

            <div class="text-center">
                <a href="https://www.google.com/search?q=Boston+Express+Cab" target="_blank">
                    <img src="{{ asset('images/Google-Rating-1.jpeg') }}" alt="Google Rating" class="rating-logo">
                </a>
            </div>

            <div class="text-center">
                <a href="https://www.trustpilot.com/review/bostonexpresscab.com" target="_blank">
                    <img src="{{ asset('images/Trustpilot.jpeg') }}" alt="Trustpilot" class="rating-logo">
                </a>
            </div>

            <div class="text-center">
                <a href="https://limotrust.org/listing/boston-express-cab-60" target="_blank">
                    <img src="{{ asset('images/Limotrust-1.webp') }}" alt="Limotrust" class="rating-logo">
                </a>
            </div>

            <div class="text-center">
                <a href="https://www.tripadvisor.com/Attraction_Review-g41948-d28108453-Reviews-Boston_Express_Cab-Woburn_Massachusetts.html" target="_blank">
                    <img src="{{ asset('images/Tripadvisor.webp') }}" alt="Tripadvisor" class="rating-logo">
                </a>
            </div>

        </div>
    </div>
</section>
