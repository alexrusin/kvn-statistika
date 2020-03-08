<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'wink_tags';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that should be casted.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'array',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'wink_posts_tags', 'tag_id', 'post_id');
    }
}