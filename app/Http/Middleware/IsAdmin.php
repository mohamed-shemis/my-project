<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // لو مش عامل تسجيل دخول
        if (! Auth::check()) {

            $locale = $request->query('locale', 'en');

            return $locale === 'ar'
                ? redirect()->route('customer.ar')
                : redirect()->route('customer.en');
        }

        // لو مش أدمن
        if (! Auth::user()->is_admin) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
