@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
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
