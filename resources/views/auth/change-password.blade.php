<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>{{ $locale === 'ar' ? 'تغيير كلمة المرور' : 'Change Password' }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">
</head>

<body>

<main class="portal-wrapper">

    <section class="portal-hero">
        <h1>{{ $locale === 'ar' ? 'تغيير كلمة المرور' : 'Change Password' }}</h1>
    </section>

    <section class="portal-card">

        @if (session('success'))
            <div class="status success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="status error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="status error">
                @foreach ($errors->all() as $e)
                    <p>{{ $e }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('change.password.submit') }}">
            @csrf

            <label>
                {{ $locale === 'ar' ? 'كلمة المرور الحالية' : 'Current Password' }}
                <input type="password" name="current_password" required>
            </label>

            <label>
                {{ $locale === 'ar' ? 'كلمة مرور جديدة' : 'New Password' }}
                <input type="password" name="password" required>
            </label>

            <label>
                {{ $locale === 'ar' ? 'تأكيد كلمة المرور' : 'Confirm Password' }}
                <input type="password" name="password_confirmation" required>
            </label>

            <input type="hidden" name="locale" value="{{ $locale }}">

            <button class="btn" type="submit">
                {{ $locale === 'ar' ? 'تغيير كلمة المرور' : 'Change Password' }}
            </button>
        </form>

    </section>

</main>

</body>
</html>
