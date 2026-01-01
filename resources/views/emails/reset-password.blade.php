<!DOCTYPE html>
<html lang="{{ $locale === 'ar' ? 'ar' : 'en' }}" dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>{{ $locale === 'ar' ? 'إعادة تعيين كلمة المرور' : 'Reset your password' }}</title>
</head>
<body>

<p>{{ $locale === 'ar' ? 'مرحباً،' : 'Hello,' }}</p>

<p>
    {{ $locale === 'ar'
        ? 'لقد طلبت إعادة تعيين كلمة المرور لحسابك في بوابة عملاء مجموعة العمار.'
        : 'You requested to reset your password for El Amar Customer Portal.' }}
</p>

<p>
    {{ $locale === 'ar'
        ? 'اضغط على الرابط التالي لإعادة تعيين كلمة المرور:'
        : 'Please click the link below to reset your password:' }}
</p>

<p>
    <a href="{{ $resetUrl }}" target="_blank">
        {{ $locale === 'ar' ? 'إعادة تعيين كلمة المرور' : 'Reset my password' }}
    </a>
</p>

<p>{{ $resetUrl }}</p>

<p>
    {{ $locale === 'ar'
        ? 'إذا لم تطلب هذا الإجراء يمكنك تجاهل هذه الرسالة.'
        : 'If you did not request this, you can safely ignore this email.' }}
</p>

<p>
    {{ $locale === 'ar'
        ? 'مع تحيات، مجموعة العمار'
        : 'Best regards, El Amar Group' }}
</p>

</body>
</html>
