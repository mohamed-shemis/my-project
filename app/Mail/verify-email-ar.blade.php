<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تفعيل حسابك | مجموعة العمار</title>
</head>
<body style="font-family: 'Tahoma', Arial, sans-serif; background-color: #f6f6f6; padding: 30px;">
    <div style="max-width: 600px; margin:auto; background: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); direction: rtl; text-align: right;">
        
        <h2 style="color:#032642; text-align:center;">مرحباً بك في مجموعة العمار!</h2>

        <p style="font-size: 16px;">مرحباً <strong>{{ $user->name }}</strong>,</p>
        <p style="font-size: 15px;">شكرًا لتسجيلك في <strong>بوابة عملاء مجموعة العمار</strong>.</p>
        <p style="font-size: 15px;">لتفعيل حسابك، يُرجى الضغط على الزر أدناه:</p>

        <p style="text-align: center; margin: 25px 0;">
            <a href="{{ $activationUrl }}" 
               style="background-color:#032642; color:#ffffff; text-decoration:none; padding:12px 25px; border-radius:6px; display:inline-block;">
               تفعيل الحساب الآن
            </a>
        </p>

        <p style="font-size:14px;">إذا لم يعمل الزر، انسخ الرابط التالي وضعه في شريط المتصفح:</p>
        <p style="word-break: break-all;"><a href="{{ $activationUrl }}">{{ $activationUrl }}</a></p>

        <hr style="margin:30px 0;border:none;border-top:1px solid #ddd;">

        <p style="font-size:13px; color:#555; text-align:center;">
            &copy; {{ date('Y') }} مجموعة العمار – جميع الحقوق محفوظة.
        </p>
    </div>
</body>
</html>
