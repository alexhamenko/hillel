<?php

namespace Hillel\Controllers;

use Hillel\Models\Post;
use Hillel\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class TagController
{
    public function index()
    {
        $tags = Tag::all();

        return view('tag/index', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);

        return view('tag/show', compact('tag'));
    }

    public function create()
    {
        $tag = new Tag();
        $posts = Post::all();

        return view('tag/form', compact('tag', 'posts'));
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
                'unique:Hillel\Models\Tag,slug'
            ],
            'posts' => [
                'required',
                'exists:Hillel\Models\Post,id'
            ]
        ]);

        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag = new Tag();
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->save();
        $tag->posts()->attach($data['posts']);

        $_SESSION['success'] = 'Tag ' . $data['title'] . ' was successfully created';
        return new RedirectResponse('/tag');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        $posts = Post::all();

        return view('tag/form-edit', compact('tag', 'posts'));
    }

    public function update()
    {
        $data = request()->all();

        $tag = Tag::find($data['id']);

        $validator = validator()->make($data, [
            'title' => ['required', 'min:3'],
            'slug' => [
                'required',
                'min:3',
                'alpha_num',
                Rule::unique('tags', 'slug')->ignore($tag->id)
            ],
            'posts' => [
                'required',
                'exists:Hillel\Models\Post,id'
            ]
        ]);

        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->save();
        $tag->posts()->sync($data['posts']);

        $_SESSION['success'] = 'Tag ' . $data['title'] . ' was successfully updated';
        return new RedirectResponse('/tag');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        return new RedirectResponse('/tag');
    }
}