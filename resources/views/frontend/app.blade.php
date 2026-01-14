<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boston Express Cab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- 1. GLOBAL VARIABLES & RESET --- */
        :root {
            --brand-blue: #1e88e5;
            --brand-dark: #0d47a1;
            --text-dark: #2c3e50;
            --text-light: #607d8b;
            --bg-light: #f4f7f6;
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(0,0,0,0.08);
            --radius: 12px;
            --font-main: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: var(--font-main);
            color: var(--text-dark);
            line-height: 1.6;
            background-color: #fff;
            overflow-x: hidden;
        }

        a { text-decoration: none; color: inherit; transition: all 0.3s ease; }
        ul { list-style: none; }
        img { max-width: 100%; height: auto; display: block; }

        /* Utility Classes */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .section-padding { padding: 80px 0; }
        .text-center { text-align: center; }

        .section-title {
            font-size: 2.2rem;
            color: var(--text-dark);
            margin-bottom: 15px;
            font-weight: 800;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--brand-blue);
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 50px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
        }

        /* --- 2. HEADER & NAVIGATION --- */
        header {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo { display: flex; align-items: center; gap: 12px; }
        .logo-icon-wrapper {
            position: relative;
            width: 80px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo-pin { font-size: 2.8rem; color: var(--brand-blue); }
        .logo-text { display: flex; flex-direction: column; line-height: 1; }
        .brand-top { font-size: 1.4rem; font-weight: 800; color: var(--brand-blue); letter-spacing: 0.5px; text-transform: uppercase; }
        .brand-bottom { font-size: 0.9rem; font-weight: 700; color: var(--text-dark); }

        .nav-menu { display: flex; gap: 20px; align-items: center; margin-top: 15px}
        .nav-link { font-weight: 600; font-size: 0.95rem; color: var(--text-dark); position: relative; }
        .nav-link:hover { color: var(--brand-blue); }

        .nav-btn {
            background: linear-gradient(135deg, var(--brand-blue), var(--brand-dark));
            color: white !important;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(30, 136, 229, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        .nav-btn:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(30, 136, 229, 0.4); }

        .mobile-toggle { display: none; font-size: 1.5rem; cursor: pointer; color: var(--text-dark); }

        /* --- 3. HERO SECTION --- */
        .hero { padding: 80px 0; background: linear-gradient(to right, #ffffff, #f0f8ff); }
        .hero-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center; }

        .eyebrow-text { color: var(--text-light); font-weight: 600; font-size: 1.1rem; margin-bottom: 10px; display: block;}
        .hero-text h1 { font-size: 3rem; color: var(--text-dark); line-height: 1.2; margin-bottom: 25px; font-weight: 800; }

        .hero-image img {
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transform: perspective(1000px) rotateY(-5deg);
            transition: transform 0.5s;
            width: 100%;
        }
        .hero-image:hover img { transform: perspective(1000px) rotateY(0deg); }

        .hero-badges { display: flex; flex-direction: row; gap: 15px; margin-top: 30px; align-items: center; flex-wrap: wrap; }
        .badge-img { height: 40px; object-fit: contain; transition: 0.3s; opacity: 0.8; }
        .badge-img:hover { opacity: 1; }

        /* --- 4. SERVICES CARDS --- */
        .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }

        .service-card {
            background: white;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: 1px solid #eee;
            transition: all 0.4s ease;
        }
        .service-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); border-color: var(--brand-blue); }
        .service-img { width: 100%; height: 200px; object-fit: cover; }
        .service-content { padding: 25px; }
        .service-content h3 { color: var(--brand-blue); font-size: 1.3rem; margin-bottom: 12px; }
        .service-content p { font-size: 0.95rem; color: var(--text-light); }

        /* --- 5. FEATURES --- */
        .features-layout { display: grid; grid-template-columns: 1fr 400px 1fr; gap: 50px; align-items: center; margin-top: 40px; }

        .feature-item {
            background: white;
            padding: 25px;
            border-radius: var(--radius);
            margin-bottom: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            transition: 0.3s;
        }
        .feature-item:hover { transform: translateX(5px); border-left: 4px solid var(--brand-blue); }
        .feature-item h3 { color: var(--brand-blue); font-size: 1.25rem; margin-bottom: 10px; }
        .feature-center-img { width: 100%; height: 500px; object-fit: cover; border-radius: 20px; box-shadow: var(--shadow); }

        /* --- 6. POPULAR CITIES --- */
        .cities-section { background-color: #f0f4f8; }
        .cities-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 15px; margin-top: 40px; }

        .city-tag {
            background: white;
            padding: 12px 20px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: var(--text-dark);
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: 0.3s;
            cursor: pointer;
            justify-content: center;
        }
        .city-tag i { color: #ff5252; }
        .city-tag:hover { background: var(--brand-blue); color: white; transform: scale(1.05); }
        .city-tag:hover i { color: white; }

        .show-more-btn {
            display: block;
            width: fit-content;
            margin: 40px auto 0;
            background: var(--text-dark);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
        }
        .show-more-btn:hover { background: var(--brand-blue); }

        /* --- 7. INFO CONTENT --- */
        .info-section { background: #fff; }
        .info-main-title { color: var(--brand-blue); font-size: 2rem; margin-bottom: 15px; font-weight: 700; }
        .info-subtitle { font-size: 1.2rem; color: var(--text-dark); margin-top: 30px; margin-bottom: 15px; font-weight: 700; }
        .info-list { margin-left: 20px; list-style-type: disc; margin-bottom: 25px; color: var(--text-light); }
        .info-list li { margin-bottom: 10px; }
        .info-list strong { color: var(--text-dark); font-weight: 700; }
        .info-text { margin-bottom: 15px; color: var(--text-light); }

        .city-list-compact {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 10px;
            list-style: none;
            margin: 20px 0 30px 0;
            padding: 0;
        }
        .city-list-compact li {
            color: var(--text-dark);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .city-list-compact li::before { content: "•"; color: var(--brand-blue); font-weight: bold; }

        /* --- 8. BLOG SECTION --- */
        .blog-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px; }
        .blog-card { border: 1px solid #eee; border-radius: 10px; overflow: hidden; background: white; transition: 0.3s; }
        .blog-card:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.05); transform: translateY(-5px); }
        .blog-img { width: 100%; height: 200px; object-fit: cover; background: #ddd; }
        .blog-content { padding: 20px; }
        .blog-cat { background: #333; color: white; padding: 3px 10px; font-size: 0.7rem; text-transform: uppercase; border-radius: 4px; display: inline-block; margin-bottom: 10px; }
        .blog-title { font-size: 1.1rem; font-weight: 700; margin-bottom: 10px; display: block; color: var(--text-dark); line-height: 1.4; }
        .blog-excerpt { font-size: 0.9rem; color: var(--text-light); margin-bottom: 15px; }
        .read-more { font-size: 0.8rem; color: var(--brand-blue); font-weight: bold; text-transform: uppercase; }
        .blog-date { font-size: 0.8rem; color: #999; margin-top: 15px; display: block; border-top: 1px solid #eee; padding-top: 10px; }

        /* --- 9. FOOTER --- */
        footer { background-color: #111; color: #ccc; padding-top: 80px; }
        .footer-intro { text-align: center; max-width: 900px; margin: 0 auto 40px auto; padding: 0 20px; }
        .footer-divider { border-top: 1px solid #333; margin-bottom: 50px; }
        .footer-grid { display: grid; grid-template-columns: 1.2fr 1fr 1fr 1fr; gap: 40px; max-width: 1200px; margin: 0 auto; padding: 0 20px 60px; }
        .footer-col h3 { color: white; font-size: 1.3rem; margin-bottom: 25px; }

        .contact-item { display: flex; gap: 15px; margin-bottom: 15px; align-items: flex-start; color: #bbb; }
        .contact-item i { color: var(--brand-blue); margin-top: 4px; }

        .social-icons { display: flex; gap: 12px; }
        .social-icon { width: 40px; height: 40px; background: #222; display: flex; justify-content: center; align-items: center; border-radius: 4px; color: white; transition: 0.3s; }
        .social-icon:hover { background: var(--brand-blue); }

        /* --- RESPONSIVE / MOBILE DESIGN --- */
       /* --- RESPONSIVE / MOBILE DESIGN --- */
        @media (max-width: 1024px) {

            .header-container {
                justify-content: space-between;
                padding: 10px 20px;
                background: #fff;
                position: relative;
                z-index: 1001;
            }

            /* Hamburger Icon */
            .mobile-toggle {
                display: block;
                font-size: 1.5rem;
                cursor: pointer;
                color: white;
                background: var(--brand-blue);
                padding: 6px 12px;
                border-radius: 6px;
                margin-left: 15px;
                order: 3;
            }

            /* --- FIXED: SLIDE FROM LEFT (Standard Mobile Menu) --- */
            .nav-menu {
                position: fixed;
                top: 75px; /* Header এর ঠিক নিচ থেকে শুরু হবে */
                left: -100%; /* স্ক্রিনের বাম পাশে লুকানো থাকবে */
                width: 100%; /* বা চাইলে 80% দিতে পারেন */
                height: calc(100vh - 75px); /* পুরো হাইট */

                background: var(--brand-blue); /* বা #fff দিতে পারেন যদি সাদা চান */
                color: white;

                display: flex;
                flex-direction: column;
                align-items: flex-start;
                padding: 30px;

                /* বাম থেকে ডানে আসার অ্যানিমেশন */
                transition: left 0.4s ease-in-out;

                z-index: 999;
                border-top: 1px solid rgba(255,255,255,0.1);
                overflow-y: auto;
                box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            }

            /* Active Class: মেনু স্ক্রিনে নিয়ে আসবে */
            .nav-menu.active {
                left: 0;
            }

            .nav-menu li {
                width: 100%;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }

            .nav-link {
                display: block;
                color: #fff; /* টেক্সট কালার সাদা */
                font-size: 1.1rem;
                font-weight: 600;
                text-transform: uppercase;
                padding: 15px 0;
            }

            .nav-link:hover {
                color: var(--brand-dark); /* হোভার কালার */
                padding-left: 10px;
                background: rgba(255,255,255,0.1); /* হালকা ব্যাকগ্রাউন্ড */
            }

            /* Call Button Mobile Style */
            .nav-btn {
                display: flex !important;
                margin-left: auto;
                padding: 8px 15px;
                font-size: 0.9rem;
                order: 2;
            }

            /* Layout Fixes for Body */
            .hero-grid { grid-template-columns: 1fr; text-align: center; gap: 30px; }
            .hero-badges { justify-content: center; }
            .hero-image img { transform: none; max-width: 90%; margin: 0 auto; }
            .features-layout { grid-template-columns: 1fr; gap: 30px; }
            .feature-center-img { height: 300px; order: -1; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }

    </style>
</head>
<body>

    <header>
        <div class="header-container">
            <a href="#" class="logo">
                <div class="logo-icon-wrapper">
                    <img src="{{ asset("images/Boston Express Cab Logo.png") }}" alt="Logo">
                </div>
                {{-- <div class="logo-text">
                    <span class="brand-top">BOSTON</span>
                    <span class="brand-bottom">Express Cab</span>
                </div> --}}
            </a>

            <nav>
                <ul class="nav-menu" id="navMenu">
                    <li><a href="#" class="nav-link">Home</a></li>
                    <li><a href="#" class="nav-link">Pickup Location</a></li>
                    <li><a href="#" class="nav-link">Reservation</a></li>
                    <li><a href="#" class="nav-link">Minivan Taxi</a></li>
                    <li><a href="#" class="nav-link">Long Distance</a></li>
                    <li><a href="#" class="nav-link">Service Area</a></li>
                    <li><a href="#" class="nav-link">Contact</a></li>
                    <li><a href="#" class="nav-link">Blog</a></li>
                </ul>
            </nav>

            <a href="tel:6172306362" class="nav-btn">
                <i class="fa-solid fa-phone"></i> 617-230-6362
            </a>

            <div class="mobile-toggle" onclick="toggleMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>

    @yield('content')

    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-text">
                <span class="eyebrow-text">Looking for a Cab? You're at the right place.</span>
                <h1>Need a Logan airport car & boston taxi? <br> Book Boston Express Cab!</h1>
                <a href="#" class="nav-btn" style="width: fit-content; margin-top: 20px;">Book Now <i class="fa-solid fa-arrow-right"></i></a>

                <div class="hero-badges">
                    <img src="{{ asset('images/Google-Rating-1.webp') }}" alt="Google" class="badge-img">
                     <a href="https://www.tripadvisor.com/Attraction_Review-g60745-d33371741-Reviews-Boston_Logan_Airport_Taxi-Boston_Massachusetts.html" target="_blank">
                        <img src="{{ asset('images/Tripadvisor.webp') }}" alt="Trustpilot" class="badge-img">
                    </a>
                     <a href="https://trustpilot.com/review/bostonloganairporttaxi.com" target="_blank">
                        <img src="{{ asset('images/Trustpilot.webp') }}" alt="TripAdvisor" class="badge-img">
                    </a>
                     <a href="https://biz.yelp.com/r2r/qBKa9HpNhb7tt4h8bCsoqA" target="_blank">
                        <img src="{{ asset('images/Flux_Dev_highresolution_stock_photo_of_Create_an_image_with_th_1.webp') }}" alt="Yelp" class="badge-img">
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset("images/Homepage.jpg") }}" alt="Boston Cab SUV">
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Our Services - What We Do at Boston Express Cab</h2>
                <p class="section-subtitle">
                    Experience unmatched convenience, safety, and personalized service with Boston Express Cab. We ensure unforgettable journeys and seamless transportation solutions.
                </p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <img src="{{ asset("images/Homepage.jpg") }}" alt="Pickup Location" class="service-img">
                    <div class="service-content">
                        <h3>Pickup Location</h3>
                        <p>Meeting Your Driver at Logan Airport. Find your designated ‘Taxi Cab stand’ right outside every airport exit.</p>
                    </div>
                </div>
                <div class="service-card">
                    <img src="{{ asset("images/car Services 2.png") }}" alt="Airport Car Service" class="service-img">
                    <div class="service-content">
                        <h3>Airport Car Service</h3>
                        <p>Enjoy punctual, comfortable airport transfers. Our professional drivers ensure a seamless, stress-free journey.</p>
                    </div>
                </div>
                <div class="service-card">
                    <img src="{{ asset("images/car Services 3.png") }}" alt="Minivan Taxi" class="service-img">
                    <div class="service-content">
                        <h3>Minivan Taxi</h3>
                        <p>For families and student groups, minivans are the best choice of transport. We also provide child-friendly options.</p>
                    </div>
                </div>
                <div class="service-card">
                    <img src="{{ asset("images/Homepage.jpg") }}" alt="Long Distance" class="service-img">
                    <div class="service-content">
                        <h3>Long Distance</h3>
                        <p>Travel from Boston to major Massachusetts cities with ease. Our long-distance rides ensure comfort and convenience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background: #fff;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Our Specialized Features</h2>
                <p class="section-subtitle">
                    Enjoy unmatched convenience, safety, and customization with Boston Express Cab. We ensure seamless travel solutions.
                </p>
            </div>
            <div class="features-layout">
                <div class="features-col-left">
                    <div class="feature-item">
                        <h3>Airport Transfer</h3>
                        <p>Enjoy seamless, reliable airport transfers. Our professional drivers ensure a smooth ride from Logan Airport.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Child Seat</h3>
                        <p>Ensure your little one’s safety with our child seat facility. Secure and comfortable child seats for a stress-free journey.</p>
                    </div>
                </div>
                <div class="features-col-center">
                    <img src="{{ asset("images/Child Seat Service.png") }}" alt="Child Seat" class="feature-center-img">
                </div>
                <div class="features-col-right">
                    <div class="feature-item">
                        <h3>Corporate Taxi Service</h3>
                        <p>Experience reliable transportation with our Corporate Taxi Service. Punctual rides for your business needs.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Hourly Service</h3>
                        <p>Take control of your schedule with our Hourly Service. Flexible and convenient transportation options.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding cities-section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Popular Cities We Serve</h2>
            </div>
            <div class="cities-grid">
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Arlington</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Medford MA</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Wilmington MA</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Worcester Ma</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Woburn MA</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Acton MA</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Nashua</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Bedford MA</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Rochester NH</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Waltham MA</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Belmont Ma</div>
                <div class="city-tag"><i class="fa-solid fa-car-side"></i> Winchester MA</div>
            </div>
            <a href="#" class="show-more-btn">Show More</a>
        </div>
    </section>

    <section class="section-padding info-section">
        <div class="container">
            <h2 class="info-main-title">Efficient and Reliable Boston Airport Taxi Services</h2>
            <h3 class="info-subtitle" style="margin-top: 0;">Stress-Free Airport Transportation</h3>
            <ul class="info-list">
                <li><strong>Relaxing Minivan Rides:</strong> Travel comfortably with spacious minivans.</li>
                <li><strong>Child Seat Safety:</strong> Secure child seats for all ages available.</li>
                <li><strong>Seamless Pick-Up & Drop-Off:</strong> Convenient door-to-door service.</li>
                <li><strong>24/7 Availability:</strong> We’re here whenever you need a ride.</li>
            </ul>

            <h3 class="info-subtitle">Serving the Greater Boston Area</h3>
            <p class="info-text">We offer reliable transportation throughout the Boston metro area, including:</p>

            <ul class="city-list-compact">
                <li>Arlington</li> <li>Belmont</li> <li>Bedford</li> <li>Haverhill</li> <li>Worcester</li>
                <li>Greenfield</li> <li>Somerville</li> <li>Medford</li> <li>Methuen</li> <li>Gloucester</li>
                <li>Boston</li> <li>Lexington</li> <li>Waltham</li> <li>Nashua</li> <li>Beverly</li>
                <li>Stoneham</li> <li>Brookline</li> <li>Jamaica Plain</li> <li>Keene</li>
                <li>West Roxbury</li> <li>Burlington</li> <li>Woburn</li> <li>Andover</li>
                <li>Winchester</li> <li>Lowell</li> <li>Reading</li> <li>Fitchburg MA</li>
            </ul>

            <h3 class="info-subtitle">Book Your Ride Today!</h3>
            <ul class="info-list">
                <li><strong>Hassle-Free Booking:</strong> Reserve online or call 617-230-6362.</li>
                <li><strong>Experienced Drivers:</strong> Safe and comfortable rides.</li>
            </ul>
        </div>
    </section>

    <section class="section-padding" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Latest Blog</h2>
                <div style="width: 50px; height: 3px; background: var(--brand-blue); margin: 0 auto 40px;"></div>
            </div>

            <div class="blog-grid">
                <div class="blog-card">
                    <img src="https://placehold.co/400x250?text=Cinema" alt="Cinema" class="blog-img">
                    <div class="blog-content">
                        <span class="blog-cat">Uncategorized</span>
                        <a href="#" class="blog-title">Discover the Best Heywood Gardner MA Cinema</a>
                        <p class="blog-excerpt">If you are searching for the perfect movie night...</p>
                        <a href="#" class="read-more">Read More »</a>
                        <span class="blog-date">November 4, 2025</span>
                    </div>
                </div>
                <div class="blog-card">
                    <img src="https://placehold.co/400x250?text=Hospital" alt="Hospital" class="blog-img">
                    <div class="blog-content">
                        <span class="blog-cat">Uncategorized</span>
                        <a href="#" class="blog-title">How to Get a Ride to Heywood Hospital</a>
                        <p class="blog-excerpt">Accessibility and reliability matter...</p>
                        <a href="#" class="read-more">Read More »</a>
                        <span class="blog-date">October 30, 2025</span>
                    </div>
                </div>
                <div class="blog-card">
                    <img src="https://placehold.co/400x250?text=Hotels" alt="Hotels" class="blog-img">
                    <div class="blog-content">
                        <span class="blog-cat">Uncategorized</span>
                        <a href="#" class="blog-title">Top Hotels in Fitchburg MA – Best Stays</a>
                        <p class="blog-excerpt">Fitchburg is full of surprises...</p>
                        <a href="#" class="read-more">Read More »</a>
                        <span class="blog-date">October 28, 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-intro">
            <div class="logo" style="justify-content: center; margin-bottom: 20px;">
                <div class="logo-icon-wrapper">
                    <i class="fa-solid fa-location-dot logo-pin" style="font-size: 3rem; color: #fff;"></i>
                    <i class="fa-solid fa-taxi logo-car" style="color: #000;"></i>
                </div>
            </div>
            <p style="line-height: 1.6; color: #ddd;">
                Welcome to Boston Express Cab, your premier transportation provider for the Greater Boston area.
            </p>
        </div>

        <div class="footer-divider"></div>

        <div class="footer-grid">
            <div class="footer-col">
                <h3>Contact Information</h3>
                <div class="contact-item"><i class="fa-solid fa-location-dot"></i> <span>870 Main St, Woburn, MA</span></div>
                <div class="contact-item"><i class="fa-solid fa-phone"></i> <span>617-230-6362</span></div>
                <div class="contact-item"><i class="fa-solid fa-envelope"></i> <span>booking@bostonexpresscab.com</span></div>
            </div>
            <div class="footer-col">
                <h3>Helpful Links</h3>
                <ul style="color: #bbb; line-height: 2;">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pickup Location</a></li>
                    <li><a href="#">Reservation</a></li>
                    <li><a href="#">Minivan Taxi</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>About Us</h3>
                <ul style="color: #bbb; line-height: 2;">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Payment Policy</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Terms</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Social Network</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div style="background: #000; padding: 20px; text-align: center; font-size: 0.9rem; color: #777; border-top: 1px solid #222;">
            Copyright © 2025. Logan Airport Taxi All Rights Reserved | Designed by: Virtual Click USA
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('active');
        }
    </script>
</body>
</html>
