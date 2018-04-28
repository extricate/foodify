<?php

namespace App\Http\Controllers\Api;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('q')) {

            // Using the Laravel Scout syntax to search the products table.
            $recipe = Recipe::search($request->get('q'))->get();

            // If there are results return them, if none, return the error message.
            return $recipe->count() ? $recipe : $error;
        }

        // Return the error message if no keywords existed
        return $error;
    }
}
