<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Auth;
use Closure;
use Illuminate\Http\Request;

class CanEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if(Auth::check()){
        $post_id=$request->id;
        $user=Auth::user()->id;
        if($user == Post::find($post_id)->author->id)
          return $next($request);
      }
      return redirect()->route('home');
    }
}
