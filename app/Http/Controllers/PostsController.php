<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index() {
       $posts = Post::latest()->get();
       return view('posts.index')->with('posts', $posts);
      }

    public function show(Post $post) {
        // $post = Post::find($id);
        $post = Post::findOrFail($post);
        return view('posts.show')->with('post', $post);
      }

      public function create() {
        return view('posts.create');
      }

      public function store(Request $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
  
        
        $post->save();
        return redirect('/posts/index');
      }

      public function edit(Post $post) {
        return view('posts.edit')->with('post', $post);
      }

      public function update(Request $request, Post $post) {
       
        $post->title = $request->title;
        $post->body = $request->body;
        $post->genre_value = $request->genre_value;
        $post->genre = $request->genre;
        $post->save();
        return redirect('/posts/index');
      }

      public function destroy(Post $post) {
        $post->delete();
        return redirect('/posts/index');
      }
}
