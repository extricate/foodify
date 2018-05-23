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
 * Admin dashboard
 */
Route::get('/home/admin', 'HomeController@admin')->name('home.admin')->middleware('admin');

Route::resource('/home/admin/reports', 'AdminReportController')->names([
    'index' => 'admin.report',
    'show' => 'admin.report.show',
    ])->middleware('admin');

Route::get('/home/admin/reports/{param}', 'AdminReportController@show')->name('admin.report.show')->middleware('admin');


/**
 * Pages are only editable from the admin interface.
 */
Route::resource('/page', 'PageController');
Route::get('/page/{param}', 'PageController@show')->name('page.show');

/**
 * User settings
 */
Route::get('/settings', 'Auth\UserSettingsController@index')->name('settings.index')->middleware('auth');
Route::get('/settings/password', 'Auth\ChangePasswordController@showChangePasswordForm');
Route::post('/changePassword','Auth\ChangePasswordController@changePassword')->name('changePassword');

// View users
Route::get('/users', 'UserController@index')->name('users.index')->middleware('admin');
Route::get('/users/{param}', 'UserController@show')->name('user.show');

/**
 * User admin
 */
Route::post('/user/admin', 'UserController@admin')->name('user.admin');
Route::post('/user/verfied', 'UserController@verified')->name('user.verified');

Route::post('/user/ban', 'UserController@ban')->name('user.ban');
Route::post('/user/unban', 'UserController@unban')->name('user.unban');

/**
 * Recipes
 */
Route::resource('/recipes', 'RecipeController');
Route::get('/recipes/{param}', 'RecipeController@show')->name('recipes.show');
Route::get('/recipes/{param}/edit', 'RecipeController@edit')->name('recipe.edit')->middleware('auth');
Route::patch('/recipes/{param}/update', 'RecipeController@update')->name('recipe.update')->middleware('auth');
Route::put('/recipes/{param}/update', 'RecipeController@update')->name('recipe.update')->middleware('auth');
Route::post('/recipe/rating/', 'RecipeRatingController@store')->name('recipesrating.store')->middleware('auth');
Route::get('/recipes/{id}/restore', 'RecipeController@restore')->name('recipes.restore')->middleware('admin');
Route::get('/recipes/{id}/delete', 'RecipeController@softDelete')->name('recipes.soft-delete')->middleware('admin');

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
Route::get('/moderation', 'CommentController@moderation')->name('comments.moderation')->middleware('admin');
Route::post('/moderation/{id}', 'CommentController@moderate')->name('comments.moderation.action')->middleware('admin');

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
 * Ingredients
 */
Route::get('/ingredient/{id}/destroy', [
    'as' => 'ingredient.destroy',
    'uses' => 'IngredientController@destroy'
])->middleware('admin');

/**
 * Pantry (not implemented)
 */
Route::resource('/pantry', 'PantryController');

/**
 * Favorites
 */
Route::resource('/favorites', 'FavoriteController');

/**
 * Menus
 */

Route::resource('/menus', 'MenuController');
Route::patch('/menus/{menu}/attach/{element}', 'MenuController@attach')->name('menus.attach');
Route::patch('/menus/{menu}/detach/{element}', 'MenuController@detach')->name('menus.detach');

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
