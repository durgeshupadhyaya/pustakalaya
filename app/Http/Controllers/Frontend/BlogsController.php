<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(12);
        return view('frontend.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blogdetails = Blog::where('slug', $slug)->first();
        $moreblogs = Blog::where('slug', '!=', $slug)->get();
        $categories = Category::where('parent_id', 0)->where('is_featured', 1)->inRandomOrder()->limit(3)->latest()->get();

        return view('frontend.blog.show', compact('blogdetails', 'moreblogs', 'categories'));
    }
}
