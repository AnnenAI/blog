<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
  /**
   * [AddTag description]
   * @param Request $request [description]
   */
  public function addTag(Request $request){
    $tag=Tag::where('name','=',$request->tag)->first();
    if(is_null($tag)){
      $newTag = new Tag();
      $newTag->name=$request->tag;
      $newTag->save();
      return response()->json(['exists'=>'true','tag'=>$newTag]);
    }
    return response()->json(['exists'=>'false']);
  }
}
