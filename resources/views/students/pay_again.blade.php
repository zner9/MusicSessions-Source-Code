<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <link rel="stylesheet" href="{{ asset('newstylesheets/header.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/payment.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    @include('layouts.auth_student')
    <div class="gcash-visa-box">
        <div class="upper">
            <img src={{ asset('pictures/gcash.png') }} class="gcash">
            <img src={{ asset('pictures/our-qr.jpg') }} class="gcash-qr">
        </div>
        <div class="lower">
            <img src={{ asset('pictures/visa.png') }} class="visa">
            <img src={{ asset('pictures/our-visa-qr.jpg') }} class="visa-qr">
        </div>
    </div>
    <form action="{{ route('student.pay_again.create') }}" method="POST">
        @csrf
        <div class="payment-box">
            <div class="upper">
                <div class="heads">Payment method</div>
            </div>
            <div class="middle">
                <div class="label">Gcash/Visa</div>
                <select name="payment_method">
                    <option value="v"></option>
                    <option value="gcash">Gcash</option>
                    <option value="visa">Visa</option>
                </select>
                @error('payment_method')
                    <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="label">Level</div>
                <select name="student_level" class="select-level">
                    <option value="v"></option>
                    <option value="Beginner">Beginner</option>
                    <option value="Primary">Primary</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advance">Advance</option>
                </select>
                @error('student_level')
                    <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="label">Amount</div>
                <input type="text" class="input-box" name="amount">
                @error('amount')
                    <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="label">Reference Number</div>
                <input type="text" class="input-box" name="reference">
                @error('reference')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="lower">
                <button class="confirm" type="submit">Done</button>
            </div>
        </div>
    </form>
</body>

</html>
