<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function getAllPosts(){
      $posts=Post::all();
      return view('blog', ['posts'=>$posts]);
    }

    public function getPostById($id){
      $post=Post::find($id);
      return view('post',['post'=>$post]);
    }
}
