<style>
    /* --- SECTION BASE --- */
    .section-padding {
        padding: 80px 0;
        background-color: #f9f9f9;
    }

    .section-title {
        color: var(--brand-blue, #007bff);
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 15px;
        text-align: center;
    }

    /* --- BLOG GRID --- */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 Columns on Desktop */
        gap: 30px;
        margin-top: 20px;
    }

    /* --- BLOG CARD --- */
    .blog-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden; /* ইমেজের জুম যেন বাইরে না যায় */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #eee;
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* --- IMAGE WRAPPER & ZOOM --- */
    .blog-img-box {
        overflow: hidden;
        height: 220px;
        position: relative;
    }

    .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-img {
        transform: scale(1.1); /* ইমেজে জুম ইফেক্ট */
    }

    /* --- CONTENT --- */
    .blog-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    /* CATEGORY BADGE */
    .blog-cat {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--brand-blue, #007bff);
        background: rgba(0, 123, 255, 0.1);
        padding: 4px 12px;
        border-radius: 20px;
        margin-bottom: 12px;
        width: fit-content;
    }

    /* TITLE */
    .blog-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #222;
        text-decoration: none;
        margin-bottom: 12px;
        line-height: 1.4;
        transition: color 0.3s;
    }

    .blog-title:hover {
        color: var(--brand-blue, #007bff);
    }

    /* EXCERPT */
    .blog-excerpt {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    /* FOOTER (Read More & Date) */
    .blog-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #f0f0f0;
        padding-top: 15px;
        margin-top: auto;
    }

    .read-more {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--brand-blue, #007bff);
        text-decoration: none;
        transition: padding 0.3s;
    }

    .read-more:hover {
        padding-left: 5px; /* অ্যারো মুভ ইফেক্ট */
    }

    .blog-date {
        font-size: 0.85rem;
        color: #999;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* --- RESPONSIVE --- */
    @media (max-width: 991px) {
        .blog-grid {
            grid-template-columns: repeat(2, 1fr); /* ট্যাবলেটে ২ কলাম */
        }
    }

    @media (max-width: 768px) {
        .blog-grid {
            grid-template-columns: 1fr; /* মোবাইলে ১ কলাম */
        }
        .section-title {
            font-size: 1.8rem;
        }
    }
</style>

<section class="section-padding" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Latest Blog</h2>
            <div style="width: 60px; height: 4px; background: var(--brand-blue, #007bff); margin: 0 auto 50px; border-radius: 2px;"></div>
        </div>

        <div class="blog-grid">

            {{-- Blog Item 1 --}}
            <div class="blog-card">
                <div class="blog-img-box">
                    {{-- Random City/Cinema Image --}}
                    <img src="https://picsum.photos/400/250?random=10" alt="Cinema" class="blog-img">
                </div>
                <div class="blog-content">
                    <span class="blog-cat">Entertainment</span>
                    <a href="#" class="blog-title">Discover the Best Heywood Gardner MA Cinema</a>
                    <p class="blog-excerpt">If you are searching for the perfect movie night, discover the top spots in Gardner MA...</p>

                    <div class="blog-footer">
                        <a href="#" class="read-more">Read More »</a>
                        <span class="blog-date"><i class="far fa-clock"></i> Nov 4, 2025</span>
                    </div>
                </div>
            </div>

            {{-- Blog Item 2 --}}
            <div class="blog-card">
                <div class="blog-img-box">
                    {{-- Random Medical/Building Image --}}
                    <img src="https://picsum.photos/400/250?random=20" alt="Hospital" class="blog-img">
                </div>
                <div class="blog-content">
                    <span class="blog-cat">Health & Travel</span>
                    <a href="#" class="blog-title">How to Get a Reliable Ride to Heywood Hospital</a>
                    <p class="blog-excerpt">Accessibility and reliability matter when it comes to medical appointments. Find out how...</p>

                    <div class="blog-footer">
                        <a href="#" class="read-more">Read More »</a>
                        <span class="blog-date"><i class="far fa-clock"></i> Oct 30, 2025</span>
                    </div>
                </div>
            </div>

            {{-- Blog Item 3 --}}
            <div class="blog-card">
                <div class="blog-img-box">
                    {{-- Random Hotel/Room Image --}}
                    <img src="https://picsum.photos/400/250?random=30" alt="Hotels" class="blog-img">
                </div>
                <div class="blog-content">
                    <span class="blog-cat">Accomodation</span>
                    <a href="#" class="blog-title">Top Hotels in Fitchburg MA – Best Stays for You</a>
                    <p class="blog-excerpt">Fitchburg is full of surprises. Explore the most comfortable and top-rated hotels for your stay...</p>

                    <div class="blog-footer">
                        <a href="#" class="read-more">Read More »</a>
                        <span class="blog-date"><i class="far fa-clock"></i> Oct 28, 2025</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
