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
 * Pages are only editable from the admin interface.
 */
Route::get('/page/{param}', 'PageController@show')->name('page.show');

/**
 * User settings
 */
Route::get('/settings', 'Auth\UserSettingsController@index')->name('settings.index')->middleware('auth');
Route::get('/settings/password', 'Auth\ChangePasswordController@showChangePasswordForm');
Route::post('/changePassword','Auth\ChangePasswordController@changePassword')->name('changePassword');
Route::get('/user/{id}/plan', 'UserController@show')->name('user.show');
Route::post('/user/ban', 'UserController@ban')->name('user.ban');


/**
 * Recipes
 */
Route::resource('/recipes', 'RecipeController');
Route::get('/recipes/{param}', 'RecipeController@show');
Route::get('/recipes/{param}/edit', 'RecipeController@edit')->name('recipe.edit')->middleware('auth');
Route::patch('/recipes/{param}/update', 'RecipeController@update')->name('recipe.update')->middleware('auth');
Route::post('/recipe/rating/', 'RecipeRatingController@store')->name('recipesrating.store')->middleware('auth');

/**
 * Blog
 */

Route::resource('/blog', 'BlogController');

/**
 * Ingredients
 */
Route::resource('/ingredients', 'IngredientController');

/**
 * Comments
 */
Route::get('/recipes/comment/{id}/edit', 'CommentController@edit')->name('comments.edit');
Route::patch('/recipes/comment/edit', 'CommentController@update')->name('comments.update');
Route::post('/recipes/comment', 'CommentController@store')->name('comments.store');
Route::post('/recipes/comment/destroy', 'CommentController@destroy')->name('comments.destroy');

/**
 * Food plan
 */
Route::resource('/plan', 'FoodPlanController');
Route::post('/plan/suggest', 'FoodPlanController@suggest')->name('plan.suggest');


/**
 * History
 */

Route::post('/history/set-as-foodplan/{id}', 'HistoryController@setAsCurrentFoodplan')->name('history.setAsFoodplan');
Route::resource('/history', 'HistoryController');

/**
 * Pantry (not implemented)
 */
Route::resource('/pantry', 'PantryController');

/**
 * Favorites
 */
Route::resource('/favorites', 'FavoriteController');

/**
 * Image storage technique
 */
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
