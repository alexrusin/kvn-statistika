<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Post;

class PostController
{
    public function show($slug) 
    {
        $post = Post::whereSlug($slug)->first();

        if (!$post) {
            return redirect('/page-not-found');
        }

        return view('blog.post', compact('post'));
    }
}