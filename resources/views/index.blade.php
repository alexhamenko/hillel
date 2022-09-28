@extends('layout')

@section('title', 'Main page')

@section('navigation')
    @include('particles.navigation', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Home',
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
<h1>This is Main Page!</h1>
@endsection