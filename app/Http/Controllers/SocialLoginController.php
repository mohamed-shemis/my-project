<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    // الخطوة 1: التحويل لجوجل
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // الخطوة 2: استلام بيانات المستخدم من جوجل
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // هل المستخدم موجود مسبقاً ؟
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // إنشاء مستخدم جديد
            $user = User::create([
                'name'     => $googleUser->getName(),
                'email'    => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(16)),
                'email_verified_at' => now(), // جوجل يعطينا بريد موثّق
            ]);
        }

        Auth::login($user);

        // توجيه حسب اللغة
        return redirect('/customer-dashboard-ar');
    }
}
