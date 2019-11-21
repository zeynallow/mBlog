<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Post extends Model
{
    protected $fillable = ['publish','slug','user_id','featured','category_id','subcategory_id','cover'];


    public function author(){
      return $this->belongsTo('App\User','user_id');
    }

    public function post_data(){
      $locale = App::getLocale();
      return $this->hasMany('App\PostData','post_id')->where('locale',$locale);
    }

    public function category(){
      return $this->belongsTo('App\Category','category_id');
    }

    public function subcategory(){
      return $this->belongsTo('App\Category','subcategory_id');
    }
}
