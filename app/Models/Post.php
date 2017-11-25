<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  // protected $dates = ['created_at', 'updated_at'];

  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  public function posts()
  {
    return $this->hasMany('App\Models\Post');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }

}
