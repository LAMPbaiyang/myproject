<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //一对一关系
    public $table='users';//表名

    protected $fillable = ['uname','tel','upass'];
    public $timestamps = false;


 //    public function user_info()
 //    {
 //    	return $this->hasOne('App\Http\Model\user_info','uid'，'id');
	// }
	// public function content()
	// {
	// 	return $this->hasMany('App\Http\Model\user_info','uid'，'id');
	// }
}
