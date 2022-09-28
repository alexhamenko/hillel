<?php

use Hillel\Application\Models\Category;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

$category = new Category();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category->title = $_POST['title'];
    $category->slug = $_POST['slug'];
    if(!$category->save()){
        header('Location: /category');
    }
}

/** @var $blade */
echo $blade->make('category/form',[
    'category' => $category,
    'action' => 'create'
])->render();