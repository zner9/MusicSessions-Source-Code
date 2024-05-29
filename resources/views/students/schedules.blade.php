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

        .schedule {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            text-align: center;
            margin: 30px 100px;
            line-height: 40px;
            box-shadow: 0px 0px 10px 0px #312450;
        }

        .head {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
            font-size: 20px;
        }

        input[type="checkbox"] {
            width: 20px; /* Adjust the width */
            height: 20px; /* Adjust the height */
            padding: 5px; /* Adjust the padding */
        }

        .next {
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
            margin-left: 740px;
        }

    </style>
</head>

<body>
    @include('layouts.auth_student')
    <form action="{{ route('student.schedules.create') }}" method="POST">
        @csrf
        <div class="schedule">
            @foreach ($teachers as $teacher)
                @if ($teacher->payment_status == 'unpaid' && $teacher->payment_status !== 'paid')
                    @if ($teacher->first_name == $studentTeacher->teacher)
                        <div>
                            <div style="font-weight: 600">Time</div>
                            <div style="font-weight: 600">9:00am-9:45am</div>
                            <div style="font-weight: 600">9:45am-10:30am</div>
                            <div style="font-weight: 600">10:30am-11:15am</div>
                            <div style="font-weight: 600">11:15am-12:00pm</div>
                            <div style="font-weight: 600">1:00pm-1:45pm</div>
                            <div style="font-weight: 600">1:45pm-2:30pm</div>
                            <div style="font-weight: 600">2:30pm-3:15pm</div>
                            <div style="font-weight: 600">3:15pm-4:00pm</div>
                            <div style="font-weight: 600">4:00pm-4:45pm</div>
                            <div style="font-weight: 600">4:45pm-5:30pm</div>
                            <div style="font-weight: 600">5:30pm-6:15pm</div>
                            <div style="font-weight: 600">6:15pm-7:00pm</div>
                        </div>
                        <div>
                            <div class="head">Monday:</div>
                            @foreach ($teachers_schedules as $schedules)
                                @foreach ($teachers_schedules2 as $schedules2)
                                    @if ($schedules->teacher_id == $teacher->id && $schedules2->teacher_id == $teacher->id)
                                        @foreach (['m1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11', 'm12'] as $slot)
                                            @if ($schedules->$slot == 'closed')
                                                <div style="color: red">Closed</div>
                                            @elseif ($schedules->$slot == 'Reserved')
                                                <div style="color:green">Reserved</div>
                                            @else
                                                <div><input type="checkbox" name="{{ $slot }}"
                                                        value="{{ $schedules->$slot }}"></div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div>
                            <div class="head">Tuesday:</div>
                            @foreach ($teachers_schedules as $schedules)
                                @foreach ($teachers_schedules2 as $schedules2)
                                    @if ($schedules->teacher_id == $teacher->id && $schedules2->teacher_id == $teacher->id)
                                        @foreach (['t1', 't2', 't3', 't4', 't5', 't6', 't7', 't8', 't9', 't10', 't11', 't12'] as $slot)
                                            @if ($schedules->$slot == 'closed')
                                            <div style="color: red">Closed</div>
                                            @elseif ($schedules->$slot == 'Reserved')
                                            <div style="color:green">Reserved</div>
                                            @else
                                                <div><input type="checkbox" name="{{ $slot }}"
                                                        value="{{ $schedules->$slot }}"></div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div>
                            <div class="head">Wednesday:</div>
                            @foreach ($teachers_schedules as $schedules)
                                @foreach ($teachers_schedules2 as $schedules2)
                                    @if ($schedules->teacher_id == $teacher->id && $schedules2->teacher_id == $teacher->id)
                                        @foreach (['w1', 'w2', 'w3', 'w4', 'w5', 'w6', 'w7', 'w8', 'w9', 'w10', 'w11', 'w12'] as $slot)
                                            @if ($schedules->$slot == 'closed')
                                                <div style="color: red">Closed</div>
                                            @elseif ($schedules->$slot == 'Reserved')
                                            <div style="color:green">Reserved</div>
                                            @else
                                                <div><input type="checkbox" name="{{ $slot }}"
                                                        value="{{ $schedules->$slot }}"></div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </div>

                        <div>
                            <div class="head">Thursday:</div>
                            @foreach ($teachers_schedules as $schedules)
                                @foreach ($teachers_schedules2 as $schedules2)
                                    @if ($schedules->teacher_id == $teacher->id && $schedules2->teacher_id == $teacher->id)
                                        @foreach (['th1', 'th2', 'th3', 'th4', 'th5', 'th6', 'th7', 'th8', 'th9', 'th10', 'th11', 'th12'] as $slot)
                                            @if ($schedules2->$slot == 'closed')
                                                <div style="color: red">Closed</div>
                                            @elseif ($schedules2->$slot == 'Reserved')
                                            <div style="color:green">Reserved</div>
                                            @else
                                                <div><input type="checkbox" name="{{ $slot }}"
                                                        value="{{ $schedules2->$slot }}"></div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div>
                            <div class="head">Friday:</div>
                            @foreach ($teachers_schedules as $schedules)
                                @foreach ($teachers_schedules2 as $schedules2)
                                    @if ($schedules->teacher_id == $teacher->id && $schedules2->teacher_id == $teacher->id)
                                        @foreach (['f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8', 'f9', 'f10', 'f11', 'f12'] as $slot)
                                            @if ($schedules2->$slot == 'closed')
                                                <div style="color: red">Closed</div>
                                            @elseif ($schedules2->$slot == 'Reserved')
                                                <div style="color:green">Reserved</div>
                                            @else
                                                <div><input type="checkbox" name="{{ $slot }}"
                                                        value="{{ $schedules2->$slot }}"></div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div>
                            <div class="head">Saturday:</div>
                            @foreach ($teachers_schedules as $schedules)
                                @foreach ($teachers_schedules2 as $schedules2)
                                    @if ($schedules->teacher_id == $teacher->id && $schedules2->teacher_id == $teacher->id)
                                        @foreach (['s1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12'] as $slot)
                                            @if ($schedules2->$slot == 'closed')
                                                <div style="color: red">Closed</div>
                                            @elseif ($schedules2->$slot == 'Reserved')
                                                <div style="color:green">Reserved</div>
                                            @else
                                                <div><input type="checkbox" name="{{ $slot }}"
                                                        value="{{ $schedules2->$slot }}"></div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    @break
                @endif
            @endif
        @endforeach
    </div>
    <button type="submit" class="next">Next</button>
</form>


</body>

</html>
