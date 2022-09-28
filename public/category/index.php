<?php

use Hillel\Application\Models\Category;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

$categories = Category::all();

/** @var $blade */
echo $blade->make('category/index', compact('categories'))->render();