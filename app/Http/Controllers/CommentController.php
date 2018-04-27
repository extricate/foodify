<?php

namespace App\Http\Controllers;

use Validator;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('modules.comments.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'recipe' => 'required|exists:recipes,id',
            'text' => 'required|min:10|max:400',
        ])->validate();

        Comment::create([
            'author' => auth()->user()->id,
            'text' => $request->text,
            'recipe_id' => $request->recipe
        ]);

        return back()->with('message', 'Your comment has been published!');


    }
}
