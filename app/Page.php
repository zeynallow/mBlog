<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Page extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['publish','slug'];

  /*
  * page data
  */
  public function page_data(){
    $data = PageData::where('page_id',$this->id)->where('locale',App::getLocale())->get();
    if(isset($data[0])){
      return $data;
    }else{
      return PageData::where('page_id',$this->id)->get();
    }
  }

  /*
  * page data all
  */
  public function page_data_all(){
    return $this->hasMany('App\PageData','page_id');
  }

  /*
  * page check locale
  */
  public function page_check_locale($locale){
    return PageData::where('page_id',$this->id)->where('locale',$locale)->count();
  }

}
