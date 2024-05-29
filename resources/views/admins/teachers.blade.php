<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teachers</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/admin/header.css') }}">
    <link rel="stylesheet" href="{{ asset('newstylesheets/admin/dashboard.css') }}">
    <style>
        .content {
            background: #ffffff;
            position: fixed;
            top: 0;
            left: 250px;
            bottom: 0;
            width: 100%;
        }

        .h1 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: 30px;
            padding: 50px 0 0 470px;
        }

        .grid {
            display: grid;
            grid-template-columns: 100px 200px 200px 200px 200px;
            margin: 30px 10px 30px 20px;
            text-align: center;
            row-gap: 10px;
            text-align: center;
            margin: 40px 200px;
            line-height: 30px;
        }

        .head {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
            font-size: 20px;
        }
    </style>
</head>

<body>
    @include('layouts.admin')
    <div class="content">
        <div class="h1">Music World Teachers</div>
        <div class="grid">
            <div class="head">#</div>
            <div class="head">Name</div>
            <div class="head">Contact</div>
            <div class="head">Address</div>
            <div class="head">Instrument</div>

            @php
                $count = 0;
            @endphp
            @foreach ($teachers as $teacher)
                @if ($teacher->is_teacher)
                    <div>{{ ++$count }}</div>
                    <div>{{ $teacher->first_name }} {{ $teacher->last_name }}</div>
                    <div>{{ $teacher->contact }}</div>
                    <div>{{ $teacher->address }}</div>
                    @foreach ($instruments as $instrument)
                        @if ($instrument->teacher_id == $teacher->id)
                            <div>{{ $instrument->instrument }}</div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
    </div>
</body>

</html>
