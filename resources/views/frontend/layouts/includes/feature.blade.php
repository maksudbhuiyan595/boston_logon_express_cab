<style>
    /* --- SECTION STYLES --- */
    .section-padding {
        padding: 80px 0;
        background-color: #fff;
    }

    .section-title {
        color: var(--brand-blue, #007bff);
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: var(--brand-blue, #007bff);
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .section-subtitle {
        color: #555;
        font-size: 1.05rem;
        max-width: 700px;
        margin: 0 auto 60px;
        line-height: 1.6;
    }

    /* --- LAYOUT GRID (3 Columns) --- */
    .features-layout {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
    }

    .features-col-left,
    .features-col-right {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 50px; /* ফিচারগুলোর মধ্যে গ্যাপ */
    }

    .features-col-center {
        flex: 0 0 350px; /* ইমেজের জন্য ফিক্সড উইডথ */
        text-align: center;
        position: relative;
    }

    /* --- FEATURE ITEMS --- */
    .feature-item {
        position: relative;
        transition: transform 0.3s ease;
    }

    .feature-item:hover {
        transform: translateY(-5px);
    }

    .feature-item h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .feature-item p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
    }

    /* আইকন ডিজাইন */
    .feature-icon {
        width: 50px;
        height: 50px;
        background: rgba(0, 123, 255, 0.1);
        color: var(--brand-blue, #007bff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .feature-item:hover .feature-icon {
        background: var(--brand-blue, #007bff);
        color: #fff;
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    /* --- ALIGNMENT LOGIC --- */

    /* বাম পাশের কলাম: টেক্সট ডানদিকে এলাইন হবে (ইমেজের দিকে) */
    .features-col-left {
        text-align: right;
        align-items: flex-end; /* ফ্লেক্স আইটেম ডানদিকে চাপবে */
    }
    .features-col-left .feature-item {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .features-col-left h3 {
        flex-direction: row-reverse; /* আইকন ডানদিকে থাকবে */
    }

    /* ডান পাশের কলাম: টেক্সট বামদিকে এলাইন হবে (ইমেজের দিকে) */
    .features-col-right {
        text-align: left;
        align-items: flex-start; /* ফ্লেক্স আইটেম বামদিকে চাপবে */
    }
    .features-col-right .feature-item {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* --- CENTER IMAGE --- */
    .feature-center-img {
        width: 100%;
        max-width: 350px;
        height: auto;
        /* ড্রপ শ্যাডো ছাড়া ক্লিন লুক */
        filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
        animation: floatImg 4s ease-in-out infinite;
    }

    /* ফ্লোটিং এনিমেশন */
    @keyframes floatImg {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    /* =========================================
       RESPONSIVE DESIGN
    ========================================= */
    @media (max-width: 991px) {
        .features-layout {
            flex-direction: column; /* সব নিচে নিচে আসবে */
            gap: 50px;
        }

        /* মোবাইলে ইমেজের অর্ডার প্রথমে আনা */
        .features-col-center {
            order: -1;
            flex: auto;
            margin-bottom: 20px;
        }

        .feature-center-img {
            max-width: 280px; /* মোবাইলে ইমেজ ছোট হবে */
        }

        /* মোবাইলে সব টেক্সট সেন্টারে বা বামে আনা */
        .features-col-left, .features-col-right {
            align-items: center;
            text-align: center;
            gap: 40px;
        }

        .features-col-left .feature-item,
        .features-col-right .feature-item {
            align-items: center;
        }

        /* মোবাইলে আইকন পজিশন ঠিক করা */
        .features-col-left h3 {
            flex-direction: row; /* নরমাল ফ্লো */
        }

        .feature-item h3 {
            justify-content: center;
        }
    }
</style>

<section class="section-padding" style="background: #fff;">
    <div class="container">

        <div class="text-center">
            <h2 class="section-title">Our Specialized Features</h2>
            <p class="section-subtitle">
                Enjoy unmatched convenience, safety, and customization with Boston Express Cab. We ensure seamless travel solutions tailored to your needs.
            </p>
        </div>

        <div class="features-layout">

            {{-- Left Column --}}
            <div class="features-col-left">
                <div class="feature-item">
                    <h3>
                        Airport Transfer
                        <div class="feature-icon"><i class="fas fa-plane-arrival"></i></div>
                    </h3>
                    <p>Enjoy seamless, reliable airport transfers. Our professional drivers ensure a smooth ride from Logan Airport.</p>
                </div>
                <div class="feature-item">
                    <h3>
                        Child Seat
                        <div class="feature-icon"><i class="fas fa-baby-carriage"></i></div>
                    </h3>
                    <p>Ensure your little one’s safety with our child seat facility. Secure and comfortable child seats for a stress-free journey.</p>
                </div>
            </div>

            {{-- Center Image --}}
            <div class="features-col-center">
                {{-- ইমেজ না থাকলে একটি ডিফল্ট কার্টুন বা আইকন ব্যবহার করা যেতে পারে --}}
                <img src="{{ asset("images/Child Seat Service.png") }}" alt="Child Seat Service" class="feature-center-img">
            </div>

            {{-- Right Column --}}
            <div class="features-col-right">
                <div class="feature-item">
                    <h3>
                        <div class="feature-icon"><i class="fas fa-briefcase"></i></div>
                        Corporate Taxi Service
                    </h3>
                    <p>Experience reliable transportation with our Corporate Taxi Service. Punctual rides for your business needs.</p>
                </div>
                <div class="feature-item">
                    <h3>
                        <div class="feature-icon"><i class="fas fa-clock"></i></div>
                        Hourly Service
                    </h3>
                    <p>Take control of your schedule with our Hourly Service. Flexible and convenient transportation options.</p>
                </div>
            </div>

        </div>
    </div>
</section>
