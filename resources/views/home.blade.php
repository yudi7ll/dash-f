@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card mb-3 border-0">
                    <a href="{{ route('post.show', $posts['data'][0]['slug']) }}">
                        <img src="{{ $posts['data'][0]['cover'] }}" class="card-img-top" alt="{{ $posts['data'][0]['slug'] }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <h4>
                                <a class="text-dark" href="{{ route('post.show', $posts['data'][0]['slug']) }}">{{ $posts['data'][0]['title'] }}</a>
                            </h4>
                        </h5>
                        <p class="card-text">{{ $posts['data'][0]['description'] }}</p>
                        <p class="card-text">
                        <small>
                            <a class="text-dark" href="{{ route('profile', $posts['data'][0]['user']['id']) }}">{{ $posts['data'][0]['user']['name'] }}</a>
                        </small>
                        <span> . </span>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($posts['data'][0]['updated_at'])->diffForHumans() }}</small>
                        </p>
                    </div>
                </div>
                <div id="postcard">
                    @include('components.postcard')
                </div>
                <center id="loading" class="my-4">
                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm text-danger" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </center>
            </div>
            <div class="col-md-4">
                @include('components.sidebar')
            </div>
        </div>
    </div>
    <script>
window.addEventListener('load', function() {
    const SITEURL = "{{ $posts['next_page_url'] }}";
    const loading = $('#loading');

    loading.hide();

    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            load_more(); //load content
        }
    });

    function load_more(){
        loading.show();

        const config = {
            headers: {
                'Content-Type': 'text/html',
                'Datatype': 'html',
                'X-Requested-With': 'XMLHttpRequest'
            }
        }

        fetch(SITEURL, config)
            .then(res => res.text())
            .then(res => {
                console.log(res);
                $('#postcard').append(res)
            })
            .catch(err => console.error(err))
            .finally(() => loading.hide());
    }
});
    </script>
@endsection
