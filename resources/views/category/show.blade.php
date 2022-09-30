@extends('layout')

@section('title', "$category->title page")

@section('content')
    <h1>{{ $category->title }}</h1>
    <ul class="list-group mb-3">
        <li class="list-group-item">Slug: {{ $category->slug }}</li>
        <li class="list-group-item">Created At: {{ $category->created_at }}</li>
        <li class="list-group-item">Updated At: {{ $category->updated_at }}</li>
    </ul>

    <a href="/category" class="btn btn-primary">Return to the categories list</a>
@endsection()