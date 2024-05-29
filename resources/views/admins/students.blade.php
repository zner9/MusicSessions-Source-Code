<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <link rel="stylesheet" href="{{ asset('newstylesheets/admin/header.css') }}">
    <link rel="stylesheet" href="{{ asset('newstylesheets/admin/dashboard.css') }}">
    <style>
        .content {
            background: #ffffff;
            position: fixed;
            top: 0;
            left: 250px;
            bottom: 0;
            width: 100%;
        }

        .h1 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: 30px;
            padding: 50px 0 0 470px;
        }

        .grid {
            display: grid;
            grid-template-columns: 100px 1fr 1fr 1fr 1fr 1fr;
            text-align: center;
            row-gap: 15px;
            text-align: center;
            margin: 40px 100px;
            line-height: 30px;
            width: 1100px;
            border: solid 1px gray;
            padding: 20px 0;
        }

        .head {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
            font-size: 20px;
        }

        .search-container {
            display: flex;
            align-items: center;
            margin-left: 920px;
            margin-top: 20px;
        }

        #search-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #search-button {
            padding: 8px 12px;
            margin-left: 4px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #search-button:hover {
            background-color: #0056b3;
        }

        .reset-search {
            color: black;
            /* Blue color */
            text-decoration: none;
            /* Remove underline */
            margin-left: 10px;
            /* Adjust margin for spacing */
            cursor: pointer;
            /* Show pointer cursor on hover */
        }

        .reset-search:hover {
            text-decoration: underline;
            /* Underline on hover */
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        .search-container label {
            margin-right: 10px;
        }

        .search-container select {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .search-container button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        #search {
            margin-right: 10px;
            padding: 5px;
        }

        #search-button,
        .reset-button {
            padding: 8px 12px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
            border-radius: 4px;
        }

        .reset-button {
            margin-left: 10px;
            background-color: #007bff;
        }

        #search-button:hover,
        .reset-button:hover {
            background-color: #0056b3;
        }

        #search-button:focus,
        .reset-button:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
        }

        .pagination-btn {
            padding: 8px 16px;
            margin: 0 2px;
            /* Adjusted margin */
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination-btn:hover {
            background-color: #f0f0f0;
            color: #555;
        }

        .pagination-btn.disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .pagination-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .pagination-link {
            margin: 0;
        }

        .pagination-link a {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination-link a:hover {
            background-color: #f0f0f0;
            color: #555;
        }

        .pagination-link.active a {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    @include('layouts.admin')
    <div class="content">
        <div class="h1">Music World Students</div>
        <form action="{{ route('admin.students') }}" method="GET">
            @csrf
            <div class="search-container">
                <label for="search" style="font-size:20px;">Instrument:</label>
                <select name="search" id="search">
                    <option value="all" {{ $selectedInstrument === 'all' ? 'selected' : '' }}></option>
                    <option value="Guitar" {{ $selectedInstrument === 'Guitar' ? 'selected' : '' }}>Guitar</option>
                    <option value="Piano" {{ $selectedInstrument === 'Piano' ? 'selected' : '' }}>Piano</option>
                    <option value="Voice" {{ $selectedInstrument === 'Voice' ? 'selected' : '' }}>Voice</option>
                    <option value="Violin" {{ $selectedInstrument === 'Violin' ? 'selected' : '' }}>Violin</option>
                    <option value="Drums" {{ $selectedInstrument === 'Drums' ? 'selected' : '' }}>Drums</option>
                    <option value="Arts" {{ $selectedInstrument === 'Arts' ? 'selected' : '' }}>Arts</option>
                </select>
                <button type="submit">Filter</button>
                @if ($selectedInstrument)
                    <a href="{{ route('admin.students') }}" class="reset-button">Reset</a>
                @endif
            </div>
        </form>


        </form>
        <div class="grid">
            <div class="head">#</div>
            <div class="head">Name</div>
            <div class="head">Contact</div>
            <div class="head">Address</div>
            <div class="head">Instrument</div>
            <div class="head">Teacher</div>
            @php
                $count = 0;
            @endphp
            @foreach ($users as $user)
                @if ($user->is_teacher == 0 && $user->is_admin == 0 && $user->payment_status == 'paid')
                    <div>{{ ++$count }}</div>
                    <div>{{ $user->first_name }} {{ $user->last_name }}</div>
                    <div>{{ $user->contact }}</div>
                    <div>{{ $user->address }}</div>
                    @foreach ($instruments as $instrument)
                        @if ($instrument->student_id == $user->id)
                            <div>{{ $instrument->instrument }}</div>
                        @endif
                    @endforeach
                    @foreach ($teachers as $teacher)
                        @if ($teacher->student_id == $user->id)
                        <div>{{ $teacher->teacher }}</div>
                        @endif
                    @endforeach

                @endif
            @endforeach
        </div>

        <div class="pagination-container" style="margin-left:240px;">
            {{ $users->links() }}
        </div>
    </div>
</body>

</html>
