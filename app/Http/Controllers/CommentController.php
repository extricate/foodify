<?php

namespace App\Http\Controllers;

use Validator;
use App\Recipe;
use App\Comment;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

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
        Validator::make($request->all(), [
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

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $recipe = Recipe::findOrFail($comment->onRecipe()->getResults()->id);

        if ($comment->author()->id == auth()->user()->id || auth()->user()->isAdmin() == true) {
            return view('modules.comments.edit', compact('comment', 'recipe'));
        }
    }

    public function update(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required|exists:comments',
            'text' => 'required|min:10|max:400'
        ]);

        $comment = Comment::findOrFail($request->id);
        $recipe = Recipe::findOrFail($comment->onRecipe()->getResults()->id);

        if ($comment->author()->id == auth()->user()->id || auth()->user()->isAdmin() == true) {
            $comment->update([
                'text' => $request->text,
            ]);

            return redirect($recipe->path())->with('message', 'Comment edited.');
        }

        return redirect($recipe->path())->with('message', 'That is not your comment.');

    }

    public function destroy(Request $request)
    {
        Validator::make($request->all(), [
            'comment_id' => 'required|exists:comments'
        ]);

        $comment = Comment::findOrFail($request->comment_id);

        // Check whether the user is the owner or an administrator
        if ($comment->author()->id == auth()->user()->id || auth()->user()->isAdmin == true) {
            $comment->destroy($request->comment_id);

            return back()->with('message', 'Comment removed.');
        }

        return back()->with('message', 'That is not your comment.');

    }
}