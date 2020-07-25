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
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <a class="logo navbar-brand" href="{{ route('home') }}">{{ __('DashF') }}</a>
                        </div>
                        <div class="col d-flex justify-content-end align-items-center">
                            <button type="button" class="text-muted bg-transparent border-0" aria-label="search">
                                <i class="fa fa-search fa-fw" aria-hidden="true"></i>
                            </button>
                            @guest
                                <a class="text-muted d-none d-sm-block mx-2" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                            @endguest
                            @auth
                                <div class="dropdown">
                                    <button class="border-0 bg-transparent" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (auth()->user()->cover == 'default.jpg')
                                            <i class="fa fa-user-circle fa-fw fa-lg text-muted"></i>
                                        @else
                                            <img class="" src="{{ auth()->user()->cover }}" alt="{{ auth()->user()->name }}">
                                        @endif
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('profile', Auth::user()->username) }}">Profile</a>
                                        <a class="dropdown-item" href="{{ route('post.create') }}">Write a post</a>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <main class="bg-light">
                @yield('content')
            </main>
        </div>
    </body>
</html>
