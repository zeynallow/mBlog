<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryData extends Model
{
  public $timestamps = false;
  protected $fillable = ['category_id','locale','title','meta_description','meta_keywords'];
  
}
