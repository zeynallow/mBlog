<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostData extends Model
{
  public $timestamps = false;
  protected $fillable = ['post_id','locale','title','text','keywords'];

}
