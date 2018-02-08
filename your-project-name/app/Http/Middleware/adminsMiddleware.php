<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class adminsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('tel')){
            return $next($request);
        }else{
            return redirect('ad_login');
        }
    }
}
