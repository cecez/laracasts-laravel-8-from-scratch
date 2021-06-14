<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest('published_at')->filter(request(['search']))->get(),
            'categories' => Category::all()->sortBy('name')
        ]);
    }

    public function show(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
