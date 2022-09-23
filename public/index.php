<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Hillel\Application\Models\User;

$user = User::find(1);
var_dump($user); // SELECT * FROM user WHERE id = :id TODO: повертаю об'єкт

$user->name = 'John';
$result = $user->save();
var_dump($result); // UPDATE user SET name = :name, email = 'email' WHERE id = :id

$result = $user->delete();
var_dump($result); // DELETE FROM user WHERE id = :id

$user = new User;
$user->name = 'John';
$user->email = 'some@gmail.com';
$result = $user->save();
var_dump($result); // INSERT INTO user (id, name, email) VALUES (:id, :name, :email)