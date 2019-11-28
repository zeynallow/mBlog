<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageData extends Model
{
  public $timestamps = false;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['page_id','locale','title','text'];
}
