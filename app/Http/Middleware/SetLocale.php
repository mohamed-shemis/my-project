<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // تحديد اللغة من الجلسة أو من الرابط
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } else {
            $url = $request->url();
            if (str_contains($url, 'customer-en') || str_contains($url, 'dashboard-en')) {
                session(['locale' => 'en']);
                app()->setLocale('en');
            } else {
                session(['locale' => 'ar']);
                app()->setLocale('ar');
            }
        }

        return $next($request);
    }
}
