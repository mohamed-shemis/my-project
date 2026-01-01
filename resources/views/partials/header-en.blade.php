{{-- resources/views/partials/header-en.blade.php --}}

<!-- Top Header -->
<div class="top-header">
    <div class="container">
        <div class="header-left">

            <span>
                <a href="tel:19783">
                    <img src="{{ asset('assets/img/phone.svg') }}" alt="Phone">
                    <span class="hide-sm">19783</span>
                </a>
            </span>

            <span>
                <a href="mailto:info@elamargroup.com">
                    <img src="{{ asset('assets/img/mail.svg') }}" alt="Email">
                    <span class="hide-sm">info@elamargroup.com</span>
                </a>
            </span>

            <!-- Switch to Arabic -->
            <span>
                <a href="{{ route('customer.ar') }}">
                    <img src="{{ asset('assets/img/globe.svg') }}" alt="Language">
                    <span class="hide-sm">AR</span>
                </a>
            </span>

            <span>
                <a href="https://www.google.com/maps?q=120+El-Thawra+St+Heliopolis+Cairo" target="_blank">
                    <img src="{{ asset('assets/img/map.svg') }}" alt="Map">
                    <span class="hide-sm">
                        120 El-Thawra St, Heliopolis – 3 Baher Passage, Kasr El‑Nile, Cairo
                    </span>
                </a>
            </span>

        </div>
    </div>
</div>

<!-- Main Header -->
<header class="main-header">
    <div class="container">

        <div class="logo">
            <a href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="El Amar Group">
            </a>
        </div>

        <div class="group-right">
            <nav class="main-nav">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-en">About Us</a></li>
                    <li><a href="/project-en">Projects</a></li>
                    <li><a href="/faqs-en">FAQ</a></li>
                    <li><a href="/contact-en">Contact Us</a></li>
                    <li><a class="active" href="{{ route('customer.en') }}">Customer Login</a></li>
                    <li><a href="/vendor">Vendors</a></li>
                </ul>
            </nav>
        </div>

        <div class="social-links">
            <a href="https://facebook.com/Elamargroupeg" target="_blank">
                <img src="{{ asset('assets/img/facebook.svg') }}">
            </a>
            <a href="https://instagram.com/elamargroupeg" target="_blank">
                <img src="{{ asset('assets/img/instagram.svg') }}">
            </a>
            <a href="https://wa.me/201111111111" target="_blank">
                <img src="{{ asset('assets/img/whatsapp.svg') }}">
            </a>
        </div>

        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <img src="{{ asset('assets/img/menu.svg') }}" alt="Menu">
        </button>

    </div>
</header>
