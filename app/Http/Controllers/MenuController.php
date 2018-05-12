<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('modules.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:menus|max:255',
        ])->validate();

        $menu = Menu::create([
            'name' => $request->name,
        ]);

        return redirect(route('menus.edit', $menu));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('modules.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        // For now this only returns pages as being attachable. In the future the trait _attachable_ will be added to models that allow being added to a menu.
        $attachables = Page::paginate(6);
        return view('modules.menu.edit', compact('menu', 'attachables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:menus|max:255',
        ])->validate();

        $menu->update([
            'name' => $request->name,
        ]);

        return redirect(route('menus.edit', $menu));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect(route('menus.index'))->with('message', 'Deleted menu.');
    }

    /**
     * Many to many handlers
     *
     * @param Menu $menu
     * @param $element
     * @return \Illuminate\Http\RedirectResponse
     */

    public function attach(Menu $menu, $element)
    {
        $menu->elements()->attach($element);
        return back();
    }

    public function detach(Menu $menu, $element)
    {
        $menu->elements()->detach($element);
        return back();
    }
}
