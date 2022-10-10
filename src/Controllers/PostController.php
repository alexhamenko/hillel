<?php

namespace Hillel\Controllers;

use Hillel\Models\Post;
use Hillel\Models\Category;
use Hillel\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class PostController
{
    public function index()
    {
        $posts = Post::all();

        return view('post/index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('post/show', compact('post'));
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();

        return view('post/form', compact('post', 'categories', 'tags'));
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => ['required', 'min:3'],
            'slug' => [
                'required',
                'min:3',
                'alpha_num',
                'unique:Hillel\Models\Post,slug'
            ],
            'category_id' => [
                'required',
                'exists:Hillel\Models\Category,id'
            ],
            'tags' => [
                'required',
                'exists:Hillel\Models\Tag,id'
            ]
        ]);

        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = new Post();
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();
        $post->tags()->attach($data['tags']);

        $_SESSION['success'] = 'Post ' . $data['title'] . ' was successfully created';

        return new RedirectResponse('/post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post/form-edit', compact('post', 'categories', 'tags'));
    }

    public function update()
    {
        $data = request()->all();

        $post = Post::find($data['id']);

        $validator = validator()->make($data, [
            'title' => ['required', 'min:3'],
            'slug' => [
                'required',
                'min:3',
                'alpha_num',
                Rule::unique('posts', 'slug')->ignore($post->id),
            ],
            'category_id' => [
                'required',
                'exists:Hillel\Models\Category,id'
            ],
            'tags' => [
                'required',
                'exists:Hillel\Models\Tag,id'
            ],
        ]);

        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();
        $post->tags()->sync($data['tags']);

        $_SESSION['success'] = 'Post ' . $data['title'] . ' was successfully updated';

        return new RedirectResponse('/post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        return new RedirectResponse('/post');
    }
}