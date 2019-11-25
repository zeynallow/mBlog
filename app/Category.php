<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Category extends Model
{

  protected $fillable = ['slug','parent_id','menu_position','show_on_menu'];

  /*
  * subcategories
  */
  public function subcategories(){
    return $this->hasMany('App\Category','parent_id');
  }

  /*
  * category data
  */
  public function category_data(){
    $data = CategoryData::where('category_id',$this->id)->where('locale',App::getLocale())->get();
    if(isset($data[0])){
      return $data;
    }else{
      return CategoryData::where('category_id',$this->id)->get();
    }
  }

  /*
  * subcategory data
  */
  public function subcategory_data(){
    $data = CategoryData::where('category_id',$this->parent_id)->where('locale',App::getLocale())->first();
    if(isset($data[0])){
      return $data;
    }else{
      $data = CategoryData::where('category_id',$this->parent_id)->first();
    }
  }

  /*
  * category data all
  */
  public function category_data_all(){
    return $this->hasMany('App\CategoryData','category_id');
  }

  /*
  * category check locale
  */
  public function category_check_locale($locale){
    return CategoryData::where('category_id',$this->id)->where('locale',$locale)->count();
  }


}
