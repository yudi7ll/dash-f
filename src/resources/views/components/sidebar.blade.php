<div>
    <div class="p-4 mb-0 text-light bg-info">
        <h5 class="font-weight-bold m-0">Popular Articles</h5>
    </div>

    <section class="list-group list-group-flush pt-2">
        @isset($populars)
            @foreach ($populars as $popular)
                <div class="px-3 py-2 list-group-item">
                    <a class="text-dark d-inline-block text-break" href="{{ route('post.show', $popular['slug']) }}" title="{{ $popular['title'] }}">
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
        @endisset
        <a class="mt-3 text-center" href="/topic/popular">See All</a>
    </section>
</div>
