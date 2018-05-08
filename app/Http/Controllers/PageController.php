<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function __construct()
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
        // we don't have a page overview yet, only directly linked pages from menus
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.pages.edit');
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
            'name' => 'required|unique:pages|max:255',
            'text' => 'required|min:0|max:10000',
        ])->validate();

        $page = Page::create([
            'name' => $request->name,
            'content' => $request->text,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Page $candidate
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($param)
    {
        $page = Page::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();
        return view('modules.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($param)
    {
        $page = Page::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();
        return view('modules.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $param
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $param)
    {
        $page = Page::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        Validator::make($request->all(), [
            'name' => 'unique:pages|max:255',
            'text' => 'min:0|max:10000',
        ])->validate();

        $page->update($request->only(['name', 'text']));

        return back()->withInput()->with('message', 'Edited successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
