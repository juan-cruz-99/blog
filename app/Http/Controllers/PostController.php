<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::has('posts')->get();

        $posts = Post::when(request()->has('category'), function ($query) {
            $query->whereHas('categories', function ($query) {
                $query->where('categories.id', request()->query('category'));
            });
        })->latest()->paginate(5);

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        $post->load(['user', 'comments.user']);

        return view('posts.show', compact('post'));
    }
}
