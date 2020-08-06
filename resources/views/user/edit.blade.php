@extends('layouts.app')

@section('content')
    <link defer rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
    <script defer src="{{ asset('js/user-edit.js') }}"></script>

    <div class="row">
        <section class="col-md-4 d-md-none mb-3 pb-0">
            <div class="input-group mb-3">
                <form class="w-100" id="pageForm" action="{{ route('user.edit', auth()->user()->username) }}" method="get">
                    <select class="custom-select shadow-none" id="navigationLink" name="page">
                        <option value="profile">Profile</option>
                        <option value="account">Account</option>
                        <option value="security">Security</option>
                    </select>
                </form>
            </div>
        </section>
        <div class="col-md-4 d-none d-md-block">
            <form id="navigation" class="list-group" action="{{ route('logout') }}" method="post">
                @csrf

                <a id="profile" class="list-group-item list-group-item-action" href="{{ route('user.edit', auth()->user()->username) . '?page=profile' }}">Profile</a>
                <a id="account" class="list-group-item list-group-item-action" href="{{ route('user.edit', auth()->user()->username ) . '?page=account' }}">Account</a>
                <a id="security" class="list-group-item list-group-item-action" href="{{ route('user.edit', auth()->user()->username) . '?page=security' }}">Security</a>

                <button class="list-group-item list-group-item-action text-danger" type="submit">Logout</button>
            </form>
        </div>
        <section class="col-md-8">
            <div class="mt-3">
                {!! $form !!}
            </div>
        </section>
    </div>
@endsection
