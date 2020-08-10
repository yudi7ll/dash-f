@extends('layouts.app')

@section('content')
    <link rel="preload" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js" as="script">

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
    <link async rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/pojoaque.min.css">
    <script defer src="{{ asset('js/post-show.js') }}"></script>

    <style type="text/css" media="screen">
        .hljs { padding: 1rem; }
    </style>

    <div class="row">
        <article class="col col-lg-8 py-3">
            <section>
                @if (!$post['published'])
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ __('Unpublished Post. ') }}</strong>
                        <span>{{ __('Only you can see & edit this post') }}</span>
                    </div>
                @endif
                <h1 class="font-weight-bold"> {{ $post['title'] }} </h1>
                <h4>{{ $post['description'] }}</h4>
                <div class="mb-2">
                    <a class="text-decoration-none" href="{{ route('user', $post->user->username) }}">
                        <img class="mr-2 img-circle" src="{{ route('cover.thumb', $post->user->cover) }}" alt="{{ $post->user->name }}" />
                    </a>
                    <a class="text-dark font-weight-bold" href="{{ route('user', $post['user']['username']) }}">{{ $post['user']['name'] }}</a>
                    <span> . </span>
                    <small>{{ $post['created_at']->diffForHumans() }}</small>
                    @can('update', $post)
                        <a class="ml-2" href="{{ route('posts.edit', $post['slug']) }}">{{ __('Edit') }}</a>
                    @endcan

                </div>

                <img class="w-100 d-block article-cover" src="{{ $post['cover'] }}" alt="{{ $post['title'] }}" />

                <div class="my-3 article-content">
                    <div class="tags mb-3">
                        @foreach ($post->tagged as $tag)
                            <a href="{{ route('tags.posts', $tag->tag_slug) }}">#{{ $tag->tag_slug }}</a>
                        @endforeach
                    </div>
                    {!! (new Markdown)->convertToHtml($post['body']) !!}

                    <hr>
                    <div id="likes">
                        <form id="like-form" action="{{ route('like.posts', $post->slug) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="isLiked" value="{{ $post->likes()->where('user_id', auth()->id())->exists() }}">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <button id="likeBtn" class="btn btn-lg shadow-none" type="submit" @guest disabled title="Please Login" @endguest>
                                <span id="liked" style="display: none">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                    </svg>
                                </span>
                                <span id="notLiked" class="">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </span>
                                <span id="likes-total">{{ $post->likes->count() }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            <section class="comments mt-2">
                @include('components.comments')
            </section>
        </article>
    </div>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection
