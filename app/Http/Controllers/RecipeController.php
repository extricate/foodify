<?php

namespace App\Http\Controllers;

use Validator;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function __construct(Recipe $recipe)
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::paginate(6);

        return view('modules.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.recipes.create');
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
            'image' => 'required|image|max:2048'
        ])->validate();

        $recipe = Recipe::create([
            'name' => $request->name,
            'description' => $request->description,
            'author' => auth()->user()->id,
        ]);

        $recipe
            ->addMediaFromRequest('image')
            ->withResponsiveImages()
            ->toMediaCollection();

        // update the searchable with added media by changing the name, cannot force this otherwise
        $recipe->name = $request->name;
        $recipe->save();

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

        if ($recipe->author()->id == auth()->user()->id || auth()->user()->isAdmin() == true) {
            return view('modules.recipes.edit', compact('recipe'));
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

            $recipe->update($request->except('image'));

            if ($request->image) {
                $recipe
                    ->addMediaFromRequest('image')
                    ->withResponsiveImages()
                    ->toMediaCollection();
            }

            return back()->withInput();
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
