<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id'
        ]);

        Favorite::create([
            'user_id' => auth()->user()->id,
            'recipe_id' => $request->recipe_id,
        ]);

        return redirect()->back()->with('message', 'Added to favorites!');
    }

    public function destroy($id)
    {
        $favorite = Favorite::where('user_id', auth()->user()->id)->where('recipe_id', $id);

        if ($favorite) {
            $favorite->delete();
            return redirect()->back()->with(['message' => 'Removed from favorites', 'alert_type' => 'info']);
        }
        return redirect()->back()->with(['message' => 'Object does not exist', 'alert_type' => 'danger']);
    }
}
