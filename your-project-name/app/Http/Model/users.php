<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;


class users extends Model
{
    public $table = 'users';

    public $timestamps = false;

 	
 	// public function user_info()
  //   {
  //       return $this->hasOne('App\Http\Model','id','uid');
  //   }
    
}
