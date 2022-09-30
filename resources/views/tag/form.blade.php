@extends('layout')

@if($action === 'create')
    @section('title', 'Create tag')
@elseif($action === 'update')
    @section('title', 'Update tag')
@endif

@section('content')
    @if($action === 'create')
        <h1>Create new tag</h1>
        <form action="/tag/store" method="post" class="mb-3">
    @elseif($action === 'update')
        <h1>Update tag</h1>
        <form action="/tag/update" method="post" class="mb-3">
            <input type="hidden" value="{{ $tag->id }}" name="id">
    @endif
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $tag->title }}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $tag->slug }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/tag" class="btn btn-secondary">Return to the tags list</a>
@endsection()