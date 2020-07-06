@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <div class="container">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
        <form method="post" action="{{ route('post.update', $post['slug']) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $post['title'] }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $post['description'] }}">
            </div>
            <div class="form-group">
                <label for="cover">Cover Image Url</label>
                <input type="text" class="form-control" name="cover" id="cover" placeholder="https://image_url_example.com" value="{{ $post['cover'] }}">
            </div>
            <div>
                <label for="body">Article Body</label>
                <textarea id="body" name="body" rows="20">{{ $post['body'] }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script charset="utf-8">
        new SimpleMDE({ element: document.getElementById("body") });
    </script>
@endsection
