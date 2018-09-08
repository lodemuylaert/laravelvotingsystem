<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" xmlns="http://www.w3.org/1999/html">
<head>
    {{--favicons--}}
    <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Votevoice 2018</title>

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        window.Userid = {{ Auth::user() ?  Auth::user()->id : null }};
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

</head>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Auth::guest())
                        <ul class="nav navbar-nav" id="loganavigationlist">
                            &nbsp;<img class="logonavigation" src="images\logo.png">
                        </ul>
                        @else
                        <a class="navbar-brand" href="{{ url('/') }}" style="position: relative; width: 60px">
                            <img id="profilepicnavigation" src="{{ Auth::user() ? "https://randomuser.me/api/portraits/men/".  Auth::user()->id .".jpg" : "images\default.jpg" }}" style="width: 40px; height: 40px; position: absolute; border-radius: 50%; top:5px; left: 10px;">

                        </a>
                    @endif


                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="{{ classActivePath('login') }}"><a href="{{ route('login') }}" >Login</a></li>
                            <li class="{{ classActivePath('Wie') }}"><a href="{{ route('wie') }}">Wie mag er stemmen</a></li>
                        @else
                            <li class="{{ classActivePath('Mijnstem') }}"><a href="{{ route('mijnstem') }}">Mijn stem</a></li>
                            <li class="{{ classActivePath('Verloop') }}"><a href="{{ route('verloop') }}">Verloop</a></li>
                            <li class="{{ classActivePath('Partijen') }}"><a href="{{ route('partijen') }}">Partijen</a></li>
                            <li class="{{ classActivePath('Hoe') }}"><a href="{{ route('hoe') }}">Hoe stemmen</a></li>
                            <li class="{{ classActivePath('Logout') }}">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Afmelden
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    @yield('content')


    </div>


    @extends('layouts.script')

</body>
</html>
