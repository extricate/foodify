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
Route::get('/home', 'HomeController@index');

/**
 * User settings
 */

Route::get('/settings/password', 'Auth\ChangePasswordController@showChangePasswordForm');
Route::post('/changePassword','Auth\ChangePasswordController@changePassword')->name('changePassword');

Route::get('/user/{id}/plan', 'UserController@show')->name('user.show');

Route::resource('/recipes', 'RecipeController');
Route::get('/recipes/{param}', 'RecipeController@show');
Route::get('/recipes/{param}/edit', 'RecipeController@edit')->name('recipe.edit');
Route::patch('/recipes/{param}/update', 'RecipeController@update')->name('recipe.update');

Route::get('/recipes/comment/{id}/edit', 'CommentController@edit')->name('comments.edit');
Route::patch('/recipes/comment/edit', 'CommentController@update')->name('comments.update');

Route::post('/recipes/comment', 'CommentController@store')->name('comments.store');
Route::post('/recipes/destroy', 'CommentController@destroy')->name('comments.destroy');
Route::resource('/plan', 'FoodPlanController');
Route::resource('/ingredients', 'IngredientController');
Route::resource('/pantry', 'PantryController');
Route::post('/history/set-as-foodplan/{id}', 'HistoryController@setAsCurrentFoodplan')->name('history.setAsFoodplan');
Route::resource('/history', 'HistoryController');
Route::resource('/favorites', 'FavoriteController');
Route::post('/plan/suggest', 'FoodPlanController@suggest')->name('plan.suggest');
Route::post('/recipe/rating/', 'RecipeRatingController@store')->name('recipesrating.store');

Route::get('storage/app/public/{id}/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
