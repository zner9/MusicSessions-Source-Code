<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/profile-header.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <style>
        .profile {
            font-size: 40px;
            color: black;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            margin: 30px 0 20px 0;
            padding-left: 250px;
        }

        .flex {
            margin-left: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            padding: 15px 15px;
            width: 1150px;
            line-height: 50px;
            font-size: 18px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .grids {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            text-align: center;
            width: 1100px;
        }

    </style>
</head>

<body>
    @include('layouts.profile')
    <main>
        <div class="profile">Attendance</div>
        <div class="flex">
            <div style="display:flex">
                <div><a href="{{ route('student.attendance.show') }}" style="color: black">
                    &#9998;
                </a></div>
            </div>

            <div style="display:flex">
                <div style="font-weight:bold;">Present:</div>
                <div class="grids">
                @php $presentSessionCount = 0; @endphp
                @foreach ($teacherAttendances as $teacherAttendance)
                    @if ($teacherAttendance->student_id == $user->id && !empty($teacherAttendance->date))
                        <div style="margin-left: 8px; font-weight:normal">{{ $teacherAttendance->date }} {{ $teacherAttendance->day }} {{ $teacherAttendance->time }}</div>
                        @php $presentSessionCount++; @endphp
                    @endif
                @endforeach
                </div>

            </div>

            <div style="display:flex">
                <div style="font-weight:bold; width: 200px">Unexcused Absence:</div>
                <div class="grids">
                    @php $unexcusedAbsenceSessionCount = 0; @endphp
                @foreach ($teacherAttendances as $teacherAttendance)
                    @if ($teacherAttendance->student_id == $user->id && !empty($teacherAttendance->Udate))
                        <div style="margin-left: 8px; font-weight:normal">{{ $teacherAttendance->Udate }} {{ $teacherAttendance->Uday }} {{ $teacherAttendance->Utime }}</div>
                        @php $unexcusedAbsenceSessionCount++; @endphp
                    @endif
                @endforeach
                </div>
            </div>

            <div style="display:flex">
                <div style="font-weight:bold; width: 300px">Teacher Request of Absence:</div>
                <div class="grids">
                    @foreach ($teacherAttendances as $teacherAttendance)
                    @if ($teacherAttendance->student_id == $user->id && !empty($teacherAttendance->Tdate))
                        <div style="margin-left: 8px; font-weight:normal">{{ $teacherAttendance->Tdate }} {{ $teacherAttendance->Tday }} {{ $teacherAttendance->Ttime }}</div>
                    @endif
                @endforeach
                </div>
            </div>

            <div>
                <div style="display:flex">
                    <div style="font-weight:bold; width: 300px">Student Request of Absence:</div>
                    <div class="grids">
                        @foreach ($attendances as $attendance)
                        @if (!empty($attendance->date))
                            <div style="margin-left: 8px; font-weight:normal">{{ $attendance->date }} {{ $attendance->day }} {{ $attendance->time }}</div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>

            <div>Total Sessions: {{ $presentSessionCount + $unexcusedAbsenceSessionCount }}</div>

        </div>
    </main>
</body>

</html>
