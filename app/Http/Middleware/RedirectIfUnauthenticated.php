<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfUnauthenticated
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {

            if (str_contains($request->path(), '-en')) {
                return redirect()->route('customer.en');
            }

            return redirect()->route('customer.ar');
        }

        return $next($request);
    }
}
