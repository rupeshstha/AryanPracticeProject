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

        //Concatenate example
//        $first_name = "Rojesh";
//        $last_name = "shakya";
//        dd('My name is '.$first_name.' '.$last_name);
//        dd($request);

        $data = $request->validate([
            'title'=>'required',
            'category_id'=>'required|numeric',
            'description'=>'required',
            'images.*'=>'required|mimes:jpg,png,jpeg'
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
//        dd($request);

        if ($request->hasFile('images'))
        {
            $image_arr = [];
            foreach ($request->file('images') as $image){
                //get the original extension from the image.
                $extension = $image->getClientOriginalExtension();
                $name = time().'.'.$extension;
                $location = 'blog_images/';
                $image->move('storage/'.$location, $name);
                $image_arr[] = $location.$name;
            }

            $blog->images = json_encode($image_arr);
        }

        $blog->save();
        return redirect()->route('blog.index');

    }


}
