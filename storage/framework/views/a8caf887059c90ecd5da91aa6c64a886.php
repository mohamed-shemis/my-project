<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>تسجيل دخول العملاء | مجموعة العمار</title>

  <link rel="stylesheet" href="<?php echo e(asset('assets/css/swiper.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/responsive.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/portal.css')); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/logo.png')); ?>">

  <style>
    body {
      margin: 0;
      padding: 0;
      background: url('<?php echo e(asset('assets/img/687565a1f3f26B-03.jpg')); ?>') center center / cover no-repeat fixed;
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
      text-align: right;
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

  <!-- ✅ أعلى الهيدر -->
  <div class="top-header">
    <div class="container">
      <div class="header-left">
        <span>
          <a href="tel:19783">
            <img src="<?php echo e(asset('assets/img/phone.svg')); ?>" alt="الهاتف">
            <span class="hide-sm">19783</span>
          </a>
        </span>
        <span>
          <a href="mailto:info@elamargroup.com">
            <img src="<?php echo e(asset('assets/img/mail.svg')); ?>" alt="البريد الإلكتروني">
            <span class="hide-sm">info@elamargroup.com</span>
          </a>
        </span>
        <span>
          <a href="<?php echo e(route('customer.login.en')); ?>">
            <img src="<?php echo e(asset('assets/img/globe.svg')); ?>" alt="اللغة">
            <span class="hide-sm">EN</span>
          </a>
        </span>
        <span>
          <a href="https://www.google.com/maps?q=120+El-Thawra+St+Heliopolis" target="_blank">
            <img src="<?php echo e(asset('assets/img/map.svg')); ?>" alt="العنوان">
            <span class="hide-sm">١٢٠ شارع الثورة – مصر الجديدة</span>
          </a>
        </span>
      </div>
    </div>
  </div>

  <!-- ✅ الهيدر الرئيسي -->
  <header class="main-header">
    <div class="container">
      <div class="logo">
        <a href="/">
          <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="شعار مجموعة العمار">
        </a>
      </div>

      <div class="group-right">
        <nav class="main-nav">
          <ul>
            <li><a href="/">الرئيسية</a></li>
            <li><a href="/about">من نحن</a></li>
            <li><a href="/projects">المشروعات</a></li>
            <li><a href="/faqs">الأسئلة الشائعة</a></li>
            <li><a href="/contact">اتصل بنا</a></li>
            <li><a class="active" href="<?php echo e(route('customer.login.ar')); ?>">تسجيل دخول</a></li>
            <li><a href="/vendor">الموردين والمقاولين</a></li>
          </ul>
        </nav>
      </div>

      <div class="social-links">
        <a href="https://facebook.com/Elamargroupeg" target="_blank">
          <img src="<?php echo e(asset('assets/img/facebook.svg')); ?>" alt="فيسبوك">
        </a>
        <a href="https://instagram.com/elamargroupeg" target="_blank">
          <img src="<?php echo e(asset('assets/img/instagram.svg')); ?>" alt="إنستجرام">
        </a>
        <a href="https://wa.me/201111111111" target="_blank">
          <img src="<?php echo e(asset('assets/img/whatsapp.svg')); ?>" alt="واتساب">
        </a>
      </div>
    </div>
  </header>

  <!-- ✅ بوابة العملاء -->
  <main class="portal-wrapper">
    <!-- مربع تسجيل الدخول -->
    <section class="portal-card">
      <div class="portal-tabs">
        <button class="tab active" data-tab="login">تسجيل الدخول</button>
        <button class="tab" data-tab="signup">إنشاء حساب</button>
      </div>

      <!-- نموذج تسجيل الدخول -->
      <form class="portal-form" data-panel="login" method="POST" action="<?php echo e(route('login.submit')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="locale" value="ar"> <!-- ✅ اللغة العربية -->
        <label>البريد الإلكتروني</label>
        <input type="email" name="email" placeholder="example@mail.com" required>

        <label>كلمة المرور</label>
        <input type="password" name="password" placeholder="********" required>

        <button class="btn" type="submit">تسجيل الدخول</button>
      </form>

      <!-- نموذج إنشاء حساب جديد -->
      <form class="portal-form hidden" data-panel="signup" method="POST" action="<?php echo e(route('register.submit')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="locale" value="ar"> <!-- ✅ اللغة العربية -->
        <label>الاسم الكامل</label>
        <input type="text" name="name" placeholder="الاسم الكامل" required>

        <label>البريد الإلكتروني</label>
        <input type="email" name="email" placeholder="example@mail.com" required>

        <label>رقم الهاتف</label>
        <input type="text" name="phone" placeholder="01000000000" required>

        <label>كلمة المرور</label>
        <input type="password" name="password" placeholder="********" required>

        <label>تأكيد كلمة المرور</label>
        <input type="password" name="password_confirmation" placeholder="********" required>

        <button class="btn" type="submit">إنشاء الحساب</button>
      </form>
    </section>

    <!-- مربع الترحيب -->
    <section class="portal-hero">
      <h1>مرحباً بك في بوابة العملاء</h1>
      <p>يمكنك تسجيل الدخول أو إنشاء حساب جديد لمتابعة وحداتك وطلباتك.</p>
    </section>
  </main>

  <!-- ✅ تبديل النماذج -->
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
<?php /**PATH C:\laragon\www\elamar-portal\resources\views/customer.blade.php ENDPATH**/ ?>