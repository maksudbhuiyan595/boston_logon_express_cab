<style>
    .content-section {
        background-color: #fff;
        padding: 40px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .rating-logo {
        height: 120px;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        display: block;
        margin: 0 auto;
    }

    /* --- Mobile Optimization --- */
    @media (max-width: 768px) {
        .content-section {
            padding: 15px 25px; /* টপ-বটম প্যাডিং কমানো হয়েছে */
        }

        .content-section .container {
            padding-left: 2px !important;  /* সাইডের প্যাডিং একদম কমিয়ে আনা হয়েছে */
            padding-right: 2px !important;
            max-width: 100% !important;
            width: 100% !important;
        }

        .ratings-row {
            display: flex !important;
            flex-wrap: nowrap !important; /* এক লাইনেই রাখবে */
            justify-content: space-around !important; /* সমান দূরত্বে লোগো বসাবে */
            gap: 2px !important; /* লোগোগুলোর মাঝখানের গ্যাপ কমিয়ে ২px করা হয়েছে */
            margin: 0 !important;
        }

        .ratings-row > div {
            flex: 1;
            padding: 0 !important;
            min-width: 0; /* ফ্লেক্স আইটেম সঙ্কুচিত হতে বাধা দেবে না */
        }

        .rating-logo {
            /* স্ক্রিন অনুযায়ী লোগো নিজে থেকে বড় হবে, ফিক্সড হাইট ছাড়াই */
            height: auto !important;
            max-height: 70px !important; /* ৪টি লোগোর জন্য ৭০px হচ্ছে সেফ বড় সাইজ */
            width: 95% !important;
            margin: 0 auto;
        }
    }

    /* ৩২০পিএক্স বা অতি ক্ষুদ্র স্ক্রিনের জন্য */
    @media (max-width: 360px) {
        .rating-logo {
            max-height: 55px !important;
        }
    }
</style>
<section class="content-section">
    <div class="container">
        <div class="d-flex flex-nowrap justify-content-between align-items-center ratings-row">

            <div class="text-center">
                <a href="https://www.google.com/search?q=Boston+Express+Cab" target="_blank">
                    <img src="{{ asset('images/google.png') }}" alt="Google Rating" class="rating-logo">
                </a>
            </div>

            <div class="text-center">
                <a href="https://www.trustpilot.com/review/bostonexpresscab.com" target="_blank">
                    <img src="{{ asset('images/Trustpilot.jpeg') }}" alt="Trustpilot" class="rating-logo">
                </a>
            </div>

            <div class="text-center">
                <a href="https://limotrust.org/listing/boston-express-cab-60" target="_blank">
                    <img src="{{ asset('images/lim.png') }}" alt="Limotrust" class="rating-logo">
                </a>
            </div>

            <div class="text-center">
                <a href="https://www.tripadvisor.com/Attraction_Review-g41948-d28108453-Reviews-Boston_Express_Cab-Woburn_Massachusetts.html" target="_blank">
                    <img src="{{ asset('images/trip.png') }}" alt="Tripadvisor" class="rating-logo">
                </a>
            </div>

        </div>
    </div>
</section>
