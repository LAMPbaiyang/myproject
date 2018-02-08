<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    //一对一关系
    public $table='user_info';//表名

    protected $fillable = ['id','nickName'];

 //    public function user_info()
 //    {
 //    	return $this->belongsTo('App\Http\Model\users','uid');
	// }
	// public function content()
	// {
	// 	return $this->hasMany('App\Http\Model\user_info','uid'，'id');
	// }
}
