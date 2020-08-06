@extends('layouts.app')

@section('content')
    <link rel="preload" href="{{ asset('css/post-form.css') }}" as="style">
    <link rel="preload" href="{{ asset('js/post-form.js') }}" as="script">

    <link rel="stylesheet" href="{{ asset('css/post-form.css') }}">
    <script defer src="{{ asset('js/post-form.js') }}"></script>

    <div class="row">
        <div class="col-md-8">
            <form class="bg-white p-4 border" method="post" action="{{ route('posts.update', $post['slug']) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $post['title'] }}">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $post['description'] }}">

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="tags-input">Tags</label>
                    <input class="@error('tags') is-invalid @enderror" type="text" name="tags" id="tags-input" value="{{ implode(',', $post->tagNames()) }}">

                    @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="cover">Cover Image Url</label>
                    <input type="text" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover" placeholder="https://image_url_example.com" value="{{ $post['cover'] }}">

                    @error('cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

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
    <script>
        function deletePost() {
            confirm('Are you sure?') && document.getElementById('destroy-form').submit();
        }
    </script>
@endsection
