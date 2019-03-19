<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'department', 'description',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
