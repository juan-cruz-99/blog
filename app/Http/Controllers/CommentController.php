<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (auth()->user()) {
            $data = $request->validate([
                'content' => 'required',
                'post_id' => 'required',
            ]);

            $data['user_id'] = auth()->user()->id;

            Comment::create($data);
        }

        return redirect()->back();
    }
}
