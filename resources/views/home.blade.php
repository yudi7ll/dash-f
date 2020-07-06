@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <ul>
            @foreach ($posts['data'] as $post)
                <li>
                    <a href="{{ route('post.show', $post['slug']) }}">{{ $post['title'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
