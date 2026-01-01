<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activate your account</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>

    <p>Thank you for registering on <strong>El Amar Customer Portal</strong>.</p>

    <p>Please click the link below to activate your account:</p>

    <p>
        <a href="{{ $activationUrl }}" target="_blank">
            Activate my account
        </a>
    </p>

    <p>If the button does not work, copy and paste this link in your browser:</p>
    <p>{{ $activationUrl }}</p>

    <p>Best regards,<br>El Amar Group</p>
</body>
</html>
