@extends('layouts.app')

@section('content')
    <script defer src="{{ asset('js/infinite-scroll.js') }}"></script>

    <div class="container py-4">
        <div class="row justify-content-between">
            <div class="col-lg-8">
                @include('components.sort_posts')

                <div id="postcard">
                    {!! $postcard !!}
                </div>

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
            <div class="col-lg-4 d-none d-lg-block">
                <div id="sidebar">
                    {!! $popular_post !!}
                </div>
                <div id="tagscard">
                    {!! $tags !!}
                </div>
            </div>
        </div>
    </div>
@endsection
