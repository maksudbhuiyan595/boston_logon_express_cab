@extends('frontend.app')
@section('title', "Contact Us")
@section('meta_description', "Boston Express Cab is your go-to for reliable, comfortable transportation in Boston and beyond. Experience luxury and safety with our professional chauffeurs.")

@section('content')
<style>
    .contact-card-wrapper {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        margin: 60px 0;
        display: flex; /* Ensures the wrapper acts as a flex container */
        flex-direction: column;
    }

    /* Desktop View */
    @media (min-width: 768px) {
        .contact-card-wrapper {
            flex-direction: row; /* Side by side on desktop */
            min-height: 450px;   /* Fixed height to force map to show */
        }

        /* Forces both columns to be equal height */
        .col-left, .col-right {
            flex: 1;
        }
    }

    /* Left Side */
    .contact-info-section {
        background-color: #2D9CDB;
        padding: 60px 40px;
        color: white;
        height: 100%; /* Fills the height */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .contact-info-section h2 { font-weight: 700; font-size: 2.2rem; margin-bottom: 30px; color: white; }

    .contact-link {
        display: flex; align-items: center; color: white; text-decoration: none;
        font-size: 1.1rem; margin-bottom: 20px; transition: opacity 0.2s;
    }
    .contact-link:hover { opacity: 0.8; color: white; }
    .contact-link i { width: 30px; font-size: 1.3rem; margin-right: 10px; text-align: center; }

    /* Right Side (Map) */
    .col-right {
        position: relative;
        padding: 0 !important;
        margin: 0 !important;
        background: #eee; /* Light gray background if map loads slowly */
        min-height: 400px; /* Fallback height */
    }

    .map-iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="contact-card-wrapper">

                <div class="col-left">
                    <div class="contact-info-section">
                        <h2>Contact Us</h2>
                        <a href="tel:+18573319544" class="contact-link">
                            <i class="fas fa-phone-alt"></i> <span>Phone: +617-230-6362</span>
                        </a>
                        <a href="mailto:bostonexpresscab24@gmail.com" class="contact-link">
                            <i class="far fa-envelope"></i> <span>Email: bostonexpresscab24@gmail.com</span>
                        </a>
                        <a href="https://wa.me/18573319544" target="_blank" class="contact-link">
                            <i class="fab fa-whatsapp"></i> <span>WhatsApp: 617-230-6362</span>
                        </a>
                    </div>
                </div>

                <div class="col-right">
                    <iframe
                        class="map-iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d94233.44474322986!2d-71.19124440854687!3d42.36009388172986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e370a5cb30cc5f%3A0x2614b9c6c4068564!2sBoston%2C%20MA%2C%20USA!5e0!3m2!1sen!2sbd!4v1705676458321!5m2!1sen!2sbd"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
