<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('image/ips.png') }}">
    <title>I.P.S Corrientes</title>




    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--fontaweson-->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/font-awesome.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!--custom style-->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="header">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('image/logo-ips-header.png') }}" alt="logo_ips" class="rounded float-left">

                        <!-- <small class="text-muted">Instittuto de Previsión Social de Corrientes</small> -->
                        <!-- <a href="{{ url('/') }}"><img src="{{ asset('image/logo-ips-header.png') }}"></a> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto w-100">
                            <li>
                                {{-- <h3 class="px-5 text-muted">Control de Aportes</h3> --}}
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">


                            @auth
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" type="button" id="dropdownAuthUser"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>{{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownAuthUser">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            <i
                                                class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                            @endauth
                            <!-- <img src="image/moon.png" id="icon"> -->
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

        <main>
            @yield('content')
        </main>

    </div>

    <!--script dark mode-->
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    @yield('js')
</body>

</html>
