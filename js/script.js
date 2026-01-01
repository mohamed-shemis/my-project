// ================== MOBILE MENU ==================
(function () {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const closeMobileMenuBtn = document.getElementById('closeMobileMenuBtn');
    const body = document.body;

    if (!mobileMenuBtn || !mobileMenuOverlay) return;

    function openMenu() {
        mobileMenuBtn.classList.add('active');
        mobileMenuOverlay.classList.add('active');
        body.classList.add('menu-open');
    }

    function closeMenu() {
        mobileMenuBtn.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
        body.classList.remove('menu-open');
    }

    function toggleMenu() {
        if (mobileMenuOverlay.classList.contains('active')) {
            closeMenu();
        } else {
            openMenu();
        }
    }

    mobileMenuBtn.addEventListener('click', toggleMenu);

    if (closeMobileMenuBtn) {
        closeMobileMenuBtn.addEventListener('click', closeMenu);
    }

    mobileMenuOverlay.addEventListener('click', function (e) {
        if (e.target === mobileMenuOverlay) {
            closeMenu();
        }
    });

    const mobileNavLinks = document.querySelectorAll('.mobile-nav a');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 1280) {
            closeMenu();
        }
    });
})();


// ================== ON DOM READY ==================
document.addEventListener('DOMContentLoaded', function () {
    initHeroSlider();
    initStatisticsCounters();
    initProjectSlider();
});


// ================== HERO SLIDER + TEXT ==================
function initHeroSlider() {
    if (typeof Swiper === 'undefined') return;

    const heroSliderEl = document.querySelector('.heroSlider');
    if (!heroSliderEl) return;

    const swiper = new Swiper('.heroSlider', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        speed: 800,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        on: {
            slideChange: function () {
                syncHeroText(this.realIndex);
            }
        }
    });

    // تأكد إن أول تكست مفعّل لو السلايدر بدأ قبل ما الكود يشتغل
    const firstText = document.querySelector('.slides-text [data-slide="0"]');
    if (firstText && !firstText.classList.contains('active')) {
        firstText.classList.add('active');
    }

    function syncHeroText(activeIndex) {
        const allTexts = document.querySelectorAll('.slides-text .slide-text');
        const currentActive = document.querySelector('.slides-text .slide-text.active');
        const newActive = document.querySelector(`.slides-text [data-slide="${activeIndex}"]`);

        if (!newActive) return;

        if (currentActive && currentActive !== newActive) {
            currentActive.classList.remove('active');
            currentActive.classList.add('slide-out-up');

            setTimeout(() => {
                allTexts.forEach(text => {
                    text.classList.remove(
                        'active',
                        'slide-out-up',
                        'slide-out-down',
                        'slide-in-up',
                        'slide-in-down'
                    );
                });

                newActive.classList.add('slide-in-down');

                setTimeout(() => {
                    newActive.classList.remove('slide-in-down');
                    newActive.classList.add('active');
                }, 50);
            }, 250);
        } else if (!currentActive) {
            newActive.classList.add('active');
        }
    }
}


// ================== STATISTICS COUNTERS ==================
function initStatisticsCounters() {
    const section = document.getElementById('statisticsSection');
    const counters = document.querySelectorAll('#statisticsSection .counter-number');

    if (!section || counters.length === 0) return;

    let started = false;

    function startCounters() {
        if (started) return;
        started = true;
        counters.forEach(animateCounter);
    }

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounters();
                    obs.unobserve(section);
                }
            });
        }, { threshold: 0.3 });

        observer.observe(section);
    } else {
        // متصفحات قديمة
        startCounters();
    }

    function animateCounter(counter) {
        const targetAttr = counter.getAttribute('data-target') || '';
        const target = parseInt(targetAttr.replace(/\D/g, ''), 10);

        const suffixAttr = counter.getAttribute('data-suffix') || '';
        const original = counter.textContent || '';
        const existingSuffix = suffixAttr || original.replace(/[\d,\s]/g, '');
        const suffix = existingSuffix ? ' ' + existingSuffix.trim() : '';

        if (isNaN(target)) return;

        const duration = 2000; // 2 ثانية
        const startTime = performance.now();

        function update(now) {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3); // ease-out
            const value = Math.floor(eased * target);

            counter.textContent = value.toLocaleString('en-US') + suffix;

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }

        requestAnimationFrame(update);
    }
}


// ================== PROJECT PAGE SLIDER (لو موجود) ==================
function initProjectSlider() {
    if (typeof Swiper === 'undefined') return;

    const projectSliderEl = document.querySelector('.project-slider');
    if (!projectSliderEl) return;

    // بنفترض إن div.project-slider هو نفسه الـ Swiper container
    new Swiper('.project-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        speed: 600,
    });
}
