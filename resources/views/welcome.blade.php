<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TerminusMq Codes</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
<div class="flex-center position-ref full-height">
    <div class="top-left links">
        <div id="navbarBackground" class="navbar-logo-div">
            <img id="navbarKeyboard" class="navbar-logo navbar-logo-keyboard" src="/images/uj_billentyuzet.png"
                 alt="logo">
            <img class="navbar-logo navbar-logo-background" src="/images/logo3.png" alt="logo">
        </div>
    </div>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a class="main-header-button" href="{{ url('/home') }}">Home</a>
            @else
                <a class="main-header-button" href="{{ route('login') }}">Bejelentkezés</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Regisztráció</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="row">
        <div class="col-12 welcome_header">
            <p class="welcome_header_text">
                Web- és mobil alkalmazásfejlesztés<br>elképzeléstől a megvalósításig
            </p>
        </div>
    </div>

    @include('footer')
</div>
</body>
</html>
