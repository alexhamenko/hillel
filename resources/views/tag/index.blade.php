@extends('layout')

@section('title', 'Tags list')

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
                'current' => false
            ],
            [
                'link' => '/category',
                'name' => 'Categories List',
                'current' => false
            ],
            [
                'link' => '/tag',
                'name' => 'Tags List',
                'current' => true
            ],
        ]
    ])
@endsection

@section('content')
    <table class="table table-bordered table-striped align-middle">
        <thead>
        <tr class="table-success">
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posts</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <th>{{ $tag['id'] }}</th>
                <th>{{ $tag['title'] }}</th>
                <th>{{ $tag['slug'] }}</th>
                <th>
                    @foreach($tag->posts as $post)
                        <a href="/post/{{ $post->id }}/show">{{ $post->title }}</a>
                    @endforeach
                </th>
                <th>{{ $tag['created_at'] }}</th>
                <th>{{ $tag['updated_at'] }}</th>
                <th class="d-grid gap-2">
                    <a href="/tag/{{ $tag['id'] }}/show" class="btn btn-primary">Show</a>
                    <a href="/tag/{{ $tag['id'] }}/edit" class="btn btn-success">Update</a>
                    <a href="/tag/{{ $tag['id'] }}/delete" class="btn btn-danger">Delete</a>
                </th>
            </tr>
        @empty
            <p>Empty!</p>
        @endforelse
        </tbody>
    </table>

    <a href="/tag/create" class="btn btn-primary">Create New Tag</a>
@endsection()