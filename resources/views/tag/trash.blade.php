@extends('layout')

@section('title', 'Trashed tags')

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
                    'current' => false
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
                    'current' => true
                ]
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
            <th scope="col">Deleted At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <th>{{ $tag->id }}</th>
                <th>{{ $tag->title }}</th>
                <th>{{ $tag->slug }}</th>
                <th>{{ $tag->deleted_at }}</th>
                <th class="d-grid gap-2">
                    <a href="/tag/{{ $tag->id }}/restore" class="btn btn-primary">Restore</a>
                    <a href="/tag/{{ $tag->id }}/force-delete" class="btn btn-danger">Delete</a>
                </th>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center">No trashed tags found!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection