<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use App\Model\TokenModel;
class UserController extends Controller
{
    public function reg(Request $request){
        $username = $request->post('username');
        $pass1 = $request->post('pass1');
        $pass2 = $request->post('pass2');
        $email    = $request->post('email');
   
        $pass = password_hash($pass1,PASSWORD_BCRYPT);
        $userinfo = [
            'username' => $username,
            'password' => $pass,
            'email'    => $email,
            'u_time'     => time()
        ];

        $uid = UserModel::insertGetId($userinfo);

            $response = [ 
                'errno' => '200',
                'msg'   => 'ok'
            ];
            return $response;
    
    }



        public function login(Request $request){
            
                $username = $request->post('username');
                $pass = $request->post('pass');

                $u = UserModel::where(['username'=>$username])->first();
                //生成token
                   //验证密码
                if($u){
                    if(password_verify($pass,$u->password))
                    {
                $token = Str::random(32);
                $expire_seconds = 7200;        

                $data = [
                    'token' => $token,
                    'uid'   => $u->id,
                    'expire_at' => time() +$expire_seconds
            
                ];
               
                
                $response = [
                    'errno' => '200',
                    'msg'   => 'ok',
                    'data'  => [
                        'token' => $token,
                        'expire_in' => $expire_seconds
                    ]
                    ];

            }else{
                $response = [
                    'errno' => '5000',
                    'msg'   => '失败'
                ];
            }
                return $response;
            }
        }
    }
  