<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schedules</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/teacher/header.css') }}">
    <style>
        .content {
            background: #ffffff;
            position: fixed;
            top: 0;
            left: 250px;
            bottom: 0;
            width: 100%;
        }

        .title {
            font-family: 'Times New Roman', Times, serif;
            font-size: 30px;
            padding: 50px 0 0 540px;
            font-weight: bold;
        }

        .assignable {
            font-family: 'Times New Roman', Times, serif;
            display: grid;
            margin-top: 16px;
            margin-left: 50px;
            text-align: center;
            width: 1160px;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            box-shadow: 0 4px 6px #312450, 0 1px 3px #312450;
            text-align: center;
        }

        .time-to-flex {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Times New Roman', Times, serif;
            padding: 10px 10px;
            width: 100%;
            line-height: 38px;
        }

        .instrument {
            position: fixed;
            bottom: 50px;
            left: 300px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            padding: 10px 10px;
            display: flex;
        }

        .header {
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 700;
        }

        .save {
            border-radius: 30px;
            border-style: solid;
            border-width: 1px;
            cursor: pointer;
            padding: 10px 20px;
            background: #312450;
            border-color: rgb(255, 255, 255);
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            margin-left: 600px;
            margin-top: 30px;
        }

        input[type="checkbox"] {
            display: none;
        }

        label {
            padding: 15px 40px;
            cursor: pointer;
            border: solid 1px rgb(201, 201, 201);
            border-radius: 4px;
            transition: all 0.3s ease;
            margin-bottom: 6px;
        }

        label:hover {
            background: #312450;
        }

        input[type="checkbox"]:checked + label {
            background: #312450;
            color: white;
        }

        .selected {
            cursor: pointer;
            border: solid 1px rgb(201, 201, 201);
            border-radius: 4px;
            color: #312450;
            background: #312450;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    @include('layouts.teacher')
    <main class="content">
        <div class="title">
            My Schedules
            <span style="margin-right:30px">
                <a href="{{ route('teacher.schedules') }}"
                    style="color: black; font-size:25px; font-weight:normal; padding-top:-10px">
                    &#128065;
                </a>
            </span>
        </div>
        <form action="{{ route('teacher.schedules.update') }}" method="POST">
            @csrf
            @method('put')
            <div class="assignable">
                <div class="time-to-flex">
                    <div class="header">Time</div>
                    <div>9:00am-9:45am</div>
                    <div>9:45am-10:30am</div>
                    <div>10:30am-11:15am</div>
                    <div>11:15am-12:00pm</div>
                    <div>1:00pm-1:45pm</div>
                    <div>1:45pm-2:30pm</div>
                    <div>2:30pm-3:15pm</div>
                    <div>3:15pm-4:00pm</div>
                    <div>4:00pm-4:45pm</div>
                    <div>4:45pm-5:30pm</div>
                    <div>5:30pm-6:15pm</div>
                    <div>6:15pm-7:00pm</div>
                </div>
                <div class="time-to-flex">
                    <div class="header">Monday</div>
                    <div style="display:flex; flex-direction:column; margin: 5px;">
                        <input type="checkbox" name="m1" value="9:00am-9:45am" id="m1">
                        <label for="m1"></label>
                        <input type="checkbox" name="m2" value="9:45am-10:30am" id="m2">
                        <label for="m2"></label>
                        <input type="checkbox" name="m3" value="10:30am-11:15am" id="m3">
                        <label for="m3"></label>
                        <input type="checkbox" name="m4" value="11:15am-12:00" id="m4">
                        <label for="m4"></label>
                        <input type="checkbox" name="m5" value="1:00pm-1:45pm" id="m5">
                        <label for="m5"></label>
                        <input type="checkbox" name="m6" value="1:45pm-2:30pm" id="m6">
                        <label for="m6"></label>
                        <input type="checkbox" name="m7" value="2:30pm-3:15pm" id="m7">
                        <label for="m7"></label>
                        <input type="checkbox" name="m8" value="3:15pm-4:00pm" id="m8">
                        <label for="m8"></label>
                        <input type="checkbox" name="m9" value="4:00pm-4:45pm" id="m9">
                        <label for="m9"></label>
                        <input type="checkbox" name="m10" value="4:45pm-5:30pm" id="m10">
                        <label for="m10"></label>
                        <input type="checkbox" name="m11" value="5:30pm-6:15pm" id="m11">
                        <label for="m11"></label>
                        <input type="checkbox" name="m12" value="6:15pm-7:00pm" id="m12">
                        <label for="m12"></label>
                    </div>
                </div>
                <div class="time-to-flex">
                    <div class="header">Tuesday</div>
                    <div style="display:flex; flex-direction:column; margin: 5px;">
                        <input type="checkbox" name="t1" value="9:00am-9:45am" id="t1">
                        <label for="t1"></label>
                        <input type="checkbox" name="t2" value="9:45am-10:30am" id="t2">
                        <label for="t2"></label>
                        <input type="checkbox" name="t3" value="10:30am-11:15am" id="t3">
                        <label for="t3"></label>
                        <input type="checkbox" name="t4" value="11:15am-12:00" id="t4">
                        <label for="t4"></label>
                        <input type="checkbox" name="t5" value="1:00pm-1:45pm" id="t5">
                        <label for="t5"></label>
                        <input type="checkbox" name="t6" value="1:45pm-2:30pm" id="t6">
                        <label for="t6"></label>
                        <input type="checkbox" name="t7" value="2:30pm-3:15pm" id="t7">
                        <label for="t7"></label>
                        <input type="checkbox" name="t8" value="3:15pm-4:00pm" id="t8">
                        <label for="t8"></label>
                        <input type="checkbox" name="t9" value="4:00pm-4:45pm" id="t9">
                        <label for="t9"></label>
                        <input type="checkbox" name="t10" value="4:45pm-5:30pm" id="t10">
                        <label for="t10"></label>
                        <input type="checkbox" name="t11" value="5:30pm-6:15pm" id="t11">
                        <label for="t11"></label>
                        <input type="checkbox" name="t12" value="6:15pm-7:00pm" id="t12">
                        <label for="t12"></label>
                    </div>
                </div>
                <div class="time-to-flex">
                    <div class="header">Wednesday</div>
                    <div style="display:flex; flex-direction:column; margin: 5px;">
                        <input type="checkbox" name="w1" value="9:00am-9:45am" id="w1">
                        <label for="w1"></label>
                        <input type="checkbox" name="w2" value="9:45am-10:30am" id="w2">
                        <label for="w2"></label>
                        <input type="checkbox" name="w3" value="10:30am-11:15am" id="w3">
                        <label for="w3"></label>
                        <input type="checkbox" name="w4" value="11:15am-12:00" id="w4">
                        <label for="w4"></label>
                        <input type="checkbox" name="w5" value="1:00pm-1:45pm" id="w5">
                        <label for="w5"></label>
                        <input type="checkbox" name="w6" value="1:45pm-2:30pm" id="w6">
                        <label for="w6"></label>
                        <input type="checkbox" name="w7" value="2:30pm-3:15pm" id="w7">
                        <label for="w7"></label>
                        <input type="checkbox" name="w8" value="3:15pm-4:00pm" id="w8">
                        <label for="w8"></label>
                        <input type="checkbox" name="w9" value="4:00pm-4:45pm" id="w9">
                        <label for="w9"></label>
                        <input type="checkbox" name="w10" value="4:45pm-5:30pm" id="w10">
                        <label for="w10"></label>
                        <input type="checkbox" name="w11" value="5:30pm-6:15pm" id="w11">
                        <label for="w11"></label>
                        <input type="checkbox" name="w12" value="6:15pm-7:00pm" id="w12">
                        <label for="w12"></label>
                    </div>
                </div>
                <div class="time-to-flex">
                    <div class="header">Thursday</div>
                    <div style="display:flex; flex-direction:column; margin: 5px;">
                        <input type="checkbox" name="th1" value="9:00am-9:45am" id="th1">
                        <label for="th1"></label>
                        <input type="checkbox" name="th2" value="9:45am-10:30am" id="th2">
                        <label for="th2"></label>
                        <input type="checkbox" name="th3" value="10:30am-11:15am" id="th3">
                        <label for="th3"></label>
                        <input type="checkbox" name="th4" value="11:15am-12:00" id="th4">
                        <label for="th4"></label>
                        <input type="checkbox" name="th5" value="1:00pm-1:45pm" id="th5">
                        <label for="th5"></label>
                        <input type="checkbox" name="th6" value="1:45pm-2:30pm" id="th6">
                        <label for="th6"></label>
                        <input type="checkbox" name="th7" value="2:30pm-3:15pm" id="th7">
                        <label for="th7"></label>
                        <input type="checkbox" name="th8" value="3:15pm-4:00pm" id="th8">
                        <label for="th8"></label>
                        <input type="checkbox" name="th9" value="4:00pm-4:45pm" id="th9">
                        <label for="th9"></label>
                        <input type="checkbox" name="th10" value="4:45pm-5:30pm" id="th10">
                        <label for="th10"></label>
                        <input type="checkbox" name="th11" value="5:30pm-6:15pm" id="th11">
                        <label for="th11"></label>
                        <input type="checkbox" name="th12" value="6:15pm-7:00pm" id="th12">
                        <label for="th12"></label>
                    </div>
                </div>
                <div class="time-to-flex">
                    <div class="header">Friday</div>
                    <div style="display:flex; flex-direction:column; margin: 5px;">
                        <input type="checkbox" name="f1" value="9:00am-9:45am" id="f1">
                        <label for="f1"></label>
                        <input type="checkbox" name="f2" value="9:45am-10:30am" id="f2">
                        <label for="f2"></label>
                        <input type="checkbox" name="f3" value="10:30am-11:15am" id="f3">
                        <label for="f3"></label>
                        <input type="checkbox" name="f4" value="11:15am-12:00" id="f4">
                        <label for="f4"></label>
                        <input type="checkbox" name="f5" value="1:00pm-1:45pm" id="f5">
                        <label for="f5"></label>
                        <input type="checkbox" name="f6" value="1:45pm-2:30pm" id="f6">
                        <label for="f6"></label>
                        <input type="checkbox" name="f7" value="2:30pm-3:15pm" id="f7">
                        <label for="f7"></label>
                        <input type="checkbox" name="f8" value="3:15pm-4:00pm" id="f8">
                        <label for="f8"></label>
                        <input type="checkbox" name="f9" value="4:00pm-4:45pm" id="f9">
                        <label for="f9"></label>
                        <input type="checkbox" name="f10" value="4:45pm-5:30pm" id="f10">
                        <label for="f10"></label>
                        <input type="checkbox" name="f11" value="5:30pm-6:15pm" id="f11">
                        <label for="f11"></label>
                        <input type="checkbox" name="f12" value="6:15pm-7:00pm" id="f12">
                        <label for="f12"></label>
                    </div>
                </div>
                <div class="time-to-flex">
                    <div class="header">Saturday</div>
                    <div style="display:flex; flex-direction:column; margin: 5px;">
                        <input type="checkbox" name="s1" value="9:00am-9:45am" id="s1">
                        <label for="s1"></label>
                        <input type="checkbox" name="s2" value="9:45am-10:30am" id="s2">
                        <label for="s2"></label>
                        <input type="checkbox" name="s3" value="10:30am-11:15am" id="s3">
                        <label for="s3"></label>
                        <input type="checkbox" name="s4" value="11:15am-12:00" id="s4">
                        <label for="s4"></label>
                        <input type="checkbox" name="s5" value="1:00pm-1:45pm" id="s5">
                        <label for="s5"></label>
                        <input type="checkbox" name="s6" value="1:45pm-2:30pm" id="s6">
                        <label for="s6"></label>
                        <input type="checkbox" name="s7" value="2:30pm-3:15pm" id="s7">
                        <label for="s7"></label>
                        <input type="checkbox" name="s8" value="3:15pm-4:00pm" id="s8">
                        <label for="s8"></label>
                        <input type="checkbox" name="s9" value="4:00pm-4:45pm" id="s9">
                        <label for="s9"></label>
                        <input type="checkbox" name="s10" value="4:45pm-5:30pm" id="s10">
                        <label for="s10"></label>
                        <input type="checkbox" name="s11" value="5:30pm-6:15pm" id="s11">
                        <label for="s11"></label>
                        <input type="checkbox" name="s12" value="6:15pm-7:00pm" id="s12">
                        <label for="s12"></label>
                    </div>
                </div>
            </div>
            <div class="instrument">
                <div>Instrument:</div>
                <select name="instrument">
                    <option value=""></option>
                    <option value="Guitar">Guitar</option>
                    <option value="Piano">Piano</option>
                    <option value="Voice">Voice</option>
                    <option value="Drums">Drums</option>
                    <option value="Violin">Violin</option>
                    <option value="Arts">Arts</option>
                </select>
            </div>
            <button type="submit" class="save">Save</button>
        </form>
    </main>
</body>

</html>
