@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1>{{ $post['title'] }}</h1>
            @if ($post['user_id'] === Auth::user()->id)
                <div>
                    <a class="btn btn-secondary" href="{{ route('post.edit', $post['slug']) }}">Edit</a>
                </div>
            @endif
        </div>
        <h4>{{ $post['description'] }}</h4>

        <img class="w-100 d-block" src="{{ $post['cover'] }}" alt="{{ $post['title'] }}" />

        <div class="mt-3">
            {{ $post['body'] }}
        </div>
    </div>
@endsection
