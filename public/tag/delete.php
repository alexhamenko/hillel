<?php

use Hillel\Application\Models\Tag;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

if(!isset($_GET['id'])) {
    throw new \Error('Tag ID not found');
}

$tag = Tag::find(($_GET['id']));
$tag->delete();
header('Location: /tag');
