<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    //一对一关系
    public $table='user';//表名

    public function user_info()
    {
    	return $this->hasOne('App\Http\Model\user_info','uid'，'id');
	}
	public function content()
	{
		return $this->hasMany('App\Http\Model\user_info','uid'，'id');
	}
}
