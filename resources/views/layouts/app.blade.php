<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <div id="app" class="container-fluid">
        <div class="row justify-content-md-center bg-white">
            <nav id="navbar" class="col col-md-2 bg-white row">
                <div class="pl-md-5 position-fixed">
                    <ul class="nav flex-column">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item"><a class="navbar-brand" href="{{ url('/home') }}">
                                <img src="{{ asset('images/twitter.png') }}" id="thumbnail" alt="">
                            </a></li>
                            <li class="nav-item">
                                <a href="/" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Explore</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Notifications</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Bookmarks</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Lists</a>
                            </li>
                            <li class="nav-item">
                                <a href={{ url(Auth::user()->handle) }} class="nav-link">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">More</a>
                            </li>
                            <li class="nav-item"><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('profile', ['user' => Auth::user()->name]) }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->handle }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <main class="pt-4 col col-md-4">
                @yield('content')
            </main>
            <div class="col col-md-2">
                Search Twitter
            </div>
        </div>
    </div>
</body>
</html>
