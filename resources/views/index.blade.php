@extends('components.layout')

@section('title', 'Main page')

@section('navigation')
    @include('particles.navigation', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Home',
                'current' => true
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
                    'current' => false
                ]
            ],
        ]
    ])
@endsection

@section('content')
    <h1>This is Main Page!</h1>
@endsection