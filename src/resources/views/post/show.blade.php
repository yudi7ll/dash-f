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
                    <h2> {{ $post['title'] }} </h2>
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
                        <div class="tags mb-3">
                            @foreach ($post->tagged as $tag)
                                <a href="{{ route('tags.post', $tag->tag_slug) }}">#{{ $tag->tag_name }}</a>
                            @endforeach
                        </div>
                        {!! (new Markdown)->convertToHtml($post['body']) !!}
                    </div>
                </section>
                <section class="comments mt-2">
                    <h5>Comments</h5>
                    <form method="post" action="{{ route('comment.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" value="{{ $post['id'] }}" name="post_id" id="post_id" />
                            <textarea class="form-control" name="content" rows="5" placeholder="Write a comment..."  @guest disabled @endguest>{{ old('content') }}</textarea>
                        </div>
                        @guest
                            <small style="float: left">Please <a href="{{ route('login') }}">Login</a> before comment</small>
                        @endguest
                        <button type="submit" class="btn btn-primary d-block ml-auto" @guest disabled @endguest>Send</button>
                    </form>
                    <div class="mt-3">
                        @foreach ($post['comment']->reverse() as $comment)
                            <div class="media py-3 border-bottom">
                                <a href="{{ route('profile', $comment->user->id) }}">
                                    <img src="{{ $comment->user->cover }}" class="mr-3" alt="{{ $comment->user->name }}" />
                                </a>
                                <div class="media-body">
                                    <h6 class="mt-0">
                                        <a class="text-dark" href="{{ route('profile', $comment->user->id) }}">{{ $comment->user->username }}</a>
                                    </h6>
                                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                                    @if ($comment->created_at != $comment->updated_at)
                                        <small>( Edited )</small>
                                    @endif
                                    <div>{{ $comment->content }}</div>
                                </div>

                                @can('update', $comment)
                                    <div class="btn-group">
                                        <button type="button" class="bg-transparent border-0 edit-comment-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item text-danger" type="button" onclick="deleteComment()"><i class="fa fa-trash"></i> Remove</button>
                                            <button class="dropdown-item" type="button"><i class="fa fa-pencil"></i> Edit</button>
                                            <button class="dropdown-item" type="button"><i class="fa fa-flag"></i> Report Abuse</button>
                                        </div>
                                    </div>

                                    <form id="delete-comment-form" action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <script>
                                        function deleteComment() {
                                            confirm('Your comment will be deleted permanently!\nContinue?')
                                                && document.getElementById('delete-comment-form').submit();
                                        }
                                    </script>
                                @endcan
                            </div>
                            </span>
                        @endforeach
                    </div>
                </section>
            </article>
        </div>
    </div>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection
