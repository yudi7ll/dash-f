@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                {!! $postcard !!}
            </div>
            <div class="col-lg-4">
                <section>
                    BIO
                </section>
            </div>
        </div>
    </div>
@endsection
