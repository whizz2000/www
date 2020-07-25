<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\Redis;

class GoodsController extends Controller
{
    // public function index(){
    //     $redis = new Redis();
    //     $redis->connect('127.0.0.1',6379);
    //     $redis->select(0);
    //     $redis->hMset('goods',[
    //         'name' => 'CHOCOLOCATE',
    //         'prize' => 20,
    //         'number' => 180,
    //         'width' => 55,
    //     ]);
    //     $data = $redis->hKeys('goods');
    //     var_dump($data);exit;
    //     } 
        
    public function goods(Request $request ){
        
        $goods_id = $request->get('id');
        echo $goods_id;
        $key1 = 'count:view:goods:'.$goods_id;
        Redis::incr($key1);

        $key = 'h:goods_info:'.$goods_id;

        //先判断缓存
        $goods_info = Redis::hgetAll($key);//hgetall 读取全部的值和域

        if(empty($goods_info)){
            $g = GoodsModel::select('goods_id','goods_sn','cat_id','goods_name')->find($goods_id);
           
        //缓存到redis中
        $goods_info = $g->toArray();
        Redis::hMset($key,$goods_info);  //hMet 设置hash值
        echo "无缓存";
        echo '<pre>';print_r($goods_info);echo '</pre>';
    }else{
        echo "缓存";
        echo '<pre>';print_r($goods_info);echo '</pre>';
    }
        
    Redis::hincrby($key,'view_count',1);
    }

        //先在列表里写10个库存
        //然后用户点击按钮减少一个库存
        //一直到零

       
    public function blacklist(Request $request){
        //验证token
        $token = $request->get('token');
        $count = redis::incr(1);
        //判断token是否在黑名单中 如果在提示错误
        $key = 's:token:blacklist';
        Redis::sismember($key,$token);
        if($count>10){
            //$g = GoodsModel::select('goods_id','goods_sn','cat_id','goods_name')->find($goods_id);
            echo '访问次数过多';
        }else{
            echo 'ok';
        }
}

    public function qiandao(Request $request){
        
        $time = time();
        $uid = $request->get('uid');
        $key = 's:token:qiandao';
        Redis::zadd($uid,$time,$key);
        
    }
}