<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricalSubscriptions extends Model
{
    //
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function book(){
      return $this->belongsTo('App\Book');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'user_id',  'book_id'
    ];
}
