<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Auth;

class PostController extends Controller
{
    public function getAllPosts($username){

      $posts = User::where('username','=',$username)->firstOrFail()->posts()->get();
      return view('blog.blog', ['posts'=>$posts]);
    }

    public function getPostById($username,$id){
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
      return redirect()->route('blog', ['username'=>Auth::user()->username])->with('message','Post updated successfully');
    }

    public function deletePost($id){
      $post=Post::find($id)->delete();
      return redirect()->route('blog', ['username'=>Auth::user()->username])->with('message', 'Post deleted successfully');
    }

    public function createPost(){
      #$tags=Tag::all()->pluck('name');
      $tags=Tag::all();
      return view('blog.create-post',['tags'=>$tags]);
    }

    public function createPostSubmit(Request $request){
      $post= new Post();
      $post->title=$request->title;
      $post->description=$request->description;
      $post->content=$request->content;
      $post->user_id=Auth::user()->id;
      $post->save();
      $post->tags()->attach($request->tag_id);
      $post->save();
      return redirect()->route('blog',['username'=>Auth::user()->username])->with('message','Post created!');
    }
}
