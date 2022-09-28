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
                <th>{{ $tag['created_at'] }}</th>
                <th>{{ $tag['updated_at'] }}</th>
                <th class="d-grid gap-2">
                    <a href="/tag/update.php?id={{ $tag['id'] }}" class="btn btn-success">Update</a>
                    <a href="/tag/delete.php?id={{ $tag['id'] }}" class="btn btn-danger">Delete</a>
                </th>
            </tr>
        @empty
            <p>Empty!</p>
        @endforelse
        </tbody>
    </table>

    <a href="/tag/create.php" class="btn btn-primary">Create New Tag</a>
@endsection()