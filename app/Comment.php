<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'author')->getResults();
    }

    public function onRecipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }

    public function latestComments(Int $amount = 2)
    {
        return Comment::all()->sortByDesc('created_at')->take($amount);;
    }

    public function needModeration()
    {
        return Comment::where('published', '=', null)->paginate(6, ['*'], 'comments');
    }
}
