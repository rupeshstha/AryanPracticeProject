<?php

namespace App\Http\Controllers;


use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('is_active',1)->get();
        return view('blog_index', compact('blogs'));
    }

    public function insert_index()
    {
        $categories = Category::all();
        return view('blog_insert', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'category_id'=>'required|numeric',
            'description'=>'required'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->is_active = 1;

        //Core php built in function to generate slug
        $blog->slug = str_slug($request->title, '-' );

        //laravel function to generate slug
        // dd(Str::slug($request->title, '-'));
        $blog->save();
        return redirect()->route('blog.index');

    }


}
