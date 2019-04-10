<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function transaction(){
    return $this->hasMany('App\Transaction');
  }
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'type', 'balance'
  ];
}
