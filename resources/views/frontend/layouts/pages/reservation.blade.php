@extends('frontend.app')
@section('title', "Reservation")
@section('content')
    <style>
        /* --- HERO SECTION --- */
        .reservation-hero {
            position: relative;
            width: 100vw;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            height: 450px;
            background: url('images/cab5.jpeg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            /* Slightly darker for better text contrast */
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 0 20px;
        }

        .hero-subtitle {
            color: #2D9CDB;
            /* Logo Color */
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-title {
            color: #ffffff;
            font-weight: 800;
            font-size: 3.5rem;
            margin-bottom: 25px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        /* BUTTON UPDATED TO LOGO COLOR */
        .btn-hero-call {
            background-color: #2D9CDB;
            /* Logo Blue */
            color: white;
            padding: 14px 40px;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(45, 156, 219, 0.5);
            /* Blue Shadow */
            transition: all 0.3s ease;
            display: inline-block;
            border: 2px solid #2D9CDB;
        }

        .btn-hero-call:hover {
            background-color: #1a88c3;
            /* Darker Blue on Hover */
            border-color: #1a88c3;
            color: white;
            transform: translateY(-3px);
            text-decoration: none;
            box-shadow: 0 6px 20px rgba(45, 156, 219, 0.6);
        }

        /* --- PAGE LAYOUT --- */
        .page-wrapper {
            padding: 60px 0;
            background-color: #ffffff;
        }

        .section-heading {
            color: #333;
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .section-divider {
            width: 60px;
            height: 4px;
            background-color: #2D9CDB;
            /* Logo Color */
            margin-bottom: 30px;
        }

        /* --- FEATURE CARDS --- */
        .feature-card {
            background: #f9f9f9;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            border-top: 4px solid #2D9CDB;
            /* Logo Color Accent */
        }
        .feature-title {
            color: #2D9CDB;
            /* Logo Color */
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .feature-text {
            color: #555;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .step-list {
            list-style: none;
            padding: 0;
            counter-reset: step-counter;
        }
        .step-list li {
            position: relative;
            padding-left: 50px;
            margin-bottom: 20px;
            color: #555;
        }
        .step-list li::before {
            counter-increment: step-counter;
            content: counter(step-counter);
            position: absolute;
            left: 0;
            top: 0;
            width: 35px;
            height: 35px;
            background-color: #2D9CDB;
            /* Logo Color */
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 35px;
            font-weight: bold;
        }
        .faq-container {
            margin-top: 50px;
        }
        .faq-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }
        .faq-question {
            font-weight: 700;
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .faq-question i {
            color: #2D9CDB;
            /* Logo Color */
            margin-right: 8px;
        }
        .faq-answer {
            color: #666;
            padding-left: 25px;
            line-height: 1.6;
        }
        /* --- SIDEBAR --- */
        .sidebar-box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
            text-align: center;
        }
        .sidebar-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            font-size: 1.1rem;
            text-transform: uppercase;
        }
        .trust-img {
            max-width: 140px;
            margin: 0 auto 15px;
            display: block;
        }
        .contact-widget {
            background: #2D9CDB;
            /* Logo Color */
            color: white;
            border-radius: 8px;
            padding: 25px;
        }
        .contact-widget h5 {
            font-weight: 700;
            margin-bottom: 5px;
            color: white;
        }
        .contact-widget a {
            color: white;
            font-weight: 800;
            font-size: 1.3rem;
            text-decoration: none;
        }
    </style>
    <div class="reservation-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2 class="hero-subtitle">Boston Taxi Reservation</h2>
            <h1 class="hero-title">Reserve Your Ride with Boston Express Cab</h1>
        </div>
    </div>
    <section class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pr-lg-5">
                    <h2 class="section-heading">Booking a Taxi in Boston Has Never Been Easier</h2>
                    <div class="section-divider"></div>
                    <p class="text-muted mb-5">
                        With Boston Express Cab, you can enjoy a hassle-free and convenient reservation process for all your
                        transportation needs. Whether you're traveling for business, leisure, or a special event, our
                        professional drivers and well-maintained fleet are here to provide you with a comfortable and
                        reliable ride.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="feature-card">
                                <h4 class="feature-title"><i class="fas fa-mouse-pointer"></i> Easy Online Booking</h4>
                                <p class="feature-text">Our user-friendly website allows you to book your ride in just a few
                                    clicks. Simply enter your details, select your vehicle, and receive instant
                                    confirmation.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-card">
                                <h4 class="feature-title"><i class="fas fa-clock"></i> 24/7 Customer Support</h4>
                                <p class="feature-text">Need assistance? Our customer support team is available around the
                                    clock to help you with any questions or concerns to ensure a smooth experience.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-card">
                                <h4 class="feature-title"><i class="fas fa-car-side"></i> Wide Range of Vehicles</h4>
                                <p class="feature-text">From sedans and SUVs to vans and luxury cars, we have the perfect
                                    ride for every occasion. Whether traveling alone or with a group, we ensure comfort.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-card">
                                <h4 class="feature-title"><i class="fas fa-user-tie"></i> Reliable Drivers</h4>
                                <p class="feature-text">Our drivers are experienced, courteous, and dedicated to providing
                                    exceptional service. Rest assured, you're in safe hands with Boston Express Cab.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h3 class="feature-title mb-3" style="color: #333;">How to Reserve</h3>
                            <ul class="step-list">
                                <li><strong>Visit our website:</strong> Head to our reservation page and fill out the
                                    booking form.</li>
                                <li><strong>Choose your vehicle:</strong> Select the type of vehicle that suits your needs
                                    from our diverse fleet.</li>
                                <li><strong>Select your time:</strong> Pick your desired pickup time to match your schedule.
                                </li>
                                <li><strong>Confirm your booking:</strong> Review details and confirm. You'll receive an
                                    instant confirmation via email.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="faq-container">
                        <h2 class="section-heading">Frequently Asked Questions (FAQ)</h2>
                        <div class="section-divider"></div>
                        <div class="faq-item">
                            <div class="faq-question"><i class="fas fa-question-circle"></i> How can I book a taxi?</div>
                            <div class="faq-answer">You can easily book a taxi through our website by filling out the
                                booking form with your pickup and drop-off locations, selecting your vehicle, and choosing
                                your preferred time. You can also book via phone.</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"><i class="fas fa-check-circle"></i> Can I get a confirmation of my
                                booking?</div>
                            <div class="faq-answer">Yes, once you complete your booking, you will receive an instant
                                confirmation via email, ensuring your reservation is secure.</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"><i class="fas fa-car"></i> What types of vehicles do you offer?</div>
                            <div class="faq-answer">We offer a diverse fleet of vehicles including sedans, SUVs, vans, and
                                luxury vehicles to meet your specific needs.</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"><i class="fas fa-edit"></i> Can I modify or cancel my reservation?
                            </div>
                            <div class="faq-answer">Yes, you can modify or cancel your reservation. Please refer to our
                                cancellation policy on the website or contact our customer support team for assistance.
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"><i class="fas fa-baby"></i> Do you provide child seats?</div>
                            <div class="faq-answer">Yes, we offer secure and comfortable child seats upon request to ensure
                                the safety of your little ones.</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"><i class="fas fa-credit-card"></i> What are your payment options?
                            </div>
                            <div class="faq-answer">We accept various payment options including credit cards, debit cards,
                                and online payment methods for your convenience.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-box p-0 border-0">
                        <div class="contact-widget">
                            <h5>Book via Phone</h5>
                            <p class="small mb-2">Instant confirmation & support</p>
                            <a href="tel:6172306362">617-230-6362</a>
                        </div>
                    </div>
                    <div class="sidebar-box">
                        <h5 class="sidebar-title">Top Rated Service</h5>
                        <a
                            href="https://www.google.com/search?sca_esv=f96236a721133e6f&cs=0&output=search&kgmid=/g/11wwx58ltt&q=Boston+Express+Cab+-Boston+Car,+Taxi,+SUV+and+Minivan+Service&shndl=30&shem=lcuae,uaasie&source=sh/x/loc/uni/m1/1&kgs=eadcf2dd6bddbfa8">
                            <img src="{{ asset('images/Google-Rating-1.jpeg') }}" alt="Google" class="trust-img">
                        </a>
                        <a href="https://www.trustpilot.com/review/bostonexpresscab.com" target="_blank">
                            <img src="{{ asset('images/Trustpilot.jpeg') }}" alt="Trustpilot" class="trust-img">
                        </a>
                        <a href="https://limotrust.org/listing/boston-express-cab-60" target="_blank">
                            <img src="{{ asset('images/Limotrust-1.webp') }}" alt="Tripadvisor" class="trust-img">
                        </a>
                        <a href="https://www.tripadvisor.com/Attraction_Review-g41948-d28108453-Reviews-Boston_Express_Cab-Woburn_Massachusetts.html"
                            target="_blank">
                            <img src="{{ asset('images/Tripadvisor.webp') }}" alt="LimoTrust" class="trust-img">
                        </a>
                    </div>
                    <div class="sidebar-box text-left" style="text-align: left;">
                        <h5 class="sidebar-title text-center">Why Choose Us?</h5>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Convenient booking process</li>
                            <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> 24/7 Customer Support</li>
                            <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Diverse fleet of vehicles</li>
                            <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Professional drivers</li>
                            <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Flexible payment options</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
