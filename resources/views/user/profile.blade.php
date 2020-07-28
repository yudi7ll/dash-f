@extends('layouts.app')

@section('content')
    <script defer src="{{ asset('js/infinite-scroll.js') }}"></script>

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <section>
                    {!! $bio !!}
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                {!! $postcard !!}
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </div>
@endsection
