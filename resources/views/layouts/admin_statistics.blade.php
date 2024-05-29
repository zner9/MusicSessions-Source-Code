<div class="home">
    <div class="welcome">Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
    <div class="stats">
        @php
            $guitar = 0;
            $piano = 0;
            $voice = 0;
            $violin = 0;
            $drums = 0;
            $arts = 0;
        @endphp
        @foreach ($instruments as $instrument)
            @if ($instrument->instrument == 'Guitar')
                @php
                    $guitar++;
                @endphp
            @elseif ($instrument->instrument == 'Piano')
                @php
                    $piano++;
                @endphp
            @elseif ($instrument->instrument == 'Voice')
                @php
                    $voice++;
                @endphp
            @elseif ($instrument->instrument == 'Violin')
                @php
                    $violin++;
                @endphp
            @elseif ($instrument->instrument == 'Drums')
                @php
                    $drums++;
                @endphp
            @elseif ($instrument->instrument == 'Arts')
                @php
                    $arts++;
                @endphp
            @endif
        @endforeach
        <div class="flex">
            <img src="{{ asset('images/stats-guitar.svg') }}" class="image">
            <div class="flex-inside">
                <div class="number">{{ $guitar }}</div>
                <div class="students">Guitar Students: </div>
            </div>

        </div>
        <div class="flex">
            <img src="{{ asset('images/stats-piano.svg') }}" class="image">
            <div class="flex-inside">
                <div class="number">{{ $piano }}</div>
                <div class="students">Piano Students: </div>
            </div>
        </div>
        <div class="flex">
            <img src="{{ asset('images/stats-voice.svg') }}" class="image">
            <div class="flex-inside">
                <div class="number">{{ $voice }}</div>
                <div class="students">Voice Students: </div>
            </div>
        </div>
        <div class="flex">
            <img src="{{ asset('images/stats-violin.svg') }}" class="image">
            <div class="flex-inside">
                <div class="number">{{ $violin }}</div>
                <div class="students">Violin Students: </div>
            </div>
        </div>
        <div class="flex">
            <img src="{{ asset('images/stats-drums.svg') }}" class="image">
            <div class="flex-inside">
                <div class="number">{{ $drums }}</div>
                <div class="students">Drums Students: </div>
            </div>
        </div>
        <div class="flex">
            <img src="{{ asset('images/stats-arts.svg') }}" class="image">
            <div class="flex-inside">
                <div class="number">{{ $arts }}</div>
                <div class="students">Arts Students: </div>
            </div>
        </div>
    </div>
