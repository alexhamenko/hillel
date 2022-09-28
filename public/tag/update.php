<?php

use Hillel\Application\Models\Tag;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

if(!isset($_GET['id'])) {
    throw new \Error('Tag ID not found');
}

$tag = Tag::find(($_GET['id']));

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();
    header('Location: /tag');
}

/** @var $blade */
echo $blade->make('tag/form',[
    'tag' => $tag,
    'action' => 'update'
])->render();