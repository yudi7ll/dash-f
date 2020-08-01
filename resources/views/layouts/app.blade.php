<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DashF') }}</title>

        <!-- Fonts -->
        <link defer href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link defer href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link defer href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div id="app">
            <header class="border-bottom shadow-sm">
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
                                        <input class="form-control form-control-sm mr-1 w-100 shadow-none" type="search" placeholder="Search ...">
                                        <button class="btn btn-sm btn-outline-secondary text-dark" type="submit" aria-label="search">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                              <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </li>
                                @guest
                                    <li class="nav-item d-flex justify-content-center align-items-center mt-2 mt-md-0">
                                        <a class="btn text-secondary shadow-none" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                        <a class="btn btn-outline-secondary" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                    </li>
                                @endguest
                                @auth
                                    <li class="nav-item d-md-none">
                                        <a class="nav-link with-svg" href="{{ route('user', auth()->user()->username) }}">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            </svg>
                                            {{ __('Profile') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="with-svg nav-link font-weight-bold" href="{{ route('posts.create') }}">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            {{ __('Write a post') }}
                                        </a>
                                    </li>
                                    <li class="nav-item d-md-none">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="with-svg btn btn-link nav-link shadow-none" type="submit">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-bar-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L3.207 8l2.647-2.646a.5.5 0 0 0 0-.708z"/>
                                                    <path fill-rule="evenodd" d="M10 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h6.5A.5.5 0 0 0 10 8zm2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z"/>
                                                </svg>
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
                                                <a class="dropdown-item with-svg" href="{{ route('user', auth()->user()->username) }}">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                    </svg>
                                                    {{ __('Profile') }}
                                                </a>
                                                <a class="dropdown-item with-svg" href="{{ route('posts.create') }}">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                    {{ __('Write a post') }}
                                                </a>
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button class="with-svg dropdown-item shadow-none" type="submit">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-bar-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L3.207 8l2.647-2.646a.5.5 0 0 0 0-.708z"/>
                                                            <path fill-rule="evenodd" d="M10 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h6.5A.5.5 0 0 0 10 8zm2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z"/>
                                                        </svg>
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
                </div>
            </header>

            <main class="bg-light">
                @yield('content')
            </main>
        </div>
    </body>
</html>
