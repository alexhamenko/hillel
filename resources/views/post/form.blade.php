@extends('components.layout')

@section('title', 'Create post')

@section('content')
    <h1>Create new post</h1>
    <form action="/post/store" method="post" class="mb-3">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{$_SESSION['data']['title'] ?? '' }}">

            @isset($_SESSION['errors']['title'])
                @foreach($_SESSION['errors']['title'] as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{$_SESSION['data']['slug'] ?? '' }}">

            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea type="text" class="form-control" id="body" name="body"
                      rows="5">{{$_SESSION['data']['body'] ?? '' }}</textarea>

            @isset($_SESSION['errors']['body'])
                @foreach($_SESSION['errors']['body'] as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endisset
        </div>
        <div class="row g-2">
            <div class="col-md">
                <label for="category_id">Select category</label>
                <select class="form-select" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>

                @isset($_SESSION['errors']['category_id'])
                    @foreach($_SESSION['errors']['category_id'] as $error)
                        <div class="alert alert-danger" role="alert">{{$error}}</div>
                    @endforeach
                @endisset
            </div>
            <div class="col-md">
                <label for="tags">Select tags</label>
                <select class="form-select" name="tags[]" id="tags" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>

                @isset($_SESSION['errors']['tags'])
                    @foreach($_SESSION['errors']['tags'] as $error)
                        <div class="alert alert-danger" role="alert">{{$error}}</div>
                    @endforeach
                @endisset
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/post" class="btn btn-secondary">Return to the posts list</a>

    @php
        unset($_SESSION['data']);
        unset($_SESSION['errors']);
    @endphp
@endsection()