<?php

namespace App\Http\Middleware;

use Closure;                                                                                                                                                            
use App\Model\GoodsModel;
use App\Model\UserModel;
use App\Model\TokenModel;
use Illuminate\Support\Facades\Redis;
class CheckToken
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
        $g = UserModel::select('username','email','password')->find($token);
        if(empty($g)){
            echo '未授权';
            return $next($request);    
        }else{
            $g != $token;
            echo '授权错误';

            return $next($request);
    }
    }
}