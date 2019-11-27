<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostData extends Model
{
  public $timestamps = false;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['post_id','locale','title','text'];

}
