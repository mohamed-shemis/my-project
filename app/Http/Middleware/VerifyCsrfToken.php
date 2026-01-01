<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * الإعدادات الافتراضية للتحقق من CSRF
     *
     * Laravel يستخدم هذا الميدلوير لحماية النماذج من الطلبات غير الموثوقة
     */

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // ✅ استثناء مسارات تسجيل الدخول والتسجيل أثناء التطوير لتجنب 419
        'login-submit',
        'register-submit',
        'logout',

        // ✅ لو فيه API لاحقًا أو مسارات AJAX نضيفها هنا
        // 'api/*',
    ];

    /**
     * تشير إلى إن بعض التوكينات مسموح باستخدامها كـ header
     *
     * @var array<int, string>
     */
    protected $addHttpCookie = true;
}
