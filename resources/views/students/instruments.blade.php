<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruments</title>
    <link rel="stylesheet" href="{{ asset('stylesheets/general.css') }}">
    <link rel="stylesheet" href="{{ asset('newstylesheets/header.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/instruments.css') }}">
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
    <div class="grid-instruments">
        <!--Guitar-->
        <div class="flex">
            <img src="{{ asset('pictures/guitar.jpg') }}" class="instruments-guitar">
            <div class="tag-line">
                Strumming Dreams to Reality: Unleash Your Inner Melody!🎸✨</div>
            <a href="#guitar">
                <button class="enroll-now">Guitar</button>
            </a>
        </div>
        <!--Piano-->
        <div class="flex">
            <img src="{{ asset('pictures/piano.jpg') }}" class="instruments-piano">
            <div class="tag-line">
                Harmony Awaits: Let Your Fingers Dance Across the Keys!🎹</div>
            <a href="#piano">
                <button class="enroll-now">Piano</button>
            </a>
        </div>
        <!--Voice-->
        <div class="flex">
            <img src="{{ asset('pictures/voice.jpg') }}" class="instruments-voice">
            <div class="tag-line">
                Unleash Your Vocal Brilliance: Transform Your Voice🎤🌟</div>
            <a href="#voice">
                <button class="enroll-now">Voice</button>
            </a>
        </div>
        <!--Drums-->
        <div class="flex">
            <img src="{{ asset('pictures/drums.jpg') }}" class="instruments-drums">
            <div class="tag-line-drums">
                Beat to Your Own Rhythm: Let the Percussive Magic Begin!🥁✨</div>
            <a href="#drums">
                <button class="enroll-now">Drums</button>
            </a>
        </div>
        <!--Violin-->
        <div class="flex">
            <img src="{{ asset('pictures/violin.jpg') }}" class="instruments-violin">
            <div class="tag-line-violin">
                Strings of Passion, Bow of Mastery: Ignite Your Melodic Journey!🎻</div>
            <a href="#violin">
                <button class="enroll-now">Violin</button>
            </a>
        </div>
        <!--Arts-->
        <div class="flex">
            <img src="{{ asset('pictures/arts.jpg') }}" class="instruments-arts">
            <div class="tag-line-arts"> Unleash Your Creativity: Paint Your Passion on the Canvas of Imagination!🎨🌈
            </div>
            <a href="#arts">
                <button class="enroll-now">Arts</button>
            </a>
        </div>
    </div>
    <div class="choose">Choose Your Instruments:</div>
    <!--Guitar ID-->
    <div class="guitar-landing-page" id="guitar">
        <div class="container">
            <img src="{{ asset('pictures/playing-guitar.jpg') }}" class="playing-guitar">
            <div class="mini-container">
                <div class="guitar-title">Guitar</div>
                <div class="instrument-description">Are you ready to embark on a musical journey and unlock the magic of
                    the guitar? Look no further! We offer expert guitar lessons tailored to your skill level, whether
                    you're a complete beginner or looking to refine your existing skills.</div>
            </div>
            @guest
                <a href="{{ route('register') }}">
                    <button class="enroll-button-guitar">Enroll</button>
                </a>
            @endguest

            @auth
                <form action="{{ route('student.instruments.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="enroll-button-guitar" name="instrument" value="Guitar" style="margin-left: 50px;">Enroll</button>
                </form>
            @endauth
        </div>
    </div>
    <!--Piano ID-->
    <div class="piano-landing-page" id="piano">
        <div class="container">
            <img src="{{ asset('pictures/playing-piano.jpg') }}" class="playing-piano">
            <div class="mini-container">
                <div class="piano-title">Piano</div>
                <div class="instrument-description-piano">Are you ready to explore the timeless beauty of piano music
                    and unlock your musical potential? Enroll now, we are dedicated to providing a transformative
                    learning experience, where the magic of the piano comes to life.</div>
            </div>
            @guest
                <a href="{{ route('register') }}">
                    <button class="enroll-button-piano">Enroll</button>
                </a>
            @endguest
            @auth
                <form action="{{ route('student.instruments.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="enroll-button-piano" name="instrument" value="Piano">Enroll</button>
                </form>
            @endauth

        </div>
    </div>
    <!--Voice ID-->
    <div class="voice-landing-page" id="voice">
        <div class="container">
            <img src="{{ asset('pictures/playing-voice.jpg') }}" class="playing-voice">
            <div class="mini-container">
                <div class="voice-title">Voice</div>
                <div class="instrument-description">If you've ever dreamt of singing with confidence, expressing
                    yourself through powerful melodies, or simply improving your vocal skills, you're in the right
                    place!</div>
            </div>
            @guest
                <a href="{{ route('register') }}">
                    <button class="enroll-button-guitar">Enroll</button>
                </a>
            @endguest
            @auth
                <form action="{{ route('student.instruments.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="enroll-button-voice" name="instrument" value="Voice">Enroll</button>
                </form>
            @endauth

        </div>
    </div>
    <!--Drums ID-->
    <div class="drums-landing-page" id="drums">
        <div class="container">
            <img src="{{ asset('pictures/playing-drums.jpg') }}" class="playing-drums">
            <div class="mini-container">
                <div class="drums-title">Drums</div>
                <div class="instrument-description-drums">Get ready to unleash the power of percussion. Our drum
                    lessons
                    are not just about beats and rhythms; they're about discovering your unique groove and becoming a
                    rhythmic maestro.</div>
            </div>
            @guest
                <a href="{{ route('register') }}">
                    <button class="enroll-button-guitar">Enroll</button>
                </a>
            @endguest
            @auth
                <form action="{{ route('student.instruments.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="enroll-button-drums" name="instrument" value="Drums">Enroll</button>
                </form>
            @endauth

        </div>
    </div>
    <!--Violin ID-->
    <div class="violin-landing-page" id="violin">
        <div class="container">
            <img src="{{ asset('pictures/playing-violin.jpg') }}" class="playing-violin">
            <div class="mini-container">
                <div class="violin-title">Violin</div>
                <div class="instrument-description-violin">If you've ever dreamed of mastering the art of the violin,
                    expressing yourself through beautiful melodies, or joining the ranks of accomplished violinists,
                    you're in the right place.</div>
            </div>
            @guest
                <a href="{{ route('register') }}">
                    <button class="enroll-button-guitar">Enroll</button>
                </a>
            @endguest
            @auth
                <form action="{{ route('student.instruments.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="enroll-button-violin" name="instrument" value="Violin">Enroll</button>
                </form>
            @endauth

        </div>
    </div>
    <!--Arts ID-->
    <div class="arts-landing-page" id="arts">
        <div class="container">
            <img src="{{ asset('pictures/playing-arts.jpg') }}" class="playing-arts">
            <div class="mini-container">
                <div class="arts-title">Arts</div>
                <div class="instrument-description-arts">If you have a passion for self-expression through art, our
                    arts lessons are designed to ignite your imagination, refine your skills, and help you bring your
                    artistic visions to life.</div>
            </div>
            @guest
                <a href="{{ route('register') }}">
                    <button class="enroll-button-guitar">Enroll</button>
                </a>
            @endguest
            @auth
                <form action="{{ route('student.instruments.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="enroll-button-arts" name="instrument" value="Arts">Enroll</button>
                </form>
            @endauth

        </div>
    </div>
</body>

</html>
