<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function getAllPosts(){

      $posts=Auth::check() ? Auth::user()->posts()->get() : null;
      return view('blog.blog', ['posts'=>$posts]);
    }

    public function getPostById($id){
      $post=Post::find($id);
      return view('blog.post',['post'=>$post]);
    }

    public function updatePost($id){
      $post=Post::find($id);
      return view('blog.update-post',['post'=>$post]);
    }

    public function updatePostSubmit($id,Request $request){
      $post=Post::find($id);
      $post->title=$request->title;
      $post->description=$request->description;
      $post->content=$request->content;
      $post->save();
      return redirect()->route('blog')->with('success','Updated successfully');
    }

    public function deletePost($id){
      $post=Post::find($id)->delete();
      return redirect()->route('blog')->with('success', 'Deleted successfully');
    }

    public function createPost(){
      return view('blog.create-post');
    }

    public function createPostSubmit(Request $request){
      $post= new Post();
      $post->title=$request->title;
      $post->description=$request->description;
      $post->content=$request->content;
      $post->user_id=Auth::user()->id;
      $post->save();
      return redirect()->route('blog')->with('success','Post { '.$post->title.' } created!');
    }
}
