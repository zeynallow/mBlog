<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryData extends Model
{
  public $timestamps = false;
  
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['category_id','locale','title','meta_description','meta_keywords'];

}
