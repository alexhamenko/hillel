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
                'link' => '/post',
                'name' => 'Posts List',
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
            <th scope="col">Posts</th>
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
                <th>
                    @foreach($category->posts as $post)
                        <div class="btn btn-primary btn-post d-inline-flex mb-2 me-2"
                             style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem;">
                            {{ $post->title }}
                            <a href="/category/{{ $category['id'] }}/detachpost/{{ $post['id'] }}"
                               class="btn btn-close ms-1"></a>
                        </div>
                    @endforeach
                </th>
                <th>{{ $category['created_at'] }}</th>
                <th>{{ $category['updated_at'] }}</th>
                <th class="d-grid gap-2">
                    <a href="/category/{{ $category['id'] }}/show" class="btn btn-primary">Show</a>
                    <a href="/category/{{ $category['id'] }}/edit" class="btn btn-success">Update</a>
                    @if($category->posts()->count() > 0)
                        <div
                                class="d-grid gap-2"
                                data-bs-toggle="tooltip"
                                data-bs-title="Can't delete category related to posts"
                                data-bs-placement="left"
                        >
                            <a href="/category/{{ $category['id'] }}/delete" class="btn btn-danger disabled">Delete</a>
                        </div>
                    @elseif($category['id'] === 1)
                        <div
                                class="d-grid gap-2"
                                data-bs-toggle="tooltip"
                                data-bs-title="Can't delete default category"
                                data-bs-placement="left"
                        >
                            <a href="/category/{{ $category['id'] }}/delete" class="btn btn-danger disabled">Delete</a>
                        </div>
                    @else
                        <a href="/category/{{ $category['id'] }}/delete" class="btn btn-danger">Delete</a>
                    @endif
                </th>
            </tr>
        @empty
            <p>Empty!</p>
        @endforelse
        </tbody>
    </table>

    <a href="/category/create" class="btn btn-primary">Create New Category</a>
@endsection()

@push('styles')
    <style>
        .btn.btn-post:hover {
            cursor: default;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endpush