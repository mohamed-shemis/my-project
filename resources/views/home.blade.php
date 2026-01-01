<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>العمار</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
</head>

<body>

{{-- ============================ TOP HEADER ============================== --}}
<div class="top-header">
    <div class="container">
        <div class="header-left">

            <span>
                <a href="tel:19783">
                    <img src="{{ asset('assets/img/phone.svg') }}" alt="Phone" />
                    <span class="hide-sm">19783</span>
                </a>
            </span>

            <span>
                <a href="#">
                    <img src="{{ asset('assets/img/mail.svg') }}" alt="Mail" />
                    <span class="hide-sm">info@elamar-group.com</span>
                </a>
            </span>

            <span>
                <a href="#">
                    <img src="{{ asset('assets/img/globe.svg') }}" alt="Language" />
                    <span class="hide-sm">EN</span>
                </a>
            </span>

            <span>
                <a href="https://maps.google.com/" target="_blank">
                    <img src="{{ asset('assets/img/map.svg') }}" alt="Map" />
                    <span class="hide-sm">مصر الجديدة - القاهرة</span>
                </a>
            </span>

        </div>
    </div>
</div>


{{-- ============================ MAIN HEADER ============================== --}}
<header class="main-header">
    <div class="container">

        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="العمار">
            </a>
        </div>

        <div class="group-right">
            <nav class="main-nav">
                <ul>
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('about') }}">من نحن</a></li>
                    <li><a href="{{ route('projects') }}">المشروعات</a></li>
                    <li><a href="{{ route('faqs') }}">أسئلة متكررة</a></li>
                    <li><a href="{{ route('contact.show') }}">اتصل بنا</a></li>
                    <li><a href="{{ route('login') }}">تسجيل دخول</a></li>
                    <li><a href="{{ route('vendor.login.show') }}">موردين / مقاولين</a></li>
                </ul>
            </nav>
        </div>

        <div class="social-links">
            <a href="#" target="_blank"><img src="{{ asset('assets/img/facebook.svg') }}"></a>
            <a href="#" target="_blank"><img src="{{ asset('assets/img/instagram.svg') }}"></a>
            <a href="#" target="_blank"><img src="{{ asset('assets/img/whatsapp.svg') }}"></a>
        </div>

    </div>
</header>

{{-- ============================ HERO SLIDER ============================== --}}
<div class="hero">
    <div class="swiper heroSlider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset('assets/img/slid1.jpg') }}"></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/slid2.jpg') }}"></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/slid3.jpg') }}"></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/slid4.jpg') }}"></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/slid5.jpg') }}"></div>
        </div>
    </div>
</div>


{{-- ============================ NEWS SECTION ============================== --}}
<section class="news">
    <div class="container">

        <div class="section-title">
            <img src="{{ asset('assets/img/section-title-icon.png') }}">
            <h1>مجموعة العمار .. <span>تأسست عام 1986</span></h1>
        </div>

        <p class="section-description">
            منذ بداية نشاطنا أقمنا مشاريع في أرقى المواقع .. الخ
        </p>

        <div class="news-wrapper">

            <div class="news-item">
                <div class="img">
                    <img src="{{ asset('assets/img/project1.jpg') }}">
                </div>
                <div class="content">
                    <h1>شورز</h1>
                    <p>وصف مختصر...</p>
                    <a href="#">المزيد <img src="{{ asset('assets/img/left.svg') }}"></a>
                </div>
            </div>

            <div class="news-item">
                <div class="img">
                    <img src="{{ asset('assets/img/project2.jpg') }}">
                </div>
                <div class="content">
                    <h1>بيلا ميرا</h1>
                    <p>وصف مختصر...</p>
                    <a href="#">المزيد <img src="{{ asset('assets/img/left.svg') }}"></a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ============================ STATISTICS SECTION ============================== --}}
<section class="statisics" id="statisticsSection">
    <div class="container">

        <div class="experiance statistics-animated">
            <span class="counter-number" data-target="40">40</span>
            <br> سنة من الخبرة
        </div>

        <div class="text statistics-animated">
            <h1><span>مجموعة العمار ..</span> خبراء الساحل</h1>

            <p>نص تعريفي ...</p>

            <div class="states">
                <h1><span class="counter-number" data-target="56">56</span> برج</h1>
                <h1><span class="counter-number" data-target="14">14</span> منتجع</h1>
                <h1><span class="counter-number" data-target="11000">11000</span> وحدة</h1>
            </div>
        </div>

    </div>
</section>


{{-- ============================ GALLERY ============================== --}}
<section class="gallery">
    <div class="container">

        <div class="section-title">
            <img src="{{ asset('assets/img/section-title-icon.png') }}">
            <h1>صور من <span>مشروعاتنا</span></h1>
        </div>

        <div class="gallery-wrapper">
            <div class="img"><img src="{{ asset('assets/img/project3.jpg') }}"></div>
            <div class="img"><img src="{{ asset('assets/img/project4.jpg') }}"></div>
            <div class="img"><img src="{{ asset('assets/img/project5.jpg') }}"></div>
        </div>

    </div>
</section>


{{-- ============================ FOOTER ============================== --}}
<footer class="footer">
    <div class="container">
        <div class="footer-content">

            <div class="footer-section company-section">
                <img src="{{ asset('assets/img/footer-logo.png') }}">
                <p class="company-description">
                    مجموعة العمار من الشركات الرائدة ... الخ
                </p>
            </div>

            <div class="office">
                <h3>مكتب القاهرة</h3>
                120 شارع الثورة – مصر الجديدة<br> الخط الساخن 19783
            </div>

            <div class="office">
                <h3>مكتب الإسكندرية</h3>
                سبورتنج – الإسكندرية<br> الخط الساخن 19783
            </div>

            <div class="footer-section contact-section">
                <img src="{{ asset('assets/img/customer-icon.png') }}">
                <p class="contact-number">19783</p>
                <h3>الخط الساخن</h3>
            </div>

        </div>
    </div>

    <div class="footer-bottom">
        <p>جميع الحقوق محفوظة 2025</p>
        <img src="{{ asset('assets/img/logo.png') }}">
    </div>
</footer>


{{-- ============================ SCRIPTS ============================== --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/js/gallary.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
