 <style>
    /* --- FOOTER STYLES --- */
.site-footer {
    background-color: #1a1b1e; /* Dark background */
    color: #b0b0b0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding-top: 60px;
    font-size: 0.95rem;
}

/* Intro Section */
.footer-intro {
    text-align: center;
    max-width: 600px;
    margin: 0 auto 40px auto;
    padding: 0 20px;
}

.footer-logo-box {
    margin-bottom: 20px;
    display: inline-block;
}

/* Divider Line */
.footer-divider {
    height: 1px;
    background: #333;
    margin-bottom: 50px;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
}

/* Grid Layout (Responsive) */
.footer-grid {
    display: grid;
    grid-template-columns: 1fr; /* Mobile: 1 Column */
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px 60px 20px;
}

/* Tablet: 2 Columns */
@media (min-width: 768px) {
    .footer-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Desktop: 4 Columns */
@media (min-width: 992px) {
    .footer-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Columns & Headings */
.footer-col h3 {
    color: #ffffff;
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 10px;
}

.footer-col h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 2px;
    background-color: #2D9CDB; /* Brand Blue */
}

/* Contact Items */
.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    gap: 15px;
}

.contact-item i {
    color: #2D9CDB;
    margin-top: 5px;
}

/* Links List */
.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: #b0b0b0;
    text-decoration: none;
    transition: color 0.3s, padding-left 0.3s;
}

.footer-links a:hover {
    color: #2D9CDB;
    padding-left: 5px; /* Slide effect */
}

/* Social Icons */
.social-icons {
    display: flex;
    gap: 15px;
}

.social-icon {
    width: 40px;
    height: 40px;
    background-color: #2a2b2e;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #ffffff;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-icon:hover {
    background-color: #2D9CDB;
    transform: translateY(-3px);
    color: white;
}

/* Copyright Bar */
.footer-bottom {
    background: #000;
    padding: 25px 20px;
    text-align: center;
    font-size: 0.85rem;
    color: #666;
    border-top: 1px solid #222;
}

.footer-bottom span {
    color: #2D9CDB;
}
 </style>
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
