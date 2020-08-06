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
        <div class="row justify-content-md-center bg-white" style="height: 100%">
            <nav id="navbar" class="col col-md-2 bg-white row" style="height: 100%">
                <div class="position-fixed" style="height: 100%;">
                    <ul class="nav flex-column position-relative" style="height: 100%">
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
                            <li class="nav-item"><a class="navbar-brand rounded twitter-link" href="{{ url('/home') }}">
                                <img src="{{ asset('images/twitter.png') }}" id="thumbnail" alt="">
                            </a></li>
                            <li class="nav-item py-2">
                                <a href="/" class="nav-link twitter-link rounded">
                                    <img src="{{ asset('images/home.jpg') }}" class="navbar-icon" alt=""> 
                                    <span class="font-weight-bold">Home</span>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="#" class="nav-link twitter-link rounded">
                                    <img src="{{ asset('images/hashtag.png') }}" class="navbar-icon" alt="">
                                    <span class="font-weight-bold">Explore</span>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="#" class="nav-link twitter-link rounded">
                                    <img src="{{ asset('images/notif.png') }}" class="navbar-icon" alt="">
                                    <span class="font-weight-bold">Notifications</span> 
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="#" class="nav-link twitter-link rounded">
                                    <img src="{{ asset('images/dm.png') }}" class="navbar-icon" alt="">
                                    <span class="font-weight-bold">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="#" class="nav-link twitter-link rounded">
                                    <img src="{{ asset('images/bookmark.png') }}" class="navbar-icon" alt="">
                                    <span class="font-weight-bold">Bookmarks</span>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="#" class="nav-link twitter-link rounded">
                                    <img src="{{ asset('images/list.png') }}" class="navbar-icon" alt="">
                                    <span class="font-weight-bold">Lists</span>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href={{ url(Auth::user()->handle) }} class="nav-link twitter-link rounded">
                                    <img src="{{ asset('images/profile-icon.png') }}" class="navbar-icon" alt="">
                                    <span class="font-weight-bold">Profile</span>
                                    
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="#" class="nav-link twitter-link rounded">
                                    <img src="{{ asset('images/more.png') }}" class="navbar-icon" alt="">
                                    <span class="font-weight-bold">More</span>
                                    
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <b-button v-b-modal.modal class="btn btn-primary">Tweet</b-button>
                                <b-modal id="modal">
                                    hi
                                </b-modal>
                            </li> --}}
                            <li class="make-tweet">
                                <b-button v-b-modal.modal-1 variant="primary">Tweet</b-button>

                                <b-modal id="modal-1">
                                    @if ($profile)
                                        <make-tweet :profile={{$profile}}></make-tweet>
                                    @else
                                        <make-tweet :profile={{$profile_first}}></make-tweet>
                                    @endif
                                </b-modal>
                                {{-- <TweetButton :profile="{{$profile}}"/> --}}
                                {{-- <button @click="isOpen = 1" class="btn btn-primary">Tweet</button>
                                <Tweet :profile={{$profile}} :showModal=FALSE /> --}}
                            </li>

                            <li class="nav-item dropdown position-absolute fixed-bottom text-right">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: gray" href="{{ route('profile', ['user' => Auth::user()->name]) }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ '@' . Auth::user()->handle }} <span class="caret"></span>
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
            <main class="pt-4 px-0 col col-md-4 border-left border-right">
                @yield('content')
            </main>
            <div class="col col-md-2">
                Search Twitter
                {{-- <router-view></router-view> --}}
            </div>
        </div>
    </div>
</body>
</html>
