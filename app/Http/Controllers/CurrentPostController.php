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
}
