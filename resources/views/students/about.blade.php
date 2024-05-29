<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About MusicSessions</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/header.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/about.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    @guest
        @include('layouts.home')
    @endguest
    @auth
        @include('layouts.auth_student')
    @endauth
    <main>
        <h1 class="title">ABOUT US</h1>
            <div class="box">
                <h2 class="app-name">Music Sessions</h2>
                <p class="message">We are proud to be partnered with Music World, elevating music experience together where you can enroll and learn musical instruments such as guitar, piano, drums, violin and many more with the best teachers. Our website offers online booking for Music world to modernize online transactions and businesses.</p>
            </div>
    </main>
</body>
</html>
