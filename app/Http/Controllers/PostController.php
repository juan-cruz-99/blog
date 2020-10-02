<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;

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
        /** @var App\Models\User */
        $user = auth()->user();

        if (!is_null($user)) {
            $user->visitedPosts()->syncWithoutDetaching([
                $post->id => [
                    'last_visited_at' => Carbon::now()
                ]]);
        }

        $post->load(['user', 'comments.user']);

        return view('posts.show', compact('post'));
    }
}
