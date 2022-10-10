<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'id' => '1',
            'title' => 'Default category',
            'slug' => 'default',
        ]);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}