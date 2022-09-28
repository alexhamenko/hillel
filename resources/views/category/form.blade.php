@extends('layout')

@if($action === 'create')
    @section('title', 'Create category')
@elseif($action === 'update')
    @section('title', 'Update category')
@endif

@section('content')
    @if($action === 'create')
        <h1>Create new category</h1>
    @elseif($action === 'update')
        <h1>Update category</h1>
    @endif
    <form method="post">
        @if($action === 'update')
            <input type="hidden" value="{{ $category->id }}" name="id">
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection()