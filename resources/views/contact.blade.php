<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>اتصل بنا | مجموعة العمار</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">

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
                    <img src="{{ asset('assets/img/phone.svg') }}">
                    <span class="hide-sm">19783</span>
                </a>
            </span>

            <span>
                <a href="mailto:info@elamargroup.com">
                    <img src="{{ asset('assets/img/mail.svg') }}">
                    <span class="hide-sm">info@elamargroup.com</span>
                </a>
            </span>

            <span>
                <a href="{{ url('/contact-en') }}">
                    <img src="{{ asset('assets/img/globe.svg') }}">
                    <span class="hide-sm">EN</span>
                </a>
            </span>

            <span>
                <a target="_blank"
                   href="https://www.google.com/maps/search/?api=1&query=120+El-Thawra+Street,+Heliopolis,+Cairo">
                    <img src="{{ asset('assets/img/map.svg') }}">
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
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="العمار جروب">
            </a>
        </div>

        <div class="group-right">
            <nav class="main-nav">
                <ul>
                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li><a href="{{ url('/about') }}">من نحن</a></li>
                    <li><a href="{{ url('/project') }}">المشروعات</a></li>
                    <li><a href="{{ url('/faqs') }}">أسئلة متكررة</a></li>

                    <li><a class="active" href="{{ url('/contact') }}">اتصل بنا</a></li>

                    <li><a href="{{ url('/customer') }}">تسجيل دخول</a></li>
                    <li><a href="{{ url('/vendor') }}">مقاولين وموردين</a></li>
                </ul>
            </nav>
        </div>

        <div class="social-links">
            <a href="https://www.facebook.com/Elamargroupeg" target="_blank">
                <img src="{{ asset('assets/img/facebook.svg') }}">
            </a>
            <a href="https://www.instagram.com/elamargroupeg/" target="_blank">
                <img src="{{ asset('assets/img/instagram.svg') }}">
            </a>
            <a href="https://wa.me/201111111111" target="_blank">
                <img src="{{ asset('assets/img/whatsapp.svg') }}">
            </a>
        </div>

        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <img src="{{ asset('assets/img/menu.svg') }}">
        </button>

    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay">
        <button class="close-btn" id="closeMobileMenuBtn">
            <img src="{{ asset('assets/img/close.svg') }}">
        </button>

        <div class="mobile-menu-content">

            <nav class="mobile-nav">
                <ul>
                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li><a href="{{ url('/about') }}">من نحن</a></li>
                    <li><a href="{{ url('/project') }}">المشروعات</a></li>
                    <li><a href="{{ url('/faqs') }}">أسئلة متكررة</a></li>
                    <li><a href="{{ url('/contact') }}">اتصل بنا</a></li>
                    <li><a href="{{ url('/customer') }}">تسجيل دخول</a></li>
                    <li><a href="{{ url('/vendor') }}">مقاولين وموردين</a></li>
                </ul>
            </nav>

            <div class="mobile-social-links">
                <a href="https://www.facebook.com/Elamargroupeg" target="_blank">
                    <img src="{{ asset('assets/img/facebook.svg') }}">
                </a>
                <a href="https://www.instagram.com/elamargroupeg/" target="_blank">
                    <img src="{{ asset('assets/img/instagram.svg') }}">
                </a>
            </div>

        </div>
    </div>

</header>


<!-- Page Content -->
<main>

    <section class="page-header">
        <img src="{{ asset('assets/img/project7.jpg') }}">
        <h1>اتصل بنا</h1>
        <div class="links">
            <a href="{{ url('/') }}">الرئيسية</a>
            <img src="{{ asset('assets/img/arrow-right.svg') }}">
            <span>اتصل بنا</span>
        </div>
    </section>

    <section class="contact">
        <div class="container">

            <div class="form-wrapper">

                <div class="head">
                    <div>
                        <h1><span>تواصل</span> معنا</h1>
                        <p>
                            يسعد فريق مجموعة العمار بالرد على كافة استفساراتكم حول المشروعات،
                            أنظمة السداد وزيارات المعاينة.
                        </p>
                    </div>
                    <img src="{{ asset('assets/img/customer-icon.png') }}">
                </div>


                {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success" style="margin-bottom:15px;">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger" style="margin-bottom:15px;">
                        <ul style="margin:0; padding-right:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <!-- Contact Form -->
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    <input type="text" name="name" placeholder="الاسم الكامل" value="{{ old('name') }}" required>
                    <input type="tel" name="phone" placeholder="رقم الهاتف" value="{{ old('phone') }}" required>
                    <input type="email" name="email" placeholder="البريد الإلكتروني (اختياري)" value="{{ old('email') }}">
                    <input type="text" name="subject" placeholder="موضوع الرسالة" value="{{ old('subject') }}">

                    <select name="project">
                        <option value="" disabled {{ old('project') ? '' : 'selected' }}>
                            اختر المشروع (اختياري)
                        </option>
                        <option value="shores" {{ old('project')=='shores'?'selected':'' }}>شورز</option>
                        <option value="bella-mera" {{ old('project')=='bella-mera'?'selected':'' }}>بيلا ميرا</option>
                        <option value="krair-lagoon" {{ old('project')=='krair-lagoon'?'selected':'' }}>كرير لاجون</option>
                        <option value="marina-flowers" {{ old('project')=='marina-flowers'?'selected':'' }}>مارينا فلاورز</option>
                        <option value="marina-sunshine" {{ old('project')=='marina-sunshine'?'selected':'' }}>مارينا صن شاين</option>
                        <option value="other" {{ old('project')=='other'?'selected':'' }}>استفسار عام</option>
                    </select>

                    <textarea name="message" placeholder="نص الرسالة" required>{{ old('message') }}</textarea>

                    <button type="submit">إرسال الرسالة</button>
                </form>

            </div>


            <!-- Office Addresses -->
            <div class="addresses">
                <div class="addresses-wrapper">

                    <div class="address">
                        <h1>مكتب الإسكندرية</h1>
                        <p>
                            ٢٤٣ طريق الحرية، سبورتنج<br>
                            تليفون: ١٩٧٨٣
                        </p>
                    </div>

                    <div class="address">
                        <h1>المكتب الرئيسي – القاهرة</h1>
                        <p>
                            ١٢٠ شارع الثورة، مصر الجديدة<br>
                            وسط البلد: ٣ ممر بهلر – قصر النيل<br>
                            الخط الساخن: ١٩٧٨٣
                        </p>
                    </div>

                    <div class="address">
                        <h1>قنوات التواصل</h1>
                        <p>
                            الخط الساخن: ١٩٧٨٣<br>
                            Facebook: @Elamargroupeg<br>
                            Instagram: @elamargroupeg<br>
                            سنتواصل معكم قريباً بعد إرسال الرسالة.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </section>

</main>


<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/js/gallary.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
