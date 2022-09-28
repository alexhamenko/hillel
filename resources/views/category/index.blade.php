@extends('layout')

@section('title', 'Categories list')

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
                'current' => true
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
        @forelse($categories as $category)
            <tr>
                <th>{{ $category['id'] }}</th>
                <th>{{ $category['title'] }}</th>
                <th>{{ $category['slug'] }}</th>
                <th>{{ $category['created_at'] }}</th>
                <th>{{ $category['updated_at'] }}</th>
                <th class="d-grid gap-2">
                    <a href="/category/update.php?id={{ $category['id'] }}" class="btn btn-success">Update</a>
                    <a href="/category/delete.php?id={{ $category['id'] }}" class="btn btn-danger">Delete</a>
                </th>
            </tr>
        @empty
            <p>Empty!</p>
        @endforelse
        </tbody>
    </table>

    <a href="/category/create.php" class="btn btn-primary">Create New Category</a>
@endsection()