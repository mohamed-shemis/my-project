<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * ✅ صفحة تسجيل الدخول العربية
     */
    public function loginPageAr()
    {
        // نحفظ اللغة في الجلسة
        session(['locale' => 'ar']);
        app()->setLocale('ar');

        return view('customer'); // customer.blade.php
    }

    /**
     * ✅ صفحة تسجيل الدخول الإنجليزية
     */
    public function loginPageEn()
    {
        // نحفظ اللغة في الجلسة
        session(['locale' => 'en']);
        app()->setLocale('en');

        return view('customer-en'); // customer-en.blade.php
    }

    /**
     * ✅ تسجيل الدخول (اللغة من الجلسة)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // نقرأ اللغة من الجلسة
            $locale = session('locale', 'ar');

            if ($locale === 'en') {
                return redirect()->route('customer.dashboard.en')->with('success', 'Welcome back!');
            }

            return redirect()->route('customer.dashboard.ar')->with('success', 'مرحباً بك!');
        }

        $locale = session('locale', 'ar');

        if ($locale === 'en') {
            return back()->withErrors(['email' => 'Incorrect login credentials.']);
        }

        return back()->withErrors(['email' => 'بيانات الدخول غير صحيحة.']);
    }

    /**
     * ✅ إنشاء حساب جديد
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        $locale = session('locale', 'ar');

        if ($locale === 'en') {
            return redirect()->route('customer.dashboard.en')->with('success', 'Account created successfully.');
        }

        return redirect()->route('customer.dashboard.ar')->with('success', 'تم إنشاء الحساب بنجاح.');
    }

    /**
     * ✅ لوحة التحكم العربية
     */
    public function dashboardAr()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('customer.login.ar')->with('error', 'الرجاء تسجيل الدخول أولاً');
        }

        return view('customer-dashboard-ar', compact('user'));
    }

    /**
     * ✅ لوحة التحكم الإنجليزية
     */
    public function dashboardEn()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('customer.login.en')->with('error', 'Please log in first.');
        }

        return view('customer-dashboard-en', compact('user'));
    }

    /**
     * ✅ تسجيل الخروج
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // نعيد المستخدم للواجهة حسب اللغة المخزنة
        $locale = session('locale', 'ar');

        if ($locale === 'en') {
            return redirect()->route('customer.login.en')->with('info', 'You have been logged out.');
        }

        return redirect()->route('customer.login.ar')->with('info', 'تم تسجيل الخروج بنجاح.');
    }
}
