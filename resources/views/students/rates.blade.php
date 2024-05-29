<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rates</title>
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <link rel="stylesheet" href="{{ asset('newstylesheets/header.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/rates.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    @guest
        @include('layouts.home')
    @endguest
    @auth
        @include('layouts.auth_student')
    @endauth
    <main class="grid">
        @guest
            <div class="beginner-box">
                <button style="background-color: white; border: none; cursor: pointer;">
                    <div class="level">Beginner</div>
                    <div class="description">No/Little knowledge in the instrument</div>
                    <hr class="line">
                    <div class="sessions">There are 12 sessions in a Beginner course</div>
                    <div class="installment">1st Installment (4 Sessions)</div>
                    <div class="price">&#8369;830.00</div>
                    <div class="installment">2nd Installment (4 Sessions)</div>
                    <div class="price">&#8369;680.00</div>
                    <div class="installment">3rd Installment (4 Sessions)</div>
                    <div class="price">&#8369;680.00</div>
                    <div class="installment">or</div>
                    <div class="installment">Full Payment (12 Sessions)</div>
                    <div class="full-payment">&#8369;2190.00</div>
                </button>
            </div>
        @endguest

        @auth
            <a href="{{ route('student.students_payments') }}">
                <div class="beginner-box">
                    <button style="background-color: white; border: none; cursor: pointer;">
                        <div class="level">Beginner</div>
                        <div class="description">No/Little knowledge in the instrument</div>
                        <hr class="line">
                        <div class="sessions">There are 12 sessions in a Beginner course</div>
                        <div class="installment">1st Installment (4 Sessions)</div>
                        <div class="price">&#8369;830.00</div>
                        <div class="installment">2nd Installment (4 Sessions)</div>
                        <div class="price">&#8369;680.00</div>
                        <div class="installment">3rd Installment (4 Sessions)</div>
                        <div class="price">&#8369;680.00</div>
                        <div class="installment">or</div>
                        <div class="installment">Full Payment (12 Sessions)</div>
                        <div class="full-payment">&#8369;2190.00</div>
                    </button>
                </div>
            </a>
        @endauth

        @guest
            <button style="background-color: rgb(235, 223, 223); border: none; cursor: pointer;">
                <div class="primary-box">
                    <div class="level">Primary</div>
                    <div class="description">Can already play the instrument properly</div>
                    <hr class="line">
                    <div class="sessions">There are 12 sessions in a Beginner course</div>
                    <div class="installment">1st Installment (4 Sessions)</div>
                    <div class="price">&#8369;P870.00</div>
                    <div class="installment">2nd Installment (4 Sessions)</div>
                    <div class="price">&#8369;720.00</div>
                    <div class="installment">3rd Installment (4 Sessions)</div>
                    <div class="price">&#8369;720.00</div>
                    <div class="installment">or</div>
                    <div class="installment">Full Payment (12 Sessions)</div>
                    <div class="full-payment">&#8369;2310.00</div>
                </div>
            </button>
        @endguest

        @auth
            <a href="{{ route('student.students_payments') }}">
                <button style="background-color: rgb(235, 223, 223); border: none; cursor: pointer;">
                    <div class="primary-box">
                        <div class="level">Primary</div>
                        <div class="description">Can already play the instrument properly</div>
                        <hr class="line">
                        <div class="sessions">There are 12 sessions in a Beginner course</div>
                        <div class="installment">1st Installment (4 Sessions)</div>
                        <div class="price">&#8369;P870.00</div>
                        <div class="installment">2nd Installment (4 Sessions)</div>
                        <div class="price">&#8369;720.00</div>
                        <div class="installment">3rd Installment (4 Sessions)</div>
                        <div class="price">&#8369;720.00</div>
                        <div class="installment">or</div>
                        <div class="installment">Full Payment (12 Sessions)</div>
                        <div class="full-payment">&#8369;2310.00</div>
                    </div>
                </button>
            </a>
        @endauth

        @guest
            <button style="background-color: rgb(235, 223, 223); border: none; cursor: pointer;">
                <div class="intermediate-box">
                    <div class="level">Intermediate</div>
                    <div class="description"> Skilled at playing the instrument</div>
                    <hr class="line">
                    <div class="sessions">There are 12 sessions in a Beginner course</div>
                    <div class="installment">1st Installment (4 Sessions)</div>
                    <div class="price">&#8369;910.00</div>
                    <div class="installment">2nd Installment (4 Sessions)</div>
                    <div class="price">&#8369;760.00</div>
                    <div class="installment">3rd Installment (4 Sessions)</div>
                    <div class="price">&#8369;760.00</div>
                    <div class="installment">or</div>
                    <div class="installment">Full Payment (12 Sessions)</div>
                    <div class="full-payment">&#8369;2430.00</div>
                </div>
            </button>
        @endguest

        @auth
            <a href="{{ route('student.students_payments') }}">
                <button style="background-color: rgb(235, 223, 223); border: none; cursor: pointer;">
                    <div class="intermediate-box">
                        <div class="level">Intermediate</div>
                        <div class="description"> Skilled at playing the instrument</div>
                        <hr class="line">
                        <div class="sessions">There are 12 sessions in a Beginner course</div>
                        <div class="installment">1st Installment (4 Sessions)</div>
                        <div class="price">&#8369;910.00</div>
                        <div class="installment">2nd Installment (4 Sessions)</div>
                        <div class="price">&#8369;760.00</div>
                        <div class="installment">3rd Installment (4 Sessions)</div>
                        <div class="price">&#8369;760.00</div>
                        <div class="installment">or</div>
                        <div class="installment">Full Payment (12 Sessions)</div>
                        <div class="full-payment">&#8369;2430.00</div>
                    </div>
                </button>
            </a>
        @endauth


        @guest
            <button style="background-color: rgb(235, 223, 223); border: none; cursor: pointer;">
                <div class="advance-box">
                    <div class="level">Advance</div>
                    <div class="description">Have mastery in the instrument</div>
                    <hr class="line">
                    <div class="sessions">There are 12 sessions in a Beginner course</div>
                    <div class="installment">1st Installment (4 Sessions)</div>
                    <div class="price">&#8369;950.00</div>
                    <div class="installment">2nd Installment (4 Sessions)</div>
                    <div class="price">&#8369;800.00</div>
                    <div class="installment">3rd Installment (4 Sessions)</div>
                    <div class="price">&#8369;800.00</div>
                    <div class="installment">or</div>
                    <div class="installment">Full Payment (12 Sessions)</div>
                    <div class="full-payment">&#8369;2550.00</div>
                </div>
            </button>
        @endguest

        @auth
            <a href="{{ route('student.students_payments') }}">
                <button style="background-color: rgb(235, 223, 223); border: none; cursor: pointer;">
                    <div class="advance-box">
                        <div class="level">Advance</div>
                        <div class="description">Have mastery in the instrument</div>
                        <hr class="line">
                        <div class="sessions">There are 12 sessions in a Beginner course</div>
                        <div class="installment">1st Installment (4 Sessions)</div>
                        <div class="price">&#8369;950.00</div>
                        <div class="installment">2nd Installment (4 Sessions)</div>
                        <div class="price">&#8369;800.00</div>
                        <div class="installment">3rd Installment (4 Sessions)</div>
                        <div class="price">&#8369;800.00</div>
                        <div class="installment">or</div>
                        <div class="installment">Full Payment (12 Sessions)</div>
                        <div class="full-payment">&#8369;2550.00</div>
                    </div>
                </button>
            </a>
        @endauth

    </main>
</body>

</html>
