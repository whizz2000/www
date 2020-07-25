<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
class TestController extends Controller
{
    //
    public function getWxToken()
    {
        $appid ="wxe075b6364f098b0e";
        $appsec = "d9b704158d982406c1c9c401a3ef41bf";
        $url ="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsec.'";
        $cont = file_get_contents($url);
        echo $cont;
    }

    public function test1(){
        $good_info = [
            'goods_id' => 123,
            'goods_name' =>'baibai',
            'goods_price'=> 2132,
            'goods_time' => 123123
        ];

    }


    public function hash(){
        $date = [
            'name'  =>'xiluhao',
            'email' => '28871293@.com',
            'age'   =>  99
        ];
    }
    public function test2()
    {
        $url = "http://www.1911.com/test2";
        $response = file_get_contents($url);
        var_dump($response);
    }

    public function UserInfo(){
        echo 'userinfo';
    }

    public function test3(){

    }

    public function test4(){

    }
    public function test5(){

    }

    //对称加密
    public function aest(){

        $data = 'hello world';  //原始数据
        $method = 'AES-256-CBC';  //加密算法
        $key = '1111';  //加密密钥
        $iv = '1111222233334444'; //舒适化IV 在cbc时使用
        $url = 'http://www.1911.com/aes1';
        $option = OPENSSL_RAW_DATA;

     $str = openssl_encrypt($data,$method,$key,$option,$iv); 
     //echo $decodeData; 

     $bas_64 = base64_encode($str);
     
     $api = $url . '?data='. urlencode($bas_64);

     $response = file_get_contents($api);

     echo $response;

    }


    //非对称加密
    public function ace(){
        $data = "还有谁";

        $content = file_get_contents(storage_path('keys/pub.key'));
        
        $pub_key = openssl_get_publickey($content);
        openssl_public_encrypt($data,$enc_data,$pub_key);
        
        $bas_64 = base64_encode($enc_data);
        $url ='http://www.1911.com/aesdec?data='.urlencode($bas_64);
        $response = file_get_contents($url);
    
       echo $response;

    }

    //对称加密签名
    public function sign1(Request $request){
        
        $key = 'message';

        //接收
        $sign = $request->get('sign');
        $data = $request->get('data');

        //重新效验
        $str_sign1 = sha1($data.$key);
        if($str_sign1 == $sign){
            echo '验证成功';
        }else{
            echo '验证失败';
        }
        }
    }