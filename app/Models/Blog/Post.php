<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const USELESS_KVN = 'bespoleznaya-kvn-statistika';

    protected $table = 'wink_posts';
    
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

    protected $casts = [
        'meta' => 'array',
        'published' => 'boolean'
    ];

    protected $dates = [
        'publish_date',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'wink_posts_tags', 'post_id', 'tag_id');
    }

    public function getAttributionAttribute()
    {
        $attributions = $this->tags->filter(function($tag) {
            return $tag->slug == self::USELESS_KVN;
        });

        if (!$attributions->isEmpty()) {
            return (object) [
                'sourceUrl' => 'https://telegram.me/useless_kvn',
                'sourceName' => '@useless_kvn'
            ];
        }
    }
}