@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/styles/pojoaque.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/highlight.min.js"></script>

    <style type="text/css" media="screen">
        .hljs {
            padding: 1rem;
        }
    </style>

    <div class="container-sm">
        <div class="row">
            <article class="col col-md-8 py-3">
                <section>
                    @if (!$post['published'])
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ __('Unpublished Post. ') }}</strong>
                            <span>{{ __('Only you can see & edit this post') }}</span>
                        </div>
                    @endif
                    <h1> {{ $post['title'] }} </h1>
                    <h5 class="font-weight-normal">{{ $post['description'] }}</h5>
                    <div class="mb-2">
                        <small>
                            <a class="text-dark font-weight-bold" href="{{ route('profile', $post['user']['id']) }}">{{ $post['user']['name'] }}</a>
                        </small>
                        <small>{{ $post['created_at']->diffForHumans() }}</small>
                        @can('update', $post)
                            <a class="ml-2" href="{{ route('post.edit', $post['slug']) }}">{{ __('Edit') }}</a>
                        @endcan
                    </div>

                    <img class="w-100 d-block" src="{{ $post['cover'] }}" alt="{{ $post['title'] }}" />

                    <div class="my-3">
                        {!! (new Markdown)->convertToHtml($post['body']) !!}
                    </div>
                </section>
                <section class="comments mt-2">
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
                        <ul id="comment-list" class="list-group list-group-flush">
                            @foreach ($post['comment']->reverse() as $comment)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>
                                        <strong>{{ $comment['user']['name'] }}</strong>, {{ $comment['content'] }}
                                        <small class="text-secondary"> ( {{ $comment['created_at']->diffForHumans() }} ) </small>
                                    </span>
                                    <span>
                                        @can('update', $comment)
                                            <button type="button" class="btn btn-secondary btn-sm">{{ __('Edit') }}</button>
                                        @endcan
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </article>
        </div>
    </div>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection
