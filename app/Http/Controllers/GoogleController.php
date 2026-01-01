<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REDIRECT TO GOOGLE (AR / EN)
    |--------------------------------------------------------------------------
    */
    public function redirect(Request $request)
    {
        // نلتقط اللغة من الرابط لإعادتها بعد تسجيل الدخول
        $locale = $request->query('locale', 'en');

        session(['login_locale' => $locale]);

        return Socialite::driver('google')->redirect();
    }

    /*
    |--------------------------------------------------------------------------
    | GOOGLE CALLBACK
    |--------------------------------------------------------------------------
    */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('customer.en')
                ->with('error', 'Google login failed.');
        }

        // نجيب اللغة اللي حفظناها
        $locale = session('login_locale', 'en');

        // نبحث عن المستخدم لو كان مسجل قبل كده
        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        if (! $user) {
            // إنشاء مستخدم جديد بدون كلمة مرور (Google فقط)
            $user = User::create([
                'name'                => $googleUser->getName(),
                'email'               => $googleUser->getEmail(),
                'google_id'           => $googleUser->getId(),
                'google_token'        => $googleUser->token,
                'google_refresh_token'=> $googleUser->refreshToken ?? null,
                'password'            => bcrypt(Str::random(16)),
                'email_verified_at'   => now(), // جوجل يجعل الحساب موثّق تلقائيًا
            ]);
        } else {
            // تحديث بيانات Google لو كانت ناقصة
            $user->update([
                'google_id'            => $googleUser->getId(),
                'google_token'         => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken ?? $user->google_refresh_token,
            ]);
        }

        Auth::login($user);

        return redirect()->route($locale === 'ar' ? 'dashboard.ar' : 'dashboard.en');
    }
}
