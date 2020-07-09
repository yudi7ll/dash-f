@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div>
                    @foreach ($posts['data'] as $key => $post)
                        <div class="card mb-3 border-0">
                            @if ($key === 0)
                                <a href="{{ route('post.show', $post['slug']) }}">
                                    <img src="{{ $post['cover'] }}" class="card-img-top" alt="{{ $post['slug'] }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <h4>
                                            <a class="text-dark" href="{{ route('post.show', $post['slug']) }}">{{ $post['title'] }}</a>
                                        </h4>
                                    </h5>
                                    <p class="card-text">{{ $post['description'] }}</p>
                                    <p class="card-text">
                                    <small>
                                        <a class="text-dark" href="{{ route('profile', $post['user']['id']) }}">{{ $post['user']['name'] }}</a>
                                    </small>
                                    <span> . </span>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($post['updated_at'])->diffForHumans() }}</small>
                                    </p>
                                </div>
                            @else
                                <div class="row no-gutters">
                                    <div class="col-md-4 my-auto">
                                        <a href="{{ route('post.show', $post['slug']) }}">
                                            <img src="{{ $post['cover'] }}" class="card-img img-fluid" alt="{{ $post['slug'] }}">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a class="text-dark" href="{{ route('post.show', $post['slug']) }}">{{ $post['title'] }}</a>
                                            </h5>
                                            <p class="card-text text-truncate">{{ $post['description'] }}</p>
                                            <p class="card-text">
                                            <small>
                                                <a class="text-dark" href="{{ route('profile', $post['user']['id']) }}">{{ $post['user']['name'] }}</a>
                                            </small>
                                            <span> . </span>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($post['updated_at'])->diffForHumans() }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <a href="{{ $posts['first_page_url'] }}">First</a>
                <a href="{{ $posts['prev_page_url'] }}">Prev</a>
                <a href="{{ $posts['next_page_url'] }}">Next</a>
                <a href="{{ $posts['last_page_url'] }}">Last</a>
            </div>
            <div class="col-md-4">
                @include('components.sidebar')
            </div>
        </div>
    </div>
@endsection
