@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="text-dark d-block" href="#">Profile</a>
                </li>
                <li class="list-group-item">
                    <a class="text-dark d-block" href="#">Account</a>
                </li>
                <li class="list-group-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-link text-dark p-0 shadow-none d-block" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
@endsection
