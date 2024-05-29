<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
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
            grid-template-columns: 1fr;
            margin: 50px 300px;
            width: 1180px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
            line-height: 70px;
        }

        .container {
            max-width: 1150px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
        }

        .profile {
            font-size: 40px;
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        /* Input Styles */
        input[type="date"],
        select {
            padding: 8px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

       .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
    @include('layouts.teacher')
    <main>
        <div class="profile">
            <a href="{{ route('teacher.attendance') }}"
                style="color: black; font-size:25px; font-weight:normal; padding-top:-10px">&#128065;</a>Attendance
        </div>
        <div class="container">
            <form action="{{ route('teacher.attendance.store') }}" method="POST">
                @csrf

                <input type="hidden" name="student_id" value="{{ $student->id }}">

                <div>{{ $student->first_name }} {{ $student->last_name }}</div>
                <div class="flex">
                    <div>Present: </div>
                    <div>
                        <input type="date" name="date" placeholder="Date">
                        @error('date')
                            {{ $message }}
                        @enderror
                        <select name="day">
                            <option value="">Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                        @error('day')
                            {{ $message }}
                        @enderror
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
                        @error('time')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="flex">
                    <div>Unexcused Absence:</div>
                    <div>
                        <input type="date" name="Udate" placeholder="Date">
                        @error('Udate')
                            {{ $message }}
                        @enderror
                        <select name="Uday">
                            <option value="">Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                        @error('Uday')
                            {{ $message }}
                        @enderror
                        <select name="Utime" style="margin-bottom: 20px;">
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
                        @error('Utime')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="flex">
                    <div>Teacher Request of Absence:</div>
                    <div>
                        <input type="date" name="Tdate" placeholder="Date">
                        @error('Tdate')
                            {{ $message }}
                        @enderror
                        <select name="Tday">
                            <option value="">Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                        @error('Tday')
                            {{ $message }}
                        @enderror
                        <select name="Ttime" style="margin-bottom: 20px;">
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
                        @error('Ttime')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <button type="submit" class="button">Save</button>
            </form>
        </div>

    </main>
</body>

</html>
