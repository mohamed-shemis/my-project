<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title','العمار')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-N89NKMPD");
    </script>
</head>

<body>

    <!-- GTM noscript -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N89NKMPD"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <!-- Top Header -->
    <div class="top-header">
        <div class="container">
            <div class="header-left">

                <span>
                    <a href="tel:19783">
                        <img src="{{ asset('assets/img/phone.svg') }}" />
                        <span class="hide-sm">19783</span>
                    </a>
                </span>

                <span>
                    <a href="mailto:info@elamargroup.com">
                        <img src="{{ asset('assets/img/mail.svg') }}" />
                        <span class="hide-sm">info@elamargroup.com</span>
                    </a>
                </span>

                <span>
                    <a href="{{ route('site.en') }}">
                        <img src="{{ asset('assets/img/globe.svg') }}" />
                        <span class="hide-sm">EN</span>
                    </a>
                </span>

                <span>
                    <a href="https://maps.google.com" target="_blank">
                        <img src="{{ asset('assets/img/map.svg') }}" />
                        <span class="hide-sm">١٢٠ شارع الثورة – مصر الجديدة</span>
                    </a>
                </span>

            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <div class="container">

            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" />
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
                        <li><a href="{{ route('login.show') }}">تسجيل دخول</a></li>
                        <li><a href="{{ route('vendor.login.show') }}">مقاولين وموردين</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </header>

    {{-- =======================
            CONTENT
        ======================= --}}
    @yield('content')

    {{-- FOOTER --}}
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <img src="{{ asset('assets/img/footer-logo.png') }}" />
                    <p class="company-description">
                        مجموعة العمار … نص ثابت كما في التصميم.
                    </p>
                </div>

                <div class="office">
                    <h3>مكتب الإسكندرية</h3>
                    ٢٤٣ طريق الحرية – سبورتنج
                </div>

                <div class="office">
                    <h3>مكتب القاهرة</h3>
                    ١٢٠ شارع الثورة – مصر الجديدة
                </div>

                <div class="contact-section">
                    <img src="{{ asset('assets/img/customer-icon.png') }}" />
                    <p class="contact-number">19783</p>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>جميع الحقوق محفوظة 2025</p>
            <img src="{{ asset('assets/img/logo.png') }}">
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/gallary.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
