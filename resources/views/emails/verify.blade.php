resources/views/emails/verify-email.blade.php
<!DOCTYPE html>
<html>
<body>
    <h2>Welcome {{ $user->name }}</h2>

    <p>Thank you for registering at El Amar Group.</p>

    <p>Please verify your email by clicking the link below:</p>

    <p>
        <a href="{{ $activationUrl }}">

            Verify Email
        </a>
    </p>

    <p>If you did not request this, ignore this email.</p>
</body>
</html>
