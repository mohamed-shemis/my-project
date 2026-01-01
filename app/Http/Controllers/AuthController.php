<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Mail\VerifyEmailMail;
use App\Mail\NewUserRegisteredMail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('customer');
    }

    /**
     * تسجيل عميل جديد + إرسال بريد تفعيل + إشعار أدمن
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|min:8',
            'password' => 'required|min:6|confirmed',
        ]);

        // إنشاء رمز التفعيل
        $token = Str::random(40);

        // إنشاء المستخدم
        $user = User::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'password'         => Hash::make($request->password),
            'activation_token' => $token,
        ]);

        // تحديد اللغة حسب الصفحة
        $locale = $request->input('locale') === 'en' ? 'en' : 'ar';

        // ✅ إرسال بريد التفعيل للعميل
        try {
            Mail::to($user->email)->send(new VerifyEmailMail($user, $locale));
            \Log::info("✅ Verification email sent to {$user->email} [{$locale}]");
        } catch (\Exception $e) {
            \Log::error("❌ Failed to send verification email to {$user->email}: " . $e->getMessage());
        }

        // ✅ إشعار الأدمن باللغة نفسها
        try {
            Mail::to('mohamedshemis348@gmail.com')->send(new NewUserRegisteredMail($user, $locale));
            \Log::info("📩 Admin notified about {$user->email} [{$locale}]");
        } catch (\Exception $e) {
            \Log::warning("⚠️ Admin notification failed: " . $e->getMessage());
        }

        // ✅ توجيه المستخدم بعد التسجيل
        if ($locale === 'en') {
            return redirect('/customer-en')
                ->with('success', 'Your account has been created. Please check your email to activate your account before logging in.');
        }

        return redirect('/customer')
            ->with('success', 'تم إنشاء حسابك بنجاح. برجاء تفعيل البريد الإلكتروني قبل تسجيل الدخول.');
    }

    /**
     * ✅ تفعيل الحساب باللغتين
     */
    public function activate($token, Request $request)
    {
        $user = User::where('activation_token', $token)->first();
        $locale = $request->query('locale', 'ar'); // نقرأ اللغة من الرابط

        // المستخدم غير موجود
        if (! $user) {
            $route = $locale === 'en' ? 'customer.login.en' : 'customer.login.ar';
            $msg = $locale === 'en'
                ? 'Invalid or expired activation link.'
                : 'رابط التفعيل غير صالح أو منتهي.';
            return redirect()->route($route)->with('error', $msg);
        }

        // الحساب مفعّل مسبقًا
        if ($user->email_verified_at) {
            $route = $locale === 'en' ? 'customer.login.en' : 'customer.login.ar';
            $msg = $locale === 'en'
                ? 'Your account is already activated. You can log in now.'
                : 'تم تفعيل الحساب مسبقًا. يمكنك تسجيل الدخول الآن.';
            return redirect()->route($route)->with('info', $msg);
        }

        // تفعيل الحساب
        $user->email_verified_at = now();
        $user->activation_token = null;
        $user->save();

        $route = $locale === 'en' ? 'customer.login.en' : 'customer.login.ar';
        $msg = $locale === 'en'
            ? 'Your email has been successfully verified. You can now log in.'
            : 'تم تفعيل البريد الإلكتروني بنجاح. يمكنك الآن تسجيل الدخول.';

        return redirect()->route($route)->with('success', $msg);
    }

    /**
     * ✅ تسجيل الدخول باللغتين (يعتمد على اللغة المخزنة في الجلسة)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        // التحقق من وجود المستخدم
        if (! $user) {
            return back()->with('error', 'هذا البريد الإلكتروني غير مسجل.');
        }

        // التحقق من تفعيل الحساب
        if (! $user->email_verified_at) {
            return back()->with('error', 'الحساب غير مفعّل. يرجى تفعيل بريدك الإلكتروني أولاً.');
        }

        // تسجيل الدخول
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->regenerateToken();

            // ✅ اللغة من الجلسة أو من الرابط الحالي
            $locale = session('locale', 'ar');

            // لو مفيش جلسة، نحاول تحديدها من الصفحة اللي المستخدم فيها
            if (!$locale) {
                $referer = $request->headers->get('referer') ?? url()->previous();
                $locale = str_contains($referer, 'customer-en') ? 'en' : 'ar';
                session(['locale' => $locale]);
            }

            // ✅ تحويل المستخدم للوحة التحكم المناسبة
            if ($locale === 'en') {
                return redirect()->intended('/customer-dashboard-en')->with('success', 'Welcome back!');
            }

            return redirect()->intended('/customer-dashboard-ar')->with('success', 'مرحباً بك!');
        }

        return back()->with('error', 'بيانات الدخول غير صحيحة.');
    }

    /**
     * تسجيل الخروج
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'تم تسجيل الخروج بنجاح.');
    }
}
