<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payments</title>
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
            grid-template-columns: 50px 135px 135px 135px 135px 135px 135px 135px 135px 135px;
            margin: 30px 10px 30px 20px;
            text-align: center;
            row-gap: 10px;
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
    @include('layouts.admin')

    @if (session('verified'))
        <div>
            <span style="color: green; font-size:40px; text-align:center; margin:auto">{{ session('verified') }}</span>
        </div>
    @endif

    @if (session('delete'))
        <div>
            <span style="color: red; font-size:40px; text-align:center; margin:auto">{{ session('delete') }}</span>
        </div>
    @endif
    <div class="content">
        <div class="h1">Student Payments</div>
        <div class="grid">
            <div style="font-weight: 700; font-size:16px">#</div>
            <div style="font-weight: 700; font-size:16px">Name</div>
            <div style="font-weight: 700; font-size:16px">Address</div>
            <div style="font-weight: 700; font-size:16px">Contact</div>
            <div style="font-weight: 700; font-size:16px">Age</div>
            <div style="font-weight: 700; font-size:16px">Payment Method</div>
            <div style="font-weight: 700; font-size:16px">Amount</div>
            <div style="font-weight: 700; font-size:16px">Reference No:</div>
            <div style="font-weight: 700; font-size:16px">Student Level</div>
            <div style="font-weight: 700; font-size:16px">Verify</div>

            @php
                $count = 0;
            @endphp
            @foreach ($users as $user)
                @if (!$user->is_teacher)
                    @if (!$user->is_admin)
                        <!-- unpaid -->
                        @if ($user->payment_status == 'unpaid')
                            <div>{{ ++$count }}</div>
                            <div>{{ $user->first_name }} {{ $user->last_name }}</div>
                            <div>{{ $user->address }}</div>
                            <div>{{ $user->contact }}</div>
                            <div>{{ $user->age }}</div>
                            @foreach ($user->student_payments->reverse() as $payment)
                                <div>{{ $payment->payment_method }}</div>
                                <div>{{ $payment->amount }}</div>
                                <div>{{ $payment->reference }}</div>
                                <div>{{ $payment->student_level }}</div>
                                <div style="display: flex; margin-left:40px">
                                    <form action="{{ route('admin.payments.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <div>
                                            <button
                                                style="color: red; padding:2px 5px; background:white; border:none; cursor: pointer; font-weight:bolder">&times;</button>
                                        </div>
                                    </form>
                                    <form action="{{ route('admin.payments.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div>
                                            <button
                                                style="color: green; padding: 0.6px 4px; margin-left:10px; background:white; border:none; cursor: pointer; font-weight:bolder">&#10003;</button>
                                        </div>
                                    </form>
                                </div>
                                @break
                            @endforeach
                        @endif
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</body>

</html>
