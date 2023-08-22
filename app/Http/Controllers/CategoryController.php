<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function categories(){
        $category=Category::all();
        return view('categories.home',compact('category'));
    }

    public function create_category(){
      
        return view('categories.create_category');
     }

     public function store_category(Request $request)
     {
         $request->validate([
             'name' => 'required',
            
         ]);
 
      
 
         
         $category = new Category();
         $category->name = $request->input('name');
    
     
 
         // Save the job to the database
         $category->save();
 
         // Redirect to the job view page or any other desired page
         return redirect()->route('categories');
     }

     
     public function delete(string $id)
     {
         $categories = Category::find($id);
         $categories->delete();
         return redirect()->back();
     }

     public function update_category($id)
     {
     $category = Category::find($id);
         return view('categories.update_category', compact('category'));
     }
 
     public function edit_category(Request $request, $id)
     {
         $category = Category::find($id);
         $category->name = $request->name;
         
    
         $category->save();
         return redirect()->back()->with('message', 'category  updated succesfully');
     }


     public function category($name) {
        // Find the category by name
        $category = Category::where('name', $name)->first();
       
   
   
    $pos = Post::with('category')->orderByDesc('created_at')->take(3)->get();
    
        $categoryCounts = Category::withCount('posts')->get();
    
        // Get all posts belonging to the given category
        $post = Post::where('category_id', $category->id)->get();
    
        return view('user.category', compact('category', 'post','categoryCounts'));
    }
    

}
