<?php


namespace App\Services;


use App\Models\Admin;
use Illuminate\Support\Facades\DB;

/**
 * @Description: 用户相关
 * @Author: mxker
 * @Date: 2021-03-25 10:14
 */
class AuthService
{
    public function login($request, $username, $password){
        $userInfo = Admin::query()->where(['admin_name' => $username]) -> first();
        if($userInfo){
            if($password == decrypt($userInfo->admin_password)){
                $request -> session()-> put('userInfo',[
                    'isLogin' => 1,
                    'userName' => $userInfo->admin_name,
                ]);

                $isLogin = DB::table('sessions') -> where(['user_id' => $userInfo->admin_id]) -> first();
                if($isLogin){
                    DB::table('sessions') -> where('id',$isLogin->id)->update(['token' => 222]);
                }else{
                    DB::table('sessions') -> insert([
                        'user_id'    => $userInfo->admin_id,
                        'ip_address' => '192.168.1.90',
                        'token'      => 'string',
                        'login_time' => time(),
                    ]);
                }

                return $userInfo;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * 检测是手机、邮箱或用户名
     * @param $username
     * @return string
     */
    protected function usernameType($username)
    {
        if (preg_match("/^1\d{10}$/", $username)) {
            return $type = 'mobile';
        } elseif (preg_match("/^[a-zA-Z0-9]+([-_.][a-zA-Z0-9]+)*@([a-zA-Z0-9]+[-.])+([a-z]{2,5})$/", $username)) {
            return $type = 'email';
        } else {
            return $type = 'username';
        }
    }
}