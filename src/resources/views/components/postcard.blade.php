@isset($posts)
@foreach ($posts['data'] as $key => $post)
    <div class="card mb-1">
        @if ($posts['current_page'] === 1 && $key === 0)
            @if ($post['cover'])
                <a href="{{ route('post.show', $post['slug']) }}" class="post-cover-large d-block bg-cover bg-center bg-norepeat" style="background-image: url('{{ $post['cover'] }}');"></a>
            @endif
            <div class="card-body">
                <h5 class="card-title">
                    <h4 title="{{ $post['title'] }}">
                        <a class="text-dark" href="{{ route('post.show', $post['slug']) }}">{{ $post['title'] }}</a>
                    </h4>
                </h5>
                <p class="card-text" title="{{ $post['description'] }}">{{ $post['description'] }}</p>
                <p class="card-text">
                <small>
                    <a class="text-dark" href="{{ route('profile', $post['user']['id']) }}">{{ $post['user']['name'] }}</a>
                </small>
                <span> . </span>
                <small class="text-muted">{{ \Carbon\Carbon::parse($post['updated_at'])->diffForHumans() }}</small>
                </p>
            </div>
        @else
            <div class="row no-gutters flex-md-row-reverse">
                <div class="col-md-4 p-0 p-md-3 rounded">
                    <a
                        href="{{ route('post.show', $post['slug']) }}"
                        class="post-cover d-block bg-cover bg-center bg-norepeat"
                        style="background-image: url('{{ $post['cover'] }}');"
                    ></a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-dark" href="{{ route('post.show', $post['slug']) }}" title="{{ $post['title'] }}">{{ $post['title'] }}</a>
                        </h5>
                        <p class="card-text" title="{{ $post['description'] }}">{{ $post['description'] }}</p>
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
@endisset
