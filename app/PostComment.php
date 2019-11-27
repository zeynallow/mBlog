<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];

  /**
  * The belongs to Relationship
  *
  * @var array
  */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
  * The has Many Relationship
  *
  * @var array
  */
  public function replies()
  {
    return $this->hasMany('App\PostComment', 'parent_id');
  }

}
