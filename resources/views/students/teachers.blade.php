<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <link rel="stylesheet" href="{{ asset('newstylesheets/header.css') }}">
    <style>
        body {
            margin: 0;
        }

        .teacher-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            text-align: center;
            margin: 30px 200px 0 200px;
            height: 300px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .name {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
            font-size: 35px;
            margin: 20px 0 20px 0;
        }

        .bio {
            font-family: 'Times New Roman', Times, serif;
            width: 400px;
            margin-bottom: 30px;
            text-align: left;
        }

        .see {
            border-radius: 30px;
            border-style: solid;
            border-width: 1px;
            cursor: pointer;
            padding: 10px 20px;
            background: #312450;
            border-color: #ffffff;
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
        }

        .flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image {
            width: 30%;
            border-radius: 100px;
        }
    </style>
</head>

<body>
    @include('layouts.auth_student')
    <div style="text-align:center; margin-top: 50px; font-size:30px; font-weight: bold">Select your Teacher</div>
    <div class="teacher-grid">
        @foreach ($teachers as $teacher)
            @if ($teacher->is_teacher)
                @foreach ($teachers_schedules as $instrument)
                    @if ($studentInstrument->instrument == $instrument->instrument)
                        @if ($instrument->teacher_id == $teacher->id)
                            <div class="container">

                                    <img src="{{ $teacher->getImageURL() }}" class="image">
                                    <div class="name">{{ $teacher->first_name }} {{ $teacher->last_name }}</div>


                                <div class="bio">With over a decade of experience in both performance and teaching, I
                                    specialize in fostering a love for music while honing technical skills. From
                                    beginners to advanced players, I tailor lessons to individual goals, ensuring a
                                    fulfilling and enjoyable learning journey for every student.</div>
                                <form action="{{ route('student.teachers.create') }}" method="POST">
                                    @csrf
                                    <button type="submit" name="teacher" value="{{ $teacher->first_name }}"
                                        class="see">See
                                        Schedule</button>
                                </form>
                            </div>
                        @break
                    @endif
                @endif
            @endforeach
        @endif
    @endforeach
</div>
</body>

</html>
