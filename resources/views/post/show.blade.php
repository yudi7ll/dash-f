@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1>{{ $post['title'] }}</h1>
            @can('update', $post)
                <div>
                    <a class="btn btn-secondary" href="{{ route('post.edit', $post['slug']) }}">Edit</a>
                </div>
            @endcan
        </div>
        <h4>{{ $post['description'] }}</h4>
        <small>{{ $post['created_at']->diffForHumans() }}</small>

        <img class="w-100 d-block" src="{{ $post['cover'] }}" alt="{{ $post['title'] }}" />

        <div class="my-3">
            {{ $post['body'] }}
            <hr>
        </div>
        <div class="comments mt-4">
            <h5>Comments</h5>
            <form method="post" action="{{ route('comment.store') }}">
                @csrf
                <div class="form-group">
                    <input type="hidden" value="{{ $post['id'] }}" name="post_id" id="post_id" />
                    <textarea class="form-control" name="content" rows="5" placeholder="Write a comment...">{{ old('content') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary d-block ml-auto">Send</button>
            </form>
            <div class="mt-3">
                <ul class="list-group">
                    @foreach ($post['comment']->reverse() as $comment)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>
                                <strong>{{ $comment['user']['name'] }}</strong>, {{ $comment['content'] }}
                                <small class="text-secondary"> ( {{ $comment['created_at']->diffForHumans() }} ) </small>
                            </span>
                            <span>
                                @can('update', $comment)
                                    <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                @endcan
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
