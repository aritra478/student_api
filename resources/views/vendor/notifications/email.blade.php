<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Email Verification</title>
</head>
<body>
    <h1>Welcome {{ $user->full_name }}!</h1>

    <p>Thank you for registering for the post of <strong>{{ $user->post }} - {{ $user->subject }}</strong>.</p>

    <p>
        Please verify your email address by clicking the button below:
    </p>

    <p>
        <a href="{{ $actionUrl }}" style="background-color:#28a745; padding:10px 20px; color:#fff; text-decoration:none;">
            Verify Email
        </a>
    </p>

    <p>This verification link will expire in 60 minutes.</p>
    <p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>
