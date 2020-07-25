<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\GoodsModel;
use App\Model\UserModel;
use App\Model\TokenModel;
use Illuminate\Support\Facades\Redis;
class VerifyToken  
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
        $token = request()->get('id');
        $count = Redis::incr('1');
        $key = 's:token:number';
        return $next($request);
    }
}
