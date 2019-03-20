<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'book_id', 'user_id',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'timestamp' => 'datetime',
  ];
}
