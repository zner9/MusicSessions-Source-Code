<div class="side-bar" style="line-height: 50px;">
    <div class="upper">
        <a href="{{ route('auth.dashboard') }}" class="logo-flex">
            <img src="{{ asset('pictures/MusicSessions_Logo.png') }}" class="logo">
        </a>
    </div>

    <div class="middle">
        <a style="margin-bottom: 20px" href="{{ route('student.profile') }}">Home</a>
        <a style="margin-bottom: 20px" href="{{ route('student.profile_schedules') }}">Schedules</a>
        <a style="margin-bottom: 20px" href="{{ route('student.attendance') }}">Attendance</a>
        <a href="{{ route('student.pay_again') }}">Add Payment</a>
    </div>

    <div class="lower">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout" type="submit">Logout</button>
        </form>
    </div>
</div>
