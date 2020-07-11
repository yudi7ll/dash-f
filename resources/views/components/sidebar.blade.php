<div>
    <div class="p-4 mb-0 text-light bg-info">
        <h5 class="font-weight-bold m-0">Popular Articles</h5>
    </div>

    <section class="list-group list-group-flush">
        @foreach ($populars as $popular)
            <div class="p-3 list-group-item">
                <a class="text-dark text-truncate" href="{{ route('post.show', $popular['slug']) }}" title="{{ $popular['title'] }}">
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
        <a class="btn btn-link btn-sm d-block mt-3" href="/categories/popular">See All</a>
    </section>
</div>
