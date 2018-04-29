<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        // only admins are allowed to create and edit blog articles
        $this->middleware('admin')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Blog::all();
        return view('modules.blog.index', compact('posts'));
    }

    public function show($param)
    {
        $post = Blog::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        return view('modules.blog.show', compact('post'));
    }

    public function create()
    {
        return view('modules.blog.create');
    }

    public function edit($param)
    {
        $post = Blog::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        return view('modules.blog.edit', compact('post'));
    }

    public function update(Request $request, $param)
    {
        $post = Blog::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        Validator::make($request->all(), [
            'name' => 'unique:blog|max:255',
            'description' => 'min:50|max:3000',
        ])->validate();

        $post->update($request->only('name', 'description'));
    }

    public function destroy($param)
    {
        //
    }
}
