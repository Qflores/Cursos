<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $blogs = Blog::all()->take(10);
        
        return view('blog.index',compact('blogs'));
    }

     public function store(Blog $blog, Request $request){

        $blogs = Blog::all()->take(10);
        
        return view('blog.index',compact('blogs'));
    }


}
