<div class="side-bar">
    <div class="upper">
        <a href="{{ route('teacher.dashboard') }}" class="logo-flex">
            <img src="{{ asset('pictures/MusicSessions_Logo.png') }}" class="logo">
        </a>
    </div>

    <div class="middle">
        <img src="{{ $user->getImageURL() }}" style="width:60%; border-radius: 100px; margin-bottom: 20px;">
        <a style="margin-bottom: 20px" href="{{ route('teacher.dashboard') }}">Home</a>
        <a style="margin-bottom: 20px" href="{{ route('teacher.students') }}">My Students</a>
        <a href="{{ route('teacher.schedules') }}" style="margin-bottom: 20px">My Schedules</a>
        <a href="{{ route('teacher.attendance') }}">Attendance</a>
    </div>

    <div class="lower">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout" type="submit">Logout</button>
        </form>
    </div>
</div>
