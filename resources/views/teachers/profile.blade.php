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
            margin: 50px 600px;
            line-height: 90px;
            width: 700px;
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
    @include('layouts.teacher')
    <main>
        <div>
            <a href="{{ route('teacher.profile.edit') }}">
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
            </div>
    </main>
</body>

</html>
