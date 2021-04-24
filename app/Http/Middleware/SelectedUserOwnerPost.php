<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class SelectedUserOwnerPost
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
        $user=User::where('username','=',$request->username)->firstOrFail();
        $post=$user->posts()->find($request->id);
        if (!is_null($post))
          return $next($request);
        return redirect()->route('blog',['username'=>$request->username])->with('message','Such post does not exist.');
    }
}
