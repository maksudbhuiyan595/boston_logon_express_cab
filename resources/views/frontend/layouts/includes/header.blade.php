<style>
     .nav-link { font-weight: 600; font-size: 0.95rem; position: relative; }
        /* .nav-link:hover { color: var(--brand-blue); } */

</style>
<header>
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo">
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
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li><a href="{{ route('pickup.location') }}" class="nav-link">Pickup Location</a></li>
                    <li><a href="{{ route("reservation") }}" class="nav-link">Reservation</a></li>
                    <li><a href="{{ route('child.seat') }}" class="nav-link">Child Seat</a></li>
                    <li><a href="{{ route('minivan') }}" class="nav-link">Minivan Taxi</a></li>
                    <li><a href="{{ route('longdistance') }}" class="nav-link">Long Distance</a></li>
                    <li><a href="{{ route('area.we.serve') }}" class="nav-link">Service Area</a></li>
                    <li><a href="{{ route('blogs') }}" class="nav-link">Blogs</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
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
