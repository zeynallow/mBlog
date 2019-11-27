<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Post extends Model
{

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['publish','slug','user_id','featured','category_id','subcategory_id','cover'];

  /*
  * author
  */
  public function author(){
    return $this->belongsTo('App\User','user_id');
  }

  /*
  * post data
  */
  public function post_data(){
    $data = PostData::where('post_id',$this->id)->where('locale',App::getLocale())->get();
    if(isset($data[0])){
      return $data;
    }else{
      return PostData::where('post_id',$this->id)->get();
    }
  }

  /*
  * post data all
  */
  public function post_data_all(){
    return $this->hasMany('App\PostData','post_id');
  }

  /*
  * category
  */
  public function category(){
    return $this->belongsTo('App\Category','category_id');
  }

  /*
  * subcategory
  */
  public function subcategory(){
    return $this->belongsTo('App\Category','subcategory_id');
  }

  /*
  * post check locale
  */
  public function post_check_locale($locale){
    return PostData::where('post_id',$this->id)->where('locale',$locale)->count();
  }

  /*
  * comments
  */
  public function comments(){
    return $this->hasMany('App\PostComment')->whereNull('parent_id');
  }

}
