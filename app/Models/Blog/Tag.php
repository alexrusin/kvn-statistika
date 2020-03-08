<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'wink_tags';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'wink_posts_tags', 'tag_id', 'post_id');
    }
}