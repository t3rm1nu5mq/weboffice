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
<div class="position-ref full-height">
    <div class="row">
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
    </div>

    <div class="row" style="margin: 0px">
        <div class="container" style="padding-bottom: 100px">
            <div class="row">
                <div class="col-12 welcome_header">
                    <p class="welcome_header_text">
                        Web- és mobil alkalmazásfejlesztés<br>elképzeléstől a megvalósításig
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="width: 100%;">
        <div class="container">
            <div class="row" style="position: relative; top: 75vh; font-size: 32px">
                <div class="col-12" style="text-align: center">
                    Hogyan lesz az elképzelésből valóság?
                </div>
                <hr class="section-header">
            </div>
            <div class="row" style="position: relative; top: 75vh; margin-top: 20px">
                <div class="col-12" style="text-align: center">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-3 section-card">
                            <img src="/icons/form.png" class="section-header-image"><br>
                            <b>Igényfelmérés</b>
                            <hr class="section-header" style="height: 2px">
                            A kapcsolatfelvételt követően egy részletes megbeszélés során megismerem elképzeléseit,
                            igényeit.
                            A megfogalmazódó kérdésekre közösen keresünk megoldást.
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 section-card">
                            <img src="/icons/designing.png" class="section-header-image"><br>
                            <b>Tervezés</b>
                            <hr class="section-header" style="height: 2px">
                            Az igényfelmérés során elmondottak alapján készül a projektről egy előzetes terv, mely
                            magában foglal egy látványtervet valamint egy időbeosztást is, közösen kijelölt
                            mérföldkövekkel.
                            Ezek mellett derül ki az árajánlat is.
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 section-card">
                            <img src="/icons/development.png" class="section-header-image"><br>
                            <b>Fejlesztés</b>
                            <hr class="section-header" style="height: 2px">
                            A fejlesztés az előre elfogadott beosztás alapján történik. A folyamat nyomon követhető,
                            állandó kapcsolattartás történik.
                            A fejlesztés végső szakaszában történik a tesztelés és esetleges javítás is.
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 section-card">
                            <img src="/icons/handover.png" class="section-header-image"><br>
                            <b>Átadás</b>
                            <hr class="section-header" style="height: 2px">
                            Végül az elkészült projekt átadásra kerül az Ön részére.
                            Igény esetén üzemeltetésre is sor kerül.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="position: relative; top: 85vh; font-size: 32px">
            <div class="col-12" style="text-align: center">
                Széles eszköztár a biztos sikerért
            </div>
            <hr class="section-header">
        </div>
        <div class="row" style="position: relative; top: 85vh; display: block; text-align: center">
            <div class="col-1 logos-col">
                <img src="/icons/html5.svg" class="logos">
            </div>
            <div class="col-1 logos-col">
                <img src="/icons/css3.svg" class="logos">
            </div>
            <div class="col-1 logos-col">
                <img src="/icons/javascript-4.svg" class="logos">
            </div>
            <div class="col-1 logos-col">
                <img src="/icons/mysql-vector1.jpg" class="logos">
            </div>
            <div class="col-1 logos-col">
                <img src="/icons/new-php-logo.svg" class="logos">
            </div>
            <div class="col-1 logos-col">
                <img src="/icons/swift-logo.png" class="logos">
            </div>
            <div class="col-1 logos-col">
                <img src="/icons/ionic_logo.png" class="logos">
            </div>
        </div>
    </div>
    @include('cookieConsent::index')
    <div class="row" style="position: relative; top: 85vh; display: block; text-align: center; margin: 0px">
        @include('footer')
    </div>
</div>
</body>
</html>
