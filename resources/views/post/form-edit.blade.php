@extends('layout')

@section('title', 'Update post')

@section('content')
    <h1>Update post</h1>
    <form action="/post/update" method="post" class="mb-3">
        <input type="hidden" value="{{ $post->id }}" name="id">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">

            @isset($_SESSION['errors']['title'])
                @foreach($_SESSION['errors']['title'] as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}">

            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea type="text" class="form-control" id="body" name="body" rows="5">{{ $post->body }}</textarea>

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
                        <option value="{{$category->id}}" @if( $category->id == $post->category_id) selected @endif>
                            {{$category->title}}
                        </option>
                    @endforeach
                </select>

                @isset($_SESSION['errors']['category_id'])
                    @foreach($_SESSION['errors']['category_id'] as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                @endisset
            </div>
            <div class="col-md">
                <label for="tags">Select tags</label>
                <select class="form-select" name="tags[]" id="tags" multiple>
                    @foreach($tags as $tag)
                        <option @if(in_array($tag->id, $post->tags->pluck('id')->toArray())) selected
                                @endif value="{{$tag->id}}">{{$tag->title}}</option>
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