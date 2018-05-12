<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
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
