<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DashF') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <header class="py-2 border-bottom shadow-sm">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light bg-white px-0">
                        <a class="navbar-brand logo mr-auto" href="{{ route('home') }}">DashF</a>
                        @guest
                            <a class="btn btn-outline-secondary btn-sm ml-auto mr-2 d-md-none" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        @endguest
                        <button class="navbar-toggler btn-sm border-0 p-0 ml-1" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            @guest
                                <span class="navbar-toggler-icon"></span>
                            @endguest
                            @auth
                                <img class="img-circle img-fluid" src="{{ route('cover.thumb', auth()->user()->cover) }}" alt="{{ auth()->user()->username }}">
                            @endauth
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item py-2 d-md-none">
                                    <form class="form-inline flex-nowrap" action="#" method="get">
                                        @csrf
                                        <input class="form-control form-control-sm mr-1 w-100" type="search" placeholder="Search ...">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" aria-label="search">
                                            <i class="fa fa-search fa-fw" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </li>
                                @guest
                                    <li class="nav-item d-flex justify-content-center align-items-center mt-2 mt-md-0">
                                        <a class="btn text-secondary mr-2" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                        <a class="btn btn-outline-secondary" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                    </li>
                                @endguest
                                @auth
                                    <li class="nav-item d-md-none">
                                        <a href="{{ route('profile', auth()->user()->username) }}" class="nav-link">
                                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                            {{ __('Profile') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('post.create') }}" class="nav-link">
                                            <i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i>
                                            {{ __('Write a post') }}
                                        </a>
                                    </li>
                                    <li class="nav-item d-md-none">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-link nav-link" type="submit">
                                                <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>
                                                <span>{{ __('Sign Out') }}</span>
                                            </button>
                                        </form>
                                    </li>
                                    <li class="nav-item d-none d-md-flex align-items-center ml-1">
                                        <div class="dropdown">
                                            <button class="border-0 bg-transparent" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img class="img-circle img-fluid" src="{{ route('cover.thumb', auth()->user()->cover) }}" alt="{{ auth()->user()->username }}">
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('profile', auth()->user()->username) }}">
                                                    <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                                    {{ __('Profile') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('post.create') }}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    {{ __('Write a post') }}
                                                </a>
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">
                                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                        {{ __('Sign Out') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>

                    {{-- <div class="col"> --}}
                        {{--     <a class="logo navbar-brand" href="{{ route('home') }}">{{ __('DashF') }}</a> --}}
                        {{-- </div> --}}
                    {{-- <div class="col d-flex justify-content-end align-items-center"> --}}
                        {{--     <button type="button" class="text-muted bg-transparent border-0" aria-label="search"> --}}
                            {{--         <i class="fa fa-search fa-fw" aria-hidden="true"></i> --}}
                            {{--     </button> --}}
                        {{--     @guest --}}
                            {{--         <a class="text-muted d-none d-sm-block mx-2" href="{{ route('login') }}">{{ __('Sign In') }}</a> --}}
                            {{--         <a class="btn btn-outline-secondary btn-sm" href="{{ route('register') }}">{{ __('Sign Up') }}</a> --}}
                            {{--     @endguest --}}
                            {{--     @auth --}}
                                {{--         <div class="dropdown"> --}}
                                    {{--             <button class="border-0 bg-transparent" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
                                        {{--                 <img class="img-circle img-fluid" src="{{ route('cover.thumb', auth()->user()->cover) }}" alt="{{ auth()->user()->username }}"> --}}
                                        {{--             </button> --}}
                                    {{--  --}}
                                    {{--             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink"> --}}
                                        {{--                 <a class="dropdown-item" href="{{ route('profile', auth()->user()->username) }}">Profile</a> --}}
                                        {{--                 <a class="dropdown-item" href="{{ route('post.create') }}">Write a post</a> --}}
                                        {{--                 <form action="{{ route('logout') }}" method="post"> --}}
                                            {{--                     @csrf --}}
                                            {{--                     <button class="dropdown-item" type="submit">Logout</button> --}}
                                            {{--                 </form> --}}
                                        {{--             </div> --}}
                                    {{--         </div> --}}
                                {{--     @endauth --}}
                                {{-- </div> --}}
                </div>
            </header>

            <main class="bg-light">
                @yield('content')
            </main>
        </div>
    </body>
</html>
