<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // لو المستخدم مش عامل تسجيل دخول
        if (!Auth::check()) {
            // رجّعه لصفحة تسجيل الدخول الانجليزي (تقدر تغيّرها للعربي)
            return redirect()->route('customer.en')
                             ->with('error', 'Please log in to access your dashboard.');
        }

        return $next($request);
    }
}
