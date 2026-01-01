<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    // إعادة توجيه المستخدم لجوجل لتسجيل الدخول
    public function redirect(Request $request)
    {
        $locale = $request->query('locale', 'ar'); // حفظ اللغة
        session(['locale' => $locale]);

        return Socialite::driver('google')->redirect();
    }

    // استلام بيانات المستخدم بعد العودة من جوجل
    public function callback()
    {
        $locale = session('locale', 'ar');

        $googleUser = Socialite::driver('google')->stateless()->user();

        // ابحث عن المستخدم أو أنشئ واحد جديد
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name'  => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(10)),
                'phone' => null,
                'email_verified_at' => now(),
            ]
        );

        // تسجيل دخوله
        Auth::login($user);

        // التوجيه حسب اللغة
        return redirect()->route($locale === 'ar' ? 'dashboard.ar' : 'dashboard.en');
    }
}
