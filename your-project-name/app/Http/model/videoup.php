<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class videoup extends Model
{
   public $table = 'videoup';
	
	public $timestamps = false;
	
	// protected $fillable = ['uid','tel','uname'];
	
	// public function user_info()
   // {

        // return $this->hasOne('App\Http\Model\user_info','uid','id');
    // }
    // public function contents()
    // {

        // return $this->hasMany('App\Http\Model\contents','uid','id');
	// }
}