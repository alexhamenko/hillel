<?php

use Hillel\Application\Models\Category;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

if(!isset($_GET['id'])) {
    throw new \Error('Category ID not found');
}

$category = Category::find(($_GET['id']));
$category->delete();
header('Location: /category');
