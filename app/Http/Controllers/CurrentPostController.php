<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class CurrentPostController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $posts = $user->posts()->latest()->paginate(10);

        return view('admin.home', compact('posts')) ;
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required|exists:categories,id',
            'content' => 'required',
            'description' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        $post = Post::create(Arr::except($data, ['category']));

        $post->categories()->sync($data['category']);

        return redirect()->route('admin.home');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id == auth()->user()->id) {
            $post->delete();
        }

        return redirect()->back();
    }

    public function edit(Post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            return redirect()->back();
        }

        $post->load('categories');
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required|exists:categories,id',
            'content' => 'required',
            'description' => 'required',
        ]);

        $post->update(Arr::except($data, ['category']));

        $post->categories()->sync($data['category']);

        return redirect()->route('admin.home');
    }
}
