<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function account(){
    return $this->belongsTo('App\Account');
  }
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [

  ];
}
