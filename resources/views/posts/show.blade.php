@extends('layouts.app')

@section('content')
    <link rel="preload" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js" as="script">

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
    <link async rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/pojoaque.min.css">

    <style type="text/css" media="screen">
        .hljs { padding: 1rem; }
    </style>

    <div class="container-sm">
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
                                <a href="{{ route('tags.post', $tag->tag_slug) }}">#{{ $tag->tag_name }}</a>
                            @endforeach
                        </div>
                        {!! (new Markdown)->convertToHtml($post['body']) !!}
                    </div>
                </section>
                <section class="comments mt-2">
                    @include('components.comments')
                </section>
            </article>
        </div>
    </div>
    <script>
        // add attribute loading=lazy to img
        window.addEventListener('load', function () {
            document.querySelectorAll('img')
                .forEach(e => e.setAttribute('loading', 'lazy'));
        });

        hljs.initHighlightingOnLoad();
    </script>
@endsection
