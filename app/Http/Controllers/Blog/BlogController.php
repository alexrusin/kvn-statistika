<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Post;
use App\Models\Blog\Tag;

class BlogController
{
    public function index($tag = null)
    {
       
        if (!$tag) {
            return redirect('/page-not-found');
        }

        $postTag = Tag::whereSlug($tag)->first();
        if (!$postTag) {
            return $this->show($tag);
        }
        $postsPaginator = $postTag->posts()->wherePublished(true)->orderBy('publish_date', 'desc')->paginate(20);
        
        return view('blog.index', compact('postTag', 'postsPaginator'));
    }

    public function show($slug) 
    {
        $post = Post::whereSlug($slug)->first();

        if (!$post) {
            return redirect('/page-not-found');
        }

        return view('blog.show', compact('post'));
    }
}