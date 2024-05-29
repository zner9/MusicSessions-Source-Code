<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
            grid-template-columns: 1fr 1fr;
            margin: 50px 570px;
            line-height: 90px;
            width: 800px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
        }

        label {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
        }
    </style>
</head>

<body>
    @include('layouts.profile')
    <main>
        <div>
            <a href="{{ route('student.profile.edit') }}">
                <div class="profile">Profile &#9998;</div>
            </a>
            <div class="container">
                <div>
                    <label for="">First Name: </label>
                    <span>{{ $user->first_name }}</span>
                </div>
                <div>
                    <label for="">Address: </label>
                    <span>{{ $user->address }}</span>
                </div>
                <div>
                    <label for="">Last Name: </label>
                    <span>{{ $user->last_name }}</span>
                </div>

                <div>
                    <label for="">Contact: </label>
                    <span>{{ $user->contact }}</span>
                </div>
                <div>
                    <label for="">Age: </label>
                    <span>{{ $user->age }}</span>
                </div>
                <div>
                    @foreach ($payments as $payment)
                        <label for="">Amount Paid: &#8369;
                        </label>
                        <span>{{ $user->total_payments }}</span>
                        @break
                    @endforeach
                </div>
                <div>
                    @foreach ($instruments as $instrument)
                        <label for="">Instrument:</label>
                        <span>{{ $instrument->instrument }}</span>
                    @endforeach
                </div>
                <div>
                    @foreach ($payments as $payment)

                        @if ($payment->student_level == 'Beginner')
                            <label for="">Balance: &#8369;
                            </label>
                            <span>{{ $user->total_payments-2190 }}</span>
                            @break
                        @elseif ($payment->student_level == 'Primary')
                            <label for="">Balance: &#8369;
                            </label>
                            <span>{{ $user->total_payments-2310 }}</span>
                            @break
                        @elseif ($payment->student_level == 'Intermediate')
                            <label for="">Balance: &#8369;
                            </label>
                            <span>{{ $user->total_payments-2430 }}</span>
                            @break
                        @else
                        <label for="">Balance: &#8369;
                        </label>
                        <span>{{ $user->total_payments-2550 }}</span>
                        @break
                        @endif
                    @endforeach
                </div>
                <div>
                    @foreach ($teachers as $teacher)
                        <label for="">Teacher:</label>
                        <span>{{$teacher->teacher}}</span>
                    @endforeach
                </div>
                <div>
                    @foreach ($levels as $level)

                        <label for="">Level:</label>
                        <span>{{$level->student_level}}</span>
                        @break
                    @endforeach
                </div>
                <div>
                    @if ($user->payment_status == 'paid')
                    <label for="">Status: </label>
                    <span>PAID</span>
                    @else
                    <label for="">Status: </label>
                    <span>Waiting for Admin Verification</span>
                    @endif
                </div>

            </div>
    </main>
</body>

</html>
