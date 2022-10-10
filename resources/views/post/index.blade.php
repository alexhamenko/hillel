@extends('layout')

@section('title', 'Posts list')

@section('navigation')
    @include('particles.navigation', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Home',
                'current' => false
            ],
            [
                'link' => '/post',
                'name' => 'Posts List',
                'current' => true
            ],
            [
                'link' => '/category',
                'name' => 'Categories List',
                'current' => false
            ],
            [
                'link' => '/tag',
                'name' => 'Tags List',
                'current' => false
            ],
        ]
    ])
@endsection

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">{{$_SESSION['success']}}</div>
    @endisset
    @php
        unset($_SESSION['success']);
    @endphp
    <table class="table table-bordered table-striped align-middle">
        <thead>
        <tr class="table-success">
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <th>{{ $post->title }}</th>
                <th>{{ $post->slug }}</th>
                <th class="text-truncate" style="max-width: 300px;">{{ $post->body }}</th>
                <th>
                    <a href="/category/{{ $post->category->id }}/show">{{ $post->category->title }}</a>
                </th>
                <th>
                    @foreach($post->tags as $tag)
                        <a href="/tag/{{ $tag->id }}/show">{{ $tag->title }}</a>
                    @endforeach
                </th>
                <th>{{ $post->created_at }}</th>
                <th>{{ $post->updated_at }}</th>
                <th class="d-grid gap-2">
                    <a href="/post/{{ $post->id }}/show" class="btn btn-primary">Show</a>
                    <a href="/post/{{ $post->id }}/edit" class="btn btn-success">Update</a>
                    <a href="/post/{{ $post->id }}/delete" class="btn btn-danger">Delete</a>
                </th>
            </tr>
        @empty
            <p>Empty!</p>
        @endforelse
        </tbody>
    </table>

    <a href="/post/create" class="btn btn-primary">Create New Post</a>
@endsection()