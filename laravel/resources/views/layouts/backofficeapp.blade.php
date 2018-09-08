<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{--favicons--}}
    <link rel="apple-touch-icon" sizes="57x57" href="images/iconsback/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/iconsback/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/iconsback/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/iconsback/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/iconsback/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/iconsback/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/iconsback/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/iconsback/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/iconsback/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="imagesback/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/iconsback/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/iconsback/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/iconsback/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ Auth::user() ? 'Backoffice ' . Auth::user()->name : 'Backoffice' }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/appback.css') }}" rel="stylesheet">


<!-- Scripts -->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="/js/jquery-3.2.1.min.js"></script>


</head>
<body>

<header>
    <ul id="nav-mobile" class="side-nav fixed">
        <li class="backofffirstli">
            <div class="userView">
                    @if (Auth::guest())
                    @else
                    <p class="navigationlabel profilename">{{ Auth::user() ? Auth::user()->name : '' }}</p>
                        <a class="navbar-brand profilepic" href="{{ url('/admin') }}">
                            <img class="circle" id="profileimage" src="{{ Auth::user() ? "https://randomuser.me/api/portraits/men/". Auth::user()->id .".jpg" : "img\default.jpg" }}" >
                        </a>
                    @endif
            </div>
        </li>
        <li class="navigationlabel">navigatie</li>
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li class="{{ classActivePath('admin.login') }}"><a>Admin login</a></li>
        @else

            <li class="{{ classActivePath('admin.partijen') }}"><a href="{{ route('admin.partijen') }}"><i class="material-icons">recent_actors</i>Partijen</a></li>
            <li class="{{ classActivePath('admin.stemmers') }}"><a href="{{ route('admin.stemmers') }}"><i class="material-icons">perm_identity</i>Stemmers</a></li>
            <li class="{{ classActivePath('admin.overzicht') }}"><a href="{{ route('admin.overzicht') }}"><i class="material-icons">list</i>Overzicht</a></li>
            <li class="{{ classActivePath('admin.administrator') }}"><a href="{{ route('admin.administrator') }}"><i class="material-icons">supervisor_account</i>Administrators</a></li>
            <li class="{{ classActivePath('Logout') }}">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">power_settings_new</i>
                    Afmelden
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form></li>
        @endif

    </ul>
</header>
<main class="backofficemaincenter">
    <nav class="top-nav backoffnav">

        <div class="backoffpagetitles">
            @yield('pagetitle')
        </div>
        <div class="backoffbuttons">
            @yield('buttons')
        </div>
        <div class="backbuttons">
            @yield('backbutton')
        </div>
    </nav>
    @yield('search')

    <div id="app">
        <div class="row">
            <div class="col s12" >
                @yield('content')
            </div>

        </div>

    </div>
</main>
@if($flash = session('statusbericht'))
    <div id="flashmessage" class="card-panel green flashmessage">
        <p>{{ $flash }}</p>
    </div>
@endif
@if($flash = session('statusberichtfail'))
    <div id="flashmessagefail" class="card-panel red flashmessage">
        <p>{{ $flash }}</p>
    </div>
@endif
<script src="/js/jquery.PrintArea.js"></script>
@extends('layouts.script')
</body>
</html>
