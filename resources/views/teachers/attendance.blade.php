<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
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

        .container {
            display: grid;
            grid-template-columns: 1fr;
            margin: 50px 300px;
            width: 1180px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
            line-height: 35px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 10px;
            padding: 10px;
            text-align: center;
            background: #312450;
            color: white;
            margin-bottom: 10px;
        }

        .font {
            font-size: 14px;
            font-family: 'Times New Roman', Times, serif;
            display: flex;
        }

        .box {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            padding: 15px 15px;
        }

        .present {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 10px;
            display: flex;
            font-size: 18px;
        }

        .present .date {
            font-size: 16px;
            margin-left: 8px;

        }

        .present .date:not(:last-child) {
            margin-bottom: 5px;
        }

        .grids {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            text-align: center;
            width: 900px;
        }

    </style>
</head>

<body>
    @include('layouts.teacher')
    <main>
        <div class="profile">Attendance</div>
        <div class="container">
            @foreach ($students as $student)
                @if ($student->payment_status == 'paid')
                    @foreach ($student_teachers as $student_teacher)
                        @if ($student_teacher->teacher == $user->first_name && $student_teacher->student_id == $student->id)
                            <div class="box">
                                <div>
                                    <a href="{{ route('teacher.attendance.show', $student->id) }}" style="color: black">
                                        &#9998;
                                    </a>{{ $student->first_name }} {{ $student->last_name }}
                                </div>
                                <div style="font-size: 18px;
                                font-weight: bold;">Schedules:</div>
                                <div class="grid">
                                    @foreach ($schedules as $schedule)
                                        @if ($schedule->student_id == $student->id)
                                            <!-- Monday !-->
                                            <div class="font">
                                                @php
                                                    $mondayTimeslots = [];
                                                @endphp
                                                @foreach (['m1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11', 'm12'] as $key)
                                                    @if ($schedule->$key != 'close' && Str::startsWith($key, 'm'))
                                                        @php
                                                            $mondayTimeslots[] = $schedule->$key;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @if (!empty($mondayTimeslots))
                                                    <div class="font">Monday: {{ implode(', ', $mondayTimeslots) }}
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- Tuesday !-->
                                            <div class="font">
                                                @php
                                                    $tuesdayTimeslots = [];
                                                @endphp
                                                @foreach (['t1', 't2', 't3', 't4', 't5', 't6', 't7', 't8', 't9', 't10', 't11', 't12'] as $key)
                                                    @if ($schedule->$key != 'close' && Str::startsWith($key, 't'))
                                                        @php
                                                            $tuesdayTimeslots[] = $schedule->$key;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @if (!empty($tuesdayTimeslots))
                                                    <div class="font">Tuesday: {{ implode(', ', $tuesdayTimeslots) }}
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- Wednesday !-->
                                            <div class="font">
                                                @php
                                                    $wednesdayTimeslots = [];
                                                @endphp
                                                @foreach (['w1', 'w2', 'w3', 'w4', 'w5', 'w6', 'w7', 'w8', 'w9', 'w10', 'w11', 'w12'] as $key)
                                                    @if ($schedule->$key != 'close' && Str::startsWith($key, 'w'))
                                                        @php
                                                            $wednesdayTimeslots[] = $schedule->$key;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @if (!empty($wednesdayTimeslots))
                                                    <div class="font">Wednesday:
                                                        {{ implode(', ', $wednesdayTimeslots) }}</div>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach

                                    @foreach ($schedules2 as $schedule2)
                                        @if ($schedule2->student_id == $student->id)
                                            <div class="font">
                                                @php
                                                    $thursdayTimeslots = [];
                                                @endphp
                                                @foreach (['th1', 'th2', 'th3', 'th4', 'th5', 'th6', 'th7', 'th8', 'th9', 'th10', 'th11', 'th12'] as $key)
                                                    @if ($schedule2->$key != 'close' && Str::startsWith($key, 'th'))
                                                        @php
                                                            $thursdayTimeslots[] = $schedule2->$key;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @if (!empty($thursdayTimeslots))
                                                    <div class="font">Thursday:
                                                        {{ implode(', ', $thursdayTimeslots) }}</div>
                                                @endif
                                            </div>

                                            <div class="font">
                                                @php
                                                    $fridayTimeslots = [];
                                                @endphp
                                                @foreach (['f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8', 'f9', 'f10', 'f11', 'f12'] as $key)
                                                    @if ($schedule2->$key != 'close' && Str::startsWith($key, 'f'))
                                                        @php
                                                            $fridayTimeslots[] = $schedule2->$key;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @if (!empty($fridayTimeslots))
                                                    <div class="font">Friday:
                                                        {{ implode(', ', $fridayTimeslots) }}</div>
                                                @endif
                                            </div>

                                            <div class="font">
                                                @php
                                                    $saturdayTimeslots = [];
                                                @endphp
                                                @foreach (['s1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12'] as $key)
                                                    @if ($schedule2->$key != 'close' && Str::startsWith($key, 's'))
                                                        @php
                                                            $saturdayTimeslots[] = $schedule2->$key;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @if (!empty($saturdayTimeslots))
                                                    <div class="font">Saturday:
                                                        {{ implode(', ', $saturdayTimeslots) }}</div>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach

                                </div>

                                <div class="present">
                                    <div style="font-weight:bold">Present:</div>
                                    <div class="grids">
                                        @php $sessionCount = 0; @endphp
                                        @foreach ($myAttendances as $myAttendance)
                                            @if ($myAttendance->student_id == $student->id && !empty($myAttendance->date))
                                                <div class="date">{{ $myAttendance->date }} {{ $myAttendance->day }} {{ $myAttendance->time }}</div>
                                                @php $sessionCount++; @endphp
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="present">
                                    <div style="font-weight:bold; width: 157px">Unexcused Absence:</div>
                                    <div class="grids">
                                        @foreach ($myAttendances as $myAttendance)
                                        @if ($myAttendance->student_id == $student->id && !empty($myAttendance->Udate))
                                            <div class="date">{{ $myAttendance->Udate }} {{ $myAttendance->Uday }} {{ $myAttendance->Utime }}</div>
                                            @php $sessionCount++; @endphp
                                        @endif
                                    @endforeach
                                    </div>
                                </div>

                                <div class="present">
                                    <div style="font-weight:bold; width: 230px">Teacher Request of Absence:</div>
                                    <div class="grids">
                                        @foreach ($myAttendances as $myAttendance)
                                        @if ($myAttendance->student_id == $student->id && !empty($myAttendance->Tdate))
                                            <div class="date">{{ $myAttendance->Tdate }} {{ $myAttendance->Tday }} {{ $myAttendance->Ttime }}</div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>

                                <div class="present">
                                    <div style="font-weight:bold; width: 220px">Student Request of Absence:</div>
                                    <div class="grids">
                                        @foreach ($attendances as $attendance)
                                        @if ($attendance->student_id == $student->id && !empty($attendance->date))
                                            <div class="date">{{ $attendance->date }} {{ $attendance->day }} {{ $attendance->time }}</div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>

                                <div class="present">
                                    <div>Total Sessions: {{ $sessionCount }}</div>
                                </div>


                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </main>
</body>

</html>
