@extends('layouts.app')

@section('content')
    <link rel="preload" href="{{ asset('css/create-form.css') }}" as="style">
    <link rel="preload" href="{{ asset('js/create-form.js') }}" as="script">

    <link rel="stylesheet" href="{{ asset('css/create-form.css') }}">
    <script defer src="{{ asset('js/create-form.js') }}"></script>

    <div class="container py-4">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
        <div class="row">
            <div class="col-md-8">
                <form class="bg-white p-4 border" method="post" action="{{ route('posts.update', $post['slug']) }}">
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
                        <label for="tags-input">Tags</label>
                        <input type="text" name="tags" id="tags-input" value="{{ implode(',', $post->tagNames()) }}">
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover Image Url</label>
                        <input type="text" class="form-control" name="cover" id="cover" placeholder="https://image_url_example.com" value="{{ $post['cover'] }}">
                    </div>
                    <div>
                        <label for="body">Article Body</label>
                        <textarea id="body" name="body" rows="20">{{ $post['body'] }}</textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="published" class="form-check-input" id="published" {{ ($post['published']) ? "checked" : "" }}>
                        <label class="form-check-label" for="published">Published</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-warning mx-2" onclick="confirm('All changed will be lost. continue?') && document.location.reload()">Reset</button>
                    <button id="delete-btn" type="button" class="btn btn-danger" onclick="deletePost()">Delete Post</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
        </div>

        <form id="destroy-form" action="{{ route('posts.destroy', $post['slug']) }}" method="POST">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <script>
        function deletePost() {
            confirm('Are you sure?') && document.getElementById('destroy-form').submit();
        }
    </script>
@endsection
