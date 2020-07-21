@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div id="postcard" class="col-lg-8 offset-lg-2">
                @yield('postcard')
            </div>
        </div>
    </div>
@endsection
