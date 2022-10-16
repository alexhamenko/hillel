@extends('components.layout')

@section('title', 'Trashed posts')

@section('navigation')
    @include('particles.navigation', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Home',
                'current' => false
            ],
            'Posts' => [
                [
                    'link' => '/post',
                    'name' => 'Active',
                    'current' => false
                ],
                [
                    'link' => '/post/trash',
                    'name' => 'Trashed',
                    'current' => true
                ]
            ],
            'Categories' => [
                [
                    'link' => '/category',
                    'name' => 'Active',
                    'current' => false
                ],
                [
                    'link' => '/category/trash',
                    'name' => 'Trashed',
                    'current' => false
                ]
            ],
            'Tags' => [
                [
                    'link' => '/tag',
                    'name' => 'Active',
                    'current' => false
                ],
                [
                    'link' => '/tag/trash',
                    'name' => 'Trashed',
                    'current' => false
                ]
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
            <th scope="col">Deleted At</th>
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
                <th>{{ $post->deleted_at }}</th>
                <th class="d-grid gap-2">
                    <a href="/post/{{ $post->id }}/restore" class="btn btn-primary">Restore</a>
                    <a href="/post/{{ $post->id }}/force-delete" class="btn btn-danger">Delete</a>
                </th>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align: center">No trashed posts found!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection()