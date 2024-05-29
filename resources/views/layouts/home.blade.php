<header class="header">
    <div class="left"><a href="{{ route('home') }}" class="logo-container"><img
                src="{{ asset('pictures/MusicSessions_Logo.png') }}" class="our-logo"></a>
    </div>
    <div class="middle">
        <div><a href="{{ route('student.rates') }}">Rates</a></div>
        {{-- <div><a href="{{ route('student.instruments') }}">instruments</a></div> --}}
    </div>
    <div class="right">
        <div class="login"><a href="{{ route('login') }}">Log In</a></div>
        <a href="{{ route('register') }}">
            <button class="get-started">GET STARTED</button>
        </a>
    </div>
</header>
