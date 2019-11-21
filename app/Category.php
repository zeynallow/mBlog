<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Category extends Model
{
  protected $fillable = ['slug','parent_id','menu_position','show_on_menu'];
  public $with = ['category_data'];

  public function category_data(){
    $locale = App::getLocale();
    return $this->hasMany('App\CategoryData','category_id')->where('locale',$locale);
  }

}
