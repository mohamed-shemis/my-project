<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New user registered</title>
</head>
<body>
    <p>New customer registered on <strong>El Amar Customer Portal</strong>.</p>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Phone:</strong> {{ $user->phone }}</p>

    <p>You can log in to the admin panel to view more details.</p>

    <p>Best regards,<br>El Amar Portal System</p>
</body>
</html>
