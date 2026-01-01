<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | El Amar Group</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">
</head>
<body>

<main class="portal-wrapper">
    <section class="portal-card">

        <h1>Forgot your password?</h1>
        <p>Enter your email to receive a reset link.</p>

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

            <label>Email
                <input type="email" name="email" required>
            </label>

            <input type="hidden" name="locale" value="en">

            <button type="submit" class="btn">Send Reset Link</button>
        </form>

        <p style="margin-top: 10px;">
            <a href="{{ route('customer.en') }}">Back to login</a>
        </p>
    </section>
</main>

</body>
</html>
