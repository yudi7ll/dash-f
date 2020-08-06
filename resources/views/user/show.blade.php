@extends('layouts.app')

@section('content')
    <script>
        window.API_URL = "/api/posts/{{ $user->username }}?page=";
    </script>
    <script defer src="{{ asset('js/infinite-scroll.js') }}"></script>

    <div class="row mb-4">
        <div class="col">
            <section>
                {!! $bio !!}
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            @include('components.sort_posts')
            <div id="postcard"></div>
            <center class="my-4">
                <div id="loading" style="display: none;">
                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm text-danger" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="my-4" id="no-data" style="display: none;">
                    No more data.
                </div>
            </center>
        </div>
        <div class="col-lg-4">
        </div>
    </div>
@endsection
