@foreach ($posts->items() as $key => $post)
    <div class="card mb-1">
        @if ($posts->currentPage() === 1 && $key === 0)
            <a class="post-cover post-cover-lg" href="{{ route('posts.show', $post['slug']) }}" style="background-image: url('{{ $post['cover'] }}');"></a>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="text-dark font-weight-bold" href="{{ route('posts.show', $post['slug']) }}">{{ $post['title'] }}</a>
                </h5>
                <p class="card-text" title="{{ $post['description'] }}">{{ $post['description'] }}</p>
                <p class="card-text">
                    <small>
                        @foreach ($post->tagged as $tag)
                            <a href="{{ route('tags.posts', $tag->tag_slug) }}">#{{ $tag->tag_slug }}</a>
                        @endforeach
                    </small>
                </p>
                <p class="card-text">
                    <a href="{{ route('user', $post->user->username) }}">
                        <img class="mr-2 img-circle" src="{{ route('cover.thumb', $post->user->cover) }}" alt="{{ $post->user->name }}" />
                    </a>
                    <a class="text-dark" href="{{ route('user', $post['user']['username']) }}">{{ $post['user']['name'] }}</a>
                    <span> . </span>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($post['updated_at'])->diffForHumans() }}</small>
                </p>
            </div>
        @else
            <div class="row no-gutters flex-md-row-reverse">
                <div class="col-md-4 p-0 p-md-3">
                    <a class="post-cover" href="{{ route('posts.show', $post['slug']) }}" style="background-image: url('{{ $post['cover'] }}')"></a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-dark font-weight-bold" href="{{ route('posts.show', $post['slug']) }}" title="{{ $post['title'] }}">{{ $post['title'] }}</a>
                        </h5>
                        <p class="card-text" title="{{ $post['description'] }}">{{ $post['description'] }}</p>
                        <p class="card-text">
                            <small>
                                @foreach ($post->tagged as $tag)
                                    <a href="{{ route('tags.posts', $tag->tag_slug) }}">#{{ $tag->tag_slug }}</a>
                                @endforeach
                            </small>
                        </p>
                        <p class="card-text">
                            <a href="{{ route('user', $post->user->username) }}">
                                <img class="mr-2 img-circle" src="{{ route('cover.thumb', $post->user->cover) }}" alt="{{ $post->user->name }}" />
                            </a>
                            <a class="text-dark" href="{{ route('user', $post['user']['username']) }}">{{ $post['user']['name'] }}</a>
                            <span> . </span>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($post['updated_at'])->diffForHumans() }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endforeach
