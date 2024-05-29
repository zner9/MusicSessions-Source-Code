<!DOCTYPE html>
<html lang="en">

<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schedules</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/teacher/header.css') }}">
    <style>
        .content {
            background: #ffffff;
            position: fixed;
            top: 0;
            left: 250px;
            bottom: 0;
            width: 100%;
        }

        .title {
            font-family: 'Times New Roman', Times, serif;
            font-size: 30px;
            padding: 50px 0 0 470px;
            font-weight: bold;
        }

        .assignable {
            font-family: 'Times New Roman', Times, serif;
            display: grid;
            margin-top: 16px;
            margin-left: 50px;
            text-align: center;
            width: 1160px;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            box-shadow: 0 4px 6px #312450, 0 1px 3px #312450;
            text-align: center;
        }

        .time-to-flex {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Times New Roman', Times, serif;
            padding: 10px 10px;
            width: 100%;
            line-height: 38px;
        }

        .instrument {
            position: fixed;
            bottom: 50px;
            left: 300px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            padding: 10px 10px;
            display: flex;
        }

        .header {
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 700;
        }

        .save {
            border-radius: 30px;
            border-style: solid;
            border-width: 1px;
            cursor: pointer;
            padding: 10px 20px;
            background: #312450;
            border-color: rgb(255, 255, 255);
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            margin-left: 600px;
            margin-top: 30px;
        }

        input[type="checkbox"] {
            display: none;
        }

        label {
            padding: 15px 40px;
            cursor: pointer;
            border: solid 1px rgb(201, 201, 201);
            border-radius: 4px;
            transition: all 0.3s ease;
            margin-bottom: 6px;
        }

        label:hover {
            background: #312450;
        }

        input[type="checkbox"]:checked + label {
            background: #312450;
            color: white;
        }
    </style>
</head>

