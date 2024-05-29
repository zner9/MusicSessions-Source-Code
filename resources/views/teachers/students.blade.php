<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('newstylesheets/teacher/header.css') }}">
    <title>Students</title>
    <style>
        .content {
            background: #ffffff;
            position: fixed;
            top: 0;
            left: 250px;
            bottom: 0;
            width: 100%;
        }

        .container {
            width: 73%;
            margin-left: 80px;
            margin-top: 50px;
            height: 650px;
            line-height: 40px;
        }

        .grid {
            display: grid;
            grid-template-columns: 50px 1fr 1fr 1fr 1fr 1fr;
            text-align: center;
            box-shadow: 0 4px 6px #312450, 0 1px 3px #312450;
            margin-bottom: 40px;
        }

        .title {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 700;
            font-size: 40px;
            text-align: center;
            padding: 20px 0;
        }

        .sub-title {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
            font-size: 20px;
        }

        .pagination-btn {
            padding: 8px 16px;
            margin: 0 2px;
            /* Adjusted margin */
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination-btn:hover {
            background-color: #f0f0f0;
            color: #555;
        }

        .pagination-btn.disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .pagination-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .pagination-link {
            margin: 0;
        }

        .pagination-link a {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination-link a:hover {
            background-color: #f0f0f0;
            color: #555;
        }

        .pagination-link.active a {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    @include('layouts.teacher')
    <div class="content">
        <div class="container">
            <div class="title">My Students</div>
            <div class="grid">
                <div class="sub-title">#</div>
                <div class="sub-title">Name</div>
                <div class="sub-title">Age</div>
                <div class="sub-title">Address</div>
                <div class="sub-title">Contact</div>
                <div class="sub-title">Level</div>
                @php
                    $count = 0;
                @endphp
                @foreach ($students->unique('id') as $student)
                    @if ($student->payment_status == 'paid')
                        <div>{{ ++$count }}</div>
                        <div>{{ $student->first_name }} {{ $student->last_name }}</div>
                        <div>{{ $student->age }}</div>
                        <div>{{ $student->address }}</div>
                        <div>{{ $student->contact }}</div>
                        <div>
                            @php
                                $student_levels = [];
                            @endphp
                            @foreach ($student->student_payments as $student_payment)
                                @php
                                    $student_levels[] = $student_payment->student_level;
                                @endphp
                            @endforeach
                            @foreach (array_unique($student_levels) as $level)
                                {{ $level }}
                            @endforeach
                        </div>

                    @endif
                @endforeach
            </div>
            <div class="pagination-container">
                {{ $students->links() }}
            </div>
        </div>
    </div>



</body>

</html>
