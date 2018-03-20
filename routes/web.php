<?php

use App\Recipe;
use App\Ingredient;
use App\Events\NewRecipe;

use App\Events\UserRegistered;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/recipes', 'RecipeController');
Route::resource('/plan', 'FoodPlanController');
Route::resource('/ingredients', 'IngredientController');
Route::resource('/pantry', 'PantryController');

/*Route::get('/recipes', function () {
    return Recipe::latest()->pluck('name');
});

Route::post('/recipes', function() {
    $recipe = Recipe::forceCreate(request(['name']));

    event(new NewRecipe($recipe));
});*/

Auth::routes();
