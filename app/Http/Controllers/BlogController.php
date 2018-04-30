<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        // only admins are allowed to create and edit blog articles
        $this->middleware('admin')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Blog::paginate(6);
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

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'unique:blogs|min:3|max:255|string',
            'text' => 'min:50|max:3000',
        ])->validate();

        $post = Blog::create([
            'title' => $request->title,
            'content' => $request->text,
        ]);

        return view('modules.blog.show', compact('post'))->with('message', 'Post created!');
    }
    public function update(Request $request, $param)
    {
        $post = Blog::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        Validator::make($request->all(), [
            'title' => 'min:3|max:255|string',
            'content' => 'min:50|max:3000',
        ])->validate();

        $post->update([
            'title' => $request->title,
            'content' => $request->text
        ]);

        return redirect($post->path())->with('message', 'Post updated!');
    }

    public function destroy($param)
    {
        //
    }
}
