<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function posts()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}