<body>
    @include('layouts.teacher')
    <main class="content">
        <div class="title">
            <span style="margin-right:10px; margin-left:40px;">
                <a href="{{ route('teacher.schedules.edit') }}" style="color: black">
                    &#9998;
                </a>
            </span>
            My Schedules
        </div>
            <div class="assignable">
                <div class="time-to-flex">
                    <div class="header">Time</div>
                    <div>9:00am-9:45am</div>
                    <div>9:45am-10:30am</div>
                    <div>10:30am-11:15am</div>
                    <div>11:15am-12:00pm</div>
                    <div>1:00pm-1:45pm</div>
                    <div>1:45pm-2:30pm</div>
                    <div>2:30pm-3:15pm</div>
                    <div>3:15pm-4:00pm</div>
                    <div>4:00pm-4:45pm</div>
                    <div>4:45pm-5:30pm</div>
                    <div>5:30pm-6:15pm</div>
                    <div>6:15pm-7:00pm</div>
                </div>
                <div class="time-to-flex">
                    <div class="header">Monday</div>
                    <div>
                        @foreach ($students as $student)
                            @if ($student->payment_status == 'paid')
                                @php
                                    $foundTeacher = false; // Flag to track if the teacher is found
                                @endphp
                                @foreach ($student_teachers as $student_teacher)
                                    @if ($student_teacher->student_id == $student->id && $student_teacher->teacher == $user->first_name)
                                        @php
                                            $foundTeacher = true; // Set flag to true if teacher is found
                                        @endphp
                                        @foreach ($student_schedules as $student_schedule)
                                            @if ($student->id == $student_schedule->student_id)
                                                @foreach (['m1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11', 'm12'] as $key)
                                                    @foreach ($user->teacher_schedules as $schedule)
                                                        @if ($schedule->$key == 'Reserved')
                                                            <div style="color: green">Reserved</div>
                                                        @elseif ($schedule->$key == 'closed')
                                                            <div style="color: red">Closed</div>
                                                        @else
                                                            <div>Available</div>
                                                        @endif
                                                    @break
                                                @endforeach
                                            @endforeach
                                        @break

                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        @if ($foundTeacher)
                        @break
                    @endif
                @endif
                @endforeach
                </div>
                </div>
        <div class="time-to-flex">
        <div class="header">Tuesday</div>
        <div>
            @foreach ($students as $student)
                @if ($student->payment_status == 'paid')
                    @php
                        $foundTeacher = false; // Flag to track if the teacher is found
                    @endphp
                    @foreach ($student_teachers as $student_teacher)
                        @if ($student_teacher->student_id == $student->id && $student_teacher->teacher == $user->first_name)
                            @php
                                $foundTeacher = true; // Set flag to true if teacher is found
                            @endphp
                            @foreach ($student_schedules as $student_schedule)
                                @if ($student->id == $student_schedule->student_id)
                                    @foreach (['t1', 't2', 't3', 't4', 't5', 't6', 't7', 't8', 't9', 't10', 't11', 't12'] as $key)
                                        @foreach ($user->teacher_schedules as $schedule)
                                            @if ($schedule->$key == 'Reserved')
                                                <div style="color: green">Reserved</div>
                                            @elseif ($schedule->$key == 'closed')
                                                <div style="color: red">Closed</div>
                                            @else
                                                <div>Available</div>
                                            @endif
                                        @break
                                    @endforeach
                                @endforeach
                            @break

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($foundTeacher)
            @break
        @endif
    @endif
    @endforeach
    </div>
    </div>
    <div class="time-to-flex">
        <div class="header">Wednesday</div>
        <div>
            @foreach ($students as $student)
                @if ($student->payment_status == 'paid')
                    @php
                        $foundTeacher = false; // Flag to track if the teacher is found
                    @endphp
                    @foreach ($student_teachers as $student_teacher)
                        @if ($student_teacher->student_id == $student->id && $student_teacher->teacher == $user->first_name)
                            @php
                                $foundTeacher = true; // Set flag to true if teacher is found
                            @endphp
                            @foreach ($student_schedules as $student_schedule)
                                @if ($student->id == $student_schedule->student_id)
                                    @foreach (['w1', 'w2', 'w3', 'w4', 'w5', 'w6', 'w7', 'w8', 'w9', 'w10', 'w11', 'w12'] as $key)
                                        @foreach ($user->teacher_schedules as $schedule)
                                            @if ($schedule->$key == 'Reserved')
                                                <div style="color: green">Reserved</div>
                                            @elseif ($schedule->$key == 'closed')
                                                <div style="color: red">Closed</div>
                                            @else
                                                <div>Available</div>
                                            @endif
                                        @break
                                    @endforeach
                                @endforeach
                            @break

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($foundTeacher)
            @break
        @endif
    @endif
    @endforeach
    </div>
    </div>

    <div class="time-to-flex">
        <div class="header">Thursday</div>
        <div>
            @foreach ($students as $student)
                @if ($student->payment_status == 'paid')
                    @php
                        $foundTeacher = false; // Flag to track if the teacher is found
                    @endphp
                    @foreach ($student_teachers as $student_teacher)
                        @if ($student_teacher->student_id == $student->id && $student_teacher->teacher == $user->first_name)
                            @php
                                $foundTeacher = true; // Set flag to true if teacher is found
                            @endphp
                            @foreach ($student_schedules2 as $student_schedule2)
                                @if ($student->id == $student_schedule2->student_id)
                                    @foreach (['th1', 'th2', 'th3', 'th4', 'th5', 'th6', 'th7', 'th8', 'th9', 'th10', 'th11', 'th12'] as $key)
                                        @foreach ($user->teacher_schedules2 as $schedule2)
                                            @if ($schedule2->$key == 'Reserved')
                                                <div style="color: green">Reserved</div>
                                            @elseif ($schedule2->$key == 'closed')
                                                <div style="color: red">Closed</div>
                                            @else
                                                <div>Available</div>
                                            @endif
                                        @break
                                    @endforeach
                                @endforeach
                            @break

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($foundTeacher)
            @break
        @endif
    @endif
    @endforeach
    </div>
    </div>

    <div class="time-to-flex">
        <div class="header">Friday</div>
        <div>
            @foreach ($students as $student)
                @if ($student->payment_status == 'paid')
                    @php
                        $foundTeacher = false; // Flag to track if the teacher is found
                    @endphp
                    @foreach ($student_teachers as $student_teacher)
                        @if ($student_teacher->student_id == $student->id && $student_teacher->teacher == $user->first_name)
                            @php
                                $foundTeacher = true; // Set flag to true if teacher is found
                            @endphp
                            @foreach ($student_schedules2 as $student_schedule2)
                                @if ($student->id == $student_schedule2->student_id)
                                    @foreach (['f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8', 'f9', 'f10', 'f11', 'f12'] as $key)
                                        @foreach ($user->teacher_schedules2 as $schedule2)
                                            @if ($schedule2->$key == 'Reserved')
                                                <div style="color: green">Reserved</div>
                                            @elseif ($schedule2->$key == 'closed')
                                                <div style="color: red">Closed</div>
                                            @else
                                                <div>Available</div>
                                            @endif
                                        @break
                                    @endforeach
                                @endforeach
                            @break

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($foundTeacher)
            @break
        @endif
    @endif
    @endforeach
    </div>
    </div>

    <div class="time-to-flex">
        <div class="header">Saturday</div>
        <div>
            @foreach ($students as $student)
                @if ($student->payment_status == 'paid')
                    @php
                        $foundTeacher = false; // Flag to track if the teacher is found
                    @endphp
                    @foreach ($student_teachers as $student_teacher)
                        @if ($student_teacher->student_id == $student->id && $student_teacher->teacher == $user->first_name)
                            @php
                                $foundTeacher = true; // Set flag to true if teacher is found
                            @endphp
                            @foreach ($student_schedules2 as $student_schedule2)
                                @if ($student->id == $student_schedule2->student_id)
                                    @foreach (['s1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12'] as $key)
                                        @foreach ($user->teacher_schedules2 as $schedule2)
                                            @if ($schedule2->$key == 'Reserved')
                                                <div style="color: green">Reserved</div>
                                            @elseif ($schedule2->$key == 'closed')
                                                <div style="color: red">Closed</div>
                                            @else
                                                <div>Available</div>
                                            @endif
                                        @break
                                    @endforeach
                                @endforeach
                            @break

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($foundTeacher)
            @break
        @endif
    @endif
    @endforeach
    </div>
    </div>
    </div>

    </main>
</body>

</html>
