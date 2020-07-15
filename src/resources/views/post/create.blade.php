@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <div class="container py-4">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
        <div class="col-md-8">
            <form method="post" action="{{ route('post.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
                </div>
                <div class="form-group">
                    <label for="cover">Cover Image Url</label>
                    <input type="text" class="form-control" name="cover" id="cover" placeholder="https://image_url_example.com" value="{{ old('cover') }}">
                </div>
                <div>
                    <textarea id="body" name="body" rows="20">{{ old('body') ?: '# Hello World' }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="published" class="form-check-input" id="published">
                    <label class="form-check-label" for="published">Published</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>

    <script charset="utf-8">
        new SimpleMDE({ element: document.getElementById("body") });
    </script>
@endsection