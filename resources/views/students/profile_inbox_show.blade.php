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

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin: 50px 520px;
            line-height: 90px;
            width: 700px;
            font-family: 'Times New Roman', Times, serif;
            background: aqua;
            text-align: center;
        }

        .account {
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
        }
    </style>
</head>

<body>
    @include('layouts.profile')
    <main>
        <div class="profile">Inbox</div>
        <div class="grid">
            hey
        </div>
    </main>
</body>

</html>
