@extends('layout.app')

@section('main')
    <ul>
        @foreach ($posts['data'] as $post)
            <li>{{ $post['content'] }}</li>
        @endforeach
    </ul>
@endsection
