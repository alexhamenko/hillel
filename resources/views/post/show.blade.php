@extends('layout')

@section('title', "$post->title page")

@section('content')
    <h1>{{ $post->title }}</h1>
    <ul class="list-group mb-3">
        <li class="list-group-item">Slug: {{ $post->slug }}</li>
        <li class="list-group-item">Body: {{ $post->body }}</li>
        <li class="list-group-item">Category:
            <a href="/category/{{ $post->category->id }}/show">{{ $post->category->title }}</a>
        </li>
        <li class="list-group-item">Tags:
            @foreach($post->tags as $tag)
                <a href="/tag/{{ $tag->id }}/show">{{ $tag->title }}</a>
            @endforeach
        </li>
        <li class="list-group-item">Created At: {{ $post->created_at }}</li>
        <li class="list-group-item">Updated At: {{ $post->updated_at }}</li>
    </ul>
    <a href="/post" class="btn btn-secondary">Return to the posts list</a>
@endsection()