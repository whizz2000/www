<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\GoodsModel;
use App\Model\UserModel;
use App\Model\TokenModel;
use Illuminate\Support\Facades\Redis;
class VerifyMay
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
        $count = redis::incr(1);
        $key = 'h:view_count:'.$token;
        Redis::sismember($count,$key);
        echo $count;
        return $next($request);
    }
}
