@extends('components.layout')

@section('title', "$tag->title page")

@section('content')
    <h1>{{ $tag->title }}</h1>
    <ul class="list-group mb-3">
        <li class="list-group-item">Slug: {{ $tag->slug }}</li>
        <li class="list-group-item">Posts:
            @foreach($tag->posts as $post)
                <a href="/post/{{ $post->id }}/show">{{ $post->title }}</a>
            @endforeach
        </li>
        <li class="list-group-item">Created At: {{ $tag->created_at }}</li>
        <li class="list-group-item">Updated At: {{ $tag->updated_at }}</li>
    </ul>
    <a href="/tag" class="btn btn-secondary">Return to the tags list</a>
@endsection()