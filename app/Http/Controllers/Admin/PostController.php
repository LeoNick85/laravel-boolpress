<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with("category")->get();
        return view("admin.posts.index", compact("posts"));
    }


    public function create()
    {
        $categories = Category::all();
        return view("admin.posts.create", compact("categories"));
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
        $post = Post::find($id);
        return view("admin.posts.show", compact("post"));
    }


    public function edit($id)
    {
        $post = Post::find($id);

        if($post) {
            $categories = Category::all();
            $data = [
                "post" => $post,
                "categories" => $categories
            ];
            return view("admin.posts.edit", $data);
        } else {
            return abort("404");
        };
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:255|unique:posts,title,".$id,
            "content" => "required"
        ]);
        $post = Post::find($id);
        $dati = $request->all();
        $slug = Str::of($dati["title"])->slug("-");
        $dati["slug"] = $slug;
        $post->update($dati);
        return redirect()->route("admin.posts.index");
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        if($post) {
            $post->delete();
            return redirect()->route("admin.posts.index");
        } else {
            return abort("404");
        };
    }
}
