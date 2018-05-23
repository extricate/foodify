<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Tags\Tag;

class RecipeController extends Controller
{
    public function __construct(Recipe $recipe)
    {
        $this->middleware('admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::latest('updated_at')->paginate(6);
        return view('modules.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $availableTags = \Spatie\Tags\Tag::all();
        return view('modules.recipes.create', compact('availableTags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:recipes|max:255',
            'description' => 'required|min:50|max:5000',
            'image' => 'required|image|max:2048',
            'preparation_time' => 'integer|max:1000',
            'tags' => 'string'
        ])->validate();

        $recipe = Recipe::create([
            'name' => $request->name,
            'description' => $request->description,
            'author' => auth()->user()->id,
            'preparation_time' => $request->preparation_time,
        ]);

        // attach all tags
        if ($request->tags) {
            $tags[] = explode(',', strtolower($request->tags));
            foreach ($tags as $tag) {
                $recipe->attachTags($tag);
            }
        }

        $recipe
            ->addMediaFromRequest('image')
            ->withResponsiveImages()
            ->toMediaCollection();

        // update the searchable with added media by changing the name, cannot force this otherwise
        $recipe->name = $request->name;
        $recipe->save();

        // add recipe ingredients
        if ($request->ingredients) {
            foreach ($request->ingredients as $ingredient) {
                Ingredient::firstOrCreate([
                    'name' => $ingredient->name,
                    'type' => $ingredient->type,
                    'quantity' => $ingredient->quantity,
                    'recipe_id' => $recipe->id
                ]);
            }
        }

        if (request()->wantsJson()) {
            return response($recipe, 201);
        }

        return redirect($recipe->path())
            ->with('message', 'Your recipe has been published!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        $recipe = Recipe::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        return view('modules.recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $param
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($param)
    {
        $recipe = Recipe::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        $tags = Tag::all();

        if ($recipe->author()->id == auth()->user()->id || auth()->user()->isAdmin() == true) {
            return view('modules.recipes.edit', compact('recipe', 'tags'));
        }

        return redirect(route('home'))->with('message', 'You do not have permission to edit that recipe.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  $param
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $param)
    {
        $recipe = Recipe::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        Validator::make($request->all(), [
            'name' => 'unique:recipes|max:255',
            'description' => 'min:50|max:5000',
            'image' => 'image|max:2048'
        ])->validate();

        if ($recipe->author()->id == auth()->user()->id || auth()->user()->isAdmin() == true) {

            $recipe->update($request->except('image', 'tags', 'ingredients'));

            if ($request->image) {
                $recipe
                    ->addMediaFromRequest('image')
                    ->withResponsiveImages()
                    ->toMediaCollection();
            }

            if ($request->tags) {
                $tags[] = explode(',', strtolower($request->tags));
                foreach ($tags as $tag) {
                    $recipe->syncTags($tag);
                }
            }

            // add recipe ingredients
            if ($request->ingredients) {
                // create a new array
                $ingredients = [];
                foreach($request->ingredients as $ingredient) {
                    $newIngredient = explode(',', $ingredient);
                    $associateNewIngredient['name'] = $newIngredient[0];
                    $associateNewIngredient['quantity'] = $newIngredient[1];
                    $ingredients[] = $associateNewIngredient;
                }
                foreach ($ingredients as $ingredient) {
                    Ingredient::firstOrCreate([
                        'name' => $ingredient['name'],
                        'quantity' => $ingredient['quantity'],
                        'recipe' => $recipe->id
                    ]);
                }
            }

            return back()->withInput()->with('message', 'Edited successfully.');
        }

        return redirect(route('home'))->with('message', 'You do not have permission to edit that recipe.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
