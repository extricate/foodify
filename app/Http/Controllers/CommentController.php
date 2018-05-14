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
        $this->middleware('banned')->only(['store', 'update', 'delete', 'edit']);
        $this->middleware('admin')->only(['moderation', 'moderate']);
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

        if (auth()->user()->admin == true || auth()->user()->verified) {
            Comment::create([
                'author' => auth()->user()->id,
                'text' => $request->text,
                'recipe_id' => $request->recipe,
                'published' => true,
            ]);

            return back()->with('message',
                'Success! We trust you on Foodify and thus your comment has been published immediately.');
        }

        Comment::create([
            'author' => auth()->user()->id,
            'text' => $request->text,
            'recipe_id' => $request->recipe,
            'published' => false,
        ]);

        return back()->with('message', 'Success! Your comment will be published after a moderator approves it.');
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

        if ($comment->author()->id == auth()->user()->id) {
            $comment->update([
                'text' => $request->text,
                'published' => false,
            ]);

            return redirect($recipe->path())->with('message',
                'Comment edited. The comment will have to be reviewed by a moderator before it is visible again.');
        }

        if (auth()->user()->admin == true || $comment->author()->id == auth()->user()->id && $comment->author()->verified) {
            $comment->update([
                'text' => $request->text,
                'published' => true,
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

    public function moderation()
    {
        $comment = new Comment;
        $comments = $comment->needModeration();

        return view('modules.comments.moderation', compact('comments'));
    }

    public function moderate(Request $request, $id)
    {
        Validator::make($request->all(), [
            'action' => 'required|boolean'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->published = $request->action;
        $comment->save();

        return back()->with('message', 'Comment published status set to ' . $request->action);
    }
}
