<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

        // we want to display all the posts index pages inside post
        // So let's get all posts from db
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20); // Get all posts in natural order. It is collection
        return view('posts.index')->with('posts', $posts);
    }
    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }
    
    public function destroy(Post $post){
       $post->delete();
       return back();
    }
}
