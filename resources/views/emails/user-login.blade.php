<!DOCTYPE html>
<html lang="en">
<body>
    <h2>User Logged In</h2>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p>Login time: {{ now() }}</p>
</body>
</html>
