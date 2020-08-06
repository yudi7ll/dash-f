@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <section class="mb-2 py-2">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 font-weight-bold ">#{{ str_replace(',', ' #', $tags) }}</h5>
                    <button class="bg-transparent border-0 shadow-none p-0 ml-3" type="button">
                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </button>
                </div>
            </section>

            {!! $postcard !!}
        </div>
    </div>

@endsection
