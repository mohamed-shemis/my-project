<!DOCTYPE html>
<html>
<body>

<h2>New Client Message</h2>

<p><strong>Name:</strong> {{ $client->full_name }}</p>
<p><strong>Phone:</strong> {{ $client->phone }}</p>
<p><strong>Email:</strong> {{ $client->email }}</p>
<p><strong>Project:</strong> {{ $client->project }}</p>
<p><strong>Inquiry Type:</strong> {{ $client->inquiry_type }}</p>

<p><strong>Message:</strong><br>
{{ $client->message }}
</p>

</body>
</html>
