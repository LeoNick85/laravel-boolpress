<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view("admin.posts.index", compact("posts"));
    }


    public function create()
    {
        return view("admin.posts.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:255|unique:posts,title",
            "content" => "required"
        ]);
        $dati = $request->all();
        $slug = Str::of($dati["title"])->slug("-");
        $dati["slug"] = $slug;
        $nuovo_post = new Post();
        $nuovo_post->fill($dati);
        $nuovo_post->save();
        return redirect()->route("admin.posts.index");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
