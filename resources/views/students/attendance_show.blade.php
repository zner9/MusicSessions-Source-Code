<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
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

        .flex {
            margin-left: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            padding: 15px 15px;
            width: 1150px;
            line-height: 40px;
            font-size: 18px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        form>div>input[type="date"],
        form>div>select {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

    </style>
</head>

<body>
    @include('layouts.profile')
    <main>
        <div class="profile"><a href="{{ route('student.attendance') }}"
            style="color: black; font-size:25px; font-weight:normal; padding-top:-10px">
            &#128065;
        </a>Attendance</div>
        <div class="flex">
            <div>
                <div style="display:flex">
                    <form action="{{ route('student.attendance.update') }}" method="POST">
                        @csrf
                        <div>
                            <div style="margin-right: 12px;">Request of Absence: </div>
                            <input type="date" name="date" placeholder="Date" style="margin-right: 12px;">
                            <select name="day" style="margin-right: 12px;">
                                <option value="">Day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                            <select name="time">
                                <option value="">Time</option>
                                <option value="9:00am-9:45am">9:00am-9:45am</option>
                                <option value="9:45am-10:30am">9:45am-10:30am</option>
                                <option value="10:30am-11:15am">10:30am-11:15am</option>
                                <option value="11:15am-12:00pm">11:15am-12:00pm</option>
                                <option value="1:00pm-1:45pm">1:00pm-1:45pm</option>
                                <option value="1:45pm-2:30pm">1:45pm-2:30pm</option>
                                <option value="2:30pm-3:15pm">2:30pm-3:15pm</option>
                                <option value="3:15pm-4:00pm">3:15pm-4:00pm</option>
                                <option value="4:00pm-4:45pm">4:00pm-4:45pm</option>
                                <option value="4:45pm-5:30pm">4:45pm-5:30pm</option>
                                <option value="5:30pm-6:15pm">5:30pm-6:15pm</option>
                                <option value="6:15pm-7:00pm">6:15pm-7:00pm</option>
                            </select>

                        </div>
                        <button type="submit">Save</button>
                    </form>

                </div>
            </div>

        </div>
    </main>
</body>

</html>
