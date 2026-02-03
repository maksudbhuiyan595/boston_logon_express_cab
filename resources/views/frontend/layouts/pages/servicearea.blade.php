@extends('frontend.app')
@section('title', "Service Area")
@section('content')

<style>
    /* --- GLOBAL STYLES --- */


    /* =========================================
       HERO SECTION STYLES
       ========================================= */
    .service-hero {
        position: relative;
        /* Using a valid Unsplash image. Change this to asset('images/cap3.jpeg') if using local file */
        background-image: url('https://images.unsplash.com/photo-1550355291-bbee04a92027?q=80&w=1920&auto=format&fit=crop');
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .service-hero::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        /* Blue (#2D9CDB) mixed with dark transparency */
        background: linear-gradient(to bottom, rgba(45, 156, 219, 0.6), rgba(30, 41, 59, 0.85));
        mix-blend-mode: multiply;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        padding: 0 15px;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.5);
    }

    .hero-badge {
        display: inline-block;
        background-color: #2D9CDB; /* Logo Blue */
        color: white;
        padding: 6px 22px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 15px rgba(45, 156, 219, 0.4);
        margin-bottom: 15px;
    }

    /* =========================================
       COMMON SECTION STYLES
       ========================================= */
    .section-padding { padding: 80px 0; }
    .bg-light { background-color: #f8fafc; }
    .bg-white { background-color: #ffffff; }

    .section-header { text-align: center; margin-bottom: 60px; }

    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1e293b; /* Dark Blue/Gray */
        margin-bottom: 15px;
    }

    .section-line {
        width: 80px; height: 4px;
        background-color: #2D9CDB; /* Logo Blue */
        margin: 0 auto; border-radius: 2px;
    }

    /* =========================================
       SERVICE AREA CARDS
       ========================================= */
    .location-card {
        background: white;
        border-radius: 12px;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
        position: relative;
        overflow: hidden;
        margin-bottom: 25px;
        text-decoration: none;
        color: #1e293b;
        display: block;
    }

    .card-content-flex { display: flex; align-items: center; }

    .location-card::before {
        content: ""; position: absolute; left: 0; top: 0; height: 100%;
        width: 4px; background-color: #2D9CDB; transition: width 0.3s ease;
    }

    .location-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(45, 156, 219, 0.15);
        border-color: #2D9CDB;
        color: #2D9CDB;
    }

    .icon-box {
        width: 45px; height: 45px;
        background-color: rgba(45, 156, 219, 0.1);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin-right: 15px; color: #2D9CDB;
        transition: all 0.3s ease; flex-shrink: 0;
    }

    .location-card:hover .icon-box { background-color: #2D9CDB; color: white; }
    .city-text { font-weight: 600; font-size: 1.05rem; }

    /* =========================================
       BLOG SECTION STYLES
       ========================================= */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
    }

    .blog-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        border-color: #bfdbfe;
    }

    .blog-img-wrapper { position: relative; height: 220px; overflow: hidden; }
    .blog-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .blog-card:hover .blog-img { transform: scale(1.08); }

    .blog-cat-badge {
        position: absolute; top: 15px; left: 15px;
        background-color: #2D9CDB; /* Logo Blue */
        color: #fff;
        padding: 5px 12px; border-radius: 20px;
        font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;
        z-index: 2;
    }

    .blog-content { padding: 25px; display: flex; flex-direction: column; flex-grow: 1; }

    .blog-meta-date {
        font-size: 0.85rem; color: #94a3b8; margin-bottom: 10px;
        display: flex; align-items: center; gap: 5px;
    }

    .blog-title {
        font-size: 1.25rem; font-weight: 700; color: #1e293b;
        margin-bottom: 12px; text-decoration: none; line-height: 1.4; transition: color 0.2s;
    }
    .blog-title:hover { color: #2D9CDB; }

    .blog-excerpt {
        font-size: 0.95rem; color: #64748b; line-height: 1.6;
        margin-bottom: 20px; flex-grow: 1;
    }

    .blog-footer {
        padding-top: 15px; border-top: 1px solid #f1f5f9;
        display: flex; align-items: center; justify-content: space-between;
    }

    .read-more-btn {
        color: #2D9CDB; font-weight: 600; font-size: 0.9rem;
        text-decoration: none; display: inline-flex; align-items: center; gap: 5px; transition: gap 0.2s;
    }
    .read-more-btn:hover { gap: 8px; color: #1a7bb0; }

    /* MOBILE RESPONSIVE */
    @media (max-width: 768px) {
        .service-hero { height: 300px; background-attachment: scroll; }
        .hero-title { font-size: 2rem; }
        .section-title { font-size: 2rem; }
        .location-card { margin-bottom: 15px; padding: 12px 15px; }
    }
</style>

{{-- =========================================
     1. HERO SECTION
     ========================================= --}}
<div class="service-hero">
    <div class="hero-content">
        <span class="hero-badge">Professional Service</span>
        <h1 class="hero-title">Service Areas</h1>
    </div>
</div>

{{-- =========================================
     2. LOCATION GRID SECTION
     ========================================= --}}
<div class="section-padding bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Areas We Cover</h2>
            <div class="section-line"></div>
            <p class="text-muted mt-3">Reliable transportation across Massachusetts and New Hampshire</p>
        </div>

        <div class="row">

            @foreach($cities as $city)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="{{ route('dynamic.route',$city->url) }}" class="location-card">
                        <div class="card-content-flex">
                            <div class="icon-box">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span class="city-text">{{ $city->name }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
         <div class="mt-5 custom-pagination">
            {{ $cities->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
