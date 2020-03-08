<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const USELESS_KVN = 'bespoleznaya-kvn-statistika';

    protected $table = 'wink_posts';
    protected $casts = [
        'meta' => 'array'
    ];

    protected $dates = [
        'publish_date',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'wink_posts_tags');
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