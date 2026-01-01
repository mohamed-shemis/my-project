<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Contact Us | El Amar Group</title>

    <!-- CSS -->
    <<link rel="stylesheet" href="../assets/css/swiper.css" />
<link rel="stylesheet" href="../assets/css/main.css" />
<link rel="stylesheet" href="../assets/css/responsive.css" />

    <!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.png" /> />

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src =
                "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-N89NKMPD");
    </script>

</head>

<body>

    <!-- GTM (noscript) -->
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
                        <img src="../assets/img/phone.svg" />
                        <span class="hide-sm">19783</span>
                    </a>
                </span>

                <span>
                    <a href="#">
                        <img src="../assets/img/mail.svg" />
                        <span class="hide-sm">info@elamargroup.com</span>
                    </a>
                </span>

                <!-- Switch to Arabic -->
                <span>
                    <a href="{{ url('contact.html') }}">
                        <img src="../assets/img/globe.svg" />
                        <span class="hide-sm">AR</span>
                    </a>
                </span>

                <span>
                    <a target="_blank"
                       href="https://www.google.com/maps/search/?q=120+El-Thawra+St+Heliopolis+Cairo">
                        <img src="../assets/img/map.svg" />
                        <span class="hide-sm">
                            120 El-Thawra St, Heliopolis – Kasr El‑Nile, Cairo
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
                <a href="{{ url('ELAMAE EN.html') }}">
                    <img src="../assets/img/logo.png" alt="El Amar Group" />
                </a>
            </div>

            <div class="group-right">
                <nav class="main-nav">
                    <ul>
                        <li><a href="{{ url('ELAMAE EN.html') }}">Home</a></li>
                        <li><a href="{{ url('about-en.html') }}">About Us</a></li>
                        <li><a href="{{ url('project-en.html') }}">Projects</a></li>
                        <li><a href="{{ url('faqs-en.html') }}">FAQ</a></li>
                        <li><a class="active" href="{{ route('contact.en') }}">Contact Us</a></li>
                        <li><a href="{{ url('customer.html') }}">Customer Login</a></li>
                        <li><a href="{{ url('VENDOR.html') }}">Vendors</a></li>
                    </ul>
                </nav>
            </div>

            <div class="social-links">
                <a href="https://www.facebook.com/Elamargroupeg" target="_blank">
                    <img src="../assets/img/facebook.svg" />
                </a>
                <a href="https://www.instagram.com/elamargroupeg/" target="_blank">
                    <img src="../assets/img/instagram.svg" />
                </a>
                <a href="https://wa.me/201111111111" target="_blank">
                    <img src="../assets/img/whatsapp.svg" />
                </a>
            </div>

            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <img src="../assets/img/menu.svg" alt="Menu">
            </button>

        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu-overlay" id="mobileMenuOverlay">

            <button class="close-btn" id="closeMobileMenuBtn">
                <img src="../assets/img/close.svg" />
            </button>

            <div class="mobile-menu-content">
                <nav class="mobile-nav">
                    <ul>
                        <li><a href="{{ url('ELAMAE EN.html') }}">Home</a></li>
                        <li><a href="{{ url('about-en.html') }}">About Us</a></li>
                        <li><a href="{{ url('project-en.html') }}">Projects</a></li>
                        <li><a href="{{ url('faqs-en.html') }}">FAQ</a></li>
                        <li><a href="{{ route('contact.en') }}">Contact Us</a></li>
                        <li><a href="{{ url('customer.html') }}">Customer Login</a></li>
                        <li><a href="{{ url('VENDOR.html') }}">Vendors</a></li>
                    </ul>
                </nav>

                <div class="mobile-social-links">
                    <a href="https://www.facebook.com/Elamargroupeg" target="_blank">
                        <img src="../assets/img/facebook.svg" />
                    </a>
                    <a href="https://www.instagram.com/elamargroupeg/" target="_blank">
                        <img src="../assets/img/instagram.svg" />
                    </a>
                </div>
            </div>

        </div>

    </header>


    <!-- Page Content -->
    <main>

        <!-- Page Header -->
        <section class="page-header">
            <img src="../assets/img/project7.jpg" alt="Contact Us" />
            <h1>Contact Us</h1>

            <div class="links">
                <a href="{{ url('ELAMAE EN.html') }}">Home</a>
                <img src="../assets/img/arrow-right.svg" />
                <span>Contact Us</span>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact">
            <div class="container">

                <!-- Contact Form -->
                <div class="form-wrapper">

                    <div class="head">
                        <div>
                            <h1><span>Get in</span> Touch</h1>
                            <p>
                                Our team is ready to answer your questions about projects,
                                payment plans, and guided site visits.
                            </p>
                        </div>
                        <img src="../assets/img/customer-icon.png" alt="">
                    </div>

                    {{-- رسائل النجاح / الأخطاء --}}
                    @if(session('success'))
                        <div class="alert alert-success" style="margin-bottom: 15px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" style="margin-bottom: 15px;">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <input
                            type="text"
                            name="name"
                            placeholder="Full Name"
                            value="{{ old('name') }}"
                            required
                        />

                        <input
                            type="tel"
                            name="phone"
                            placeholder="Phone Number"
                            value="{{ old('phone') }}"
                            required
                        />

                        <input
                            type="email"
                            name="email"
                            placeholder="Email (Optional)"
                            value="{{ old('email') }}"
                        />

                        <input
                            type="text"
                            name="subject"
                            placeholder="Subject"
                            value="{{ old('subject') }}"
                        />

                        <select name="project">
                            <option disabled {{ old('project') ? '' : 'selected' }}>
                                Select a Project (Optional)
                            </option>
                            <option value="shores" {{ old('project') == 'shores' ? 'selected' : '' }}>
                                Shores – North Coast
                            </option>
                            <option value="bella-mera" {{ old('project') == 'bella-mera' ? 'selected' : '' }}>
                                Bella Mera Resort
                            </option>
                            <option value="krair-lagoon" {{ old('project') == 'krair-lagoon' ? 'selected' : '' }}>
                                Krair Lagoon
                            </option>
                            <option value="marina-flowers" {{ old('project') == 'marina-flowers' ? 'selected' : '' }}>
                                Marina Flowers
                            </option>
                            <option value="marina-sunshine" {{ old('project') == 'marina-sunshine' ? 'selected' : '' }}>
                                Marina Sun Shine
                            </option>
                            <option value="other" {{ old('project') == 'other' ? 'selected' : '' }}>
                                Other / General Inquiry
                            </option>
                        </select>

                        <textarea
                            name="message"
                            placeholder="Your Message"
                            required
                        >{{ old('message') }}</textarea>

                        <button type="submit">Send Message</button>
                    </form>

                </div>

                <!-- Office Addresses -->
                <div class="addresses">
                    <div class="addresses-wrapper">

                        <div class="address">
                            <h1>Alexandria Office</h1>
                            <p>
                                243 Al‑Horreya Road, Sporting<br>
                                Hotline: 19783
                            </p>
                        </div>

                        <div class="address">
                            <h1>Head Office – Cairo</h1>
                            <p>
                                Heliopolis: 120 El‑Thawra Street<br>
                                Downtown: 3 Baher Passage, Kasr El‑Nile<br>
                                Hotline: 19783
                            </p>
                        </div>

                        <div class="address">
                            <h1>Contact Channels</h1>
                            <p>
                                Hotline: 19783<br>
                                Facebook: @Elamargroupeg<br>
                                Instagram: @elamargroupeg<br>
                                Our team will respond shortly after receiving your message.
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/gallary.js"></script>
<script src="../assets/js/script.js"></script>

</body>
</html>
