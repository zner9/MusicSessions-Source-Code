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
            line-height: 90px;
            width: 860px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
        }

        label {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
        }

        .flex {
            display: flex;
            align-content: center;
            width: 100%;
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
    @include('layouts.teacher')
    <main>
        <form action="{{ route('teacher.profile.update', $user->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
            <div>
                <a href="{{ route('teacher.profile') }}">
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
                    <div class="flex">
                        <label for="">Profile Picture:</label>
                        <input type="file" name="image" style="padding-top: 35px; padding-left:12px;">
                    </div>
                </div>
                <button type="submit" class="save">Save</button>

        </form>
    </main>
</body>

</html>
