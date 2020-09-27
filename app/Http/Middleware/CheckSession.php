<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession
{
    /**
     * Handle an incoming request.
     * 验证session状态
     * 中间件在前执行
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $session = $request ->session()-> get('userInfo');
        if(!$session){
            return redirect('/backend/');
        }

        return $next($request);
    }
}
