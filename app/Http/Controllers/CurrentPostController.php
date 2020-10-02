<?php

namespace App\Http\Controllers;

class CurrentPostController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $posts = $user->posts;

        return view('admin.home', compact('posts')) ;
    }
}
