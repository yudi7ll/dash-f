<div class="mt-4">
    <div class="p-4 mb-0 text-light bg-info">
        <h5 class="font-weight-bold m-0">Top Tags</h5>
    </div>

    <section class="list-group list-group-flush pt-2">
        @isset($tags)
            @foreach ($tags as $tag)
                <div class="px-3 py-2 list-group-item">
                    <a class="text-dark d-flex text-break justify-content-between align-items-center" href="{{ route('tags.post', $tag->slug) }}" title="{{ $tag->name }}">
                        <span>{{ $tag->name }}</span> <span>({{ $tag->count }} posts)</span>
                    </a>
                </div>
            @endforeach
        @endisset
        <a class="mt-3 text-center" href="{{ route('tags') }}">See All</a>
    </section>
</div>
