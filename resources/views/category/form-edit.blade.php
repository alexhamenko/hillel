@extends('layout')

@section('title', 'Update category')

@section('content')
    <h1>Update category</h1>
    <form action="/category/update" method="post" class="mb-3">
        <input type="hidden" value="{{ $category->id }}" name="id">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">

            @isset($_SESSION['errors']['title'])
                @foreach($_SESSION['errors']['title'] as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">

            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="posts">Select posts</label>
            <select class="form-select" name="posts[]" id="posts" multiple>
                @foreach($posts as $post)
                    <option @if(in_array($post->id, $category->posts->pluck('id')->toArray())) selected
                            @endif value="{{$post->id}}">{{$post->title}}</option>
                @endforeach
            </select>

            @isset($_SESSION['errors']['posts'])
                @foreach($_SESSION['errors']['posts'] as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endisset
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/category" class="btn btn-secondary">Return to the categories list</a>

    @php
        unset($_SESSION['data']);
        unset($_SESSION['errors']);
    @endphp
@endsection()