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
        <a href="{{ $posts['first_page_url'] }}">First</a>
        <a href="{{ $posts['prev_page_url'] }}">Prev</a>
        <a href="{{ $posts['next_page_url'] }}">Next</a>
        <a href="{{ $posts['last_page_url'] }}">Last</a>
    </div>
@endsection
