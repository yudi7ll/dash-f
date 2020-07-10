@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
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
                        <img src="{{ $posts['data'][0]['cover'] }}" class="card-img-top img-fluid" alt="{{ $posts['data'][0]['title'] }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <h4 title="{{ $posts['data'][0]['title'] }}">
                                <a class="text-dark" href="{{ route('post.show', $posts['data'][0]['slug']) }}">{{ $posts['data'][0]['title'] }}</a>
                            </h4>
                        </h5>
                        <p class="card-text" title="{{ $posts['data'][0]['description'] }}">{{ $posts['data'][0]['description'] }}</p>
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
                <center id="loading" class="my-4" style="display: none;">
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
                <center id="no-data" class="my-4" style="display: none;">
                    <span>No more data.</span>
                </center>
            </div>
            <div class="col-md-4 d-none d-md-block">
                @include('components.sidebar')
            </div>
        </div>
    </div>
    <script charset="utf-8">
        let page = 2;
        let isLoading = false;
        const SITEURL = "{{ url('/') }}" + "?page=";
        const loading = $('#loading');
        const noData = $('#no-data');

        $(window).scroll(() => {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                load_more();
            }
        });

        function load_more() {
            loading.show();
            noData.hide();

            const config = {
                headers: {
                    'Content-Type': 'text/html',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }

            if (!isLoading) {
                isLoading = true;

                fetch(SITEURL + page, config)
                    .then(res => res.text())
                    .then(res => {
                        if (!res) {
                            return noData.show();
                        }

                        $('#postcard').append(res);
                        page++;
                    })
                    .catch(noData.show)
                    .finally(() => {
                        loading.hide();
                        isLoading = false;
                    });
            }
        }
    </script>
@endsection
