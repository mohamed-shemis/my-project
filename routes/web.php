<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Controllers
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\VendorAuthController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| PUBLIC SITE
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية
Route::get('/', [SiteController::class, 'home'])->name('home');

// صفحات ثابتة
Route::view('/about', 'about')->name('about');
Route::view('/projects', 'project')->name('projects');
Route::view('/faqs', 'faqs')->name('faqs');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact.show');
Route::post('/contact/send', [ClientController::class, 'store'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION (LOGIN / REGISTER / ACTIVATE)
|--------------------------------------------------------------------------
*/

// صفحة تسجيل الدخول العامة
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// تنفيذ التسجيل / تسجيل الدخول
Route::post('/login-submit', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register-submit', [AuthController::class, 'register'])->name('register.submit');

// ✅ تفعيل الحساب عبر الإيميل (يدعم اللغة)
Route::get('/activate/{token}', function ($token, Request $request) {
    $controller = app(AuthController::class);
    return $controller->activate($token, $request);
})->name('activate.account');

// إعادة إرسال التفعيل
Route::post('/resend-activation', [AuthController::class, 'resendActivation'])->name('resend.activation');

// نسيان كلمة المرور
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

/*
|--------------------------------------------------------------------------
| CUSTOMER PORTAL (بوابة العملاء)
|--------------------------------------------------------------------------
*/

// 🔹 صفحات تسجيل الدخول باللغتين
Route::get('/customer', [CustomerController::class, 'loginPageAr'])->name('customer.login.ar');
Route::get('/customer-en', [CustomerController::class, 'loginPageEn'])->name('customer.login.en');

// 🔹 لوحات التحكم بعد تسجيل الدخول
Route::middleware('auth')->group(function () {
    Route::get('/customer-dashboard-ar', [CustomerController::class, 'dashboardAr'])->name('customer.dashboard.ar');
    Route::get('/customer-dashboard-en', [CustomerController::class, 'dashboardEn'])->name('customer.dashboard.en');

    // صفحة تغيير كلمة المرور
    Route::view('/change-password', 'auth.change-password')->name('change.password');
    Route::post('/change-password-submit', [AuthController::class, 'changePassword'])->name('change.password.submit');
});

// 🔹 تسجيل الخروج
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| SOCIAL LOGIN (Google)
|--------------------------------------------------------------------------
*/
Route::get('/auth/google/redirect', [SocialAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialAuthController::class, 'callback'])->name('google.callback');

/*
|--------------------------------------------------------------------------
| VENDOR LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/vendor/login', [VendorAuthController::class, 'showLoginForm'])->name('vendor.login.show');
Route::post('/vendor/login', [VendorAuthController::class, 'login'])->name('vendor.login.process');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (لوحة الإدارة)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::get('/requests', [AdminController::class, 'requests'])->name('admin.requests');
});
