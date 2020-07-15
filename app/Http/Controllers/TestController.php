<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function test2()
    {
        $url = "http://www.1911.com/test2";
        $response = file_get_contents($url);
        var_dump($response);
    }

    public function UserInfo(){
        echo 'userinfo';
    }
}