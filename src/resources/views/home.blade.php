@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <div class="overflow-auto bg-white">
        <div class="container sticky-top">
            <div class="d-flex justify-content-between align-items-center">
                <div class="overflow-hidden">
                    <ul class="nav d-flex flex-nowrap py-2 overflow-hidden">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="row justify-content-between">
            <div class="col-lg-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div id="postcard">
                    @include('components.postcard')
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
                @include('components.sidebar')
            </div>
        </div>
    </div>
    <script charset="utf-8">
        $(window).ready(function () {
            let page = 1;
            let isLoading = false;
            const SITEURL = "{{ url('/') }}" + "?page=";
            const loading = $('#loading');
            const noData = $('#no-data');

            load_more();

            $(window).scroll(() => {
                if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    load_more();
                }
            });

            function load_more() {
                noData.hide();
                loading.show();

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
                                noData.show();
                                return;
                            }

                            $('#postcard').append(res);
                            page++;
                        })
                        .finally(() => {
                            loading.hide();
                            isLoading = false;
                        });
                }
            }
        });
    </script>
@endsection
