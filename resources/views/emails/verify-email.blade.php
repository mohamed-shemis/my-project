<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activate Your Account | El Amar Group</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 30px;">
    <div style="max-width: 600px; margin:auto; background: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: left;">
        
        <h2 style="color:#032642; text-align:center;">Welcome to El Amar Group!</h2>

        <p style="font-size: 16px;">Dear <strong>{{ $user->name }}</strong>,</p>
        <p style="font-size: 15px;">Thank you for registering at the <strong>El Amar Group Customer Portal</strong>.</p>
        <p style="font-size: 15px;">To activate your account, please click the button below:</p>

        <p style="text-align: center; margin: 25px 0;">
            <a href="{{ $activationUrl }}" 
               style="background-color:#032642; color:#ffffff; text-decoration:none; padding:12px 25px; border-radius:6px; display:inline-block;">
               Activate Account
            </a>
        </p>

        <p style="font-size:14px;">If the button doesn’t work, please copy and paste this link into your browser:</p>
        <p style="word-break: break-all;"><a href="{{ $activationUrl }}">{{ $activationUrl }}</a></p>

        <hr style="margin:30px 0;border:none;border-top:1px solid #ddd;">

        <p style="font-size:13px; color:#555; text-align:center;">
            &copy; {{ date('Y') }} El Amar Group – All rights reserved.
        </p>
    </div>
</body>
</html>
