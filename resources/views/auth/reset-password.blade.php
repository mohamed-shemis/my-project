<!DOCTYPE html>
<html lang="{{ $locale === 'ar' ? 'ar' : 'en' }}" dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>{{ $locale === 'ar' ? 'إعادة تعيين كلمة المرور' : 'Reset Password' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">
</head>
<body>

<main class="portal-wrapper">
    <section class="portal-card">

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

        <h1>
            {{ $locale === 'ar' ? 'إعادة تعيين كلمة المرور' : 'Reset your password' }}
        </h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="locale" value="{{ $locale }}">

            <label>
                {{ $locale === 'ar' ? 'كلمة المرور الجديدة' : 'New Password' }}
                <input type="password" name="password" required>
            </label>

            <label>
                {{ $locale === 'ar' ? 'تأكيد كلمة المرور' : 'Confirm Password' }}
                <input type="password" name="password_confirmation" required>
            </label>

            <button class="btn" type="submit">
                {{ $locale === 'ar' ? 'حفظ كلمة المرور' : 'Save Password' }}
            </button>
        </form>

    </section>
</main>

</body>
</html>
