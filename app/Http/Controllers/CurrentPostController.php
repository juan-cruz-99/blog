<?php

namespace App\Http\Controllers;

class CurrentPostController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $posts = $user->posts()->paginate(10);

        return view('admin.home', compact('posts')) ;
    }
}
