<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
 

  // ...
  public function redirect(){
    if(Auth::id()){
        if(Auth::user()->usertype=='client'){
            $category=Category::all();
            $catego = Category::with('posts')->take(3)->get();
            $pos = Post::with('category')->orderByDesc('created_at')->take(3)->get();
            $posts = Post::with('category')->orderByDesc('created_at')->take(6)->get();
            return view('user.home',compact('category','posts','catego','pos'));
        }
        else{
            $totalUsers = User::count();
            $totalPosts = Post::count();
            $totalCategories = Category::count();
            return view('admin.home',compact('totalUsers','totalCategories','totalPosts'));
        }
    }else 
    {
        return redirect()->back();
    }
}

public function category($name) {
    $category = Category::where('name', $name)->first();
    
    if (!$category) {
        return redirect()->route('home')->with('error', 'Category not found');
    }
    
    $post = Post::where('category_id', $category->id)->get();
  
    return view('user.category', compact('category', 'post'));
}




public function storeComment(Request $request, $id) {
    // Validate the comment data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
        'website' => 'required',
        'parent_id' => 'nullable|exists:comments,id' // Validate parent_id if it's provided
    ]);

    // Find the post
    $post = Post::findOrFail($id);

    // Create a new comment
    $comment = new Comment([
        'name' => $validatedData['name'],
        'website' => $validatedData['website'],
        'email' => $validatedData['email'],
        'message' => $validatedData['message'],
    ]);

    // If parent_id is provided, associate the comment with its parent
    if (isset($validatedData['parent_id'])) {
        $parentComment = Comment::findOrFail($validatedData['parent_id']);
        $parentComment->replies()->save($comment);
    } else {
        // Save the comment to the post
        $post->comments()->save($comment);
    }

    return redirect()->route('single', ['id' => $id])->with('success', 'Comment posted successfully');
}






public function post_blog(){
    $category = Category::all();
    
    // Retrieve posts along with their associated categories
    $posts = Post::with('category')->get();
    
    
    return view('user.post', compact('category', 'posts'));
}





public function single($id) {
    $category = Category::all();
    $post = Post::find($id);
    $posts = Post::all();
    $pos = Post::with('category')->orderByDesc('created_at')->take(3)->get();
    // Count the number of posts in each category
    $categoryCounts = Category::withCount('posts')->get();

    return view('user.single', compact('category', 'post', 'posts', 'categoryCounts','pos'));
}



   

public function search(Request $request) {
    $query = $request->input('query');
    dd($query); // Debugging statement to check the value of $query

    // Perform the search query using the $query parameter

    // For example, you can search for posts with titles containing the query
    $results = Post::where('title', 'like', '%' . $query . '%')->get();

    return view('user.search_result', compact('results'));
}


public function search_result(){
    return view('user.search_result');
}


    public function index()
    {
        $category = Category::all();
       
        $catego = Category::with('posts')->take(3)->get();
        $pos = Post::with('category')->orderByDesc('created_at')->take(3)->get();
        // Retrieve the latest 5 posts along with their associated categories
        $posts = Post::with('category')->orderByDesc('created_at')->take(6)->get();
        
        return view('user.home', compact('category', 'posts','catego','pos'));
    }
    
 

    public function my_blogs()
    {
        $user = Auth::user(); // Get the logged-in user
    
        // Retrieve the posts related to the user and order them by creation date
        $posts = $user->posts()->with('category')->orderByDesc('created_at')->get();
    
        $category = Category::all();
    
        return view('user.myblog', compact('category', 'posts'));
    }
    
 
  }

 
  

