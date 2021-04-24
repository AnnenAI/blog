<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * [author description]
     * @return [type] [description]
     */
    public function author(){
      return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * [tags description]
     * @return [type] [description]
     */
    public function tags(){
      return $this->belongsToMany(Tag::class,'tags_posts','post_id','tag_id');
    }
}
