@extends('layouts.app')

@section('content')
    <link rel="preload" href="{{ asset('css/post-form.css') }}" as="style">
    <link rel="preload" href="{{ asset('js/post-form.js') }}" as="script">

    <link rel="stylesheet" href="{{ asset('css/post-form.css') }}">
    <script defer src="{{ asset('js/post-form.js') }}"></script>

    <div class="row">
        <div class="col-md-8">
            <form class="bg-white p-4 border" method="post" action="{{ route('posts.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}">

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="cover">Tags</label>
                    <input class="@error('tags') is-invalid @enderror" type="text" name="tags" id="tags-input" value="{{ old('tags') }}">

                    @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="cover">Cover Image Url</label>
                    <input type="text" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover" placeholder="https://image_url_example.com" value="{{ old('cover') }}">

                    @error('cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div>
                    @error ('body')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
                <textarea id="body" name="body" rows="20" required>{{ old('body') ?: '# Hello World' }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="published" class="form-check-input" id="published">
                    <label class="form-check-label" for="published">Published</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-4">
            <div class="bg-white p-4 rounded border">
                <h4>Editor Basics</h4>
                <small>Commonly used syntax</small>
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>
                                # Header <br />
                                ... <br />
                                ###### Header
                            </td>
                            <td>
                                H1 Header <br />
                                ... <br />
                                H6 Header
                            </td>
                        </tr>
                        <tr>
                            <td>**bold**</td>
                            <td><strong>bold</strong></td>
                        </tr>
                        <tr>
                            <td>
                                * item 1 <br />
                                * item 2
                            </td>
                            <td>
                                <ul>
                                    <li>item 1</li>
                                    <li>item 2</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>> quoted text</td>
                            <td>
                                <blockquote>quoted text</blockquote>
                            </td>
                        </tr>
                        <tr>
                            <td>*italics* or _italics_</td>
                            <td><i>italics</i></td>
                        </tr>
                        <tr>
                            <td>[Link](https://...)</td>
                            <td>link</td>
                        </tr>
                        <tr>
                            <td>
                                1. item 1 <br />
                                2. item 2
                            </td>
                            <td>
                                <ol>
                                    <li>item 1</li>
                                    <li>item 2</li>
                                </ol>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
