@extends('layouts.app')

@section('content')
    <link defer rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
    {{-- <script defer src="{{ asset('js/user-edit.js') }}"></script> --}}

    <div class="container py-4">
        <div class="row">
            <div id="navigation" class="col-lg-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="text-dark d-block" href="{{ route('user.edit', [auth()->user()->username, 'profile']) }}">Profile</a>
                    </li>
                    <li class="list-group-item">
                        <a class="text-dark d-block" href="{{ route('user.edit', [auth()->user()->username, 'account']) }}">Account</a>
                    </li>
                    <li class="list-group-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-link text-danger p-0 shadow-none d-block" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            <section class="col-lg-8">
                {!! $form !!}
            </section>
        </div>
    </div>
@endsection
