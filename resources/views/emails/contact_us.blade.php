<!DOCTYPE html>
<html>
<head>
    <title>New Contact Us Submission</title>
</head>
<body>
    <h2>New Contact Request</h2>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Mobile:</strong> {{ $data['mobile'] }}</p>
    <p><strong>Budget:</strong> {{ $data['budget'] ?? 'N/A' }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
