<header class="header">
    <div class="left"><a href="{{ route('auth.dashboard') }}" class="logo-container">
            <img
                src="{{ asset('pictures/MusicSessions_Logo.png') }}" class="our-logo"></a>
    </div>
    <div class="middle">
    </div>
    <div class="right">
        <div style="margin-right: 10px; cursor: pointer;">
            <a href="{{ route('student.profile') }}">
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
            </a>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="get-started" type="submit">Logout</button>
        </form>
    </div>
</header>
