<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TerminusMq Codes</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '.allow-focus .dropdown-menu', function (e) {
            e.stopPropagation();
        });
    </script>
</head>

<body>
<div class="position-ref full-height container" id="app" style="padding-top: 0px">
    <div class="row">
        <div class="top-left links">
            <div id="navbarBackground" class="navbar-logo-div">
                <img id="navbarKeyboard" class="navbar-logo navbar-logo-keyboard" src="/images/uj_billentyuzet.png"
                     alt="logo">
                <img class="navbar-logo navbar-logo-background" src="/images/logo3.png" alt="logo">
            </div>
        </div>
        @if (Route::has('login'))
            <div class="top-right links" style="display: none">
                <div class="dropleft allow-focus">
                    <button class="main-header-button btn btn-secondary dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bejelentkezés
                    </button>
                    <div id="myDropdown" class="dropdown-menu login-dropdown" aria-labelledby="dropdownMenuButton"
                         style="background-color: rgba(0, 0, 0, 0); border: none">
                        @include('auth.login')
                    </div>
                </div>
                @auth
                    <a class="main-header-button" href="{{ url('/home') }}">Home</a>
                @else
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Regisztráció</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="row" style="margin: 0px">
        <div class="col-12" style="padding-bottom: 100px">
            <div class="row welcome_header_row">
                <div class="col-12 welcome_header">
                    <p class="welcome_header_text">
                        Web- és mobil alkalmazásfejlesztés<br>elképzeléstől a megvalósításig
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="width: 100%;">
        <div class="col">
            <div class="row" style="position: relative; top: 75vh; font-size: 32px">
                <div class="col-12" style="text-align: center">
                    Hogyan lesz az elképzelésből valóság?
                </div>
                <hr class="section-header">
            </div>
            <div class="row" style="position: relative; top: 75vh; margin-top: 20px">
                <div class="col-12" style="text-align: center">
                    <div class="row section-card-row justify-content-center" style="text-align: center">
                        <div class="col-12 col-md-3 section-card">
                            <img src="/icons/form.png" class="section-header-image"><br>
                            <b>Igényfelmérés</b>
                            <hr class="section-header" style="height: 2px">
                            A kapcsolatfelvételt követően egy részletes megbeszélés során megismerem elképzeléseit,
                            igényeit.
                            A megfogalmazódó kérdésekre közösen keresünk megoldást.
                        </div>
                        <div class="col-12 col-md-3 section-card">
                            <img src="/icons/designing.png" class="section-header-image"><br>
                            <b>Tervezés</b>
                            <hr class="section-header" style="height: 2px">
                            Az igényfelmérés során elmondottak alapján készül a projektről egy előzetes terv, mely
                            magában foglal egy látványtervet valamint egy időbeosztást is, közösen kijelölt
                            mérföldkövekkel.
                            Ezek mellett derül ki az árajánlat is.
                        </div>
                        <div class="col-12 col-md-3 section-card">
                            <img src="/icons/development.png" class="section-header-image"><br>
                            <b>Fejlesztés</b>
                            <hr class="section-header" style="height: 2px">
                            A fejlesztés az előre elfogadott beosztás alapján történik. A folyamat nyomon követhető,
                            állandó kapcsolattartás történik.
                            A fejlesztés végső szakaszában történik a tesztelés és esetleges javítás is.
                        </div>
                        <div class="col-12 col-md-3 section-card">
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
    <div class="col">
        <div class="row" style="position: relative; top: 85vh; font-size: 32px">
            <div class="col-12" style="text-align: center">
                Széles eszköztár a biztos sikerért
            </div>
            <hr class="section-header">
        </div>
        <div class="row logos-row" style="position: relative; top: 85vh; display: block; text-align: center">
            <div class="col-12">
                <div class="col-1 logos-col" style="margin-left: 0">
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
    </div>
    @include('cookieConsent::index')
    <div class="row" style="position: relative; top: 90vh; margin: 0px; margin-bottom: 20px">
        <section id="contact" style="height: auto">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <h1>Felkeltettem az érdeklődését?</h1>
                    <h4>A lenti űrlap kitöltésével kapcsolatba léphet velem.</h4>
                </div>
            </div>
            <div class="contact-section">
                <div class="container">
                    <contact-form></contact-form>
                </div>
            </div>
        </section>
    </div>
    <div class="row" style="position: relative; top: 87vh; display: block; text-align: center; margin: 0px">
        @include('footer')
    </div>
</div>
</body>
</html>
