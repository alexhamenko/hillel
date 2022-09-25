<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Application\Models\Category;
use Hillel\Application\Models\Post;
use Hillel\Application\Models\Tag;

use joshtronic\LoremIpsum;


//for ($i = 1; $i <= 5; $i++) {
//    $categoryModel = new Category();
//    $categoryModel->title = 'Category ' . $i;
//    $categoryModel->slug = 'cat' . $i;
//    $categoryModel->save();
//}

//$categoryFirst = Category::find(1);
//$categoryFirst->title = 'Updated Category';
//$categoryFirst->slug = 'ucat';
//$categoryFirst->save();

//$categoryLast = Category::all()->last();
//$categoryLast->delete();

//for ($i = 1; $i <= 10; $i++) {
//    $postModel = new Post();
//    $postModel->title = 'Post ' . $i;
//    $postModel->slug = 'post' . $i;
//    $postModel->category_id = Category::all()->random()->id;
//    $lipsum = new LoremIpsum();
//    $loremSentences = $lipsum->sentences(5);
//    $postModel->body = $loremSentences;
//    $postModel->save();
//}

//$randomPost = Post::all()->random();
//$randomPost->title = 'Post Updated';
//$randomPost->slug = 'upost';
//$randomPost->category_id = Category::all()->random()->id;
//$lipsum = new LoremIpsum();
//$loremSentences = $lipsum->sentences(5);
//$randomPost->body = $loremSentences;
//$randomPost->save();

//$anotherRandomPost = Post::all()->random();
//$anotherRandomPost->delete();

//for ($i = 1; $i <= 10; $i++) {
//    $tagModel = new Tag();
//    $tagModel->title = 'Tag ' . $i;
//    $tagModel->slug = 'tag' . $i;
//    $tagModel->save();
//}

//$allPosts = Post::all();
//foreach($allPosts as $post) {
//    $randomTagsIds = Tag::all()->random(3)->map(function ($tag) {
//        return $tag->id;
//    })->toArray();
//
//    $post->tags()->sync($randomTagsIds);
//}