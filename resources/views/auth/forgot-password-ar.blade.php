<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نسيت كلمة السر | مجموعة العمار</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">
</head>
<body>

<main class="portal-wrapper">
    <section class="portal-card">

        <h1>نسيت كلمة المرور؟</h1>
        <p>أدخل بريدك الإلكتروني لإرسال رابط إعادة التعيين.</p>

        @if (session('success'))
            <div class="status success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="status error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="status error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="portal-form">
            @csrf

            <label>البريد الإلكتروني
                <input type="email" name="email" required>
            </label>

            <input type="hidden" name="locale" value="ar">

            <button type="submit" class="btn">إرسال رابط إعادة التعيين</button>
        </form>

        <p style="margin-top: 10px;">
            <a href="{{ route('customer.ar') }}">العودة لتسجيل الدخول</a>
        </p>
    </section>
</main>

</body>
</html>
