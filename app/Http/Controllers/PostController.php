<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function posts(){
       $category=Category::all();
       $post=Post::all();
        return view('posts.posts',compact('category','post'));
    }

   

    
}
