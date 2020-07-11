@foreach ($posts['data'] as $post)
    <div class="card mb-2">
        <div class="row no-gutters">
            <div class="col-md-4 my-auto">
                <a href="{{ route('post.show', $post['slug']) }}">
                    <img src="{{ $post['cover'] }}" class="card-img img-fluid" alt="{{ $post['slug'] }}">
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-dark text-truncate" href="{{ route('post.show', $post['slug']) }}" title="{{ $post['title'] }}">{{ $post['title'] }}</a>
                    </h5>
                    <p class="card-text text-truncate" title="{{ $post['description'] }}">{{ $post['description'] }}</p>
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
    </div>
@endforeach
