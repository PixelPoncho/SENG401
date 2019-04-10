<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  //
  protected $fillable = ['user_id', 'title', 'description', 'isbn', 'image'];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function ratings()
  {
    return $this->hasMany(Rating::class);
  }
  public function author()
  {
    return $this->belongsToMany(Author::class);
  }
}
