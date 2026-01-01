<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Customer Registered | El Amar Group</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 30px;">
    <div style="max-width: 600px; margin:auto; background: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: left;">
        
        <h2 style="color:#032642; text-align:center;">🔔 New Customer Registration</h2>

        <p style="font-size: 16px;">A new customer has registered on the <strong>El Amar Group Customer Portal</strong>.</p>

        <div style="background:#f2f2f2; border-radius:8px; padding:15px; margin:20px 0;">
            <p style="margin:0; font-size:15px;"><strong>Name:</strong> {{ $user->name }}</p>
            <p style="margin:0; font-size:15px;"><strong>Email:</strong> {{ $user->email }}</p>
            <p style="margin:0; font-size:15px;"><strong>Phone:</strong> {{ $user->phone }}</p>
            <p style="margin:0; font-size:15px;"><strong>Registered At:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
        </div>

        <p style="font-size:15px;">
            You can log in to the <strong>Admin Panel</strong> to view more details or manage this user.
        </p>

        <p style="text-align:center; margin:25px 0;">
            <a href="{{ url('/admin') }}" 
               style="background-color:#032642; color:#ffffff; text-decoration:none; padding:10px 20px; border-radius:6px; display:inline-block;">
               Go to Admin Panel
            </a>
        </p>

        <hr style="margin:30px 0;border:none;border-top:1px solid #ddd;">

        <p style="font-size:13px; color:#555; text-align:center;">
            &copy; {{ date('Y') }} El Amar Group – Internal Notification.
        </p>
    </div>
</body>
</html>
