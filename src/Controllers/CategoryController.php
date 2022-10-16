<?php

namespace Hillel\Controllers;

use Hillel\Models\Category;
use Hillel\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();

        return view('category/index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('category/show', compact('category'));
    }

    public function create()
    {
        $category = new Category();
        $posts = Post::all();

        return view('category/form', compact('category', 'posts'));
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
                'unique:Hillel\Models\Category,slug'
            ],
            'posts' => [
                'required',
                'exists:Hillel\Models\Post,id'
            ]
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();
        foreach ($data['posts'] as $post_id) {
            $post = Post::find($post_id);
            $post->category_id = $category->id;
            $post->save();
        }

        $_SESSION['success'] = 'Category ' . $data['title'] . ' was successfully created';
        return new RedirectResponse('/category');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $posts = Post::all();

        return view('category/form-edit', compact('category', 'posts'));
    }

    public function update()
    {
        $data = request()->all();

        $category = Category::find($data['id']);

        $validator = validator()->make($data, [
            'title' => ['required', 'min:3'],
            'slug' => [
                'required',
                'min:3',
                'alpha_num',
                Rule::unique('categories', 'slug')->ignore($category->id),
            ],
            'posts' => [
                'required',
                'exists:Hillel\Models\Post,id'
            ]
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category->title = $data['title'];
        $category->slug = $data['slug'];
        foreach ($data['posts'] as $post_id) {
            $post = Post::find($post_id);
            $post->category_id = $data['id'];
            $post->save();
        }
        $category->save();

        $_SESSION['success'] = 'Category ' . $data['title'] . ' was successfully updated';
        return new RedirectResponse('/category');
    }

    public function detachpost($id, $post_id)
    {
        $category = Category::find($id);
        $category->posts()->where('id', $post_id)->update(['category_id' => 1]);
        return new RedirectResponse('/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return new RedirectResponse('/category');
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('category/trash', compact('categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()
            ->where('id', $id)
            ->restore();
        return new RedirectResponse('/category');
    }

    public function forceDelete($id)
    {
        Category::onlyTrashed()
            ->find($id)
            ->forceDelete();
        return new RedirectResponse('/category');
    }
}