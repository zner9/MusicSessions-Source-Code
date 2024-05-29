<div class="side-bar">
    <div class="upper">
        <a href="{{ route('admin.dashboard') }}" class="logo-flex">
            <img src="{{ asset('pictures/MusicSessions_Logo.png') }}" class="logo">
        </a>
    </div>

    <div class="middle">
        <a style="margin-bottom: 20px" href="{{ route('admin.dashboard') }}">Home</a>
        <a style="margin-bottom: 20px" href="{{ route('admin.students') }}">Students</a>
        <a style="margin-bottom: 20px" href="{{ route('admin.payments') }}">Payments</a>
        <a style="margin-bottom: 20px" href="{{ route('admin.teachers') }}">Teachers</a>
    </div>

    <div class="lower">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout" type="submit">Logout</button>
        </form>
    </div>
</div>
