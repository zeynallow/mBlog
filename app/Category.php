<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Category extends Model
{

  protected $fillable = ['slug','parent_id','menu_position','show_on_menu'];
  public $with = ['category_data'];

  public function subcategories(){
    return $this->hasMany('App\Category','parent_id');
  }

  public function category_data(){
      return $this->hasMany('App\CategoryData','category_id')->where('locale',App::getLocale());
  }

  public function subcategory_data(){
    $locale = App::getLocale();
    return CategoryData::where('category_id',$this->parent_id)->where('locale',App::getLocale())->first();
  }

  public function category_data_all(){
    return $this->hasMany('App\CategoryData','category_id');
  }

  public function category_check_locale($locale){
    return CategoryData::where('category_id',$this->id)->where('locale',$locale)->count();
  }


}
