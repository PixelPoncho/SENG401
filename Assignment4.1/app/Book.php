<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  public function comment(){
    return $this->hasMany('App\Comment');
  }

  public function subscription(){
    return $this->hasMany('App\Subscription');
  }

  public function authors(){
    return $this->belongsToMany('App\Author');
  }
}
