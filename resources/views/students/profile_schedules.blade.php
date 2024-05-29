<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/profile-header.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <style>
        .schedules {
            font-size: 40px;
            color: black;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            margin: 30px 0 20px 0;
            padding-left: 250px;
        }

        .schedules_grid {
            display: grid;
            width: 1000px;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            margin: 20px 400px;
            column-gap: 20px;
            text-align: center;
        }

        .head {
            font-size: 25px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
        }

        .time {
            font-family: 'Times New Roman', Times, serif;
            margin-top: 15px;
            background: #4c308e;
            color: white;
            padding: 15px 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>
    @include('layouts.profile')
    <main>
        <div class="schedules">Schedules</div>
        <div class="schedules_grid">
            <div class="head">Monday</div>
            <div class="head">Tuesday</div>
            <div class="head">Wednesday</div>
            <div class="head">Thursday</div>
            <div class="head">Friday</div>
            <div class="head">Saturday</div>

            <div>
                @foreach ($schedules as $schedule)
                    @foreach (['m1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11', 'm12'] as $key)
                        @if ($schedule->$key != 'close')
                            <div class="time">{{ $schedule->$key }}</div>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <div>
                @foreach ($schedules as $schedule)
                    @foreach (['t1', 't2', 't3', 't4', 't5', 't6', 't7', 't8', 't9', 't10', 't11', 't12'] as $key)
                        @if ($schedule->$key != 'close')
                            <div class="time">{{ $schedule->$key }}</div>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <div>
                @foreach ($schedules as $schedule)
                    @foreach (['w1', 'w2', 'w3', 'w4', 'w5',
                               'w6', 'w7', 'w8', 'w9', 'w10',
                               'w11','w12'] as $key)
                        @if ($schedule->$key != 'close')
                            <div class="time">{{ $schedule->$key }}</div>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <div>
                @foreach ($schedules2 as $schedule)
                    @foreach (['th1', 'th2', 'th3', 'th4', 'th5',
                               'th6', 'th7', 'th8', 'th9', 'th10',
                               'th11','th12'] as $key)
                        @if ($schedule->$key != 'close')
                            <div class="time">{{ $schedule->$key }}</div>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <div>
                @foreach ($schedules2 as $schedule)
                    @foreach (['f1', 'f2', 'f3', 'f4', 'f5',
                               'f6', 'f7', 'f8', 'f9', 'f10',
                               'f11','f12'] as $key)
                        @if ($schedule->$key != 'close')
                            <div class="time">{{ $schedule->$key }}</div>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <div>
                @foreach ($schedules2 as $schedule)
                    @foreach (['s1', 's2', 's3', 's4', 's5',
                               's6', 's7', 's8', 's9', 's10',
                               's11','s12'] as $key)
                        @if ($schedule->$key != 'close')
                            <div class="time">{{ $schedule->$key }}</div>
                        @endif
                    @endforeach
                @endforeach
            </div>

        </div>
    </main>
</body>

</html>
