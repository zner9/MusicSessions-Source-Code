<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicSessions</title>
    @if (Auth::user()->is_teacher)
        <link rel="stylesheet" href="{{ asset('newstylesheets/teacher/header.css') }}">
        <link rel="stylesheet" href="{{ asset('newstylesheets/teacher/dashboard.css') }}">
    @elseif (Auth::user()->is_admin)
        <link rel="stylesheet" href="{{ asset('newstylesheets/admin/header.css') }}">
        <link rel="stylesheet" href="{{ asset('newstylesheets/admin/dashboard.css') }}">
    {{-- @elseif (Auth::user()->payment_status == 'paid')
        <link rel="stylesheet" href="{{ asset('newstylesheets/admin/header.css') }}"> --}}
    @else
        <link rel="stylesheet" href="{{ asset('newstylesheets/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('newstylesheets/dashboard-header.css') }}">
    @endif
</head>
<body>
    <main>
    @if (Auth::user()->is_teacher)
        @include('layouts.teacher')
        @include('teachers.profile', compact('user'))
    @elseif (Auth::user()->is_admin)
        @include('layouts.admin')
        @include('layouts.admin_statistics')

    @else
        @include('layouts.auth_student')
        <div class="title-container">
            <div class="title">Harmonize Your Journey,</div>
            <div class="sub-title">Your Gateway to the World of Music Education.</div>
            <div class="description">Learning the language of melodies and rhythms is not just a skill but a profound experience, where each chord resonates with the beat of my own heart.</div>
            <a href="{{ route('student.instruments') }}">
                <button class="enroll">Enroll Now</button>
            </a>
            <div class="extra">
                <div>&#10003; Easy, Fast and Convenient</div>
                <div>&#10003; Secure and Trusted by Users</div>
            </div>
        </div>
    @endif
    </main>
</body>
</html>
