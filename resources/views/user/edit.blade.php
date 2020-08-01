@extends('layouts.app')

@section('content')
    <link defer rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
    <script defer src="{{ asset('js/user-edit.js') }}"></script>

    <div class="container py-4">
        <div class="row">
            <section class="col-md-4 d-md-none mb-3 pb-0">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="navigationLink">Settings for</label>
                    </div>
                    <select class="custom-select shadow-none" id="navigationLink">
                        <option id="option-profile" value="{{ route('user.edit', [auth()->user()->username, 'profile']) }}">Profile</option>
                        <option id="option-account" value="{{ route('user.edit', [auth()->user()->username, 'account']) }}">Account</option>
                        <option id="option-security" value="{{ route('user.edit', [auth()->user()->username, 'security']) }}">Security</option>
                    </select>
                </div>
            </section>
            <div class="col-md-4 d-none d-md-block">
                <form id="navigation" class="list-group" action="{{ route('logout') }}" method="post">
                    @csrf

                    <a id="profile" class="list-group-item list-group-item-action" href="{{ route('user.edit', [auth()->user()->username, 'profile']) }}">Profile</a>
                    <a id="account" class="list-group-item list-group-item-action" href="{{ route('user.edit', [auth()->user()->username, 'account']) }}">Account</a>
                    <a id="security" class="list-group-item list-group-item-action" href="{{ route('user.edit', [auth()->user()->username, 'security']) }}">Security</a>

                    <button class="list-group-item list-group-item-action text-danger" type="submit">Logout</button>
                </form>
            </div>
            <section class="col-md-8">
                <div class="mt-3">
                    {!! $form !!}
                </div>
            </section>
        </div>
    </div>
@endsection
