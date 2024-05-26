<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/welcome.css">
    <title>Journey Organizer</title>
</head>
<body>
    <div class="welcome">
        <h1>Journeys Organizer</h1>

        <p>Welcome to Journeys Organizer, your tool for planning your vacation, from departure and arrival to packing items and daily itinerary, ensuring you're always prepared for what's next.</p>

        <div class="login-register">
            <a href="{{ route('login') }}" class="login">Login</a>
            <a href="{{ route('register') }}" class="register">Register</a>
        </div>
    </div>
</body>
</html>