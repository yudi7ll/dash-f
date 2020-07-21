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
@endsection
