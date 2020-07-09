<div class="bg-light">
    <div class="p-4 mb-0 text-light bg-info">
        <h5 class="font-weight-bold m-0">Popular Articles</h5>
    </div>

    <div class="p-3">
        @foreach ($populars as $popular)
            <div class="p-3">
                <a class="text-dark text-truncate" href="{{ route('post.show', $popular['slug']) }}">
                    {{ $popular['title'] }}
                </a>
                <div>
                    <small class="text-muted">
                        <a class="text-dark" href="{{ route('profile', $popular['user']) }}">
                            {{ $popular['user']['name'] }}
                        </a>
                        <span> . </span>
                        <span>{{ $popular['updated_at']->diffForHumans() }}</span>
                    </small>
                </div>
            </div>
        @endforeach
    </div>
</div>
