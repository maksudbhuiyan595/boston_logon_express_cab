@extends('frontend.app')
@section('title', "Long Distance")
@section('content')
<style>
    /* --- FULL WIDTH FIX --- */
    .full-width-section {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }

    /* --- HERO SECTION --- */
    .long-dist-hero {
        /* Using the specific image from your upload */
        background-image: url('images/image_30aaa6.jpg');
        background-size: cover;
        background-position: center;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        position: relative;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6); /* Slightly darker for better text readability */
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 0 15px;
    }

    .hero-subtitle {
        color: #2D9CDB; /* Brand Blue */
        font-size: 1.2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 15px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.8);
    }

    .hero-title {
        font-weight: 800;
        font-size: 3rem;
        margin-bottom: 25px;
        text-shadow: 0 4px 8px rgba(0,0,0,0.8);
        text-transform: capitalize;
        line-height: 1.2;
    }

    /* Call Button */
    .btn-hero-call {
        background-color: #2D9CDB;
        color: white;
        padding: 14px 40px;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(45, 156, 219, 0.4);
        transition: transform 0.3s, background-color 0.3s;
        border: 2px solid #2D9CDB;
    }

    .btn-hero-call:hover {
        background-color: #1a88c3;
        border-color: #1a88c3;
        color: white;
        transform: translateY(-3px);
        text-decoration: none;
    }

    /* --- CONTENT STYLES --- */
    .content-section {
        padding: 60px 0;
        background-color: #ffffff;
        font-family: 'Segoe UI', sans-serif;
        color: #555;
    }

    .lead-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #444;
        margin-bottom: 40px;
    }

    .section-heading {
        color: #2D9CDB;
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
        display: inline-block;
    }

    .section-heading::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background-color: #2D9CDB;
    }

    .sub-heading {
        color: #333;
        font-weight: 700;
        font-size: 1.4rem;
        margin-top: 30px;
        margin-bottom: 15px;
        border-left: 4px solid #2D9CDB;
        padding-left: 15px;
    }

    /* Destination Cards */
    .destination-card {
        background: #f9f9f9;
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s;
    }

    .destination-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-top: 3px solid #2D9CDB;
    }

    .dest-title {
        color: #2D9CDB;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .travel-time {
        font-size: 0.9rem;
        font-weight: 700;
        color: #555;
        margin-top: 10px;
        display: block;
    }

    /* Lists */
    .styled-list {
        list-style: none;
        padding-left: 0;
    }

    .styled-list li {
        margin-bottom: 10px;
        padding-left: 25px;
        position: relative;
    }

    .styled-list li::before {
        content: '\f058'; /* FontAwesome Check Circle */
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: #2D9CDB;
    }

    /* Feature Image */
    .feature-image {
        width: 100%;
        border-radius: 12px;
        margin: 30px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        object-fit: cover;
        height: 400px;
    }

    /* Sidebar */
    .sidebar-box {
        text-align: center;
        background: #fff;
        padding: 30px 20px;
        border-radius: 12px;
        border: 1px solid #f0f0f0;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }

    .sidebar-box h5 {
        color: #333;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .trust-img {
        max-width: 150px;
        height: auto;
        margin-bottom: 15px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        transition: transform 0.3s;
    }
    .trust-img:hover { transform: scale(1.05); }

    /* Category Icon */
    .cat-icon {
        color: #2D9CDB;
        margin-right: 8px;
    }
</style>

<div class="full-width-section long-dist-hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h2 class="hero-subtitle">Reliable & Comfortable</h2>
        <h1 class="hero-title">Long Distance Car Service</h1>
        <a href="tel:6172306362" class="btn-hero-call">
            <i class="fas fa-phone-alt"></i> Call: 617-230-6362
        </a>
    </div>
</div>

<section class="content-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 pr-lg-5">

                <p class="lead-text">
                    At <strong>Boston Express Cab</strong>, we pride ourselves on offering reliable and comfortable long distance car services from Logan Airport to several major cities across Massachusetts and Rhode Island. Whether you are traveling for business or leisure, we ensure a smooth and enjoyable ride to your destination.
                </p>

                <h2 class="section-heading">Popular Destinations</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="destination-card">
                            <h4 class="dest-title">Hyannis Car Service</h4>
                            <p>Travel comfortably to Hyannis. Stops: Cape Cod Mall, JFK Hyannis Museum, Harbor.</p>
                            <span class="travel-time"><i class="far fa-clock"></i> Travel time: 1.5 - 2 hours</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="destination-card">
                            <h4 class="dest-title">Worcester</h4>
                            <p>Known for its bustling arts scene. Don’t miss the Worcester Art Museum and Elm Park.</p>
                            <span class="travel-time"><i class="far fa-clock"></i> Travel time: ~1 hour</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="destination-card">
                            <h4 class="dest-title">Provincetown</h4>
                            <p>Scenic ride to P-town. Highlights: Art Association, Pilgrim Monument, Herring Cove.</p>
                            <span class="travel-time"><i class="far fa-clock"></i> Travel time: 2 - 2.5 hours</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="destination-card">
                            <h4 class="dest-title">Newport, RI</h4>
                            <p>Luxury travel to Newport. See The Breakers, Cliff Walk, and Tennis Hall of Fame.</p>
                            <span class="travel-time"><i class="far fa-clock"></i> Travel time: 1.5 - 2 hours</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="destination-card">
                            <h4 class="dest-title">Boston to NYC</h4>
                            <p>Travel in comfort to New York City. Times Square, Central Park, Broadway.</p>
                            <span class="travel-time"><i class="far fa-clock"></i> Travel time: 4 - 5 hours</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="destination-card">
                            <h4 class="dest-title">Portland, Maine</h4>
                            <p>Reliable service to Portland. Visit Old Port, Portland Head Light, Arts District.</p>
                            <span class="travel-time"><i class="far fa-clock"></i> Travel time: ~2 hours</span>
                        </div>
                    </div>
                </div>

                <img src="images/image_17b942.jpg" alt="Luxury Car Service" class="feature-image">

                <h2 class="section-heading mt-5">Top Places to Visit</h2>

                <h3 class="sub-heading">Worcester & Springfield</h3>
                <ul class="styled-list">
                    <li><strong>Worcester Art Museum:</strong> Houses over 35,000 pieces of art.</li>
                    <li><strong>EcoTarium:</strong> An indoor-outdoor science and nature museum.</li>
                    <li><strong>Basketball Hall of Fame (Springfield):</strong> A must-visit for sports enthusiasts.</li>
                    <li><strong>Forest Park:</strong> One of the largest urban parks in the U.S.</li>
                </ul>

                <h3 class="sub-heading">Providence & Newport (RI)</h3>
                <ul class="styled-list">
                    <li><strong>WaterFire (Providence):</strong> Award-winning sculpture on the rivers of downtown.</li>
                    <li><strong>Roger Williams Park Zoo:</strong> One of the oldest zoos in the country.</li>
                    <li><strong>The Breakers (Newport):</strong> A grand mansion with stunning architecture.</li>
                    <li><strong>Cliff Walk:</strong> A scenic coastal trail.</li>
                </ul>

                <h3 class="sub-heading">Cape Cod (Hyannis & Provincetown)</h3>
                <ul class="styled-list">
                    <li><strong>JFK Hyannis Museum:</strong> Dedicated to the 35th president.</li>
                    <li><strong>Pilgrim Monument:</strong> Commemorates the Mayflower Pilgrims.</li>
                    <li><strong>Herring Cove Beach:</strong> A perfect spot for relaxation.</li>
                </ul>

                <h2 class="section-heading mt-5">Recommended Hotels</h2>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="styled-list">
                            <li><strong>Worcester:</strong> Beechwood Hotel, AC Hotel by Marriott.</li>
                            <li><strong>Springfield:</strong> Sheraton Monarch Place, Hampton Inn & Suites.</li>
                            <li><strong>Providence:</strong> Graduate Providence, Providence Biltmore.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="styled-list">
                            <li><strong>Hyannis:</strong> Anchor In Distinctive Waterfront, Cape Codder Resort.</li>
                            <li><strong>Provincetown:</strong> Crowne Pointe Historic Inn, Harbor Hotel.</li>
                            <li><strong>Newport:</strong> The Chanler at Cliff Walk, Newport Marriott.</li>
                        </ul>
                    </div>
                </div>

                <h2 class="section-heading mt-5">Activities & Getaways</h2>
                <div class="row">
                    <div class="col-12 mb-3">
                        <h4 class="dest-title"><i class="fas fa-child cat-icon"></i> Family Activities</h4>
                        <p class="small text-muted">Enjoy without disturbance.</p>
                        <ul class="styled-list">
                            <li><strong>Fun for Kids:</strong> EcoTarium (Worcester), Six Flags New England (Springfield), Providence Children’s Museum.</li>
                            <li><strong>Nature & Animals:</strong> Roger Williams Park Zoo, ZooQuarium (Hyannis), Whale Watching (Provincetown).</li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <h4 class="dest-title"><i class="fas fa-heart cat-icon"></i> Couple Getaways</h4>
                        <p class="small text-muted">Spend quality time and make memories.</p>
                        <ul class="styled-list">
                            <li><strong>Romantic Dining:</strong> O’Connor’s Restaurant (Worcester), The Rooftop at Providence G.</li>
                            <li><strong>Scenic Walks:</strong> Kalmus Beach (Hyannis), Art’s Dune Tours (Provincetown), Cliff Walk (Newport).</li>
                            <li><strong>Culture:</strong> Springfield Symphony Orchestra, Tuckerman Hall.</li>
                        </ul>
                    </div>
                </div>

                <div class="mt-5 p-4" style="background: #f0f8ff; border-radius: 10px; border-left: 5px solid #2D9CDB;">
                    <h3 style="color: #2D9CDB; font-weight: 700;">Other Services Offered</h3>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <ul class="styled-list">
                                <li><strong>Airport Transfers:</strong> Efficient rides to/from Logan Airport.</li>
                                <li><strong>Business Travel:</strong> Reliable transport for professionals.</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="styled-list">
                                <li><strong>Personal Travel:</strong> Convenient rides for leisure.</li>
                                <li><strong>Special Requests:</strong> Customized travel solutions.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="mt-4 text-muted">
                    Embark on your next adventure with Boston Express Cab. Whether you’re traveling with family or exploring new destinations, we’ve got you covered.
                </p>

            </div>

            <div class="col-lg-4">

                <div class="sidebar-box p-0 border-0" style="background: transparent; box-shadow: none;">
                    <div style="background: #2D9CDB; color: white; padding: 30px; border-radius: 12px; text-align: center;">
                        <h4 style="font-weight: 700; margin-bottom: 10px;">Book Your Ride</h4>
                        <p class="mb-3">Instant confirmation & support</p>
                        <a href="tel:6172306362" style="color: white; font-weight: 800; font-size: 1.4rem; text-decoration: none;">
                            <i class="fas fa-phone-alt"></i> 617-230-6362
                        </a>
                    </div>
                </div>

                <div class="sidebar-box sticky-top" style="top: 100px;">
                    <h5>Top Rated Service</h5>
                    <img src="images/Google-Rating-1.webp" alt="Google Reviews" class="trust-img">
                    <img src="images/Tripadvisor.webp" alt="Tripadvisor" class="trust-img">
                    <img src="images/Trustpilot.webp" alt="Trustpilot" class="trust-img">
                    <img src="images/Flux_Dev_highresolution_stock_photo_of_Create_an_image_with_th_1.webp" alt="LimoTrust" class="trust-img">
                    <p class="text-muted small mt-3">Trusted by thousands of travelers in Boston.</p>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
