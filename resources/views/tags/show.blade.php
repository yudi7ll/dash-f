@extends('layouts.app')

@section('content')
    @foreach ($tags as $tag)
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('tags.posts', $tag->slug) }}">{{ $tag->name }} ({{ $tag->count }})</a>
            </li>
        </ul>
    @endforeach
@endsection
