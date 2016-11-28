<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Book extends Model
{
    //
      protected $fillable = ['name','author','publisher'];
      protected $casts = ['user_id'=> 'int',];
      public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
