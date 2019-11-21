<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['publish','slug','user_id','featured','category_id','subcategory_id','cover'];


    public function author(){
      return $this->belongsTo('App\User','user_id');
    }
}
