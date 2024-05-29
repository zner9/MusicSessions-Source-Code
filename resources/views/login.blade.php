<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/header.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    @include('layouts.home')
    <main>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="login-grid">
                <div class="left-side">
                    <div class="login-title">Login</div>
                    <div class="flex-row">
                        <div class="no-account">Don't have an account?</div>
                        <a href="{{ route('register') }}">
                            <div class="register">Register here</div>
                        </a>
                    </div>
                    <div class="username">Email</div>
                    <input type="email" placeholder="Email" class="username-input" name="email">
                    <div class="password">Password</div>
                    <input type="password" placeholder="Password" class="password-input" name="password">
                    @error('email')
                        <div style="color: red; font-size: 16px; margin-top: -30px">{{$message}}</div>
                    @enderror
                    <button class="continue" type="submit">Log In</button>
                    <div class="agree-description">By clicking Log In, you agree to our Terms. Learn how we process your data in our Privacy policy and Cookie
                            Policy.</div>
                </div>
                <div class="right-side">
                    <img src="pictures/login-picture.png" class="login-picture">
                </div>
            </div>
        </form>

    </main>
</body>

</html>
