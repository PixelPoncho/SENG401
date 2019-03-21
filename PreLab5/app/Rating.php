<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  //
  protected $fillable = ['user_id', 'title', 'description'];
  public function book()
  {
    return $this->belongsTo(Book::class);
  }
}
