<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RememberLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->url();

        // لو المستخدم داخل من صفحة العملاء العربية
        if (str_contains($url, 'customer') && !str_contains($url, 'customer-en')) {
            session(['locale' => 'ar']);
        }

        // لو المستخدم داخل من صفحة العملاء الإنجليزية
        if (str_contains($url, 'customer-en')) {
            session(['locale' => 'en']);
        }

        // أثناء تسجيل الدخول أو بعده نستخدم القيمة من الجلسة
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        return $next($request);
    }
}
