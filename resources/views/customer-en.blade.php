<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer Login | El Amar Group</title>

  <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">

  <style>
    body {
      margin: 0;
      padding: 0;
      background: url('{{ asset('assets/img/687565a1f3f26B-03.jpg') }}') center center / cover no-repeat fixed;
      background-attachment: fixed;
      overflow-x: hidden;
    }

    .top-header,
    .main-header {
      position: relative;
      z-index: 1000;
    }

    main.portal-wrapper {
      width: 100%;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 40px;
      flex-wrap: wrap;
      padding: 70px 0 100px 0;
      position: relative;
      z-index: 1;
    }

    main.portal-wrapper::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.15);
      z-index: 0;
    }

    .portal-hero,
    .portal-card {
      flex: 1;
      min-width: 380px;
      max-width: 480px;
      background: rgba(0, 0, 0, 0.55);
      color: #fff;
      padding: 25px 30px;
      border-radius: 18px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-height: 300px;
      backdrop-filter: blur(5px);
      position: relative;
      z-index: 1;
    }

    .portal-hero {
      text-align: center;
    }

    .portal-hero h1 {
      font-size: 26px;
      margin-bottom: 10px;
    }

    .portal-hero p {
      font-size: 16px;
      line-height: 1.6;
      color: #e8e8e8;
    }

    .portal-card {
      text-align: left;
    }

    .portal-card input {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: none;
      outline: none;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
    }

    .portal-card input::placeholder {
      color: #ccc;
    }

    .btn {
      background: #032642;
      color: #fff;
      padding: 10px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn:hover {
      background: #041c30;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(3, 38, 66, 0.3);
    }

    .portal-tabs {
      display: flex;
      margin-bottom: 15px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 8px;
    }

    .portal-tabs .tab {
      flex: 1;
      padding: 8px;
      cursor: pointer;
      text-align: center;
      border: none;
      background: transparent;
      color: #fff;
      font-weight: 700;
      border-bottom: 2px solid transparent;
      transition: 0.3s;
    }

    .portal-tabs .tab.active {
      color: #fff;
      border-color: #b09e85;
    }

    .portal-form {
      display: grid;
      gap: 10px;
    }

    .portal-form.hidden {
      display: none;
    }

    @media (max-width: 900px) {
      main.portal-wrapper {
        flex-direction: column;
        align-items: center;
        padding: 40px 0;
      }

      .portal-hero,
      .portal-card {
        max-width: 90%;
        min-height: 280px;
      }
    }
  </style>
</head>

<body>

  <!-- ✅ Top Header -->
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
        <span>
          <a href="{{ route('customer.login.ar') }}">
            <img src="{{ asset('assets/img/globe.svg') }}" alt="Language">
            <span class="hide-sm">AR</span>
          </a>
        </span>
        <span>
          <a href="https://www.google.com/maps?q=120+El-Thawra+St+Heliopolis" target="_blank">
            <img src="{{ asset('assets/img/map.svg') }}" alt="Address">
            <span class="hide-sm">120 El-Thawra St – Heliopolis</span>
          </a>
        </span>
      </div>
    </div>
  </div>

  <!-- ✅ Main Header -->
  <header class="main-header">
    <div class="container">
      <div class="logo">
        <a href="/">
          <img src="{{ asset('assets/img/logo.png') }}" alt="El Amar Logo">
        </a>
      </div>

      <div class="group-right">
        <nav class="main-nav">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/faqs">FAQs</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a class="active" href="{{ route('customer.login.en') }}">Customer Login</a></li>
            <li><a href="/vendor">Vendors & Contractors</a></li>
          </ul>
        </nav>
      </div>

      <div class="social-links">
        <a href="https://facebook.com/Elamargroupeg" target="_blank">
          <img src="{{ asset('assets/img/facebook.svg') }}" alt="Facebook">
        </a>
        <a href="https://instagram.com/elamargroupeg" target="_blank">
          <img src="{{ asset('assets/img/instagram.svg') }}" alt="Instagram">
        </a>
        <a href="https://wa.me/201111111111" target="_blank">
          <img src="{{ asset('assets/img/whatsapp.svg') }}" alt="WhatsApp">
        </a>
      </div>
    </div>
  </header>

  <!-- ✅ Customer Portal -->
  <main class="portal-wrapper">

    <!-- Login Section -->
    <section class="portal-card">
      <div class="portal-tabs">
        <button class="tab active" data-tab="login">Login</button>
        <button class="tab" data-tab="signup">Sign Up</button>
      </div>

      <!-- Login Form -->
      <form class="portal-form" data-panel="login" method="POST" action="{{ route('login.submit') }}">
        @csrf
        <input type="hidden" name="locale" value="en">
        <label>Email Address</label>
        <input type="email" name="email" placeholder="example@mail.com" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="********" required>

        <button class="btn" type="submit">Login</button>
      </form>

      <!-- Sign Up Form -->
      <form class="portal-form hidden" data-panel="signup" method="POST" action="{{ route('register.submit') }}">
        @csrf
        <input type="hidden" name="locale" value="en">
        <label>Full Name</label>
        <input type="text" name="name" placeholder="Full Name" required>

        <label>Email Address</label>
        <input type="email" name="email" placeholder="example@mail.com" required>

        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="01000000000" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="********" required>

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="********" required>

        <button class="btn" type="submit">Create Account</button>
      </form>
    </section>

    <!-- Welcome Section -->
    <section class="portal-hero">
      <h1>Welcome to El Amar Group Customer Portal</h1>
      <p>You can log in or create a new account to follow your units and service requests.</p>
    </section>

  </main>

  <!-- ✅ Tabs Toggle Script -->
  <script>
    const tabs = document.querySelectorAll('.portal-tabs .tab');
    const forms = document.querySelectorAll('.portal-form');
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const target = tab.dataset.tab;
        forms.forEach(form => {
          form.classList.toggle('hidden', form.dataset.panel !== target);
        });
      });
    });
  </script>

</body>
</html>
