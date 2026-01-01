{{-- resources/views/partials/header-ar.blade.php --}}
<!-- أعلى الهيدر -->
<div class="top-header">
    <div class="container">
        <div class="header-left">

            <span>
                <a href="tel:19783">
                    <img src="{{ asset('assets/img/phone.svg') }}" alt="الهاتف">
                    <span class="hide-sm">19783</span>
                </a>
            </span>

            <span>
                <a href="mailto:info@elamargroup.com">
                    <img src="{{ asset('assets/img/mail.svg') }}" alt="البريد الإلكتروني">
                    <span class="hide-sm">info@elamargroup.com</span>
                </a>
            </span>

            <span>
                <a href="{{ route('customer.en') }}">
                    <img src="{{ asset('assets/img/globe.svg') }}" alt="اللغة">
                    <span class="hide-sm">EN</span>
                </a>
            </span>

            <span>
                <a href="https://www.google.com/maps?q=120+El-Thawra+St+Heliopolis" target="_blank">
                    <img src="{{ asset('assets/img/map.svg') }}" alt="الموقع">
                    <span class="hide-sm">١٢٠ شارع الثورة ، مصر الجديدة - ٣ ممر بهلر - ش قصر النيل. القاهرة، مصر</span>
                </a>
            </span>
        </div>
    </div>
</div>

<!-- الهيدر الرئيسي -->
<header class="main-header" dir="rtl">
    <div class="header-container">
        <div class="logo-box">
            <a href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="El Amar Group">
            </a>
        </div>

        <nav class="main-nav">
            <ul>
                <li><a href="/">الرئيسية</a></li>
                <li><a href="/about">من نحن</a></li>
                <li><a href="/projects">المشروعات</a></li>
                <li><a href="/faqs">أسئلة متكررة</a></li>
                <li><a href="/contact">اتصل بنا</a></li>

                @guest
                    <li><a class="active" href="{{ route('customer.ar') }}">تسجيل دخول</a></li>
                @endguest

                @auth
                    <li><a href="{{ url('/customer-dashboard-ar') }}">لوحة التحكم</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="logout-btn">تسجيل الخروج</button>
                        </form>
                    </li>
                @endauth

                <li><a href="/vendor">مقاولين وموردين</a></li>
            </ul>
        </nav>

        <div class="social-links">
            <a href="https://wa.me/201111111111" target="_blank"><img src="{{ asset('assets/img/whatsapp.svg') }}" alt="واتساب"></a>
            <a href="https://instagram.com/elamargroupeg" target="_blank"><img src="{{ asset('assets/img/instagram.svg') }}" alt="انستجرام"></a>
            <a href="https://facebook.com/Elamargroupeg" target="_blank"><img src="{{ asset('assets/img/facebook.svg') }}" alt="فيسبوك"></a>
        </div>
    </div>
</header>

<!-- CSS الخاص بالهيدر -->
<style>
    .top-header {
        background-color: #0b2a3e;
        color: #fff;
        font-size: 14px;
        padding: 8px 0;
    }

    .top-header .container {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: wrap;
        gap: 15px;
    }

    .top-header a {
        color: #fff;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .main-header {
        background-color: #f3e6c4;
        position: relative;
        border-bottom: 1px solid #ddd;
        font-family: 'Cairo', sans-serif;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1280px;
        margin: 0 auto;
        padding: 10px 25px;
    }

    .logo-box {
        background-color: #0b2a3e;
        padding: 10px 25px;
        border-radius: 0 0 0 8px;
    }

    .logo-box img {
        height: 55px;
        width: auto;
    }

    .main-nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 25px;
    }

    .main-nav a {
        color: #0b2a3e;
        font-weight: 600;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .main-nav a:hover,
    .main-nav a.active {
        color: #c59d5f;
    }

    .logout-btn {
        background: none;
        border: none;
        color: #c00;
        font-weight: 600;
        cursor: pointer;
    }

    .social-links {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .social-links img {
        width: 22px;
        height: 22px;
        transition: opacity 0.3s;
    }

    .social-links img:hover {
        opacity: 0.8;
    }

    @media (max-width: 992px) {
        .main-nav ul {
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .logo-box img {
            height: 45px;
        }
    }
</style>
