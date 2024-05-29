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
            margin: 50px 500px;
            line-height: 80px;
            width: 800px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
        }

        label {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
        }

        input {
            padding: 4px 6px;
            height: 15px;
        }

        .save {
            border-radius: 30px;
            border-style: solid;
            border-width: 1px;
            cursor: pointer;
            padding: 10px 30px;
            background: #312450;
            border-color: rgb(255, 255, 255);
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            margin-left: 840px;
        }
    </style>
</head>

<body>
    @include('layouts.profile')
    <main>
        <form action="{{ route('student.profile.update') }}" method="POST">
            @csrf
            <div>
                <a href="{{ route('student.profile') }}">
                    <div class="profile">Profile &#128065;</div>
                </a>
                <div class="container">
                    <div>
                        <label for="">First Name: </label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}">
                    </div>
                    <div>
                        <label for="">Address: </label>
                        <input type="text" name="address" value="{{ $user->address }}">
                    </div>
                    <div>
                        <label for="">Last Name: </label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}">
                    </div>

                    <div>
                        <label for="">Contact: </label>
                        <input type="text" name="contact" value="{{ $user->contact }}">
                    </div>
                    <div>
                        <label for="">Age: </label>
                        <input type="text" name="age" value="{{ $user->age }}">
                    </div>

                </div>
                <button type="submit" class="save">Save</button>
        </form>
    </main>
</body>

</html>
