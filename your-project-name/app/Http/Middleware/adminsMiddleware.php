<?php

namespace App\Http\Middleware;

use Closure;

use Session;

class adminsMiddleware
{
	// dd(11111111111111);	
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {	
		//验证用户是否登录   
       //缓存有数据就继续下一个请求,没数据就重定向登录页面
		if(session('tel')){
			return $next($request);
		}else{
			return redirect('admins/login');
		}
	}
}
