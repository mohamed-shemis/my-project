<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer Dashboard | El Amar Group</title>

  <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/portal.css')); ?>">
  <style>
    html, body { margin: 0; padding: 0; font-family: "Tajawal", Arial, sans-serif; position: relative; min-height: 100%; }
    body::before { content: ""; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
      background: url('<?php echo e(asset('assets/img/687565a1f3f26B-03.jpg')); ?>') center center / cover no-repeat;
      z-index: -1; opacity: 1; }
    .header-video video { width: 100%; height: auto; max-height: 450px; object-fit: cover; display: block; }
    .marquee-container { background: linear-gradient(90deg, #f1f5f6c2, #8dc6beb5, #22968cbc, #046f6a);
      background-size: 400% 100%; animation: marqueeGradient 10s linear infinite; color: #fff; font-size: 16px;
      padding: 10px 0; text-align: center; font-weight: bold; border-top: 2px solid #bfa575; border-bottom: 2px solid #bfa575;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);}
    @keyframes marqueeGradient { 0% { background-position: 0% 50%; } 100% { background-position: 100% 50%; } }
    .dashboard-container { max-width: 1200px; margin: 25px auto; padding: 20px; background: transparent; border-radius: 12px; position: relative; z-index: 1; }
    .dashboard-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #1286de; padding-bottom: 12px; }
    .user-info { display: flex; align-items: center; gap: 20px; color: #fefefe; }
    .user-info img { width:60px; height: 60px; border-radius: 50%; border: 3px solid #18f0f4; }
    .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-top: 25px; }
    .dash-card { background: rgba(205, 223, 218, 0.45); backdrop-filter: blur(10px); color: #fff; border-radius: 18px;
      padding: 25px; border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2); transition: all 0.6s ease;
      opacity: 0; transform: translateY(30px);}
    .dash-card.show { opacity: 1; transform: translateY(0); }
    .logout-btn { background: #c00; color: #fff; border: none; padding: 8px 18px; border-radius: 6px; cursor: pointer; transition: 0.3s; }
    .logout-btn:hover { background: #a00; }
    .logout-section { text-align: center; margin-top: 30px; }
  </style>
</head>
<body>

  <?php if(!isset($user)): ?>
      <script>window.location.href = "<?php echo e(route('customer.login.en')); ?>";</script>
  <?php endif; ?>

  <div class="top-header">
    <div class="container">
      <div class="header-left">
        <span><a href="tel:19783"><img src="<?php echo e(asset('assets/img/phone.svg')); ?>" alt="Phone">19783</a></span>
        <span><a href="mailto:info@elamargroup.com"><img src="<?php echo e(asset('assets/img/mail.svg')); ?>" alt="Email">info@elamargroup.com</a></span>
        <span><a href="<?php echo e(route('customer.dashboard.ar')); ?>"><img src="<?php echo e(asset('assets/img/globe.svg')); ?>" alt="Language">AR</a></span>
        <span><a href="https://www.google.com/maps?q=120+El-Thawra+St+Heliopolis" target="_blank"><img src="<?php echo e(asset('assets/img/map.svg')); ?>" alt="Address">120 El-Thawra St, Heliopolis</a></span>
      </div>
    </div>
  </div>

  <header class="main-header">
    <div class="container">
      <div class="logo">
        <a href="/"><img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="El Amar Logo"></a>
      </div>
      <div class="group-right">
        <nav class="main-nav">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/faqs">FAQs</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a class="active" href="<?php echo e(route('customer.dashboard.en')); ?>">Customer Login</a></li>
            <li><a href="/vendor">Vendors & Contractors</a></li>
          </ul>
        </nav>
      </div>
      <div class="social-links">
        <a href="https://facebook.com/Elamargroupeg" target="_blank"><img src="<?php echo e(asset('assets/img/facebook.svg')); ?>" alt="Facebook"></a>
        <a href="https://instagram.com/elamargroupeg" target="_blank"><img src="<?php echo e(asset('assets/img/instagram.svg')); ?>" alt="Instagram"></a>
        <a href="https://wa.me/201111111111" target="_blank"><img src="<?php echo e(asset('assets/img/whatsapp.svg')); ?>" alt="WhatsApp"></a>
      </div>
    </div>
  </header>

  <div class="header-video">
    <video autoplay muted loop playsinline>
      <source src="<?php echo e(asset('assets/video/customer-dashboard.mp4')); ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

  <div class="marquee-container">
    <marquee direction="left" scrollamount="4">
      🎉 Welcome to El Amar Group’s Customer Portal — Track your unit status, requests, and enjoy exclusive offers 🔔
    </marquee>
  </div>

  <div class="dashboard-container">
    <div class="dashboard-header">
      <div class="user-info">
        <img src="<?php echo e(asset('assets/img/section-title-icon.png')); ?>" alt="User">
        <span><?php echo e($user->name ?? 'Guest'); ?></span>
      </div>
    </div>

    <div class="dashboard-grid">
      <div class="dash-card">
        <h3>Account Information</h3>
        <p><strong>Name:</strong> <?php echo e($user->name ?? 'N/A'); ?></p>
        <p><strong>Email:</strong> <?php echo e($user->email ?? 'N/A'); ?></p>
        <p><strong>Phone:</strong> <?php echo e($user->phone ?? 'N/A'); ?></p>
        <p><strong>Registered on:</strong> <?php echo e($user->created_at ? $user->created_at->format('Y-m-d') : 'N/A'); ?></p>
      </div>

      <div class="dash-card">
        <h3>Account Settings</h3>
        <p>You can update your password or personal details here.</p>
        <a class="btn" href="/change-password">Change Password</a>
      </div>

      <div class="dash-card">
        <h3>Requests & Projects</h3>
        <p>View your submitted requests and registered real estate units.</p>
        <a class="btn" href="#">View Details</a>
      </div>

      <div class="dash-card">
        <h3>Customer Support</h3>
        <p>Contact us for any inquiries or technical assistance.</p>
        <a class="btn" href="/contact">Contact Us</a>
      </div>
    </div>

    <div class="logout-section">
      <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </div>
  </div>

  <script>
    const cards = document.querySelectorAll('.dash-card');
    const revealOnScroll = () => {
      const triggerBottom = window.innerHeight * 0.95;
      cards.forEach(card => {
        const cardTop = card.getBoundingClientRect().top;
        if (cardTop < triggerBottom) card.classList.add('show');
      });
    };
    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', revealOnScroll);
  </script>
</body>
</html>
<?php /**PATH C:\laragon\www\elamar-portal\resources\views/customer-dashboard-en.blade.php ENDPATH**/ ?>