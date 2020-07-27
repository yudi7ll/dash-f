@isset($posts)
@foreach ($posts->items() as $key => $post)
    <div class="card mb-1">
        @if ($posts->currentPage() === 1 && $key === 0)
            <a href="{{ route('post.show', $post['slug']) }}">
                <img loading="lazy" class="post-cover w-100" src="{{ $post['cover'] }}" alt="{{ $post['slug'] }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">
                    <h4 title="{{ $post['title'] }}">
                        <a class="text-dark" href="{{ route('post.show', $post['slug']) }}">{{ $post['title'] }}</a>
                    </h4>
                </h5>
                <p class="card-text" title="{{ $post['description'] }}">{{ $post['description'] }}</p>
                <small class="card-text">
                    @foreach ($post->tagged as $tag)
                        <a href="{{ route('tags.post', $tag->tag_slug) }}">#{{ $tag->tag_name }}</a>
                    @endforeach
                </small>
                <p class="card-text">
                <small>
                    <a class="text-dark" href="{{ route('profile', $post['user']['username']) }}">{{ $post['user']['name'] }}</a>
                </small>
                <span> . </span>
                <small class="text-muted">{{ \Carbon\Carbon::parse($post['updated_at'])->diffForHumans() }}</small>
                </p>
            </div>
        @else
            <div class="row no-gutters flex-md-row-reverse">
                <div class="col-md-4 p-0 p-md-3">
                    <a href="{{ route('post.show', $post['slug']) }}" >
                        <img loading="lazy" class="post-cover img-fluid" src="{{ $post['cover'] }}" alt="{{ $post['slug'] }}">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-dark" href="{{ route('post.show', $post['slug']) }}" title="{{ $post['title'] }}">{{ $post['title'] }}</a>
                        </h5>
                        <p class="card-text" title="{{ $post['description'] }}">{{ $post['description'] }}</p>
                        <small class="card-text">
                            @foreach ($post->tagged as $tag)
                                <a href="{{ route('tags.post', $tag->tag_slug) }}">#{{ $tag->tag_name }}</a>
                            @endforeach
                        </small>
                        <p class="card-text">
                            <small>
                                <a class="text-dark" href="{{ route('profile', $post['user']['username']) }}">{{ $post['user']['name'] }}</a>
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
@endisset
