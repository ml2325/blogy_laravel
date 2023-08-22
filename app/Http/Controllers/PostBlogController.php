<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

use App\Models\Category;

class PostBlogController extends Controller
{
    public function store_post_blog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
           
            'category_id' => 'required', // Add category_id validation
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save the image
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('blogimage', $imageName);

        // Create a new Job instance and fill it with the request data
        $blog = new Post;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');


        $blog->image = $imageName;
        $blog->user_id = $request->input('user_id');

        $blog->category_id = $request->input('category_id');


        // Save the job to the database
        $blog->save();

        // Redirect to the job view page or any other desired page
        return redirect()->route('home');
    }

    public function delete($id) {
        // Delete associated comments
        Comment::where('post_id', $id)->delete();
    
        // Delete the post
        Post::findOrFail($id)->delete();
    
        return redirect()->route('home')->with('success', 'Post deleted successfully');
    }
    

    public function update_post($id)
    {
    $post = Post::find($id);
    $category = Category::all();
        return view('user.update_post', compact('post','category'));
    }

    public function edit_post(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
     
     
     
        $image = $request->file;
        if ($image) {
            $imagename = time() . '.' . $image->getClientoriginalExtension();
            $request->file->move('blogimage', $imagename);
            $post->image = $imagename;
        }
        $post->save();
        return redirect()->back()->with('message', 'Post  succesfully updated ');
    }




}
