@extends('layouts.app')

@section('content')
    <link defer rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
    <script defer src="{{ asset('js/user-edit.js') }}"></script>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4">
                <form id="navigation" class="list-group" action="{{ route('logout') }}" method="post">
                    @csrf

                    <a id="profile" class="list-group-item list-group-item-action" href="{{ route('user.edit', [auth()->user()->username, 'profile']) }}">Profile</a>
                    <a id="account" class="list-group-item list-group-item-action" href="{{ route('user.edit', [auth()->user()->username, 'account']) }}">Account</a>

                    <button class="list-group-item list-group-item-action text-danger" type="submit">Logout</button>
                </form>
            </div>
            <section class="col-lg-8">
                <div class="mt-3">
                    {!! $form !!}
                </div>
            </section>
        </div>
    </div>
@endsection
