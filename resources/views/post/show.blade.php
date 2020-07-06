@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post['title'] }}</h1>
        <h4>{{ $post['description'] }}</h4>

        <img class="w-100 d-block" src="{{ $post['cover'] }}" alt="{{ $post['title'] }}" />

        <div class="mt-3">
            {{ $post['body'] }}
        </div>
    </div>
@endsection
