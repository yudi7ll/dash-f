<div>
    <div class="p-4 mb-0 text-light bg-info">
        <h5 class="font-weight-bold m-0">Popular Articles</h5>
    </div>

    <section class="list-group list-group-flush pt-2">
        @forelse ($populars as $popular)
            <div class="px-3 py-2 list-group-item">
                <a class="text-dark d-inline-block text-break" href="{{ route('posts.show', $popular['slug']) }}" title="{{ $popular['title'] }}">
                    {{ $popular['title'] }}
                </a>
                <div>
                    <small class="text-muted">
                        <a class="text-dark" href="{{ route('user', $popular['user']) }}">
                            {{ $popular['user']['name'] }}
                        </a>
                        <span> . </span>
                        <span>{{ $popular['updated_at']->diffForHumans() }}</span>
                    </small>
                </div>
            </div>
        @empty
            <div class="mx-auto text-danger" role="status">
                Something went wrong! :(
            </div>
        @endforelse
    </section>
</div>
