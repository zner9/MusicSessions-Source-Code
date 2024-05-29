<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/header.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/signup.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    @include('layouts.home')
    <main>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @if (session('age'))
                <div class="flash_message">{{ session('age') }}</div>
            @endif
            <div class="sign-up-flex">
                <div class="create-account">
                    <span style="margin-left: 70px;">Create an Account</span>
                </div>
                <div class="middle-side">
                    <div class="input-flex">
                        <input type="text" placeholder="First Name" class="name-input" name="first_name">
                        <input type="text" placeholder="Last Name" class="name-input" name="last_name">
                    </div>
                    @if ($errors->has('first_name'))
                        <span class="first_name_error">&#9888;</span>
                    @endif
                    @if ($errors->has('last_name'))
                        <span class="last_name_error">&#9888;</span>
                    @endif
                    <input type="text" placeholder="Address" class="username-input" name="address">
                    @if ($errors->has('address'))
                        <span class="address_error">&#9888;</span>
                    @endif
                    <input type="text" placeholder="09xxxxxxxxx" class="username-input" name="contact">
                    @if ($errors->has('contact'))
                        <span class="contact_error">&#9888;</span>
                    @endif
                    <input type="text" placeholder="Age" class="username-input" name="age">
                    @if ($errors->has('age'))
                        <span class="age_error">&#9888;</span>
                    @endif
                    <input type="email" placeholder="Email" class="username-input" name="email">
                    @if ($errors->has('email'))
                        <span class="email_error">&#9888;</span>
                    @endif
                    <input type="password" placeholder="Password" class="username-input" name="password">
                    @if ($errors->has('password'))
                        <span class="password_error">&#9888;</span>
                    @endif
                    <input type="password" placeholder="Confirm Password" class="username-input"
                        name="password_confirmation">
                    @if ($errors->has('password'))
                        <span class="confirm_password_error">&#9888;</span>
                    @endif
                    <button class="sign-up-button" type="submit">Sign Up</button>
                </div>

                <div class="mini-box-lower">
                    <div class="already">Already have an account?</div>
                    <a href="{{route('login')}}">
                        <div class="sign-in">Log In</div>
                    </a>
                </div>
            </div>
        </form>
    </main>

</body>

</html>
