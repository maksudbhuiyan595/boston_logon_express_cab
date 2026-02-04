<style>
    /* --- Section Style --- */
    .content-section {
        background-color: #fff;
        padding: 50px 0;
        border-bottom: 1px solid #f0f0f0;
        overflow: hidden; /* এনিমেশন যেন বাইরে না যায় */
    }

    /* --- Keyframes for Entrance --- */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* --- Logo Styles --- */
    .rating-logo {
        height: 120px; /* হাইট একটু এডজাস্ট করা হয়েছে স্ট্যান্ডার্ড লুকের জন্য */
        width: auto;
        object-fit: contain;
        max-width: 100%;
        display: block;
        margin: 0 auto;

        /* Smooth Transition for Hover */
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), filter 0.3s ease;
        filter: grayscale(20%) opacity(0.9); /* শুরুতে হালকা গ্রেস্কেল */
    }

    /* --- Hover Effects --- */
    .rating-logo:hover {
        transform: scale(1.15) translateY(-5px); /* জুম এবং একটু উপরে উঠবে */
        filter: grayscale(0%) opacity(1) drop-shadow(0 10px 20px rgba(0, 0, 0, 0.15)); /* শ্যাডো এবং ফুল কালার */
    }

    /* --- Animation Staggering (Each item loads one by one) --- */
    .ratings-row > div {
        opacity: 0; /* শুরুতে হাইড থাকবে */
        animation: fadeInUp 0.8s ease-out forwards;
    }

    /* লোগোগুলো একটার পর একটা আসবে */
    .ratings-row > div:nth-child(1) { animation-delay: 0.1s; }
    .ratings-row > div:nth-child(2) { animation-delay: 0.3s; }
    .ratings-row > div:nth-child(3) { animation-delay: 0.5s; }
    .ratings-row > div:nth-child(4) { animation-delay: 0.7s; }


    /* --- Mobile Responsive (Max Width 768px) --- */
    @media (max-width: 768px) {
        .content-section {
            padding: 30px 0;
        }

        .rating-logo {
            height: 45px;
            filter: none; /* মোবাইলে গ্রেস্কেল দরকার নেই */
        }

        .ratings-row {
            gap: 10px !important;
            justify-content: space-around !important; /* মোবাইলে স্পেস ঠিক রাখার জন্য */
        }

        /* মোবাইলে এনিমেশন ডিলে কমানো */
        .ratings-row > div:nth-child(1) { animation-delay: 0s; }
        .ratings-row > div:nth-child(2) { animation-delay: 0.1s; }
        .ratings-row > div:nth-child(3) { animation-delay: 0.2s; }
        .ratings-row > div:nth-child(4) { animation-delay: 0.3s; }
    }
</style>

<section class="content-section">
    <div class="container">

        <div class="d-flex flex-nowrap justify-content-between align-items-center ratings-row">

            {{-- 1. Google --}}
            <div class="text-center">
                <a href="https://www.google.com/search?sca_esv=f96236a721133e6f&cs=0&output=search&kgmid=/g/11wwx58ltt&q=Boston+Express+Cab+-Boston+Car,+Taxi,+SUV+and+Minivan+Service&shndl=30&shem=lcuae,uaasie&source=sh/x/loc/uni/m1/1&kgs=eadcf2dd6bddbfa8">
                    <img src="{{ asset('images/Google-Rating-1.jpeg') }}"
                         alt="Google Rating"
                         class="rating-logo">
                </a>
            </div>

            {{-- 2. Tripadvisor --}}
            <div class="text-center">
                <a href="https://www.trustpilot.com/review/bostonexpresscab.com" target="_blank">
                    <img src="{{ asset('images/Trustpilot.jpeg') }}"
                         alt="Tripadvisor"
                         class="rating-logo">
                </a>
            </div>

            {{-- 3. Trustpilot --}}
            <div class="text-center">
                <a href="https://limotrust.org/listing/boston-express-cab-60" target="_blank">
                    <img src="{{ asset('images/Limotrust-1.webp') }}"
                         alt="Trustpilot"
                         class="rating-logo">
                </a>
            </div>

            {{-- 4. Yelp --}}
            <div class="text-center">
                <a href="https://www.tripadvisor.com/Attraction_Review-g41948-d28108453-Reviews-Boston_Express_Cab-Woburn_Massachusetts.html" target="_blank">
                    <img src="{{ asset('images/Tripadvisor.webp') }}"
                         alt="Yelp"
                         class="rating-logo">
                </a>
            </div>

        </div>
    </div>
</section>
